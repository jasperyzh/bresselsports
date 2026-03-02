<?php
// Astro-style Coach Card Component
$name  = $args['name'] ?? 'Padel Coach';
$image = $args['image'] ?? get_template_directory_uri() . '/assets/images/default-coach.jpg';
$role  = $args['role'] ?? 'Head Coach';
?>
<div class="flex flex-col bg-zinc-900 rounded-lg overflow-hidden shadow-lg">
    <img src="<?= esc_url($image) ?>" alt="<?= esc_attr($name) ?>" class="object-cover w-full h-64" />
    <div class="p-6">
        <h3 class="text-white text-xl font-bold uppercase"><?= esc_html($name) ?></h3>
        <p class="text-[#E62E2D] mb-4"><?= esc_html($role) ?></p>
        <?php get_template_part('components/button', null, ['text' => 'Book Session']); ?>
    </div>
</div>