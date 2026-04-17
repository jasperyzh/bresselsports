---
id: TASK-28
title: 'Inner Page Templates — Academy, Merch, Community'
status: Done
assignee:
  - '@kise-engineer'
created_date: '2026-04-17 02:02'
updated_date: '2026-04-17 02:11'
labels: []
dependencies: []
priority: medium
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Create 3 new page templates matching the draft mockups: Academy (coach roster + booking), Merch archive (asymmetric product grid + club CTA), Community (events + partnerships). All follow the consistent design language: large editorial hero, B/w photography with accent tags, asymmetric grids.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Academy page template created: KINETIC PRECISION hero, coach roster cards with accent tags, TAKE THE ADVANTAGE booking section
- [x] #2 Merch archive page template created: KINETIC PRECISION ENGINEERING hero, asymmetric product grid, EQUIP YOUR CLUB CTA
- [x] #3 Community page template created: GLOBAL HUB OF PADEL WARRIOR hero, event cards with date badges, CLUB PARTNERSHIPS section
- [x] #4 All templates use existing noise texture and brand elements
- [x] #5 All templates responsive on mobile
- [x] #6 npm run build succeeds without errors
<!-- AC:END -->

## Implementation Plan

<!-- SECTION:PLAN:BEGIN -->
1. Create Academy page template (page-academy.php) with KINETIC PRECISION hero, coach roster cards, TAKE THE ADVANTAGE booking
2. Update Merch archive template (archive-merch.php) to match merch mockup with asymmetric grid
3. Create Community page template (page-community.php) with GLOBAL HUB hero, event cards, club partnerships
4. All templates use noise texture, brand elements, and classless CSS
5. npm run build and verify
<!-- SECTION:PLAN:END -->

## Implementation Notes

<!-- SECTION:NOTES:BEGIN -->
Academy page: KINETIC PRECISION hero, 3 coach roster cards (grayscale photos + accent tags), TAKE THE ADVANTAGE section with smart booking form
Merch archive: KINETIC PRECISION ENGINEERING hero, asymmetric product grid, EQUIP YOUR CLUB CTA
Community page: GLOBAL HUB OF PADEL WARRIOR hero, featured event card + 2 smaller event cards, CLUB PARTNERSHIPS section with benefits list
All templates: noise texture overlays, BEYOND watermarks, Surge accents, responsive breakpoints
<!-- SECTION:NOTES:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
TASK-28 Complete: 3 inner page templates matching draft mockups
- page-academy.php: KINETIC PRECISION hero, 3-coach roster (B/w photos + red/zinc accent tags), TAKE THE ADVANTAGE split CTA with smart booking form
- archive-merch.php: KINETIC PRECISION ENGINEERING hero, asymmetric product grid, EQUIP YOUR CLUB B2B CTA
- page-community.php: GLOBAL HUB OF PADEL WARRIOR hero, featured event card + sidebar events (Elite Clinic, Night Smash), CLUB PARTNERSHIPS with benefits checklist
- All templates: noise texture overlays, BEYOND watermarks, Surge accents, responsive (md:/lg: breakpoints), classless CSS architecture
<!-- SECTION:FINAL_SUMMARY:END -->
