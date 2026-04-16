---
id: TASK-25.4
title: 'Fix Ticker: remove duplication and ensure seamless infinite scroll'
status: To Do
assignee: []
created_date: '2026-04-16 16:54'
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
- [ ] #1 Remove duplicate ticker instances (keep single ticker in correct position)
- [ ] #2 Implement seamless infinite horizontal scroll animation with CSS keyframes
- [ ] #3 Ensure smooth loop with duplicated content for seamless transition
- [ ] #4 Verify ticker speed is appropriate (not too fast/slow)
<!-- AC:END -->
