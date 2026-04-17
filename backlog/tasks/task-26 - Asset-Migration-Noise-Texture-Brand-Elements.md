---
id: TASK-26
title: 'Asset Migration, Noise Texture & Brand Elements'
status: Done
assignee:
  - '@kise-engineer'
created_date: '2026-04-17 02:02'
updated_date: '2026-04-17 03:08'
labels: []
dependencies: []
priority: high
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Migrate all brand assets from extra_flair/ into theme's assets directory, add noise texture CSS system, and integrate Beyond slogan + Surge graphic elements across the site.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 All assets copied to proper directories: products/, brand/beyond.svg, brand/the_surge.svg, textures/noise--.png
- [x] #2 Noise texture CSS system added to modifiers/effects.css or sections.css with .noise-overlay and .texture-- classes
- [x] #3 BEYOND wordmark integrated in hero section (large decorative SVG, red accent)
- [x] #4 The Surge SVG used as decorative element (image mask overlay, section divider, or card accent)
- [x] #5 npm run build succeeds without errors
- [x] #6 Visual inspection shows noise texture on dark backgrounds and brand elements visible
<!-- AC:END -->

## Implementation Plan

<!-- SECTION:PLAN:BEGIN -->
1. Migrate assets from extra_flair/ to theme assets/
2. Create subdirectories: products/, brand/, textures/
3. Add noise texture CSS system to sections.css
4. Integrate BEYOND wordmark in hero
5. Integrate The Surge SVG as decorative element
6. npm run build and verify
<!-- SECTION:PLAN:END -->

## Implementation Notes

<!-- SECTION:NOTES:BEGIN -->
Assets migrated: products/ (12 product shots), brand/beyond.svg, brand/the_surge.svg, textures/noise--.png
Noise CSS system added to sections.css (.noise-overlay, .texture-dark) and helpers.css (.noise-animate)
BEYOND SVG integrated as large decorative background in hero (opacity 0.04)
The Surge SVG used as accent bar under hero headline + bottom accent on pillar cards
Noise texture applied to: hero BEYOND watermark, EQUIP YOUR CLUB section, Program Pillar cards
Shop fallback products updated with real product images + descriptions
EQUIP YOUR CLUB B2B CTA section added with BEYOND watermark background
npm build succeeds (75.95 KB CSS, 7.17 KB JS)

- Fixed responsive grid layouts: .about-grid (2-col md), .pillar-grid (3-col md), .centers-grid (2-col lg), .shop-grid (2-col md)
- All responsive utilities now built directly into custom component CSS classes
- Tailwind @source directive issue: md/lg responsive utilities not auto-generated from PHP files
- Workaround: Added responsive @media queries directly to component classes
- Fixed ticker duplication for infinite scroll animation (both tickers now render items twice)
- Fixed footer grid: inline <style> block for lg:grid-cols-5 layout (bypasses Tailwind build stripping)
- CSS size: 82.94 KB (gzip 14.63 KB)
<!-- SECTION:NOTES:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Fixed critical responsive layout issues:
1. Added responsive grid layouts directly to custom component classes (.about-grid, .pillar-grid, .centers-grid, .shop-grid)
2. Fixed ticker duplication for infinite scroll animation
3. Fixed footer grid with inline styles for lg:grid-cols-5 layout
4. Cleaned up duplicate responsive utilities from base.css, helpers.css, components.css

Root cause: Tailwind v4 @source directive does not generate md/lg responsive utilities from PHP files consistently. Only sm breakpoint utilities are generated.
<!-- SECTION:FINAL_SUMMARY:END -->
