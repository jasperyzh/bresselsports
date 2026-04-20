<?php
/**
 * Title: Coach Archive Template — KISE + @base-ui/
 * Description: Displays grid of all coaches using semantic classes
 * How-to Use: Automatically handled by WordPress at /academy/
 */

get_header();
?>

<main class="py-20 min-h-screen">
    <div class="container-custom">
        
        <!-- Header -->
        <header class="mb-16">
            <div class="w-16 h-1 bg-red mb-6"></div>
            <h1 class="heading-xl mb-6">
                THE<br/><span class="accent">ACADEMY</span>
            </h1>
            <p class="body-lg max-w-3xl">
                Our world-class coaching staff is here to take your game to the next level.
            </p>
        </header>

        <!-- Coaches Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
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
                <p class="body text-zinc-500 col-span-full">No coaches found. Add coaches in WordPress Admin.</p>
            <?php endif; ?>
        </div>

    </div>
</main>

<?php get_footer(); ?>
