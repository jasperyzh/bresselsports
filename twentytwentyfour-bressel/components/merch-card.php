<?php
/**
 * Title: Merch Card Component
 * Description: Displays a product card for the shop catalog.
 * How-to Use: get_template_part('components/merch-card', null, array('name' => '...', 'image' => '...', 'price' => '...'));
 */
$name  = $args['name'] ?? 'Bressel Gear';
$image = $args['image'] ?? get_template_directory_uri() . '/assets/images/merch-default.jpg';
$price = $args['price'] ?? 'TBA';
?>
<div class="group relative flex flex-col bg-zinc-900 rounded-lg overflow-hidden shadow-lg h-full transition-transform hover:-translate-y-1">
    <div class="aspect-square overflow-hidden bg-zinc-800">
        <img src="<?= esc_url($image) ?>" alt="<?= esc_attr($name) ?>" class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110" />
    </div>
    <div class="p-6 flex flex-col flex-grow">
        <div class="flex justify-between items-start mb-2">
            <h3 class="text-white text-lg font-bold uppercase"><?= esc_html($name) ?></h3>
            <span class="text-[#E62E2D] font-bold text-xl"><?= esc_html($price) ?>€</span>
        </div>
        <div class="mt-auto">
            <?php get_template_part('components/button', null, ['text' => 'Inquire to Buy', 'variant' => 'outline']); ?>
        </div>
    </div>
</div>