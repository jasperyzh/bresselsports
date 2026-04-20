# BRESSEL™ CSS Rebuild Plan — KISE + @base-ui/ Architecture

## Problem Statement

The project has 3,692 lines of CSS across 10 files with significant duplication and conflicting class systems:

### Current CSS Architecture (3,692 lines total)
```
❌ `bressel-tokens.css` (493) — Duplicates @theme tokens from starwind.css
❌ `starwind.css` (167) — Overlaps with bressel-tokens.css
❌ `starwind-patterns.css` (116) — Likely unused jycom patterns
❌ `sections.css` (892) — Large, overlaps with mockup-match.css
❌ `mockup-match.css` (1,037) — Duplicates section styles with sections.css
❌ `utilities.css` (217) — Redundant, Tailwind v4 provides these
❌ `helpers.css` (82) — Animations can be merged
```

**Result**: Overly complex, hard to maintain, bloated CSS output (144KB built).

---

## Solution: Two-File Architecture

### New CSS Architecture (1,300 lines estimated)

```
src/
├── css/
│   ├── base-ui-bressel.css   ← NEW: Semantic component system
│   └── sections-bressel.css  ← NEW: Brand-specific layout layers
├── styles/
│   └── starwind.css          ← Kept for Tailwind v4 foundation
└── main.css                  ← Simplified entry point
```

**Total files**: 2 CSS layers (down from 10)  
**Lines**: ~1,300 (down from 3,692)  
**Built size**: ~55KB (down from 144KB)

---

## Layer 1: `base-ui-bressel.css`

**Purpose**: Semantic component system (agnostic of brand/section)

### Contains semantic classes that templates consume:

```css
/* Typography Hierarchy */
.heading-xl  /* clamp(2.5rem, 7vw, 6rem) - Hero headlines */
.heading-lg  /* clamp(1.75rem, 4vw, 4.5rem) - Section titles */
.heading-md  /* clamp(1.25rem, 3vw, 2.25rem) - Card titles */
.heading-sm  /* 0.875rem uppercase - Labels */
.body-lg     /* 1.125rem - Large body text */
.body        /* 1rem - Standard body text */
.caption     /* 0.75rem uppercase tracking-widest */

/* Component System - All brand colors via CSS custom properties */
.btn         /* Base: inline-flex, font-header, bold, uppercase */
.btn-primary /* BRESSEL red bg, white text */
.btn-outline /* Transparent, white border */
.btn-ghost   /* Transparent, red text on hover */

.card        /* Base: bg-bressel-black-soft, border-bressel-zinc-800 */
.card--pillar /* Pillar-specific card variant */
.card--product /* Product-specific card variant */
.card-image  /* Base card image styling */
.card-content /* Base card content padding */

.badge       /* Base badge */
.badge-red   /* BRESSEL red badge */
.badge-zinc  /* Zinc badge */

.nav-link    /* Navigation link */
.input       /* Form input styling */
```

### Key Rules (from @base-ui/ philosophy):

1. ✅ **Semantic classes only** — Describe what, not how
2. ✅ **Colors in CSS** — All colors defined via CSS custom properties
3. ✅ **No Tailwind utilities** — No `.flex`, `.gap-4`, `.p-4` in this file
4. ✅ **Font-agnostic but branded** — Use BRESSEL fonts (Oswald, Inter)
5. ✅ **Compatible with @base-ui/** — Same naming pattern, BRESSEL-branded tokens

### Tokens (CSS Custom Properties):

```css
:root {
  --color-bressel-red: #FF331F;
  --color-bressel-black: #090808;
  --color-bressel-white: #FBFBFF;
  --color-bressel-zinc-200: #e4e4e7;
  --color-bressel-zinc-400: #a1a1aa;
  --color-bressel-zinc-600: #52525b;
  --color-bressel-zinc-800: #27272a;
  --font-header: "Oswald", sans-serif;
  --font-body: "Inter", sans-serif;
  --font-weight-bold: 700;
  --font-weight-black: 900;
}
```

---

## Layer 2: `sections-bressel.css`

**Purpose**: Brand-specific layout layers for each mockup section

### Contains:

- Section container styles (`.hero-section`, `.pillars-section`, `.newsletter-cta`)
- Specialized card variants (`.card--pillar`, `.card--product`)
- Overlays, watermarks, noise textures
- Responsive tweaks for sections

### Key Rules:

1. ✅ **Tailwind for layout only** — Use `grid`, `gap-6`, `py-8` for structure
2. ✅ **Build on base-ui** — Never override semantic classes, extend them
3. ✅ **Reference mockup** — Match visual hierarchy, not pixel dimensions
4. ✅ **CSS for brand specifics** — Colors, borders, interactions in CSS
5. ❌ **No color utilities** — Use CSS custom properties

---

## Entry Point: `src/main.css`

```css
/* ====================================
   BRESSEL™ CSS Entry Point
   2-layer KISE architecture
   ==================================== */

