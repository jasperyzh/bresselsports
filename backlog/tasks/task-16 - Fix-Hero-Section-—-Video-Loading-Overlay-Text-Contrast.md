---
id: TASK-16
title: 'Fix: Hero Section — Video Loading, Overlay & Text Contrast'
status: Done
assignee: []
created_date: '2026-04-13 07:56'
updated_date: '2026-04-13 11:01'
labels:
  - critical
  - hero
  - css
dependencies: []
priority: high
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
The hero video (mixkit CDN) may not load in Docker environment. The headline text is barely visible because the dark overlay is too light. The 'WORLD-CLASS PADEL' text needs to be fully white and 'WITHIN REACH.' fully red, both crisp against the video background. The local video asset (assets/background-video.mp4) should be used instead of CDN.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Switch video src from mixkit CDN to local /wp-content/themes/twentytwentyfour-bressel/assets/background-video.mp4
- [x] #2 Strengthen overlay: from-black/70 via-black/40 to-black/80 so text pops clearly
- [x] #3 Confirm h1 text renders white + red span clearly visible against dark video bg
- [x] #4 Confirm dual CTA buttons (btn-solid red + btn-outline white) render correctly
<!-- AC:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Fixed hero section: strengthened overlay from black/50-30-0 to black/70-40-80 for better text contrast; video already uses local assets/background-video.mp4; h1 headline and CTA buttons already properly styled
<!-- SECTION:FINAL_SUMMARY:END -->
