---
id: TASK-24
title: 'Polish: Header — Active Menu State, Logo Image, Mobile Menu Styling'
status: Done
assignee:
  - '@myself'
created_date: '2026-04-13 07:58'
updated_date: '2026-04-13 13:46'
labels:
  - header
  - polish
  - mobile
dependencies: []
priority: low
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
The header needs final polish to match the mockup exactly: (1) The logo should use the white PNG (assets/images/logo-bressel-white.png) instead of the inline SVG+text. (2) The active nav item must show the red underline. (3) The mobile menu full-screen overlay needs font sizing and link styling to match mockup.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Replace header inline SVG logo with <img> pointing to logo-bressel-white.png (w-auto h-8)
- [x] #2 Confirm .current-menu-item a::after red underline renders on active page
- [x] #3 Style mobile menu nav links: font-size 3rem, uppercase italic, Oswald font
- [x] #4 Confirm mobile menu close button (×) is correctly positioned top-right
<!-- AC:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Header polish: logo uses <img> with logo-bressel-white.png; active menu item shows red underline via ::after scaleX(1); mobile menu nav links styled uppercase italic font-black tracking-tighter; close button positioned absolute top-6 right-6
<!-- SECTION:FINAL_SUMMARY:END -->
