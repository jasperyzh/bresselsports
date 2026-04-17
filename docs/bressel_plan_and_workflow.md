# BRESSEL™ WordPress Framework Project Review & Plan

## Project Overview

The BRESSEL™ WordPress Framework is a custom child theme of Twenty Twenty-Four, designed for a high-performance Padel Academy. It uses a modern technology stack emphasizing minimalist principles based on the AI Cognitive Layer (KISE Engineer persona).

### Stack & Architecture
- **Backend:** WordPress with PHP 8.2+, Custom Post Types (Coach, Merch, Event), CMB2 for custom fields, and Fluent Forms.
- **Frontend:** Vite 6, Tailwind CSS v4 (classless approach using `@theme` and custom properties), Vanilla JS (No jQuery).
- **Architecture:** Astro-style component architecture (`/components/*.php`).
- **Infrastructure:** Docker-based local development.

### Theme Structure
- `/twentytwentyfour-bressel`: Core theme files (`functions.php`, templates, etc.).
- `/components`: Reusable UI components.
- `main.js` / `main.css`: Entry points for Vite and Tailwind.

### Current State
- Core theme, CPTs, CMB2 fields, and several templates (home, archives, singles) are complete.
- Basic styling and mobile menu are functioning.
- ✅ **Phase 1 Complete:** Event Card, Testimonial, FAQ Accordion, Stats Counter, Newsletter Signup components
- ✅ **Phase 2 Complete:** Scroll animations, Parallax hero, Button micro-interactions (ripple, glow)
- ✅ **Phase 3 Complete:** Fluent Forms AJAX handling, URL parameter pre-fill
- 🔄 **Phase 4 In Progress:** UI Polish using mockup reference (homepage_50pct.jpg)
- **Remaining:** Mockup-based refinements to homepage template and footer

---

## Detailed Development Plan

### Phase 1: New Components Implementation
Following the Astro-style component architecture, we need to create the required new components:

1. **`components/event-card.php`**
   - Query global `post` type with `event` tag.
   - Display title, date, excerpt, link. Match `.bg-dark-accent` styling.
2. **`components/testimonial.php`**
   - Create a clean design using italics, subtle borders, and optional avatar.
3. **`components/faq-accordion.php` & `faq-item.php`**
   - Implement with Vanilla JS for accordion toggling. Use standard `<details>`/`<summary>` or custom markup based on styling needs.
4. **`components/stats-counter.php`**
   - Integrate an `IntersectionObserver` in vanilla JS to animate numbers counting up when scrolled into view.
5. **`components/newsletter-signup.php`**
   - Simple UI interacting with a specific Fluent Forms ID.

### Phase 2: Interactivity & Animations
Update `main.js` and `main.css`:

1. **Scroll-triggered animations:**
   - Add Intersection Observer in JS to add `.animate-fade-in-up` class to elements with a generic data attribute (e.g., `data-animate`).
2. **Parallax Effects:**
   - Add a lightweight vanilla JS scroll listener utilizing `requestAnimationFrame` to apply `transform: translateY()` to hero images.
3. **Hover & Micro-interactions:**
   - Enhance CSS utility classes and component styles for scaling, ripples, and glow effects on buttons and cards.

### Phase 3: Form Enhancements (Fluent Forms Integration)
1. **AJAX Submission & Validation:**
   - Configure Fluent Forms for AJAX. Add vanilla JS hooks for loading states and inline validation feedback.
2. **URL Parameter Pre-fill:**
   - Add a JS snippet in `main.js` to parse `window.location.search`.
   - Find Fluent Form input fields by their CSS selectors and populate values like `target` (e.g., Coach Name).

### Phase 4: Mockup Implementation & UI Polish
**Mockup Reference:** `homepage_50pct.jpg` (visible in AI analysis)

