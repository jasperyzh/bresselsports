---
id: doc-005
title: MVP WordPress Framework Preferences
type: other
created_date: '2026-03-19 05:46'
updated_date: '2026-03-19 06:48'
---
# MVP WordPress Framework Preferences (BRESSEL & Future Projects)

## Core Philosophy
- **Keep it Simple, Essential**: Build solid MVPs first, expand styling/functionality in later phases.
- **Classless CSS**: Use Tailwind CSS custom properties (`@theme`, `--color-*`) for global styling. Only use Tailwind utility classes for unique layouts or components.
- **Minimal Animations**: Add only essential, subtle animations. No heavy JS libraries.

## Design System
- **Colors**: Deep Black (`#000000`), Clean White (`#FFFFFF`), Accent Red (`#E62E2D`).
- **Typography**: Oswald (Headers - Uppercase, Bold, Italic), Inter (Body).
- **Spacing**: Consistent section padding (`section-padding`), container max-width (`container-custom`).

## Form Strategy (Unified)
- Use **ONE** Fluent Form for Contact, Booking, and Purchase inquiries.
- Pass context via URL parameters (`?intent=booking&target=CoachName`).
- Hardcode Form ID in templates for MVP (e.g., `[fluentform id="1"]`).
- Style forms using CSS custom properties (classless), not utility classes.

## Mobile-First Checklist
- [ ] Touch targets minimum 44px.
- [ ] Readable font sizes (no tiny text).
- [ ] Sticky header with backdrop blur.
- [ ] Full-screen overlay menu with close button (top-right).
- [ ] No horizontal scroll.
- [ ] Images scale properly.

## Lean Plugin Stack (2026)
- **Forms**: Fluent Forms (Free tier).
- **SEO**: The SEO Framework.
- **Performance**: Surge (caching), Imsanity (image resize).
- **Media**: Safe SVG, Enable Media Replace.
- **Email**: FluentSMTP.
- **Security**: Limit Login Attempts Reloaded.
- **Optional**: WPZOOM Social Feed, Lightbox with PhotoSwipe.
- **Avoid**: Yoast (heavy), Wordfence (bloated), Elementor (unless client escape hatch).

## Notification Strategy
- Use Fluent Forms built-in email notifications (Free tier).
- Admin email: client's main inbox.
- No SMS/push for MVP (use WhatsApp/Telegram direct links instead).
- Store entries in database (Fluent Forms feature).

## Development Workflow
1. Docker for local environment.
2. Vite + Tailwind v4 for asset building.
3. WP-CLI for content scaffolding.
4. Git for version control (essential).

## UI/UX Preferences
- **Prevent FOUC**: Always add inline critical CSS for background colors to prevent white flash on load.
- **Section IDs**: Add semantic IDs to all major sections for anchor links and identification (e.g., #coaches, #merch, #announcements).
- **Grid Layouts**: Keep grid columns consistent with post counts (3 cols = 3 posts) for clean layouts.
- **Icons**: Use Bootstrap Icons CDN for MVP (faster than custom SVG), hosted on jsDelivr.
- **Icon Hover States**: Use brand colors on hover (green for WhatsApp, blue for Telegram, pink for Instagram).

## Future-Proofing (Phase 3+)
- Multilingual: Polylang (for SE Asia expansion).
- Payments: Stripe integration (if client upgrades Fluent Forms).
- Member Portal: Custom CPT + restricted templates.
- Advanced Animations: Intersection Observer API (vanilla JS).
