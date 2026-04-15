---
id: TASK-20
title: >-
  Implement: Shop Section — Product Cards, Teal BG, Ghost Watermark & Visit
  Catalog
status: Done
assignee:
  - '@myself'
created_date: '2026-04-13 07:57'
updated_date: '2026-04-13 11:44'
labels:
  - sections
  - shop
  - css
dependencies: []
priority: medium
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
The Shop section (id=shop) renders 2 product cards. In the mockup: left card has teal/dark-green background (racket product), right card has dark background (shoes product). Both have: series label in red, product name large uppercase italic, short description, price bold white, 'INQUIRE TO BUY' red button. Ghost 'BRESSEL PRO' watermark text sits behind. 'VISIT CATALOG' outlined button at top right.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Confirm .product-bg-teal gradient applies correctly to first product card
- [x] #2 Confirm .watermark-text 'BRESSEL PRO' renders with -webkit-text-stroke ghost effect
- [x] #3 Confirm product card hover lift (translateY(-4px)) transition works
- [x] #4 Confirm 'INQUIRE TO BUY' / 'INQUIRE' btn-solid-sm renders correctly on cards
- [x] #5 Replace broken SVG placeholder images with dark zinc-900 bg + centered inline SVG icon fallback
- [x] #6 Confirm 'VISIT CATALOG' btn-outline renders top-right of section header
<!-- AC:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Shop section completed: product-bg-teal gradient on first card; ghost BRESSEL PRO watermark with -webkit-text-stroke; product-card hover translateY(-4px) transition; btn-solid-sm INQUIRE buttons; replaced broken SVG images with bg-zinc-900 + inline SVG icon fallbacks; VISIT CATALOG btn-outline in header
<!-- SECTION:FINAL_SUMMARY:END -->
