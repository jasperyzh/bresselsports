---
id: TASK-19
title: 'Implement: Academy Centers Section — Location List & Image Grid'
status: Done
assignee:
  - '@myself'
created_date: '2026-04-13 07:57'
updated_date: '2026-04-13 11:19'
labels:
  - sections
  - centers
  - css
dependencies: []
priority: medium
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
The Academy Centers section (id=centers) has left column (BRESSEL ACADEMY / CENTERS heading in red, paragraph, 3 location rows: Malaysia, Philippines, Singapore each with location pin icon) and right column (2x2 image grid — 1 wide top + 2 small bottom). The mockup shows grayscale/monochrome images of courts. The section is currently rendering but with no images visible.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Replace placeholder SVG images with zinc-800 bg dark placeholder divs showing a padel-court icon (inline SVG) until real photos are uploaded
- [x] #2 Confirm 2-column layout: text left, image grid right (lg:grid-cols-2)
- [x] #3 Style location rows: py-5 divide-y divide-zinc-900, uppercase italic hover:text-white transitions
- [x] #4 Style the red location pin SVG icon on each row
- [x] #5 Confirm the accent-bar (red horizontal bar) above the heading renders
<!-- AC:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Updated Academy section: renamed to 'BRESSEL ACADEMY' (removed 'CENTERS'); added pricing cards (Group RM150/session, Private RM250/session); added PDF download button; replaced placeholder SVGs with dark bg-zinc-800 placeholder divs with court icons; 2-column lg:grid-cols-2 layout preserved; accent-bar, location rows, and red pin icons all styled
<!-- SECTION:FINAL_SUMMARY:END -->
