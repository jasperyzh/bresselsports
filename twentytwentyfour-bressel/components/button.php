<?php
/**
 * Title: Button Component
 * Description: Reusable button using base_ui_tv (tailwind-variants for PHP).
 * How-to Use: get_template_part('components/button', null, array('text' => '...', 'url' => '...', 'variant' => 'primary|outline|ghost', 'size' => 'sm|md|lg'));
 */

require_once get_stylesheet_directory() . '/components/base-ui-tv.php';

$text    = $args['text'] ?? 'Click Here';
$url     = $args['url'] ?? '#';
$variant = $args['variant'] ?? 'primary';
$size    = $args['size'] ?? 'md';
$accent  = $args['accent'] ?? false;
$class   = $args['class'] ?? '';

$is_link = !empty($args['url']);
$tag = $is_link ? 'a' : 'button';
$tag_attrs = $is_link ? sprintf('href="%s"', esc_attr($url)) : 'type="button"';

$class = base_ui_tv(
    'inline-flex items-center justify-center gap-2 font-bold uppercase tracking-widest rounded transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]',
    [
        'variant' => [
            'primary' => 'bg-[var(--color-bressel-red)] text-white hover:bg-white hover:text-[var(--color-bressel-red)]',
            'outline' => 'border-2 border-zinc-700 text-zinc-300 hover:border-white hover:text-white',
            'ghost'   => $accent
                ? 'text-[var(--color-bressel-red)] hover:text-white hover:bg-[var(--color-bressel-red)]'
                : 'text-zinc-400 hover:text-white hover:bg-zinc-800',
        ],
        'size' => [
            'sm' => 'px-5 py-3 text-xs',
            'md' => 'px-8 py-4 text-sm',
            'lg' => 'px-10 py-5 text-base',
        ],
    ],
    ['variant' => $variant, 'size' => $size]
);

$class .= $class ? ' ' . $class : '';
?>

<<?php echo $tag; ?> <?= $tag_attrs ?> class="<?= esc_attr($class) ?>" data-slot="button">
    <?= esc_html($text) ?>
</<?php echo $tag; ?>>

