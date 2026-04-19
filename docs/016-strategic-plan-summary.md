# BRESSEL™ — Strategic Plan & Infrastructure Summary

**Date:** 2026-04-20  
**Version:** 1.0

---

## Executive Summary

The BRESSEL project is a WordPress child theme built on Twenty Twenty-Four, using Vite + Tailwind v4 for the frontend. We've built a solid foundation with custom post types, PHP components, CMB2 fields, and a complete design system. The next phase is establishing full CLI infrastructure — Docker WP-CLI, SSH access, database management, and live site deployment.

---

## 1. Current Architecture

### Stack
```
┌──────────────────────────────────────────────────────────┐
│  FRONTEND (Vite + Tailwind v4)                           │
│  ───────────────────────────────────                       │
│  • PHP Components (Astro-style, /components/*.php)       │
│  • Tailwind v4 (@layer base + @theme)                    │
│  • Vanilla JS (no jQuery)                                │
│  • HMR via Vite dev server (localhost:5173)              │
├──────────────────────────────────────────────────────────┤
│  BACKEND (WordPress Docker)                              │
│  ───────────────────────────────────                       │
│  • WordPress 6.x + PHP 8.3                               │
│  • MySQL 8.0                                             │
│  • CMB2 (custom fields)                                  │
│  • CPTs: coach, merch                                    │
│  • Fluent Forms (pending install)                        │
│  • The SEO Framework (pending install)                   │
├──────────────────────────────────────────────────────────┤
│  INFRASTRUCTURE                                          │
│  ───────────────────────────────────                       │
│  • Docker Compose (local dev)                            │
│  • DigitalOcean Droplet (live — needs re-provision)      │
│  • Git (local repo)                                      │
└──────────────────────────────────────────────────────────┘
```

### What's Built ✅
| Area | Status | Details |
|------|--------|---------|
| **Theme Core** | ✅ | functions.php, header.php, footer.php, templates |
| **Components** | ✅ | 20+ PHP components (button, card, accordion, etc.) |
| **CPTs** | ✅ | coach (10 slots), merch (10 slots) |
| **CMB2** | ✅ | Coach metadata, Merch metadata, Event metadata, Quote Carousel |
| **Templates** | ✅ | front-page, archive-coach, single-coach, archive-merch, single-merch, page-contact, page-about, page-academy, page-community |
| **Animations** | ✅ | Scroll fade-in, parallax hero, button ripple/glow |
| **Forms** | ⚠️ | Fluent Forms integration ready, forms need manual creation |
| **UI Demo** | ✅ | /ui-demo/ page with 13 component sections |
| **Content** | ✅ | 4 coaches, 7 merch items, 3 events, 1 announcement |
| **Navigation** | ✅ | Primary menu configured via WP-CLI |
| **Design System** | ✅ | BRESSEL brand tokens, Tailwind v4 @theme |

### What's Pending 🔄
| Area | Priority | Notes |
|------|----------|-------|
| **Fluent Forms** | Must | Manual creation in WP Admin (IDs 1 & 2) |
| **SEO Plugin** | Must | The SEO Framework install + config |
| **CMB2 Plugin** | Must | Needs installation on live server |
| **WPGraphQL** | Must | For future Astro integration |
| **Live Server** | Must | DO droplet needs re-provisioning |
| **SSL/Domain** | Must | bresselsports.com DNS + certbot |
| **Database Sync** | Must | Local → Live workflow |
| **Deploy Pipeline** | Must | rsync + npm build automation |

---

## 2. CLI Infrastructure (Just Completed)

### Docker Enhancements
- ✅ Updated `docker-compose.yml` to keep `wp-cli` container alive via `tail -f /dev/null`
- ✅ MySQL access via `docker exec bressel_db mysql ...`
- ✅ WP-CLI persistent access via `docker exec bressel_wpcli wp ...`

### Scripts Created
| Script | Purpose |
|--------|---------|
| `scripts/dump-db.sh` | Database backup (SQL + gzip) |
| `scripts/sync-db.sh` | DB sync between local ↔ live |
| `scripts/sync-files.sh` | File sync between local ↔ live |
| `scripts/deploy.sh` | Full deploy pipeline (build + sync + cache clear) |
| `scripts/wp.sh` | Universal WP-CLI wrapper |
| `scripts/aliases.sh` | Shell aliases for quick access |

### Shell Aliases (add to ~/.bashrc)
```bash
# Source the aliases file
source /home/matsu/Desktop/wp_bressel/scripts/aliases.sh
```

Key aliases:
- `wp-cli` — Run WP-CLI on local container
- `wp-db` — MySQL shell on local DB
- `wp-live` — SSH to live server
- `wp-deploy` — Full deployment pipeline
- `wp-dump` — Database backup
- `wp-admin` — Open admin panel
- `wp-up`/`wp-down` — Docker compose controls

---

## 3. Live Server (DigitalOcean) Status

### Current State
- **IP:** 46.101.172.116
- **SSH Port 22:** CLOSED (droplet may be stopped or firewall blocking)
- **HTTP/HTTPS:** Port 80/443 reachable but no response
- **MySQL:** Not exposed externally

### Action Required
1. Check DO dashboard for droplet status
2. Re-provision droplet (Ubuntu 22.04, 2GB RAM, s-2vcpu-4gb)
3. Run provisioning script from `015-infrastructure-and-cli-mastery-plan.md`
4. Set up LEMP stack + WordPress core
5. Configure DNS for bresselsports.com
6. Install WP plugins via WP-CLI

