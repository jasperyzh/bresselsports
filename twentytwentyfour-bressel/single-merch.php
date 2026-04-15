<?php
/**
 * Title: Single Merch Template
 * Description: Detailed view of a single product.
 * How-to Use: Automatically handled by WordPress for 'merch' post type.
 */

get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 
    $price = get_post_meta(get_the_ID(), '_bressel_merch_price', true) ?: 'TBA';
?>
<main class="py-20 bg-black text-white min-h-screen">
    <div class="container-custom">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-start">
            
            <!-- Product Image -->
            <div class="rounded-2xl overflow-hidden shadow-2xl border border-zinc-800 bg-zinc-900">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', ['class' => 'w-full h-auto object-cover']); ?>
                <?php else : ?>
                    <div class="bg-zinc-900 aspect-square flex items-center justify-center min-h-[400px]">
                        <span class="text-zinc-700 font-black text-4xl uppercase">BRESSEL PRO</span>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Product Details -->
            <div class="flex flex-col">
                <span class="text-bressel-red font-bold uppercase tracking-widest mb-4">BRESSEL PRO Collection</span>
                <h1 class="text-5xl md:text-6xl font-black uppercase tracking-tighter italic mb-8 leading-none"><?php the_title(); ?></h1>
                
                <!-- Price -->
                <div class="flex items-baseline gap-4 mb-8 py-6 border-y border-zinc-800">
                    <span class="text-4xl font-black text-white"><?= esc_html($price) ?>€</span>
                    <span class="text-zinc-500 uppercase font-bold tracking-widest text-xs">Inquire for availability</span>
                </div>

                <!-- Product Description -->
                <div class="prose prose-invert prose-red max-w-none mb-12">
                    <?php the_content(); ?>
                </div>

                <!-- Inquire CTA -->
                <div class="p-8 bg-dark-accent mt-auto">
                    <h3 class="text-3xl font-black italic uppercase mb-4 leading-none">Interested?</h3>
                    <p class="text-zinc-400 mb-8 font-medium">This item requires inquiry for purchase. We'll contact you regarding availability and secure checkout.</p>
                    
                    <?php 
                    // Link to the unified contact form with pre-filled parameters
                    $inquiry_url = add_query_arg([
                        'intent' => 'purchase',
                        'target' => urlencode(get_the_title())
                    ], home_url('/contact/'));
                    
                    get_template_part('components/button', null, [
                        'text' => 'Inquire to Buy', 
                        'url'  => $inquiry_url,
                        'class' => 'w-full text-center py-4'
                    ]); 
                    ?>
                </div>

            </div>

        </div>
    </div>
</main>
<?php endwhile; endif; ?>

<?php
get_footer();
