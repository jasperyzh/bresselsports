#!/bin/bash
# sync-files.sh — Sync theme files between local and live
# Usage: ./scripts/sync-files.sh [local-to-live|live-to-local]

set -e

THEME_DIR="/home/matsu/Desktop/wp_bressel/twentytwentyfour-bressel"
LIVE_HOST="bressel-live"
LIVE_PATH="/var/www/html/wp-content/themes/twentytwentyfour-bressel"

EXCLUDES=(
    "--exclude=node_modules"
    "--exclude=.git"
    "--exclude=.env"
    "--exclude=dist/"
    "--exclude=*.map"
    "--exclude=*.log"
)

case "${1:-local-to-live}" in
    local-to-live)
        echo "📤 Syncing theme files → live server..."
        rsync -avz "${EXCLUDES[@]}" \
            "$THEME_DIR/" \
            "$LIVE_HOST:$LIVE_PATH/"
        echo "✅ Sync complete!"
        echo ""
        echo "Optional: Run ./scripts/deploy.sh to also build assets and clear caches"
        ;;

    live-to-local)
        echo "📥 Syncing theme files from live server → local..."
        rsync -avz "${EXCLUDES[@]}" \
            "$LIVE_HOST:$LIVE_PATH/" \
            "$THEME_DIR/"
        echo "✅ Sync complete!"
        ;;

    *)
        echo "Usage: $0 [local-to-live|live-to-local]"
        exit 1
        ;;
esac
