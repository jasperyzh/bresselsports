# AGENTS.md - BRESSEL™ WordPress Framework

Guidelines for AI agents working on the BRESSEL™ Padel WordPress framework.

## Build & Development Commands

```bash
# Development (HMR + live reload)
cd twentytwentyfour-bressel && npm run dev

# Production build (generates dist/ with manifest)
cd twentytwentyfour-bressel && npm run build

# Docker (from project root)
docker compose up -d
docker compose down

# WP-CLI content scaffolding
./setup-wp-content.sh

# Check WordPress installation
docker compose run --rm wp-cli core is-installed
```

**Note:** No test framework is currently configured. Add PHPUnit or Jest for testing if needed.

## Tech Stack Overview

- **PHP**: 8.2+ (modern syntax, no legacy code)
- **CSS**: Tailwind CSS v4 with classless approach (custom properties in `@theme`)
- **JS**: Vanilla ES6+ (strictly NO jQuery)
- **Build Tool**: Vite 6.x with live-reload plugin
- **CMS**: WordPress (child theme of Twenty Twenty-Four)
- **Data**: CMB2 for custom fields, Custom Post Types for content
- **Environment**: Docker (WordPress + MySQL + WP-CLI)

## Code Style Guidelines

### PHP Conventions

**Naming:**
- Functions: `bressel_function_name()` (lowercase with underscores, bressel prefix)
- Constants: `BRESSSELTHEME_VERSION` (uppercase with underscores)
- Classes: `Bressel_Class_Name` (PascalCase)
- Files: `file-name.php` (kebab-case)

**Structure:**
```php
<?php
/**
 * Title: Descriptive Title
 * Description: What this file does
 * How-to Use: Usage instructions
 */

// Security check first
if (!defined('ABSPATH')) {
    exit;
}

// Function definition
function bressel_example_function($param) {
    // Early return for invalid input
    if (empty($param)) {
        return false;
    }
    
    return sanitize_text_field($param);
}
add_action('init', 'bressel_example_function');
```

**Security:**
- Always use `esc_html()`, `esc_url()`, `esc_attr()` for output
- Use `sanitize_text_field()` for form inputs
- Use `wp_nonce_field()` + `wp_verify_nonce()` for forms
- Never trust user input - validate and sanitize everything

### CSS/Tailwind Conventions

**Classless Approach:**
Use CSS custom properties in `@theme` for global styles:
```css
@theme {
  --color-bressel-red: #E62E2D;
  --font-header: "Oswald", sans-serif;
}
```

**When to use Tailwind utilities:**
- Layouts: `grid`, `flex`, `md:grid-cols-3`
- Spacing: `p-4`, `my-8`, `gap-6`
- Component modifiers: `hover:`, `focus:`, `group-hover:`

**When to use semantic CSS:**
- Global typography in `@layer base`
- Custom components in `@layer components`
- Form overrides for third-party plugins

**BRESSEL Brand Colors:**
- Black: `#000000` (var: `--color-bressel-black`)
- White: `#ffffff` (var: `--color-bressel-white`)
- Red: `#E62E2D` (var: `--color-bressel-red`)
- Zinc scale: `--color-bressel-zinc-100` to `900`

### JavaScript Conventions

**No jQuery Rule:**
Always use vanilla JS:
```javascript
// Good
document.addEventListener('DOMContentLoaded', () => {
    const element = document.getElementById('mobile-menu');
    element.classList.add('hidden');
});

// Bad - don't use jQuery
// $('#mobile-menu').addClass('hidden');
```

**File Structure:**
- Main entry: `main.js` (imports CSS, initializes features)
- Feature-specific code in `main.js` with clear comments
- Use ES6+ features: arrow functions, destructuring, template literals

### Component Architecture (Astro-style)

All components live in `/components/` with standardized headers:

