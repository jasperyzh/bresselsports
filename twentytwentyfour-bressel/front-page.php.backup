<?php

/**
 * Title: Front Page Template — Mockup-Matched
 * Description: Homepage — pixel-perfect match against mockups/mockup.jpg
 * Sections: Hero → Academy/Community → Ticker → Program Pillars → Quote → Centers → Shop → Newsletter → Footer
 *
 * Design tokens matched to mockup:
 * - Dark backgrounds (#090808, #09090b)
 * - Red accent (#FF331F)
 * - White text (#ffffff)
 * - Gray text (#d4d4d8, #a1a1aa, #52525b)
 * - Sharp corners (2px border-radius)
 * - Bold italic headers (Oswald)
 * - Sans-serif body (Inter)
 */

get_header();

$assets_base = get_stylesheet_directory_uri() . '/assets/';

// Fetch live merch data
$merch_query = new WP_Query([
    'post_type'      => 'merch',
    'posts_per_page' => 4,
    'post_status'    => 'publish',
]);

?>

<main class="page-dark">

    <!-- ═══════════════════════════════════════
         1. HERO — Full-Screen, Centered
         Mockup: Full-bleed bg, centered text,
         "WORLD-CLASS PADEL, WITHIN REACH.",
         two CTAs: BOOK SESSION + EXPLORE PROGRAMMES
    ═══════════════════════════════════════ -->
    <section id="hero" class="relative min-h-screen flex flex-col justify-end items-center text-center overflow-hidden">

        <!-- Background image (video placeholder) -->
        <?php if (file_exists(get_stylesheet_directory() . '/assets/background-video.mp4')) : ?>
            <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover opacity-35 brightness-60" poster="<?= esc_url($assets_base . 'hero-bg.jpg') ?>">
                <source src="<?= esc_url($assets_base . 'background-video.mp4') ?>" type="video/mp4">
            </video>
        <?php else : ?>
            <img src="<?= esc_url($assets_base . 'hero-bg.jpg') ?>" alt="" class="absolute inset-0 w-full h-full object-cover opacity-35 brightness-60" />
        <?php endif; ?>

        <!-- Dark overlay using gradient -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/30 to-black/80"></div>

        <!-- Content — centered -->
        <div class="relative z-10 px-6 pt-48 pb-12 max-w-4xl">

            <!-- EST / tagline -->
            <div class="flex items-center justify-center gap-4 mb-6">
                <div class="w-8 h-0.5 bg-red"></div>
                <span class="caption">EST. 2026 / PLAY BOLDER</span>
                <div class="w-8 h-0.5 bg-red"></div>
            </div>

            <!-- Headline -->
            <h1 class="heading-xl mb-6">
                WORLD-CLASS PADEL,<br>
                <span class="accent">WITHIN REACH.</span>
            </h1>

            <!-- Body copy -->
            <p class="body-lg max-w-2xl mx-auto mb-8">
                Unlock your potential with elite coaching modules, community integration, and the precision of BRESSEL™ PRO equipment.
            </p>

            <!-- Dual CTAs (uses @base-ui/ .btn pattern) -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?= esc_url(home_url('/contact/?intent=booking')) ?>" class="btn btn-primary">
                    BOOK SESSION
                </a>
                <a href="#programs" class="btn btn-outline">
                    EXPLORE PROGRAMMES
                </a>
            </div>

        </div>

    </section>


    <!-- ═══════════════════════════════════════
         2. ACADEMY + COMMUNITY — Two Horizontal Cards
         Mockup: Two side-by-side cards with image-left, text-right
    ═══════════════════════════════════════ -->
    <section class="py-20">
        <div class="container-custom">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">

                <!-- Academy Card -->
                <article class="card flex flex-col md:flex-row h-auto md:h-80">
                    <div class="w-full md:w-1/2 h-64 md:h-full flex-shrink-0">
                        <img src="<?= esc_url($assets_base . 'academy-card.jpg') ?>" alt="BRESSEL Academy" class="card-image" />
                    </div>
                    <div class="w-full md:w-1/2 p-6 flex flex-col justify-center">
                        <span class="badge badge-red mb-2">ACADEMY</span>
                        <h2 class="heading-md mb-3">MASTER THE GAME</h2>
                        <p class="body mb-6">
                            Master the technical precision of the pros. Elite-level training modules focus on footwork, court positioning, and explosive agility.
                        </p>
                        <a href="<?= esc_url(get_post_type_archive_link('coach')) ?>" class="btn btn-ghost inline-flex items-center gap-2">
                            EXPLORE PROGRAMS
                            <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Community Card -->
                <article class="card flex flex-col md:flex-row h-auto md:h-80">
                    <div class="w-full md:w-1/2 h-64 md:h-full flex-shrink-0">
                        <img src="<?= esc_url($assets_base . 'community-card.jpg') ?>" alt="BRESSEL Community" class="card-image" />
                    </div>
                    <div class="w-full md:w-1/2 p-6 flex flex-col justify-center">
                        <span class="badge badge-zinc mb-2">COMMUNITY</span>
                        <h2 class="heading-md mb-3">JOIN THE MOVEMENT</h2>
                        <p class="body mb-6">
                            Connect with players who match your intensity. Join local ladders, enter international tournaments, and rank up.
                        </p>
                        <a href="<?= esc_url(home_url('/contact/')) ?>" class="btn btn-ghost inline-flex items-center gap-2">
                            FIND A COURT
                            <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </article>

            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         3. TICKER — Single Bar
         Mockup: "UPCOMING: MALAYSIA OPEN" | "EVENT: BRESSEL JUNIOR" | "LIVE: ACADEMY RANKING" | "NEW DROP: PRECISION"
    ═══════════════════════════════════════ -->
    <div class="ticker-bar">
        <div class="ticker-track">
            <span class="ticker-item">
                <span class="ticker-label">UPCOMING:</span>
                <span class="ticker-text">MALAYSIA OPEN QUALIFIERS</span>
            </span>
            <span class="ticker-sep"></span>
            <span class="ticker-item">
                <span class="ticker-label" style="color: #FF331F;">EVENT:</span>
                <span class="ticker-text" style="color: #ffffff;">BRESSEL JUNIOR PADEL CIRCUIT</span>
            </span>
            <span class="ticker-sep"></span>
            <span class="ticker-item">
                <span class="ticker-label">LIVE:</span>
                <span class="ticker-text">ACADEMY RANKING UPDATES</span>
            </span>
            <span class="ticker-sep"></span>
            <span class="ticker-item">
                <span class="ticker-label">NEW DROP:</span>
                <span class="ticker-text">PRECISION SERIES V2</span>
            </span>
        </div>
    </div>


    <!-- ═══════════════════════════════════════
         4. PROGRAM PILLARS
         Mockup: Three image cards with overlay text
         PROFESSIONAL | COMPETITION | COACHES
    ═══════════════════════════════════════ -->
    <section id="programs" class="section-padding pillars-section noise-overlay">

        <div class="container-custom">

            <!-- Section header -->
            <div class="section-header">
                <p class="caption">Engineered for community excellence.</p>
                <h2 class="heading-lg">PROGRAM PILLARS</h2>
            </div>

            <!-- Ghost watermark -->
            <div class="ghost-watermark">ACADEMY</div>

            <!-- Three pillars (@base-ui/ card pattern) -->
            <div class="pillars-grid">

                <!-- PROFESSIONAL -->
                <article class="pillar-card card card--pillar">
                    <img src="<?= esc_url($assets_base . '20260402_115035.webp') ?>" alt="Professional Training" class="card-image pillar-card-img" />
                    <div class="pillar-card-overlay"></div>
                    <div class="pillar-card-content">
                        <span class="badge badge-red">PROFESSIONAL</span>
                        <h3 class="heading-md">ELITE COACHING</h3>
                        <p class="body">World-class coaching for serious athletes. Technical mastery, match strategy, and competitive edge.</p>
                        <a href="<?= esc_url(home_url('/contact/?intent=inquiry&source=professional')) ?>" class="btn btn-ghost">
                            INQUIRE NOW
                            <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                        </a>
                    </div>
                </article>

                <!-- COMPETITION -->
                <article class="pillar-card card card--pillar">
                    <img src="<?= esc_url($assets_base . 'FA-Junior-Padel-League-Logo-ICON.webp') ?>" alt="Competition" class="card-image pillar-card-img" style="object-position: center; background: var(--color-bressel-black-soft);" />
                    <div class="pillar-card-overlay"></div>
                    <div class="pillar-card-content">
                        <span class="badge badge-red">COMPETITION</span>
                        <h3 class="heading-md">TOURNAMENT READY</h3>
                        <p class="body">Designed for regional tournament competitors. Strategy, endurance, and mental toughness.</p>
                        <a href="<?= esc_url(home_url('/contact/?intent=inquiry&source=competition')) ?>" class="btn btn-ghost">
                            INQUIRE NOW
                            <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                        </a>
                    </div>
                </article>

                <!-- COACHES -->
                <article class="pillar-card card card--pillar">
                    <img src="<?= esc_url($assets_base . '20260402_115214.webp') ?>" alt="Coaches Certification" class="card-image pillar-card-img" />
                    <div class="pillar-card-overlay"></div>
                    <div class="pillar-card-content">
                        <span class="badge badge-zinc">COACHES</span>
                        <h3 class="heading-md">CERTIFICATION</h3>
                        <p class="body">Certification programs using the BRESSEL™ methodology. Train the next generation of coaches.</p>
                        <a href="<?= esc_url(home_url('/contact/?intent=inquiry&source=coaches')) ?>" class="btn btn-ghost">
                            INQUIRE NOW
                            <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                        </a>
                    </div>
                </article>

            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         5. QUOTE CAROUSEL — Full-Width Dark
         Mockup: Full-width dark bg, large italic quote text
    ═══════════════════════════════════════ -->
    <?php get_template_part('components/quote-carousel'); ?>


    <!-- ═══════════════════════════════════════
         6. ACADEMY CENTERS
         Mockup: Left = locations list, Right = image grid
    ═══════════════════════════════════════ -->
    <section id="centers" class="section-padding noise-overlay">
        <div class="container-custom">

            <div class="centers-split">

                <!-- Left: Info + Locations (@base-ui/ nav pattern) -->
                <div class="centers-info">
                    <div class="accent-line"></div>
                    <h2 class="heading-lg">
                        BRESSEL ACADEMY<br><span class="accent">CENTERS</span>
                    </h2>
                    <p class="body-lg">
                        From Malaysia to Philippines, our state-of-the-art facilities offer the signature Kinetic Blue experience with precision climate control.
                    </p>

                    <!-- Locations list (@base-ui/ nav pattern) -->
                    <div class="locations-list">
                        <div class="location-item">
                            <span class="heading-sm">MALAYSIA</span>
                            <svg class="location-pin" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div class="location-item">
                            <span class="heading-sm">PHILIPPINES</span>
                            <svg class="location-pin" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div class="location-item">
                            <span class="heading-sm">SINGAPORE</span>
                            <svg class="location-pin" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Right: Image Grid -->
                <div class="centers-images">
                    <div class="center-img-wrapper">
                        <img src="<?= esc_url($assets_base . '20260227_195629.webp') ?>" alt="BRESSEL Court Malaysia" class="card-image center-img" />
                    </div>
                    <div class="center-img-wrapper">
                        <img src="<?= esc_url($assets_base . '20260402_115248.webp') ?>" alt="BRESSEL Court" class="card-image center-img" />
                    </div>
                    <div class="center-img-wrapper">
                        <img src="<?= esc_url($assets_base . '20260402_120037.webp') ?>" alt="BRESSEL Court" class="card-image center-img" />
                    </div>
                </div>

            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         7. SHOP
         Mockup: Product cards with images, names, prices
    ═══════════════════════════════════════ -->
    <section id="shop" class="section-padding noise-overlay">

        <div class="container-custom">

            <div class="shop-header-flex">
                <div class="shop-title-wrap">
                    <p class="caption">Engineered for communities and beyond.</p>
                    <h2 class="heading-lg">SHOP</h2>
                </div>
                <a href="<?= esc_url(get_post_type_archive_link('merch')) ?>" class="btn btn-primary">
                    VISIT CATALOG
                    <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>

            <div class="shop-grid">

                <?php if ($merch_query->have_posts()) : ?>
                    <?php while ($merch_query->have_posts()) : $merch_query->the_post(); ?>
                        <?php
                        $price   = get_post_meta(get_the_ID(), '_bressel_merch_price', true) ?: '—';
                        $img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        $series  = get_post_meta(get_the_ID(), '_bressel_merch_series', true) ?: get_post_type(get_the_ID());
                        ?>
                        <article class="product-card card card--product">
                            <div class="product-img-wrap">
                                <img src="<?= esc_url($img_url ?: $assets_base . 'hero-bg.jpg') ?>" alt="<?= esc_attr(get_the_title()) ?>" class="card-image product-img" />
                            </div>
                            <div class="product-body card-content">
                                <span class="badge badge-red"><?= esc_html(strtoupper($series)) ?></span>
                                <h3 class="product-name heading-md"><?= esc_html(get_the_title()) ?></h3>
                                <p class="product-desc body"><?= esc_html(get_the_excerpt()) ?></p>
                                <div class="product-footer">
                                    <span class="product-price body-lg">RM<?= esc_html($price) ?></span>
                                    <a href="<?= esc_url(home_url('/contact/?intent=purchase&target=' . urlencode(get_the_title()))) ?>" class="btn btn-ghost product-btn">
                                        INQUIRE
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <!-- Fallback products (from mockup) — @base-ui/ card pattern -->
                    <article class="product-card card card--product">
                        <div class="product-img-wrap">
                            <img src="<?= esc_url($assets_base . '20260402_115248.webp') ?>" alt="BRESSEL PADEL-X" class="card-image product-img" style="object-fit: contain; padding: 1rem;" />
                        </div>
                        <div class="product-body card-content">
                            <span class="badge badge-red">FLAGSHIP SERIES</span>
                            <h3 class="product-name heading-md">BRESSEL PADEL-X</h3>
                            <p class="product-desc body">Engineered for maximum power output and vibration dampening. The choice of tournament champions.</p>
                            <div class="product-footer">
                                <span class="product-price body-lg">RM169.00</span>
                                <a href="<?= esc_url(home_url('/contact/?intent=purchase&target=BRESSEL+PADEL-X')) ?>" class="btn btn-ghost product-btn">
                                    INQUIRE
                                </a>
                            </div>
                        </div>
                    </article>

                    <article class="product-card card card--product">
                        <div class="product-img-wrap">
                            <img src="<?= esc_url($assets_base . '20260402_120136.webp') ?>" alt="KINETIC GRIP-V1" class="card-image product-img" style="object-fit: contain; padding: 1rem;" />
                        </div>
                        <div class="product-body card-content">
                            <span class="badge badge-zinc">FOOTWEAR</span>
                            <h3 class="product-name heading-md">KINETIC GRIP-V1</h3>
                            <p class="product-desc body">Lateral stability on synthetic turf. Engineered for precision movements.</p>
                            <div class="product-footer">
                                <span class="product-price body-lg">RM159.00</span>
                                <a href="<?= esc_url(home_url('/contact/?intent=purchase&target=KINETIC+GRIP-V1')) ?>" class="btn btn-ghost product-btn">
                                    INQUIRE
                                </a>
                            </div>
                        </div>
                    </article>

                    <article class="product-card card card--product">
                        <div class="product-img-wrap">
                            <img src="<?= esc_url($assets_base . '20260402_115921.webp') ?>" alt="ELITE TOUR BAG" class="card-image product-img" style="object-fit: contain; padding: 1rem;" />
                        </div>
                        <div class="product-body card-content">
                            <span class="badge badge-zinc">ACCESSORIES</span>
                            <h3 class="product-name heading-md">ELITE TOUR BAG</h3>
                            <p class="product-desc body">Thermal lining for 3 rackets + apparel storage. Competition-ready design.</p>
                            <div class="product-footer">
                                <span class="product-price body-lg">RM320.00</span>
                                <a href="<?= esc_url(home_url('/contact/?intent=purchase&target=ELITE+TOUR+BAG')) ?>" class="btn btn-ghost product-btn">
                                    INQUIRE
                                </a>
                            </div>
                        </div>
                    </article>

                    <article class="product-card card card--product">
                        <div class="product-img-wrap">
                            <img src="<?= esc_url($assets_base . '20260402_115809.webp') ?>" alt="COMPRESSION PRO TEE" class="card-image product-img" style="object-fit: contain; padding: 1rem;" />
                        </div>
                        <div class="product-body card-content">
                            <span class="badge badge-zinc">APPAREL</span>
                            <h3 class="product-name heading-md">COMPRESSION PRO TEE</h3>
                            <p class="product-desc body">Breathable micro-mesh technology. Tournament-grade compression fit.</p>
                            <div class="product-footer">
                                <span class="product-price body-lg">RM185.00</span>
                                <a href="<?= esc_url(home_url('/contact/?intent=purchase&target=COMPRESSION+PRO+TEE')) ?>" class="btn btn-ghost product-btn">
                                    INQUIRE
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endif; ?>

            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════
         8. NEWSLETTER CTA — "JOIN THE MOVEMENT."
         Mockup: Warm gradient bg, email input, red subscribe button
    ═══════════════════════════════════════ -->
    <section id="newsletter" class="newsletter-cta">

        <!-- BG overlay image -->
        <?php if (file_exists(get_stylesheet_directory() . '/assets/cta-bg-overlay.jpg')) : ?>
            <img src="<?= esc_url($assets_base . 'cta-bg-overlay.jpg') ?>" alt="" class="newsletter-cta-bg" />
        <?php endif; ?>

        <div class="newsletter-content">

            <h2 class="newsletter-title heading-xl">
                JOIN THE <span class="accent">MOVEMENT.</span>
            </h2>

            <p class="newsletter-desc body-lg">
                Be part of the fastest growing precision sports community in Asia. Gain first access to limited gear drops, tournament invites, and tactical breakdowns.
            </p>

            <!-- Email form (@base-ui/ input pattern) -->
            <?php if (function_exists('fluent_form')) : ?>
                <div class="newsletter-form" style="max-width: 480px; margin: 0 auto;">
                    <?= do_shortcode('[fluentform id="2"]') ?>
                </div>
            <?php else : ?>
                <form class="newsletter-form-row" action="#" method="post" onsubmit="event.preventDefault(); alert('Thanks for subscribing!');">
                    <input type="email" name="email" required placeholder="ENTER EMAIL ADDRESS" class="input newsletter-input" />
                    <button type="submit" class="btn btn-primary newsletter-submit">SUBSCRIBE</button>
                </form>
            <?php endif; ?>

        </div>

    </section>

</main>

<?php get_footer(); ?>
