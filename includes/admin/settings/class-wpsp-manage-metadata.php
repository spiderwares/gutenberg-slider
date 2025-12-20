<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPSP_Manage_Metadata' ) ) :

    /**
     * Class WPSP_Manage_Metadata
     *
     * Handles the registration of the Spin Metabox.
     */
    class WPSP_Manage_Metadata {

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
            add_action( 'wp_ajax_wpsp_preview_refresh', [ $this, 'wpsp_get_preview' ] );
        }

        /**
         * Add meta boxes for spin metabox
         */
        public function add_meta_boxes() {

            add_meta_box(
                'wpsp_slides',
                esc_html__( 'Manage Slides', 'sliderpress' ),
                array( $this, 'genrate_slideshow_metabox' ),
                'wpsp_slider',
                'normal',
                'high'
            );

            add_meta_box(
                'wpsp_live_preview',
                esc_html__( 'Live Preview', 'sliderpress' ),
                array( $this, 'render_live_preview' ),
                'wpsp_slider',
                'side',
                'high'
            );

            add_meta_box(
                'wpsp_slider_options',
                esc_html__( 'Slider Options', 'sliderpress' ),
                array( $this, 'render_wpsp_options' ),
                'wpsp_slider',
                'normal',
                'high'
            );

        }

        /**
         * Generate slideshow metabox.
         *
         */
        public function genrate_slideshow_metabox( $post ) {
            $imageIDs = get_post_meta( $post->ID, 'wpsp_slider_image_ids', true );

            $slides_query = get_children( 
                array(
                    'post_parent' => $post->ID,
                    'post_type'   => 'wpsp_slide',
                    'numberposts' => -1,
                    'orderby'     => 'menu_order',
                    'order'       => 'ASC',
                ) 
            );

            $slides_data = array();
            if ( $slides_query ) :
                foreach ( $slides_query as $slide ) :
                    $preview = WPSP_Helper::get_slide_preview_data( $slide );
                    $slides_data[] = array(
                        'id'     => $slide->ID,
                        'title'  => get_the_title( $slide ),
                        'type'   => $preview['type'],
                        'thumb'  => $preview['thumb'],
                        'edit'   => admin_url( 'post.php?post=' . $slide->ID . '&action=edit' ),
                    );
                endforeach;
            endif;
            
            $url = add_query_arg( 
                array(    
                    'post_type' => 'wpsp_slide',
                    'parent_slider' => $post->ID
                ),
                admin_url( 'post-new.php' ) 
            );
    
            // Check if slider is saved
            $is_saved      = isset( $post->ID ) && $post->ID > 0 && $post->post_status !== 'auto-draft' ? true : false;
            $add_slide_url = isset( $add_slide_url ) ? $add_slide_url : '#';
    
            wpsp_get_template( 
                'metabox/slides.php', 
                array(
                    'metaKey'       => 'wpsp_slider_image_ids',
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
         */
        public function render_wpsp_options( $post ) {
			$settings = get_post_meta( $post->ID, 'wpsp', true );
			if ( ! is_array( $settings ) ) :
				$settings = array();
            endif;

			require_once WPSP_PATH . 'includes/admin/settings/views/wpsp-option.php';
		}

        /*
         * Render Live Preview metabox.
         *
         */
        public function render_live_preview( $post ) {
            $this->generate_preview( $post->ID );
        }

        /**
         * AJAX handler for refreshing preview
         * 
         */
        public function wpsp_get_preview() {

             // Verify nonce for security
            if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'wpsp_admin_nonce' ) ) :
                wp_die( esc_html__( 'Security check failed.', 'sliderpress' ) );
            endif;  

            $post_id = isset( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : 0;
            if ( ! $post_id ) :
                wp_send_json_error( 'Invalid Post ID' );
            endif;

            $settings = array();
            if ( isset( $_POST['wpsp_slider_option'] ) && is_array( $_POST['wpsp_slider_option'] ) ) :
                // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
                $raw_settings = wp_unslash( $_POST['wpsp_slider_option'] );
                $settings = map_deep( $raw_settings, 'sanitize_text_field' );
            endif;

            $this->generate_preview( $post_id, $settings );
            wp_die();
        }

        /**
         * Generate Live Preview
         *
         */
        public function generate_preview( $wpsp_slideshow_ID, $override_options = null ) {

            echo '<div id="wpsp_live_preview_container">';
            if ( class_exists( 'WPSP_Shortcode' ) ) :
                // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                echo WPSP_Shortcode::render_slider( $wpsp_slideshow_ID, $override_options );
            endif;
            echo '</div>';
        }

    }

    new WPSP_Manage_Metadata();
endif;