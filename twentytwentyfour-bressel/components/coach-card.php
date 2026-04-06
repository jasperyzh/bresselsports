<?php
/**
 * Title: Coach Card Component
 * Description: Displays a coach profile card with their image, name, and role.
 * How-to Use: get_template_part('components/coach-card', null, array('name' => '...', 'image' => '...', 'role' => '...'));
 */
$name  = $args['name'] ?? 'Padel Coach';
$image = $args['image'] ?? get_template_directory_uri() . '/assets/images/default-coach.jpg';
$role  = $args['role'] ?? 'Head Coach';

// Generate booking URL with intent and target
$booking_url = add_query_arg([
    'intent' => 'booking',
    'target' => urlencode($name)
], home_url('/contact/'));
?>
<div class="flex flex-col bg-zinc-900 rounded-lg overflow-hidden shadow-lg h-full">
    <?php if ($image) : ?>
        <img src="<?= esc_url($image) ?>" alt="<?= esc_attr($name) ?>" class="object-cover w-full h-64" />
    <?php endif; ?>
    <div class="p-6 flex flex-col flex-grow">
        <h3 class="text-white text-xl font-bold uppercase mb-1"><?= esc_html($name) ?></h3>
        <p class="text-[#E62E2D] font-semibold mb-4"><?= esc_html($role) ?></p>
        <div class="mt-auto">
            <?php get_template_part('components/button', null, [
                'text' => 'Book Session',
                'url'  => $booking_url
            ]); ?>
        </div>
    </div>
</div>
