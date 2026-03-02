<?php
// Astro-style Merch Card Component
$name      = $args['name'] ?? 'BRESSEL Merch';
$image     = $args['image'] ?? get_template_directory_uri() . '/assets/images/default-merch.jpg';
$price     = $args['price'] ?? '€0.00';
$product_id = $args['product_id'] ?? 0;
?>
<div class="flex flex-col bg-zinc-800 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
    <img src="<?= esc_url($image) ?>" alt="<?= esc_attr($name) ?>" class="object-cover w-full h-64" />
    <div class="p-6 flex flex-col flex-grow">
        <h3 class="text-white text-xl font-bold uppercase mb-2"><?= esc_html($name) ?></h3>
        <p class="text-[#E62E2D] text-lg font-semibold mb-4"><?= esc_html($price) ?></p>
        <?php get_template_part('components/button', null, ['text' => 'Inquire to Buy', 'class' => 'bg-[#E62E2D] hover:bg-red-700']); ?>
    </div>
</div>