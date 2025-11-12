<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'GTBS_Public' ) ) :

    class GTBS_Public {

        protected $settings = [];

        protected $slider_ID = '';

        public function __construct() {
            $this->event_handler();
        }

        public function event_handler() {
            add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_assets' ], 10 );
        }

        public function enqueue_frontend_assets() {
            
            wp_enqueue_script( 
                'swiper-bundle.min--js', 
                GTBS_URL . 'assets/lib/swiper-bundle.min.js', 
                array(), 
                GTBS_VERSION, 
                true 
            );

            wp_enqueue_style( 
                'swiper-bundle.min--css', 
                GTBS_URL . 'assets/lib/swiper-bundle.min.css', 
                array(), 
                GTBS_VERSION 
            );

            wp_enqueue_script(
                'gtbs-frontend',
                GTBS_URL . 'assets/js/gtbs-frontend.js',
                array('jquery'),
                GTBS_VERSION,
                true
            );

            wp_enqueue_style(
                'gtbs-frontend-style',
                GTBS_URL . 'assets/css/gtbs-frontend-style.css',
                array(),    
                GTBS_VERSION
            );

            $gtbs_css = $this->gtbs_css( $this->settings, $this->slider_ID );

            if ( ! empty( $gtbs_css ) ) :
                wp_add_inline_style( 'gtbs-frontend-style', $gtbs_css );
            endif;
        }

        public static function gtbs_css( $settings, $slider_ID, $background_settings = array() ) {
            ob_start();

            $background_size     = isset( $background_settings['background_size'] ) ? $background_settings['background_size'] : '';
            $background_position = isset( $background_settings['background_position'] ) ? $background_settings['background_position'] : '';
            $background_repeat   = isset( $background_settings['background_repeat'] ) ? $background_settings['background_repeat'] : '';
            $background_color    = isset( $background_settings['background_color'] ) ? $background_settings['background_color'] : '';
            $background_url      = isset( $background_settings['background_url'] ) ? $background_settings['background_url'] : '';

            gtbs_get_template(
                'fields/dynamic-style.php',
                array(
                    'settings'            => $settings,
                    'slider_id'           => $slider_ID,
                    'background_size'     => $background_size,
                    'background_position' => $background_position,
                    'background_repeat'   => $background_repeat,
                    'background_color'    => $background_color,
                    'background_url'      => $background_url,
                )
            );

            return ob_get_clean();
        }

    }

    new GTBS_Public();
endif;
