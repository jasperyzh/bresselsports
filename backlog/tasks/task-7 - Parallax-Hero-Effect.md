---
id: TASK-7
title: Parallax Hero Effect
status: Done
assignee:
  - '@agent'
created_date: '2026-04-09 16:46'
updated_date: '2026-04-09 16:47'
labels:
  - animations
  - enhancement
dependencies: []
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Add subtle parallax scroll effect to hero section background using requestAnimationFrame and CSS transforms.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Parallax implemented in main.js
- [x] #2 Performance optimized with will-change and transform-only
- [x] #3 Works on hero images only
<!-- AC:END -->

## Implementation Plan

<!-- SECTION:PLAN:BEGIN -->
1. Add parallax scroll listener to main.js
2. Add CSS for parallax container
3. Optimize with requestAnimationFrame
<!-- SECTION:PLAN:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Added subtle parallax scroll effect to hero sections.

JS additions (main.js):
- Uses requestAnimationFrame for performance
- Queries [data-parallax] and [data-parallax-target]
- Calculates scroll position relative to element
- Passive scroll listener for better performance

CSS additions:
- [data-parallax]: overflow:hidden, position:relative
- [data-parallax-target]: will-change:transform for GPU acceleration

Usage:
<section data-parallax>
  <img data-parallax-target src="hero.jpg" alt="Hero">
</section>
<!-- SECTION:FINAL_SUMMARY:END -->
