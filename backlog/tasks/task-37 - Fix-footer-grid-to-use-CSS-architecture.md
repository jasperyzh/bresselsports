---
id: TASK-37
title: Fix footer grid to use CSS architecture
status: To Do
assignee: []
created_date: '2026-04-17 06:48'
labels: []
dependencies: []
priority: low
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Footer.php uses inline <style> block for grid layout (5 columns on desktop) instead of using the src/css/ components architecture. This bypasses the Vite build pipeline.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [ ] #1 Move footer grid CSS from inline <style> to src/css/components/footer.css
- [ ] #2 Remove inline <style> block from footer.php
- [ ] #3 Verify responsive grid (1-col mobile, 2-col tablet, 5-col desktop) works
<!-- AC:END -->
