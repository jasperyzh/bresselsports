<?php
/**
 * Title: Event Card Component
 * Description: Displays an event card with date, location, and details.
 * How-to Use: 
 *   get_template_part('components/event-card', null, ['event_id' => $post_id]);
 *   OR within WP_Query loop for events
 */
$event_id = $args['event_id'] ?? get_the_ID();

// Get event meta
$date = get_post_meta($event_id, '_bressel_event_date', true);
$location = get_post_meta($event_id, '_bressel_event_location', true);
$registration_url = get_post_meta($event_id, '_bressel_event_registration_url', true);

$title = get_the_title($event_id);
$excerpt = get_the_excerpt($event_id);
$url = get_permalink($event_id);

// Format date if exists
$day = '';
$month = '';
$year = '';
if ($date) {
    $date_obj = strtotime($date);
    $day = date('d', $date_obj);
    $month = date('M', $date_obj);
    $year = date('Y', $date_obj);
}

// Determine event type label
$event_types = [
    'upcoming' => 'UPCOMING',
    'tournament' => 'TOURNAMENT',
    'training' => 'TRAINING CAMP',
    'social' => 'SOCIAL',
];
$type_label = $event_types['upcoming'] ?? 'EVENT';
?>
<article class="event-card group relative overflow-hidden rounded-lg border border-zinc-800 hover:border-zinc-600 hover:border-[var(--color-bressel-red)] transition-all duration-300">
    
    <!-- Image placeholder or featured image -->
    <div class="aspect-video bg-zinc-900 flex items-center justify-center overflow-hidden relative">
        <?php if (has_post_thumbnail($event_id)) : ?>
            <?php echo get_the_post_thumbnail($event_id, 'large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500']); ?>
        <?php else : ?>
            <img src="<?= get_stylesheet_directory_uri() ?>/assets/placeholder.jpg"
                 alt="" class="w-full h-full object-cover opacity-40" />
        <?php endif; ?>
        
        <!-- Date overlay if available -->
        <?php if ($day) : ?>
            <div class="absolute top-4 right-4 bg-black/80 backdrop-blur-sm rounded-lg px-3 py-2 text-center">
                <span class="block text-lg font-bold text-[var(--color-bressel-red)] leading-none"><?= esc_html($day) ?></span>
                <span class="block text-xs text-zinc-400 uppercase"><?= esc_html($month) ?></span>
            </div>
        <?php endif; ?>
    </div>
    
    <!-- Content -->
    <div class="p-6">
        <p class="text-[var(--color-bressel-red)] text-xs font-bold uppercase tracking-widest mb-2"><?= esc_html($type_label) ?></p>
        <h3 class="text-xl font-black uppercase italic mb-3 group-hover:text-[var(--color-bressel-red)] transition-colors">
            <?= esc_html($title) ?>
        </h3>
        <p class="text-zinc-400 text-sm mb-4 line-clamp-2">
            <?= esc_html(wp_trim_words($excerpt, 15)) ?: 'Join us for this exciting event. Stay tuned for more details.' ?>
        </p>
        
        <!-- Meta info -->
        <div class="flex items-center justify-between text-sm text-zinc-500 mb-4">
            <?php if ($location) : ?>
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <?= esc_html($location) ?>
                </span>
            <?php else : ?>
                <span>—</span>
            <?php endif; ?>
            
            <?php if ($date) : ?>
                <span><?= esc_html(date('M j, Y', strtotime($date))) ?></span>
            <?php endif; ?>
        </div>
        
        <!-- CTA -->
        <div class="mt-auto">
            <?php if ($registration_url) : ?>
                <a href="<?= esc_url($registration_url) ?>" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-5 py-3 bg-[var(--color-bressel-red)] text-white text-xs font-black uppercase tracking-widest hover:bg-white hover:text-[var(--color-bressel-red)] transition-colors rounded">
                    REGISTER NOW
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
            <?php else : ?>
                <a href="<?= esc_url($url) ?>"
                   class="inline-flex items-center gap-2 text-[var(--color-bressel-red)] font-bold uppercase tracking-wider text-sm hover:text-white transition-colors group/link">
                    VIEW DETAILS
                    <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
</article>