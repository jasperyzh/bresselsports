<?php
/**
 * Title: Accordion Component
 * Description: Expandable content section with smooth animations.
 * How-to Use: get_template_part('components/accordion', null, ['title' => '...', 'content' => '...']);
 */
$title   = $args['title'] ?? 'Accordion Title';
$content = $args['content'] ?? 'Accordion content goes here.';
$id      = 'acc-' . uniqid();
?>

<div class="accordion border border-zinc-800 rounded-lg overflow-hidden">
    <button class="accordion-toggle w-full flex items-center justify-between px-6 py-5 text-left bg-zinc-900 hover:bg-zinc-800 transition-colors"
            aria-expanded="false" aria-controls="<?= esc_attr($id ) ?>">
        <span class="text-sm font-bold uppercase tracking-wider text-white pr-4"><?= esc_html($title) ?></span>
        <svg class="accordion-icon w-5 h-5 text-[var(--color-bressel-red)] flex-shrink-0 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div id="<?= esc_attr($id) ?>" class="accordion-content hidden">
        <div class="px-6 py-5 bg-zinc-950">
            <p class="text-zinc-400 text-sm leading-relaxed"><?= esc_html($content) ?></p>
        </div>
    </div>
</div>
