# Placeholder Items & Verification Checklist

## 📸 PLACEHOLDER IMAGES TO SOURCE

### Priority 1: Hero & Background Images

| ID | Filename | Used In | Dimensions | Notes |
|----|----------|---------|------------|-------|
| 1 | `hero-bg.jpg` | `front-page.php` - Hero section (parallax BG) | 1920×1080+ (landscape) | Dark, atmospheric padel court shot. Dramatic lighting preferred. |
| 2 | `quote-bg-silhouette.jpg` | `front-page.php` - Quote section (faded BG) | 1920×1080+ (landscape) | Player silhouette, very subtle (opacity: 5%) |
| 3 | `cta-bg-overlay.jpg` | `front-page.php` - Newsletter section (subtle overlay) | 1920×1080+ (landscape) | Warm tones, court or action shot |

### Priority 2: About Section Cards

| ID | Filename | Used In | Dimensions | Notes |
|----|----------|---------|------------|-------|
| 4 | `academy-card.jpg` | `front-page.php` - About section (Academy card) | 800×600 (3:2 ratio) | Indoor facility or coaching scene |
| 5 | `community-card.jpg` | `front-page.php` - About section (Community card) | 800×600 (3:2 ratio) | Group of players, social padel moment |

### Priority 3: Program Pillar Images

| ID | Filename | Used In | Dimensions | Notes |
|----|----------|---------|------------|-------|
| 6 | `program-professional.jpg` | `front-page.php` - Program Pillars | 600×800 (portrait) | Professional coaching, technique focus |
| 7 | `program-competition.jpg` | `front-page.php` - Program Pillars | 600×800 (portrait) | Tournament/action shot |
| 8 | `program-coaches.jpg` | `front-page.php` - Program Pillars | 600×800 (portrait) | Coach certification, training scene |

### Priority 4: Academy Centers Section

| ID | Filename | Used In | Dimensions | Notes |
|----|----------|---------|------------|-------|
| 9 | `center-main.jpg` | `front-page.php` - Centers (large top image) | 800×500 (16:10 ratio) | Indoor padel court, overhead or wide shot |
| 10 | `center-detail-1.jpg` | `front-page.php` - Centers (grid image 1) | 400×300 (4:3 ratio) | Court detail or equipment |
| 11 | `center-detail-2.jpg` | `front-page.php` - Centers (grid image 2) | 400×300 (4:3 ratio) | Climate control or facility detail |

### Priority 5: Product/Shop Images

| ID | Filename | Used In | Dimensions | Notes |
|----|----------|---------|------------|-------|
| 12 | `product-padel-racket.jpg` | `front-page.php` - Fallback product | 800×800 (square) | BRESSEL PADEL-X flagship racket |
| 13 | `product-grip.jpg` | `front-page.php` - Fallback product | 800×800 (square) | KINETIC GRIP-V1 |

### Priority 6: Coach Profile Images

| ID | Filename | Used In | Dimensions | Notes |
|----|----------|---------|------------|-------|
| 14 | `coach-default.jpg` | `components/coach-card.php` (fallback) | 400×500 (portrait) | Professional headshot style |

### Priority 7: Merchandise Default Image

| ID | Filename | Used In | Dimensions | Notes |
|----|----------|---------|------------|-------|
| 15 | `merch-default.jpg` | `components/merch-card.php` (fallback) | 800×800 (square) | Generic product placeholder |

---

## 🎨 BRAND ASSETS TO CREATE/OBTAIN

### Logo Assets

| ID | Filename | Purpose | Format | Notes |
|----|----------|---------|--------|-------|
| 16 | `logo.svg` | Header logo (inline SVG) | SVG | Padel racket icon + "BRESSEL™" text |
| 17 | `logo-footer.svg` | Footer logo | SVG | Match header style |
| 18 | `favicon.ico` | Browser tab | ICO | 16×16, 32×32 sizes |

### Social Media Icons

