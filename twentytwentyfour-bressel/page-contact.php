<?php
/**
 * Template Name: Contact Page
 * Description: Contact us page template
 */

get_header();
?>

<main class="section-padding bg-black text-white min-h-screen">
    <div class="container-custom">
        
        <header class="mb-20">
            <div class="accent-bar"></div>
            <h1 class="italic leading-none">CONTACT<br/><span class="text-gradient-red">US</span></h1>
            <p class="text-zinc-400 mt-6 max-w-2xl text-xl font-medium italic">
                We're here to answer any questions about coaching, events, or merchandise.
            </p>
        </header>

        <div class="max-w-2xl">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                
                <?php if (function_exists('fluent_form')) : ?>
                    <?= do_shortcode('[fluentform id="1"]') ?>
                <?php else : ?>
                    <div class="bg-zinc-900 p-6 rounded-lg">
                        <h3 class="text-xl font-bold mb-4">Quick Contact</h3>
                        <p class="text-zinc-400 mb-4">Email us at: info@bresselpadel.com</p>
                        <a href="<?= esc_url(home_url('/contact/?intent=booking')) ?>" class="btn-solid inline-flex items-center gap-2 px-6 py-3">
                            BOOK SESSION
                        </a>
                    </div>
                <?php endif; ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
