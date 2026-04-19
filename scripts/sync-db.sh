#!/bin/bash
# sync-db.sh — Sync local DB to live server (or vice versa)
# Usage: ./scripts/sync-db.sh [local-to-live|live-to-local]

set -e

BACKUP_DIR="/home/matsu/Desktop/wp_bressel/backups"
mkdir -p "$BACKUP_DIR"

LIVE_HOST="bressel-live"
LIVE_DB_USER="bressel_user"
LIVE_DB_PASS="securepassword123"
LIVE_DB_NAME="bressel_db"

TEMP_DUMP="$BACKUP_DIR/.tmp-sync-$(date +%s).sql"

case "${1:-local-to-live}" in
    local-to-live)
        echo "📤 Syncing local DB → live server..."
        echo "   Step 1: Dump local DB..."
        docker exec bressel_db mysqldump \
            -uroot -prootpassword123 \
            --single-transaction \
            bressel_db > "$TEMP_DUMP"

        echo "   Step 2: Upload to live server..."
        cat "$TEMP_DUMP" | ssh "$LIVE_HOST" "mysql -u$LIVE_DB_USER -p$LIVE_DB_PASS $LIVE_DB_DB_NAME"

        echo "   Step 3: Clear caches..."
        ssh "$LIVE_HOST" "wp cache flush --allow-root 2>/dev/null || true"

        rm -f "$TEMP_DUMP"
        echo "✅ Local → Live sync complete!"
        ;;

    live-to-local)
        echo "📥 Syncing live DB → local..."
        echo "   Step 1: Dump from live server..."
        ssh "$LIVE_HOST" "mysqldump -u$LIVE_DB_USER -p$LIVE_DB_PASS $LIVE_DB_NAME" > "$TEMP_DUMP"

        echo "   Step 2: Import to local..."
        docker exec -i bressel_db mysql -uroot -prootpassword123 bressel_db < "$TEMP_DUMP"

        echo "   Step 3: Verify..."
        docker exec bressel_wpcli wp post count --post_type=coach --allow-root 2>/dev/null || echo "WP-CLI not available on local"

        rm -f "$TEMP_DUMP"
        echo "✅ Live → Local sync complete!"
        ;;

    *)
        echo "Usage: $0 [local-to-live|live-to-local]"
        exit 1
        ;;
esac
