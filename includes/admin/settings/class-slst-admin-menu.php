<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'SLST_Admin_Menu' ) ) :

    /**
     * Class SLST_Admin_Menu
     *
     * Handles the registration of the Spin Metabox.
     */
    class SLST_Admin_Menu {

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
            if ( in_array( $screen->post_type, ['slst_slider', 'slst_slide'], true ) ) :
                wp_enqueue_script( 'jquery-ui-core' );
                wp_enqueue_script( 'jquery-ui-widget' );
                wp_enqueue_script( 'jquery-ui-sortable' );
                wp_enqueue_style( 'wp-color-picker' );
                wp_enqueue_script( 'wp-color-picker' );

                wp_enqueue_script( 
                    'wp-color-picker-alpha', 
                    SLST_URL . 'assets/lib/wp-color-picker-alpha.js', 
                    array( 'jquery', 'wp-color-picker' ), 
                    SLST_VERSION,
                    true
                );
                
                wp_enqueue_script( 
                    'slst-admin', 
                    SLST_URL . 'assets/js/slst-admin.js', 
                    array( 'jquery', 'wp-color-picker-alpha' ), 
                    SLST_VERSION, 
                    true 
                );

                wp_enqueue_style( 
                    'slst-admin-style', 
                    SLST_URL . 'assets/css/slst-admin-style.css', 
                    array(), 
                    SLST_VERSION 
                );

                wp_enqueue_script( 
                    'swiper-bundle.min--js', 
                    SLST_URL . 'assets/lib/swiper-bundle.min.js', 
                    array(), 
                    SLST_VERSION, 
                    true 
                );
    
                wp_enqueue_style( 
                    'swiper-bundle.min--css', 
                    SLST_URL . 'assets/lib/swiper-bundle.min.css', 
                    array(), 
                    SLST_VERSION
                );
    
                wp_enqueue_script( 'wp-hooks' );
                
                wp_enqueue_script(
                    'slst-frontend',
                    SLST_URL . 'assets/js/slst-frontend.js',
                    array( 'jquery' , 'wp-hooks' ),
                    SLST_VERSION,
                    true
                );
    
                wp_enqueue_style(
                    'slst-frontend-style',
                    SLST_URL . 'assets/css/slst-frontend-style.css',
                    array(),    
                    SLST_VERSION,
                );

                wp_enqueue_style(
                    'slst-tab',
                    SLST_URL . 'assets/css/slst-tab.css',
                    array(),
                    SLST_VERSION 
                );

                wp_enqueue_style( 'wp-block-library' );
                wp_enqueue_style( 'wp-block-library-theme' );

                wp_localize_script(
                    'slst-admin',
                    'slst_admin',
                    array(
                        'ajaxurl' => admin_url( 'admin-ajax.php' ),
                        'nonce'   => wp_create_nonce( 'slst_admin_nonce' ),
                    )
                );

            endif;
        }

    }

    new SLST_Admin_Menu();
endif;