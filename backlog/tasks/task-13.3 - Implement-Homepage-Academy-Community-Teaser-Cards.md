---
id: TASK-13.3
title: Implement Homepage Academy & Community Teaser Cards
status: Done
assignee:
  - '@matsu'
created_date: '2026-04-13 06:47'
updated_date: '2026-04-13 07:46'
labels: []
dependencies: []
parent_task_id: TASK-13
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Build out the two dark background teaser cards with subtle borders that route users immediately to the Academy or Community sections.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Implement CSS grid for the two cards
- [x] #2 Add subtle borders and 'Find a Court'/'Explore Programs' links with hover states
- [x] #3 Render HTML evaluation slide deck proving UI renders correctly via Chrome tools
<!-- AC:END -->

## Implementation Notes

<!-- SECTION:NOTES:BEGIN -->
All DOM checks passed via MCP. Grid confirmed 2-equal-col layout. border-zinc-800 borders verified at 1px. Both CTAs present with correct text. SVG transition confirmed. Overflow hidden contains image zoom.
<!-- SECTION:NOTES:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Refined Academy & Community teaser cards in front-page.php. Added subtle border-zinc-800 (1px) with hover:border-zinc-600, tightened gradient overlay, applied group/link context for arrow SVG translate-x-1 hover animation. Verified via MCP DOM inspection — all 8 checks passed.
<!-- SECTION:FINAL_SUMMARY:END -->
