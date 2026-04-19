# BRESSEL™ — Infrastructure & CLI Mastery Plan

**Date:** 2026-04-20  
**Status:** Planning  
**Goal:** Full CLI access to Docker WP, SSH server, DB, WP-CLI, and live site management — all from our terminal.

---

## 1. Current State Assessment

### What Exists
| Component | Status | Details |
|-----------|--------|---------|
| **Docker Compose** | ✅ Running | 3 services: `db` (MySQL 8), `wordpress`, `wp-cli` |
| **WordPress** | ✅ Installed | Running on `localhost:8080` |
| **Child Theme** | ✅ Built | `twentytwentyfour-bressel/` with Vite + Tailwind v4 |
| **CPTs** | ✅ Registered | `coach`, `merch` (event removed, uses standard posts) |
| **Content** | ✅ Populated | 4 coaches, 7 merch items, 3 events, 1 announcement |
| **WP-CLI** | ⚠️ Manual | Installed via `.phar` copy into wordpress container |
| **SSH Keys** | ✅ Available | `id_ed25519--bresselsports`, `droplet-wp`, `github_deploy_key` |
| **DO Droplet** | ⚠️ Down | `46.101.172.116` — timed out on SSH, needs re-provisioning |
| **Live Plugins** | ⚠️ Minimal | Only Query Monitor active. Missing CMB2, Fluent Forms, SEO, etc. |
| **External Server** | ❓ Unknown | `client_sftp_key` exists — need to discover which server it connects to |

### What's Missing
- **Persistent WP-CLI** in docker-compose
- **SSH config** for DO droplet / live server
- **Database management** via CLI (mysql client in container)
- **Live site access** (DO droplet needs re-creating)
- **Upload bridge** between local Docker and live server
- **Backup/restore workflow** for the database

---

## 2. Infrastructure Blueprint

### 2.1 Docker Local Environment (Development)

```
┌─────────────────────────────────────────────────────────┐
│  HOST (Your Machine)                                    │
│                                                         │
│  ┌──────────────────┐  ┌──────────────────────────────┐│
│  │  CLI Tools        │  │  Docker Compose              ││
│  │  ─────────────    │  │  ─────────────────────       ││
│  │  • wp-cli.phar    │  │  • bressel_wordpress:8080    ││
│  │  • mysql client   │  │  • bressel_db:3306           ││
│  │  • ssh            │  │  • (wp-cli service)          ││
│  │  • rsync/scp      │  │                              ││
│  │  • npm/run        │  │  Shared volumes:             ││
│  │  • curl/wget      │  │  • wp_data (WP filesystem)   ││
│  │  • sqlite3        │  │  • db_data (MySQL data)      ││
│  └──────────────────┘  └──────────────────────────────┘│
│                           │         │                   │
│                    ┌──────┴─────────┴──────┐           │
│                    │  Local Development      │           │
│                    │  localhost:8080         │           │
│                    │  localhost:3306 (DB)    │           │
│                    │  localhost:5173 (Vite)  │           │
│                    └─────────────────────────┘           │
└─────────────────────────────────────────────────────────┘
```

### 2.2 Live Production Environment (DigitalOcean)

```
┌─────────────────────────────────────────────────────────┐
│  DIGITALOCEAN DROPLET (Ubuntu 22.04)                    │
│                                                         │
│  ┌──────────────────────────────────────────────────┐  │
│  │  LEMP Stack                                       │  │
│  │  ─────────────                                    │  │
│  │  Nginx → PHP-FPM → WordPress                     │  │
│  │  MariaDB (separate, secure)                       │  │
│  │  SSL (Let's Encrypt)                              │  │
│  │  UFW firewall                                     │  │
│  └──────────────────────────────────────────────────┘  │
│                                                         │
│  SSH: root@46.101.172.116                               │
│  Key: droplet-wp (id_ed25519)                           │
│                                                         │
│  ┌──────────────────────────────────────────────────┐  │
│  │  Deployment Pipeline                              │  │
│  │  ──────────────────                               │  │
│  │  npm run build → rsync to /var/www/html           │  │
│  │  git push → CI hook → rebuild                     │  │
│  │  DB export/import via mysqldump                   │  │
│  └──────────────────────────────────────────────────┘  │
└─────────────────────────────────────────────────────────┘
```

