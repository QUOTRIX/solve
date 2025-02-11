<?php

function solve_enqueue_scripts() {
    // Enqueue React
    wp_enqueue_script('react', 'https://unpkg.com/react@17/umd/react.development.js', array(), '17.0.0', true);
    wp_enqueue_script('react-dom', 'https://unpkg.com/react-dom@17/umd/react-dom.development.js', array('react'), '17.0.0', true);
    
    // Enqueue the search component
    wp_enqueue_script('search-component', get_template_directory_uri() . '/components/SearchBar.js', array('react', 'react-dom'), '1.0.0', true);
    
    // Enqueue styles
    wp_enqueue_style('search-styles', get_template_directory_uri() . '/styles/search-bar.css', array(), '1.0.0');
    
    // Add inline initialization script
    wp_add_inline_script('search-component', '
        document.addEventListener("DOMContentLoaded", function() {
            const searchContainer = document.getElementById("app-search");
            if (searchContainer && typeof SearchBar !== "undefined") {
                ReactDOM.render(React.createElement(SearchBar), searchContainer);
            }
        });
    ');
}
add_action('wp_enqueue_scripts', 'solve_enqueue_scripts');

// Log errors to debug
function solve_add_error_logging() {
    if (!is_admin()) {
        echo '<script>
            console.log("Page loaded");
            window.onerror = function(msg, url, lineNo, columnNo, error) {
                console.log("Error: " + msg + "\nURL: " + url + "\nLine: " + lineNo + "\nColumn: " + columnNo + "\nError object: " + JSON.stringify(error));
                return false;
            };
        </script>';
    }
}
add_action('wp_head', 'solve_add_error_logging');

?>