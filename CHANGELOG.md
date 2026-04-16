# CHANGELOG - BRESSEL WordPress Framework

All notable changes to this project will be documented in this file.

## [1.1.0] - 2026-04-16

### Added
- **UI Components Demo Page** (`/ui-demo/`) — complete design system showcase
  - 13 component sections: colors, typography, buttons, alerts, cards, forms, accordion, dropdown, grid, spacing, carousel, lightbox, navigation
  - Sticky section navigation bar for quick jumping between components
  - Live interactive previews of all components
- **New Components**:
  - `components/accordion.php` — expandable content sections with smooth animations
  - `components/alert.php` — contextual feedback (success/warning/error/info)
  - `components/testimonial-card.php` — customer testimonial with avatar, stars, quote
- **Component Updates**:
  - `components/button.php` — added `ghost` variant, `sm/md/lg` sizes, red accent option
- **CSS Additions** (`src/css/components/ui-components.css`):
  - Dropdown menu styles with transition animations
  - Tooltip component (CSS-only, data-tooltip attribute)
  - Skeleton loader with shimmer animation
  - Progress bar component
  - Badge component (red/green/zinc variants)
  - Switch/toggle component
  - Lightbox thumbnail hover effect
- **JavaScript Additions**:
  - Accordion toggle handler (auto-close siblings, icon rotation)
  - Dropdown toggle handler (open/close, close on outside click)
  - PhotoSwipe 5 CDN integration for lightbox gallery

### Technical Details
- All card components now use `placeholder.jpg` consistently as fallback
- All image paths use `get_stylesheet_directory_uri()` for child-theme safety
- PhotoSwipe 5 loaded via CDN (cdnjs.cloudflare.com)
- Page created via WP-CLI (ID: 55), template assigned: `page-ui-demo.php`
- Build: 62.26 kB CSS (gzip 11.22 kB), 6.73 kB JS (gzip 2.27 kB)

---

## [1.0.0] - 2026-04-16

### Added
- Quote carousel component with CMB2 options page
- Quote carousel auto-play functionality (6-second interval)
- Primary menu configuration via WP-CLI
- Sample content population:
  - 4 coaches with roles and experience metadata
  - 7 merch products with pricing
  - 3 events and 1 announcement as standard posts
- `page-community.php` template for community/events page
- `page-contact.php` template with Fluent Form integration
- `page-academy.php` template for academy/coaches page

### Changed
- **Event CPT removed** - Changed to standard WordPress posts for `/community/` URL
- Renamed `archive-coach.php` restored (was incorrectly renamed to page-academy.php)
- Updated `event-card.php` component to work with standard posts
- Updated `functions.php` to remove event CPT registration
- Flushed WordPress rewrite rules

### Fixed
- Template loading errors on `/academy/` and `/community/`
- Community page now correctly loads page-community.php instead of parent theme

### Documentation
- Updated `docs/011-comprehensive-todo-list.md`
- Updated `docs/009-client-presentation-review.md`
- Created `docs/012-fix-summary.md`
- Updated `plan-instructions.txt`

### Infrastructure
- Built Vite assets for production (`npm run build`)

---

## [0.9.0] - 2026-04-15

### Added
- CSS classless refactor plan
- Tailwind v4 @base directive for custom base styles
- Theme cleanup log for zinc scale standardization

### Changed
- Moved WordPress override styles outside @layer base
- Simplified CSS architecture with inline @theme

---

## [0.8.0] - 2026-04-13

### Added
- Homepage implementation plan
- AI agent workflow strategy documentation
- Quote carousel component (initial implementation)

---

## [0.7.0] - 2026-04-10

### Added
- CSS refactoring plan
- Temp.css cleanup for classless approach

---

## [0.6.0] - 2026-04-09

### Added
- Header classless migration
- Utility class removal (.text-center, .overflow-hidden, .flex-center)

---

## [0.5.0] - 2026-04-06

### Added
- DigitalOcean deployment guide
- Ubuntu WordPress setup documentation

---

## [0.1.0] - 2026-03-03

### Added
- Initial project setup
- Master plan documentation
- Environment setup guide
- WP-CLI agent connection guide

---

## Unreleased
- Fluent Forms integration (Contact + Newsletter)
- Real content population (images, copy)
- SEO Framework setup
- CSS cleanup (temp.css removal)
