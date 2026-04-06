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
- **Typography:** **Oswald** (Headers) and **Inter** (Body) for a heavy, high-performance feel.
- **Build Tool:** Vite plugins for instant Hot Module Replacement (HMR).
- **Components:** Astro-style PHP components in `/components/` for templating code separation.
- **Data Layer:** CMB2 for code-first custom fields and options pages.
- **Routing:** Custom templates for `front-page`, `archive-{cpt}`, and `single-{cpt}` with consistent brand styling.
- **Specialized Pages:** `page-junior.php` (Landing Page), `page-about.php`, `page-contact.php`, `archive-event.php`.

## 📁 Project Structure

The root of this project is purely for WordPress/Docker scaffolding.

```text
/
├── docker-compose.yml                  # Barebones WP & DB infrastructure via Docker
├── twentytwentyfour-bressel/           # The specialized child theme mapping into WP
│   ├── components/                     # Reusable PHP partials (Astro-style)
│   ├── package.json                    # Frontend Vite dependencies
│   ├── vite.config.js                  # Vite builder
│   ├── functions.php                   # Theme setup, CPTs, CMB2, Vite hooks
│   ├── front-page.php                  # Custom homepage template
│   ├── archive-coach.php               # Academy catalog
│   ├── single-coach.php                # Coach profile view
│   ├── archive-merch.php               # Shop catalog
│   ├── single-merch.php                # Product detail view
│   ├── main.js & main.css              # Entrypoints for JS & Tailwind
│   └── dist/                           # (Generated) Production assets
└── README.md                           # This document
```

## 🎨 Brand Guidelines

- **Colors:** Deep Black backgrounds, Clean White text, and **Bressel Red (#E62E2D)** accents.
- **Tone/Voice:** Direct, energizing, human. Short sentences. Strong verbs. No fluff.
- **Typography:** Bold, black, and italic sans-serif with a momentum-driven feel.

## 🛠️ Development Workflow

1. Edit PHP components inside `twentytwentyfour-bressel/components/`.
2. Tailwind CSS v4 auto-compiles smoothly via Vite natively.
3. Live reload triggers instantly on file changes when `npm run dev` is running.
4. Use `get_template_part('components/[name]', null, $args)` to include components.
5. View your WordPress instance at `http://localhost:8080`.

## 🔌 Plugin Stack

This framework is built lean. Avoid bloat. Core suggested plugins are:

- **CMB2 / Custom Fields:** Fast, code-first data management.
- **Fluent Forms:** Bookings, inquiries, and contact forms.
- **The SEO Framework:** Extremely lightweight automatic SEO optimization.
- **Safe SVG, Imsanity:** QoL for safe vector and compressed client image uploads.
- **WPZOOM Social Feed:** Clean Instagram integrations.
- **FluentSMTP:** Reliable local & production email routing.

## 📋 Fluent Forms Configuration & Limitations

### Free Tier Capabilities
BRESSEL uses the **FREE version** of Fluent Forms. This is sufficient for MVP but has limitations:

✅ **Available (Free):**
- Unlimited forms and entries
- Email notifications to admin
- Basic field types (Text, Email, Textarea, Dropdown, etc.)
- Entry storage in database
- Simple conditional logic
- File uploads (limited size)

❌ **Not Available (Requires Pro):**
- Payment gateways (Stripe, PayPal)
- Advanced conditional logic
- Multi-step forms
- Quiz scoring
- User registration
- PDF generation
- Third-party integrations (Zapier, CRMs)

### Setup Instructions

1. **Install Fluent Forms** (Free) via WP Admin > Plugins > Add New
2. **Create ONE Unified Form** with these fields:
   - **Name** (Text) - Required
   - **Email** (Email) - Required  
   - **Phone/WhatsApp** (Text) - Optional
   - **Inquiry Type** (Dropdown: General, Booking, Purchase)
   - **Subject/Target** (Text) - Hidden field
   - **Message** (Textarea) - Required
3. **Configure Dynamic Defaults:**
   - Set "Inquiry Type" default to: `{get.intent}`
   - Set "Subject/Target" default to: `{get.target}`
4. **Place Shortcode:** Add `[fluentform id="1"]` to the Contact page

### Notification Setup

**Admin Notification (Free Tier):**
1. Go to Fluent Forms > All Forms > Edit > Settings > Email Notifications
2. Enable "Admin Notification"
3. Set "Send To" to: `{admin_email}` or client's email
4. Subject: `New BRESSEL Inquiry: {inputs.inquiry_type}`
5. Message body:
```
New inquiry received:

Name: {inputs.name}
Email: {inputs.email}
Phone: {inputs.phone}
Type: {inputs.inquiry_type}
Target: {inputs.target}

Message:
{inputs.message}
```

**Auto-Reply to User (Free Tier):**
1. Add second notification
2. Send To: `{inputs.email}`
3. Subject: "We received your BRESSEL inquiry"
4. Include confirmation message and next steps

### Styling
Forms are automatically styled via CSS custom properties in `main.css`. No additional styling needed.

## 📝 Client Questionnaire / Pending Decisions

To finalize the handover, please confirm the following with the client:

- **Direct Communication:** Besides Email and Social Media, do they use **WhatsApp** or **Telegram** for direct bookings/inquiries? If so, we need the number/username to link the footer icons.
- **Footer Brand Block:** Does the massive `BRESSEL™` typographic logo in the footer align with their vision, or do they prefer their actual image logo placed alongside the social links? (Typographic is currently recommended for a stronger momentum aesthetic).
- **Online Payments:** For BRESSEL PRO, will they strictly use "Inquire to Buy", or do they plan to integrate a payment gateway (like Stripe) directly into the forms later?

