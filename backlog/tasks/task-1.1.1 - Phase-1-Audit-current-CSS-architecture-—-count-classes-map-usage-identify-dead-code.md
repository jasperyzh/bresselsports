---
id: TASK-1.1.1
title: >-
  Phase 1: Audit current CSS architecture — count classes, map usage, identify
  dead code
status: Done
assignee:
  - '@kise-engineer'
created_date: '2026-04-16 17:18'
updated_date: '2026-04-16 17:32'
labels:
  - css
  - audit
dependencies: []
parent_task_id: TASK-1.1
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Inventory all Tailwind utilities and custom classes used across PHP templates. Document what's used vs what's defined. Identify CSS bloat opportunities.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Document: total Tailwind utility count per PHP file
- [x] #2 Document: total custom CSS class count per PHP file
- [x] #3 Document: CSS lines defined vs lines actually used
- [x] #4 Document: list of 'dead CSS' (defined in CSS but never used in HTML)
<!-- AC:END -->

## Implementation Notes

<!-- SECTION:NOTES:BEGIN -->
Audit complete. Key findings: 1120 CSS lines across 10 files, 557 Tailwind utility usages on front-page.php, 40 dead CSS classes defined but never used, 16 @utility blocks in main.css that can be eliminated. Target: 3 files, ~250 lines. Dead CSS includes all Fluent Forms classes, UI demo components (badge/tooltip/skeleton/switch-toggle/progress-bar), and unused variants (btn-sm, btn-lg, text-gradient-red, etc.). Phase 1 complete.
<!-- SECTION:NOTES:END -->
