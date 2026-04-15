---
id: TASK-21
title: 'Implement: CTA Newsletter Section — Gradient BG, Form & Typography'
status: Done
assignee:
  - '@myself'
created_date: '2026-04-13 07:57'
updated_date: '2026-04-13 13:43'
labels:
  - sections
  - newsletter
  - css
dependencies: []
priority: medium
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
The CTA/Newsletter section at the bottom of the page has a warm dark-to-red radial gradient background. Mockup shows: large 'JOIN THE' white + 'MOVEMENT.' red heading, sub-paragraph, inline email input + red SUBSCRIBE button side by side. Currently the gradient .cta-bg class is defined but the section looks black because it may not be applying.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Confirm .cta-bg radial-gradient (dark → red/brown) renders visually — the warm glow must be visible
- [x] #2 Confirm 'JOIN THE MOVEMENT.' heading renders at clamp(5rem, 12vw, 12rem) correctly
- [x] #3 Confirm the email input + SUBSCRIBE button renders side-by-side (flex row on sm:)
- [x] #4 Confirm the form fallback (non-FluentForms) displays when plugin is inactive
<!-- AC:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
CTA Newsletter section: .cta-bg radial-gradient warm dark-to-red; heading updated to clamp sizing; form inline with flex-col sm:flex-row; form fallback displays when FluentForms inactive; fixed z-index stacking (gradient z-0, image z-[1]) for proper layering
<!-- SECTION:FINAL_SUMMARY:END -->
