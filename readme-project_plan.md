Here is the comprehensive, unified `readme-bressel_project_plan.md` document. It seamlessly combines your brand context, lean development framework, current Docker/Vite setup, and the AI Swarm workflow into a single source of truth.

***

```markdown
# 🚀 BRESSEL™ Project Plan & Master Framework

## 📌 Project Context
A high-performance, modern padel coach and community website. Built for quick iteration, lean development, and perfect brand alignment using a tightly controlled AI + Docker + Vite stack.

*   **Positioning:** "World-class padel, within reach."
*   **Tone/Voice:** Direct, Energizing, Human. Short sentences, strong verbs. No fluff.
*   **Visual Identity:** 
    *   Colors: Deep Black (Backgrounds), Clean White (Text), Bressel Red (Accent/Surge).
    *   Typography: Bold, momentum-driven sans-serif.
*   **Core Pillars:** Academy (Coaches), Community (Clubs/Events), PRO/SNS (Merch).

---

## 🏗️ Architecture & Tech Stack
A decoupled-feeling Developer Experience (DX) inside a monolithic WordPress environment. 

*   **Environment:** Docker (reproducible, lightweight ephemeral containers).
*   **Theme:** Native WP Child Theme (`twentytwentyfour-bressel`) for 5-year+ future-proofing.
*   **Styling:** Tailwind CSS v4.
*   **Build Tool:** Vite + HMR (Hot Module Replacement) for instant CSS/PHP reloads.
*   **AI Agent Workflow:** Two-tier Orchestrator + Swarm setup (Google Antigravity/Claude/Aider).

### Directory Structure
The root is purely for Docker scaffolding and configuration. We do not track generic WP files, only our child theme injected into the container.

```text
/
├── docker-compose.yml                  # Barebones WP & DB infrastructure
├── twentytwentyfour-bressel/           # The specialized child theme
│   ├── components/                     # Astro-style PHP partials
│   ├── package.json                    # Frontend dependencies
│   ├── vite.config.js                  # Vite builder
│   ├── tailwind.config.js              # Tailwind configurator
│   ├── style.css                       # WP Theme declaration
│   ├── functions.php                   # Magic Vite logic inside
│   ├── main.js & main.css              # Entrypoints for JS & Tailwind
│   └── dist/                           # (Generated) Production assets via Vite
├── check.sh                            # CI checks for AI Agents
└── readme-bressel_project_plan.md      # This document
```

---

## 💻 Local Development & Setup Guide

### 1. Launch WordPress via Docker
Ensure Docker Desktop or the Docker daemon is running, then run from the project root:
```bash
docker compose up -d
```
Docker pulls the latest MySQL/WP images, creates the network, and injects the `twentytwentyfour-bressel` child theme folder into `/var/www/html/wp-content/themes/twentytwentyfour-bressel`.

### 2. Install Theme Dependencies
Open a new terminal and move into the theme folder:
```bash
cd twentytwentyfour-bressel
npm install
```

### 3. Start the Development Server
Boot up the Vite dev server (runs on `http://localhost:5173` for HMR):
```bash
npm run dev
```
*Note:* Because `docker-compose.yml` sets `WORDPRESS_CONFIG_EXTRA` to environment `'development'`, WordPress (`http://localhost:8080`) dynamically injects the Vite dev client. Edits to CSS/JS/PHP trigger instant browser updates.

### 4. Building for Production
Create a static production build before deployment:
```bash
npm run build
```
This strips dev dependencies and outputs minified, optimized JS/CSS into `/dist/` alongside a `manifest.json`. `functions.php` automatically detects this manifest and cleanly enqueues production assets when `WP_ENVIRONMENT_TYPE` is not `development`.

---

## 🛠️ Code Paradigms & Best Practices

### 1. Astro-Style Components in PHP
Treat WP template parts like Astro components. Pass data cleanly using `$args` to separate UI from logic.

**`twentytwentyfour-bressel/components/coach-card.php`**
```php
<?php
// Astro-like "Frontmatter"
$name  = $args['name'] ?? 'Padel Coach';
$image = $args['image'] ?? site_url('/dist/images/default-coach.jpg');
$role  = $args['role'] ?? 'Head Coach';
?>
<div class="flex flex-col bg-zinc-900 rounded-lg overflow-hidden shadow-lg">
    <img src="<?= esc_url($image) ?>" alt="<?= esc_attr($name) ?>" class="object-cover w-full h-64" />
    <div class="p-6">
        <h3 class="text-white text-xl font-bold uppercase"><?= esc_html($name) ?></h3>
        <p class="text-bressel-red mb-4"><?= esc_html($role) ?></p>
        <?php get_template_part('components/button', null,['text' => 'Book Session']); ?>
    </div>
</div>
```

