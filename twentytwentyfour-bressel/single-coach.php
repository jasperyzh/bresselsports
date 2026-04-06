<?php
/**
 * Title: Single Coach Template
 * Description: Detailed view of a single coach.
 * How-to Use: Automatically handled by WordPress for 'coach' post type.
 */

get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 
    $role = get_post_meta(get_the_ID(), '_bressel_coach_role', true) ?: 'Coach';
    $exp  = get_post_meta(get_the_ID(), '_bressel_coach_experience', true) ?: 'Experienced';
?>
<main class="py-20 bg-black text-white min-h-screen">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-start">
            
            <div class="rounded-2xl overflow-hidden shadow-2xl border border-zinc-800">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', ['class' => 'w-full h-auto object-cover']); ?>
                <?php else : ?>
                    <div class="bg-zinc-900 aspect-[4/5] flex items-center justify-center">
                        <span class="text-zinc-700 font-black text-4xl uppercase">BRESSEL</span>
                    </div>
                <?php endif; ?>
            </div>

            <div class="flex flex-col">
                <span class="text-[#E62E2D] font-bold uppercase tracking-widest mb-4"><?= esc_html($role) ?></span>
                <h1 class="text-6xl font-black uppercase tracking-tighter italic mb-8 leading-none"><?php the_title(); ?></h1>
                
                <div class="flex gap-8 mb-12 py-6 border-y border-zinc-800">
                    <div>
                        <span class="block text-zinc-500 text-xs uppercase font-bold tracking-widest mb-1">Experience</span>
                        <span class="text-xl font-bold"><?= esc_html($exp) ?></span>
                    </div>
                    <div>
                        <span class="block text-zinc-500 text-xs uppercase font-bold tracking-widest mb-1">Focus</span>
                        <span class="text-xl font-bold">Pro-Level Tactics</span>
                    </div>
                </div>

                <div class="prose prose-invert prose-red max-w-none mb-12">
                    <?php the_content(); ?>
                </div>

                <div class="p-8 bg-dark-accent">
                    <h3 class="text-3xl font-black italic uppercase mb-4 leading-none">Book a Session</h3>
                    <p class="text-zinc-400 mb-8 font-medium">Ready to improve your game? Book a 1-on-1 session with <?= get_the_title() ?> today.</p>
                    
                    <?php 
                    // Link to the unified contact form with pre-filled parameters
                    $booking_url = add_query_arg([
                        'intent' => 'booking',
                        'target' => urlencode(get_the_title())
                    ], home_url('/contact/'));
                    
                    get_template_part('components/button', null, [
                        'text' => 'Check Availability', 
                        'url'  => $booking_url,
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