| ID | Filename | Purpose | Format | Notes |
|----|----------|---------|--------|-------|
| 19 | `icon-whatsapp.svg` | Mobile menu social link | SVG | WhatsApp icon |
| 20 | `icon-telegram.svg` | Mobile menu social link | SVG | Telegram icon |
| 21 | `icon-instagram.svg` | Mobile menu social link | SVG | Instagram icon |

---

## 📋 VERIFICATION & VALIDATION CHECKLIST

### WordPress Configuration

- [ ] **Theme Installation**
  - [ ] Twenty Twenty-Four parent theme installed and activated
  - [ ] `twentytwentyfour-bressel` child theme installed and activated
  - [ ] Child theme style.css header complete (Theme Name, URI, Description)

- [ ] **Required Plugins**
  - [ ] CMB2 installed and activated (for custom fields)
  - [ ] Fluent Forms installed and configured (for contact/booking forms)
  - [ ] Imsanity installed (optional, for image optimization)

- [ ] **Menu Setup**
  - [ ] Primary menu created and assigned
  - [ ] Menu items: Home, Coaches, Shop, Junior, Contact
  - [ ] Mobile menu styling verified

### Custom Post Types

- [ ] **Coach CPT** (`/coaches/`)
  - [ ] Slug correctly set to `/coaches/`
  - [ ] Has thumbnail support
  - [ ] CMB2 fields: `_bressel_coach_role`, `_bressel_coach_experience`
  - [ ] At least 2-3 sample coaches added with real photos

- [ ] **Merch CPT** (`/shop/`)
  - [ ] Slug correctly set to `/shop/`
  - [ ] Has thumbnail support
  - [ ] CMB2 fields: `_bressel_merch_price`
  - [ ] At least 3-4 sample products added with real photos

- [ ] **Event (Tag-based)**
  - [ ] Events use `event` tag on posts
  - [ ] Event archive template working

### Fluent Forms Setup

- [ ] **Contact Form** (ID: likely 1)
  - [ ] Fields: Name, Email, Phone (optional), Message
  - [ ] Redirect after submission configured
  - [ ] Email notifications set up

- [ ] **Booking Form** (ID: likely 2)
  - [ ] Fields: Name, Email, Preferred Date, Coach Preference, Message
  - [ ] URL parameters `intent=booking` working
  - [ ] Pre-filled coach name via `target` parameter working

- [ ] **Newsletter Form** (ID: likely 3)
  - [ ] Single email field
  - [ ] Connected to email service (Mailchimp/ConvertKit)

### Forms Integration Testing

- [ ] **URL Parameter Flow**
  - [ ] `/?intent=booking` → Pre-selects booking in contact form
  - [ ] `/?intent=booking&target=JEREMY` → Pre-fills coach name
  - [ ] `/?intent=purchase&target=BRESSEL+PADEL-X` → Pre-fills product inquiry
  - [ ] `/?intent=inquiry&source=professional` → Tracks program interest

### Content Verification

- [ ] **Homepage Sections** (front-page.php)
  - [ ] Hero parallax scrolling works
  - [ ] About cards display correctly
  - [ ] News ticker animation running
  - [ ] Program pillars hover effects working
  - [ ] Quote section displaying
  - [ ] Centers section with location list
  - [ ] Shop section with products
  - [ ] Newsletter signup functional

- [ ] **Archive Pages**
  - [ ] `/coaches/` - Coach grid displays
  - [ ] `/shop/` - Product grid displays
  - [ ] Pagination working if needed

- [ ] **Single Pages**
  - [ ] Single coach - Full profile with booking CTA
  - [ ] Single merch - Product details with inquiry CTA
  - [ ] Single event - Event details

- [ ] **Page Templates**
  - [ ] About page (page-about.php)
  - [ ] Contact page (page-contact.php)
  - [ ] Junior page (page-junior.php)

### Design & Styling

