<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPBS_Public' ) ) :

    /**
     * Class WPBS_Public
     *
     */
    class WPBS_Public {

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
                WPBS_URL . 'assets/lib/swiper-bundle.min.js', 
                array(), 
                WPBS_VERSION, 
                true 
            );

            wp_enqueue_style( 
                'swiper-bundle.min--css', 
                WPBS_URL . 'assets/lib/swiper-bundle.min.css', 
                array(), 
                WPBS_VERSION
            );

            // Enqueue WordPress hooks library for frontend
            wp_enqueue_script( 'wp-hooks' );
            
            wp_enqueue_script(
                'wpbs-frontend',
                WPBS_URL . 'assets/js/wpbs-frontend.js',
                array( 'jquery' , 'wp-hooks' ),
                WPBS_VERSION,
                true
            );

            wp_enqueue_style(
                'wpbs-frontend-style',
                WPBS_URL . 'assets/css/wpbs-frontend-style.css',
                array(),    
                WPBS_VERSION,
            );

            $wpbs_css = $this->dynamic_wpbs_css( $this->settings, $this->slider_ID );

            if ( ! empty( $wpbs_css ) ) :
                wp_add_inline_style( 'wpbs-frontend-style', $wpbs_css );
            endif;
        }

        /**
         * Generate CSS for the slider.
         *
         */
        public static function dynamic_wpbs_css( $settings, $slider_ID, $background_settings = array() ) {
            ob_start();

            $background_size     = isset( $background_settings['background_size'] ) ? $background_settings['background_size'] : '';
            $background_position = isset( $background_settings['background_position'] ) ? $background_settings['background_position'] : '';
            $background_repeat   = isset( $background_settings['background_repeat'] ) ? $background_settings['background_repeat'] : '';
            $background_color    = isset( $background_settings['background_color'] ) ? $background_settings['background_color'] : '';
            $background_url      = isset( $background_settings['background_url'] ) ? $background_settings['background_url'] : '';
            $slides_background_settings = isset( $background_settings['slides_background_settings'] ) ? $background_settings['slides_background_settings'] : array();

            wpbs_get_template(
                'fields/dynamic-style.php',
                array(
                    'settings'                => $settings,
                    'slider_id'               => $slider_ID,
                    'background_size'         => $background_size,
                    'background_position'     => $background_position,
                    'background_repeat'       => $background_repeat,
                    'background_color'        => $background_color,
                    'background_url'          => $background_url,
                    'slides_background_settings' => $slides_background_settings,
                )
            );

            return ob_get_clean();
        }

    }

    new WPBS_Public();
endif;
