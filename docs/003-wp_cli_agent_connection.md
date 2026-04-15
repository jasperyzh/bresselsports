# 🤖 Agent Connection to WordPress (Option A: WP-CLI)

This guide explains how an AI agent (or any CLI tool) can programmatically interact with the BRESSEL WordPress instance using **WP-CLI** via Docker. This is the preferred method for the BRESSEL framework as it is fast, secure, and requires no extra plugins.

## 🏗️ Architecture

The AI agent sits outside the Docker container and executes commands into the `bressel_wordpress` container using `docker exec`.

```text
[ AI Agent ] --(bash tool)--> [ Docker Host ] --(docker exec)--> [ WP-CLI in WordPress Container ]
```

## 🛠️ Setup Instructions

### 1. Ensure WP-CLI is Available
The standard `wordpress:latest` image does not include WP-CLI. We use the `wordpress:cli` image or install it manually in the container. To keep it lean, we add a `wp-cli` service to our `docker-compose.yml`.

### 2. Common Commands for Agents
To update the website, the agent will typically run:

```bash
# Create a new page and assign a template
docker compose run --rm wp-cli post create --post_type=page --post_title="Junior Program" --post_status=publish --meta_input='{"_wp_page_template":"page-junior.php"}'

# Create a Coach CPT entry with metadata
docker compose run --rm wp-cli post create --post_type=coach --post_title="Marco Bressel" --post_status=publish --meta_input='{"_bressel_coach_role":"Head Coach","_bressel_coach_experience":"15 Years"}'

# Set the static front page
docker compose run --rm wp-cli option update show_on_front 'page'
docker compose run --rm wp-cli option update page_on_front <ID>
```

## 🚀 Automation Script (`setup-wp-content.sh`)
BRESSEL includes a `setup-wp-content.sh` script that the AI agent can run to instantly scaffold the site structure, create dummy content, and verify the theme settings.

## 🔒 Security Note
Since this method uses `docker exec`, it relies on local access to the Docker daemon. In production environments, this would typically be handled via a CI/CD runner or a secure SSH tunnel.
