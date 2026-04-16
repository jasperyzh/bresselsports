---
id: TASK-25.5
title: Verify Hero video loads and check visual polish
status: To Do
assignee: []
created_date: '2026-04-16 16:54'
labels:
  - bugfix
  - hero
dependencies: []
parent_task_id: TASK-25
priority: medium
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Hero section has a <video> tag but video may not be loading. Need to verify video source exists, fallback to poster image if video fails, and ensure text overlay contrast is correct.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [ ] #1 Verify background-video.mp4 exists in assets/ directory
- [ ] #2 If video missing, ensure poster image (cta-bg-overlay.jpg) loads as fallback
- [ ] #3 Verify text overlay contrast (dark gradient overlay) makes headline readable
- [ ] #4 Check parallax scroll effect on video background
<!-- AC:END -->
