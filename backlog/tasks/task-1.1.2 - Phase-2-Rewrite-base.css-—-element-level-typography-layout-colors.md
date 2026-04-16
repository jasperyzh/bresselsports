---
id: TASK-1.1.2
title: 'Phase 2: Rewrite base.css — element-level typography, layout, colors'
status: In Progress
assignee:
  - '@kise-engineer'
created_date: '2026-04-16 17:18'
updated_date: '2026-04-16 17:32'
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
- [ ] #1 h1-h6 styled via element selectors with correct font sizes and family
- [ ] #2 p, a, button, input styled via element selectors
- [ ] #3 Layout handles via CSS Grid on containers (grid-2, grid-3)
- [ ] #4 Colors use CSS custom properties, not utility classes
- [ ] #5 Tailwind @utility blocks removed from main.css
<!-- AC:END -->
