<?php

/**
 * Title: Front Page Template
 * Description: Homepage — styled to match homepage_50pct.jpg mockup.
 * Sections: Hero → About → Ticker → Program Pillars → Quote → Centers → Ticker → Shop → CTA/Newsletter → Footer
 */

get_header();

$assets_base = get_stylesheet_directory_uri() . '/assets/';
?>

<main class="page-dark">

    <!-- ═══════════════════════════════════════
         1. HERO
         Full-screen dark photo, EST. tagline,
         two-line headline, body, dual CTAs
    ═══════════════════════════════════════ -->
    <section id="hero" class="hero-section relative flex-col justify-end pb-24 md:pb-32" data-parallax>

        <!-- Static fallback background (shown if video fails to load) -->
        <div class="absolute inset-0 z-0">
            <img src="<?= esc_url($assets_base . 'hero-bg.jpg') ?>"
                alt=""
                class="hero-bg-image select-none pointer-events-none"
                aria-hidden="true"
                style="<?php if (!file_exists(get_stylesheet_directory() . '/assets/background-video.mp4')): ?>display:block;<?php else: ?>display:none;<?php endif; ?>"
                id="hero-fallback-bg" />
        </div>

        <!-- BG Video (with poster fallback) -->
        <video data-parallax-target
            autoplay loop muted playsinline
            poster="<?= esc_url($assets_base . 'cta-bg-overlay.jpg') ?>"
            class="hero-bg-video select-none pointer-events-none" <?php if (!file_exists(get_stylesheet_directory() . '/assets/background-video.mp4')): ?> onload="this.style.display='none'; document.getElementById('hero-fallback-bg').style.display='block';" onerror="this.style.display='none'; document.getElementById('hero-fallback-bg').style.display='block';" <?php endif; ?>>
            <source src="<?= esc_url($assets_base . 'background-video.mp4') ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Dark overlay: heavier at bottom so text pops -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/40 to-black/80 z-10"></div>

        <!-- Content — lower-left, rule of thirds -->
        <div class="relative z-20 hero-content-inner container mx-auto">

            <!-- BEYOND wordmark: large decorative background -->
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none select-none" style="z-index: 5;">
                <img src="<?= esc_url($assets_base . 'brand/beyond.svg') ?>"
                    alt="BEYOND"
                    class="w-[80vw] md:w-[60vw] lg:w-[45vw] opacity-[0.04]" />
            </div>

            <!-- EST / tagline line -->
            <div class="hero-tagline mb-4">
                <span class="block w-8 h-0.5 bg-[var(--color-bressel-red)]"></span>
                <span class="text-[var(--color-bressel-red)] uppercase text-xs">PLAY BEYOND</span>
                <span class="block w-8 h-0.5 bg-[var(--color-bressel-red)]"></span>
            </div>

            <!-- Main headline -->
            <h1 class="hero-headline mb-3 max-w-4xl">
                WORLD-CLASS PADEL,<br>
                <span class="text-[var(--color-bressel-red)]">WITHIN REACH.</span>
            </h1>

            <!-- Surge accent bar under headline -->
            <div class="surge-accent mb-6" style="width: clamp(4rem, 12vw, 8rem);"></div>

            <!-- Body copy -->
            <p class="hero-body text-zinc-300 max-w-xl mb-10 leading-relaxed">
                Unlock your potential with elite coaching modules,<br class="hidden md:block">
                community integration, and the precision of BRESSEL™ PRO equipment.
            </p>

            <!-- CTAs -->
            <div class="hero-ctas sm:flex-row">
                <a href="<?= esc_url(home_url('/contact/?intent=booking')) ?>"
                    class="btn-cta btn-md ripple hidden md:inline-flex">
                    BOOK SESSION
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2zm7 4l-1.4 1.4L14.2 12l-3.6 3.6L12 17l5-5-5-5z" />
                    </svg>
                </a>
                <a href="#programs"
                    class="btn-outline btn-md ripple hidden md:inline-flex">
                    EXPLORE PROGRAMMES
                </a>
            </div>
        </div>

        <!-- Scroll hint -->
        <div class="scroll-hint absolute bottom-8 left-half translate-half z-20">
            <span class="text-[9px] uppercase tracking-[0.3em] text-white">Scroll</span>
            <div class="w-0.5 h-8 bg-white animate-pulse"></div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         2. ABOUT — Coach + Academy + Community
    ═══════════════════════════════════════ -->
    <section id="about" class="section-padding page-dark">
        <div class="container-custom">
            <div class="about-grid md:grid-cols-2 items-center">

                <!-- Malaysia National Coach — hero card -->
                <div class="about-card about-card--coach aspect-[3/2] md:aspect-[3/4]" data-animate>
                    <img src="<?= esc_url($assets_base . 'team/teams_photos--Sequence 0103.webp') ?>"
                        alt="BRESSEL Malaysia National Coach"
                        class="about-card-img about-card-img--coach" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-black/10"></div>
                    <div class="about-card-content about-card-content--coach">
                        <span class="about-card-badge">MALAYSIA NATIONAL COACH</span>
                        <h3 class="about-card-title">MEET YOUR COACH</h3>
                        <p class="about-card-desc">
                            Led by our national coaching lead — world-class technique, proven tournament pedigree, and a commitment to elevating every player's potential.
                        </p>
                        <a href="<?= esc_url(home_url('/contact/?intent=booking')) ?>"
                            class="inline-flex items-center gap-2 no-underline text-white font-bold uppercase tracking-widest text-xs !text-white hover:text-[var(--color-bressel-red)] transition-colors group/link">
                            BOOK A SESSION
                            <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Academy card -->
                <div class="about-card" data-animate>
                    <img src="<?= esc_url($assets_base . 'academy-card.jpg') ?>"
                        alt="BRESSEL Academy"
                        class="about-card-img" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-black/10"></div>
                    <div class="about-card-content">
                        <h3 class="about-card-title">ACADEMY</h3>
                        <p class="about-card-desc">
                            Master the technical precision of the pros. Our elite-level training modules focus on footwork, court positioning, and explosive agility.
                        </p>
                        <a href="<?= esc_url(get_post_type_archive_link('coach')) ?>"
                            class="inline-flex items-center gap-2 no-underline text-white font-bold uppercase tracking-widest text-xs !text-white hover:text-[var(--color-bressel-red)] transition-colors group/link">
                            EXPLORE PROGRAMS
                            <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Community card -->
                <div class="about-card" data-animate>
                    <img src="<?= esc_url($assets_base . 'community-card.jpg') ?>"
                        alt="BRESSEL Community"
                        class="about-card-img" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-black/10"></div>
                    <div class="about-card-content">
                        <h3 class="about-card-title">COMMUNITY</h3>
                        <p class="about-card-desc">
                            Connect with players who match your intensity. Join local ladders, enter international tournaments, and rank up.
                        </p>
                        <a href="<?= esc_url(home_url('/contact/')) ?>"
                            class="inline-flex items-center gap-2 no-underline text-white font-bold uppercase tracking-widest text-xs !text-white hover:text-[var(--color-bressel-red)] transition-colors group/link">
                            FIND A COURT
                            <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         3. TICKER — Scrolling news bar
    ═══════════════════════════════════════ -->
    <div class="news-ticker">
        <div class="ticker-track">
            <?php
            $ticker_items = [
                ['label' => 'UPCOMING', 'text' => 'MALAYSIA OPEN QUALIFIERS'],
                ['label' => 'EVENT',    'text' => 'BRESSEL JUNIOR PADEL CIRCUIT', 'accent' => true],
                ['label' => 'LIVE',     'text' => 'ACADEMY RANKING UPDATES'],
                ['label' => 'NEW DROP', 'text' => 'PRECISION SERIES V2'],
            ];
            // Duplicate items for infinite scroll (animation moves -50%)
            for ($i = 0; $i < 2; $i++) :
                foreach ($ticker_items as $item) : ?>
                    <span class="ticker-item">
                        <span class="ticker-label">
                            <?= esc_html($item['label']) ?>
                        </span>
                        <span class="ticker-text"><?= esc_html($item['text']) ?></span>
                        <span class="ticker-separator w-4 h-px bg-zinc-700"></span>
                    </span>
            <?php endforeach;
            endfor; ?>
        </div>
    </div>


    <!-- ═══════════════════════════════════════
         4. PROGRAM PILLARS
         Ghost "ACADEMY" watermark, 3 image cards
    ═══════════════════════════════════════ -->
    <section id="programs" class="section-padding page-dark relative overflow-hidden">

        <!-- Ghost watermark -->
        <div class="watermark-text absolute right-0 top-1/2 -translate-y-1/2 select-none pointer-events-none z-0 leading-none">
            ACADEMY
        </div>

        <div class="container-custom relative z-10">
            <div class="programs-header mb-12" data-animate>
                <p class="section-subtitle">Engineered for community excellence.</p>
                <h2 class="section-title lg:text-7xl">PROGRAM PILLARS</h2>
            </div>

            <div class="pillar-grid md:grid-cols-3">
                <?php
                $pillars = [
                    [
                        'title' => 'PROFESSIONAL',
                        'desc'  => 'World-class training using BRESSEL methodology. Racket mechanics, shot precision, and match-level IQ.',
                        'img'   => $assets_base . 'academy-card.jpg',
                        'alt'   => 'Professional padel training',
                        'url'   => home_url('/contact/?intent=inquiry&source=professional'),
                    ],
                    [
                        'title' => 'COMPETITION',
                        'desc'  => 'Designed for regional tournament competitors. Tactics, endurance, and mental toughness under pressure.',
                        'img'   => $assets_base . 'quote-bg-silhouette.jpg',
                        'alt'   => 'Competition tournament',
                        'url'   => home_url('/contact/?intent=inquiry&source=competition'),
                    ],
                    [
                        'title' => 'COACHES',
                        'desc'  => 'Certification programs using the BRESSEL methodology. Become the next generation of padel excellence instructors.',
                        'img'   => $assets_base . 'community-card.jpg',
                        'alt'   => 'Coach certification program',
                        'url'   => home_url('/contact/?intent=inquiry&source=coaches'),
                    ],
                ];
                foreach ($pillars as $i => $pillar) : ?>
                    <article class="pillar-card relative" data-animate>
                        <img src="<?= esc_url($pillar['img']) ?>"
                            alt="<?= esc_attr($pillar['alt']) ?>"
                            class="pillar-card-img" />

                        <!-- Dark gradient overlay (bottom-heavy for text readability) -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-black/20"></div>

                        <!-- Noise texture overlay -->
                        <div class="absolute inset-0 opacity-[0.06] mix-blend-overlay pointer-events-none" style="background-image: url('<?= esc_url($assets_base . 'textures/noise--.png') ?>'); background-size: 256px 256px; background-repeat: repeat;"></div>

                        <!-- Surge accent bar (bottom) -->
                        <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-[var(--color-bressel-red)] opacity-40"></div>

                        <!-- Red accent bar (top) -->
                        <div class="absolute top-0 left-0 right-0 h-1 bg-[var(--color-bressel-red)] scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>

                        <!-- Content overlay -->
                        <div class="pillar-card-content">
                            <img src="<?= esc_url($assets_base . 'favicon.svg') ?>"
                                alt=""
                                class="w-5 h-5 mb-3" />

                            <h3 class="pillar-card-title !text-white">
                                <?= esc_html($pillar['title']) ?>
                            </h3>
                            <p class="pillar-card-desc !text-white">
                                <?= esc_html($pillar['desc']) ?>
                            </p>
                            <a href="<?= esc_url($pillar['url']) ?>"
                                class="pillar-card-link !text-white hidden">
                                INQUIRE NOW
                                <svg class="w-3 h-3 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
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
    <section id="academy" class="section-padding page-dark texture-dark">
        <div class="container-custom">
            <div class="centers-grid lg:grid-cols-2">

                <!-- Left: info -->
                <div data-animate>
                    <div class="accent-bar"></div>
                    <h2 class="mb-8">BRESSEL ACADEMY</h2>
                    <p class="centers-desc max-w-sm">
                        From Malaysia to Philippines, our state-of-the-art facilities offer the signature Kinetic Blue experience with precision climate control.
                    </p>

                    <!-- Pricing cards -->
                    <div class="pricing-grid mb-10">
                        <div class="pricing-card">
                            <p class="pricing-label">GROUP</p>
                            <p class="pricing-amount">RM 150<span>/session</span></p>
                            <p class="pricing-detail">4-6 players</p>
                        </div>
                        <div class="pricing-card">
                            <p class="pricing-label">PRIVATE</p>
                            <p class="pricing-amount">RM 250<span>/session</span></p>
                            <p class="pricing-detail">1-on-1 coaching</p>
                        </div>
                    </div>
                    <a href="<?= esc_url(get_stylesheet_directory_uri() . '/assets/price-list.pdf') ?>" class="pricing-download btn-cta">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        DOWNLOAD FULL PRICING (PDF)
                    </a>

                    <!-- Location list -->
                    <div class="location-list">
                        <?php
                        $locations = ['MALAYSIA', 'PHILIPPINES', 'SINGAPORE'];
                        foreach ($locations as $loc) : ?>
                            <div class="location-item">
                                <span class="location-name">
                                    <?= esc_html($loc) ?>
                                </span>
                                <svg class="w-5 h-5 text-[var(--color-bressel-red)] transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Right: image grid (3 courts) — B&W toned court photography -->
                <div class="centers-images" data-animate>
                    <div class="center-img-wrapper">
                        <img src="<?= esc_url($assets_base . '20260227_195629.webp') ?>" alt="BRESSEL Court" class="center-img" />
                    </div>
                    <div class="center-img-wrapper">
                        <img src="<?= esc_url($assets_base . '20260402_115248.webp') ?>" alt="BRESSEL Court" class="center-img" />
                    </div>
                    <div class="center-img-wrapper">
                        <img src="<?= esc_url($assets_base . '20260402_120037.webp') ?>" alt="BRESSEL Court" class="center-img" />
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         TICKER #2 — Same bar, repeated
    ═══════════════════════════════════════ -->
    <div class="news-ticker border-y border-zinc-800 bg-zinc-950 overflow-hidden py-3">
        <div class="ticker-track flex flex-nowrap gap-0 whitespace-nowrap">
            <?php
            // Duplicate items for infinite scroll (animation moves -50%)
            for ($i = 0; $i < 2; $i++) :
                foreach ($ticker_items as $item) : ?>
                    <span class="ticker-item inline-flex items-center gap-3 px-6 text-xs font-bold uppercase tracking-widest">
                        <span class="<?= !empty($item['accent']) ? 'text-[var(--color-bressel-red)]' : 'text-zinc-600' ?>">
                            <?= esc_html($item['label']) ?>
                        </span>
                        <span class="text-zinc-300"><?= esc_html($item['text']) ?></span>
                        <span class="ticker-separator w-4 h-px bg-zinc-700"></span>
                    </span>
            <?php endforeach;
            endfor; ?>
        </div>
    </div>


    <!-- ═══════════════════════════════════════
         7. SHOP
         Ghost "BRESSEL PRO" watermark, 2 product cards
    ═══════════════════════════════════════ -->
    <section id="shop" class="section-padding bg-black relative overflow-hidden noise-overlay texture-dark">

        <!-- Ghost watermark -->
        <div class="watermark-text absolute right-0 top-1/2 -translate-y-1/2 select-none pointer-events-none z-0 leading-none">
            BRESSEL PRO
        </div>

        <div class="container-custom relative z-10">
            <div class="shop-header mb-12 gap-4" data-animate>
                <div>
                    <p class="text-zinc-600 text-xs uppercase tracking-widest mb-3">Engineered for communities and beyond.</p>
                    <h2>SHOP</h2>
                </div>
                <div>
                    <a href="<?= esc_url(get_post_type_archive_link('merch')) ?>"
                    class="shop-all-link btn-cta">
                    VISIT CATALOG
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                </div>
            </div>

            <div class="shop-grid md:grid-cols-2 md:grid-flow-dense">
                <?php
                $merch_query = new WP_Query([
                    'post_type'      => 'merch',
                    'posts_per_page' => 2,
                ]);

                // Fallback product data if no merch posts yet
                $fallback_products = [
                    [
                        'name'    => 'BRESSSEL APEX PRO',
                        'series'  => 'FLAGSHIP SERIES',
                        'price'   => 'RM1,650.00',
                        'img'     => $assets_base . 'products/bressel-rackets.jpg',
                        'url'     => home_url('/contact/?intent=purchase&target=Bressel+Apex+Pro'),
                        'desc'    => 'Engineered for maximum power output and vibration dampening.',
                    ],
                    [
                        'name'    => 'KINETIC GRIP-V1',
                        'series'  => 'FOOTWEAR',
                        'price'   => 'RM389.00',
                        'img'     => $assets_base . 'products/lifestyle-shot.jpg',
                        'url'     => home_url('/contact/?intent=purchase&target=Kinetic+Grip+V1'),
                        'desc'    => 'Lateral stability on synthetic turf.',
                    ],
                    [
                        'name'    => 'ELITE TOUR BAG',
                        'series'  => 'ACCESSORIES',
                        'price'   => 'RM520.00',
                        'img'     => $assets_base . 'products/black-tote-bag.jpg',
                        'url'     => home_url('/contact/?intent=purchase&target=Elite+Tour+Bag'),
                        'desc'    => 'Thermal lining for 3 rackets + apparel storage.',
                    ],
                    [
                        'name'    => 'COMPRESSION PRO TEE',
                        'series'  => 'APPAREL',
                        'price'   => 'RM185.00',
                        'img'     => $assets_base . 'products/t-shirt-beyond.jpg',
                        'url'     => home_url('/contact/?intent=purchase&target=Compression+Pro+Tee'),
                        'desc'    => 'Breathable micro-mesh technology.',
                    ],
                ];

                if ($merch_query->have_posts()) :
                    $i = 0;
                    while ($merch_query->have_posts()) : $merch_query->the_post();
                        $price    = get_post_meta(get_the_ID(), '_bressel_merch_price', true) ?: '—';
                        $img_url  = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        $fb       = $fallback_products[$i] ?? $fallback_products[0];
                        if (empty($img_url)) $img_url = $fb['img'];
                ?>
                        <article class="product-card">
                            <div class="product-card-image">
                                <img src="<?= esc_url($img_url) ?>" alt="<?= esc_attr(get_the_title()) ?>" class="product-card-img" />
                            </div>
                            <div class="product-card-body">
                                <p class="text-[var(--color-bressel-red)] text-[10px] font-bold uppercase tracking-widest mb-1"><?= esc_html($fb['series']) ?></p>
                                <h3 class="text-xl md:text-2xl font-black uppercase italic mb-3"><?= esc_html(get_the_title()) ?></h3>
                                <div class="product-card-desc line-clamp-2"><?php the_excerpt(); ?></div>
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
                        <article class="product-card <?= $i === 0 ? 'product-card-hero' : '' ?>">
                            <div class="product-card-image">
                                <img src="<?= esc_url($p['img']) ?>" alt="<?= esc_attr($p['name']) ?>" class="product-card-img" />
                            </div>
                            <div class="product-card-body">
                                <?php if ($p['series']) : ?>
                                    <p class="product-card-series"><?= esc_html($p['series']) ?></p>
                                <?php endif; ?>
                                <h3 class="product-card-name"><?= esc_html($p['name']) ?></h3>
                                <?php if (!empty($p['desc'])) : ?>
                                    <p class="product-card-desc"><?= esc_html($p['desc']) ?></p>
                                <?php endif; ?>
                                <div class="flex items-center justify-between mt-4">
                                    <span class="product-card-price"><?= esc_html($p['price']) ?></span>
                                    <a href="<?= esc_url($p['url']) ?>"
                                        class="btn-solid-sm btn-ripple">
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
         8. EQUIP YOUR CLUB — B2B CTA
         Bold headline + BULK INQUIRY button
    ═══════════════════════════════════════ -->
    <!-- <section class="section-padding page-dark relative noise-overlay texture-dark overflow-hidden" id="equip-club">
        <div class="container-custom text-center">

            <div class="beyond-watermark text-[12rem] md:text-[20rem] lg:text-[28rem] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 select-none pointer-events-none">
                BEYOND
            </div>

            <div class="relative z-10">
                <h2 class="section-title-lg text-center mb-4">
                    EQUIP YOUR <span class="text-[var(--color-bressel-red)]">CLUB</span>
                </h2>
                <p class="text-zinc-400 max-w-xl mx-auto mb-8">
                    Custom bulk orders for pro-shops, academies, and tournament organizers.
                    Access tiered pricing and personalized branding.
                </p>
                <a href="<?= esc_url(home_url('/contact/?intent=bulk-inquiry')) ?>"
                    class="btn-solid btn-ripple inline-flex items-center gap-3">
                    BULK INQUIRY PORTAL
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2zm7 4l-1.4 1.4L14.2 12l-3.6 3.6L12 17l5-5-5-5z" />
                    </svg>
                </a>
            </div>
        </div>
    </section> -->


    <!-- ═══════════════════════════════════════
         9. CTA / NEWSLETTER
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

                <h2 class="newsletter-title lg:text-9xl" data-animate>
                    JOIN THE <span class="text-[var(--color-bressel-red)]">MOVEMENT.</span>
                </h2>

                <p class="newsletter-desc" data-animate>
                    Be part of the fastest growing precision sports community in Asia.
                    Gain first access to limited gear drops, tournament invites, and tactical breakdowns.
                </p>

                <!-- Email form (Fluent Forms or fallback) -->
                <div class="newsletter-form" data-animate>
                    <?php if (function_exists('fluent_form')) : ?>
                        <?= do_shortcode('[fluentform id="2"]') ?>
                    <?php else : ?>
                        <form class="newsletter-form-row" action="#" method="post">
                            <input type="email" name="email" required
                                placeholder="ENTER EMAIL ADDRESS"
                                class="newsletter-input" />
                            <button type="submit"
                                class="btn-solid btn-cta">
                                SUBSCRIBE
                            </button>
                        </form>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>