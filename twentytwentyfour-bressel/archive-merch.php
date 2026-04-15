<?php
/**
 * Title: Merch Archive Template
 * Description: Displays a grid of all products in the BRESSEL PRO collection.
 * How-to Use: Automatically handled by WordPress at /shop/
 */

get_header();
?>

<main class="section-padding bg-black text-white min-h-screen">
    <div class="container-custom">
        
        <header class="mb-20">
            <div class="accent-bar"></div>
            <h1 class="italic leading-none">BRESSEL<br/><span class="text-gradient-red">PRO</span></h1>
            <p class="text-zinc-400 mt-6 max-w-2xl text-xl font-medium italic">Engineered for the court. Designed for the community. Explore our latest technical gear and apparel.</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="h-full">
                    <?php 
                    get_template_part('components/merch-card', null, [
                        'name'  => get_the_title(),
                        'image' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
                        'price' => get_post_meta(get_the_ID(), '_bressel_merch_price', true) ?: '?'
                    ]); 
                    ?>
                </div>
            <?php endwhile; else : ?>
                <p class="text-zinc-500 italic col-span-full text-center">No products available yet. Check back soon!</p>
            <?php endif; ?>
        </div>

    </div>
</main>

<?php
get_footer();
