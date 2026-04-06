<?php
/**
 * Title: Merch Archive Template
 * Description: Displays the BRESSEL PRO shop catalog.
 * How-to Use: Automatically handled by WordPress at /shop/
 */

get_header();
?>

<main class="section-padding bg-black text-white min-h-screen">
    <div class="container-custom">
        
        <header class="mb-20 flex flex-col md:flex-row md:items-end justify-between gap-10">
            <div>
                <div class="accent-bar"></div>
                <h1 class="italic leading-none">BRESSEL<br/><span class="text-gradient-red">PRO</span></h1>
                <p class="text-zinc-400 mt-6 max-w-xl text-xl font-medium italic">Engineered for performance. Designed for the community. Shop our latest collection of premium padel gear.</p>
            </div>
            <div class="text-bressel-red uppercase font-bold tracking-[0.3em] text-[10px] pb-4 border-b border-zinc-900">
                <?= $wp_query->found_posts ?> Items Available
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="h-full">
                    <?php 
                    get_template_part('components/merch-card', null, [
                        'name'  => get_the_title(),
                        'image' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
                        'price' => get_post_meta(get_the_ID(), '_bressel_merch_price', true) ?: '??'
                    ]); 
                    ?>
                </div>
            <?php endwhile; else : ?>
                <p class="text-zinc-500 italic">Gear collection launching soon.</p>
            <?php endif; ?>
        </div>

    </div>
</main>

<?php
get_footer();
