---
id: TASK-17
title: 'Fix: Footer — Add Dark Background, Logo, Grid Layout & Bottom Bar Styling'
status: Done
assignee:
  - '@myself'
created_date: '2026-04-13 07:57'
updated_date: '2026-04-13 11:02'
labels:
  - footer
  - css
  - styling
dependencies: []
priority: high
---

## Description

<!-- SECTION:DESCRIPTION:BEGIN -->
footer.php has the correct HTML structure but zero styling. In the mockup the footer has: black background, BRESSEL logo (white SVG + trademark), tagline text, 4-column grid (Brand | ACADEMY | RESOURCES | STAY CONNECTED), email subscribe form, and a bottom copyright bar with a thin zinc-900 top border.
<!-- SECTION:DESCRIPTION:END -->

## Acceptance Criteria
<!-- AC:BEGIN -->
- [x] #1 Add bg-zinc-950 border-t border-zinc-900 py-20 to <footer> tag
- [x] #2 Style the logo: white text, red ™, Oswald font, correct icon sizing (w-7 h-7)
- [x] #3 Style footer h4 headings: uppercase, tracking-widest, text-xs, zinc-400 color
- [x] #4 Style footer ul links: text-zinc-500 hover:text-white text-sm, block, py-1 spacing
- [x] #5 Style bottom bar: border-t border-zinc-900, py-6, text-zinc-600 text-xs
- [x] #6 Style the email form inline: input + button side-by-side, red button, zinc border input
<!-- AC:END -->

## Final Summary

<!-- SECTION:FINAL_SUMMARY:BEGIN -->
Styled footer: bg-zinc-950 with border-zinc-900; logo fixed path and sizing (h-12 md:h-16); h4 headings use text-zinc-400; footer links use text-zinc-500 hover:text-white with block/py-1; bottom bar uses border-zinc-900 py-6 text-zinc-600; email form inline with flex-row side-by-side layout
<!-- SECTION:FINAL_SUMMARY:END -->
