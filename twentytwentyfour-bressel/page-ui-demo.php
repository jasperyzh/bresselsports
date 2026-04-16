<?php
/**
 * Template Name: UI Components Demo
 * Description: Complete UI component library showcase for the BRESSEL™ WordPress Framework.
 */

get_header();

$assets_base = get_stylesheet_directory_uri() . '/assets/';
?>

<!-- PhotoSwipe CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.4/photoswipe.min.css" />

<main class="bg-zinc-950 text-white min-h-screen">

    <!-- ═══════════════════════════════════════
         HERO — UI Demo Header
    ═══════════════════════════════════════ -->
    <section class="relative py-20 md:py-32 bg-black overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="<?= esc_url($assets_base . 'placeholder.jpg') ?>" alt="" class="w-full h-full object-cover" />
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-black via-black/90 to-black"></div>
        <div class="container-custom relative z-10 text-center">
            <div class="flex items-center justify-center gap-4 mb-6">
                <span class="block w-8 h-0.5 bg-[var(--color-bressel-red)]"></span>
                <span class="text-[var(--color-bressel-red)] font-bold uppercase tracking-[0.3em] text-xs">Component Library</span>
                <span class="block w-8 h-0.5 bg-[var(--color-bressel-red)]"></span>
            </div>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black uppercase italic mb-6">UI SHOWCASE</h1>
            <p class="text-zinc-400 text-lg md:text-xl max-w-2xl mx-auto">
                Complete design system for the BRESSEL™ WordPress Framework — built with Tailwind v4, vanilla JS, and WordPress standards.
            </p>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         SECTION NAVIGATION
    ═══════════════════════════════════════ -->
    <nav class="sticky top-16 z-40 bg-black/90 backdrop-blur-sm border-b border-zinc-800">
        <div class="container-custom py-4">
            <div class="flex flex-wrap gap-3 overflow-x-auto pb-2">
                <?php
                $sections = [
                    'colors' => 'Colors',
                    'typography' => 'Typography',
                    'buttons' => 'Buttons',
                    'alerts' => 'Alerts',
                    'cards' => 'Cards',
                    'forms' => 'Forms',
                    'accordion' => 'Accordion',
                    'dropdown' => 'Dropdown',
                    'grid' => 'Grid',
                    'spacing' => 'Spacing',
                    'carousel' => 'Carousel',
                    'lightbox' => 'Lightbox',
                    'navigation' => 'Navigation',
                ];
                foreach ($sections as $slug => $label) : ?>
                    <a href="#<?= esc_attr($slug) ?>"
                       class="text-xs font-bold uppercase tracking-widest text-zinc-500 hover:text-[var(--color-bressel-red)] transition-colors whitespace-nowrap px-3 py-2 border border-zinc-800 rounded hover:border-[var(--color-bressel-red)]">
                        <?= esc_html($label) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </nav>


    <!-- ═══════════════════════════════════════
         1. COLORS
    ═══════════════════════════════════════ -->
    <section id="colors" class="section-padding bg-black">
        <div class="container-custom">

            <header class="mb-16">
                <div class="accent-bar mb-4"></div>
                <h2 class="text-4xl md:text-5xl font-black uppercase italic mb-4">Colors</h2>
                <p class="text-zinc-400">BRESSEL™ brand palette with CSS custom properties.</p>
            </header>

            <!-- Brand Colors -->
            <div class="mb-12">
                <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Brand</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <?php
                    $brand_colors = [
                        ['name' => 'Red', 'hex' => '#E62E2D', 'var' => 'var(--color-bressel-red)', 'bg' => 'bg-[#E62E2D]'],
                        ['name' => 'Black', 'hex' => '#000000', 'var' => 'var(--color-bressel-black)', 'bg' => 'bg-[#000000] border border-zinc-800'],
                        ['name' => 'White', 'hex' => '#ffffff', 'var' => 'var(--color-bressel-white)', 'bg' => 'bg-white'],
                        ['name' => 'Yellow', 'hex' => '#EEFF2C', 'var' => 'Accent', 'bg' => 'bg-[#EEFF2C]'],
                    ];
                    foreach ($brand_colors as $color) : ?>
                        <div class="rounded-xl overflow-hidden border border-zinc-800">
                            <div class="h-24 <?= esc_attr($color['bg']) ?>"></div>
                            <div class="p-4 bg-zinc-900">
                                <p class="font-bold text-sm"><?= esc_html($color['name']) ?></p>
                                <p class="text-zinc-500 text-xs font-mono"><?= esc_html($color['hex']) ?></p>
                                <p class="text-zinc-600 text-xs font-mono"><?= esc_html($color['var']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Zinc Scale -->
            <div>
                <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Zinc Scale</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <?php
                    $zinc_colors = [
                        ['name' => 'Zinc 100', 'hex' => '#f4f4f5', 'var' => 'var(--color-bressel-zinc-100)'],
                        ['name' => 'Zinc 200', 'hex' => '#e4e4e7', 'var' => 'var(--color-bressel-zinc-200)'],
                        ['name' => 'Zinc 300', 'hex' => '#d4d4d8', 'var' => 'var(--color-bressel-zinc-300)'],
                        ['name' => 'Zinc 400', 'hex' => '#a1a1aa', 'var' => 'var(--color-bressel-zinc-400)'],
                        ['name' => 'Zinc 500', 'hex' => '#71717a', 'var' => 'var(--color-bressel-zinc-500)'],
                        ['name' => 'Zinc 600', 'hex' => '#52525b', 'var' => 'var(--color-bressel-zinc-600)'],
                        ['name' => 'Zinc 700', 'hex' => '#3f3f46', 'var' => 'var(--color-bressel-zinc-700)'],
                        ['name' => 'Zinc 800', 'hex' => '#27272a', 'var' => 'var(--color-bressel-zinc-800)'],
                        ['name' => 'Zinc 900', 'hex' => '#18181b', 'var' => 'var(--color-bressel-zinc-900)'],
                        ['name' => 'Zinc 950', 'hex' => '#09090b', 'var' => 'var(--color-bressel-zinc-950)'],
                    ];
                    foreach ($zinc_colors as $color) : ?>
                        <div class="rounded-xl overflow-hidden border border-zinc-800">
                            <div class="h-16 bg-[<?= esc_html($color['hex']) ?>]"></div>
                            <div class="p-3 bg-zinc-900">
                                <p class="text-xs font-bold"><?= esc_html($color['name']) ?></p>
                                <p class="text-zinc-600 text-[10px] font-mono"><?= esc_html($color['hex']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         2. TYPOGRAPHY
    ═══════════════════════════════════════ -->
    <section id="typography" class="section-padding bg-zinc-950">
        <div class="container-custom">

            <header class="mb-16">
                <div class="accent-bar mb-4"></div>
                <h2 class="text-4xl md:text-5xl font-black uppercase italic mb-4">Typography</h2>
                <p class="text-zinc-400">Oswald (headings) + Inter (body). Responsive clamp sizing.</p>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                <!-- Headings -->
                <div>
                    <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Headings</h3>
                    <div class="space-y-8">
                        <div>
                            <h1 class="text-5xl md:text-7xl">Heading 1</h1>
                            <p class="text-zinc-600 text-xs mt-2 font-mono">text-5xl md:text-7xl</p>
                        </div>
                        <div>
                            <h2 class="text-4xl md:text-6xl">Heading 2</h2>
                            <p class="text-zinc-600 text-xs mt-2 font-mono">text-4xl md:text-6xl</p>
                        </div>
                        <div>
                            <h3 class="text-3xl md:text-5xl">Heading 3</h3>
                            <p class="text-zinc-600 text-xs mt-2 font-mono">text-3xl md:text-5xl</p>
                        </div>
                        <div>
                            <h4 class="text-2xl md:text-3xl">Heading 4</h4>
                            <p class="text-zinc-600 text-xs mt-2 font-mono">text-2xl md:text-3xl</p>
                        </div>
                        <div>
                            <h5 class="text-xl md:text-2xl">Heading 5</h5>
                            <p class="text-zinc-600 text-xs mt-2 font-mono">text-xl md:text-2xl</p>
                        </div>
                        <div>
                            <h6 class="text-lg md:text-xl">Heading 6</h6>
                            <p class="text-zinc-600 text-xs mt-2 font-mono">text-lg md:text-xl</p>
                        </div>
                    </div>
                </div>

                <!-- Body & Utilities -->
                <div>
                    <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Body & Utilities</h3>
                    <div class="space-y-6">
                        <div>
                            <p class="text-zinc-200 text-base leading-relaxed">
                                Body text at base size with proper leading for readability. This is how your paragraph text will appear throughout the site.
                            </p>
                            <p class="text-zinc-600 text-xs mt-2 font-mono">text-base leading-relaxed</p>
                        </div>
                        <div>
                            <p class="text-zinc-400 text-sm">Small body text for secondary content and captions.</p>
                            <p class="text-zinc-600 text-xs mt-2 font-mono">text-zinc-400 text-sm</p>
                        </div>
                        <div>
                            <span class="text-[var(--color-bressel-red)] font-black uppercase tracking-widest text-xs">Uppercase Tracking Wide</span>
                            <p class="text-zinc-600 text-xs mt-2 font-mono">uppercase tracking-widest text-xs</p>
                        </div>
                        <div>
                            <p class="text-zinc-400 text-2xl italic font-black">Italic Headline Style</p>
                            <p class="text-zinc-600 text-xs mt-2 font-mono">italic font-black</p>
                        </div>
                        <div>
                            <p class="text-zinc-500 line-through">Strikethrough Text</p>
                            <p class="text-zinc-600 text-xs mt-2 font-mono">line-through</p>
                        </div>
                    </div>

                    <!-- Blockquote -->
                    <h3 class="text-xl font-bold uppercase mt-12 mb-6 text-zinc-300">Blockquote</h3>
                    <blockquote class="border-l-4 border-[var(--color-bressel-red)] pl-6 italic text-xl md:text-2xl text-zinc-300">
                        "PADEL IS NOT JUST A GAME OF FORCE. IT IS A SYMPHONY OF KINETIC PRECISION."
                    </blockquote>

                    <!-- Code -->
                    <h3 class="text-xl font-bold uppercase mt-12 mb-6 text-zinc-300">Code</h3>
                    <code class="bg-zinc-900 px-3 py-1 rounded text-sm font-mono text-[var(--color-bressel-red)]">&lt;?php get_header(); ?&gt;</code>

                </div>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         3. BUTTONS
    ═══════════════════════════════════════ -->
    <section id="buttons" class="section-padding bg-black">
        <div class="container-custom">

            <header class="mb-16">
                <div class="accent-bar mb-4"></div>
                <h2 class="text-4xl md:text-5xl font-black uppercase italic mb-4">Buttons</h2>
                <p class="text-zinc-400">Solid, outline, and ghost variants in three sizes.</p>
            </header>

            <!-- Sizes -->
            <div class="mb-12">
                <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Sizes</h3>
                <div class="flex flex-wrap items-center gap-6">
                    <?php get_template_part('components/button', null, ['text' => 'Small Button', 'variant' => 'solid', 'size' => 'sm']); ?>
                    <?php get_template_part('components/button', null, ['text' => 'Medium Button', 'variant' => 'solid', 'size' => 'md']); ?>
                    <?php get_template_part('components/button', null, ['text' => 'Large Button', 'variant' => 'solid', 'size' => 'lg']); ?>
                </div>
            </div>

            <!-- Variants -->
            <div class="mb-12">
                <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Variants</h3>
                <div class="flex flex-wrap items-center gap-6">
                    <?php get_template_part('components/button', null, ['text' => 'Solid', 'variant' => 'solid']); ?>
                    <?php get_template_part('components/button', null, ['text' => 'Outline', 'variant' => 'outline']); ?>
                    <?php get_template_part('components/button', null, ['text' => 'Ghost', 'variant' => 'ghost']); ?>
                    <?php get_template_part('components/button', null, ['text' => 'Ghost Red', 'variant' => 'ghost', 'accent' => true]); ?>
                </div>
            </div>

            <!-- States -->
            <div>
                <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">States (hover shown in code)</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-zinc-900 p-6 rounded-lg border border-zinc-800">
                        <p class="text-sm font-bold mb-2">Default</p>
                        <div class="flex gap-3">
                            <?php get_template_part('components/button', null, ['text' => 'Default', 'variant' => 'solid', 'size' => 'sm']); ?>
                            <?php get_template_part('components/button', null, ['text' => 'Default', 'variant' => 'outline', 'size' => 'sm']); ?>
                        </div>
                    </div>
                    <div class="bg-zinc-900 p-6 rounded-lg border border-zinc-800">
                        <p class="text-sm font-bold mb-2">With Icon</p>
                        <div class="flex gap-3">
                            <a href="#" class="inline-flex items-center gap-2 px-5 py-3 bg-[var(--color-bressel-red)] text-white text-xs font-black uppercase tracking-widest rounded">
                                BOOK
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                    <div class="bg-zinc-900 p-6 rounded-lg border border-zinc-800">
                        <p class="text-sm font-bold mb-2">Loading</p>
                        <div class="flex gap-3">
                            <button disabled class="inline-flex items-center gap-2 px-5 py-3 bg-[var(--color-bressel-red)] text-white/50 text-xs font-black uppercase tracking-widest rounded cursor-wait">
                                <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                                LOADING
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         4. ALERTS
    ═══════════════════════════════════════ -->
    <section id="alerts" class="section-padding bg-zinc-950">
        <div class="container-custom">

            <header class="mb-16">
                <div class="accent-bar mb-4"></div>
                <h2 class="text-4xl md:text-5xl font-black uppercase italic mb-4">Alerts</h2>
                <p class="text-zinc-400">Contextual feedback messages for user actions.</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php get_template_part('components/alert', null, ['type' => 'success', 'title' => 'Success', 'message' => 'Your action was completed successfully. The changes have been saved.']); ?>
                <?php get_template_part('components/alert', null, ['type' => 'warning', 'title' => 'Warning', 'message' => 'Please review the information before proceeding with this action.']); ?>
                <?php get_template_part('components/alert', null, ['type' => 'error', 'title' => 'Error', 'message' => 'An unexpected error occurred. Please try again or contact support.']); ?>
                <?php get_template_part('components/alert', null, ['type' => 'info', 'title' => 'Info', 'message' => 'New features are available. Check the changelog for details.']); ?>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         5. CARDS
    ═══════════════════════════════════════ -->
    <section id="cards" class="section-padding bg-black">
        <div class="container-custom">

            <header class="mb-16">
                <div class="accent-bar mb-4"></div>
                <h2 class="text-4xl md:text-5xl font-black uppercase italic mb-4">Cards</h2>
                <p class="text-zinc-400">Reusable card components for different content types.</p>
            </header>

            <!-- Coach Card -->
            <div class="mb-12">
                <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Coach Card</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php get_template_part('components/coach-card', null, ['name' => 'Coach Jeremy', 'role' => 'Head of Pro Training', 'image' => $assets_base . 'placeholder.jpg']); ?>
                    <?php get_template_part('components/coach-card', null, ['name' => 'Coach Sofia', 'role' => 'Performance Coach', 'image' => $assets_base . 'placeholder.jpg']); ?>
                    <?php get_template_part('components/coach-card', null, ['name' => 'Coach Ravi', 'role' => 'Junior Development', 'image' => $assets_base . 'placeholder.jpg']); ?>
                </div>
            </div>

            <!-- Event Card -->
            <div class="mb-12">
                <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Event Card</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php get_template_part('components/event-card', null, ['event_id' => 41]); ?>
                    <?php get_template_part('components/event-card', null, ['event_id' => 42]); ?>
                    <?php get_template_part('components/event-card', null, ['event_id' => 43]); ?>
                </div>
            </div>

            <!-- Merch Card -->
            <div class="mb-12">
                <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Merch Card</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php get_template_part('components/merch-card', null, ['name' => 'PADEL-X Pro', 'price' => 'RM 160', 'image' => $assets_base . 'placeholder.jpg']); ?>
                    <?php get_template_part('components/merch-card', null, ['name' => 'KINETIC GRIP V1', 'price' => 'RM 159', 'image' => $assets_base . 'placeholder.jpg']); ?>
                    <?php get_template_part('components/merch-card', null, ['name' => 'PRO TOUR BAG', 'price' => 'RM 220', 'image' => $assets_base . 'placeholder.jpg']); ?>
                </div>
            </div>

            <!-- Testimonial Card -->
            <div>
                <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Testimonial Card</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php get_template_part('components/testimonial-card', null, ['quote' => 'The coaching at BRESSEL took my game to a whole new level. The methodology is scientific and effective.', 'author' => 'MARCUS L.', 'role' => 'Regional Champion 2025']); ?>
                    <?php get_template_part('components/testimonial-card', null, ['quote' => 'Best padel equipment I have ever used. The precision and feel is unmatched in the industry.', 'author' => 'SARAH TAN', 'role' => 'Club Player, KL']); ?>
                </div>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         6. FORMS
    ═══════════════════════════════════════ -->
    <section id="forms" class="section-padding bg-zinc-950">
        <div class="container-custom">

            <header class="mb-16">
                <div class="accent-bar mb-4"></div>
                <h2 class="text-4xl md:text-5xl font-black uppercase italic mb-4">Form Elements</h2>
                <p class="text-zinc-400">Dark-themed form controls with proper focus states.</p>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                <!-- Inputs -->
                <div>
                    <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Text Inputs</h3>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-zinc-400 mb-2">Full Name</label>
                            <input type="text" placeholder="Enter your name" class="w-full px-4 py-3 bg-zinc-900 border border-zinc-700 text-white placeholder-zinc-500 text-sm focus:outline-none focus:border-[var(--color-bressel-red)] transition-colors rounded" />
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-zinc-400 mb-2">Email Address</label>
                            <input type="email" placeholder="you@example.com" class="w-full px-4 py-3 bg-zinc-900 border border-zinc-700 text-white placeholder-zinc-500 text-sm focus:outline-none focus:border-[var(--color-bressel-red)] transition-colors rounded" />
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-zinc-400 mb-2">Phone</label>
                            <input type="tel" placeholder="+60 12-345-6789" class="w-full px-4 py-3 bg-zinc-900 border border-zinc-700 text-white placeholder-zinc-500 text-sm focus:outline-none focus:border-[var(--color-bressel-red)] transition-colors rounded" />
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-zinc-400 mb-2">Message</label>
                            <textarea rows="4" placeholder="Your message..." class="w-full px-4 py-3 bg-zinc-900 border border-zinc-700 text-white placeholder-zinc-500 text-sm focus:outline-none focus:border-[var(--color-bressel-red)] transition-colors rounded resize-y"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Selects, Checkboxes, Radios, Switches -->
                <div>
                    <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Select & Options</h3>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-zinc-400 mb-2">Program Type</label>
                            <select class="w-full px-4 py-3 bg-zinc-900 border border-zinc-700 text-white text-sm focus:outline-none focus:border-[var(--color-bressel-red)] transition-colors rounded appearance-none">
                                <option>Professional Training</option>
                                <option>Competition Prep</option>
                                <option>Junior Development</option>
                                <option>Corporate Event</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-zinc-400 mb-2">Interests</label>
                            <div class="space-y-3">
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input type="checkbox" class="w-4 h-4 rounded bg-zinc-900 border-zinc-600 text-[var(--color-bressel-red)] focus:ring-[var(--color-bressel-red)]" checked />
                                    <span class="text-sm text-zinc-300">Professional Coaching</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input type="checkbox" class="w-4 h-4 rounded bg-zinc-900 border-zinc-600 text-[var(--color-bressel-red)] focus:ring-[var(--color-bressel-red)]" />
                                    <span class="text-sm text-zinc-300">Tournament Entry</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input type="checkbox" class="w-4 h-4 rounded bg-zinc-900 border-zinc-600 text-[var(--color-bressel-red)] focus:ring-[var(--color-bressel-red)]" checked />
                                    <span class="text-sm text-zinc-300">Gear & Merchandise</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-zinc-400 mb-2">Contact Preference</label>
                            <div class="space-y-3">
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input type="radio" name="pref" class="w-4 h-4 rounded-full bg-zinc-900 border-zinc-600 text-[var(--color-bressel-red)] focus:ring-[var(--color-bressel-red)]" checked />
                                    <span class="text-sm text-zinc-300">Email</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input type="radio" name="pref" class="w-4 h-4 rounded-full bg-zinc-900 border-zinc-600 text-[var(--color-bressel-red)] focus:ring-[var(--color-bressel-red)]" />
                                    <span class="text-sm text-zinc-300">Phone</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input type="radio" name="pref" class="w-4 h-4 rounded-full bg-zinc-900 border-zinc-600 text-[var(--color-bressel-red)] focus:ring-[var(--color-bressel-red)]" />
                                    <span class="text-sm text-zinc-300">WhatsApp</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-zinc-400 mb-2">Newsletter</label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked />
                                <div class="w-11 h-6 bg-zinc-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-[var(--color-bressel-red)] after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                                <span class="ml-3 text-sm text-zinc-300">Subscribe to updates</span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         7. ACCORDION
    ═══════════════════════════════════════ -->
    <section id="accordion" class="section-padding bg-black">
        <div class="container-custom">

            <header class="mb-16">
                <div class="accent-bar mb-4"></div>
                <h2 class="text-4xl md:text-5xl font-black uppercase italic mb-4">Accordion</h2>
                <p class="text-zinc-400">Expandable content sections with smooth animations.</p>
            </header>

            <div class="max-w-3xl mx-auto space-y-3">
                <?php get_template_part('components/accordion', null, ['title' => 'What is BRESSEL™ Academy?', 'content' => 'BRESSEL™ Academy is a world-class padel training program founded in 2020. We combine scientific methodology with elite coaching to develop players from junior level to professional competition. Our facilities span across Malaysia, Philippines, and Singapore.']); ?>
                <?php get_template_part('components/accordion', null, ['title' => 'How do I book a session?', 'content' => 'You can book sessions through our contact form, via WhatsApp, or by calling our centers directly. Select your preferred program type, location, and time slot. Our team will confirm your booking within 24 hours.']); ?>
                <?php get_template_part('components/accordion', null, ['title' => 'What equipment do I need?', 'content' => 'For beginner programs, we provide all necessary equipment. For advanced training, we recommend the BRESSEL PADEL-X racket series. Visit our shop to explore our full range of professional-grade padel equipment.']); ?>
                <?php get_template_part('components/accordion', null, ['title' => 'Do you offer corporate packages?', 'content' => 'Yes! We offer corporate team-building programs, corporate tournaments, and private event hosting. Contact our events team for custom packages tailored to your organization.']); ?>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         8. DROPDOWN
    ═══════════════════════════════════════ -->
    <section id="dropdown" class="section-padding bg-zinc-950">
        <div class="container-custom">

            <header class="mb-16">
                <div class="accent-bar mb-4"></div>
                <h2 class="text-4xl md:text-5xl font-black uppercase italic mb-4">Dropdown</h2>
                <p class="text-zinc-400">Interactive dropdown menus with smooth transitions.</p>
            </header>

            <div class="flex flex-wrap gap-6">

                <!-- Dropdown 1 -->
                <div class="dropdown relative">
                    <button class="dropdown-toggle btn-solid btn-ripple inline-flex items-center gap-2 px-5 py-3 text-xs font-black uppercase tracking-widest">
                        Programs
                        <svg class="w-4 h-4 transition-transform dropdown-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="dropdown-menu absolute left-0 top-full mt-2 w-56 bg-zinc-900 border border-zinc-800 rounded-lg shadow-2xl opacity-0 invisible z-50">
                        <a href="#" class="block px-4 py-3 text-sm text-zinc-300 hover:text-white hover:bg-zinc-800 border-b border-zinc-800">Professional Training</a>
                        <a href="#" class="block px-4 py-3 text-sm text-zinc-300 hover:text-white hover:bg-zinc-800 border-b border-zinc-800">Competition Prep</a>
                        <a href="#" class="block px-4 py-3 text-sm text-zinc-300 hover:text-white hover:bg-zinc-800 border-b border-zinc-800">Junior Development</a>
                        <a href="#" class="block px-4 py-3 text-sm text-[var(--color-bressel-red)] hover:bg-zinc-800">View All Programs</a>
                    </div>
                </div>

                <!-- Dropdown 2 -->
                <div class="dropdown relative">
                    <button class="dropdown-toggle btn-outline inline-flex items-center gap-2 px-5 py-3 text-xs font-black uppercase tracking-widest">
                        Locations
                        <svg class="w-4 h-4 transition-transform dropdown-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="dropdown-menu absolute left-0 top-full mt-2 w-48 bg-zinc-900 border border-zinc-800 rounded-lg shadow-2xl opacity-0 invisible z-50">
                        <a href="#" class="block px-4 py-3 text-sm text-zinc-300 hover:text-white hover:bg-zinc-800">Malaysia</a>
                        <a href="#" class="block px-4 py-3 text-sm text-zinc-300 hover:text-white hover:bg-zinc-800">Philippines</a>
                        <a href="#" class="block px-4 py-3 text-sm text-zinc-300 hover:text-white hover:bg-zinc-800">Singapore</a>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         9. GRID SYSTEM
    ═══════════════════════════════════════ -->
    <section id="grid" class="section-padding bg-black">
        <div class="container-custom">

            <header class="mb-16">
                <div class="accent-bar mb-4"></div>
                <h2 class="text-4xl md:text-5xl font-black uppercase italic mb-4">Grid System</h2>
                <p class="text-zinc-400">Tailwind CSS responsive grid utilities.</p>
            </header>

            <!-- 1-2 Columns -->
            <div class="mb-12">
                <h3 class="text-lg font-bold uppercase mb-6 text-zinc-300">1 to 2 Columns</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-[var(--color-bressel-red)]/20 border border-[var(--color-bressel-red)]/40 p-4 rounded text-center">
                        <span class="text-[var(--color-bressel-red)] font-bold text-2xl">1</span>
                    </div>
                    <div class="bg-[var(--color-bressel-red)]/20 border border-[var(--color-bressel-red)]/40 p-4 rounded text-center">
                        <span class="text-[var(--color-bressel-red)] font-bold text-2xl">2</span>
                    </div>
                </div>
            </div>

            <!-- 3 Columns -->
            <div class="mb-12">
                <h3 class="text-lg font-bold uppercase mb-6 text-zinc-300">3 Columns</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <?php for ($i = 1; $i <= 3; $i++) : ?>
                        <div class="bg-[var(--color-bressel-red)]/20 border border-[var(--color-bressel-red)]/40 p-4 rounded text-center">
                            <span class="text-[var(--color-bressel-red)] font-bold text-2xl"><?= $i ?></span>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- 4 Columns -->
            <div class="mb-12">
                <h3 class="text-lg font-bold uppercase mb-6 text-zinc-300">4 Columns</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <?php for ($i = 1; $i <= 4; $i++) : ?>
                        <div class="bg-[var(--color-bressel-red)]/20 border border-[var(--color-bressel-red)]/40 p-4 rounded text-center">
                            <span class="text-[var(--color-bressel-red)] font-bold text-2xl"><?= $i ?></span>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- 12 Columns -->
            <div>
                <h3 class="text-lg font-bold uppercase mb-6 text-zinc-300">12 Columns (Full Grid)</h3>
                <div class="grid grid-cols-12 gap-2">
                    <?php for ($i = 1; $i <= 12; $i++) : ?>
                        <div class="bg-zinc-800 p-3 rounded text-center">
                            <span class="text-zinc-400 font-bold text-xs"><?= $i ?></span>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         10. SPACING
    ═══════════════════════════════════════ -->
    <section id="spacing" class="section-padding bg-zinc-950">
        <div class="container-custom">

            <header class="mb-16">
                <div class="accent-bar mb-4"></div>
                <h2 class="text-4xl md:text-5xl font-black uppercase italic mb-4">Spacing</h2>
                <p class="text-zinc-400">Tailwind spacing scale — p- (padding), m- (margin), gap-.</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                <!-- Padding -->
                <div>
                    <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Padding Scale</h3>
                    <div class="space-y-4">
                        <?php
                        $padding_levels = ['p-1', 'p-2', 'p-4', 'p-6', 'p-8', 'p-12', 'p-16', 'p-24'];
                        foreach ($padding_levels as $level) : ?>
                            <div class="flex items-center gap-4">
                                <span class="text-xs font-mono text-zinc-500 w-16"><?= esc_html($level) ?></span>
                                <div class="border border-[var(--color-bressel-red)]/50 bg-[var(--color-bressel-red)]/10 <?= esc_attr($level) ?> rounded">
                                    <div class="bg-[var(--color-bressel-red)]/30 w-16 h-4 rounded"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Margin -->
                <div>
                    <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Margin Scale</h3>
                    <div class="space-y-4">
                        <?php
                        $margin_levels = ['my-2', 'my-4', 'my-6', 'my-8', 'my-12', 'my-16', 'my-24'];
                        foreach ($margin_levels as $level) : ?>
                            <div class="flex items-center gap-4">
                                <span class="text-xs font-mono text-zinc-500 w-16"><?= esc_html($level) ?></span>
                                <div class="w-full">
                                    <div class="bg-[var(--color-bressel-red)]/20 border border-[var(--color-bressel-red)]/50 <?= esc_attr($level) ?> rounded">
                                        <div class="bg-[var(--color-bressel-red)]/40 h-4 rounded"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <!-- Section Padding -->
            <div class="mt-12">
                <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Section Padding</h3>
                <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-2">
                    <div class="bg-zinc-800 border border-zinc-700 rounded text-center py-8">
                        <span class="text-zinc-400 font-bold">.section-padding class</span>
                        <p class="text-zinc-600 text-xs mt-1">pt-16 pb-24 md:pt-24 md:pb-32</p>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         11. CAROUSEL
    ═══════════════════════════════════════ -->
    <section id="carousel" class="section-padding bg-black">
        <div class="container-custom">

            <header class="mb-16">
                <div class="accent-bar mb-4"></div>
                <h2 class="text-4xl md:text-5xl font-black uppercase italic mb-4">Carousel</h2>
                <p class="text-zinc-400">Quote carousel with auto-play, dots, and arrow navigation.</p>
            </header>

            <div class="max-w-4xl mx-auto">
                <?php get_template_part('components/quote-carousel'); ?>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         12. LIGHTBOX (PhotoSwipe)
    ═══════════════════════════════════════ -->
    <section id="lightbox" class="section-padding bg-zinc-950">
        <div class="container-custom">

            <header class="mb-16">
                <div class="accent-bar mb-4"></div>
                <h2 class="text-4xl md:text-5xl font-black uppercase italic mb-4">Lightbox</h2>
                <p class="text-zinc-400">PhotoSwipe 5 — touch-enabled, responsive, vanilla JS.</p>
            </header>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <?php
                $photos = [
                    ['thumb' => $assets_base . 'placeholder.jpg', 'full' => $assets_base . 'placeholder.jpg', 'caption' => 'Court View'],
                    ['thumb' => $assets_base . 'placeholder.jpg', 'full' => $assets_base . 'placeholder.jpg', 'caption' => 'Training Session'],
                    ['thumb' => $assets_base . 'placeholder.jpg', 'full' => $assets_base . 'placeholder.jpg', 'caption' => 'Equipment'],
                    ['thumb' => $assets_base . 'placeholder.jpg', 'full' => $assets_base . 'placeholder.jpg', 'caption' => 'Community Event'],
                ];
                foreach ($photos as $i => $photo) : ?>
                    <a href="<?= esc_url($photo['full']) ?>"
                       data-pswp-width="1920" data-pswp-height="1080"
                       target="_blank"
                       class="lightbox-trigger group block rounded-lg overflow-hidden border border-zinc-800 hover:border-zinc-600 transition-colors">
                        <img src="<?= esc_url($photo['thumb']) ?>" alt="<?= esc_attr($photo['caption']) ?>"
                             class="w-full aspect-square object-cover opacity-60 group-hover:opacity-80 transition-opacity" />
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-black/40">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-3 bg-gradient-to-t from-black/80 to-transparent">
                            <span class="text-white text-xs font-bold"><?= esc_html($photo['caption']) ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- PhotoSwipe Container -->
            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="pswp__bg"></div>
                <div class="pswp__scroll-wrap">
                    <div class="pswp__container">
                        <div class="pswp__item"></div>
                        <div class="pswp__item"></div>
                        <div class="pswp__item"></div>
                    </div>
                    <div class="pswp__ui pswp__ui--hidden">
                        <div class="pswp__top-bar">
                            <div class="pswp__counter"></div>
                            <button class="pswp__button pswp__button--close" title="Close"></button>
                            <button class="pswp__button pswp__button--share" title="Share"></button>
                            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                            <div class="pswp__preloader">
                                <div class="pswp__preloader__icn">
                                    <div class="pswp__preloader__cut">
                                        <div class="pswp__preloader__donut"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                            <div class="pswp__share-tooltip"></div>
                        </div>
                        <button class="pswp__button pswp__button--arrow--left" title="Previous"></button>
                        <button class="pswp__button pswp__button--arrow--right" title="Next"></button>
                        <div class="pswp__caption">
                            <div class="pswp__caption__center"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         13. NAVIGATION
    ═══════════════════════════════════════ -->
    <section id="navigation" class="section-padding bg-black">
        <div class="container-custom">

            <header class="mb-16">
                <div class="accent-bar mb-4"></div>
                <h2 class="text-4xl md:text-5xl font-black uppercase italic mb-4">Navigation</h2>
                <p class="text-zinc-400">Primary nav, breadcrumbs, and pagination patterns.</p>
            </header>

            <!-- Primary Nav -->
            <div class="mb-16">
                <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Primary Navigation</h3>
                <nav class="border border-zinc-800 rounded-lg overflow-hidden">
                    <div class="flex flex-wrap items-center">
                        <a href="#" class="px-6 py-4 bg-zinc-900 border-r border-zinc-800">
                            <img src="<?= esc_url($assets_base . 'logo-bressel-white.png') ?>" alt="BRESSEL" class="h-6 md:h-8 w-auto" />
                        </a>
                        <a href="#" class="px-5 py-4 text-sm font-bold uppercase tracking-widest text-white border-r border-zinc-800 bg-[var(--color-bressel-red)]/20">Home</a>
                        <a href="#" class="px-5 py-4 text-sm font-bold uppercase tracking-widest text-zinc-400 border-r border-zinc-800 hover:text-white hover:bg-zinc-900 transition-colors">Academy</a>
                        <a href="#" class="px-5 py-4 text-sm font-bold uppercase tracking-widest text-zinc-400 border-r border-zinc-800 hover:text-white hover:bg-zinc-900 transition-colors">Community</a>
                        <a href="#" class="px-5 py-4 text-sm font-bold uppercase tracking-widest text-zinc-400 border-r border-zinc-800 hover:text-white hover:bg-zinc-900 transition-colors">Shop</a>
                        <a href="#" class="px-5 py-4 text-sm font-bold uppercase tracking-widest text-zinc-400 border-r border-zinc-800 hover:text-white hover:bg-zinc-900 transition-colors">Contact</a>
                        <a href="#" class="ml-auto px-6 py-4 text-xs font-black uppercase tracking-widest bg-[var(--color-bressel-red)] text-white">Book Now</a>
                    </div>
                </nav>
            </div>

            <!-- Breadcrumbs -->
            <div class="mb-16">
                <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Breadcrumbs</h3>
                <nav class="text-sm" aria-label="Breadcrumb">
                    <ol class="flex items-center gap-2 text-zinc-500">
                        <li><a href="#" class="hover:text-white transition-colors">Home</a></li>
                        <li class="text-zinc-700">/</li>
                        <li><a href="#" class="hover:text-white transition-colors">Academy</a></li>
                        <li class="text-zinc-700">/</li>
                        <li class="text-[var(--color-bressel-red)]">Coach Profile</li>
                    </ol>
                </nav>
            </div>

            <!-- Pagination -->
            <div>
                <h3 class="text-xl font-bold uppercase mb-6 text-zinc-300">Pagination</h3>
                <nav aria-label="Page navigation">
                    <ul class="flex items-center gap-2">
                        <li>
                            <a href="#" class="px-4 py-2 text-xs font-bold uppercase tracking-widest border border-zinc-800 text-zinc-400 hover:border-white hover:text-white transition-colors">Prev</a>
                        </li>
                        <li>
                            <a href="#" class="px-4 py-2 text-xs font-bold bg-[var(--color-bressel-red)] text-white border border-[var(--color-bressel-red)]">01</a>
                        </li>
                        <li>
                            <a href="#" class="px-4 py-2 text-xs font-bold uppercase tracking-widest border border-zinc-800 text-zinc-400 hover:border-white hover:text-white transition-colors">02</a>
                        </li>
                        <li>
                            <a href="#" class="px-4 py-2 text-xs font-bold uppercase tracking-widest border border-zinc-800 text-zinc-400 hover:border-white hover:text-white transition-colors">03</a>
                        </li>
                        <li>
                            <span class="px-3 py-2 text-zinc-600">...</span>
                        </li>
                        <li>
                            <a href="#" class="px-4 py-2 text-xs font-bold uppercase tracking-widest border border-zinc-800 text-zinc-400 hover:border-white hover:text-white transition-colors">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         FOOTER
    ═══════════════════════════════════════ -->
    <footer class="py-12 bg-zinc-950 border-t border-zinc-800">
        <div class="container-custom text-center">
            <img src="<?= esc_url($assets_base . 'logo-bressel-white.png') ?>" alt="BRESSEL" class="h-10 w-auto mx-auto mb-6 opacity-60" />
            <p class="text-zinc-600 text-sm">
                BRESSEL™ WordPress Framework — UI Component Library v1.0<br/>
                Built with Tailwind v4, Vite 6, PHP 8.2+
            </p>
        </div>
    </footer>

</main>

<!-- PhotoSwipe JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.4/photoswipe.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.4/photoswipe-lightbox.umd.min.js"></script>

<script>
    // PhotoSwipe Lightbox
    document.addEventListener('DOMContentLoaded', function() {
        const lightbox = new PhotoSwipeLightbox({
            gallery: '#lightbox .grid',
            children: 'a.lightbox-trigger',
            pswpModule: () => import('https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.4/photoswipe.umd.min.js')
        });
        lightbox.init();

        // Dropdown toggles
        document.querySelectorAll('.dropdown-toggle').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const menu = this.parentElement.querySelector('.dropdown-menu');
                const arrow = this.querySelector('.dropdown-arrow');
                const isOpen = menu.style.opacity === '1';

                // Close all others
                document.querySelectorAll('.dropdown-menu').forEach(function(m) {
                    m.style.opacity = '0';
                    m.style.visibility = 'hidden';
                });
                document.querySelectorAll('.dropdown-arrow').forEach(function(a) {
                    a.style.transform = 'rotate(0deg)';
                });

                if (!isOpen) {
                    menu.style.opacity = '1';
                    menu.style.visibility = 'visible';
                    arrow.style.transform = 'rotate(180deg)';
                }
            });
        });

        // Close dropdowns on outside click
        document.addEventListener('click', function() {
            document.querySelectorAll('.dropdown-menu').forEach(function(m) {
                m.style.opacity = '0';
                m.style.visibility = 'hidden';
            });
            document.querySelectorAll('.dropdown-arrow').forEach(function(a) {
                a.style.transform = 'rotate(0deg)';
            });
        });
    });
</script>

<?php get_footer(); ?>
