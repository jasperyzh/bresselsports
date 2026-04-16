---
id: TASK-25.4
title: 'Fix Ticker: remove duplication and ensure seamless infinite scroll'
status: In Progress
assignee:
  - '@kise-engineer'
created_date: '2026-04-16 16:54'
updated_date: '2026-04-16 17:11'
labels:
  - bugfix
  - animation
dependencies: []
parent_task_id: TASK-25
priority: medium
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Ticker appears duplicated (twice on the page) and may not have working scroll animation. Mockup shows a clean single scrolling ticker bar.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Remove duplicate ticker instances (keep single ticker in correct position)
- [x] #2 Implement seamless infinite horizontal scroll animation with CSS keyframes
- [x] #3 Ensure smooth loop with duplicated content for seamless transition
- [x] #4 Verify ticker speed is appropriate (not too fast/slow)
<!-- AC:END -->

## Implementation Notes

<!-- SECTION:NOTES:BEGIN -->
Completed: Ticker duplication fixed. Reduced from 8 items to 4 unique items (JS auto-clones for seamless loop). CSS flex-nowrap added to prevent wrapping. Animation speed adjusted to 30s. Ticker separators changed from HTML dashes to CSS w-4 h-px bg-zinc-700 lines. px spacing reduced from 8 to 6. JS clone detection added via data-cloned attribute to prevent double-cloning.
<!-- SECTION:NOTES:END -->