The mockup shows the complete homepage layout:
1. **Hero Section**: Full-screen with "PADEL ACADEMY" text, "Book a Session" red CTA
2. **About Section**: "THE PADEL ACADEMY YOU NEED"
3. **Programs Section**: 4 cards (Private Coaching, Group Training, Camps & Clinics, Fitness)
4. **Coaches Section**: "MEET YOUR COACHES" with photo cards
5. **Events Section**: "UPCOMING EVENTS" with event cards
6. **Newsletter Section**: "STAY IN THE GAME"
7. **Footer**: BRESSEL logo, red line, 4-column layout

**Tasks to complete:**
- [ ] Create homepage template with all sections matching mockup
- [ ] Add Programs section component
- [ ] Refine footer template with 4-column layout
- [ ] Update social links and placeholder content

---

## AI Agent Workflow & Cognitive Layer Best Practices

The project relies on `experiments/secops_research/` (cognitive layer), specifically utilizing the **KISE Engineer** persona.

### Core Principles for AI Agents
1. **Zero-bloat & Localism:**
   - Do NOT add NPM packages like `framer-motion` or `jquery`. Build animations and interactions with CSS and Vanilla JS.
2. **Classless CSS First:**
   - Rely heavily on CSS variables defined in `@theme` and standard HTML tags formatted in `@layer base`. Use Tailwind utilities only for layout and specific component modifiers.
3. **Astro-Style Code Structure:**
   - Write separate, atomic `.php` files in `/components/`. Use `$args` coalescing for variables perfectly to ensure safe fallback.

### Step-by-Step AI Development Workflow

1. **Context Initialization:**
   - The agent begins by reading `AGENTS.md` and `.cognitive-layer/README.md`.
   - The agent adopts the **KISE Engineer** persona.

2. **Task Planning (using backlog CLI):**
   - **DO NOT** edit markdown backlog files directly.
   - **DO** run `backlog task list --plain` to find current tasks.
   - Take a task: `backlog task edit <ID> -s "In Progress" -a @agent`.
   - Create an implementation plan: `backlog task edit <ID> --plan "1. Create file X\n2. Add Vanilla JS \n3. Apply CSS"`.

3. **Execution Phase:**
   - Execute the plan meticulously without hallucinating unnecessary files or bloated libraries.
   - Add progress notes: `backlog task edit <ID> --append-notes "Added component structure"`.
   - Before making file changes, read the destination file with `cat` or the Pi read tool to understand current layout.
   - Create/Modify templates via `write` or `edit` tools.

4. **Testing & QA Phase:**
   - Check WordPress installation/status using local WP-CLI Docker commands.
   - Check UI components via generated markup against the KISE CSS style guide.
   - Mark Acceptance Criteria as complete: `backlog task edit <ID> --check-ac <INDEX>`.

5. **Completion Phase:**
   - Generate Final Summary (PR Description): `backlog task edit <ID> --final-summary "Created Event Card Component using vanilla JS..."`.
   - Mark task Done: `backlog task edit <ID> -s Done`.

### Updating Files & Structure Safely

- **Functions & Hooks (`functions.php` / `functions/*.php`):**
  - Always wrap new functions in `if (!function_exists('...'))`.
  - Prefix everything with `bressel_`.
- **CSS (`main.css`):**
  - Place overarching rules in `@layer base`, component groupings in `@layer components`, and specific helpers in `@layer utilities`.
  - Variables go strictly in the `@theme` block.
- **JavaScript (`main.js`):**
  - Add logic encapsulated in ES6 Modules or wrapped within a single `DOMContentLoaded` listener. NO third-party bloated libraries.

### Quick Checklist for Every Change
- [ ] Does it work without JavaScript (where applicable)? Yes (Server-rendered PHP/HTML).
- [ ] Did I use standard WP escaping/sanitizing (`esc_html`, `esc_url`)?
- [ ] Is the styling relying on Tailwind utilities when local variables would suffice? (Refactor to use variables).
- [ ] Is the update correctly tracked in the Task CLI?

## Conclusion

This strategy guarantees high performance, lean deliverables, and perfect alignment with the KISE minimalist ideology. Implementing Phase 1–4 using the standardized AI workflow via the Cognitive Layer will result in a seamlessly maintained, lightning-fast WordPress child theme.
