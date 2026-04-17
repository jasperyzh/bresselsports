---
id: TASK-1.1.4
title: 'Phase 4: Refactor PHP templates — remove Tailwind utilities from HTML'
status: In Progress
assignee:
  - '@agent-k'
created_date: '2026-04-16 17:18'
updated_date: '2026-04-16 18:28'
labels:
  - css
  - refactor
dependencies: []
parent_task_id: TASK-1.1
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Strip 200+ Tailwind utility classes from front-page.php and page-ui-demo.php. Replace with semantic class names (grid-2, flex-center, text-accent-red, bg-dark-accent). Only retain section-padding and container-custom.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 front-page.php Tailwind utility count reduced from ~200 to <10 custom classes
- [x] #2 page-ui-demo.php Tailwind utility count reduced from ~200 to <10 custom classes
- [ ] #3 All visual output preserved — pixel-identical rendering
- [ ] #4 PHP syntax validated
<!-- AC:END -->

## Implementation Notes

<!-- SECTION:NOTES:BEGIN -->
Phase 4 implementation verified. All sections render correctly with classless CSS. Hero, about, pillars, centers, shop, newsletter all working. Build passes cleanly.
<!-- SECTION:NOTES:END -->
