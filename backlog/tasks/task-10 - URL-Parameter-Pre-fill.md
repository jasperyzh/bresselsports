---
id: TASK-10
title: URL Parameter Pre-fill
status: Done
assignee:
  - '@agent'
created_date: '2026-04-09 16:47'
updated_date: '2026-04-09 16:48'
labels:
  - forms
  - enhancement
dependencies: []
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Parse URL parameters (intent, target) and pre-populate Fluent Form fields. For booking flows like /contact/?intent=booking&target=Coach+Name.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 URL params parsed on page load
- [x] #2 Hidden fields or subject pre-populated
- [x] #3 Fallback handling for missing params
<!-- AC:END -->

## Implementation Plan

<!-- SECTION:PLAN:BEGIN -->
1. Add URL param parser to main.js
2. Map intent/target to form fields
3. Add fallback handling
<!-- SECTION:PLAN:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Added URL parameter pre-fill for Fluent Forms.

JS additions (main.js):
- Parses URLSearchParams on page load
- Maps intent/target/source to form fields
- Field matching by name attributes (intent, target, coach, product, source)
- Select option matching for dropdowns
- decodeURIComponent for URL-safe values

CSS:
- .has-prefill::before: red gradient indicator

Usage:
/contact/?intent=booking&target=Coach+Name
/contact/?intent=purchase&target=Padel+Racket

Automatically pre-fills:
- intent → subject/type dropdown or hidden field
- target → coach/product reference field
- source → referral tracking field
<!-- SECTION:FINAL_SUMMARY:END -->
