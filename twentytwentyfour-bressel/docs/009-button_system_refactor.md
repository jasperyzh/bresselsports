# Button System Refactor - Streamlined & Universal

**Date:** 2026-04-15  
**Goal:** Create a unified, streamlined button system that can be applied throughout the website with minimal class names.

---

## 🎯 Objective

Transform the button system from a fragmented, WordPress-block-dependent approach into a clean, universal system where semantic class names (`btn-cta`, `btn-solid`, `btn-outline`) automatically apply appropriate styles regardless of HTML element type.

---

## Changes Summary

### 1. **`buttons.css`** - Complete Rewrite

**Before:**
- Mixed selectors (`btn`, `.wp-block-button__link`, `button`, `input[type="submit"]`)
- Duplicate style definitions for each variant
- WordPress-block-dependent styling
- Complex cascade with overlapping selectors

**After:**
- Clean separation: `header a.btn-cta` for header buttons, universal selectors for forms/WordPress blocks
- Single source of truth for button styles
- Modifiers (`ripple`, `glow`) work on any button variant
- Simplified class names

### 2. **`header.php`** - Updated Button Classes

**Before:**
```php
<a class="... header-cta btn-ripple">
<a class="... group btn-ripple hidden md:inline-flex">
```

**After:**
```php
<a class="... btn-cta ripple">
<a class="... btn-cta btn-md ripple hidden md:inline-flex">
```

### 3. **`main.css`** - Cleanup

Removed redundant `button, .btn { cursor: pointer; }` styling - now properly defined in `buttons.css`.

---

## Button System Architecture

### Button Types (Semantic Class Names)

| Class | Applies To | Description |
|-------|------------|-------------|
| `btn-cta` | `header a.btn-cta` | Header call-to-action button (red solid) |
| `btn-solid` | `.btn-solid`, `.btn-glow`, `.btn-ripple` | Solid variant (red background) |
| `btn-outline` | `.btn-outline`, `.btn-glow`, `.btn-ripple` | Outline variant (transparent + border) |

### Button Sizes

| Class | Font Size | Padding |
|-------|-----------|---------|
| `btn-sm` | 0.875rem | 0.5rem 1rem |
| `btn-md` | 1rem | 0.75rem 1.5rem |
| `btn-lg` | 1.125rem | 1rem 2rem |

### Button Modifiers (Combinable with any type)

| Modifier | Effect |
|----------|--------|
| `ripple` | Ripple animation on click (white circle expands) |
| `glow` | Glow effect on hover (red gradient border) |

---

## Usage Examples

### Header Button (Logo/CTA)

```php
<!-- Logo button with ripple effect -->
<a id="header-cta" class="btn-cta ripple">
    <img src="logo.png" alt="BRESSEL" />
</a>

<!-- CTA button with size + ripple -->
<a class="btn-cta btn-md ripple hidden md:inline-flex">
    BOOK SESSION
</a>
```

### Form/Button Block

```php
<!-- WordPress Gutenberg button block -->
<div class="wp-block-button">
    <a class="wp-block-button__link btn-solid btn-md ripple">
        Submit
    </a>
</div>

<!-- Regular button -->
<button class="btn-solid btn-lg glow">
    Get Started
</button>
```

### Form Submit

```php
<!-- Fluent Forms submit button -->
<input type="submit" class="btn-solid ripple" value="Book Now" />
```

---

## Combined Modifiers

Modifiers can be combined for advanced effects:

```php
<!-- Ripple + Glow on hover -->
<a class="btn-cta ripple glow">
    Book Session
</a>
```

---

## CSS Selectors Breakdown

### Header CTA Button
```css
header a.btn-cta {
  /* Red solid button styles */
}
```

### Universal Button Base
```css
button,
input[type="submit"],
.wp-block-button__link {
  /* Universal button styles */
}
```

### Button Variants
```css
.btn-solid { /* Red background */ }
.btn-outline { /* Transparent + border */ }
```

### Glow Effect
```css
.btn-glow,
.btn-solid.glow,
.btn-outline.glow,
header a.btn-cta.glow {
  /* Glow animation */
}
```

---

## Migration Guide

### From Old System to New System

**Old:**
```php
<a class="btn-ripple">...</a>
<button class="btn-solid btn-md">...</button>
```

**New:**
```php
<!-- Header buttons use btn-cta -->
<a class="btn-cta ripple">...</a>

<!-- Regular buttons use btn-solid -->
<button class="btn-solid btn-md">...</button>
```

### WordPress Gutenberg Blocks

Gutenberg blocks automatically get button styles. For custom styling:

```php
<!-- Add custom class to Gutenberg button block -->
<div class="wp-block-button">
    <a class="wp-block-button__link btn-solid btn-md">
        Custom Button
    </a>
</div>
```

---

## Benefits

1. **Simplified class names** - Just `btn-cta`, `btn-solid`, `btn-outline`
2. **Universal application** - Works on `<a>`, `<button>`, `<input>`, Gutenberg blocks
3. **Combinable modifiers** - `ripple` + `glow` can be used together
4. **Consistent styling** - All buttons follow the same design system
5. **Future-proof** - Easy to add new variants without breaking existing code

---

## Testing Checklist

- [ ] Header logo button displays correctly with ripple effect
- [ ] Header CTA button displays correctly with size and ripple effect
- [ ] Hover states work (red → transparent for solid, border → white for outline)
- [ ] Ripple animation triggers on click
- [ ] Glow effect triggers on hover (when glow modifier added)
- [ ] Button sizes (sm, md, lg) scale correctly
- [ ] Fluent Forms submit buttons inherit correct styles
- [ ] Gutenberg button blocks inherit correct styles

---

## Next Steps

1. Run `npm run build` to compile CSS
2. Test header buttons visually
3. Test form buttons in Fluent Forms
4. Test Gutenberg button blocks in editor
5. Document in theme README if needed

---

## Files Modified

- ✅ `src/css/components/buttons.css` - Complete rewrite
- ✅ `header.php` - Updated button class names
- ✅ `src/main.css` - Removed duplicate button styling
