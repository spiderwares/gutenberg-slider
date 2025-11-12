<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'GTBS_Manage_Metadata' ) ) :

    /**
     * Class GTBS_Manage_Metadata
     *
     * Handles the registration of the Spin Metabox.
     */
    class GTBS_Manage_Metadata {

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
                'gtbs_slides',
                esc_html__( 'Manage Slides', 'gutenberg-slider' ),
                array( $this, 'genrate_slideshow_metabox' ),
                'gtbs_slider',
                'normal',
                'high'
            );

            add_meta_box(
                'gtbs_slider_options',
                esc_html__( 'Slider Options', 'gutenberg-slider' ),
                array( $this, 'render_gtbs_options' ),
                'gtbs_slider',
                'normal',
                'high'
            );
        }

        public function enqueue_scripts() {

            $screen = get_current_screen();
            if ( in_array( $screen->post_type, ['gtbs_slider', 'gtbs_slide'], true ) ) :
                wp_enqueue_script( 'jquery-ui-core' );
                wp_enqueue_script( 'jquery-ui-widget' );
                wp_enqueue_script( 'jquery-ui-sortable' );
                wp_enqueue_style( 'wp-color-picker' );
                wp_enqueue_script( 'wp-color-picker' );

                wp_enqueue_script( 
                    'wp-color-picker-alpha', 
                    GTBS_URL . 'assets/lib/wp-color-picker-alpha.js', 
                    array( 'jquery', 'wp-color-picker' ), 
                    GTBS_VERSION,
                    true
                );
                
                wp_enqueue_script( 
                    'gtbs-admin', 
                    GTBS_URL . 'assets/js/gtbs-admin.js', 
                    array( 'jquery', 'wp-color-picker-alpha' ), 
                    GTBS_VERSION, 
                    true 
                );

                wp_enqueue_style( 
                    'gtbs-admin-style', 
                    GTBS_URL . 'assets/css/gtbs-admin-style.css', 
                    array(), 
                    GTBS_VERSION 
                );
            endif;
        }

        public function genrate_slideshow_metabox( $post ) {
            $imageIDs = get_post_meta( $post->ID, 'gtbs_slider_image_ids', true );
            
            // if ($imageIDs && ($decoded = json_decode($imageIDs, true)) && is_array($decoded)) {
            //     $imageIDs = $decoded;
            // } elseif (!is_array($imageIDs)) {
            //     $imageIDs = [];
            // }            

            // $image_slide = [];
            // $decoded = json_decode(get_post_meta($post->ID, 'gtbs_slide_images', true), true);

            // if (is_array($decoded)) {
            //     foreach ($decoded as $sid => $imgs) {
            //         foreach ((array) $imgs as $id) {
            //             $image_slide[$id] = (int) $sid;
            //         }
            //     }
            // }

            $slides_query = get_children( 
                array(
                    'post_parent' => $post->ID,
                    'post_type'   => 'gtbs_slide',
                    'numberposts' => -1,
                    'orderby'     => 'menu_order',
                    'order'       => 'ASC',
                ) 
            );

            $slides_data = array();
            if ( $slides_query ) {
                foreach ( $slides_query as $slide ) {
                    $preview = GTBS_Helper::get_slide_preview_data( $slide );
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
                    'post_type' => 'gtbs_slide',
                    'parent_slider' => $post->ID
                ),
                admin_url( 'post-new.php' ) 
            );
    
            // Check if slider is saved (not auto-draft)
            $is_saved      = isset( $post->ID ) && $post->ID > 0 && $post->post_status !== 'auto-draft' ? true : false;
            $add_slide_url = isset( $add_slide_url ) ? $add_slide_url : '#';
    
            gtbs_get_template( 
                'metabox/slides.php', 
                array(
                    'metaKey'       => 'gtbs_slider_image_ids',
                    'slider_id'     => $post->ID,
                    'imageIDs'      => $imageIDs,
                    // 'imageSlide'    => $image_slide,
                    'slidesData'    => $slides_data,
                    'is_saved'      => $is_saved,
                    'add_slide_url' => esc_url( $url )
                )
            );
        }

        public function render_gtbs_options( $post ) {
			$settings = get_post_meta( $post->ID, 'gtbs', true );
			
			// Ensure settings is an array with default values
			if ( ! is_array( $settings ) ) :
				$settings = array();
            endif;

			require_once GTBS_PATH . 'includes/admin/settings/views/gtbs-option.php';
		}

    }

    new GTBS_Manage_Metadata();
endif;
