<?php
/**
 * Title: Button Component
 * Description: A reusable button component with multiple variants.
 * How-to Use: get_template_part('components/button', null, array('text' => '...', 'url' => '...', 'variant' => 'solid|outline'));
 */
$text    = $args['text'] ?? 'Click Here';
$url     = $args['url'] ?? '#';
$variant = $args['variant'] ?? 'solid'; // solid, outline
$class   = $args['class'] ?? '';

$base_classes = "inline-block font-bold uppercase px-8 py-3 rounded transition-all duration-200 transform hover:scale-105 active:scale-95 " . $class;
$variant_classes = ($variant === 'outline') 
    ? "border-2 border-[#E62E2D] text-[#E62E2D] hover:bg-[#E62E2D] hover:text-white" 
    : "bg-[#E62E2D] text-white hover:bg-red-700 shadow-lg hover:shadow-red-900/20";

?>
<a href="<?= esc_url($url) ?>" class="<?= esc_attr($base_classes) ?> <?= esc_attr($variant_classes) ?>">
    <?= esc_html($text) ?>
</a>