---

## 3. CLI Tool Setup Plan

### Phase 1: Local Docker CLI Enhancements

#### 3.1.1 Persistent WP-CLI in Docker Compose
**Problem:** `wp-cli` service exits immediately because its entrypoint runs `wp cli update` then exits.

**Solution:** Replace the `wp-cli` service with an interactive alias that execs into the wordpress container:

```yaml
# docker-compose.yml additions
services:
  wp:
    image: wordpress:latest
    container_name: bressel_wp
    environment:
      WORDPRESS_DB_HOST: db:3306
      WORDPRESS_DB_USER: bressel_user
      WORDPRESS_DB_PASSWORD: securepassword123
      WORDPRESS_DB_NAME: bressel_db
      WORDPRESS_CONFIG_EXTRA: |
        define('WP_ENVIRONMENT_TYPE', 'development');
    volumes:
      - wp_data:/var/www/html
      - ./twentytwentyfour-bressel:/var/www/html/wp-content/themes/twentytwentyfour-bressel
    ports:
      - "8080:80"
    depends_on:
      - db

  # WP-CLI sidecar (replaces wordpress:cli)
  wpcli:
    image: wordpress:cli
    container_name: bressel_wpcli
    environment:
      WORDPRESS_DB_HOST: db:3306
      WORDPRESS_DB_USER: bressel_user
      WORDPRESS_DB_PASSWORD: securepassword123
      WORDPRESS_DB_NAME: bressel_db
    volumes:
      - wp_data:/var/www/html
      - ./twentytwentyfour-bressel:/var/www/html/wp-content/themes/twentytwentyfour-bressel
    entrypoint: ["tail", "-f", "/dev/null"]  # Keeps container alive
    depends_on:
      - db
```

#### 3.2.2 MySQL Client Access
**Problem:** Need to run raw SQL queries from the host machine.

**Solution:** Add mysql client package and create shell aliases:

```bash
# Install mysql client on host (Fedora)
sudo dnf install mysql -y

# Shell aliases (add to ~/.bashrc or ~/.zshrc)
alias wpdb='docker exec bressel_db mysql -ubressel_user -psecurepassword123 bressel_db'
alias wpdb-root='docker exec bressel_db mysql -uroot -prootpassword123'
alias wp-cli='docker exec bressel_wpcli wp --allow-root'
alias wp-admin='open http://localhost:8080/wp-admin/'
alias wp-login='open http://localhost:8080/wp-login.php'
alias wp-dump="docker exec bressel_db mysqldump -uroot -prootpassword123 bressel_db > ~/Desktop/wp_bressel/backups/db-$(date +%Y%m%d).sql"
alias wp-restore="docker exec -i bressel_db mysql -uroot -prootpassword123 bressel_db < "
alias wp-shell='docker exec -it bressel_wpcli bash'
alias wp-logs='docker logs -f bressel_wordpress'
alias wp-db-logs='docker logs -f bressel_db'
```

#### 3.3.3 WordPress Container SSH
**Problem:** Need SSH into the running WordPress container for file edits.

**Solution:** Install OpenSSH in the wordpress container via docker-compose:

```yaml
# docker-compose.yml — add SSH to wordpress service
wordpress:
  image: wordpress:latest
  container_name: bressel_wordpress
  environment:
    # ... existing env vars
  volumes:
    - wp_data:/var/www/html
    - ./twentytwentyfour-bressel:/var/www/html/wp-content/themes/twentytwentyfour-bressel
  ports:
    - "8080:80"
    - "2222:22"  # SSH into container
  command: >
    bash -c "
      apt-get update && apt-get install -y openssh-server &&
      echo 'root:bressel123' | chpasswd &&
      sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config &&
      mkdir /var/run/sshd &&
      /usr/sbin/sshd -D &
      docker-entrypoint.sh apache2-foreground
    "
```

