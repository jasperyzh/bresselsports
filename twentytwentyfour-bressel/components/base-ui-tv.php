<?php
/**
 * Base UI — tailwind-variants helper for PHP
 * 
 * Mirrors tailwind-variants (JS) for WordPress PHP components.
 * Usage: base_ui_tv($base, $variants_map, $active_variants)
 * 
 * Example:
 *   $class = base_ui_tv(
 *       'inline-flex items-center',
 *       [
 *           'variant' => [
 *               'default' => 'bg-primary text-primary-foreground',
 *               'outline' => 'border border-input bg-background',
 *           ],
 *           'size' => [
 *               'sm' => 'h-8 px-3 text-sm',
 *               'md' => 'h-10 px-4 text-base',
 *           ]
 *       ],
 *       ['variant' => 'default', 'size' => 'md']
 *   );
 *   // Output: "inline-flex items-center bg-primary text-primary-foreground h-10 px-4 text-base"
 */

if (!function_exists('base_ui_tv')) :
function base_ui_tv(string $base, array $variants_map = [], array $active_variants = []): string {
    $classes = [$base];
    
    foreach ($active_variants as $key => $val) {
        if (isset($variants_map[$key][$val])) {
            $classes[] = $variants_map[$key][$val];
        }
    }
    
    return implode(' ', array_filter($classes));
}
endif;
