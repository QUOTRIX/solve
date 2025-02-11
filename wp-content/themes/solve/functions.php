<?php

// Register page templates
function solve_register_page_templates($templates) {
    $templates['search-template.php'] = 'Search Page';
    return $templates;
}
add_filter('theme_page_templates', 'solve_register_page_templates');

function solve_load_page_template($template) {
    if(get_page_template_slug() === 'search-template.php') {
        $template = get_template_directory() . '/search-template.php';
    }
    return $template;
}
add_filter('page_template', 'solve_load_page_template');

function solve_enqueue_search_scripts() {
    // Add console logging for debugging
    wp_enqueue_script('debug-script', get_template_directory_uri() . '/js/debug.js', array(), '1.0.0', true);
    
    // Enqueue React and ReactDOM from a reliable CDN
    wp_enqueue_script('react', 'https://cdnjs.cloudflare.com/ajax/libs/react/17.0.2/umd/react.production.min.js', array(), '17.0.2', true);
    wp_enqueue_script('react-dom', 'https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.2/umd/react-dom.production.min.js', array('react'), '17.0.2', true);
    
    // Enqueue Babel for JSX transformation
    wp_enqueue_script('babel', 'https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js', array(), '6.26.0', true);
    
    // Enqueue our search component
    wp_enqueue_script('search-component', get_template_directory_uri() . '/components/SearchBar.js', array('react', 'react-dom', 'babel'), '1.0.0', true);
    
    // Enqueue our styles
    wp_enqueue_style('search-styles', get_template_directory_uri() . '/styles/search-bar.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'solve_enqueue_search_scripts');

// Add console logging
function solve_add_debug_script() {
    ?>
    <script type="text/javascript">
        console.log('WordPress theme scripts loading...');
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM fully loaded');
            if (typeof React === 'undefined') {
                console.error('React is not loaded');
            } else {
                console.log('React is loaded successfully');
            }
            if (typeof ReactDOM === 'undefined') {
                console.error('ReactDOM is not loaded');
            } else {
                console.log('ReactDOM is loaded successfully');
            }
            const searchContainer = document.getElementById('app-search');
            if (!searchContainer) {
                console.error('Search container not found');
            } else {
                console.log('Search container found');
            }
        });
    </script>
    <?php
}
add_action('wp_footer', 'solve_add_debug_script');

// Allow React JSX in WordPress
function solve_allow_jsx_script_type($tag, $handle, $src) {
    if (strpos($handle, 'search-component') !== false) {
        $tag = str_replace('<script', '<script type="text/babel"', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'solve_allow_jsx_script_type', 10, 3);

?>