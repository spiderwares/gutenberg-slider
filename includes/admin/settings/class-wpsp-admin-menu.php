<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPSP_Admin_Menu' ) ) :

    /**
     * Class WPSP_Admin_Menu
     *
     * Handles the registration of the Spin Metabox.
     */
    class WPSP_Admin_Menu {

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
            if ( in_array( $screen->post_type, ['wpsp_slider', 'wpsp_slide'], true ) ) :
                wp_enqueue_script( 'jquery-ui-core' );
                wp_enqueue_script( 'jquery-ui-widget' );
                wp_enqueue_script( 'jquery-ui-sortable' );
                wp_enqueue_style( 'wp-color-picker' );
                wp_enqueue_script( 'wp-color-picker' );

                wp_enqueue_script( 
                    'wp-color-picker-alpha', 
                    WPSP_URL . 'assets/lib/wp-color-picker-alpha.js', 
                    array( 'jquery', 'wp-color-picker' ), 
                    WPSP_VERSION,
                    true
                );
                
                wp_enqueue_script( 
                    'wpsp-admin', 
                    WPSP_URL . 'assets/js/wpsp-admin.js', 
                    array( 'jquery', 'wp-color-picker-alpha' ), 
                    WPSP_VERSION, 
                    true 
                );

                wp_enqueue_style( 
                    'wpsp-admin-style', 
                    WPSP_URL . 'assets/css/wpsp-admin-style.css', 
                    array(), 
                    WPSP_VERSION 
                );

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

                wp_enqueue_style( 'wp-block-library' );
                wp_enqueue_style( 'wp-block-library-theme' );

                wp_localize_script(
                    'wpsp-admin',
                    'wpsp_admin',
                    array(
                        'ajaxurl' => admin_url( 'admin-ajax.php' ),
                        'nonce'   => wp_create_nonce( 'wpsp_admin_nonce' ),
                    )
                );

            endif;
        }

    }

    new WPSP_Admin_Menu();
endif;