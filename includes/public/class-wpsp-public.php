<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPSP_Public' ) ) :

    /**
     * Class WPSP_Public
     *
     */
    class WPSP_Public {

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
                WPSP_URL . 'assets/lib/swiper-bundle.min.js', 
                array(), 
                WPSP_VERSION, 
                true 
            );

            wp_enqueue_style( 
                'swiper-bundle.min--css', 
                WPSP_URL . 'assets/lib/swiper-bundle.min.css', 
                array(), 
                WPSP_VERSION
            );

            // Enqueue WordPress hooks library for frontend
            wp_enqueue_script( 'wp-hooks' );
            
            wp_enqueue_script(
                'wpsp-frontend',
                WPSP_URL . 'assets/js/wpsp-frontend.js',
                array( 'jquery' , 'wp-hooks' ),
                WPSP_VERSION,
                true
            );

            wp_enqueue_style(
                'wpsp-frontend-style',
                WPSP_URL . 'assets/css/wpsp-frontend-style.css',
                array(),    
                WPSP_VERSION,
            );

            $wpsp_css = $this->dynamic_wpsp_css( $this->settings, $this->slider_ID );

            if ( ! empty( $wpsp_css ) ) :
                wp_add_inline_style( 'wpsp-frontend-style', $wpsp_css );
            endif;
        }

        /**
         * Generate CSS for the slider.
         *
         */
        public static function dynamic_wpsp_css( $settings, $slider_ID, $background_settings = array() ) {
            ob_start();

            $background_size     = isset( $background_settings['background_size'] ) ? $background_settings['background_size'] : '';
            $background_position = isset( $background_settings['background_position'] ) ? $background_settings['background_position'] : '';
            $background_repeat   = isset( $background_settings['background_repeat'] ) ? $background_settings['background_repeat'] : '';
            $background_color    = isset( $background_settings['background_color'] ) ? $background_settings['background_color'] : '';
            $background_url      = isset( $background_settings['background_url'] ) ? $background_settings['background_url'] : '';
            $background_settings = isset( $background_settings['background_settings'] ) ? $background_settings['background_settings'] : array();

            wpsp_get_template(
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

    new WPSP_Public();
endif;
