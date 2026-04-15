---
id: TASK-22
title: 'Implement: Ticker Animation — Seamless Infinite Scroll with Correct Speed'
status: Done
assignee:
  - '@myself'
created_date: '2026-04-13 07:58'
updated_date: '2026-04-13 13:43'
labels:
  - sections
  - ticker
  - animation
dependencies: []
priority: medium
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
Two news tickers exist on the page. The ticker-track animation (ticker-scroll keyframe) is defined in main2.css but currently not loading. The JS also clones items for seamless loop. The mockup shows: black background, thin zinc-800 top/bottom borders, red-labeled items alternating with zinc-300 text, separated by em-dash.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Confirm @keyframes ticker-scroll animation runs at 22s linear infinite
- [x] #2 Confirm JS clones ticker items for seamless loop (no gap/jump)
- [x] #3 Confirm 'hover: paused' behavior works (animation-play-state)
- [x] #4 Confirm both ticker instances (before programs section and before shop section) render identically
<!-- AC:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Ticker animation: @keyframes ticker-scroll 22s linear infinite; JS clones ticker items for seamless loop; animation-play-state paused on hover; both ticker instances (before programs and before shop) render identically with border-y border-zinc-800
<!-- SECTION:FINAL_SUMMARY:END -->
