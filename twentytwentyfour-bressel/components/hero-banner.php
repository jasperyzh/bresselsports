<?php
/**
 * Title: Hero Banner Component
 * Description: A full-width hero section with background image, headline, and CTA.
 * How-to Use: get_template_part('components/hero-banner', null, array('heading' => '...', 'subtext' => '...'));
 */
$heading = $args['heading'] ?? 'World-class padel, within reach.';
$subtext = $args['subtext'] ?? 'Join the BRESSEL community today.';
?>
<section class="relative bg-zinc-900 py-32 px-6 overflow-hidden">
    <div class="absolute inset-0 z-0 overflow-hidden">
        <video autoplay loop muted playscripted class="absolute inset-0 w-full h-full object-cover">
            <source src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/background-video.mp4') ?>" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-black/40"></div>
    </div>
    <div class="max-w-7xl mx-auto text-center relative z-10">
        <h1 class="text-white text-5xl md:text-7xl font-black uppercase mb-6 tracking-tighter leading-none">
            <?= wp_kses_post($heading) ?>
        </h1>
        <p class="text-zinc-300 text-xl md:text-2xl mb-10 max-w-2xl mx-auto font-medium">
            <?= esc_html($subtext) ?>
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <?php get_template_part('components/button', null, ['text' => 'Book a Court', 'variant' => 'solid']); ?>
            <?php get_template_part('components/button', null, ['text' => 'Meet the Coaches', 'variant' => 'outline']); ?>
        </div>
    </div>
</section>