- [ ] **Typography**
  - [ ] Oswald font loading (headers)
  - [ ] Inter font loading (body)
  - [ ] Fallback fonts working

- [ ] **Colors** (verify in browser)
  - [ ] BRESSEL Red: `#E62E2D`
  - [ ] Black backgrounds
  - [ ] Zinc text hierarchy
  - [ ] Proper contrast ratios

- [ ] **Responsive Design**
  - [ ] Mobile menu functioning
  - [ ] Tablet layouts (768px+)
  - [ ] Desktop layouts (1024px+)
  - [ ] Large screens (1440px+)

- [ ] **Animations**
  - [ ] Hero parallax effect
  - [ ] Card hover transitions
  - [ ] Fade-in on scroll (data-animate)
  - [ ] News ticker scrolling

### Functionality Testing

- [ ] **Navigation**
  - [ ] All menu links working
  - [ ] Active page highlighting
  - [ ] Smooth scroll for anchor links

- [ ] **Forms**
  - [ ] Fluent Forms rendering correctly
  - [ ] Validation messages styled
  - [ ] Success/error states working
  - [ ] Submit buttons with ripple effect

- [ ] **Performance**
  - [ ] Vite dev server running (`npm run dev`)
  - [ ] HMR working for CSS/JS changes
  - [ ] Production build generating (`npm run build`)

### SEO & Meta

- [ ] **Basic SEO**
  - [ ] WordPress SEO plugin installed (The SEO Framework)
  - [ ] Homepage meta title/description set
  - [ ] Open Graph tags working
  - [ ] Sitemap generation enabled

- [ ] **Tracking Scripts**
  - [ ] Google Analytics/Tag Manager configured
  - [ ] Facebook Pixel configured (if needed)
  - [ ] Scripts appearing in `<head>`

### Security & Performance

- [ ] **Security**
  - [ ] WordPress core up to date
  - [ ] All plugins up to date
  - [ ] Strong admin passwords
  - [ ] SSL certificate active

- [ ] **Media**
  - [ ] Image sizes registered (thumbnail, medium, large)
  - [ ] Featured images required for CPTs
  - [ ] Alt text workflow documented

---

## 🗂️ FILE ORGANIZATION

### Expected Image Locations (after sourcing)

```
twentytwentyfour-bressel/assets/
├── images/
│   ├── coaches/
│   │   ├── coach-jeremy.jpg      (400×500)
│   │   ├── coach-anna.jpg
│   │   └── coach-default.jpg
│   ├── products/
│   │   ├── bressel-padel-x.jpg    (800×800)
│   │   ├── kinetic-grip-v1.jpg
│   │   └── merch-default.jpg
│   ├── sections/
│   │   ├── hero-bg.jpg
│   │   ├── academy-card.jpg
│   │   ├── community-card.jpg
│   │   ├── program-professional.jpg
│   │   ├── program-competition.jpg
│   │   ├── program-coaches.jpg
│   │   ├── center-main.jpg
│   │   ├── center-detail-1.jpg
│   │   ├── center-detail-2.jpg
│   │   ├── quote-bg-silhouette.jpg
│   │   └── cta-bg-overlay.jpg
│   └── logos/
│       ├── favicon.ico
│       └── social-icons/
└── svg/
    ├── placeholder-card.svg       (existing)
    ├── placeholder-coach.svg     (existing)
    ├── placeholder-court.svg      (existing)
    ├── placeholder-hero.svg       (existing)
    └── placeholder-product.svg   (existing)
```

---

## 📝 NOTES

- **Image Optimization**: Use WebP format where possible, keep files under 200KB
- **Photography Style**: Dark, moody, cinematic padel imagery. Avoid stock photo smiles.
- **Alt Text**: Ensure all images have descriptive alt text for accessibility
- **Placeholder SVGs**: Already exist in `assets/svg/` — use these until real images are sourced

---

*Last Updated: 2026-04-10*
