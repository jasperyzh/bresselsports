---
id: TASK-29
title: Fix BRESSSELTHEME_VERSION typo
status: To Do
assignee: []
created_date: '2026-04-17 06:47'
labels: []
dependencies: []
priority: low
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Constant defined as 'BRESSSELTHEME_VERSION' (3 S's) instead of 'BRESSSELTHEME_VERSION'. This is a 3-character typo that affects the theme version string used across functions.php for asset enqueueing.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [ ] #1 Verify BRESSSELTHEME_VERSION constant is spelled correctly in functions.php line 18
- [ ] #2 Run npm run build and verify no build errors
<!-- AC:END -->