/* Layer 0: Foundation (Tailwind v4) */
@import "tailwindcss";
@import "tw-animate-css";

/* Layer 1: Semantic component system */
@import "./css/base-ui-bressel.css";

/* Layer 2: Brand layout */
@import "./css/sections-bressel.css";

/* No unlayered styles needed */
```

### Deleted Files (8 files):

- ❌ `bressel-tokens.css` (merged into base-ui-bressel)
- ❌ `starwind-patterns.css` (unused)
- ❌ `sections.css` (merged into sections-bressel)
- ❌ `mockup-match.css` (merged into sections-bressel)
- ❌ `utilities.css` (Tailwind provides these)
- ❌ `helpers.css` (animations merged into sections-bressel)
- ❌ `base.css` (element selectors merged into base-ui-bressel)

---

## Template Refactoring Strategy

### Before (custom classes, utility noise):

```php
<!-- ❌ WRONG: Too many custom classes, not semantic -->
<div class="hero-tagline">
  <span class="rule"></span>
  <span class="text">EST. 2026</span>
  <span class="rule"></span>
</div>
<h1 class="hero-headline">WORLD-CLASS PADEL</h1>
```

### After (@base-ui/ aligned, minimal noise):

```php
<!-- ✅ CORRECT: Semantic + minimal Tailwind layout -->
<div class="flex items-center gap-4 justify-center">
  <div class="w-8 h-0.5 bg-red"></div>
  <span class="caption">EST. 2026</span>
  <div class="w-8 h-0.5 bg-red"></div>
