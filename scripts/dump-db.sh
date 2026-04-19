#!/bin/bash
# dump-db.sh — Database backup for BRESSEL WordPress
# Usage: ./scripts/dump-db.sh [backup-name]
#
# Creates a timestamped SQL dump of the local WordPress database

set -e

PROJECT_DIR="/home/matsu/Desktop/wp_bressel"
BACKUP_DIR="$PROJECT_DIR/backups"
TIMESTAMP=$(date +%Y%m%d-%H%M%S)
FILENAME="${1:-db-$TIMESTAMP}.sql"
FULL_PATH="$BACKUP_DIR/$FILENAME"

# Ensure backup directory exists
mkdir -p "$BACKUP_DIR"

echo "📦 Dumping WordPress database..."
echo "   Target: $FULL_PATH"

docker exec bressel_db mysqldump \
    -uroot \
    -prootpassword123 \
    --single-transaction \
    --routines \
    --triggers \
    --events \
    bressel_db > "$FULL_PATH"

FILESIZE=$(du -h "$FULL_PATH" | cut -f1)
echo "✅ Database dump complete!"
echo "   Size: $FILESIZE"
echo "   Location: $FULL_PATH"

# Also create a compressed version
echo "🗜️  Compressing..."
gzip -k "$FULL_PATH"
echo "✅ Compressed backup: ${FULL_PATH}.gz"
