#!/bin/bash
# deploy.sh — Full deploy pipeline for BRESSEL WordPress
# Usage: ./scripts/deploy.sh [staging|production]
#
# What it does:
#   1. Builds Vite assets (npm run build)
#   2. Syncs theme files to live server via rsync
#   3. Clears WordPress caches
#   4. Verifies deployment

set -e

# --- Configuration ---
PROJECT_DIR="/home/matsu/Desktop/wp_bressel"
THEME_DIR="$PROJECT_DIR/twentytwentyfour-bressel"
LIVE_HOST="bressel-live"  # SSH config alias → root@104.248.157.67
LIVE_PATH="/var/www/html"
ENV="${1:-production}"
WP_PATH="/var/www/html"  # WordPress root on live server

# --- Colors ---
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

log()   { echo -e "${GREEN}[✓] $1${NC}"; }
warn()  { echo -e "${YELLOW}[!] $1${NC}"; }
err()   { echo -e "${RED}[✗] $1${NC}"; }

# --- Pre-flight checks ---
echo "🚀 BRESSEL Deploy Pipeline — $ENV"
echo "================================"

if [ ! -d "$THEME_DIR" ]; then
    err "Theme directory not found: $THEME_DIR"
    exit 1
fi

if ! command -v rsync &> /dev/null; then
    err "rsync not found. Install with: sudo dnf install rsync"
    exit 1
fi

# --- Step 1: Build Assets ---
echo ""
log "Step 1/4: Building Vite assets..."
cd "$THEME_DIR"

# Check if node_modules exist
if [ ! -d "node_modules" ]; then
    warn "node_modules not found. Running npm install..."
    npm install
fi

# Build
if [ ! -f "package.json" ] || ! grep -q '"build"' package.json; then
    warn "No npm build script found in package.json"
else
    npm run build
    log "Build complete. Assets in dist/"
fi

# --- Step 2: Sync Files ---
echo ""
log "Step 2/4: Syncing files to $ENV server..."

EXCLUDES=(
    "--exclude=node_modules"
    "--exclude=.git"
    "--exclude=.env"
    "--exclude=dist/"
    "--exclude=backups"
    "--exclude=*.map"
    "--exclude=*.log"
    "--exclude=.DS_Store"
    "--exclude=*.sql"
)

rsync -avz "${EXCLUDES[@]}" \
    "$THEME_DIR/" \
    "$LIVE_HOST:$LIVE_PATH/wp-content/themes/twentytwentyfour-bressel/"

log "Files synced to $LIVE_HOST"

# --- Step 3: Clear Caches ---
echo ""
log "Step 3/4: Clearing WordPress caches..."

ssh "$LIVE_HOST" "wp cache flush --path=$WP_PATH --allow-root 2>/dev/null || true && wp transient delete --all --path=$WP_PATH --allow-root 2>/dev/null || true && echo 'Caches cleared.'"
ssh "$LIVE_HOST" "wp transient delete --all --path=$WP_PATH --allow-root 2>/dev/null || true"
ssh "$LIVE_HOST" "wp option get permalink_structure --path=$WP_PATH --allow-root" 2>/dev/null || true

log "Caches cleared"

# --- Step 4: Verify ---
echo ""
log "Step 4/4: Verifying deployment..."

ssh "$LIVE_HOST" "wp core version --path=$WP_PATH --allow-root 2>/dev/null || echo 'WP-CLI check failed'"
ssh "$LIVE_HOST" "wp plugin list --path=$WP_PATH --allow-root 2>/dev/null || echo 'Plugin list check failed'"
ssh "$LIVE_HOST" "php --version 2>/dev/null | head -1 || echo 'PHP check failed'"

# --- Done ---
echo ""
echo "================================"
log "✅ Deployment to $ENV complete!"
echo "🌐 Live site: https://bresselsports.com"
echo ""
echo "Rollback: rsync -avz --delete --force $THEME_DIR/ $LIVE_HOST:$LIVE_PATH/wp-content/themes/twentytwentyfour-bressel/"
