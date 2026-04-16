<?php
/**
 * Template Name: Community Page
 * Description: Community and Events page template
 */

get_header();
?>

<main class="section-padding bg-black text-white min-h-screen">
    <div class="container-custom">
        
        <header class="mb-20">
            <div class="accent-bar"></div>
            <h1 class="italic leading-none">COMMUNITY<br/><span class="text-gradient-red">& EVENTS</span></h1>
            <p class="text-zinc-400 mt-6 max-w-2xl text-xl font-medium italic">
                Connect with players who match your intensity. Join local ladders, enter tournaments, and rank up.
            </p>
        </header>

        <!-- Events Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
            $events_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'category_name' => 'event,announcement'
            ));
            
            if ($events_query->have_posts()) : 
                while ($events_query->have_posts()) : $events_query->the_post();
                    get_template_part('components/event-card', null, [
                        'event_id' => get_the_ID(),
                    ]);
                endwhile;
                wp_reset_postdata();
            else : ?>
                <p class="text-zinc-500 italic col-span-full text-center">
                    Events coming soon! Check back later or create events in WordPress Admin.
                </p>
            <?php endif; ?>
        </div>

    </div>
</main>

<?php get_footer(); ?>
