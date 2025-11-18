<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPSBS_Public' ) ) :

    /**
     * Class WPSBS_Public
     *
     */
    class WPSBS_Public {

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
            $this->event_handler();
        }

        /**
         * Initialize hooks and filters.
         */
        public function event_handler() {
            add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_assets' ], 10 );
        }

        /**
         * Enqueue frontend assets.
         */
        public function enqueue_frontend_assets() {
            
            wp_enqueue_script( 
                'swiper-bundle.min--js', 
                WPSBS_URL . 'assets/lib/swiper-bundle.min.js', 
                array(), 
                WPSBS_VERSION, 
                true 
            );

            wp_enqueue_style( 
                'swiper-bundle.min--css', 
                WPSBS_URL . 'assets/lib/swiper-bundle.min.css', 
                array(), 
                WPSBS_VERSION
            );

            wp_enqueue_script(
                'wpsbs-frontend',
                WPSBS_URL . 'assets/js/wpsbs-frontend.js',
                array( 'jquery' ),
                WPSBS_VERSION,
                true
            );

            wp_enqueue_style(
                'wpsbs-frontend-style',
                WPSBS_URL . 'assets/css/wpsbs-frontend-style.css',
                array(),    
                WPSBS_VERSION
            );

            $wpsbs_css = $this->wpsbs_css( $this->settings, $this->slider_ID );

            if ( ! empty( $wpsbs_css ) ) :
                wp_add_inline_style( 'wpsbs-frontend-style', $wpsbs_css );
            endif;
        }

        /**
         * Generate CSS for the slider.
         *
         */
        public static function wpsbs_css( $settings, $slider_ID, $background_settings = array() ) {
            ob_start();

            $background_size     = isset( $background_settings['background_size'] ) ? $background_settings['background_size'] : '';
            $background_position = isset( $background_settings['background_position'] ) ? $background_settings['background_position'] : '';
            $background_repeat   = isset( $background_settings['background_repeat'] ) ? $background_settings['background_repeat'] : '';
            $background_color    = isset( $background_settings['background_color'] ) ? $background_settings['background_color'] : '';
            $background_url      = isset( $background_settings['background_url'] ) ? $background_settings['background_url'] : '';
            $slides_background_settings = isset( $background_settings['slides_background_settings'] ) ? $background_settings['slides_background_settings'] : array();

            wpsbs_get_template(
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

    new WPSBS_Public();
endif;
