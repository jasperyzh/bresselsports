# CSS Architecture Refactor Plan: Classless & Minimalist Transition

**Date:** 2026-04-15
**Goal:** Transition the BRESSEL™ theme CSS architecture to a strict classless, semantic structure aligned with KISE (Keep It Simple, Engineer) principles.

## 🎯 Objective
Minimize CSS footprint by eliminating redundant utility classes, converting arbitrary component classes into semantic tag targets, and aligning custom styles natively with Tailwind v4 API and WordPress Core (Gutenberg) defaults.

---

## Phase 1: Eradicate Redundant CSS (main.css)

Currently, utility classes are manually declared in `main.css`. This defeats the purpose of the Tailwind compiler and adds unnecessary bytes to the payload.

### Actions:
1. **Delete built-in utility definitions** from `/src/main.css`:
   - Remove `.text-center` (Tailwind natively supports `text-center`)
   - Remove `.overflow-hidden` (Tailwind natively supports `overflow-hidden`)

### Expected Result:
A cleaner base layer that relies exclusively on Tailwind's native utility generation engine.

---

## Phase 2: Tailwind v4 API Integration (main.css)

Tailwind v4 replaces arbitrary class declarations with the explicit `@utility` directive, allowing custom utilities to participate correctly in the cascade and JIT compilation.

### Actions:
1. **Refactor `.gradient-text`:**
   Convert from standard CSS class:
   ```css
   .gradient-text { ... }
   ```
   To a Tailwind v4 registered utility:
   ```css
   @utility gradient-text {
     background: linear-gradient(135deg, var(--color-bressel-red) 0%, var(--color-bressel-yellow) 100%);
     background-clip: text;
     -webkit-text-fill-color: transparent;
   }
   ```
2. **Refactor `.flex-center`:**
   Convert to registered utility:
   ```css
   @utility flex-center {
     display: flex;
     justify-content: center;
     align-items: center;
   }
   ```

### Expected Result:
Custom utilities will perfectly respect Tailwind's cascade layers, hover states (`hover:gradient-text`), and responsive variants (`md:flex-center`).

---

## Phase 3: Transition to Structural/Classless Semantics (Components)

Arbitrary BEM-style classes (e.g., `.bressel-desktop-nav`) pollute HTML and require editors/developers to remember class identifiers. We must shift to styling HTML structural elements directly.

### Actions:
1. **Refactor Space/Layout (`layout.css`):**
   - *Current:* `.section-padding`
   - *Target:* Target semantic structure: `main > section` or `article > section`
2. **Refactor Navigation (`header.css`):**
   - *Current:* `.bressel-desktop-nav li a`
   - *Target:* Contextual structural targeting: `header nav ul li a`

### Expected Result:
HTML payloads will significantly shrink. Editor experience improves as elements style themselves simply by existing in the correct semantic location.

---

## Phase 4: Synchronize with WordPress Core Blocks (Buttons)

Instead of relying on proprietary classes like `.btn-solid`, we must map our aesthetic directly onto the HTML that the Gutenberg block editor generates natively.

### Actions:
1. **Refactor Button Definitions (`buttons.css`):**
   Expand base button selectors to automatically capture WordPress blocks and default form submissions:
   ```css
   /* Before */
   .btn { /* styles */ }

   /* After */
   button, 
   input[type="submit"], 
   .wp-block-button__link {
       /* base styles */
   }
   ```

### Expected Result:
Zero-configuration styling. When a content manager drags a "Button" block into Gutenberg, it automatically inherits the BRESSEL™ theme design without manual class assignment.

---

## 🛠️ Execution Instructions for LLM Agents

When assigning this implementation to a local LLM, provide the following prompt context:

> "You are executing the `008-css_classless_refactor_plan.md`. 
> Start by opening `@twentytwentyfour-bressel/src/main.css`. 
> 1. Delete standard CSS utility definitions (`.text-center`, `.overflow-hidden`).
> 2. Wrap `.gradient-text` and `.flex-center` in Tailwind v4 `@utility` directives.
> 3. After saving `main.css`, proceed to `/css/components/buttons.css` and map the primary styles to `button, input[type='submit'], .wp-block-button__link` instead of `.btn`.
> Ensure all changes strictly maintain the 'unlayered WordPress override' architecture established in previous commits."

---
## Phase 5: Action Items 
1. Follow the detailed execution instructions at the bottom of the plan.
2. Validate changes against WordPress Gutenberg output.