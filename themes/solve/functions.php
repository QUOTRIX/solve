<?php
/**
 * Solve theme functions and definitions
 */

// Include customizer options
require get_template_directory() . '/inc/customizer.php';

// Enqueue scripts and styles
function solve_enqueue_scripts() {
    // React and ReactDOM
    wp_enqueue_script('react', 'https://unpkg.com/react@17/umd/react.development.js', array(), '17.0.0', true);
    wp_enqueue_script('react-dom', 'https://unpkg.com/react-dom@17/umd/react-dom.development.js', array('react'), '17.0.0', true);
    
    // Search component
    wp_enqueue_script('search-component', get_template_directory_uri() . '/js/search.js', array('react', 'react-dom'), '1.0.0', true);
    
    // Styles
    wp_enqueue_style('solve-style', get_template_directory_uri() . '/css/style.css');
}
add_action('wp_enqueue_scripts', 'solve_enqueue_scripts');

// Register page templates
function solve_add_page_templates($templates) {
    $templates['template-parts/builder-template.php'] = 'Page Builder Template';
    return $templates;
}
add_filter('theme_page_templates', 'solve_add_page_templates');

// Theme support
function solve_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('editor-styles');
}
add_action('after_setup_theme', 'solve_theme_support');

// Register navigation menus
function solve_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'solve'),
        'footer'  => __('Footer Menu', 'solve'),
    ));
}
add_action('init', 'solve_register_menus');

// Add custom image sizes
add_image_size('solve-hero', 1920, 1080, true);
add_image_size('solve-card', 600, 400, true);

// Allow SVG uploads
function solve_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'solve_mime_types');