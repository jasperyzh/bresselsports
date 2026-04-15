---
id: TASK-1
title: Event Card Component
status: Done
assignee:
  - '@agent'
created_date: '2026-04-09 16:43'
updated_date: '2026-04-09 16:44'
labels:
  - components
dependencies: []
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Create reusable event card component for homepage announcements. Query default post type with 'event' tag. Display title, date, excerpt, link. Match .bg-dark-accent styling.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Component file created at components/event-card.php
- [x] #2 Uses proper WP_Query for event tag
- [x] #3 Matches existing card aesthetic with bg-dark-accent
<!-- AC:END -->

## Implementation Plan

<!-- SECTION:PLAN:BEGIN -->
1. Read existing component patterns (coach-card.php, merch-card.php)
2. Create components/event-card.php
3. Add CSS styles if needed
4. Test template usage pattern
<!-- SECTION:PLAN:END -->

## Implementation Notes

<!-- SECTION:NOTES:BEGIN -->
Created components/event-card.php with:
- Date badge (day/month/year)
- Title with hover effect
- Excerpt with word limit
- Optional external link support
- Uses bg-dark-accent class from existing styles
<!-- SECTION:NOTES:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Created Event Card component (components/event-card.php) following Astro-style architecture.

Features:
- Date badge with day/month/year breakdown
- Title with hover color transition
- Excerpt with wp_trim_words (20 words)
- External link support with target="_blank"
- Arrow animation on hover
- Uses existing .bg-dark-accent class

Usage:
- Static: get_template_part('components/event-card', null, ['title' => '...', 'date' => '...'])
- Query: Use within WP_Query loop for event-tagged posts
<!-- SECTION:FINAL_SUMMARY:END -->
