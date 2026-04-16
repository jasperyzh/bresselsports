<?php
$content = file_get_contents('/home/matsu/Desktop/wp_bressel/twentytwentyfour-bressel/functions.php');

// Remove event CPT registration block
$content = preg_replace('/\s*\/\/ Event CPT\s*register_post_type\(\'event\'.*?\'dashicons-calendar\'\s*\)\);\s*/s', '', $content);

// Update event meta box to apply to standard posts but only when category is event or announcement
$content = preg_replace('/\'object_types\'\s*=>\s*array\(\'event\'\)/', '\'object_types\' => array(\'post\')', $content);

file_put_contents('/home/matsu/Desktop/wp_bressel/twentytwentyfour-bressel/functions.php', $content);