Now you can SSH into the container:
```bash
ssh -p 2222 root@localhost
# Password: bressel123
# This gives you full filesystem access to /var/www/html
```

### Phase 2: Live Server Setup (DigitalOcean)

#### 2.1 Re-provision the Droplet

```bash
# SSH into the droplet (check if reachable)
ssh root@46.101.172.116 "hostname" 2>&1 || echo "Droplet offline"
```

**If offline:** Create a new droplet in DO dashboard, then run the full provisioning:

```bash
# 1. Create droplet (via DO CLI or dashboard)
doctl compute droplet create bressel-wp \
  --image ubuntu-22-04-x64 \
  --size s-2vcpu-4gb \
  --region sgp1 \
  --ssh-key YOUR_DO_KEY_ID

# 2. Install LEMP stack (from 004-digitalocean_ubuntu_wordpress_setup.md)
ssh root@<NEW_DROPLET_IP> <<'EOF'
apt update && apt upgrade -y
apt install nginx mariadb-server php-fpm php-mysql php-curl php-gd php-intl php-mbstring php-xml php-xmlrpc php-zip php-cli php-mbstring -y
systemctl enable nginx mariadb
EOF

# 3. Configure Nginx
ssh root@<NEW_DROPLET_IP> <<'EOF'
cat > /etc/nginx/sites-available/bressel <<'NGINX'
server {
    listen 80;
    server_name bresselsports.com www.bresselsports.com;
    root /var/www/html;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$args;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    # Security headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;

    # Gzip compression
    gzip on;
    gzip_types text/css application/javascript image/svg+xml;
    gzip_min_length 256;
}
NGINX
ln -s /etc/nginx/sites-available/bressel /etc/nginx/sites-enabled/
rm /etc/nginx/sites-enabled/default
nginx -t && systemctl restart nginx
EOF

# 4. Database setup
ssh root@<NEW_DROPLET_IP> <<'EOF'
mysql -u root <<'SQL'
CREATE DATABASE bressel_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'bressel_user'@'localhost' IDENTIFIED BY 'securepassword123';
GRANT ALL PRIVILEGES ON bressel_db.* TO 'bressel_user'@'localhost';
FLUSH PRIVILEGES;
SQL
EOF

# 5. Install WordPress
ssh root@<NEW_DROPLET_IP> <<'EOF'
cd /var/www
curl -O https://wordpress.org/latest.tar.gz
tar xzvf latest.tar.gz
mv wordpress/* .
rm -rf wordpress latest.tar.gz
chown -R www-data:www-data /var/www/html
find /var/www/html -type d -exec chmod 755 {} \;
find /var/www/html -type f -exec chmod 644 {} \;
EOF

# 6. Install PHP-SSH2 for rsync/SSH support
ssh root@<NEW_DROPLET_IP> <<'EOF'
apt install php-ssh2 -y
systemctl restart php8.3-fpm
EOF

# 7. Let's Encrypt SSL
ssh root@<NEW_DROPLET_IP> <<'EOF'
apt install certbot python3-certbot-nginx -y
certbot --nginx -d bresselsports.com -d www.bresselsports.com
EOF

# 8. Add SSH keys for deployment
ssh root@<NEW_DROPLET_IP> <<'EOF'
mkdir -p /root/.ssh
cat >> /root/.ssh/authorized_keys
EOF
# (paste id_ed25519--bresselsports public key)
```

#### 2.2 SSH Config on Host Machine

Add to `~/.ssh/config`:

```ssh-config
# Local dev container
Host bressel-docker
    HostName localhost
    Port 2222
    User root
    Password bressel123
    StrictHostKeyChecking no

# DigitalOcean droplet
Host bressel-live
    HostName 46.101.172.116
    User root
    IdentityFile ~/.ssh/droplet-wp
    StrictHostKeyChecking no
    ServerAliveInterval 60

# AI server (for reference)
Host aiserver
    HostName 100.66.253.51
    User watts
    ControlMaster auto
    ControlPath ~/.ssh/cm-%r@%h:%p
    ControlPersist 120
    ServerAliveInterval 60
```

### Phase 3: Live Site CLI Management

