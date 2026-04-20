<?php
/**
 * Title: Merch Archive Template — KISE + @base-ui/
 * Description: Product grid using semantic classes
 * How-to Use: Automatically handled by WordPress at /shop/
 */

get_header();

$assets_base = get_stylesheet_directory_uri() . '/assets/';
?>

<main>

    <!-- HERO -->
    <section class="relative min-h-[60vh] flex items-end overflow-hidden">
        <!-- Background image -->
        <div class="absolute inset-0">
            <img src="<?= esc_url($assets_base . 'products/bressel-rackets.jpg') ?>"
                 alt=""
                 class="w-full h-full object-cover opacity-30 grayscale brightness-50"
                 aria-hidden="true" />
        </div>

        <!-- BEYOND watermark -->
        <div class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 text-transparent font-black italic text-8xl md:text-9xl select-none pointer-events-none" style="-webkit-text-stroke: 1px rgba(255,255,255,0.06)">BEYOND</div>

        <!-- Content -->
        <div class="relative z-20 container-custom pb-16 md:pb-24">
            <h1 class="heading-xl">
                <span class="block">KINETIC</span>
                <span class="block">PRECISION</span>
                <span class="accent block">ENGINEERING</span>
            </h1>
        </div>
    </section>

    <!-- PRODUCTS GRID -->
    <section class="py-20">
        <div class="container-custom">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php if (have_posts()) : while (have_posts()) : the_post();
                    $is_first = ($wp_query->current_post === 0);
                ?>
                    <article class="card <?= $is_first ? 'md:col-span-2' : '' ?>">
                        <div class="aspect-w-1 aspect-h-1 group">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')) ?>"
                                     alt="<?= esc_attr(get_the_title()) ?>"
                                     class="card-image transition-transform duration-700 group-hover:scale-105" />
                            <?php else : ?>
                                <div class="w-full h-full bg-zinc-900 flex items-center justify-center">
                                    <span class="caption text-zinc-700">No Image</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-content">
                            <span class="badge badge-red mb-2"><?= esc_html(get_the_excerpt() ? 'FLAGSHIP SERIES' : 'PRO GEAR') ?></span>
                            <h3 class="heading-md mb-2"><?= esc_html(get_the_title()) ?></h3>
                            <?php if (get_the_excerpt()) : ?>
                                <p class="body mb-4"><?= esc_html(get_the_excerpt()) ?></p>
                            <?php endif; ?>
                            <div class="flex items-center justify-between">
                                <span class="body-lg font-bold">RM<?= esc_html(get_post_meta(get_the_ID(), '_bressel_merch_price', true) ?: '—') ?></span>
                                <a href="<?= esc_url(home_url('/contact/?intent=purchase&target=' . urlencode(get_the_title()))) ?>"
                                   class="btn btn-primary btn-sm">
                                    INQUIRE
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; else : ?>
                    <p class="body text-zinc-500 col-span-full text-center py-16">No products available. Check back soon.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
