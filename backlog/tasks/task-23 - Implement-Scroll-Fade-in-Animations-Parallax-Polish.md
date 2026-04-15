---
id: TASK-23
title: 'Implement: Scroll Fade-in Animations & Parallax Polish'
status: Done
assignee:
  - '@myself'
created_date: '2026-04-13 07:58'
updated_date: '2026-04-13 13:46'
labels:
  - animations
  - polish
  - js
dependencies: []
priority: low
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
The site uses Intersection Observer to trigger .animate-fade-in-up on [data-animate] elements. The parallax effect on the hero section uses [data-parallax-target]. Both are wired in main.js but only work when main2.css (which defines @keyframes fadeInUp + .animate-fade-in-up) is imported. Once TASK-14 is done, verify these work end-to-end.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Confirm [data-animate] elements start at opacity-0 and fade up when scrolled into view
- [x] #2 Confirm .animate-fade-in-up class triggers correct @keyframes fadeInUp animation
- [x] #3 Confirm parallax hero video/image translates smoothly on scroll
- [x] #4 Confirm no layout shift or jump when animations trigger
<!-- AC:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Scroll animations & parallax: added initial [data-animate] opacity-0; @keyframes fadeInUp 0.6s ease-out; IntersectionObserver adds animate-fade-in-up class when 10% visible; parallax hero video translates smoothly with data-parallax-target; no layout shift due to opacity-0 initial state
<!-- SECTION:FINAL_SUMMARY:END -->
