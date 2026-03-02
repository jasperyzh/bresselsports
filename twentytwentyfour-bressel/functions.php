<?php
/**
 * BRESSEL Child Theme Functions
 *
 * @package Bressel_Child
 */

if (!defined('ABSPATH')) {
    exit;
}

// Define constants
define('BRESSSELTHEME_VERSION', '1.0.0');
define('BRESSSELCMB2_DIR', get_template_directory() . '/vendor/cmb2');

/**
 * Enqueue Vite assets and theme styles
 */
function bressel_enqueue_assets() {
    // 1. Enqueue the main style.css (theme declaration)
    wp_enqueue_style(
        'bressel-style',
        get_stylesheet_uri(),
        array(),
        BRESSSELTHEME_VERSION
    );

    // 2. Vite Integration (Production Mode Only)
    if (wp_get_environment_type() !== 'development') {
        $dist_path = get_stylesheet_directory() . '/dist';
        $dist_uri  = get_stylesheet_directory_uri() . '/dist';
        $manifest_path = $dist_path . '/.vite/manifest.json';
        
        if (file_exists($manifest_path)) {
            $manifest = json_decode(file_get_contents($manifest_path), true);
            
            if (isset($manifest['main.js'])) {
                $main_entry = $manifest['main.js'];

                // Enqueue Main JS
                if (isset($main_entry['file'])) {
                    wp_enqueue_script(
                        'bressel-main',
                        $dist_uri . '/' . $main_entry['file'],
                        array(),
                        BRESSSELTHEME_VERSION,
                        true
                    );
                }

                // Enqueue Main CSS
                if (isset($main_entry['css']) && is_array($main_entry['css'])) {
                    foreach ($main_entry['css'] as $index => $css_file) {
                        wp_enqueue_style(
                            'bressel-main-style-' . $index,
                            $dist_uri . '/' . $css_file,
                            array(),
                            BRESSSELTHEME_VERSION
                        );
                    }
                }
            }
        } else {
            // Fallback if manifest is missing but files exist directly
            if (file_exists($dist_path . '/main.css')) {
                wp_enqueue_style('bressel-tailwind', $dist_uri . '/main.css', array(), BRESSSELTHEME_VERSION);
            }
            if (file_exists($dist_path . '/main.js')) {
                wp_enqueue_script('bressel-main', $dist_uri . '/main.js', array(), BRESSSELTHEME_VERSION, true);
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'bressel_enqueue_assets');

/**
 * Output Vite Dev Client and main.js when in development mode
 */
add_action('wp_head', function() {
    if (wp_get_environment_type() === 'development') {
        echo '<script type="module" src="http://localhost:5173/@vite/client"></script>';
        echo '<script type="module" src="http://localhost:5173/main.js"></script>';
    }
});

/**
 * Register Custom Post Types
 */
function bressel_register_cpts() {
    // Coach CPT
    register_post_type('coach', array(
        'labels' => array(
            'name' => __('Coaches', 'bressel'),
            'singular_name' => __('Coach', 'bressel')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'coaches'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true
    ));

    // Merch CPT
    register_post_type('merch', array(
        'labels' => array(
            'name' => __('Merchandise', 'bressel'),
            'singular_name' => __('Merch', 'bressel')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'shop'),
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true
    ));
}
add_action('init', 'bressel_register_cpts');

/**
 * Register CMB2 Fields for Coaches
 */
function bressel_coach_fields($cmb) {
    $cmb->add_field(array(
        'name' => __('Coach Role', 'bressel'),
        'desc' => 'e.g., Head Coach, Junior Instructor',
        'type' => 'text',
        'field_key' => '_bressel_coach_role'
    ));

    $cmb->add_field(array(
        'name' => __('Years of Experience', 'bressel'),
        'type' => 'text',
        'field_key' => '_bressel_coach_experience'
    ));
}

/**
 * Register CMB2 Fields for Merch
 */
function bressel_merch_fields($cmb) {
    $cmb->add_field(array(
        'name' => __('Price (€)', 'bressel'),
        'type' => 'text',
        'field_key' => '_bressel_merch_price'
    ));
}

/**
 * Hide admin menus for Editors
 */
function bressel_restrict_admin_menu() {
    if (!current_user_can('administrator')) {
        remove_menu_page('themes.php');
        remove_menu_page('plugins.php');
        remove_menu_page('options-general.php');
        remove_menu_page('edit.php?post_type=page');
    }
}
add_action('admin_init', 'bressel_restrict_admin_menu');

/**
 * Output custom tracking scripts from BRESSEL Settings
 */
function bressel_output_tracking() {
    $tracking = get_option('_bressel_tracking_scripts');
    if ($tracking) {
        echo "<script>\n{$tracking}\n</script>";
    }
}
add_action('wp_head', 'bressel_output_tracking');
