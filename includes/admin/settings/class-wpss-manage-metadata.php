<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPSS_Manage_Metadata' ) ) :

    /**
     * Class WPSS_Manage_Metadata
     *
     * Handles the registration of the Spin Metabox.
     */
    class WPSS_Manage_Metadata {

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
            add_action( 'wp_ajax_wpss_preview_refresh', [ $this, 'wpss_get_preview' ] );
            add_action( 'wp_ajax_nopriv_wpss_preview_refresh', [ $this, 'wpss_get_preview' ] );
        }

        /**
         * Add meta boxes for spin metabox
         */
        public function add_meta_boxes() {

            add_meta_box(
                'wpss_slides',
                esc_html__( 'Manage Slides', 'slider-studio' ),
                array( $this, 'genrate_slideshow_metabox' ),
                'wpss_slider',
                'normal',
                'high'
            );

            add_meta_box(
                'wpss_live_preview',
                esc_html__( 'Live Preview', 'slider-studio' ),
                array( $this, 'render_live_preview' ),
                'wpss_slider',
                'side',
                'high'
            );

            add_meta_box(
                'wpss_slider_options',
                esc_html__( 'Slider Options', 'slider-studio' ),
                array( $this, 'render_wpss_options' ),
                'wpss_slider',
                'normal',
                'high'
            );

        }

        /**
         * Generate slideshow metabox.
         *
         */
        public function genrate_slideshow_metabox( $post ) {
            $imageIDs = get_post_meta( $post->ID, 'wpss_slider_image_ids', true );

            $slides_query = get_children( 
                array(
                    'post_parent' => $post->ID,
                    'post_type'   => 'wpss_slide',
                    'numberposts' => -1,
                    'orderby'     => 'menu_order',
                    'order'       => 'ASC',
                ) 
            );

            $slides_data = array();
            if ( $slides_query ) :
                foreach ( $slides_query as $slide ) :
                    $preview = WPSS_Helper::get_slide_preview_data( $slide );
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
                    'post_type' => 'wpss_slide',
                    'parent_slider' => $post->ID
                ),
                admin_url( 'post-new.php' ) 
            );
    
            // Check if slider is saved
            $is_saved      = isset( $post->ID ) && $post->ID > 0 && $post->post_status !== 'auto-draft' ? true : false;
            $add_slide_url = isset( $add_slide_url ) ? $add_slide_url : '#';
    
            wpss_get_template( 
                'metabox/slides.php', 
                array(
                    'metaKey'       => 'wpss_slider_image_ids',
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
        public function render_wpss_options( $post ) {
			$settings = get_post_meta( $post->ID, 'wpss', true );
			if ( ! is_array( $settings ) ) :
				$settings = array();
            endif;

			require_once WPSS_PATH . 'includes/admin/settings/views/wpss-option.php';
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
        public function wpss_get_preview() {

             // Verify nonce for security
            if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'wpss_admin_nonce' ) ) :
                wp_die( esc_html__( 'Security check failed.', 'slider-studio' ) );
            endif;  

            $post_id = isset( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : 0;
            if ( ! $post_id ) :
                wp_send_json_error( 'Invalid Post ID' );
            endif;

            $settings = array();
            if ( isset( $_POST['wpss_slider_option'] ) && is_array( $_POST['wpss_slider_option'] ) ) :
                // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
                $raw_settings = wp_unslash( $_POST['wpss_slider_option'] );
                $settings = map_deep( $raw_settings, 'sanitize_text_field' );
            endif;

            if ( isset( $_POST['wpss_slide_ids'] ) && is_array( $_POST['wpss_slide_ids'] ) ) :
                $settings['wpss_slide_ids'] = array_map( 'absint', wp_unslash( $_POST['wpss_slide_ids'] ) );
            endif;

            $this->generate_preview( $post_id, $settings );
            wp_die();
        }

        /**
         * Generate Live Preview
         *
         */
        public function generate_preview( $wpss_slideshow_ID, $override_options = null ) {

            $scoped_global_css = '';
            if ( function_exists( 'wp_get_global_stylesheet' ) ) :
                $global_css = wp_get_global_stylesheet();
                if ( ! empty( $global_css ) ) :
                    $scoped_global_css = self::wpss_scope_css( $global_css, '#wpss_live_preview_container' );
                endif;
            endif;

            echo '<div id="wpss_live_preview_container">';
            
            if ( ! empty( $scoped_global_css ) ) :
                echo '<style id="wpss-preview-global-styles">' . esc_html( $scoped_global_css ) . '</style>';
            endif;
            
            if ( class_exists( 'WPSS_Shortcode' ) ) :
                // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                echo WPSS_Shortcode::render_slider( $wpss_slideshow_ID, $override_options );
            endif;
            echo '</div>';
        }

        /**
         * Scope CSS to a specific container
         * 
         */
        private static function wpss_scope_css( $css, $container_selector ) {
            if ( empty( $css ) || empty( $container_selector ) ) :
                return $css;
            endif;

            $css = preg_replace( '/\bbody\b(?=\s*\{)/', $container_selector, $css );
            $css = preg_replace( '/:root\s*\{/', $container_selector . ' {', $css );
            $css = preg_replace( '/\bhtml\b(?=\s*\{)/', $container_selector, $css );
            
            return $css;
        }

    }

    new WPSS_Manage_Metadata();
endif;