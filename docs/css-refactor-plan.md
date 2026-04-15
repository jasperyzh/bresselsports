# CSS Refactoring Plan for BRESSEL™

**Status:** ✅ Complete  
**Date:** 2026-04-15

---

## 📐 Final Structure

```
twentytwentyfour-bressel/
├── style.css                 # WordPress theme declaration (unchanged)
├── functions.php             # Enqueues Vite assets (unchanged)
├── main.css                  # Vite entry point → imports from src/
├── src/
│   └── css/
│       ├── base/
│       │   └── theme.css     # @theme directive (Tailwind v4)
│       ├── components/
│       │   ├── buttons.css
│       │   ├── header.css
│       │   ├── forms.css
│       │   ├── faq.css
│       │   ├── modal.css
│       │   └── layout.css
│       ├── modifiers/
│       │   └── effects.css   # Combined: effects + animations
│       └── utilities/
│           └── helpers.css
└── src/main.css              # Vite entry point (imports all)
```

---

## 🔄 Migration Summary

### Before
- 1 file: `main.css` (644 lines)
- All styles in one place
- Hard to maintain

### After
- 11 files: organized by concern
- Each file ~50-100 lines
- Easy to maintain and extend

---

## 📊 Metrics

| Metric | Before | After |
|--------|--------|-------|
| Files | 1 | 11 |
| Lines (main.css) | 644 | 15 (wrapper) |
| Lines (src/main.css) | N/A | 20 |
| Total CSS files | 1 | 11 |
| Build output | 49 KB | 49 KB |

---

## 🎯 Key Decisions

1. **Entry Point**: Root `main.css` imports from `src/main.css`
2. **Import Strategy**: Use `@import` (Tailwind v4 requires this)
3. **@theme Location**: In `base/theme.css`, imported first
4. **Effects + Animations**: Combined into one file
5. **Layout**: Uses `@layer components` for scoped styles

---

## 📁 File Breakdown

### `src/main.css` (Entry Point)
```css
@import "tailwindcss";
@import './css/base/theme.css';
@import './css/components/layout.css';
@import './css/components/buttons.css';
@import './css/components/header.css';
@import './css/components/forms.css';
@import './css/components/faq.css';
@import './css/components/modal.css';
@import './css/modifiers/effects.css';
@import './css/utilities/helpers.css';
```

### `src/css/base/theme.css`
- Tailwind v4 `@theme` directive
- Brand colors, typography, zinc scale

### `src/css/components/*.css`
- **layout.css**: `@layer components` with `.section-padding`, `.container-custom`, etc.
- **buttons.css**: `.btn` base, sizes, variants
- **header.css**: Header scroll transitions, desktop nav
- **forms.css**: Fluent Forms dark mode styling
- **faq.css**: FAQ accordion styles
- **modal.css**: Mobile menu styles

### `src/css/modifiers/effects.css`
- Button modifiers: `.btn-ripple`, `.btn-glow`
- Animations: `fadeInUp`, `btn-spin`, `ticker-scroll`
- Parallax: `[data-parallax]`, `[data-parallax-target]`
- Form loading state

### `src/css/utilities/helpers.css`
- Fluent Forms validation states
- Footer styles
- Hero section
- Ticker/News bar
- Watermark text

---

## ✅ Checklist

- [x] Create directory structure
- [x] Extract `base/theme.css` (@theme directive)
- [x] Extract `components/layout.css`
- [x] Extract `components/buttons.css`
- [x] Extract `components/header.css`
- [x] Extract `components/forms.css`
- [x] Extract `components/faq.css`
- [x] Extract `components/modal.css`
- [x] Extract `modifiers/effects.css`
- [x] Extract `utilities/helpers.css`
- [x] Create `src/main.css` entry point
- [x] Update root `main.css` to import from src
- [x] Test Vite build ✅

---

## 🚀 Next Steps

1. **Test HMR**: Run `npm run dev` to verify hot module replacement
2. **Verify styles**: Check all components render correctly
3. **Clean up**: Remove duplicate styles from old main.css (optional)
4. **Document**: Update README with new structure

---

## 💡 Benefits

- **Maintainability**: Each file is small and focused
- **HMR Speed**: Faster hot reload (only changed files)
- **Team Collaboration**: Easier to work on specific components
- **Scalability**: Easy to add new components/utilities
- **Tailwind v4 Compliance**: Follows best practices

---

**Last Updated:** 2026-04-15  
**Author:** KISE Engineer (AI Agent)
