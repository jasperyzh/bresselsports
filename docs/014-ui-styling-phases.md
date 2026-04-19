# UI Styling Phases — Bressel Design System

## Philosophy
Build the full system visible first, then drop it into pages. Not component-by-component.

## Phase 1: Shell + Starwind Base (Complete)
- [x] Header/footer navigation with Starwind nav components
- [x] Button variants (solid, outline, ghost, ghost-red, link)
- [x] `/ui-demo` page — full component showcase
- [x] Starwind CSS variables mapped to Bressel brand tokens
- [x] CSS import chain: tailwind → starwind → patterns → base → components → sections

## Phase 2: Section Templates (Next)
- [ ] Hero section — full-width dark, CTA buttons with noise texture
- [ ] Content sections — 61.8% / 38.2% GR splits for text+image
- [ ] Card grids — coaches, merch, event cards with texture
- [ ] Quote carousel — full-screen, dramatic dark background
- [ ] Newsletter CTA — centered, large typography, single CTA

## Phase 3: Elementor Bridge
- [ ] Style Elementor sections to match Starwind patterns
- [ ] Test Elementor + our CSS together (no conflicts)
- [ ] Create Elementor widget styles that output Starwind classes
- [ ] Polish and consistency pass

---

## Design Token Reference

### Colors
| Token | Value | Usage |
|-------|-------|-------|
| `--color-bressel-red` | `#FF331F` | Primary CTA, accents |
| `--color-bressel-black` | `#090808` | Backgrounds |
| `--color-bressel-white` | `#FBFBFF` | Text |
| `--color-bressel-zinc-800` | `#27272a` | Card backgrounds |
| `--color-bressel-zinc-600` | `#52525b` | Borders, dividers |
| `--color-bressel-zinc-400` | `#a1a1aa` | Secondary text |

### Typography
| Element | Font | Usage |
|---------|------|-------|
| Headings | Oswald | All headings, navigation, badges |
| Body | Inter | Paragraphs, inputs, descriptions |

### Patterns (from jycom)
| Class | Purpose |
|-------|---------|
| `.b-card` | Card wrapper (rounded, shadowed, padded) |
| `.b-card--red`, `.b-card--dark` | Card color variants |
| `.b-texture--` | Noise texture overlay on cards |
| `.noise--` | Dramatic noise fade on full sections |
| `.grid--gr-main` | 61.8/38.2 grid split |
| `.grid--gr-sidebar` | 38.2/61.8 grid split |

---

## Quick Component Recipes

### Hero Section
```html
<section class="relative min-h-[60vh] bg-[var(--color-bressel-black)]">
  <div class="absolute inset-0 noise-- opacity-[0.2]"></div>
  <div class="container-custom relative z-10 text-center py-32">
    <h1 class="font-oswald text-6xl uppercase">Headline</h1>
    <p class="text-zinc-400 mt-4">Subhead</p>
    <button class="bg-[var(--color-bressel-red)] ...">CTA</button>
  </div>
</section>
```

### Content Section (GR Split)
```html
<section class="section-padding">
  <div class="container-custom grid grid-cols-1 md:grid-cols-[61.8fr_38.2fr] gap-8">
    <div>Content</div>
    <div>Sidebar/CTA</div>
  </div>
</section>
```

### Card with Texture
```html
<div class="b-card b-texture--">
  <h3 class="font-oswald">Card Title</h3>
  <p class="text-zinc-400">Content</p>
</div>
```
