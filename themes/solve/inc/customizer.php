<?php
/**
 * Solve Theme Customizer
 */

function solve_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('solve_hero_section', array(
        'title'    => __('Hero Section', 'solve'),
        'priority' => 30,
    ));

    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Find Your Perfect App',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label'    => __('Hero Title', 'solve'),
        'section'  => 'solve_hero_section',
        'type'     => 'text',
    ));

    // Hero Background Color
    $wp_customize->add_setting('hero_bg_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_bg_color', array(
        'label'    => __('Hero Background Color', 'solve'),
        'section'  => 'solve_hero_section',
    )));

    // Search Bar Style
    $wp_customize->add_section('solve_search_style', array(
        'title'    => __('Search Bar Style', 'solve'),
        'priority' => 35,
    ));

    // Search Bar Background
    $wp_customize->add_setting('search_bg_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'search_bg_color', array(
        'label'    => __('Search Bar Background', 'solve'),
        'section'  => 'solve_search_style',
    )));

    // Search Bar Border Radius
    $wp_customize->add_setting('search_border_radius', array(
        'default'           => '8',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('search_border_radius', array(
        'label'    => __('Search Bar Border Radius (px)', 'solve'),
        'section'  => 'solve_search_style',
        'type'     => 'number',
    ));
}
add_action('customize_register', 'solve_customize_register');

// Apply customizer styles
function solve_customizer_css() {
    ?>
    <style type="text/css">
        .hero-section {
            background-color: <?php echo get_theme_mod('hero_bg_color', '#000000'); ?>;
        }
        #app-search input {
            background-color: <?php echo get_theme_mod('search_bg_color', '#ffffff'); ?>;
            border-radius: <?php echo get_theme_mod('search_border_radius', '8'); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'solve_customizer_css');