#### 3.1 Upload Bridge (Local → Live)

```bash
# rsync to live server (files only, exclude node_modules, .git, etc.)
alias wp-sync='rsync -avz --delete \
  --exclude=node_modules \
  --exclude=.git \
  --exclude=.env \
  --exclude=dist/ \
  twentytwentyfour-bressel/ \
  root@bressel-live:/var/www/html/wp-content/themes/twentytwentyfour-bressel/'

# Full site sync (themes + plugins + uploads)
alias wp-full-sync='rsync -avz --delete \
  --exclude=node_modules \
  --exclude=.git \
  --exclude=dist/ \
  twentytwentyfour-bressel/ \
  wp-content/ \
  root@bressel-live:/var/www/html/wp-content/'
```

#### 3.2 Database Management

```bash
# Dump local DB
alias wp-dump='docker exec bressel_db mysqldump -uroot -prootpassword123 bressel_db > ~/Desktop/wp_bressel/backups/db-$(date +%Y%m%d-%H%M%S).sql'

# Import to live server
alias wp-import-live='cat ~/Desktop/wp_bressel/backups/db-latest.sql | ssh root@bressel-live "mysql -u bressel_user -psecurepassword123 bressel_db"'

# Sync local to live DB
alias wp-db-sync='docker exec bressel_db mysqldump -uroot -prootpassword123 bressel_db | ssh root@bressel-live "mysql -u bressel_user -psecurepassword123 bressel_db"'

# WP-CLI on live server
alias wp-live='ssh root@bressel-live "wp --allow-root"'
alias wp-live-status='ssh root@bressel-live "wp core verify-checksums --allow-root && wp plugin list --allow-root"'
alias wp-live-db='ssh root@bressel-live "wp db query --allow-root"'
```

#### 3.3 Build → Deploy Pipeline

```bash
# Full deployment script: deploy.sh
#!/bin/bash
set -e

echo "🚀 Deploying BRESSEL to production..."

# 1. Build assets
echo "📦 Building assets..."
cd twentytwentyfour-bressel
npm run build
cd ..

# 2. Sync files to live server
echo "📤 Syncing files to live server..."
rsync -avz --delete \
  --exclude=node_modules \
  --exclude=.git \
  --exclude=.env \
  --exclude=dist/ \
  --exclude=backups/ \
  twentytwentyfour-bressel/ \
  root@bressel-live:/var/www/html/wp-content/themes/twentytwentyfour-bressel/

# 3. SSH to live and clear object cache (if caching plugin)
echo "🔄 Clearing caches..."
ssh root@bressel-live "wp cache flush --allow-root 2>/dev/null || true"
ssh root@bressel-live "wp transient delete --all --allow-root 2>/dev/null || true"

# 4. Verify
echo "✅ Deployment complete!"
ssh root@bressel-live "wp core version --allow-root"

echo "🌐 Live site: https://bresselsports.com"
```

#### 3.4 WP-CLI on Live Server

Install WP-CLI on the droplet once:

```bash
ssh root@bressel-live <<'EOF'
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
mv wp-cli.phar /usr/local/bin/wp
EOF
```

Then you can run WP-CLI commands on the live server:

```bash
# SSH into live and run WP-CLI
ssh bressel-live "wp plugin list --allow-root"
ssh bressel-live "wp option get siteurl --allow-root"
ssh bressel-live "wp post list --post_type=coach --allow-root --fields=ID,post_title"
ssh bressel-live "wp user list --allow-root"
ssh bressel-live "wp option get permalink_structure --allow-root"
```

---

## 4. Quick Reference Cheat Sheet

