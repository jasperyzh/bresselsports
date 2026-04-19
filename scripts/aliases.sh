#!/bin/bash
# BRESSEL™ Shell Aliases
# Source this file: source /home/matsu/Desktop/wp_bressel/scripts/aliases.sh
# Or add to ~/.bashrc / ~/.zshrc

# --- Docker Compose ---
alias wp-up='docker compose -f /home/matsu/Desktop/wp_bressel/docker-compose.yml up -d'
alias wp-down='docker compose -f /home/matsu/Desktop/wp_bressel/docker-compose.yml down'
alias wp-restart='docker compose -f /home/matsu/Desktop/wp_bressel/docker-compose.yml restart'
alias wp-logs='docker compose -f /home/matsu/Desktop/wp_bressel/docker-compose.yml logs -f wordpress'
alias wp-db-logs='docker compose -f /home/matsu/Desktop/wp_bressel/docker-compose.yml logs -f db'

# --- WP-CLI (local) ---
alias wp-cli='docker exec bressel_wpcli wp --allow-root'
alias wp-cli-status='wp-cli core check-update --allow-root && wp-cli plugin list --allow-root'
alias wp-cli-users='wp-cli user list --allow-root'
alias wp-cli-posts='wp-cli post list --allow-root --fields=ID,post_title,post_status'

# --- Database ---
alias wp-db='docker exec bressel_db mysql -ubressel_user -psecurepassword123 bressel_db'
alias wp-db-root='docker exec bressel_db mysql -uroot -prootpassword123'
alias wp-dump='./scripts/dump-db.sh'
alias wp-import-live='cat backups/db-latest.sql | ssh root@bressel-live "mysql -u bressel_user -psecurepassword123 bressel_db"'

# --- WordPress URLs ---
alias wp-admin='open http://localhost:8080/wp-admin/'
alias wp-login='open http://localhost:8080/wp-login.php'
alias wp-site='open http://localhost:8080/'
alias wp-ui-demo='open http://localhost:8080/ui-demo/'

# --- SSH & Live Server ---
alias wp-live='ssh root@bressel-live'
alias wp-live-status='ssh root@bressel-live "wp --allow-root core version && wp --allow-root plugin list"'
alias wp-live-db='ssh root@bressel-live "wp db query --allow-root"'
alias wp-live-ssh='ssh root@bressel-live'
alias wp-live-logs='ssh root@bressel-live "tail -f /var/log/nginx/error.log"'
alias wp-live-php='ssh root@bressel-live "tail -f /var/log/php-fpm/error.log"'

# --- Deployment ---
alias wp-deploy='./scripts/deploy.sh'
alias wp-sync='./scripts/sync-files.sh local-to-live'
alias wp-sync-db='./scripts/sync-db.sh local-to-live'

# --- Theme Dev ---
alias cd-theme='cd /home/matsu/Desktop/wp_bressel/twentytwentyfour-bressel'
alias npm-dev='cd /home/matsu/Desktop/wp_bressel/twentytwentyfour-bressel && npm run dev'
alias npm-build='cd /home/matsu/Desktop/wp_bressel/twentytwentyfour-bressel && npm run build'

# --- Quick Commands ---
alias wp-reset='docker exec bressel_wpcli wp db reset --allow-root --yes && docker exec bressel_wpcli wp core install --url=localhost --title=Bressel --admin_user=admin --admin_password=password --admin_email=admin@bressel.local --skip-email --allow-root'
alias wp-search-replace='wp-cli search-replace'
alias wp-clear-cache='wp-cli cache flush --allow-root && wp-cli transient delete --all --allow-root'

# --- Monitoring ---
alias docker-ps='docker ps --filter name=bressel*'
alias disk-usage='du -sh /home/matsu/Desktop/wp_bressel/* 2>/dev/null | sort -rh | head -20'
