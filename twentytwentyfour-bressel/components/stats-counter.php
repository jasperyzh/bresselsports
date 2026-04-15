<?php
/**
 * Title: Stats Counter Component
 * Description: Displays animated numeric statistics with labels. Animates on scroll into view.
 * How-to Use: 
 *   Single stat: get_template_part('components/stats-counter', null, ['value' => 500, 'suffix' => '+', 'label' => 'Sessions']);
 *   Multiple stats: Pass array via 'stats' arg
 */
$stats = $args['stats'] ?? null;

// Single stat mode
if ($stats === null) {
    $value  = $args['value'] ?? 0;
    $suffix = $args['suffix'] ?? '';
    $label  = $args['label'] ?? '';
    $stats = [[
        'value'  => $value,
        'suffix' => $suffix,
        'label'  => $label
    ]];
}

$counter_id = 'stats-' . uniqid();
?>
<div class="stats-counter" id="<?= esc_attr($counter_id) ?>" data-stats-container>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-<?= count($stats) ?> gap-8 md:gap-12">
        <?php foreach ($stats as $index => $stat) : 
            $stat_id = $counter_id . '-' . $index;
            $end_value = intval($stat['value']);
            $suffix = $stat['suffix'] ?? '';
            $label = $stat['label'] ?? '';
        ?>
            <div class="text-center" data-stat 
                 data-target="<?= esc_attr($end_value) ?>" 
                 data-suffix="<?= esc_attr($suffix) ?>">
                <div class="relative inline-block">
                    <span class="stat-value text-5xl md:text-6xl lg:text-7xl font-bold text-white block leading-none"
                          data-stat-value="<?= esc_attr($stat_id) ?>">
                        0<?= esc_html($suffix) ?>
                    </span>
                    <!-- Red accent line -->
                    <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-12 h-1 bg-[var(--color-bressel-red)]"></span>
                </div>
                <span class="stat-label inline-block mt-4 md:mt-6 text-lg md:text-xl uppercase tracking-wider text-zinc-400 font-semibold">
                    <?= esc_html($label) ?>
                </span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
