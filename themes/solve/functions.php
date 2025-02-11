<?php
function solve_enqueue_scripts() {
    wp_enqueue_script('react', 'https://unpkg.com/react@17/umd/react.development.js', array(), '17.0.0', true);
    wp_enqueue_script('react-dom', 'https://unpkg.com/react-dom@17/umd/react-dom.development.js', array('react'), '17.0.0', true);
    wp_enqueue_script('search-component', get_template_directory_uri() . '/js/search.js', array('react', 'react-dom'), '1.0.0', true);
    wp_enqueue_style('solve-style', get_template_directory_uri() . '/css/style.css');
}
add_action('wp_enqueue_scripts', 'solve_enqueue_scripts');
