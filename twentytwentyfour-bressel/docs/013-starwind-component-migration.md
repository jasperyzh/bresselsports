# Starwind UI Component Migration Guide

**Date:** 2026-04-19  
**Purpose:** How to use Starwind UI classes in PHP components for BRESSEL

---

## Architecture Layers

```
1. Tailwind v4 — Utility classes (flex, grid, spacing, colors)
2. Starwind UI — Design system (button, card, accordion, etc.)
3. Bressel CSS — Brand overrides (fonts, colors, custom components)
```

## Using Starwind Components in PHP

Starwind provides base classes that you can use directly in PHP templates. No JSX needed — just class names.

### Button

```php
<?php get_template_part('components/button', null, [
    'text' => 'Book Session',
    'url'  => '/contact/',
    'variant' => 'solid', // solid | outline | ghost
    'size' => 'md' // sm | md | lg
]); ?>
```

Starwind button base classes:
- `btn` — base button styles
- `btn-primary` — red accent (our brand)
- `btn-secondary` — zinc background
- `btn-outline` — bordered
- `btn-ghost` — transparent

### Card

```php
<div class="card">
    <div class="card-header">
        <img src="<?= esc_url($image) ?>" class="w-full h-48 object-cover" />
    </div>
    <div class="card-content">
        <h3 class="card-title"><?= esc_html($name) ?></h3>
        <p class="card-description"><?= esc_html($role) ?></p>
    </div>
    <div class="card-footer">
        <?php get_template_part('components/button', null, [
            'text' => 'View Profile',
            'url'  => esc_url($url),
            'variant' => 'outline'
        ]); ?>
    </div>
</div>
```

### Accordion (FAQ)

```php
<div class="accordion" data-accordion>
    <div class="accordion-item">
        <button class="accordion-trigger" data-accordion-trigger>
            What is Bressel?
        </button>
        <div class="accordion-content" data-accordion-content>
            <p>World-class padel, within reach.</p>
        </div>
    </div>
</div>
```

### Badge

```php
<span class="badge badge-primary">NEW</span>
<span class="badge badge-secondary">COMING SOON</span>
```

### Dialog/Modal

```php
<div class="dialog" data-dialog>
    <button class="btn btn-primary" data-dialog-trigger>Open</button>
    <div class="dialog-overlay" data-dialog-overlay></div>
    <div class="dialog-content" data-dialog-content>
        <div class="dialog-header">
            <h2 class="dialog-title">Contact Us</h2>
            <button class="dialog-close" data-dialog-close>✕</button>
        </div>
        <div class="dialog-body">
            <!-- Form here -->
        </div>
    </div>
</div>
```

### Carousel (Testimonials)

```php
<div class="carousel" data-carousel>
    <div class="carousel-content" data-carousel-content>
        <?php foreach ($testimonials as $t) : ?>
            <div class="carousel-item" data-carousel-item>
                <!-- testimonial content -->
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-prev" data-carousel-prev>←</button>
    <button class="carousel-next" data-carousel-next>→</button>
</div>
```

### Tabs

```php
<div class="tabs" data-tabs>
    <div class="tabs-list" data-tabs-list>
        <button class="tab-trigger" data-tab="overview" data-tabs-trigger>Overview</button>
        <button class="tab-trigger" data-tab="details" data-tabs-trigger>Details</button>
    </div>
    <div class="tab-panel" data-tab="overview" data-tabs-panel>
        <!-- content -->
    </div>
    <div class="tab-panel" data-tab="details" data-tabs-panel>
        <!-- content -->
    </div>
</div>
```

### Input Form

```php
<div class="input-group">
    <label class="input-label">Email Address</label>
    <input class="input" type="email" placeholder="you@example.com" />
</div>
```

### Toast/Notification

```php
<div class="toast" data-toast data-toast-position="top-right">
    <div class="toast-title">Success</div>
    <div class="toast-description">Your message has been sent.</div>
    <button class="toast-close" data-toast-close>✕</button>
</div>
```

## Design Tokens (CSS Variables)

Starwind exposes these — all mapped to Bressel brand:

| Token | Bressel Value | Use |
|-------|---------------|-----|
| `--primary` | `--color-bressel-red` | CTA buttons, links, accents |
| `--background` | `--color-bressel-black` | Page background |
| `--foreground` | `--color-bressel-white` | Text color |
| `--card` | `--color-bressel-black` | Card backgrounds |
| `--secondary` | `--color-bressel-zinc-800` | Secondary elements |
| `--muted` | `--color-bressel-zinc-800` | Muted text/backgrounds |
| `--muted-foreground` | `--color-bressel-zinc-400` | Secondary text |
| `--border` | `--color-bressel-zinc-600` | Borders, dividers |
| `--outline` | `--color-bressel-red` | Focus rings |
| `--radius` | `0.5rem` | Border radius |

## CSS Import Order

```
1. Tailwind v4 (@import "tailwindcss")
2. Starwind UI (brand tokens + component base)
3. Bressel base.css (element selectors)
4. Bressel components.css (our custom components)
5. Bressel sections.css (page section styles)
6. Bressel utilities.css (utility classes)
7. Bressel helpers.css (animations)
```

## Adding New Components

```bash
cd twentytwentyfour-bressel
npx starwind@latest add <component-name>
```

Available: `button card accordion dialog dropdown carousel badge tabs input textarea select toast avatar separator sheet popover`

## Migration Checklist

- [x] Button component → Starwind base classes
- [ ] Card components (merch-card, program-card, coach-card) → Starwind card
- [ ] Accordion (FAQ section) → Starwind accordion
- [ ] Dialog/Modal (form popups) → Starwind dialog
- [ ] Carousel (testimonial section) → Starwind carousel
- [ ] Badge (labels, tags) → Starwind badge
- [ ] Tabs (pricing tables) → Starwind tabs
- [ ] Input/Form (contact forms) → Starwind input

---

**Version**: 1.0  
**Last Updated**: 2026-04-19