### Local Development
```bash
# Start/Stop
docker compose -f /home/matsu/Desktop/wp_bressel/docker-compose.yml up -d
docker compose -f /home/matsu/Desktop/wp_bressel/docker-compose.yml down
docker compose -f /home/matsu/Desktop/wp_bressel/docker-compose.yml restart

# WP-CLI
docker exec bressel_wpcli wp plugin list --allow-root
docker exec bressel_wpcli wp post list --allow-root
docker exec bressel_wpcli wp option get siteurl --allow-root
docker exec bressel_wpcli wp user list --allow-root
docker exec bressel_wpcli wp theme list --allow-root

# Database
docker exec bressel_db mysql -ubressel_user -psecurepassword123 bressel_db
docker exec bressel_db mysqldump -uroot -prootpassword123 bressel_db > backup.sql

# WordPress
open http://localhost:8080/wp-admin/          # Admin panel
open http://localhost:8080/                     # Site
docker logs bressel_wordpress                   # PHP logs
docker logs bressel_db                          # MySQL logs

# Theme dev
cd twentytwentyfour-bressel
npm run dev          # Vite dev server (HMR)
npm run build        # Production build
```

### Live Production
```bash
# SSH
ssh root@bressel-live
ssh root@46.101.172.116

# WP-CLI
ssh bressel-live "wp --allow-root"
ssh bressel-live "wp core check-update --allow-root"
ssh bressel-live "wp plugin update --all --allow-root"
ssh bressel-live "wp db query 'SELECT * FROM wp_posts WHERE post_type=\"coach\"' --allow-root"

# Files
rsync -avz twentytwentyfour-bressel/ root@bressel-live:/var/www/html/wp-content/themes/
scp -r twentytwentyfour-bressel/dist/ root@bressel-live:/var/www/html/wp-content/themes/twentytwentyfour-bressel/

# Server
ssh bressel-live "systemctl status nginx"
ssh bressel-live "systemctl status php8.3-fpm"
ssh bressel-live "tail -f /var/log/nginx/error.log"
ssh bressel-live "tail -f /var/log/mysql/error.log"
```

### DB Operations (Any Environment)
```bash
# Export local
docker exec bressel_db mysqldump -uroot -prootpassword123 bressel_db > local.sql

# Import to live
cat local.sql | ssh root@bressel-live "mysql -u bressel_user -psecurepassword123 bressel_db"

# Import local from live
ssh root@bressel-live "mysqldump -u bressel_user -psecurepassword123 bressel_db" > live.sql
docker exec -i bressel_db mysql -uroot -prootpassword123 bressel_db < live.sql

# Query specific table
docker exec bressel_db mysql -ubressel_user -psecurepassword123 bressel_db -e "SELECT ID, post_title, post_status FROM wp_posts WHERE post_type='coach'"

# Reset admin password
docker exec bressel_wpcli wp user update admin --user_pass=newpassword123 --allow-root
```

---

## 5. Execution Roadmap

### Week 1: Local CLI Mastery
| Task | Priority | Status |
|------|----------|--------|
| Update docker-compose.yml (persistent wpcli + SSH) | High | ⬜ |
| Add shell aliases to ~/.bashrc | High | ⬜ |
| Create backup script in ./scripts/ | Medium | ⬜ |
| Install mysql client on host | High | ⬜ |
| Create deploy.sh script | High | ⬜ |
| Test WP-CLI commands end-to-end | High | ⬜ |

### Week 2: Live Server Re-provisioning
| Task | Priority | Status |
|------|----------|--------|
| Check if existing DO droplet is recoverable | High | ⬜ |
| Create new DO droplet if needed | High | ⬜ |
| Provision LEMP stack | High | ⬜ |
| Install WordPress core | High | ⬜ |
| Configure Nginx + SSL | High | ⬜ |
| Setup SSH keys for deployment | High | ⬜ |
| Install WP-CLI on live | High | ⬜ |
| Test SSH → WP-CLI → DB flow | High | ⬜ |

### Week 3: Sync Pipeline
| Task | Priority | Status |
|------|----------|--------|
| rsync sync scripts (files) | High | ⬜ |
| DB import/export workflow | High | ⬜ |
| Full deploy.sh pipeline | High | ⬜ |
| Test local → live deployment | High | ⬜ |
| Setup .env on live server | Medium | ⬜ |
| Configure PHP-FPM for WordPress | Medium | ⬜ |
| Install required WP plugins on live | Medium | ⬜ |

