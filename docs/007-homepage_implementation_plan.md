# BRESSEL™ Homepage Implementation & Workflow Plan

This document breaks down the homepage implementation strategy based on the `mockups/bressel - homepage v1.jpg` design, defines our CSS rules, and outlines the visual validation workflow using Chrome Browser Tools.

## 1. Minimalist CSS Strategy & Rules

In line with our KISE (Keep It Simple Engineer) principles and zero-bloat goal, we use a hybrid styling approach.

### The Styling Rules:
1. **Semantic Tags Globally (The Foundation):**
   * Use Tailwind's `@theme` or `@layer base` for global type styling.
   * `h1`, `h2`, `h3`, `p`, `a` should inherit their font-families, weights, and colors from global variables (e.g., `--color-bressel-red`).
   * *Why?* This keeps the HTML clean from repetitive typography classes that bloat the DOM.
2. **Tailwind Classes (Layout & Spacing):**
   * Use utility classes *only* for layout mechanics (`flex`, `grid`, `max-w-7xl`, `mx-auto`) and spacing (`p-4`, `mt-12`, `gap-6`).
   * *Why?* Tailwind excels at responsive layouts. Using it for geometry, but not raw styling/colors, strikes the perfect balance.
3. **Custom Classes (Unique & Animations):**
   * Prepend custom classes if you need complex hover states, pseudo-elements (`::before`), or animations that require keyframes not easily done in inline utilities.
   * *Why?* It prevents unreadable lines of 30+ Tailwind utilities for a single button or hero element.

## 2. Homepage Section-by-Section Breakdown

Based on the provided mockup, here is the architecture for the `front-page.php`.

### A. Global Header & Navigation
* **Elements:** Logo (left), Centered Nav (Academy, Community, Pro Gears), CTA Button "Book Session" (right).
* **Styling:** Transparent over the hero section, sticking to the top on scroll with a dark semi-transparent background.
* **Why:** Standard e-commerce/academy flow. The CTA is always accessible to drive immediate conversion.

### B. Hero Section (The Hook)
* **Elements:** 
    * Background: Full-width video loop of padel action, with an image fallback for performance/mobile.
    * Content overlay: "WORLD-CLASS PADEL, WITHIN REACH.", sub-text, and dual CTAs ("Book Session", "Explore Programmes").
* **Implementation Note:** Video background via `<video autoplay loop muted playsinline>` with a `poster` attribute as the fallback image.
* **Why:** Padel is kinetic and high-energy. A static image doesn't capture the speed. The video hooks the user, while the transparent overlay ensures text readability.

### C. Teaser Cards (Academy & Community)
* **Elements:** Two equal-width cards sitting partially over the hero section or immediately below.
* **Styling:** Dark background, subtle borders, inner text with a red arrow link.
* **Why:** Immediate segmentation. Competitive players go to "Academy," casual players/beginners go to "Community."

### D. Marquee (News Ticker)
* **Elements:** A scrolling horizontal banner (red text on black).
* **Content:** "UPCOMING: ... EVENT: ... LIVE: ... NEW DROP:"
* **Why:** Creates a sense of urgency and constant activity.

### E. Program Pillars (Academy)
* **Elements:** Heading "PROGRAM PILLARS", followed by three visual cards: Professional, Competition, Coaches.
* **Styling:** CSS Grid (`grid-cols-1 md:grid-cols-3`). Cards have image backgrounds with gradients from the bottom to make text legible.
* **Why:** Clearly outlines the offerings of the Academy side of the business. 

### F. Quote Section (Brand Authority)
* **Elements:** Large, impactful typography: "PADEL IS NOT JUST A GAME OF FORCE...". Small sub-attribution (Jeremy | Head of Pro Training). Background image of a player.
* **Why:** Breaks the grid rhythm, provides social proof/brand philosophy, and acts as visual breathing room before the next dense section.

### G. Academy Centers (Locations)
* **Elements:** Left column with location names (Malaysia, Philippine, Singapore). Right column with black & white/monochrome imagery of the courts.
* **Styling:** The right column looks like it uses a CSS grid mosaic or a custom slider.
* **Why:** Establishes regional footprint and physical presence.

### H. Marquee (News Ticker - Repeated)
* **Why:** Reinforces the active state of the brand before transitioning to the shop.

### I. Shop Teaser (Bressel Pro)
* **Elements:** Heading "SHOP", followed by featured products (Bressel Padel-X racket, Kinetic Grip-V1 shoes).
* **Styling:** Dark mode product cards with clear pricing and "Inquire to Buy" buttons. We are *not* using WooCommerce based on the project rules.
* **Why:** Monetization. Showing physical gear validates the brand's premium positioning.

### J. CTA Footer (Join the Movement)
* **Elements:** Large text "JOIN THE MOVEMENT.", form input for email, "Subscribe" button. Gradient background (black to red).
* **Why:** Captures leads for users who aren't ready to book or buy yet.

### K. Global Footer
* **Elements:** Logo, standard column links (Academy, Resources, Stay Connected).
* **Why:** Standard web convention for secondary navigation and legal links.


## 3. Visual Validation Workflow (MCP & Browser Tools)

Because we must "Demand proof before writing" and avoid blindly pushing code, we will use an MCP tool (`browser-tools` via Chrome DevTools Protocol) to validate the UI visually.

### The "Proof Before Done" Process (Dual-Model Cycle):

To optimize cost and quality, we split responsibilities between highly capable reasoning models and fast, low-cost execution models.

1.  **Plan (Gemini 3.1 Pro):** Ask Gemini to review the mockups, define the architecture, and write the Backlog plan.
2.  **Clear & Switch:** Run `/clear` and switch to **MiniMax m2.7**.
3.  **Execute (MiniMax m2.7):** MiniMax reads the Backlog plan and writes the PHP/Tailwind layout.
4.  **Clear & Switch:** Run `/clear` and switch back to **Gemini 3.1 Pro**.
5.  **Evaluate (Gemini 3.1 Pro):** Start the browser tools, navigate to `http://localhost:8080`, parse the DOM, and verify MiniMax's code actually implemented the mockup correctly.
6.  **HTML Evaluation Slide (Gemini 3.1 Pro):**
    Before marking a UI task complete, generate a lightweight HTML file documenting the verification (`docs/eval-section-name.html`).
7.  **Finalize & Clear Context:** Close the Backlog task and run `/clear` before repeating the cycle.