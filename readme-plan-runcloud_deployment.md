# Deployment Plan: BRESSEL™ PoC to RunCloud

This document outlines the end-to-end process of moving the BRESSEL™ WordPress framework from a local Docker environment to a live production Proof of Concept (PoC) hosted on RunCloud.

## 🎯 Objective
Deploy a high-performance, secure, and fully functional version of the theme that correctly handles Vite production assets and follows WordPress security best practices.

---

## 🛠️ Phase 1: Code Hardening & Production Readiness
*Goal: Eliminate technical debt and security vulnerabilities before the code leaves the local environment.*

### 1.1 PHP Security Audit
- [ ] **Escaping Output:** Review all template files (`front-page.php`, `single-*.php`, `archive-*.php`) and components. Wrap all dynamic text in `esc_html()` and URLs in `esc_url()`.
- [ ] **Thumbnail Logic:** Refactor `the_post_thumbnail()` usage to ensure no double-echoing occurs within short-echo tags (`<?= ?>`).

### 1.2 Asset Pipeline Transition
- [ ] **Environment Detection:** Replace hardcoded `$is_dev = true` in `functions.php` with a check for `wp_get_environment_type() === 'development'`.
- [ ] **Manifest Implementation:** Implement logic to read `dist/manifest.json`. The theme must map the source file (e.g., `main.js`) to its versioned production counterpart (e.g., `main.C8x2a1.js`).

### 1.3 Template Robustness
- [ ] **Empty States:** Add `else` blocks to all `WP_Query` loops to display a "No items found" message instead of empty whitespace.

---

## 📦 Phase 2: Build & Packaging
*Goal: Transform source code into optimized production assets.*

### 2.1 Production Compilation
- [ ] Run `npm run build` within the theme directory.
- [ ] Verify that the `/dist` folder contains minified CSS/JS and a valid `manifest.json`.

### 2.2 Dependency Management
- [ ] Ensure `.gitignore` correctly excludes `node_modules` but includes the `/dist` folder (or handle via CI/CD).

### 2.3 Configuration Preparation
- [ ] Create a production checklist for `wp-config.php`:
    - Set `define('WP_ENVIRONMENT_TYPE', 'production');`
    - Enable `WP_DEBUG_LOG` but disable `WP_DEBUG_DISPLAY`.

---

## ☁️ Phase 3: Server Infrastructure (RunCloud)
*Goal: Provision a professional hosting environment.*

### 3.1 VPS Provisioning
- [ ] Connect RunCloud to a VPS provider (DigitalOcean/Linode/Vultr).
- [ ] Select **Ubuntu 22.04 LTS**.

### 3.2 Stack Configuration
- [ ] **PHP:** Install PHP 8.2+ via RunCloud Web App settings.
- [ ] **Database:** Create a MySQL 8.0 database and user with restricted privileges.
- [ ] **Web Server:** Configure Nginx for WordPress (RunCloud provides optimized defaults).

### 3.3 Security & SSL
- [ ] Install Let's Encrypt SSL certificate via the RunCloud dashboard.
- [ ] Force HTTPS redirection.

---

## 🚚 Phase 4: Deployment Workflow
*Goal: Move the code from local/Git to the live server.*

### 4.1 Theme Upload (Choose one)
- **Option A (Git - Recommended):** 
    - Push code to a private GitHub repository.
    - Use RunCloud's "Git Deployment" feature to pull the theme directly into `/wp-content/themes/twentytwentyfour-bressel`.
- **Option B (SFTP):**
    - Zip the theme folder (including `/dist`).
    - Upload and extract via SFTP using a client like FileZilla or Termius.

### 4.2 WordPress Core Setup
- [ ] Install WordPress via RunCloud's one-click installer or WP-CLI.
- [ ] Activate the `twentytwentyfour-bressel` theme.

### 4.3 Plugin Installation
- [ ] Install required plugins: **CMB2**, **Fluent Forms**.
- [ ] Install recommended plugins: **The SEO Framework**, **FluentSMTP**.

---

## 🧪 Phase 5: Live Validation & QA
*Goal: Ensure the PoC behaves exactly as expected in a real-world scenario.*

### 5.1 Asset Verification
- [ ] Inspect page source to confirm CSS/JS are loading from `/dist` with hashes (e.g., `main.hash.js`) and NOT from `localhost:5173`.

### 5.2 Content Scaffolding
- [ ] SSH into the server.
- [ ] Run `./setup-wp-content.sh` to populate the site with PoC data (Coaches, Events).

### 5.3 Functional Testing
- [ ] **Forms:** Submit a Fluent Form and verify email delivery via FluentSMTP.
- [ ] **Responsiveness:** Test on mobile/tablet devices.
- [ ] **Performance:** Run a Lighthouse report to verify the benefits of Vite/Tailwind v4.

---

## 📖 Final Documentation Deliverables
*To be created after deployment:*
1. `DEPLOYMENT.md`: Technical guide for future updates.
2. `ENVIRONMENT.md`: Server specs and PHP requirements.
3. `CONTENT_GUIDE.md`: User manual for managing CPTs via CMB2.