<?php
/**
 * Title: Front Page Template
 * Description: Homepage — styled to match homepage_50pct.jpg mockup.
 * Sections: Hero → About → Ticker → Program Pillars → Quote → Centers → Ticker → Shop → CTA/Newsletter → Footer
 */

get_header();

$assets_base = get_stylesheet_directory_uri() . '/assets/';
?>

<main class="bg-black text-white overflow-x-hidden">

    <!-- ═══════════════════════════════════════
         1. HERO
         Full-screen dark photo, EST. tagline,
         two-line headline, body, dual CTAs
    ═══════════════════════════════════════ -->
    <section id="hero" class="hero-section relative min-h-screen flex flex-col justify-end pb-24 md:pb-32" data-parallax>

    <!-- BG Video (with poster fallback) -->
    <video data-parallax-target
           autoplay loop muted playsinline
           poster="<?= esc_url($assets_base . 'cta-bg-overlay.jpg') ?>"
           class="absolute inset-0 w-full h-[115%] object-cover select-none pointer-events-none opacity-40">
        <source src="<?= esc_url($assets_base . 'background-video.mp4') ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>

        <!-- Dark overlay: heavier at bottom so text pops -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/40 to-black/80 z-10"></div>

        <!-- Content -->
        <div class="relative z-20 container-custom">

            <!-- EST / tagline line -->
            <div class="flex items-center gap-4 mb-6">
                <span class="block w-8 h-0.5 bg-[var(--color-bressel-red)]"></span>
                <span class="text-[var(--color-bressel-red)] font-bold uppercase tracking-[0.25em] text-xs">EST. 2020 / PLAY BEYOND</span>
                <span class="block w-8 h-0.5 bg-[var(--color-bressel-red)]"></span>
            </div>

            <!-- Main headline -->
            <h1 class="hero-headline mb-6 max-w-4xl">
                WORLD-CLASS PADEL,<br>
                <span class="text-[var(--color-bressel-red)]">WITHIN REACH.</span>
            </h1>

            <!-- Body copy -->
            <p class="text-zinc-300 text-base md:text-lg max-w-xl mb-10 leading-relaxed font-normal">
                Unlock your potential with elite coaching modules,<br class="hidden md:block">
                community integration, and the precision of BRESSEL™ PRO equipment.
            </p>

            <!-- CTAs -->
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="<?= esc_url(home_url('/contact/?intent=booking')) ?>"
                   class="btn-solid btn-ripple inline-flex items-center gap-3 px-8 py-4 text-sm font-black uppercase tracking-widest">
                    BOOK SESSION
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2zm7 4l-1.4 1.4L14.2 12l-3.6 3.6L12 17l5-5-5-5z"/></svg>
                </a>
                <a href="#programs"
                   class="btn-outline inline-flex items-center gap-3 px-8 py-4 text-sm font-black uppercase tracking-widest">
                    EXPLORE PROGRAMMES
                </a>
            </div>
        </div>

        <!-- Scroll hint -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center gap-2 opacity-40">
            <span class="text-[9px] uppercase tracking-[0.3em] text-white">Scroll</span>
            <div class="w-0.5 h-8 bg-white animate-pulse"></div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         2. ABOUT — Academy + Community cards
    ═══════════════════════════════════════ -->
    <section id="about" class="section-padding bg-black">
        <div class="container-custom">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Academy card -->
                <div class="about-card group relative overflow-hidden rounded-md border border-zinc-800 hover:border-zinc-600 transition-colors duration-500" data-animate>
                    <img src="<?= esc_url($assets_base . 'academy-card.jpg') ?>"
                         alt="BRESSEL Academy"
                         class="w-full h-64 md:h-80 object-cover transition-transform duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-black/10"></div>
                    <div class="absolute bottom-0 left-0 p-6 md:p-8">
                        <h3 class="text-3xl md:text-4xl font-black uppercase italic mb-2">ACADEMY</h3>
                        <p class="text-zinc-400 text-sm mb-6 max-w-sm">
                            Master the technical precision of the pros. Our elite-level training modules focus on footwork, court positioning, and explosive agility.
                        </p>
                        <a href="<?= esc_url(get_post_type_archive_link('coach')) ?>"
                           class="inline-flex items-center gap-2 text-[var(--color-bressel-red)] font-bold uppercase tracking-widest text-xs hover:text-white transition-colors group/link">
                            EXPLORE PROGRAMS
                            <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Community card -->
                <div class="about-card group relative overflow-hidden rounded-md border border-zinc-800 hover:border-zinc-600 transition-colors duration-500" data-animate>
                    <img src="<?= esc_url($assets_base . 'community-card.jpg') ?>"
                         alt="BRESSEL Community"
                         class="w-full h-64 md:h-80 object-cover transition-transform duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-black/10"></div>
                    <div class="absolute bottom-0 left-0 p-6 md:p-8">
                        <h3 class="text-3xl md:text-4xl font-black uppercase italic mb-2">COMMUNITY</h3>
                        <p class="text-zinc-400 text-sm mb-6 max-w-sm">
                            Connect with players who match your intensity. Join local ladders, enter international tournaments, and rank up.
                        </p>
                        <a href="<?= esc_url(home_url('/contact/')) ?>"
                           class="inline-flex items-center gap-2 text-[var(--color-bressel-red)] font-bold uppercase tracking-widest text-xs hover:text-white transition-colors group/link">
                            FIND A COURT
                            <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         3. TICKER — Scrolling news bar
    ═══════════════════════════════════════ -->
    <div class="news-ticker border-y border-zinc-800 bg-zinc-950 overflow-hidden py-3">
        <div class="ticker-track flex gap-0 whitespace-nowrap">
            <?php
            $ticker_items = [
                ['label' => 'UPCOMING', 'text' => 'MALAYSIA OPEN QUALIFIERS'],
                ['label' => 'EVENT',    'text' => 'BRESSEL JUNIOR PADEL CIRCUIT', 'accent' => true],
                ['label' => 'LIVE',     'text' => 'ACADEMY RANKING UPDATES'],
                ['label' => 'NEW DROP', 'text' => 'PRECISION SERIES V2'],
                ['label' => 'UPCOMING', 'text' => 'MALAYSIA OPEN QUALIFIERS'],
                ['label' => 'EVENT',    'text' => 'BRESSEL JUNIOR PADEL CIRCUIT', 'accent' => true],
                ['label' => 'LIVE',     'text' => 'ACADEMY RANKING UPDATES'],
                ['label' => 'NEW DROP', 'text' => 'PRECISION SERIES V2'],
            ];
            foreach ($ticker_items as $item) : ?>
                <span class="ticker-item inline-flex items-center gap-3 px-8 text-xs font-bold uppercase tracking-widest">
                    <span class="<?= !empty($item['accent']) ? 'text-[var(--color-bressel-red)]' : 'text-zinc-600' ?>">
                        <?= esc_html($item['label']) ?>
                    </span>
                    <span class="text-zinc-300"><?= esc_html($item['text']) ?></span>
                    <span class="text-zinc-700 mx-2">—</span>
                </span>
            <?php endforeach; ?>
        </div>
    </div>


    <!-- ═══════════════════════════════════════
         4. PROGRAM PILLARS
         Ghost "ACADEMY" watermark, 3 image cards
    ═══════════════════════════════════════ -->
    <section id="programs" class="section-padding bg-black relative overflow-hidden">

        <!-- Ghost watermark -->
        <div class="watermark-text absolute right-0 top-1/2 -translate-y-1/2 select-none pointer-events-none z-0 leading-none">
            ACADEMY
        </div>

        <div class="container-custom relative z-10">
            <div class="mb-12" data-animate>
                <p class="text-zinc-600 text-xs uppercase tracking-widest mb-3">Engineered for community excellence.</p>
                <h2 class="text-5xl md:text-7xl">PROGRAM PILLARS</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                $pillars = [
                    ['title' => 'PROFESSIONAL', 'desc' => 'World-class training using BRESSEL methodology. Racket mechanics, shot precision, and match-level IQ.', 'icon' => '🏆'],
                    ['title' => 'COMPETITION',  'desc' => 'Designed for regional tournament competitors. Tactics, endurance, and mental toughness under pressure.', 'icon' => '🎯'],
                    ['title' => 'COACHES',      'desc' => 'Certification programs using the BRESSEL methodology. Become the next generation of padel excellence instructors.', 'icon' => '👨‍🏫'],
                ];
                foreach ($pillars as $pillar) : ?>
                    <article class="pillar-card group relative p-8 rounded-xl border border-zinc-800 hover:border-zinc-600 hover:bg-zinc-900/50 transition-all duration-500 cursor-pointer text-center" data-animate>
                        <!-- Icon -->
                        <div class="text-5xl mb-6"><?= esc_html($pillar['icon']) ?></div>
                        <!-- Content -->
                        <div>
                            <h3 class="text-2xl md:text-3xl font-black uppercase italic mb-4">
                                <?= esc_html($pillar['title']) ?>
                            </h3>
                            <p class="text-zinc-400 text-sm leading-relaxed max-w-xs mx-auto mb-6">
                                <?= esc_html($pillar['desc']) ?>
                            </p>
                            <a href="<?= esc_url(home_url('/contact/?intent=inquiry&source=' . strtolower($pillar['title']))) ?>"
                               class="inline-flex items-center gap-2 text-[var(--color-bressel-red)] font-black uppercase tracking-widest text-xs hover:text-white transition-colors">
                                INQUIRE NOW
                                <svg class="w-3 h-3 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         5. QUOTE CAROUSEL — Full-width dark pull quote with carousel
    ═══════════════════════════════════════ -->
    <?php get_template_part('components/quote-carousel'); ?>


    <!-- ═══════════════════════════════════════
         6. BRESSEL ACADEMY
         Left: title + pricing + locations. Right: court image grid
    ═══════════════════════════════════════ -->
    <section id="centers" class="section-padding bg-black">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">

                <!-- Left: info -->
                <div data-animate>
                    <div class="accent-bar"></div>
                    <h2 class="mb-8">BRESSEL ACADEMY</h2>
                    <p class="text-zinc-400 mb-8 max-w-sm">
                        From Malaysia to Philippines, our state-of-the-art facilities offer the signature Kinetic Blue experience with precision climate control.
                    </p>

                    <!-- Pricing cards -->
                    <div class="grid grid-cols-2 gap-4 mb-10">
                        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-5">
                            <p class="text-zinc-500 text-xs uppercase tracking-widest mb-2">GROUP</p>
                            <p class="text-2xl font-black text-white mb-1">RM 150<span class="text-sm font-normal text-zinc-500">/session</span></p>
                            <p class="text-zinc-600 text-xs">4-6 players</p>
                        </div>
                        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-5">
                            <p class="text-zinc-500 text-xs uppercase tracking-widest mb-2">PRIVATE</p>
                            <p class="text-2xl font-black text-white mb-1">RM 250<span class="text-sm font-normal text-zinc-500">/session</span></p>
                            <p class="text-zinc-600 text-xs">1-on-1 coaching</p>
                        </div>
                    </div>
                    <a href="#" class="inline-flex items-center gap-3 mb-10 px-6 py-3 border border-zinc-700 text-zinc-300 hover:border-white hover:text-white transition-all text-xs font-bold uppercase tracking-widest rounded">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        DOWNLOAD FULL PRICING (PDF)
                    </a>

                    <!-- Location list -->
                    <div class="space-y-0 divide-y divide-zinc-900">
                        <?php
                        $locations = ['MALAYSIA', 'PHILIPPINES', 'SINGAPORE'];
                        foreach ($locations as $loc) : ?>
                            <div class="flex items-center justify-between py-5 group cursor-pointer">
                                <span class="font-black uppercase italic tracking-wide text-xl md:text-2xl text-zinc-300 group-hover:text-white transition-colors">
                                    <?= esc_html($loc) ?>
                                </span>
                                <svg class="w-5 h-5 text-[var(--color-bressel-red)] transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Right: image grid (3 courts) -->
                <div class="grid grid-cols-2 gap-3" data-animate>
                    <div class="col-span-2 bg-zinc-800 rounded-xl flex items-center justify-center aspect-video">
                        <svg class="w-16 h-16 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                    <div class="bg-zinc-800 rounded-xl flex items-center justify-center aspect-square">
                        <svg class="w-12 h-12 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                    <div class="bg-zinc-800 rounded-xl flex items-center justify-center aspect-square">
                        <svg class="w-12 h-12 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         TICKER #2 — Same bar, repeated
    ═══════════════════════════════════════ -->
    <div class="news-ticker border-y border-zinc-800 bg-zinc-950 overflow-hidden py-3">
        <div class="ticker-track flex gap-0 whitespace-nowrap">
            <?php foreach ($ticker_items as $item) : ?>
                <span class="ticker-item inline-flex items-center gap-3 px-8 text-xs font-bold uppercase tracking-widest">
                    <span class="<?= !empty($item['accent']) ? 'text-[var(--color-bressel-red)]' : 'text-zinc-600' ?>">
                        <?= esc_html($item['label']) ?>
                    </span>
                    <span class="text-zinc-300"><?= esc_html($item['text']) ?></span>
                    <span class="text-zinc-700 mx-2">—</span>
                </span>
            <?php endforeach; ?>
        </div>
    </div>


    <!-- ═══════════════════════════════════════
         7. SHOP
         Ghost "BRESSEL PRO" watermark, 2 product cards
    ═══════════════════════════════════════ -->
    <section id="shop" class="section-padding bg-black relative overflow-hidden">

        <!-- Ghost watermark -->
        <div class="watermark-text absolute right-0 top-1/2 -translate-y-1/2 select-none pointer-events-none z-0 leading-none">
            BRESSEL PRO
        </div>

        <div class="container-custom relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-baseline mb-12 gap-4" data-animate>
                <div>
                    <p class="text-zinc-600 text-xs uppercase tracking-widest mb-3">Engineered for communities and beyond.</p>
                    <h2>SHOP</h2>
                </div>
                <a href="<?= esc_url(get_post_type_archive_link('merch')) ?>"
                   class="shop-all-link inline-flex items-center gap-2 px-6 py-3 border border-zinc-700 text-zinc-300 hover:border-white hover:text-white transition-all text-xs font-bold uppercase tracking-widest rounded">
                    VISIT CATALOG
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php
                $merch_query = new WP_Query([
                    'post_type'      => 'merch',
                    'posts_per_page' => 2,
                ]);

                // Fallback product data if no merch posts yet
                $fallback_products = [
                    [
                        'name'    => 'BRESSEL PADEL-X',
                        'series'  => 'FLAGSHIP SERIES',
                        'price'   => 'RM160.00',
                        'bg'      => 'product-bg-teal',
                        'url'     => home_url('/contact/?intent=purchase&target=Bressel+Padel-X'),
                    ],
                    [
                        'name'    => 'KINETIC GRIP-V1',
                        'series'  => '',
                        'price'   => 'RM159.00',
                        'bg'      => '',
                        'url'     => home_url('/contact/?intent=purchase&target=Kinetic+Grip-V1'),
                    ],
                ];

                if ($merch_query->have_posts()) :
                    $i = 0;
                    while ($merch_query->have_posts()) : $merch_query->the_post();
                        $price    = get_post_meta(get_the_ID(), '_bressel_merch_price', true) ?: '—';
                        $img_url  = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: ($assets_base . ($i === 0 ? 'placeholder-product.svg' : 'placeholder-card.svg'));
                        $fb       = $fallback_products[$i] ?? $fallback_products[0];
                ?>
                    <article class="product-card <?= $i === 0 ? 'product-bg-teal' : '' ?> rounded-xl overflow-hidden border border-zinc-800 hover:border-zinc-600 transition-colors">
                        <div class="relative h-64 md:h-72 bg-zinc-900 flex items-center justify-center overflow-hidden">
                            <svg class="w-20 h-20 text-zinc-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 19l-7-7 7-7m0 14l7-7-7-7"/></svg>
                        </div>
                        <div class="p-6">
                            <p class="text-[var(--color-bressel-red)] text-[10px] font-bold uppercase tracking-widest mb-1"><?= esc_html($fb['series']) ?></p>
                            <h3 class="text-xl md:text-2xl font-black uppercase italic mb-3"><?= esc_html(get_the_title()) ?></h3>
                            <div class="text-zinc-400 text-sm mb-5 line-clamp-2"><?php the_excerpt(); ?></div>
                            <div class="flex items-center justify-between">
                                <span class="text-white font-bold text-lg">RM<?= esc_html($price) ?></span>
                                <a href="<?= esc_url(home_url('/contact/?intent=purchase&target=' . urlencode(get_the_title()))) ?>"
                                   class="btn-solid-sm btn-ripple px-5 py-2 text-xs font-black uppercase tracking-widest">
                                    INQUIRE
                                </a>
                            </div>
                        </div>
                    </article>
                <?php
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                else :
                    foreach ($fallback_products as $i => $p) : ?>
                        <article class="product-card <?= esc_attr($p['bg']) ?> rounded-xl overflow-hidden border border-zinc-800">
                            <div class="relative h-64 md:h-72 bg-zinc-900 flex items-center justify-center overflow-hidden">
                                <svg class="w-20 h-20 text-zinc-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 19l-7-7 7-7m0 14l7-7-7-7"/></svg>
                            </div>
                            <div class="p-6">
                                <?php if ($p['series']) : ?>
                                    <p class="text-[var(--color-bressel-red)] text-[10px] font-bold uppercase tracking-widest mb-1"><?= esc_html($p['series']) ?></p>
                                <?php endif; ?>
                                <h3 class="text-xl md:text-2xl font-black uppercase italic mb-3"><?= esc_html($p['name']) ?></h3>
                                <div class="flex items-center justify-between mt-4">
                                    <span class="text-white font-bold text-lg"><?= esc_html($p['price']) ?></span>
                                    <a href="<?= esc_url($p['url']) ?>"
                                       class="btn-solid-sm btn-ripple px-5 py-2 text-xs font-black uppercase tracking-widest">
                                        INQUIRE
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach;
                endif; ?>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         8. CTA / NEWSLETTER
         Warm gradient bg, "JOIN THE MOVEMENT."
         email input + SUBSCRIBE
    ═══════════════════════════════════════ -->
    <section id="newsletter" class="cta-newsletter relative overflow-hidden">

        <!-- Warm gradient background (dark → red/brown like mockup) -->
        <div class="cta-bg absolute inset-0 z-0"></div>

        <!-- Subtle BG image overlay -->
        <div class="absolute inset-0 z-[1]">
            <img src="<?= esc_url($assets_base . 'cta-bg-overlay.jpg') ?>"
                 alt="" class="w-full h-full object-cover opacity-30" aria-hidden="true" />
        </div>

        <div class="relative z-10 section-padding">
            <div class="container-custom text-center max-w-3xl mx-auto">

                <h2 class="text-5xl md:text-7xl lg:text-[clamp(5rem,12vw,12rem)] mb-6" data-animate>
                    JOIN THE <span class="text-[var(--color-bressel-red)]">MOVEMENT.</span>
                </h2>

                <p class="text-zinc-300 text-base md:text-lg mb-10 max-w-xl mx-auto" data-animate>
                    Be part of the fastest growing precision sports community in Asia.
                    Gain first access to limited gear drops, tournament invites, and tactical breakdowns.
                </p>

                <!-- Email form (Fluent Forms or fallback) -->
                <div class="newsletter-form max-w-lg mx-auto" data-animate>
                    <?php if (function_exists('fluent_form')) : ?>
                        <?= do_shortcode('[fluentform id="2"]') ?>
                    <?php else : ?>
                        <form class="flex flex-col sm:flex-row gap-3" action="#" method="post">
                            <input type="email" name="email" required
                                   placeholder="ENTER EMAIL ADDRESS"
                                   class="flex-grow px-6 py-4 bg-transparent border border-zinc-600 text-white placeholder-zinc-500 text-xs font-bold uppercase tracking-widest focus:outline-none focus:border-white transition-colors rounded-none" />
                            <button type="submit"
                                    class="btn-solid btn-ripple px-8 py-4 text-xs font-black uppercase tracking-widest inline-flex items-center gap-3 whitespace-nowrap justify-center">
                                SUBSCRIBE
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2zm7 4l-1.4 1.4L14.2 12l-3.6 3.6L12 17l5-5-5-5z"/></svg>
                            </button>
                        </form>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