### Provisioning Checklist
```bash
# 1. Create droplet (via DO dashboard or API)
# 2. SSH + install LEMP (nginx + mysql + php-fpm)
# 3. Configure Nginx for WordPress
# 4. Setup database (bressel_db, bressel_user)
# 5. Install WordPress core
# 6. Configure SSL (certbot + Let's Encrypt)
# 7. Install WP-CLI on server
# 8. Install WP plugins via WP-CLI
# 9. Sync theme files + import content
# 10. Configure permalink structure
# 11. Set up UFW firewall
```

---

## 4. Deployment Workflow

### Local Development
```bash
# 1. Start environment
wp-up

# 2. Run Vite dev server for HMR
cd twentytwentyfour-bressel && npm run dev

# 3. Test site locally
open http://localhost:8080

# 4. Backup DB before changes
wp-dump

# 5. Make changes to theme files (HMR handles CSS/JS)
# 6. Run WP-CLI for DB operations
wp-cli plugin list --allow-root
wp-cli post list --post_type=coach --allow-root
```

### Production Deploy
```bash
# 1. Full deploy (build + sync + cache clear)
./scripts/deploy.sh production

# 2. Manual steps
./scripts/deploy.sh staging    # For testing first

# 3. Sync DB if needed
./scripts/sync-db.sh local-to-live
```

### Quick File Sync
```bash
# Just sync theme files (no rebuild)
./scripts/sync-files.sh local-to-live

# Pull changes from live to local
./scripts/sync-files.sh live-to-local
```

---

## 5. Plugin Installation Plan

### Must Install (via WP-CLI)
```bash
wp plugin install cmb2 fluent-forms the-seo-framework wp-graphql wp-graphql-cmb2 safe-svg --activate --allow-root
```

| Plugin | Purpose |
|--------|---------|
| **CMB2** | Custom fields (coaches, merch, events) |
| **Fluent Forms** | Contact + Newsletter forms |
| **The SEO Framework** | SEO meta + schema markup |
| **WPGraphQL** | API for future Astro integration |
| **WPGraphQL CMB2** | Expose CMB2 fields to GraphQL |
| **Safe SVG** | Logo upload support |
| **WP Migrate Lite** | Local → Live DB migration |
| **FluentSMTP** | Email delivery for forms |

---

## 6. Project Files Reference

| File | Purpose |
|------|---------|
| `docker-compose.yml` | Docker services (DB, WP, WP-CLI) |
| `twentytwentyfour-bressel/` | Child theme (functions, templates, components) |
| `docs/011-comprehensive-todo-list.md` | Detailed task tracker |
| `docs/014-ui-styling-phases.md` | Design system & CSS phases |
| `docs/015-infrastructure-and-cli-mastery-plan.md` | Full infra plan |
| `docs/016-strategic-plan-summary.md` | This file |
| `scripts/` | Deployment & CLI scripts |
| `backups/` | Database dumps |
| `extra_flair/` | Mockups, noise effects, SVGs |
| `extra_flair_2/` | Real team photos |

---

## 7. Quick Reference

### URLs
| URL | Purpose |
|-----|---------|
| `http://localhost:8080/` | Local site |
| `http://localhost:8080/wp-admin/` | Local admin |
| `http://localhost:8080/ui-demo/` | Component demo |
| `http://localhost:8080/academy/` | Coach archive |
| `http://localhost:8080/community/` | Events archive |
| `http://localhost:8080/shop/` | Merch archive |
| `http://localhost:8080/contact/` | Contact page |
| `http://localhost:8080/contact/?intent=booking` | Pre-filled contact |

### WP-CLI Quick Commands
```bash
# List all
docker exec bressel_wpcli wp --allow-root

# Specific CPTs
docker exec bressel_wpcli wp post list --post_type=coach --allow-root
docker exec bressel_wpcli wp post list --post_type=merch --allow-root

# User management
docker exec bressel_wpcli wp user list --allow-root
docker exec bressel_wpcli wp user update admin --user_pass=NEWPASS --allow-root

# Options
docker exec bressel_wpcli wp option get siteurl --allow-root
docker exec bressel_wpcli wp option update permalink_structure '/%postname%/' --allow-root

# Plugins
docker exec bressel_wpcli wp plugin install cmb2 --activate --allow-root
docker exec bressel_wpcli wp plugin list --allow-root
docker exec bressel_wpcli wp plugin activate fluent-forms --allow-root

# Database queries
docker exec bressel_wpcli wp db query "SELECT ID, post_title FROM wp_posts WHERE post_type='coach'" --allow-root
```

---

## 8. Next Immediate Actions

1. **Source aliases** — `source /home/matsu/Desktop/wp_bressel/scripts/aliases.sh`
2. **Check DO droplet** — Visit DO dashboard, see if droplet is running
3. **Re-provision if needed** — Follow `015-infrastructure-and-cli-mastery-plan.md`
4. **Install Fluent Forms** — Manual creation in WP Admin (ID 1 & 2)
5. **Install SEO plugin** — Via WP-CLI
6. **Run deploy pipeline** — `./scripts/deploy.sh` after server is up

---

**Last Updated:** 2026-04-20  
**Version:** 1.0
