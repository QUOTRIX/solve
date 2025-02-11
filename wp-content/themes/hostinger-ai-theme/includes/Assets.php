<?php

namespace Hostinger\AiTheme;

defined( 'ABSPATH' ) || exit;

class Assets {
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'frontend_styles' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'frontend_scripts' ) );
        add_action( 'enqueue_block_editor_assets', array( $this, 'frontend_styles' ) );
    }

    /**
     * @return void
     */
    public function frontend_styles(): void {
        wp_enqueue_style(
            'hostinger-ai-style',
            get_stylesheet_directory_uri() . '/assets/css/style.min.css',
            [],
            wp_get_theme()->get( 'Version' ),
        );

        if( !is_admin() ) {
            wp_add_inline_style(
                'hostinger-ai-style',
                '.hostinger-ai-fade-up { opacity: 0; }'
            );
        }
    }

    /**
     * @return void
     */
    public function frontend_scripts(): void {
        wp_enqueue_script(
            'hostinger-ai-scripts',
            get_stylesheet_directory_uri() . '/assets/js/front-scripts.min.js',
            [
                'jquery',
                'wp-i18n',
            ],
            wp_get_theme()->get( 'Version' ),
            true,
        );
    }
}