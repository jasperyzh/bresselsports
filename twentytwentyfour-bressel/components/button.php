<?php
// Button Component
$text = $args['text'] ?? 'Click Here';
$class = $args['class'] ?? '';
?>
<a href="#" class="inline-block bg-[#E62E2D] text-white font-bold uppercase px-8 py-3 rounded hover:bg-red-700 transition-colors <?= esc_attr($class) ?>">
    <?= esc_html($text) ?>
</a>
