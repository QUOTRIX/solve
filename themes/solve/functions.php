<?php

function solve_enqueue_scripts() {
    wp_enqueue_script('react', 'https://unpkg.com/react@17/umd/react.development.js', array(), '17.0.0', true);
    wp_enqueue_script('react-dom', 'https://unpkg.com/react-dom@17/umd/react-dom.development.js', array('react'), '17.0.0', true);
    wp_enqueue_script('search-component', get_template_directory_uri() . '/js/search.js', array('react', 'react-dom'), '1.0.0', true);
    wp_enqueue_style('solve-style', get_template_directory_uri() . '/css/style.css');
}
add_action('wp_enqueue_scripts', 'solve_enqueue_scripts');

// Register page templates
function solve_add_page_templates($templates) {
    $templates['templates/homepage.php'] = 'Homepage with Search';
    return $templates;
}
add_filter('theme_page_templates', 'solve_add_page_templates');

// Load the correct template file
function solve_load_page_template($template) {
    if (is_page_template('templates/homepage.php')) {
        $template = get_template_directory() . '/templates/homepage.php';
    }
    return $template;
}
add_filter('template_include', 'solve_load_page_template');

// Add theme support for featured images
add_theme_support('post-thumbnails');

// Add support for editor styles
add_theme_support('editor-styles');

?>