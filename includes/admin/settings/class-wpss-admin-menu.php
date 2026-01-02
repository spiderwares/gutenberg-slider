<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPSS_Admin_Menu' ) ) :

    /**
     * Class WPSS_Admin_Menu
     *
     * Handles the registration of the Spin Metabox.
     */
    class WPSS_Admin_Menu {

         /**
         * Constructor for the class.
         */
        public function __construct() {
            $this->events_handler();
        }

        /**
         * Initialize hooks and filters.
         */
        public function events_handler(){
            add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
        }

        /**
         * Enqueue scripts and styles.
         */
        public function enqueue_scripts() {

            $screen = get_current_screen();
            if ( in_array( $screen->post_type, ['wpss_slider', 'wpss_slide'], true ) ) :
                wp_enqueue_script( 'jquery-ui-core' );
                wp_enqueue_script( 'jquery-ui-widget' );
                wp_enqueue_script( 'jquery-ui-sortable' );
                wp_enqueue_style( 'wp-color-picker' );
                wp_enqueue_script( 'wp-color-picker' );

                wp_enqueue_script( 
                    'wp-color-picker-alpha', 
                    WPSS_URL . 'assets/lib/wp-color-picker-alpha.js', 
                    array( 'jquery', 'wp-color-picker' ), 
                    WPSS_VERSION,
                    true
                );
                
                wp_enqueue_script( 
                    'wpss-admin', 
                    WPSS_URL . 'assets/js/wpss-admin.js', 
                    array( 'jquery', 'wp-color-picker-alpha' ), 
                    WPSS_VERSION, 
                    true 
                );

                wp_enqueue_style( 
                    'wpss-admin-style', 
                    WPSS_URL . 'assets/css/wpss-admin-style.css', 
                    array(), 
                    WPSS_VERSION 
                );

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

                wp_enqueue_style( 'wp-block-library' );
                wp_enqueue_style( 'wp-block-library-theme' );

                wp_localize_script(
                    'wpss-admin',
                    'wpss_admin',
                    array(
                        'ajaxurl' => admin_url( 'admin-ajax.php' ),
                        'nonce'   => wp_create_nonce( 'wpss_admin_nonce' ),
                    )
                );

            endif;
        }

    }

    new WPSS_Admin_Menu();
endif;