<?php
/**
 * Title: Single Merch Template
 * Description: Detailed view of a single product.
 * How-to Use: Automatically handled by WordPress for 'merch' post type.
 */

get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 
    $price = get_post_meta(get_the_ID(), '_bressel_merch_price', true) ?: '??';
?>
<main class="py-20 bg-black text-white min-h-screen">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-start">
            
            <div class="rounded-2xl overflow-hidden shadow-2xl bg-zinc-900 border border-zinc-800 aspect-square">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                <?php endif; ?>
            </div>

            <div class="flex flex-col">
                <nav class="mb-8">
                    <a href="<?= esc_url(get_post_type_archive_link('merch')) ?>" class="text-zinc-500 hover:text-white transition-colors text-sm uppercase font-bold tracking-widest">&larr; Back to Shop</a>
                </nav>

                <h1 class="text-6xl font-black uppercase tracking-tighter italic mb-4 leading-none"><?php the_title(); ?></h1>
                <span class="text-4xl font-bold text-[#E62E2D] mb-12 italic"><?= esc_html($price) ?>€</span>

                <div class="prose prose-invert prose-red max-w-none mb-12 pb-12 border-b border-zinc-800/50">
                    <?php the_content(); ?>
                </div>

                <div class="flex flex-col gap-6 bg-dark-accent p-8 md:p-10">
                    <div class="flex items-center gap-4">
                        <span class="text-zinc-500 uppercase font-bold tracking-[0.2em] text-[10px]">Availability:</span>
                        <span class="bg-green-500/10 text-green-500 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest border border-green-500/20">In Stock</span>
                    </div>
                    
                    <?php 
                    // Link to the unified contact form with pre-filled parameters
                    $purchase_url = add_query_arg([
                        'intent' => 'purchase',
                        'target' => urlencode(get_the_title())
                    ], home_url('/contact/'));

                    get_template_part('components/button', null, [
                        'text' => 'Inquire to Buy', 
                        'url'  => $purchase_url,
                        'class' => 'w-full md:w-auto text-center py-5 text-xl'
                    ]); 
                    ?>
                    
                    <p class="text-zinc-500 text-sm mt-4 font-medium italic">Secure checkout handled via direct inquiry. Worldwide shipping available.</p>
                </div>
            </div>

        </div>
    </div>
</main>
<?php endwhile; endif; ?>

<?php
get_footer();
