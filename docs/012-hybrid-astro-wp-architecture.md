# Starwind UI Integration — Bressel Design System

**Date:** 2026-04-19  
**Status:** Complete  
**Author:** Ruii

---

## What's Installed

### Components (16 total)
- **button** — CTA buttons, nav buttons, form buttons
- **card** — Coach cards, merch cards, program cards
- **accordion** — FAQ sections, expandable content
- **dialog** — Popups, modals, form overlays
- **dropdown** — Nav menus, filters, actions
- **carousel** — Testimonials, quote sections
- **badge** — Tags, labels, status indicators
- **tabs** — Pricing tables, content sections
- **input** — Form inputs, search bars
- **textarea** — Contact forms, reviews
- **select** — Dropdown selects, filters
- **toast** — Notifications, success/error messages
- **avatar** — Profile photos, icons
- **separator** — Dividers, section breaks
- **sheet** — Side panels, mobile menus
- **popover** — Tooltips, popovers, contextual menus

### Dependencies
- `astro@^6.1.8` — For future Astro frontend
- `@tabler/icons` — Icon system
- `tailwind-merge` — Class merging
- `tailwind-variants` — Variant system
- `tw-animate-css` — Animations
- `embla-carousel` — Carousel engine

### Brand Mapping
- `--primary` → `--color-bressel-red` (#FF331F)
- `--background` → `--color-bressel-black` (#090808)
- `--foreground` → `--color-bressel-white` (#FBFBFF)
- `--secondary` → `--color-bressel-zinc-800`
- `--border` → `--color-bressel-zinc-600`
- `--outline` → `--color-bressel-red` (focus rings)
- Dark theme by default, `.light` class for light mode

---

## CSS Architecture

```
1. Tailwind v4 (@import "tailwindcss")
2. Starwind UI (brand tokens + component base)
3. Bressel base.css (element selectors)
4. Bressel components.css (custom components)
5. Bressel sections.css (page sections)
6. Bressel utilities.css (utility classes)
7. Bressel helpers.css (animations)
```

**Import:** `src/main.css` → `@import './styles/starwind.css'` → our CSS

---

## Build Output

```
dist/assets/main-[hash].css  → 125.33 KB (21.16 KB gzipped)
dist/assets/main-[hash].js   →   7.36 KB (2.47 KB gzipped)
```

---

## Migration Status

- [x] Button component updated to Starwind base classes
- [x] CSS import chain updated
- [x] Brand colors mapped
- [ ] Card components → Starwind card
- [ ] Accordion → Starwind accordion
- [ ] Dialog/Modal → Starwind dialog
- [ ] Carousel → Starwind carousel
- [ ] Badge → Starwind badge
- [ ] Tabs → Starwind tabs
- [ ] Input/Form → Starwind input

See `docs/013-starwind-component-migration.md` for usage guide.

---

## Next Steps

1. Migrate existing PHP components one at a time
2. Each migrated component gets Starwind base + Bressel overrides
3. Visual QA after each migration to confirm no regressions
4. Add new Starwind components as needed via CLI

---

**Version**: 1.0
**Last Updated**: 2026-04-19

---

## The Vision

- **Static pages** (home, about, landing) → Astro SSG → CDN, instant load, Nike-level performance
- **Dynamic sections** (shop, events, blog) → WordPress SSR via headless API → real-time content
- **Client editing** → WP admin for all content, Elementor escape hatch for visual pages
- **One build system** → Astro replaces Vite for frontend, WP stays backend only

---

## Architecture Diagram

```
┌─────────────────────────────────────────────────────────────┐
│  CLIENT (Browser)                                           │
│  ┌─────────────────────────────────────────────────────────┐│
│  │  Static pages (SSG)     │  Dynamic pages (SSR)          ││
│  │  Home / About / Landing │  Shop / Events / Blog         ││
│  └─────────────────────────────────────────────────────────┘│
└──────────────────────┬──────────────────────────────────────┘
                       │
          ┌────────────┴────────────┐
          │    Astro.js Build       │
          │    (Vite-powered)       │
          │                         │
          │  Static: pre-render at  │
          │    build time           │
          │  Dynamic: SSR fallback  │
          │    for routes that need │
          │    real-time data       │
          └────┬────────────┬───────┘
               │            │
          ┌────┴───┐  ┌────┴────────────┐
          │ Astro   │  │ WP GraphQL      │
          │ SSG     │  │ (WPGraphQL plugin)│
          │ Pages   │  │                  │
          │         │  │ CPTs: coach,     │
          │         │  │ merch, event     │
          │         │  │ Custom fields    │
          │         │  │ (CMB2 → GraphQL) │
          └─────────┘  └─────────────────┘

  WP Admin (editing surface)
  ┌──────────────────────────────┐
  │ Elementor (visual pages)     │
  │ CPT UI (structured content)  │
  │ CMB2 (custom fields)         │
  │ Fluent Forms (forms)         │
  └──────────────────────────────┘
```

---

## What Stays (Current WP Bressel)

| Component | Status | Notes |
|-----------|--------|-------|
| TwentyTwentyFour child theme | ✅ Keep | Headless CMS layer |
| CMB2 | ✅ Keep | Custom fields → GraphQL |
| CPTs (coach, merch, event) | ✅ Keep | Core data model |
| Fluent Forms | ✅ Keep | Forms stay in WP |
| The SEO Framework | ✅ Keep | SEO meta for WP GraphQL |
| Elementor | ✅ Keep | Visual edit escape hatch |
| WP Migrate Lite | ✅ Keep | DB migrations |

## What Leaves

| Component | Status | Notes |
|-----------|--------|-------|
| Vite (frontend) | ⏸️ Paused | Astro replaces it |
| Tailwind CSS v3 | ⏸️ Paused | Tailwind v4 via Astro |
| PHP templates | ⏸️ Migrate | Logic → Astro, but keep for Elementor fallback |
| WP CSS/JS enqueue | ⏸️ Migrate | Astro handles assets |

---

## Directory Structure (Post-Migration)

```
wp_bressel/
├── wp/                           # WordPress installation (or external DO droplet)
│   ├── wp-content/
│   │   ├── themes/
│   │   │   └── twentytwentyfour-bressel/
│   │   │       ├── functions.php   # Theme support, CMB2 registration, Elementor compat
│   │   │       └── style.css       # WP theme declaration only
│   │   └── plugins/
│   │       ├── cmb2/
│   │       ├── wp-graphql/         # ⭐ Required
│   │       ├── wp-graphql-cmb2/    # ⭐ Required (exposes CMB2 to GraphQL)
│   │       ├── fluent-forms/
│   │       ├── elementor/
│   │       ├── the-seo-framework/
│   │       └── enable-media-replace/
│   └── wp-config.php
│
├── astro/                        # ⭐ New — Frontend build
│   ├── public/                   # Static assets (fonts, favicons)
│   ├── src/
│   │   ├── components/           # Astro components (replacement for WP PHP components)
│   │   │   ├── layout/           # <Header />, <Footer />, <Nav />
│   │   │   ├── sections/         # <Hero />, <ProgramPillars />, <Ticker />
│   │   │   ├── cards/            # <CoachCard />, <MerchCard />, <EventCard />
│   │   │   └── ui/               # <Button />, <Modal />, <Accordion />
│   │   ├── lib/
│   │   │   ├── graphql.ts        # WP GraphQL client (typed queries)
│   │   │   ├── cms.ts            # WP content helper functions
│   │   │   └── utils.ts          # Shared utilities
│   │   ├── pages/                # Astro routes
│   │   │   ├── index.astro       # Home (SSG — pre-rendered)
│   │   │   ├── about.astro       # About (SSG)
│   │   │   ├── shop.astro        # Shop (SSR — dynamic data from WP)
│   │   │   ├── events.astro      # Events (SSR)
│   │   │   ├── blog.astro        # Blog (SSR)
│   │   │   └── [slug].astro      # Dynamic pages (Elementor, custom)
│   │   └── styles/
│   │       └── global.css        # Tailwind v4 entry
│   ├── astro.config.mjs          # ⭐ Main config
│   ├── tailwind.config.mjs       # Tailwind v4 config
│   ├── package.json              # Dependencies
│   └── tsconfig.json
│
├── docs/                         # Documentation
│   ├── 012-hybrid-astro-wp-architecture.md  # This file
│   └── ... (existing docs)
│
├── twentytwentyfour-bressel/     # Legacy (keep for Elementor fallback)
│   └── ... (existing files, mark deprecated)
│
├── docker-compose.yml            # Update: remove Vite, add Astro
├── .env.example                  # Add WP_GRAPHQL_ENDPOINT
└── README.md                     # Update with new architecture
```

---

## WordPress Side: What Changes

### Required Plugins (New)
1. **WPGraphQL** — Exposes WP content as GraphQL API
2. **WPGraphQL CMB2** — Exposes CMB2 fields to GraphQL
3. **WPGraphQL Yoast SEO** (optional) — Exposes SEO metadata
4. **WPGraphQL Elementor** (optional) — Exposes Elementor JSON to GraphQL
5. **WPGraphQL Revisions** (optional) — Track content changes for ISR

### functions.php Updates
- Remove Vite/manifest asset logic
- Keep CMB2 registration (needed for WPGraphQL CMB2)
- Add Elementor compatibility (disable theme features Elementor needs)
- Register any new CPTs not already registered

### GraphQL Schema (What Astro Will Query)
```graphql
# Coaches
{
  coaches {
    nodes {
      uri
      title
      excerpt
     acf {
        coachRole
        coachExperience
        coachImage
      }
    }
  }
}

# Merch
{
  merch {
    nodes {
      uri
      title
      excerpt
      acf {
        merchPrice
        merchImage
      }
    }
  }
}

# Events
{
  events {
    nodes {
      uri
      title
      date
      acf {
        eventDate
        eventLocation
      }
    }
  }
}

# Pages (Elementor-rendered)
{
  pages {
    nodes {
      uri
      title
      content
      # Elementor JSON lives in post_content or custom field
    }
  }
}
```

---

## Astro Side: What Changes

### astro.config.mjs
```js
import { defineConfig } from 'astro/config';
import tailwindcss from '@astrojs/tailwind';

export default defineConfig({
  integrations: [tailwindcss()],
  // For pages that fetch WP data → use SSR
  output: 'server',
  adapter: null, // Will configure per-deploy target
});
```

### Page Types
| Page Type | Astro Render Mode | Example |
|-----------|-------------------|---------|
| **Static** (SSG) | `prerender: true` | Home, About, Contact |
| **Dynamic** (SSR) | No prerender | Shop, Events, Blog (needs live data) |
| **Hybrid** (ISR) | `prerender: true` + `exported` | Landing pages that update rarely |
| **Elementor** | SSR + render Elementor JSON | Custom client pages |

### Static Page Example (Home)
```astro
---
// pages/index.astro — prerendered at build time
import { graphql } from '../lib/graphql';
import Layout from '../components/layout/Layout.astro';
import Hero from '../components/sections/Hero.astro';
import ProgramPillars from '../components/sections/ProgramPillars.astro';
import Ticker from '../components/sections/Ticker.astro';

const data = await graphql`
  query HomeData {
    coaches { nodes { ... } }
    merch { nodes { ... } }
    events { nodes { ... } }
  }
`;
---

<Layout>
  <Hero />
  <ProgramPillars coaches={data.coaches.nodes} />
  <Ticker />
</Layout>
```

### Dynamic Page Example (Shop)
```astro
---
// pages/shop.astro — renders on each request
import Layout from '../components/layout/Layout.astro';
import MerchCard from '../components/cards/MerchCard.astro';

const data = await graphql`
  query MerchData {
    merch { nodes { ... } }
  }
`;
---

<Layout>
  <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
    {data.merch.nodes.map(merch => (
      <MerchCard {...merch} />
    ))}
  </section>
</Layout>
```

---

## Deployment Flow

```
1. Developer pushes to main branch
2. CI triggers:
   a. Build Astro → static assets (SPA/SSG)
   b. Deploy to CDN (Cloudflare Pages / Netlify / DigitalOcean App Platform)
3. WordPress updates:
   a. Push theme changes (functions.php, CMB2)
   b. DB migration (WP Migrate Lite)
4. Live → Astro fetches WP GraphQL on each request (SSR) or at build time (SSG)
```

**For ISR (Incremental Static Regeneration):**
- Hook WPGraphQL Revisions plugin → webhook on content change
- Astro rebuilds affected pages only
- Or: rebuild full site nightly (simplest, low traffic)

---

## Performance Targets (Nike-level)

| Metric | Target | How |
|--------|--------|-----|
| LCP | < 1.5s | SSG, image optimization, font preloading |
| FCP | < 0.8s | Zero layout shift, critical CSS inlined |
| CLS | < 0.05 | Fixed dimensions, font-display: swap |
| TTI | < 2.0s | Code splitting, lazy load non-critical JS |
| Lighthouse | 95+ | Audit with `astro build` |

---

## Migration Phases

### Phase 1: Foundation (Week 1)
- [ ] Setup Astro project, Tailwind v4, config
- [ ] Install WPGraphQL + WPGraphQL CMB2 on WP side
- [ ] Verify GraphQL queries for existing CPTs
- [ ] Setup basic Astro layout (header, footer, nav)

### Phase 2: Static Pages (Week 2)
- [ ] Rebuild homepage (SSG) from current WP theme
- [ ] Rebuild about/landing pages (SSG)
- [ ] Migrate components (PHP → Astro)
- [ ] Image optimization setup

### Phase 3: Dynamic Pages (Week 3)
- [ ] Shop page (SSR from WP GraphQL)
- [ ] Events page (SSR)
- [ ] Blog (SSR)
- [ ] Client-side navigation (Astro router)

### Phase 4: Elementor & Polish (Week 4)
- [ ] Elementor integration (render Elementor pages)
- [ ] SEO meta (via WPGraphQL SEO plugin)
- [ ] Forms (Fluent Forms → embedded in Astro)
- [ ] Performance audit, Lighthouse tuning
- [ ] Deploy pipeline setup

### Phase 5: Handoff
- [ ] Client training (WP admin)
- [ ] Documentation (how to edit content, deploy)
- [ ] Performance monitoring setup
- [ ] Cleanup legacy WP theme files

---

## Risk & Mitigation

| Risk | Mitigation |
|------|------------|
| Elementor pages not queryable via GraphQL | Use Elementor's JSON export or render as iframe fallback |
| ISR complexity | Start with nightly rebuild, upgrade later |
| Two deploy targets | Use one pipeline that triggers both |
| GraphQL query performance | Cache WPGraphQL responses (WP GraphQL Cache plugin) |
| Client confusion (two editing surfaces) | Keep Elementor + WP admin unified — no separate CMS |

---

## Decision Log

### Why Astro over Next.js/Nuxt?
- **Lighter** — Astro renders zero JS for static pages by default
- **Better for content sites** — Marketing pages, not SPA apps
- **Tailwind v4** — Native support, no config hassle
- **SSG-first** — What we need: static pages + SSR for dynamic sections
- **No framework lock-in** — Can embed React/Vue/Svelte components later if needed

### Why keep WP as CMS?
- Client already uses WP admin
- CMB2 is working well for structured content
- Elementor provides visual editing for non-devs
- PHP ecosystem (Fluent Forms, SEO, etc.)
- No need to rebuild WP admin UI

---

**Version**: 1.0  
**Last Updated**: 2026-04-19
