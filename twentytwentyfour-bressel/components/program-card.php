<?php
/**
 * Title: Program Card Component
 * Description: Displays a training program card with icon, title, and description.
 * How-to Use: get_template_part('components/program-card', null, ['title' => '...', 'description' => '...', 'icon' => '...']);
 */
$title       = $args['title'] ?? 'Training Program';
$description = $args['description'] ?? 'Expert coaching tailored to your skill level.';
$icon        = $args['icon'] ?? 'racket'; // racket, group, calendar, fitness
$url         = $args['url'] ?? '#contact/';

$icons = [
    'racket'    => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>',
    'group'     => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>',
    'calendar'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>',
    'fitness'   => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>',
    'default'   => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>'
];
$icon_svg = $icons[$icon] ?? $icons['default'];
?>
<article class="program-card group bg-zinc-900 rounded-2xl p-6 md:p-8 border border-zinc-800 transition-all duration-300 hover:border-[var(--color-bressel-red)] hover:-translate-y-1">
    <!-- Icon -->
    <div class="w-14 h-14 md:w-16 md:h-16 rounded-xl bg-[var(--color-bressel-red)]/10 flex items-center justify-center mb-5 md:mb-6 transition-colors group-hover:bg-[var(--color-bressel-red)]">
        <svg class="w-7 h-7 md:w-8 md:h-8 text-[var(--color-bressel-red)] transition-colors group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <?= $icon_svg ?>
        </svg>
    </div>
    
    <!-- Content -->
    <h3 class="text-xl md:text-2xl font-bold uppercase mb-3 transition-colors group-hover:text-[var(--color-bressel-red)]">
        <?= esc_html($title) ?>
    </h3>
    <p class="text-zinc-400 mb-5 flex-grow">
        <?= esc_html($description) ?>
    </p>
    
    <!-- Link -->
    <a href="<?= esc_url($url) ?>" 
       class="inline-flex items-center gap-2 text-[var(--color-bressel-red)] font-bold uppercase tracking-wider text-sm group-hover:text-white transition-colors">
        Learn More
        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
    </a>
</article>
