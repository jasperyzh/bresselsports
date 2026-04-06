# 🛠️ Infrastructure Runbook: LEMP Stack Deployment

**Project:** BRESSEL™ PoC Environment  
**Target OS:** Ubuntu 22.04 LTS  
**Architecture:** LEMP (Linux, Nginx, MariaDB, PHP-FPM)

This document outlines the manual process of provisioning a high-performance WordPress environment on a bare-metal DigitalOcean Droplet.

---

## 📋 Prerequisites
- A DigitalOcean account with an active Droplet (Ubuntu 22.04).
- SSH access via terminal (local machine).
- A strong root password or SSH Key configured.

## 🚀 Phase 1: Server Hardening & Initial Setup

### 1.1 Secure Connection
Connect to the remote instance via SSH:
```bash
ssh root@<YOUR_DROPLET_IP>
```

### 1.2 System Updates
Ensure all system packages and security patches are current:
```bash
apt update && apt upgrade -y
```

---

## 🏗️ Phase 2: Installing the LEMP Stack

### 2.1 Web Server (Nginx)
Install Nginx to handle high-concurrency web traffic:
```bash
apt install nginx -y
```

### 2.2 Database (MariaDB)
Install MariaDB and run the security script to harden the installation:
```bash
apt install mariadb-server -y
mysql_secure_installation
```
*During setup: Remove anonymous users, disallow remote root login, and remove test databases.*

### 2.3 PHP Engine (PHP-FPM)
Install PHP 8.1 and the necessary extensions for WordPress functionality:
```bash
apt install php-fpm php-mysql php-curl php-gd php-intl php-mbstring php-soap php-xml php-xmlrpc php-zip -y
```

---

## ⚙️ Phase 3: Configuration & Bridging

### 3.1 Nginx Server Block (The Bridge)
Create a site configuration to link Nginx to PHP-FPM:
```bash
nano /etc/nginx/sites-available/bressel_poc
```

**Configuration Content:**
```nginx
server {
    listen 80;
    listen [::]:80;

    server_name _;

    root /var/www/html;
    index index.php index.html index.htm;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### 3.2 Activating the Site
Enable the new configuration and disable the default Nginx landing page:
```bash
ln -s /etc/nginx/sites-available/bressel_poc /etc/nginx/sites-enabled/
rm /etc/nginx/sites-enabled/default
nginx -t && systemctl restart nginx
```

---

## 💾 Phase 4: Database & WordPress Deployment

### 4.1 Database Provisioning
Login to MariaDB and create a dedicated user and database for security:
```bash
mysql -u root -p
```

**SQL Commands:**
```sql
CREATE DATABASE bressel_db;
CREATE USER 'bressel_user'@'localhost' IDENTIFIED BY '<SECURE_PASSWORD>';
GRANT ALL PRIVILEGES ON bressel_db.* TO 'bressel_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 4.2 WordPress Installation
Download, extract, and move the WordPress core files into the web root:
```bash
cd /var/www/html
rm -rf *
wget https://wordpress.org/latest.tar.gz
tar -xzvf latest.tar.gz
mv wordpress/* .
rm -rf wordpress latest.tar.gz
```

### 4.3 File Permissions (The Critical Step)
To allow WordPress to manage plugins, themes, and uploads, the web server user (`www-data`) must own the files:
```bash
chown -R www-data:www-data /var/www/html
find /var/www/html -type d -exec chmod 755 {} \;
find /var/www/html -type f -exec chmod 644 {} \;
```

---

## 🏁 Phase 5: Final Verification

### 5.1 PHP Connectivity Test
To verify that Nginx is successfully communicating with PHP-FPM, create a test file:
```bash
echo "<?php phpinfo(); ?>" > /var/www/html/info.php
```
Access `http://<YOUR_IP>/info.php` in your browser.

### 5.2 WordPress Installation Wizard
Navigate to `http://<YOUR_IP>/` to begin the WordPress setup. Use the following credentials:
- **Database Name:** `bressel_db` 
- **Username:** `bressel_user` 
- **Password:** `<THE_PASSWORD_CREATED_IN_STEP_4.1>` 
- **Database Host:** `localhost` 

---

## 🛡️ Post-Deployment Security Checklist
- [ ] Disable `info.php` after verification (`rm /var/www/html/info.php`).
- [ ] Install an SSL certificate (Let's Encrypt/Certbot).
- [ ] Update Nginx configuration to use HTTPS.
- [ ] Configure a Firewall (`ufw`) to only allow SSH, HTTP, and HTTPS ports.