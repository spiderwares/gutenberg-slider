<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'SLST_Manage_Metadata' ) ) :

    /**
     * Class SLST_Manage_Metadata
     *
     * Handles the registration of the Spin Metabox.
     */
    class SLST_Manage_Metadata {

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
            add_action( 'wp_ajax_slst_preview_refresh', [ $this, 'slst_get_preview' ] );
            add_action( 'wp_ajax_nopriv_slst_preview_refresh', [ $this, 'slst_get_preview' ] );
        }

        /**
         * Add meta boxes for spin metabox
         */
        public function add_meta_boxes() {

            add_meta_box(
                'slst_slides',
                esc_html__( 'Manage Slides', 'slider-studio' ),
                array( $this, 'genrate_slideshow_metabox' ),
                'slst_slider',
                'normal',
                'high'
            );

            add_meta_box(
                'slst_live_preview',
                esc_html__( 'Live Preview', 'slider-studio' ),
                array( $this, 'render_live_preview' ),
                'slst_slider',
                'normal',
                'high'
            );

            add_meta_box(
                'slst_slider_options',
                esc_html__( 'Slider Options', 'slider-studio' ),
                array( $this, 'render_slst_options' ),
                'slst_slider',
                'normal',
                'high'
            );

        }

        /**
         * Generate slideshow metabox.
         *
         */
        public function genrate_slideshow_metabox( $post ) {
            $imageIDs = get_post_meta( $post->ID, 'slst_slider_image_ids', true );

            $slides_query = get_children( 
                array(
                    'post_parent' => $post->ID,
                    'post_type'   => 'slst_slide',
                    'numberposts' => -1,
                    'orderby'     => 'menu_order',
                    'order'       => 'ASC',
                ) 
            );

            $slides_data = array();
            if ( $slides_query ) :
                foreach ( $slides_query as $slide ) :
                    $preview = SLST_Helper::get_slide_preview_data( $slide );
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
                    'post_type' => 'slst_slide',
                    'parent_slider' => $post->ID
                ),
                admin_url( 'post-new.php' ) 
            );
    
            // Check if slider is saved
            $is_saved      = isset( $post->ID ) && $post->ID > 0 && $post->post_status !== 'auto-draft' ? true : false;
            $add_slide_url = isset( $add_slide_url ) ? $add_slide_url : '#';
    
            slst_get_template( 
                'metabox/slides.php', 
                array(
                    'metaKey'       => 'slst_slider_image_ids',
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
        public function render_slst_options( $post ) {
			$settings = get_post_meta( $post->ID, 'slst', true );
			if ( ! is_array( $settings ) ) :
				$settings = array();
            endif;

			require_once SLST_PATH . 'includes/admin/settings/views/slst-option.php';
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
        public function slst_get_preview() {

             // Verify nonce for security
            if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'slst_admin_nonce' ) ) :
                wp_die( esc_html__( 'Security check failed.', 'slider-studio' ) );
            endif;  

            $post_id = isset( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : 0;
            if ( ! $post_id ) :
                wp_send_json_error( 'Invalid Post ID' );
            endif;

            $settings = array();
            if ( isset( $_POST['slst_slider_option'] ) && is_array( $_POST['slst_slider_option'] ) ) :
                $settings = map_deep( wp_unslash( $_POST['slst_slider_option'] ), 'sanitize_text_field' );
            endif;

            if ( isset( $_POST['slst_slide_ids'] ) && is_array( $_POST['slst_slide_ids'] ) ) :
                $settings['slst_slide_ids'] = array_map( 'absint', wp_unslash( $_POST['slst_slide_ids'] ) );
            endif;

            $this->generate_preview( $post_id, $settings );
            wp_die();
        }

        /**
         * Generate Live Preview
         *
         */
        public function generate_preview( $slst_slideshow_ID, $override_options = null ) {

            $scoped_global_css = '';
            if ( function_exists( 'wp_get_global_stylesheet' ) ) :
                $global_css = wp_get_global_stylesheet();
                if ( ! empty( $global_css ) ) :
                    $scoped_global_css = self::slst_scope_css( $global_css, '#slst_live_preview_container' );
                endif;
            endif;

            echo '<div id="slst_live_preview_container">';
            
            if ( ! empty( $scoped_global_css ) ) :
                echo '<style id="slst-preview-global-styles">' . esc_html( $scoped_global_css ) . '</style>';
            endif;
            
            if ( class_exists( 'SLST_Shortcode' ) ) :
                // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                echo SLST_Shortcode::render_slider( $slst_slideshow_ID, $override_options );
            endif;
            echo '</div>';
        }

        /**
         * Scope CSS to a specific container
         * 
         */
        private static function slst_scope_css( $css, $container_selector ) {
            if ( empty( $css ) || empty( $container_selector ) ) :
                return $css;
            endif;

            $css = preg_replace( '/\bbody\b(?=\s*\{)/', $container_selector, $css );
            $css = preg_replace( '/:root\s*\{/', $container_selector . ' {', $css );
            $css = preg_replace( '/\bhtml\b(?=\s*\{)/', $container_selector, $css );
            
            return $css;
        }

    }

    new SLST_Manage_Metadata();
endif;