### 2. Classless Tailwind Base
**`twentytwentyfour-bressel/main.css`**
```css
@tailwind base;
@tailwind components;
@tailwind utilities;

@layer base {
  h1, h2, h3 {
    @apply font-bold text-zinc-900 uppercase tracking-wide;
  }
  p {
    @apply leading-relaxed text-zinc-700 mb-4;
  }
  a {
    @apply text-[#E62E2D] hover:underline transition-colors; /* Bressel Red */
  }
}
```

### 3. Lean E-Commerce & Client Management
*   **No WooCommerce:** Use a `Merch` CPT with CMB2 price fields. Use a Fluent Form popup ("Inquire to Buy").
*   **No Booking Plugins:** Use Fluent Forms with dynamic hidden fields capturing the Coach's name/Event title.
*   **Client-Proof Admin:** Hide `Themes`, `Plugins`, and `Settings` for the `Editor` role.

---

## 🔌 The Ultimate Lean Plugin Stack
Avoid bloat at all costs. 

*   **CMB2:** Custom Fields and Options Pages (Code-based, fast).
*   **Custom Post Type UI:** Rapid CPT prototyping (or write natively).
*   **Fluent Forms:** Coach bookings, merch inquiries, contact forms.
*   **The SEO Framework:** Extremely lightweight SEO.
*   **Imsanity:** Automatically scales massive 10MB+ client image uploads.
*   **Enable Media Replace:** Client Quality of Life (QoL) improvement.
*   **Safe SVG:** Allows crisp vector logo uploads.
*   **WPZOOM Social Feed:** Lightweight Instagram feed.
*   **WP Migrate Lite:** Seamless local-to-production DB migrations.
*   **FluentSMTP:** Free, reliable email routing.
*   **Elementor (Optional):** Deactivated by default. Use purely as a `template-canvas.php` escape hatch if needed.

---

## 🧠 AI Orchestration Workflow (The BRESSEL Swarm)
We use a two-tier AI workflow. The **Orchestrator** knows the business; the **Coding Agents** know the code.

### The 5-Step Automated Workflow
1.  **Orchestrator Scoping:** Paste client requests into the Orchestrator (Claude 3.5/GPT-4). It spits out isolated task prompts.
2.  **Agent Isolation:** Spawn coding agents in Git Worktrees so they don't break existing features.
    ```bash
    git worktree add ../feat-bressel-merch -b feat/merch main
    ```
3.  **Local CI (`check.sh`):** Before making a PR, the agent runs the root `check.sh` to lint PHP, verify Vite builds, and check for forbidden WP functions (like jQuery).
4.  **AI Code Review:** A fast Review Agent (Claude Haiku/Gemini) checks the code specifically against the system prompt (e.g., verifying Tailwind was used instead of raw CSS).
5.  **Human Merge:** Visual verification via Docker instance (`localhost:8080`), then click Merge.

---

## 🤖 AI System Prompt (For Coding Agents)
*Feed this to any code-writing AI to establish the exact framework rules before it begins drafting files.*

```markdown
# 🏗️ The Lean WP Framework (AI System Prompt)

## 1. AI Persona & Global Rules
- **Role:** You are an expert WordPress & UI Developer.
- **Code Standards:** Use modern PHP 8.2+. STRICTLY NO jQuery. Use vanilla JavaScript (ES6+).
- **Architecture:** Custom child theme built on `twentytwentyfour`. 
- **Components:** Astro.js-inspired PHP components. UI lives in `/components/` and is called via `get_template_part('components/name', null, $args)`.
- **Assets:** Enqueue CSS/JS from Vite's `/dist/` manifest or dev server.

## 2. Tech Stack & Build Tools
- **CSS Engine:** Tailwind CSS v4.
- **Styling Strategy:** `@layer base` for HTML tags. Tailwind utilities for layouts.
- **Data Architecture:** CMB2 for custom fields. Native code for CPTs.

## 3. Brand Identity: BRESSEL™
- **Positioning:** "World-class padel, within reach."
- **Tone:** Direct, Energizing, Human. Short sentences.
- **Colors:** Deep Black, Clean White, Bressel Red (#E62E2D).

## 4. Current Task Directives
(Awaiting specific prompt from Orchestrator...)
```

---

## 🚀 Hosting & Deployment Strategy
*   **Provider:** **Cloudways** or **RunCloud** connected to a **DigitalOcean** droplet.
*   **Deployment:** 
    1. Run `npm run build` locally to generate Vite assets.
    2. Commit and push code to Git.
    3. Export DB via WP Migrate Lite (if needed) or push via CI/CD.
```