### Week 4: Production Polish
| Task | Priority | Status |
|------|----------|--------|
| Install CMB2, Fluent Forms, SEO on live | High | ⬜ |
| Import local content to live DB | High | ⬜ |
| Configure WP-CLI aliases on live | Medium | ⬜ |
| Setup log rotation (nginx/mysql) | Low | ⬜ |
| Setup UFW firewall rules | Medium | ⬜ |
| Performance tuning (OPcache, PHP-FPM pool) | Medium | ⬜ |
| Nginx caching configuration | Medium | ⬜ |

---

## 6. Plugin Installation Plan (Live)

Install these on the live server via WP-CLI:

```bash
# On live server
ssh bressel-live <<'EOF'
wp plugin install cmb2 wp-graphql wp-graphql-cmb2 fluent-forms the-seo-framework enable-media-replace safe-svg wp-migrate-lite fluentsmtp --activate --allow-root
EOF
```

| Plugin | Purpose | Priority |
|--------|---------|----------|
| **CMB2** | Custom fields (coaches, merch, events) | Must |
| **WPGraphQL** | Expose WP content for future Astro integration | Must |
| **WPGraphQL CMB2** | Expose CMB2 fields to GraphQL | Must |
| **Fluent Forms** | Contact + Newsletter forms | Must |
| **The SEO Framework** | Lightweight SEO | Must |
| **Enable Media Replace** | Client QoL | Should |
| **Safe SVG** | Logo upload support | Should |
| **WP Migrate Lite** | Local → Live DB migration | Should |
| **FluentSMTP** | Email delivery | Should |
| **Imsanity** | Auto-resize uploads | Nice |
| **Elementor** | Visual edit escape hatch | Optional |

---

## 7. Directory Structure (Post-CLI Setup)

```
wp_bressel/
├── docker-compose.yml                    # Updated with persistent services
├── .env                                  # DB credentials
├── .ssh/config                           # SSH shortcuts
├── scripts/
│   ├── deploy.sh                         # Full deploy pipeline
│   ├── dump-db.sh                        # Database backup
│   ├── restore-db.sh                     # Database restore
│   ├── sync-files.sh                     # File sync to live
│   └── sync-db.sh                       # DB sync to live
├── backups/
│   ├── .gitignore                        # Don't track .sql files
│   └── (generated by dump-db.sh)
├── twentytwentyfour-bressel/             # Child theme
│   ├── components/                       # PHP component files
│   ├── dist/                             # Vite build output
│   ├── node_modules/
│   ├── src/
│   │   ├── css/
│   │   │   ├── main.css                  # Tailwind v4 entry
│   │   │   └── components/               # Component CSS
│   │   └── js/
│   │       └── main.js                   # Vanilla JS
│   ├── functions.php                     # Theme functions
│   ├── front-page.php                    # Homepage template
│   ├── header.php / footer.php
│   ├── archive-*.php / single-*.php
│   ├── page-*.php
│   ├── package.json
│   ├── vite.config.js
│   └── tailwind.config.js
├── docs/
│   ├── 001-project_master_plan.md
│   ├── 006-ai_agent_workflow_strategy.md
│   ├── 012-hybrid-astro-wp-architecture.md
│   └── 015-infrastructure-and-cli-mastery.md  ← THIS FILE
├── extra_flair/                          # Mockups, noise effects
└── extra_flair_2/                        # Real photos
```

---

## 8. Risk Matrix

| Risk | Impact | Mitigation |
|------|--------|------------|
| DO droplet permanently offline | High | Create new droplet from scratch |
| DB sync conflicts (local vs live) | Medium | Document merge strategy; use WP Migrate Lite |
| SSH key not authorized on live | Medium | Pre-add public key during droplet creation |
| rsync overwrites live uploads | Medium | Exclude `wp-content/uploads` from rsync |
| Vite build fails on server | Low | Build locally, rsync only dist/ |
| PHP-FPM memory exhaustion | Medium | Set `pm.max_children=10`, `pm.start_servers=2` |
| Nginx 502 errors | High | Check PHP-FPM status, increase `listen.backlog` |

---

**Last Updated:** 2026-04-20  
**Version:** 1.0
