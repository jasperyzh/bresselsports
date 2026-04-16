<?php
/**
 * Title: Alert Component
 * Description: Contextual feedback messages for user actions.
 * How-to Use: get_template_part('components/alert', null, ['type' => 'success', 'title' => '...', 'message' => '...']);
 */
$type    = $args['type'] ?? 'info';
$title   = $args['title'] ?? 'Alert';
$message = $args['message'] ?? 'This is an alert message.';

$styles = [
    'success' => ['border' => 'border-[#22c55e]', 'bg' => 'bg-[#22c55e]/10', 'text' => 'text-[#22c55e]', 'icon' => 'M5 13l4 4L19 7'],
    'warning' => ['border' => 'border-[var(--color-bressel-red)]', 'bg' => 'bg-[var(--color-bressel-red)]/10', 'text' => 'text-[var(--color-bressel-red)]', 'icon' => 'M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
    'error'   => ['border' => 'border-red-600', 'bg' => 'bg-red-600/10', 'text' => 'text-red-500', 'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'],
    'info'    => ['border' => 'border-blue-500', 'bg' => 'bg-blue-500/10', 'text' => 'text-blue-400', 'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
];

$s = $styles[$type] ?? $styles['info'];
?>

<div class="rounded-lg border <?= esc_attr($s['border']) ?> <?= esc_attr($s['bg']) ?> p-5 flex gap-4">
    <svg class="w-5 h-5 <?= esc_attr($s['text']) ?> flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= esc_attr($s['icon']) ?>" />
    </svg>
    <div>
        <h4 class="font-bold text-sm <?= esc_attr($s['text']) ?> mb-1"><?= esc_html($title) ?></h4>
        <p class="text-zinc-300 text-sm"><?= esc_html($message) ?></p>
    </div>
</div>
