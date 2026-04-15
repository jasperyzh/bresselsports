# BRESSEL™ Padel - Development TODO

## ✅ Completed
- [x] Core theme setup (functions.php, header.php, footer.php)
- [x] Custom Post Types: coach, merch, event
- [x] CMB2 custom fields for coaches and merch
- [x] Mobile menu with vanilla JS
- [x] Tailwind v4 classless styling
- [x] Fluent Forms dark mode overrides
- [x] Components: button, coach-card, merch-card, hero-banner

### Components Built (Phase 1)
- [x] `components/event-card.php` - Event announcement cards with date badges
- [x] `components/testimonial.php` - Quote cards with optional avatar/rating
- [x] `components/faq-section.php` & `faq-item.php` - Accordion with vanilla JS
- [x] `components/stats-counter.php` - Animated counter with IntersectionObserver
- [x] `components/newsletter-signup.php` - Fluent Forms integration with fallback
- [x] `components/program-card.php` - Training program cards

### Animations (Phase 2)
- [x] Scroll-triggered fade-in animations (IntersectionObserver)
- [x] Parallax hero effect (requestAnimationFrame)
- [x] Button ripple effect (CSS + minimal JS)
- [x] Button glow on hover

### Form Handling (Phase 3)
- [x] Fluent Forms AJAX submission hooks
- [x] Loading spinner for form submissions
- [x] Inline validation styling
- [x] URL parameter pre-fill (intent, target, source)

### Templates Built
- [x] front-page.php - Complete homepage matching mockup
- [x] archive-coach.php, single-coach.php
- [x] archive-merch.php, single-merch.php
- [x] page-contact.php
- [x] footer.php - 4-column layout matching mockup

---

## 📋 Remaining Tasks

### Minor Fixes
- [ ] Add actual placeholder images for missing assets
- [ ] Update social media links with real URLs
- [ ] Ensure Fluent Forms ID=1 exists or update default
- [ ] Add schema.org structured data for coaches/products
- [ ] Add lazy loading to images below fold

### Future Enhancements
- [ ] Testimonials archive page
- [ ] FAQ archive page  
- [ ] Contact form validation messages
- [ ] Image optimization pipeline
- [ ] Performance audit (Lighthouse)

---

## 📝 Notes

- **Event Posts**: Using default `post` type with "event" tag instead of custom CPT
  - Query: `'tag' => 'event'` in WP_Query
  - Archive URL: `/tag/event/` (default WordPress)
- **No WooCommerce**: Using "Inquire to Buy" flow for merch
- **Classless Tailwind v4**: Prefer CSS custom properties over utility classes where possible

## 📁 Component Usage Reference

```php
// Event Card
get_template_part('components/event-card', null, [
    'title' => 'Tournament Day',
    'date' => '2024-04-15',
    'excerpt' => 'Join us for...',
    'url' => get_permalink()
]);

// Testimonial
get_template_part('components/testimonial', null, [
    'quote' => 'Amazing experience!',
    'author' => 'John Smith',
    'role' => 'Club Member',
    'rating' => 5
]);

// FAQ Section
get_template_part('components/faq-section', null, ['title' => 'FAQs']);
// Then loop faq-item.php

// Stats Counter (multiple)
get_template_part('components/stats-counter', null, [
    'stats' => [
        ['value' => 500, 'suffix' => '+', 'label' => 'Sessions'],
        ['value' => 12, 'suffix' => '', 'label' => 'Coaches']
    ]
]);

// Newsletter Signup
get_template_part('components/newsletter-signup', null, [
    'form_id' => 2,
    'title' => 'Stay Updated'
]);

// Program Card
get_template_part('components/program-card', null, [
    'title' => 'Private Coaching',
    'description' => 'One-on-one sessions...',
    'icon' => 'racket'
]);

// Scroll Animation
<div data-animate class="...">Content</div>

// Parallax
<section data-parallax>
    <img data-parallax-target src="..." alt="...">
</section>

// Button with effects
get_template_part('components/button', null, [
    'text' => 'Click Me',
    'url' => '#',
    'variant' => 'solid',
    'class' => 'btn-ripple btn-glow'
]);
```
