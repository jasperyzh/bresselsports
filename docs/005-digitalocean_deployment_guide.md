# 🚀 Deployment Guide: BRESSEL™ WordPress Framework (Vite/Tailwind v4) 

This guide provides instructions for deploying the BRESSEL™ theme from local development to a live production environment hosted on **RunCloud**.

## 🛠️ Pre-Deployment Checklist
Before starting, ensure you have:
1. A **RunCloud** account (Trial or Paid).
2. A VPS provider account (DigitalOcean, Linode, Vultr, etc.) connected to RunCloud.
3. Your theme code pushed to a private GitHub/GitLab repository (Recommended) OR a local copy of the folder ready for SFTP.

---

## ☁️ Phase 1: Server Provisioning (RunCloud)

### 1.1 Create the Server
1. Log in to RunCloud.
2. Click **Servers** $ightarrow$ **Create Server**.
3. Select your provider and choose an **Ubuntu 22.04 LTS** instance.
4. Wait for the provisioning process to complete.

### 1.2 Create a Web Application
1. Go to your new server in RunCloud.
2. Click **Web Application** $ightarrow$ **Create Web App**.
3. Select **WordPress** as the application type.
4. Enter your domain name (e.g., `poc.yourdomain.com`).
5. Set the PHP version to **8.2 or 8.3**.
6. Follow the prompts to complete the installation.

### 1.3 Security & SSL
1. In the Web App dashboard, go to **SSL/TLS**.
2. Click **Install Let's Encrypt Certificate**.
3. Once installed, ensure **Force HTTPS** is enabled in your Nginx settings or via a plugin.

---

## 🚚 Phase 2: Deploying the Theme

### Option A: Git Deployment (Highly Recommended)
*This method allows you to update the site by simply pushing code to GitHub.*

1. **Push your local code** to a private repository:
   ```bash
   git add .
   git commit -m "Ready for production deployment"
   git push origin main
   ```
2. **In RunCloud**, go to your Web App $ightarrow$ **Git Deployment**.
3. Connect your GitHub/GitLab account.
4. Set the **Deployment Path** to:
   `/home/runcloud/[your-user]/public_html/wp-content/themes/twentytwentyfour-bressel`
5. Configure a **Webhook** so that every time you push to `main`, RunCloud automatically pulls the latest code.

### Option B: SFTP Deployment (Manual)
1. Zip your local theme folder: `twentytwentyfour-bressel.zip` (**Note:** Ensure the `dist/` folder is included!).
2. Open an SFTP client (FileZilla, Termius).
3. Connect to your RunCloud server using the credentials provided in the dashboard.
4. Navigate to `/wp-content/themes/`.
5. Upload and extract the zip file there.

---

## ⚙️ Phase 3: Post-Deployment Configuration

### 3.1 Activate the Theme
1. Log in to your WordPress Admin (`yourdomain.com/wp-admin`).
2. Go to **Appearance** $ightarrow$ **Themes**.
3. Find **BRESSEL Child Theme** and click **Activate**.

### 3.2 Install Required Plugins
To ensure the theme functions correctly, install these plugins:
1. **CMB2** (For Custom Fields).
2. **Fluent Forms** (For Contact/Booking forms).
3. **The SEO Framework** (Recommended for SEO).
4. **FluentSMTP** (Required to ensure contact form emails actually send).

### 3.3 Populate Content (Scaffolding)
To see the theme in action immediately, you can run the dummy content script via SSH:
1. Connect to your server via SSH.
2. Navigate to the theme directory:
   ```bash
   cd /home/runcloud/[your-user]/public_html/wp-content/themes/twentytwentyfour-bressel
   ```
3. Run the setup script:
   ```bash
   ./setup-wp-content.sh
   ```

---

## 🔍 Phase 4: Verification & QA

1. **Check Assets:** Open your website, right-click $ightarrow$ **View Page Source**. Ensure CSS and JS files are loading from the `/dist/assets/` folder with long hashed filenames (e.g., `main-ChZIWwFl.js`).
2. **Test Forms:** Fill out a contact form on the live site and verify that you receive the email notification.
3. **Mobile Check:** Use Chrome DevTools to ensure the Tailwind layouts are fully responsive on mobile devices.