---
id: TASK-15
title: 'Fix: Navigation Menu — Register & Assign WordPress Menu'
status: Done
assignee:
  - '@matsu'
created_date: '2026-04-13 07:56'
updated_date: '2026-04-13 08:13'
labels:
  - critical
  - navigation
  - wordpress
dependencies: []
priority: high
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
The header nav renders an empty <nav> block because no WordPress menu is assigned to the 'primary' theme location. The nav items (ACADEMY, COMMUNITY, PRO GEARS) are invisible.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Create a WordPress nav menu via WP-CLI with items: Academy, Community, Pro Gears
- [x] #2 Assign the menu to the 'primary' theme location
- [x] #3 Verify nav items render in browser with correct .bressel-desktop-nav underline hover styles
<!-- AC:END -->

## Implementation Notes

<!-- SECTION:NOTES:BEGIN -->
- Created 'Primary Menu' via WP-CLI.
- Added items 'Academy', 'Community', and 'Pro Gears' as custom links.
- Assigned 'Primary Menu' to the 'primary' theme location.
- Verified HTML rendering and existence of '.bressel-desktop-nav' hover styles in CSS.
<!-- SECTION:NOTES:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Registered and assigned the 'Primary Menu' to the 'primary' theme location using WP-CLI. Added Academy, Community, and Pro Gears as custom links. Verified that the navigation menu renders correctly in the HTML and that the required hover underline styles are present in the compiled CSS.
<!-- SECTION:FINAL_SUMMARY:END -->
