---
id: TASK-3
title: FAQ Accordion Component
status: Done
assignee:
  - '@agent'
created_date: '2026-04-09 16:44'
updated_date: '2026-04-09 16:45'
labels:
  - components
dependencies: []
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Create FAQ section and item components with vanilla JS accordion behavior. No jQuery. Use for common questions about booking, pricing, location.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 components/faq-section.php created
- [x] #2 components/faq-item.php created
- [x] #3 Vanilla JS accordion without jQuery
<!-- AC:END -->

## Implementation Plan

<!-- SECTION:PLAN:BEGIN -->
1. Create components/faq-item.php (single FAQ with toggle)
2. Create components/faq-section.php (wrapper for multiple items)
3. Add accordion CSS to main.css
4. Add vanilla JS accordion to main.js
<!-- SECTION:PLAN:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Created FAQ Accordion components with vanilla JS (no jQuery).

Files created:
- components/faq-item.php: Single FAQ item with question/answer
- components/faq-section.php: Wrapper with optional title/subtitle

Features:
- Semantic button with aria-expanded for accessibility
- Icon rotation animation on expand
- Escape key closes all open items
- Focus-visible styling for keyboard navigation
- Tailwind hidden class for content toggle

CSS additions:
- FAQ hover states and transitions
- Icon rotation animation
- Focus-visible outline

JS additions (main.js):
- Query all [data-faq-trigger] elements
- Toggle aria-expanded and hidden class
- Escape key handler for accessibility

Usage:
get_template_part('components/faq-section', null, ['title' => 'FAQs']);
// Then loop with faq-item.php inside the template
<!-- SECTION:FINAL_SUMMARY:END -->
