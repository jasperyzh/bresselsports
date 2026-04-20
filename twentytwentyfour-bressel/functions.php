<?php
/**
 * Title: BRESSEL Child Theme Functions
 * Description: Core theme logic, including asset enqueuing, CPT registration, and CMB2 field setup.
 * How-to Use: Automatically loaded by WordPress. Requires the CMB2 plugin for custom field functionality.
 *
 * @package Bressel_Child
 */

if (!defined('ABSPATH')) {
    exit;
}

// Define constants
define('BRESSSELTHEME_VERSION', '1.0.0');

/**
 * Enqueue Vite assets and theme styles
 */
function bressel_enqueue_assets()
{
    // 1. Enqueue the main style.css (theme declaration)
    wp_enqueue_style(
        'bressel-style',
        get_stylesheet_uri(),
        array(),
        BRESSSELTHEME_VERSION
    );

    // 2. Vite Integration (always load built assets; dev client added in wp_head for hot-reload)
    $dist_path = get_stylesheet_directory() . '/dist';
    $dist_uri  = get_stylesheet_directory_uri() . '/dist';
    // Check both common manifest locations
    $manifest_path = $dist_path . '/.vite/manifest.json';
    if (!file_exists($manifest_path)) {
        $manifest_path = $dist_path . '/manifest.json';
    }

    // 3. Enqueue Base UI JavaScript components
    $js_dir = get_stylesheet_directory() . '/src/js';
    if (file_exists($js_dir . '/base-ui.js')) {
        wp_enqueue_script(
            'base-ui',
            get_stylesheet_directory_uri() . '/src/js/base-ui.js',
            array(),
            BRESSSELTHEME_VERSION,
            true
        );
    }
    if (file_exists($js_dir . '/carousel.js')) {
        wp_enqueue_script(
            'carousel',
            get_stylesheet_directory_uri() . '/src/js/carousel.js',
            array('base-ui'),
            BRESSSELTHEME_VERSION,
            true
        );
    }
    if (file_exists($js_dir . '/tabs.js')) {
        wp_enqueue_script(
            'tabs',
            get_stylesheet_directory_uri() . '/src/js/tabs.js',
            array('base-ui'),
            BRESSSELTHEME_VERSION,
            true
        );
    }

    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);

        if (isset($manifest['main.js'])) {
            $main_entry = $manifest['main.js'];

            // Enqueue Main JS
            if (isset($main_entry['file'])) {
                wp_enqueue_script(
                    'bressel-main',
                    $dist_uri . '/' . $main_entry['file'],
                    array('base-ui'),
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
                        array('global-styles'),
                        BRESSSELTHEME_VERSION
                    );
                }
            }
        }
    } else {
        // Fallback if manifest is missing but files exist directly
        if (file_exists($dist_path . '/main.css')) {
            wp_enqueue_style('bressel-tailwind', $dist_uri . '/main.css', array('global-styles'), BRESSSELTHEME_VERSION);
        }
        if (file_exists($dist_path . '/main.js')) {
            wp_enqueue_script('bressel-main', $dist_uri . '/main.js', array('base-ui'), BRESSSELTHEME_VERSION, true);
        }
    }
}
add_action('wp_enqueue_scripts', 'bressel_enqueue_assets', 10);

/**
 * Output Vite Dev Client and main.css when in development mode
 */
add_action('wp_head', function () {
    if (wp_get_environment_type() === 'development') {
        echo '<script type="module" src="http://localhost:5173/@vite/client"></script>';
        echo '<link rel="stylesheet" href="http://localhost:5173/src/main.css">';
        echo '<script type="module" src="http://localhost:5173/main.js"></script>';
    }
}, 999);

/**
 * Register Theme Features
 */
function bressel_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'bressel'),
    ));
}
add_action('after_setup_theme', 'bressel_theme_setup');

/**
 * Register Custom Post Types
 */
