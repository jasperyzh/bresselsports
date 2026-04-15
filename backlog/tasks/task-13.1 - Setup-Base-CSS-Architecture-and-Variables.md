---
id: TASK-13.1
title: Setup Base CSS Architecture and Variables
status: Done
assignee:
  - '@matsu'
created_date: '2026-04-13 06:47'
updated_date: '2026-04-13 06:59'
labels: []
dependencies: []
parent_task_id: TASK-13
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Establish global CSS variables in Tailwind base, styling native HTML typography tags (h1, h2, p, a) according to the mockups and our KISE CSS strategy.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Configure @theme / :root variables for Bressel colors (Black, White, Red) and typography
- [x] #2 Remove utility class bloat from h1/h2 headings by moving them to global base styles
<!-- AC:END -->

## Implementation Notes

<!-- SECTION:NOTES:BEGIN -->
Verified via browser-tools that Tailwind v4 setup is working. Global variables are injected correctly, and typography tags (h1, p) are cleanly inheriting Oswald/Inter without utility bloat. Parent WP block styles overridden.
<!-- SECTION:NOTES:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Configured custom @theme and @layer base in main.css for global UI guidelines. Ensured zero-bloat HTML output by mapping base styles locally. Verified typography and color application.
<!-- SECTION:FINAL_SUMMARY:END -->
