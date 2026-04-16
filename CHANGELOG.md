# CHANGELOG - BRESSEL WordPress Framework

All notable changes to this project will be documented in this file.

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
