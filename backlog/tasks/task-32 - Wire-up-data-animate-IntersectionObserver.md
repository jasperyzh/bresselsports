---
id: TASK-32
title: Wire up data-animate IntersectionObserver
status: To Do
assignee: []
created_date: '2026-04-17 06:48'
labels: []
dependencies: []
priority: medium
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Template files use data-animate attributes on sections but no JavaScript observer is wired up. Scroll-triggered animations (fade-in, slide-up) don't execute.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [ ] #1 Create IntersectionObserver in main.js that targets [data-animate] elements
- [ ] #2 Add 'animate' class on intersection that triggers CSS transitions
- [ ] #3 Add CSS transition/animation in src/css/ for fade-in-up effect
- [ ] #4 Test on front-page.php sections
<!-- AC:END -->
