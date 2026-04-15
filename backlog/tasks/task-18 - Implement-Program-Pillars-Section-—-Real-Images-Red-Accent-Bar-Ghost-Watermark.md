---
id: TASK-18
title: >-
  Implement: Program Pillars Section — Real Images, Red Accent Bar, Ghost
  Watermark
status: Done
assignee:
  - '@myself'
created_date: '2026-04-13 07:57'
updated_date: '2026-04-13 11:15'
labels:
  - sections
  - program-pillars
  - css
dependencies: []
priority: medium
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
The Program Pillars section (id=programs) exists in front-page.php and renders 3 cards (Professional, Competition, Coaches). Currently all placeholder SVGs. The mockup shows: real action photos with top-red accent bar on hover, ghost 'ACADEMY' watermark text behind the section, 'PROGRAM PILLARS' heading left-aligned, and a sub-label above it.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Confirm .watermark-text CSS class renders correctly (font-size clamp, -webkit-text-stroke, transparent fill)
- [x] #2 Confirm red top-border hover accent (scale-x-0 to scale-x-100 transition) works on pillar cards
- [x] #3 Confirm pillar card hover shows description text (opacity-0 to opacity-100 transition)
- [x] #4 Confirm 3-column grid renders correctly at md: breakpoint
- [x] #5 Add fallback: if no real images, use a dark zinc-900 background on cards instead of broken SVG
<!-- AC:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Enhanced Program Pillars section: added red top accent bar with scaleX hover transition via ::before pseudo-element; added dark bg-zinc-900 fallback background on cards; watermark-text CSS already present and correct; 3-column md:grid-cols-3 grid already in place
<!-- SECTION:FINAL_SUMMARY:END -->
