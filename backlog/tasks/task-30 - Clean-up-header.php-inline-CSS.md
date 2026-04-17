---
id: TASK-30
title: Clean up header.php inline CSS
status: To Do
assignee: []
created_date: '2026-04-17 06:47'
labels: []
dependencies: []
priority: low
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Header.php contains inline .header-transparent/.header-scrolled styles (lines 18-26) that duplicate what should be in components.css. These inline styles create maintenance overhead and potential conflicts.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [ ] #1 Remove inline .header-transparent/.header-scrolled styles from header.php
- [ ] #2 Ensure header transition classes are defined in src/css/components.css
- [ ] #3 Verify header scroll behavior still works
<!-- AC:END -->
