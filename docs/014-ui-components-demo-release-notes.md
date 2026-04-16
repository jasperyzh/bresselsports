# BRESSEL™ WordPress Framework — Release Notes

## Version 1.1.0 — UI Components Demo

**Release Date:** April 16, 2026  
**Commit:** `c58b339`  
**URL:** `http://localhost:8080/ui-demo/`

---

## 🎨 Overview

This release introduces a **complete UI Components Demo page** that serves as both a development reference and a marketing asset for the BRESSEL™ WordPress Framework. Every major UI component has been showcased in a polished, presentable layout.

---

## 🆕 New Components

### 1. Accordion (`components/accordion.php`)
- Expandable content sections with smooth CSS transitions
- Auto-close siblings when one is opened
- Animated chevron icon (rotates 180°)
- Accessible: `aria-expanded`, `aria-controls` attributes
- Usage:
  ```php
  get_template_part('components/accordion', null, [
      'title'   => 'What is BRESSEL™?',
      'content' => 'BRESSEL Academy is...'
  ]);
  ```

### 2. Alert (`components/alert.php`)
- Four contextual types: `success`, `warning`, `error`, `info`
- Icon + title + message layout
- Color-coded borders and backgrounds
- Usage:
  ```php
  get_template_part('components/alert', null, [
      'type'    => 'success',
      'title'   => 'Success',
      'message' => 'Your action was completed.'
  ]);
  ```

### 3. Testimonial Card (`components/testimonial-card.php`)
- Star rating display (5 stars)
- Quoted text block
- Author avatar (initials), name, and role
- Usage:
  ```php
  get_template_part('components/testimonial-card', null, [
      'quote'   => 'Great experience!',
      'author'  => 'MARCUS L.',
      'role'    => 'Regional Champion 2025'
  ]);
  ```

### 4. Updated Button (`components/button.php`)
- **New variant:** `ghost` (transparent background, hover fill)
- **Red accent ghost:** `accent => true`
- **Three sizes:** `sm` (10px font), `md` (14px), `lg` (16px)
- Ripple click effect
- Usage:
  ```php
  get_template_part('components/button', null, [
      'text'    => 'Book Now',
      'url'     => '/contact/',
      'variant' => 'solid',   // or 'outline', 'ghost'
      'size'    => 'md',      // or 'sm', 'lg'
      'accent'  => false      // red accent for ghost
  ]);
  ```

---

## 🎨 New CSS Components (`ui-components.css`)

| Component | Description |
|-----------|-------------|
| **Dropdown Menu** | Click-to-toggle with smooth slide-down animation |
| **Tooltip** | CSS-only, uses `data-tooltip` attribute |
| **Skeleton Loader** | Shimmer animation for loading states |
| **Progress Bar** | Animated fill with red accent |
| **Badge** | `badge-red`, `badge-green`, `badge-zinc` variants |
| **Switch Toggle** | iOS-style toggle switch |
| **Lightbox Hover** | Zoom icon overlay on thumbnail hover |

---

## 📄 UI Demo Page Structure

The `/ui-demo/` page contains 13 sections:

| # | Section | Description |
|---|---------|-------------|
| 1 | **Hero** | Full-width header with BRESSEL branding |
| 2 | **Section Nav** | Sticky nav bar for jumping between sections |
| 3 | **Colors** | Brand palette + Zinc scale swatches |
| 4 | **Typography** | H1-H6, body text, blockquote, code |
| 5 | **Buttons** | Variants × sizes × states |
| 6 | **Alerts** | All 4 alert types |
| 7 | **Cards** | Coach, Event, Merch, Testimonial cards |
| 8 | **Forms** | Inputs, selects, checkboxes, radios, switches |
| 9 | **Accordion** | 4 expandable sections |
| 10 | **Dropdown** | Click-to-toggle menus |
| 11 | **Grid System** | 1-2, 3, 4, 12 column layouts |
| 12 | **Spacing** | Padding and margin scale |
| 13 | **Carousel** | Quote carousel with auto-play |
| 14 | **Lightbox** | PhotoSwipe gallery |
| 15 | **Navigation** | Primary nav, breadcrumbs, pagination |

---

## 🔧 Technical Details

### Assets
- **CSS:** 62.26 kB (gzip: 11.22 kB)
- **JS:** 6.73 kB (gzip: 2.27 kB)
- **CDN:** PhotoSwipe 5 via cdnjs.cloudflare.com
- **Images:** All use `get_stylesheet_directory_uri()` + `placeholder.jpg`

### Dependencies
- Tailwind v4 (native utilities + @layer components)
- Vite 6 (build tool)
- WordPress (PHP template system)

### Browser Support
- Modern browsers (ES6+)
- PhotoSwipe 5 (touch-enabled)
- CSS custom properties

---

## 📸 Live Preview

Visit: `http://localhost:8080/ui-demo/`

The page is fully responsive and showcases every component in the BRESSEL design system. It can serve as:
- A development reference for future components
- A marketing asset for client presentations
- A component catalog for the framework documentation

---

## 📋 Git History

```
c58b339 feat: UI Components Demo page with complete design system
64f0644 feat: unify placeholder images, fix image URIs to child theme
631eff0 last run for client-updates
2c803cd 260416-one more run
```

---

**Next Steps:**
- Upload real branded images to replace `placeholder.jpg`
- Create Fluent Forms (Contact + Newsletter) in WP Admin
- Polish mobile navigation spacing
- Add real content to hero section (replace video with image)
- Fix header menu button visibility
