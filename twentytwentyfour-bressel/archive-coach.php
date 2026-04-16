<?php
/**
 * Title: Coach Archive Template
 * Description: Displays a grid of all registered coaches.
 * How-to Use: Automatically handled by WordPress at /academy/
 */

get_header();
?>

<main class="section-padding bg-black text-white min-h-screen">
    <div class="container-custom">
        
        <header class="mb-20">
            <div class="accent-bar"></div>
            <h1 class="italic leading-none">THE<br/><span class="text-gradient-red">ACADEMY</span></h1>
            <p class="text-zinc-400 mt-6 max-w-2xl text-xl font-medium italic">
                Our world-class coaching staff is here to take your game to the next level.
            </p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <?php 
            $coach_query = new WP_Query([
                'post_type' => 'coach',
                'posts_per_page' => -1
            ]);
            
            if ($coach_query->have_posts()) : 
                while ($coach_query->have_posts()) : $coach_query->the_post();
                    get_template_part('components/coach-card', null, [
                        'name'  => get_the_title(),
                        'image' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
                        'role'  => get_post_meta(get_the_ID(), '_bressel_coach_role', true) ?: 'Coach'
                    ]); 
                endwhile;
                wp_reset_postdata();
            else : ?>
                <p class="text-zinc-500 italic">No coaches found. Add coaches in WordPress Admin.</p>
            <?php endif; ?>
        </div>

    </div>
</main>

<?php get_footer(); ?>
