<?php
// Hero Banner Component
$heading = $args['heading'] ?? 'World-class padel, within reach.';
$subtext = $args['subtext'] ?? 'Join the BRESSEL community today.';
?>
<section class="relative bg-zinc-900 py-24 px-6">
    <div class="max-w-7xl mx-auto text-center">
        <h1 class="text-white text-5xl md:text-6xl font-bold uppercase mb-6 tracking-wide">
            <?= esc_html($heading) ?>
        </h1>
        <p class="text-zinc-300 text-xl mb-8">
            <?= esc_html($subtext) ?>
        </p>
        <?php get_template_part('components/button', null, ['text' => 'Get Started', 'class' => 'bg-[#E62E2D] hover:bg-red-700']); ?>
    </div>
</section>
