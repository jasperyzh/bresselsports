# WordPress Framework Setup & Architecture

This repository uses a streamlined Docker setup combined with a modern Vite build chain entirely encapsulated within a custom WordPress child theme.

## Architecture 

The root of this project is purely for **Docker Scaffolding** and documentation. We use the standard `wordpress:latest` image mapped to an ephemeral container, which means we do not track generic WordPress files in git. 

Instead, we inject our specific child-theme directly into the running WordPress container.

### Directory Structure

```text
/
├── docker-compose.yml                  # Barebones WP & DB infrastructure
├── twentytwentyfour-bressel/           # The specialized child theme
│   ├── components/                     # PHP partials
│   ├── package.json                    # Frontend dependencies
│   ├── vite.config.js                  # Vite builder
│   ├── tailwind.config.js              # Tailwind configurator
│   ├── style.css                       # WP Theme declaration
│   ├── functions.php                   # Magic Vite logic inside
│   ├── main.js & main.css              # Entrypoints for JS & Tailwind
│   └── dist/                           # (Generated) Production assets via Vite
├── check.sh                            # CI checks
└── readme-project_first_setup.md       # This document
```

## First Time Setup

Follow these steps to initialize the environment:

### 1. Launch WordPress via Docker

Ensure Docker Desktop or the Docker daemon is running, then run from the project root:

```bash
docker compose up -d
```
Docker will pull the latest MySQL and WordPress images, create the network, and inject the `twentytwentyfour-bressel` child theme folder into `/var/www/html/wp-content/themes/twentytwentyfour-bressel`. 

### 2. Install Theme Dependencies

Open a new terminal, and move into the theme folder. All npm actions happen inside the theme where they belong:

```bash
cd twentytwentyfour-bressel
npm install
```

### 3. Start the Development Server

Next, boot up the Vite dev server. It runs on `http://localhost:5173` and handles hot module replacement (HMR). 

```bash
npm run dev
```

*Note:* Because `docker-compose.yml` configures `WORDPRESS_CONFIG_EXTRA` to define the environment as `'development'`, your WordPress installation (accessible at `http://localhost:8080`) will dynamically inject the Vite dev client. As you edit CSS or JS or PHP components, Vite will immediately push the changes to your browser without page reloads.

## Building for Production

When it is time to deploy or push finalized changes, you create a static production build.

```bash
cd twentytwentyfour-bressel
npm run build
```

This will strip out the dev server dependencies and output minified, optimized JS and CSS (including your Tailwind styles) into the `/dist/` folder alongside a `manifest.json`.

In a production environment (when `WP_ENVIRONMENT_TYPE` is *not* `development`), `functions.php` will automatically detect the `/dist/.vite/manifest.json` and cleanly enqueue the optimized production assets.
