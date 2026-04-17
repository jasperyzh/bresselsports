---
id: doc-004
title: doc-004 - BRESSEL Project Preferences
type: other
created_date: '2026-03-18 18:35'
---
# BRESSEL Project Preferences (Master Guidelines)

## 1. Design & Aesthetic Rules
- **Color Palette:** Pure Black (`#000000`), Clean White (`#FFFFFF`), Bressel Red (`#E62E2D`). Backgrounds are overwhelmingly black or dark zinc.
- **Typography:** **Oswald** (Headers) and **Inter** (Body).
- **Header Treatments:** Headers (`h1`-`h6`) must be **Uppercase, Bold, and Italicized** to create a "momentum-driven, high-performance" feel. Use tight tracking (`tracking-tighter`).
- **Form Styling:** Forms must look seamless. Dark inputs, red borders on focus, no default browser styling. 

## 2. Architecture & Tech Rules
- **Component Strategy:** Build UI using Astro-style PHP components in `/components/`. Data flows top-down via `$args`.
- **Styling:** Tailwind CSS v4 natively compiled via Vite. Use `@layer base` to enforce typography rules globally. Avoid excessive inline classes when semantic classes (`prose`, `container-custom`) can be used.
- **Data Layer:** CMB2 for all custom fields (code-first, no UI builders for fields).
- **Plugins:** Minimal. No Elementor (unless absolute emergency `template-canvas.php`), no WooCommerce. Use Fluent Forms for all interaction.

## 3. Interaction & Form Workflows
- **Unified Forms:** Do not build duplicate forms. Use a single "Smart Form" in Fluent Forms.
- **URL Parameters:** Pass `?intent=...` and `?target=...` in URLs to pre-fill the Smart Form context (e.g., `?intent=booking&target=Marco_Bressel`).

## 4. Communication Patterns
- Always ask the client for direct, fast communication channels like **WhatsApp** or **Telegram**, and prioritize linking those in the footer/contact pages over slow methods (email forms) when performance/bookings are the goal.
