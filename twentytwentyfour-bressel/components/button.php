<?php
/**
 * Title: Button Component
 * Description: A reusable button component using Starwind UI base classes.
 * How-to Use: get_template_part('components/button', null, array('text' => '...', 'url' => '...', 'variant' => 'solid|outline|ghost', 'size' => 'sm|md|lg'));
 */
$text    = $args['text'] ?? 'Click Here';
$url     = $args['url'] ?? '#';
$variant = $args['variant'] ?? 'solid';
$size    = $args['size'] ?? 'md';
$accent  = $args['accent'] ?? false;
$class   = $args['class'] ?? '';

// Starwind base classes — variant + size
$base_classes = 'inline-flex items-center justify-center gap-2 font-bold uppercase tracking-widest rounded transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] btn-ripple';

// Map our variants → Starwind-compatible classes
$variant_map = [
    'solid'  => 'bg-[var(--color-bressel-red)] text-white hover:bg-white hover:text-[var(--color-bressel-red)]',
    'outline'=> 'border-2 border-zinc-700 text-zinc-300 hover:border-white hover:text-white',
    'ghost'  => $accent
        ? 'text-[var(--color-bressel-red)] hover:text-white hover:bg-[var(--color-bressel-red)]'
        : 'text-zinc-400 hover:text-white hover:bg-zinc-800',
];

// Map our sizes → Starwind-compatible classes
$size_map = [
    'sm' => 'px-5 py-3 text-xs',
    'md' => 'px-8 py-4 text-sm',
    'lg' => 'px-10 py-5 text-base',
];

$variant_classes = $variant_map[$variant] ?? $variant_map['solid'];
$size_classes    = $size_map[$size] ?? $size_map['md'];

$all_classes = trim("$base_classes $variant_classes $size_classes $class");
?>

<a href="<?= esc_url($url) ?>" class="<?= esc_attr($all_classes) ?>">
    <?= esc_html($text) ?>
</a>
