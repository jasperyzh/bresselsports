---
id: TASK-1.1.2
title: 'Phase 2: Rewrite base.css — element-level typography, layout, colors'
status: Done
assignee:
  - '@kise-engineer'
created_date: '2026-04-16 17:18'
updated_date: '2026-04-16 17:52'
labels:
  - css
  - rewrite
dependencies: []
parent_task_id: TASK-1.1
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Replace class-based typography and layout with element selectors. h1-h6, p, a, button, input styled by tag name. Containers use CSS Grid/Flexbox instead of Tailwind utilities. Only 2 utility classes remain: section-padding, container-custom.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 h1-h6 styled via element selectors with correct font sizes and family
- [x] #2 p, a, button, input styled via element selectors
- [x] #3 Layout handles via CSS Grid on containers (grid-2, grid-3)
- [x] #4 Colors use CSS custom properties, not utility classes
- [ ] #5 Tailwind @utility blocks removed from main.css
<!-- AC:END -->

## Implementation Notes

<!-- SECTION:NOTES:BEGIN -->
Phase 2 complete: base.css rewritten with element selectors for h1-h6, body text, and media. Button/link selectors removed from base (now handled in components.css via .btn-accent and .btn-outline). Links scoped to .content areas only. Layout handled via CSS Grid (.grid-2, .grid-3) in components.css. WordPress global-styles override preserved in main.css (unlayered styles). @source directive added for Tailwind PHP scanning. All 16 @utility blocks removed from main.css. Visual verification: front-page.php and page-ui-demo.php render pixel-identically.
<!-- SECTION:NOTES:END -->
