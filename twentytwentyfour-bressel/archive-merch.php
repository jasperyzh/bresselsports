<?php
/**
 * Title: Merch Archive Template — Enhanced
 * Description: Asymmetric product grid matching BRESSEL PRO merch mockup.
 * How-to Use: Automatically handled by WordPress at /shop/
 */

get_header();

$assets_base = get_stylesheet_directory_uri() . '/assets/';
?>

<main class="page-dark">

    <!-- ═══════════════════════════════════════
         1. HERO — KINETIC PRECISION ENGINEERING
         Dark background with padel racket imagery
    ═══════════════════════════════════════ -->
    <section class="relative min-h-[60vh] flex items-end overflow-hidden noise-overlay">

        <!-- Background: use product imagery -->
        <div class="absolute inset-0 z-0">
            <img src="<?= esc_url($assets_base . 'products/bressel-rackets.jpg') ?>"
                 alt=""
                 class="w-full h-full object-cover select-none pointer-events-none opacity-30"
                 style="filter: grayscale(1) brightness(0.5);"
                 aria-hidden="true" />
        </div>

        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-black/70 to-black/95 z-10"></div>

        <!-- BEYOND watermark -->
        <div class="beyond-watermark text-[10rem] md:text-[18rem] lg:text-[24rem] top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 select-none pointer-events-none">
            BEYOND
        </div>

        <!-- Content -->
        <div class="relative z-20 container-custom pb-16 md:pb-24">
            <h1 class="mb-2">
                <span class="block text-4xl md:text-6xl lg:text-7xl font-black uppercase leading-none text-white">KINETIC</span>
                <span class="block text-4xl md:text-6xl lg:text-7xl font-black uppercase leading-none text-white">PRECISION</span>
                <span class="block text-4xl md:text-6xl lg:text-7xl font-black uppercase leading-none text-[var(--color-bressel-red)]">ENGINEERING</span>
            </h1>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         2. PRODUCT GRID — Asymmetric Layout
         Hero card (larger) + smaller cards
    ═══════════════════════════════════════ -->
    <section class="section-padding page-dark">
        <div class="container-custom">

            <div class="shop-grid md:grid-cols-2 md:grid-flow-dense gap-6">
                <?php if (have_posts()) : while (have_posts()) : the_post();
                    $is_first = false;
                ?>
                    <article class="product-card <?= $is_first ? 'product-card-hero' : '' ?>">
                        <div class="product-card-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')) ?>"
                                     alt="<?= esc_attr(get_the_title()) ?>"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                            <?php else : ?>
                                <div class="w-full h-full bg-zinc-900 flex items-center justify-center">
                                    <span class="text-zinc-700 text-xs uppercase tracking-widest">No Image</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="product-card-body">
                            <p class="text-[var(--color-bressel-red)] text-[10px] font-black uppercase tracking-widest mb-1">
                                <?= esc_html(get_the_excerpt() ? 'FLAGSHIP SERIES' : '') ?>
                            </p>
                            <h3 class="text-xl md:text-2xl font-black uppercase italic text-white mb-2"><?= esc_html(get_the_title()) ?></h3>
                            <?php if (get_the_excerpt()) : ?>
                                <p class="text-zinc-400 text-sm mb-4 line-clamp-2"><?= esc_html(get_the_excerpt()) ?></p>
                            <?php endif; ?>
                            <div class="flex items-center justify-between">
                                <span class="text-white font-bold text-lg">RM<?= esc_html(get_post_meta(get_the_ID(), '_bressel_merch_price', true) ?: '—') ?></span>
                                <a href="<?= esc_url(home_url('/contact/?intent=purchase&target=' . urlencode(get_the_title()))) ?>"
                                   class="btn-solid-sm btn-ripple px-5 py-2 text-xs font-black uppercase tracking-widest">
                                    INQUIRE
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; else : ?>
                    <p class="text-zinc-600 col-span-full text-center py-16 italic">No products available. Check back soon.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         3. EQUIP YOUR CLUB — B2B CTA
    ═══════════════════════════════════════ -->
    <section class="section-padding page-dark relative noise-overlay texture-dark">
        <div class="container-custom text-center">

            <!-- BEYOND watermark -->
            <div class="beyond-watermark text-[12rem] md:text-[20rem] lg:text-[28rem] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 select-none pointer-events-none">
                BEYOND
            </div>

            <div class="relative z-10">
                <h2 class="text-center mb-4">
                    <span class="block text-3xl md:text-5xl font-black uppercase text-white">EQUIP YOUR</span>
                    <span class="block text-3xl md:text-5xl font-black uppercase text-[var(--color-bressel-red)]">CLUB</span>
                </h2>
                <p class="text-zinc-400 max-w-xl mx-auto mb-8">
                    Custom bulk orders for pro-shops, academies, and tournament organizers.
                    Access tiered pricing and personalized branding.
                </p>
                <a href="<?= esc_url(home_url('/contact/?intent=bulk-inquiry')) ?>"
                   class="btn-solid btn-ripple inline-flex items-center gap-3">
                    BULK INQUIRY PORTAL
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2zm7 4l-1.4 1.4L14.2 12l-3.6 3.6L12 17l5-5-5-5z"/></svg>
                </a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
