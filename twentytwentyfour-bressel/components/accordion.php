<?php
/**
 * Title: Accordion Component
 * Description: Accessible accordion using base_ui_tv.
 * How-to Use: get_template_part('components/accordion', null, array('items' => [...], 'type' => 'single|multiple'));
 * 
 * Args:
 *   items: array of ['title' => '', 'content' => '']
 *   type: 'single' or 'multiple' (default: 'single')
 *   default_open: int or array of item indices (default: none)
 */

require_once get_template_directory() . '/components/base-ui-tv.php';

$items     = $args['items'] ?? [];
$type      = $args['type'] ?? 'single';
$default   = $args['default_open'] ?? [];
$is_single = $type === 'single';
?>

<div data-slot="accordion" data-type="<?= esc_attr($type) ?>" class="starwind-accordion">
    <?php foreach ($items as $i => $item): 
        $value = 'item-' . $i;
        $isOpen = is_array($default) ? in_array($i, $default) : ($default === $i);
        $state = $isOpen ? 'open' : 'closed';
    ?>
    <div data-slot="accordion-item" data-value="<?= esc_attr($value) ?>" data-state="<?= esc_attr($state) ?>" class="border-b">
        <button
            data-slot="accordion-trigger"
            class="flex w-full items-center justify-between gap-4 rounded-md py-4 text-left font-medium transition-all hover:text-muted-foreground [&[data-state=open]>svg]:rotate-180"
            aria-expanded="<?= $isOpen ? 'true' : 'false' ?>"
            data-slot="accordion-trigger"
        >
            <?= esc_html($item['title'] ?? '') ?>
            <svg class="h-4 w-4 shrink-0 transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </button>
        <div
            data-slot="accordion-content"
            data-state="<?= esc_attr($state) ?>"
            class="overflow-hidden text-sm text-muted-foreground"
            <?= $isOpen ? '' : 'style="display:none;"' ?>
        >
            <div class="pb-4 pt-0">
                <?= wp_kses_post($item['content'] ?? '') ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
