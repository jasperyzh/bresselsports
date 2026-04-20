#!/bin/bash
# wp.sh — Universal WP-CLI wrapper for local Docker and live server
# Usage: ./wp.sh [local|live] [wp command...]
#
# Examples:
#   ./wp.sh local plugin list
#   ./wp.sh live post list --post_type=coach
#   ./wp.sh local db query "SELECT * FROM wp_users"
#   ./wp.sh live user list

set -e

ACTION="${1:-local}"
shift

if [ "$ACTION" = "local" ]; then
    docker exec bressel_wpcli wp --allow-root "$@"
elif [ "$ACTION" = "live" ]; then
    # WP-CLI on live server needs --path=/var/www/html
    ssh bressel-live "wp --path=/var/www/html --allow-root $*"
else
    echo "Usage: $0 [local|live] [wp command...]"
    echo ""
    echo "Examples:"
    echo "  $0 local plugin list"
    echo "  $0 live post list --post_type=coach"
    echo "  $0 local db query \"SELECT * FROM wp_users\""
    echo "  $0 live option get siteurl"
    exit 1
fi
