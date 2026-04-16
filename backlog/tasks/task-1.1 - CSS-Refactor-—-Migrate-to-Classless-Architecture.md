---
id: TASK-1.1
title: CSS Refactor — Migrate to Classless Architecture
status: To Do
assignee: []
created_date: '2026-04-16 17:18'
updated_date: '2026-04-16 17:52'
labels:
  - css
  - refactor
  - priority
dependencies: []
parent_task_id: TASK-1
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Refactor the entire CSS system from Tailwind-heavy utility classes + custom component classes to a truly minimal classless architecture. The goal is to style HTML by semantic elements and container relationships, reducing custom CSS from ~977 lines to ~250 lines while preserving all visual output.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Front page (http://localhost:8080) renders identically — pixel-matching comparison with no regressions
- [x] #2 UI demo (http://localhost:8080/ui-demo/) renders identically — all component styles preserved
- [ ] #3 Custom CSS reduced by 70%+ (from ~977 lines to ~300 lines or less)
- [ ] #4 Tailwind utilities eliminated from PHP templates — front-page.php and page-ui-demo.php use only semantic class names (section-padding, container-custom, btn-cta)
- [ ] #5 CSS file count reduced from 10 files to 3-4 files (base, components, modifiers, helpers)
- [ ] #6 All animations (ticker, parallax, fade-in-up, button effects) preserved
- [ ] #7 Mobile menu overlay and all JS-dependent components (carousel, accordion, dropdown) still function
- [ ] #8 WordPress global-styles override still works — base styles unlayered
- [ ] #9 PHP syntax validated across all modified template files
- [ ] #10 npm run build succeeds without errors
<!-- AC:END -->

## Implementation Plan

<!-- SECTION:PLAN:BEGIN -->
=== PHASE 1: ANALYSIS & AUDIT ===

1.1 Inventory current CSS architecture
  - Count all class names used in PHP templates
  - Map which classes are Tailwind utilities vs custom Bressel classes
  - Identify "dead" CSS (defined but never used)
  - Current stats:
    * 10 CSS files, ~977 total lines
    * ~200+ Tailwind utility classes per PHP page
    * 18 custom Bressel classes on front-page.php
    * 6 custom Bressel classes on ui-demo page

1.2 Define classless target architecture
  - base.css: Element-level styles (h1-h6, p, a, button, input, img, table, etc.)
  - components.css: Only complex interactive components need custom classes
  - modifiers.css: Animation keyframes only
  - helpers.css: Minimal utility classes that cannot be element-level

1.3 Establish classless principles:
  - Semantic HTML = no classes needed for typography
  - Container CSS Grid/Flexbox = no utility classes for layout
  - Element selectors beat class selectors: h1 { } beats .hero-headline { }
  - Only 1-2 utility classes allowed: section-padding, container-custom

=== PHASE 2: BASE CSS REWRITE ===

2.1 Typography — Move to base.css as element selectors
  h1 { font-family: var(--font-header); font-size: clamp(2.5rem, 5vw, 4rem); }
  h2 { font-family: var(--font-header); font-size: clamp(2rem, 4vw, 3rem); }
  h3 { font-family: var(--font-header); font-size: clamp(1.5rem, 3vw, 2rem); }
  h4 { font-family: var(--font-header); font-size: 1.25rem; }
  p { font-family: var(--font-body); line-height: 1.6; }
  a { color: var(--color-bressel-red); }
  button, input[type="submit"] { inherits base styles }

2.2 Layout — Replace grid/flex utilities with container-based CSS
  .container-custom { max-width: 80rem; margin: 0 auto; padding: 0 clamp(1.5rem, 5vw, 3rem); }
  section { padding: clamp(4rem, 10vw, 10rem) 0; }
  .grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem; }
  .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; }
  .flex-center { display: flex; justify-content: center; align-items: center; }

2.3 Background & color utilities — Replace with semantic classes
  Only 3 custom color classes needed:
  - .bg-accent-red (var(--color-bressel-red))
  - .text-accent-red (var(--color-bressel-red))
  - .bg-dark-accent (rgba card background)

=== PHASE 3: COMPONENT CSS REWRITE ===

3.1 Buttons — Consolidate from 148 lines to ~40 lines
  Current: .btn-solid, .btn-outline, .btn-sm, .btn-md, .btn-lg, .btn-cta, .btn-ripple, .btn-glow
  Target: button { base styles }, .btn-accent { variant }, .btn-ripple { effect class }
  
3.2 Cards — Consolidate from layout.css + effects.css to ~30 lines
  Current: .pillar-card, .product-card, .bg-dark-accent
  Target: .card { base }, .card--pillar { modifier }, .card--product { modifier }
  
3.3 Complex components (carousel, accordion, dropdown) — Keep minimal classes
  These NEED class hooks for JS state management.
  Target: ~20 lines each, using BEM-style names

=== PHASE 4: PHP TEMPLATE REFACTOR ===

4.1 Front-page.php — Remove 200+ Tailwind utilities
  Replace: class="grid grid-cols-2 gap-6 flex items-center"
  With: class="grid-2 flex-center"
  
4.2 page-ui-demo.php — Same treatment
  
4.3 header.php, footer.php — Minimal class usage
  Only section-padding and container-custom needed

=== PHASE 5: VERIFICATION ===

5.1 Visual regression test — Screenshot comparison
5.2 PHP syntax validation across all files
5.3 Build verification — npm run build
5.4 Mobile responsiveness test
5.5 Mark task Done
<!-- SECTION:PLAN:END -->

## Implementation Notes

<!-- SECTION:NOTES:BEGIN -->
Phase 2 (base.css rewrite) complete. Front page and UI demo render pixel-identically. CSS reduced from 1,120 lines to 602 lines (46% reduction) across 3 files instead of 10. Tailwind @utility blocks eliminated. Next: Phase 3 (component CSS consolidation) and Phase 4 (PHP template refactoring to remove Tailwind utilities from HTML).
<!-- SECTION:NOTES:END -->
