<?php
/**
 * Title: Coach Archive Template
 * Description: Displays a grid of all registered coaches.
 * How-to Use: Automatically handled by WordPress at /coaches/
 */

get_header();
?>

<main class="section-padding bg-black text-white min-h-screen">
    <div class="container-custom">
        
        <header class="mb-20">
            <div class="accent-bar"></div>
            <h1 class="italic leading-none">THE<br/><span class="text-gradient-red">ACADEMY</span></h1>
            <p class="text-zinc-400 mt-6 max-w-2xl text-xl font-medium italic">Our world-class coaching staff is here to take your game to the next level. Select a coach to learn more about their experience and teaching philosophy.</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="h-full">
                    <?php 
                    get_template_part('components/coach-card', null, [
                        'name'  => get_the_title(),
                        'image' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
                        'role'  => get_post_meta(get_the_ID(), '_bressel_coach_role', true) ?: 'Coach'
                    ]); 
                    ?>
                </div>
            <?php endwhile; else : ?>
                <p class="text-zinc-500 italic">No coaches found.</p>
            <?php endif; ?>
        </div>

    </div>
</main>

<?php
get_footer();
