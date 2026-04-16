<?php
/**
 * Title: Button Component
 * Description: A reusable button component with variants, sizes, and ripple effect.
 * How-to Use: get_template_part('components/button', null, array('text' => '...', 'url' => '...', 'variant' => 'solid|outline|ghost', 'size' => 'sm|md|lg'));
 */
$text    = $args['text'] ?? 'Click Here';
$url     = $args['url'] ?? '#';
$variant = $args['variant'] ?? 'solid'; // solid, outline, ghost
$size    = $args['size'] ?? 'md';        // sm, md, lg
$accent  = $args['accent'] ?? false;     // red accent for ghost
$class   = $args['class'] ?? '';

// Size classes
$size_classes = [
    'sm' => 'px-5 py-3 text-xs',
    'md' => 'px-8 py-4 text-sm',
    'lg' => 'px-10 py-5 text-base',
];

// Variant classes
$variant_classes = '';
if ($variant === 'solid') {
    $variant_classes = "bg-[var(--color-bressel-red)] text-white hover:bg-white hover:text-[var(--color-bressel-red)] shadow-lg";
} elseif ($variant === 'outline') {
    $variant_classes = "border-2 border-zinc-700 text-zinc-300 hover:border-white hover:text-white";
} elseif ($variant === 'ghost') {
    $variant_classes = $accent
        ? "text-[var(--color-bressel-red)] hover:text-white hover:bg-[var(--color-bressel-red)]"
        : "text-zinc-400 hover:text-white hover:bg-zinc-800";
}

$all_classes = trim("inline-flex items-center justify-center gap-2 font-black uppercase tracking-widest rounded transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] btn-ripple "
    . ($size_classes[$size] ?? $size_classes['md'])
    . " " . $variant_classes
    . " " . $class);
?>

<a href="<?= esc_url($url) ?>" class="<?= esc_attr($all_classes) ?>">
    <?= esc_html($text) ?>
</a>
