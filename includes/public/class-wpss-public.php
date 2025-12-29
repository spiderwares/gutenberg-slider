<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPSS_Public' ) ) :

    /**
     * Class WPSS_Public
     *
     */
    class WPSS_Public {

        /**
         * Settings array.
         *
         * @var array
         */
        protected $settings = [];

        /**
         * Slider ID.
         *
         * @var string
         */
        protected $slider_ID = '';

        /**
         * Constructor for the class.
         */
        public function __construct() {
            $this->events_handler();
        }

        /**
         * Initialize hooks and filters.
         */
        public function events_handler() {
            add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_assets' ], 10 );
        }

        /**
         * Enqueue frontend assets.
         */
        public function enqueue_frontend_assets() {
            
            wp_enqueue_script( 
                'swiper-bundle.min--js', 
                WPSS_URL . 'assets/lib/swiper-bundle.min.js', 
                array(), 
                WPSS_VERSION, 
                true 
            );

            wp_enqueue_style( 
                'swiper-bundle.min--css', 
                WPSS_URL . 'assets/lib/swiper-bundle.min.css', 
                array(), 
                WPSS_VERSION
            );

            // Enqueue WordPress hooks library for frontend
            wp_enqueue_script( 'wp-hooks' );
            
            wp_enqueue_script(
                'wpss-frontend',
                WPSS_URL . 'assets/js/wpss-frontend.js',
                array( 'jquery' , 'wp-hooks' ),
                WPSS_VERSION,
                true
            );

            wp_enqueue_style(
                'wpss-frontend-style',
                WPSS_URL . 'assets/css/wpss-frontend-style.css',
                array(),    
                WPSS_VERSION,
            );

            $wpss_css = $this->dynamic_wpss_css( $this->settings, $this->slider_ID );

            if ( ! empty( $wpss_css ) ) :
                wp_add_inline_style( 'wpss-frontend-style', $wpss_css );
            endif;
        }

        /**
         * Generate CSS for the slider.
         *
         */
        public static function dynamic_wpss_css( $settings, $slider_ID, $background_settings = array() ) {
            ob_start();

            $background_size     = isset( $background_settings['background_size'] ) ? $background_settings['background_size'] : '';
            $background_position = isset( $background_settings['background_position'] ) ? $background_settings['background_position'] : '';
            $background_repeat   = isset( $background_settings['background_repeat'] ) ? $background_settings['background_repeat'] : '';
            $background_color    = isset( $background_settings['background_color'] ) ? $background_settings['background_color'] : '';
            $background_url      = isset( $background_settings['background_url'] ) ? $background_settings['background_url'] : '';
            $background_settings = isset( $background_settings['background_settings'] ) ? $background_settings['background_settings'] : array();

            wpss_get_template(
                'fields/dynamic-style.php',
                array(
                    'settings'                => $settings,
                    'slider_id'               => $slider_ID,
                    'background_size'         => $background_size,
                    'background_position'     => $background_position,
                    'background_repeat'       => $background_repeat,
                    'background_color'        => $background_color,
                    'background_url'          => $background_url,
                    'background_settings'     => $background_settings,
                )
            );

            return ob_get_clean();
        }

    }

    new WPSS_Public();
endif;
