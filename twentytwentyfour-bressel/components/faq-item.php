<?php
/**
 * Title: FAQ Item Component
 * Description: Single FAQ item with accordion toggle functionality.
 * How-to Use: get_template_part('components/faq-item', null, ['question' => '...', 'answer' => '...']);
 */
$question = $args['question'] ?? 'What is this?';
$answer   = $args['answer'] ?? 'Answer goes here.';
$index    = $args['index'] ?? 0;
$unique_id = 'faq-item-' . $index;
?>
<div class="faq-item border-b border-zinc-800 last:border-b-0">
    <button 
        class="faq-trigger w-full py-5 md:py-6 flex justify-between items-center text-left gap-4 group"
        aria-expanded="false"
        aria-controls="<?= esc_attr($unique_id) ?>"
        data-faq-trigger
    >
        <span class="text-lg md:text-xl font-bold uppercase text-zinc-200 group-hover:text-white transition-colors">
            <?= esc_html($question) ?>
        </span>
        <span class="faq-icon flex-shrink-0 w-8 h-8 md:w-10 md:h-10 rounded-full bg-zinc-800 flex items-center justify-center transition-all duration-300 group-hover:bg-[var(--color-bressel-red)]">
            <svg class="faq-icon-plus w-4 h-4 text-zinc-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"/>
            </svg>
            <svg class="faq-icon-minus w-4 h-4 text-white hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
            </svg>
        </span>
    </button>
    
    <div 
        id="<?= esc_attr($unique_id) ?>"
        class="faq-content hidden"
        data-faq-content
    >
        <div class="pb-6 md:pb-8">
            <p class="text-zinc-400 leading-relaxed">
                <?= esc_html($answer) ?>
            </p>
        </div>
    </div>
</div>