```php
<?php
/**
 * Title: Button Component
 * Description: Reusable button with variants
 * How-to Use: get_template_part('components/button', null, ['text' => 'Submit', 'variant' => 'solid']);
 */
$text = $args['text'] ?? 'Click Here';
$url = $args['url'] ?? '#';
?>
<a href="<?= esc_url($url) ?>" class="...">
    <?= esc_html($text) ?>
</a>
```

**Component Naming:**
- `component-name.php` (kebab-case)
- Use `$args` array for passing data
- Provide sensible defaults with null coalescing operator `??`

## File Organization

```
twentytwentyfour-bressel/
├── components/           # Reusable Astro-style components
├── dist/                 # Generated build assets (gitignored)
├── node_modules/         # NPM dependencies (gitignored)
├── archive-*.php         # Archive templates for CPTs
├── footer.php            # Site footer
├── front-page.php        # Homepage
├── functions.php         # Theme functions, CPTs, hooks
├── header.php            # Site header + nav
├── index.php             # Fallback template
├── main.css              # Tailwind entry + custom styles
├── main.js               # JS entry + feature initialization
├── page-*.php            # Page templates
├── single-*.php          # Single post templates for CPTs
├── style.css             # WP theme declaration
└── vite.config.js        # Vite configuration
```

## Error Handling Patterns

**PHP:**
```php
// Check if function exists before defining
if (!function_exists('bressel_setup')) {
    function bressel_setup() {
        // implementation
    }
}

// Defensive checks for WP functions
if (function_exists('new_cmb2_box')) {
    // CMB2-specific code
}
```

**Template Safety:**
```php
// Always escape output
$title = get_the_title();
echo esc_html($title);

// Check if image exists before output
if (has_post_thumbnail()) {
    the_post_thumbnail('large');
}
```

## Custom Post Types

**Registered CPTs:**
- `coach` - Academy coaches (archive: /coaches/)
- `merch` - Products/gear (archive: /shop/)
- `event` - Events/announcements (archive: /events/)

**Metadata Fields (CMB2):**
- Coach: `_bressel_coach_role`, `_bressel_coach_experience`
- Merch: `_bressel_merch_price`
- Global: `_bressel_tracking_scripts` (theme options)

## Plugin Dependencies

**Required:**
- CMB2 - Custom fields
- Fluent Forms - Contact/booking forms

**Recommended:**
- The SEO Framework - SEO
- FluentSMTP - Email delivery
- Imsanity - Image optimization
- Safe SVG - SVG uploads

**Forbidden:**
- jQuery (use vanilla JS)
- Elementor (use `template-canvas.php` escape hatch only)
- WooCommerce (use "Inquire to Buy" flow)

## WordPress Coding Standards

1. **Text Domain:** Use `'bressel'` for all translatable strings
2. **Nonces:** Verify with `wp_verify_nonce()` for form submissions
3. **Capabilities:** Check with `current_user_can()` before admin actions
4. **Hooks:** Use `add_action()` and `add_filter()` with proper priorities
5. **Assets:** Enqueue with `wp_enqueue_scripts` action, use version constants

## Development Workflow

1. Run `npm run dev` in theme directory for HMR
2. Access site at `http://localhost:8080`
3. Make changes to PHP/CSS/JS files
4. Vite auto-reloads browser on file changes
5. Run `npm run build` before committing to generate production assets
6. Use `./setup-wp-content.sh` to scaffold dummy content for testing

## Common Patterns

**URL Parameters for Unified Form:**
```php
$booking_url = add_query_arg([
    'intent' => 'booking',
    'target' => urlencode(get_the_title())
], home_url('/contact/'));
```

**Query Loop:**
```php
$query = new WP_Query([
    'post_type' => 'coach',
    'posts_per_page' => 3,
]);

if ($query->have_posts()) : 
    while ($query->have_posts()) : $query->the_post();
        get_template_part('components/card');
    endwhile;
    wp_reset_postdata();
endif;
```

## Questions?

Check the backlog tasks for context, or refer to:
- `README.md` - Project overview and Fluent Forms setup
- `agent_connect_to_wordpress.md` - WP-CLI usage guide
- Backlog document `doc-005` - MVP framework preferences
