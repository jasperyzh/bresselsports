---
id: TASK-5
title: Newsletter Signup Component
status: Done
assignee:
  - '@agent'
created_date: '2026-04-09 16:44'
updated_date: '2026-04-09 16:46'
labels:
  - components
dependencies: []
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Create newsletter signup component integrating with Fluent Forms. Email input with submit button. Use in footer or dedicated section.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 components/newsletter-signup.php created
- [x] #2 Integrates with Fluent Forms
- [x] #3 Matches BRESSEL dark theme styling
<!-- AC:END -->

## Implementation Plan

<!-- SECTION:PLAN:BEGIN -->
1. Create components/newsletter-signup.php
2. Integrate with Fluent Forms
3. Add proper styling matching BRESSEL dark theme
<!-- SECTION:PLAN:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Created Newsletter Signup component with Fluent Forms integration.

Files:
- components/newsletter-signup.php

Features:
- Integrates with Fluent Forms via [fluentform id=X] shortcode
- Graceful fallback to simple mailto form if Fluent Forms unavailable
- Mail icon with red accent
- Optional dark/light background toggle
- Customizable title and subtitle
- Screen-reader-only label for accessibility
- Proper dark theme input styling

Usage:
// Basic
get_template_part('components/newsletter-signup');

// With Fluent Forms (ID=2)
get_template_part('components/newsletter-signup', null, [
  'form_id' => 2,
  'title' => 'Stay Updated'
]);
<!-- SECTION:FINAL_SUMMARY:END -->
