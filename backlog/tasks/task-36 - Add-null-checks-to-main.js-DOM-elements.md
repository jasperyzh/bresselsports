---
id: TASK-36
title: Add null checks to main.js DOM elements
status: To Do
assignee: []
created_date: '2026-04-17 06:48'
labels: []
dependencies: []
priority: low
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
main.js references DOM elements without null checks. On pages where elements don't exist (e.g., no mobile menu on desktop), console errors occur.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [ ] #1 Add null checks before all DOM element queries
- [ ] #2 Wrap event listeners in existence checks
- [ ] #3 Test on all page templates
<!-- AC:END -->
