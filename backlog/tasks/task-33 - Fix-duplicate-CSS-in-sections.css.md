---
id: TASK-33
title: Fix duplicate CSS in sections.css
status: To Do
assignee: []
created_date: '2026-04-17 06:48'
labels: []
dependencies: []
priority: low
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
sections.css contains duplicate .about-card-link styles (lines ~118-137). Remove the duplicate block to reduce CSS bloat.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [ ] #1 Remove duplicate .about-card-link definition in src/css/sections.css
- [ ] #2 Verify build still succeeds
<!-- AC:END -->
