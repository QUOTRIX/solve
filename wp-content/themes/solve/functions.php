<?php

function solve_enqueue_search_scripts() {
    // Enqueue React and ReactDOM
    wp_enqueue_script('react', 'https://unpkg.com/react@17/umd/react.development.js', array(), '17.0.0', true);
    wp_enqueue_script('react-dom', 'https://unpkg.com/react-dom@17/umd/react-dom.development.js', array('react'), '17.0.0', true);
    
    // Enqueue our search component
    wp_enqueue_script('search-component', get_template_directory_uri() . '/components/SearchBar.js', array('react', 'react-dom'), '1.0.0', true);
    
    // Enqueue our styles
    wp_enqueue_style('search-styles', get_template_directory_uri() . '/styles/search-bar.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'solve_enqueue_search_scripts');

// Allow React JSX in WordPress
function solve_allow_jsx_script_type($tag, $handle, $src) {
    if (strpos($handle, 'search-component') !== false) {
        $tag = str_replace('<script', '<script type="text/babel"', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'solve_allow_jsx_script_type', 10, 3);

?>