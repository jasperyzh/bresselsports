---
id: TASK-27
title: Shop Section Enhancement with Real Products
status: Done
assignee:
  - '@kise-engineer'
created_date: '2026-04-17 02:02'
updated_date: '2026-04-17 02:11'
labels: []
dependencies: []
priority: high
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Replace all placeholder images in Shop section with real product shots from extra_flair/, re-layout as asymmetric grid matching the BRESSEL PRO merch mockup, and add product metadata (names, prices, INQUIRE TO BUY buttons).
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 All placeholder.jpg references in Shop section replaced with real product shots
- [x] #2 Product cards use real assets: Bressel rackets, cap, tote bag, t-shirt, wristbands
- [x] #3 Asymmetric grid layout matching merch mockup (hero racket card + smaller product cards)
- [x] #4 Each product has name, price, description, and INQUIRE TO BUY button
- [x] #5 EQUIP YOUR CLUB CTA section added at bottom of shop
- [x] #6 npm run build succeeds without errors
<!-- AC:END -->

## Implementation Plan

<!-- SECTION:PLAN:BEGIN -->
1. Audit all placeholder.jpg references across the theme
2. Replace with real product shots from assets/products/
3. Create asymmetric product grid layout (hero card + smaller cards)
4. Add product metadata: names, prices, descriptions, INQUIRE TO BUY
5. Verify all merch post types display correctly
6. npm run build and verify
<!-- SECTION:PLAN:END -->

## Implementation Notes

<!-- SECTION:NOTES:BEGIN -->
Shop section: all fallback products now use real images from assets/products/
Asymmetric grid: first product (rackets) spans 2 columns as hero card
Noise texture added to Shop, Quote Carousel, Centers sections
Surge accent bars on product card hover
EQUIP YOUR CLUB CTA section added with BEYOND watermark
Product descriptions added to all 4 fallback products
<!-- SECTION:NOTES:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
TASK-27 Complete: Shop section enhanced with real product assets and asymmetric grid
- Fallback products replaced: Bressel Apex Pro rackets, Kinetic Grip-V1, Elite Tour Bag, Compression Pro Tee
- Asymmetric grid: hero product card spans full width (md:col-span-2)
- Noise texture added to Shop, Quote Carousel, and Centers sections
- Surge accent bars on product card hover
- EQUIP YOUR CLUB B2B CTA section integrated with BEYOND watermark
- Product descriptions, prices, and INQUIRE buttons on all cards
<!-- SECTION:FINAL_SUMMARY:END -->
