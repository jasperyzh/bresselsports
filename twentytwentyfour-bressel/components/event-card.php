<?php
/**
 * Title: Event Card Component
 * Description: Displays an event announcement card with date, title, excerpt, and link.
 * How-to Use: 
 *   Option A (static): get_template_part('components/event-card', null, ['title' => '...', 'date' => '...', 'excerpt' => '...', 'url' => '...']);
 *   Option B (query): Use within WP_Query loop for posts with 'event' tag
 */
$title    = $args['title'] ?? get_the_title();
$date     = $args['date'] ?? get_the_date('M j, Y');
$excerpt  = $args['excerpt'] ?? get_the_excerpt();
$url      = $args['url'] ?? get_permalink();
$external = $args['external'] ?? false;

// Format date nicely
$date_obj = strtotime($date);
$day = date('d', $date_obj);
$month = date('M', $date_obj);
$year = date('Y', $date_obj);
?>
<article class="group bg-dark-accent rounded-2xl p-6 md:p-8 transition-all duration-300 hover:border-[var(--color-bressel-red)]">
    <div class="flex flex-col md:flex-row gap-6 md:gap-8">
        <!-- Date Badge -->
        <div class="flex-shrink-0">
            <div class="w-20 h-20 md:w-24 md:h-24 bg-zinc-900 border border-zinc-700 rounded-xl flex flex-col items-center justify-center text-center">
                <span class="text-2xl md:text-3xl font-bold text-[var(--color-bressel-red)] leading-none"><?= esc_html($day) ?></span>
                <span class="text-xs md:text-sm uppercase tracking-wider text-zinc-400 mt-1"><?= esc_html($month) ?></span>
                <span class="text-xs text-zinc-600"><?= esc_html($year) ?></span>
            </div>
        </div>
        
        <!-- Content -->
        <div class="flex flex-col flex-grow">
            <h3 class="text-2xl md:text-3xl font-bold uppercase mb-3 group-hover:text-[var(--color-bressel-red)] transition-colors">
                <?= esc_html($title) ?>
            </h3>
            <p class="text-zinc-400 mb-4 flex-grow">
                <?= esc_html(wp_trim_words($excerpt, 20)) ?>
            </p>
            <div class="mt-auto">
                <?php
                $btn_text = $external ? 'Learn More' : 'View Details';
                $btn_attrs = $external ? 'target="_blank" rel="noopener noreferrer"' : '';
                ?>
                <a href="<?= esc_url($url) ?>" <?= $btn_attrs ?> 
                   class="inline-flex items-center gap-2 text-[var(--color-bressel-red)] font-bold uppercase tracking-wider text-sm hover:text-white transition-colors">
                    <?= esc_html($btn_text) ?>
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</article>
