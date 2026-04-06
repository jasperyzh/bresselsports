#!/bin/bash

# BRESSEL WordPress Content Scaffolding Script
# This script uses WP-CLI to set up the initial content for the BRESSEL framework.

set -e

echo "🚀 Starting BRESSEL content scaffolding..."

# Helper function to run wp-cli
wp_cmd() {
    docker compose run --rm wp-cli "$@"
}

# 1. Wait for database/WordPress to be ready
echo "⏳ Waiting for WordPress and Database to be ready..."
MAX_TRIES=30
TRIES=0
until wp_cmd eval "echo 'ready';" &> /dev/null; do
  TRIES=$((TRIES+1))
  if [ $TRIES -ge $MAX_TRIES ]; then
    echo "❌ Timeout waiting for WordPress."
    exit 1
  fi
  echo "Still waiting ($TRIES/$MAX_TRIES)..."
  sleep 3
done

# 2. Core Install (if needed)
echo "🔧 Checking for WordPress installation..."
if ! wp_cmd core is-installed &> /dev/null; then
    echo "📥 Installing WordPress core..."
    wp_cmd core install \
        --url="http://localhost:8080" \
        --title="BRESSEL Padel" \
        --admin_user="admin" \
        --admin_password="securepassword123" \
        --admin_email="admin@bresselpadel.com" \
        --skip-email
    echo "✅ WordPress installed."
else
    echo "✅ WordPress already installed."
fi

# 3. Theme Activation
echo "🎨 Activating BRESSEL theme..."
wp_cmd theme activate twentytwentyfour-bressel

# 4. Basic Setup
echo "🔧 Configuring WordPress settings..."
wp_cmd option update blogname "BRESSEL Padel"
wp_cmd option update blogdescription "World-class padel, within reach."

# 5. Create Core Pages
echo "📄 Creating core pages..."

# Front Page
if ! wp_cmd post list --post_type=page --title="Home" --format=ids &> /dev/null || [ -z "$(wp_cmd post list --post_type=page --title="Home" --format=ids)" ]; then
    FRONT_PAGE_ID=$(wp_cmd post create --post_type=page --post_title="Home" --post_status=publish --porcelain)
    wp_cmd option update show_on_front 'page'
    wp_cmd option update page_on_front $FRONT_PAGE_ID
    echo "🏠 Created Home page."
else
    echo "🏠 Home page already exists."
fi

# Junior Program
if [ -z "$(wp_cmd post list --post_type=page --title="Junior Program" --format=ids)" ]; then
    wp_cmd post create --post_type=page --post_title="Junior Program" --post_status=publish --meta_input='{"_wp_page_template":"page-junior.php"}'
    echo "🎾 Created Junior Program page."
fi

# About
if [ -z "$(wp_cmd post list --post_type=page --title="About" --format=ids)" ]; then
    wp_cmd post create --post_type=page --post_title="About" --post_status=publish --meta_input='{"_wp_page_template":"page-about.php"}'
    echo "📖 Created About page."
fi

# Contact
if [ -z "$(wp_cmd post list --post_type=page --title="Contact" --format=ids)" ]; then
    wp_cmd post create --post_type=page --post_title="Contact" --post_status=publish --meta_input='{"_wp_page_template":"page-contact.php"}'
    echo "📞 Created Contact page."
fi

# 6. Create Dummy Coaches
echo "🎾 Creating dummy coaches..."
# Only create if they don't exist yet (check for one)
if [ -z "$(wp_cmd post list --post_type=coach --title="Marco Bressel" --format=ids)" ]; then
    wp_cmd post create --post_type=coach --post_title="Marco Bressel" --post_status=publish --meta_input='{"_bressel_coach_role":"Founder & Head Coach","_bressel_coach_experience":"20+ Years"}'
    wp_cmd post create --post_type=coach --post_title="Lucia Sanz" --post_status=publish --meta_input='{"_bressel_coach_role":"Technical Director","_bressel_coach_experience":"12 Years"}'
    wp_cmd post create --post_type=coach --post_title="Diego Rivera" --post_status=publish --meta_input='{"_bressel_coach_role":"Junior Coordinator","_bressel_coach_experience":"8 Years"}'
    echo "🎾 Created 3 coaches."
fi

# 7. Create Dummy Merch
echo "🎒 Creating dummy merchandise..."
if [ -z "$(wp_cmd post list --post_type=merch --title="BRESSEL Pro Racket" --format=ids)" ]; then
    wp_cmd post create --post_type=merch --post_title="BRESSEL Pro Racket" --post_status=publish --meta_input='{"_bressel_merch_price":"249"}'
    wp_cmd post create --post_type=merch --post_title="Technical Performance Tee" --post_status=publish --meta_input='{"_bressel_merch_price":"45"}'
    wp_cmd post create --post_type=merch --post_title="Pro Court Shoes" --post_status=publish --meta_input='{"_bressel_merch_price":"120"}'
    echo "🎒 Created 3 merch items."
fi

# 8. Create Dummy Events
echo "📅 Creating dummy events..."
if [ -z "$(wp_cmd post list --post_type=event --title="BRESSEL Open 2026" --format=ids)" ]; then
    wp_cmd post create --post_type=event --post_title="BRESSEL Open 2026" --post_status=publish --post_excerpt="The biggest padel tournament of the year is coming to Madrid. Register now."
    wp_cmd post create --post_type=event --post_title="Summer Junior Intensive" --post_status=publish --post_excerpt="A 2-week high-performance camp for players aged 12-18."
    echo "📅 Created 2 events."
fi

echo "✅ Scaffolding complete! Visit http://localhost:8080 to see the result."

