# 🎾 BRESSEL™ Padel - Lean WordPress Framework

**World-class padel, within reach.**

BRESSEL Padel is a high-performance, modern padel coach and community website. It is built for quick iteration and perfect brand alignment using a tightly controlled, decoupled-feeling Developer Experience (DX) inside a monolithic WordPress environment.

## 🚀 Quick Start

```bash
# 1. Run Docker containers to spin up WordPress and MySQL
docker compose up -d

# 2. Enter the theme directory to install frontend dependencies
cd twentytwentyfour-bressel
npm install

# 3. Build assets (development mode, runs on localhost:5173 with HMR)
npm run dev

# 4. Or build static assets (production mode)
npm run build
```

## 🏗️ Architecture

- **Theme:** `twentytwentyfour-bressel` (Custom child theme based on Twenty Twenty-Four)
- **Styling:** Tailwind CSS v4 with a classless base layer, natively compiled.
- **Build Tool:** Vite plugins for instant Hot Module Replacement (HMR).
- **Components:** Astro-style PHP components in `/components/` for templating code separation.

## 📁 Project Structure

The root of this project is purely for WordPress/Docker scaffolding.

```text
/
├── docker-compose.yml                  # Barebones WP & DB infrastructure via Docker
├── twentytwentyfour-bressel/           # The specialized child theme mapping into WP
│   ├── components/                     # Reusable PHP partials
│   ├── package.json                    # Frontend Vite dependencies
│   ├── vite.config.js                  # Vite builder
│   ├── style.css                       # WP Theme declaration
│   ├── functions.php                   # Theme setup, CPTs, Vite hooks
│   ├── main.js & main.css              # Entrypoints for JS & Tailwind
│   └── dist/                           # (Generated) Production assets
└── README.md                           # This document
```

## 🎨 Brand Guidelines

- **Colors:** Deep Black backgrounds, Clean White text, and **Bressel Red (#E62E2D)** accents.
- **Tone/Voice:** Direct, energizing, human. Short sentences. Strong verbs. No fluff.
- **Typography:** Bold sans-serif with a momentum-driven feel.

## 🛠️ Development Workflow

1. Edit PHP components inside `twentytwentyfour-bressel/components/`.
2. Tailwind CSS v4 auto-compiles smoothly via Vite natively.
3. Live reload triggers instantly on file changes when `npm run dev` is running.
4. View your WordPress instance at `http://localhost:8080`.

## 🔌 Plugin Stack

This framework is built lean. Avoid bloat. Core suggested plugins are:

- **CMB2 / Custom Fields:** Fast, code-first data management.
- **Fluent Forms:** Bookings, inquiries, and contact forms.
- **The SEO Framework:** Extremely lightweight automatic SEO optimization.
- **Safe SVG, Imsanity:** QoL for safe vector and compressed client image uploads.
- **WPZOOM Social Feed:** Clean Instagram integrations.
- **FluentSMTP:** Reliable local & production email routing.