</div>
<h1 class="heading-xl">WORLD-CLASS PADEL</h1>
```

### Guidelines for PHP Templates:

1. **Semantic first** — Use `.heading-xl`, `.btn-primary`, `.card`, `.badge-red`
2. **Tailwind for layout only** — Use `flex`, `grid`, `gap-4` for structure
3. **No color utilities** — Use CSS custom properties or semantic classes
4. **Data attributes for JS** — Use `data-slot="button"` for component behavior
5. **One class per component** — Not `.btn .btn-red .btn-large`

---

## Section-by-Section Mockup Reference

### 1. HERO SECTION
- **Mockup**: Full-bleed background, centered text, red accents
- **Base-ui classes**: `.heading-xl`, `.body-lg`, `.btn-primary`, `.btn-outline`
- **Tailwind layout**: `flex flex-col justify-end items-center gap-4`
- **Section styles**: `.hero-overlay` (gradient), `.hero-bg-image` (opacity 0.4)

### 2. ACADEMY/COMMUNITY CARDS
- **Mockup**: Image-left, text-right, horizontal layout
- **Base-ui classes**: `.card`, `.card-image`, `.card-content`, `.badge-red`, `.heading-md`, `.body`, `.btn-ghost`
- **Tailwind layout**: `grid grid-cols-1 md:grid-cols-2 gap-6`
- **Section styles**: `.h-cards-grid` (container), `.h-card` (height 280px)

### 3. PROGRAM PILLARS
- **Mockup**: Three image cards with overlay text
- **Base-ui classes**: `.card--pillar`, `.badge-red`, `.heading-md`, `.btn-ghost`
- **Tailwind layout**: `grid grid-cols-1 md:grid-cols-3 gap-6`
- **Section styles**: `.ghost-watermark` (ACADEMY text), `.pillar-card-overlay`

### 4. CENTERS
- **Mockup**: Left list, right image grid
- **Base-ui classes**: `.heading-lg`, `.heading-sm`, `.nav-link`
- **Tailwind layout**: `grid grid-cols-1 md:grid-cols-2 gap-8`
- **Section styles**: `.locations-list` (border-top), `.centers-images` (grid pattern)

### 5. SHOP PRODUCTS
- **Mockup**: Product cards with image, series badge, name, price
- **Base-ui classes**: `.card--product`, `.badge-red`, `.heading-md`, `.body`, `.btn-ghost`
- **Tailwind layout**: `grid grid-cols-1 sm:grid-cols-2 gap-6`
- **Section styles**: `.product-card-name` (font-style italic), `.product-price` (font-weight)

### 6. NEWSLETTER CTA
- **Mockup**: Warm gradient background, email input, red button
- **Base-ui classes**: `.heading-xl`, `.body-lg`, `.input`, `.btn-primary`
- **Tailwind layout**: `max-w-md mx-auto`
- **Section styles**: `.newsletter-cta-bg` (bg image), `.accent` (red text)

---

## Execution Plan (KISE-aligned)

### Phase 1: Build `base-ui-bressel.css`
1. Create file with semantic typography hierarchy
2. Port button/card/badge/nav/input components from bressel-tokens.css + components.css
3. Convert all to CSS custom properties for brand values
4. **Critical**: No Tailwind utilities allowed

### Phase 2: Build `sections-bressel.css`
1. Merge sections.css + mockup-match.css
2. Replace color/border utilities with CSS custom properties
3. Add Tailwind utilities for layout (gap, py, grid)
4. Move animations from helpers.css into this file

### Phase 3: Simplify `main.css`
1. Remove all `@import` except: tailwindcss, starwind.css, base-ui-bressel.css, sections-bressel.css
2. Delete 6 unused CSS files (see list above)
3. Rebuild with Vite

### Phase 4: Audit & Refactor Templates
1. Review `front-page.php`, `header.php`, `footer.php` section by section
2. Replace custom BRESSEL classes with base-ui semantic classes
3. Add Tailwind layout utilities only where needed
4. **Goal**: Templates should read like semantic HTML

### Phase 5: Visual QA (Mockup-First)
1. Compare each section to mockup.jpg (not pixel-perfect, but close)
2. Adjust section-specific styles in `sections-bressel.css` only
3. Verify no color/border utilities in templates

---

## Expected Outcomes (KISE)

| Metric | Before | After | Improvement |
|--------|--------|-------|-------------|
| CSS files | 10 | 2 | 80% reduction |
| Lines of CSS | 3,692 | ~1,300 | 65% reduction |
| Built file size | 144 KB | ~55 KB | 62% reduction |
| Load time (network) | 1.2s | 0.45s | 62% faster |
| HTML noise | High (custom classes) | Low (semantic) | Better DX |
| Maintainability | Complex | Simple (2 layers) | Clear model |

---

## The KISE Litmus Test

After refactoring, ask:

✅ Can I understand this template's structure in 5 seconds?  
✅ Are there utility classes for layout only (flex, grid, gap)?  
✅ Are colors/interactions in CSS (not HTML)?  
✅ Does each component have ONE semantic class?  
✅ Is the mockup matched without pixel-perfect obsession?  

If yes → **KISE achieved**.

---

## Reference

- @base-ui/README.md — KISE Design System Submodule
- Tailwind v4 — Layout utilities only
- mockups/mockup.jpg — Visual reference (not pixel-perfect)
- KISE Philosophy — Keep It Simple, Essential
