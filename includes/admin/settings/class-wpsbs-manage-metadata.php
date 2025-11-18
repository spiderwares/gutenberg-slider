<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPSBS_Manage_Metadata' ) ) :

    /**
     * Class WPSBS_Manage_Metadata
     *
     * Handles the registration of the Spin Metabox.
     */
    class WPSBS_Manage_Metadata {

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
            add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
            add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
        }

        /**
         * Add meta boxes for spin metabox
         */
        public function add_meta_boxes() {

            add_meta_box(
                'wpsbs_slides',
                esc_html__( 'Manage Slides', 'smart-block-slider' ),
                array( $this, 'genrate_slideshow_metabox' ),
                'wpsbs_slider',
                'normal',
                'high'
            );

            add_meta_box(
                'wpsbs_slider_options',
                esc_html__( 'Slider Options', 'smart-block-slider' ),
                array( $this, 'render_wpsbs_options' ),
                'wpsbs_slider',
                'normal',
                'high'
            );
        }

        /**
         * Enqueue scripts and styles.
         */
        public function enqueue_scripts() {

            $screen = get_current_screen();
            if ( in_array( $screen->post_type, ['wpsbs_slider', 'wpsbs_slide'], true ) ) :
                wp_enqueue_script( 'jquery-ui-core' );
                wp_enqueue_script( 'jquery-ui-widget' );
                wp_enqueue_script( 'jquery-ui-sortable' );
                wp_enqueue_style( 'wp-color-picker' );
                wp_enqueue_script( 'wp-color-picker' );

                wp_enqueue_script( 
                    'wp-color-picker-alpha', 
                    WPSBS_URL . 'assets/lib/wp-color-picker-alpha.js', 
                    array( 'jquery', 'wp-color-picker' ), 
                    WPSBS_VERSION,
                    true
                );
                
                wp_enqueue_script( 
                    'wpsbs-admin', 
                    WPSBS_URL . 'assets/js/wpsbs-admin.js', 
                    array( 'jquery', 'wp-color-picker-alpha' ), 
                    WPSBS_VERSION, 
                    true 
                );

                wp_enqueue_style( 
                    'wpsbs-admin-style', 
                    WPSBS_URL . 'assets/css/wpsbs-admin-style.css', 
                    array(), 
                    WPSBS_VERSION 
                );
            endif;
        }

        /**
         * Generate slideshow metabox.
         *
         * @param object $post Post object.
         */
        public function genrate_slideshow_metabox( $post ) {
            $imageIDs = get_post_meta( $post->ID, 'wpsbs_slider_image_ids', true );

            $slides_query = get_children( 
                array(
                    'post_parent' => $post->ID,
                    'post_type'   => 'wpsbs_slide',
                    'numberposts' => -1,
                    'orderby'     => 'menu_order',
                    'order'       => 'ASC',
                ) 
            );

            $slides_data = array();
            if ( $slides_query ) {
                foreach ( $slides_query as $slide ) {
                    $preview = WPSBS_Helper::get_slide_preview_data( $slide );
                    $slides_data[] = array(
                        'id'     => $slide->ID,
                        'title'  => get_the_title( $slide ),
                        'type'   => $preview['type'],
                        'thumb'  => $preview['thumb'],
                        'edit'   => admin_url( 'post.php?post=' . $slide->ID . '&action=edit' ),
                    );
                }
            }
            
            $url = add_query_arg( 
                array(    
                    'post_type' => 'wpsbs_slide',
                    'parent_slider' => $post->ID
                ),
                admin_url( 'post-new.php' ) 
            );
    
            // Check if slider is saved (not auto-draft)
            $is_saved      = isset( $post->ID ) && $post->ID > 0 && $post->post_status !== 'auto-draft' ? true : false;
            $add_slide_url = isset( $add_slide_url ) ? $add_slide_url : '#';
    
            wpsbs_get_template( 
                'metabox/slides.php', 
                array(
                    'metaKey'       => 'wpsbs_slider_image_ids',
                    'slider_id'     => $post->ID,
                    'imageIDs'      => $imageIDs,
                    'slidesData'    => $slides_data,
                    'is_saved'      => $is_saved,
                    'add_slide_url' => esc_url( $url )
                )
            );
        }

        /**
         * Render slider options metabox.
         *
         * @param object $post Post object.
         */
        public function render_wpsbs_options( $post ) {
			$settings = get_post_meta( $post->ID, 'wpsbs', true );
			
			// Ensure settings is an array with default values
			if ( ! is_array( $settings ) ) :
				$settings = array();
            endif;

			require_once WPSBS_PATH . 'includes/admin/settings/views/wpsbs-option.php';
		}

    }

    new WPSBS_Manage_Metadata();
endif;