function bressel_register_cpts()
{
    // Coach CPT - accessible at /academy/
    register_post_type('coach', array(
        'labels' => array(
            'name' => __('Coaches', 'bressel'),
            'singular_name' => __('Coach', 'bressel')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'academy'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-groups'
    ));

    // Merch CPT - accessible at /shop/
    register_post_type('merch', array(
        'labels' => array(
            'name' => __('Merchandise', 'bressel'),
            'singular_name' => __('Merch', 'bressel')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'shop'),
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-cart'
    ));

}

add_action('init', 'bressel_register_cpts');

/**
 * Flush rewrite rules on theme activation
 */
function bressel_rewrite_flush()
{
    bressel_register_cpts();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'bressel_rewrite_flush');

/**
 * CMB2 Fields Implementation
 */
if (function_exists('new_cmb2_box')) {

    // 1. Coaches Metadata
    add_action('cmb2_admin_init', 'bressel_register_coach_metabox');
    function bressel_register_coach_metabox()
    {
        $cmb = new_cmb2_box(array(
            'id'            => 'coach_metabox',
            'title'         => __('Coach Details', 'bressel'),
            'object_types'  => array('coach'),
        ));

        $cmb->add_field(array(
            'name' => __('Coach Role', 'bressel'),
            'desc' => 'e.g., Head Coach, Junior Instructor',
            'id'   => '_bressel_coach_role',
            'type' => 'text',
        ));

        $cmb->add_field(array(
            'name' => __('Years of Experience', 'bressel'),
            'id'   => '_bressel_coach_experience',
            'type' => 'text',
        ));
    }

    // 2. Merch Metadata
    add_action('cmb2_admin_init', 'bressel_register_merch_metabox');
    function bressel_register_merch_metabox()
    {
        $cmb = new_cmb2_box(array(
            'id'            => 'merch_metabox',
            'title'         => __('Product Details', 'bressel'),
            'object_types'  => array('merch'),
        ));

        $cmb->add_field(array(
            'name' => __('Price (RM)', 'bressel'),
            'id'   => '_bressel_merch_price',
            'type' => 'text',
        ));
    }

    // 3. Event Metadata
    add_action('cmb2_admin_init', 'bressel_register_event_metabox');
    function bressel_register_event_metabox()
    {
        $cmb = new_cmb2_box(array(
            'id'            => 'event_metabox',
            'title'         => __('Event Details', 'bressel'),
            'object_types' => array('post'),
        ));

        $cmb->add_field(array(
            'name' => __('Event Date', 'bressel'),
            'desc' => 'Select the event date',
            'id'   => '_bressel_event_date',
            'type' => 'text_date',
        ));

        $cmb->add_field(array(
            'name' => __('Location', 'bressel'),
            'desc' => 'Event location',
            'id'   => '_bressel_event_location',
            'type' => 'text',
        ));

        $cmb->add_field(array(
            'name' => __('Registration Link', 'bressel'),
            'desc' => 'Link to event registration page',
            'id'   => '_bressel_event_registration_url',
            'type' => 'text_url',
        ));
    }

    // 4. Quote Carousel Options
    add_action('cmb2_admin_init', 'bressel_register_quote_carousel_options');
    function bressel_register_quote_carousel_options()
    {
        $cmb = new_cmb2_box(array(
            'id'           => 'bressel_quote_carousel_options',
            'title'        => __('Quote Carousel', 'bressel'),
            'object_types' => array('options-page'),
            'option_key'   => 'bressel_quote_carousel_settings',
            'icon_url'     => 'dashicons-format-quote',
        ));

        // Group field for multiple quotes
        $group_field_id = $cmb->add_field(array(
            'name' => __('Quote Carousel', 'bressel'),
            'desc' => __('Add quotes for the homepage carousel. Click "Add New Quote" to add more.', 'bressel'),
            'id'   => 'bressel_quote_carousel',
            'type' => 'group',
            'options' => array(
                'add_button'    => __('Add New Quote', 'bressel'),
                'remove_button' => __('Remove Quote', 'bressel'),
                'group_title'   => __('Quote {#}', 'bressel'),
            ),
        ));

        $cmb->add_group_field($group_field_id, array(
            'name' => __('Quote Text', 'bressel'),
            'desc' => __('Enter the quote text. Use &lt;br&gt; for line breaks.', 'bressel'),
            'id'   => 'quote',
            'type' => 'textarea',
        ));

        $cmb->add_group_field($group_field_id, array(
            'name' => __('Author Name', 'bressel'),
            'desc' => __('The name of the person who said the quote', 'bressel'),
            'id'   => 'author',
            'type' => 'text',
        ));

        $cmb->add_group_field($group_field_id, array(
            'name' => __('Author Role/Title', 'bressel'),
            'desc' => __('Optional: The role or title of the author', 'bressel'),
            'id'   => 'role',
            'type' => 'text',
        ));
    }

    // 5. Global Options Page
    add_action('cmb2_admin_init', 'bressel_register_theme_options_metabox');
    function bressel_register_theme_options_metabox()
    {
        $cmb = new_cmb2_box(array(
            'id'           => 'bressel_option_metabox',
            'title'        => __('BRESSEL Settings', 'bressel'),
            'object_types' => array('options-page'),
            'option_key'   => 'bressel_options',
            'icon_url'     => 'dashicons-admin-generic',
        ));

        $cmb->add_field(array(
            'name' => __('Tracking Scripts', 'bressel'),
            'desc' => __('Add tracking scripts (Google Analytics, Pixels, etc.)', 'bressel'),
            'id'   => '_bressel_tracking_scripts',
            'type' => 'textarea_code',
        ));
    }
}

/**
 * Hide admin menus for Editors
 */
function bressel_restrict_admin_menu()
{
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
function bressel_output_tracking()
{
    $options = get_option('bressel_options');
    $tracking = $options['_bressel_tracking_scripts'] ?? '';
    if ($tracking) {
        echo $tracking;
    }
}
add_action('wp_head', 'bressel_output_tracking');