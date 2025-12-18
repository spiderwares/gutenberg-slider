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
            add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
            add_action( 'wp_ajax_wpsp_preview_refresh', [ $this, 'ajax_get_preview' ] );
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

                // Enqueue Frontend assets for Live Preview
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

                // Enqueue Gutenberg Block Styles
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

        /**
         * Generate slideshow metabox.
         *
         * @param object $post Post object.
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
    
            // Check if slider is saved (not auto-draft)
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
         * @param object $post Post object.
         */
        public function render_wpsp_options( $post ) {
			$settings = get_post_meta( $post->ID, 'wpsp', true );
			
			// Ensure settings is an array with default values
			if ( ! is_array( $settings ) ) :
				$settings = array();
            endif;

			require_once WPSP_PATH . 'includes/admin/settings/views/wpsp-option.php';
		}

        /**
         * Render Live Preview metabox.
         *
         * @param object $post Post object.
         */
        public function render_live_preview( $post ) {
            $this->generate_preview_output( $post->ID );
        }

        /**
         * AJAX handler for refreshing preview
         */
        public function ajax_get_preview() {

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
                // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- Sanitized via map_deep below
                $raw_settings = wp_unslash( $_POST['wpsp_slider_option'] );
                $settings = map_deep( $raw_settings, 'sanitize_text_field' );
            endif;

            $this->generate_preview_output( $post_id, $settings );
            wp_die();
        }

        /**
         * Generate Live Preview HTML
         *
         */
        public function generate_preview_output( $wpsp_slideshow_ID, $override_options = null ) {

            if ( ! class_exists( 'WPSP_Public' ) ) :
                require_once WPSP_PATH . 'includes/public/class-wpsp-public.php';
            endif;

            $imageIDs      = json_decode( get_post_meta( $wpsp_slideshow_ID, 'wpsp_slider_image_ids', true ), true );
            
            if ( null === $override_options ) :
                $wpspOptions = get_post_meta( $wpsp_slideshow_ID, 'wpsp_slider_option', true );
                if( empty( $wpspOptions ) ) :
                    $wpspOptions = get_post_meta( $wpsp_slideshow_ID, 'wpsp', true );
                    if( ! is_array( $wpspOptions ) ) $wpspOptions = array();
                endif;
            else :
                $wpspOptions = $override_options;
            endif;

            // Collect child slides
            $child_slides = get_children( array(
                'post_parent' => $wpsp_slideshow_ID,
                'post_type'   => 'wpsp_slide',
                'numberposts' => -1,
                'orderby'     => 'menu_order',
                'order'       => 'ASC',
            ) );

            $slides = array();
            $background_settings = array();
            if ( $child_slides ) :
                foreach ( $child_slides as $slide ) :
                    $slides[ $slide->ID ] = $slide->post_content;
                    $background_settings[ $slide->ID ] = WPSP_Helper::wpsp_get_background_settings( $slide->ID );
                endforeach;
            endif;
            
             $attr_defaults = array(
                'navigation_arrow_style'                => 'style1',
                'bullets_navigation_style'              => 'style1',
                'custom_navigation_style'               => 'style1',
                'control_lazyload_images'               => '',
                'pagination_type'                       => 'bullets',
                'progress_bar_position'                 => 'bottom',
                'control_slider_vertical'               => '',
                'thumb_gallery'                         => '',
                'thumb_gallery_width'                   => '70',
                'thumb_gallery_height'                  => '70',
                'width_image'                           => '500',
                'height_image'                          => '500',
                'image_unit'                            => 'px',
                'control_autoplay'                      => '',
                'control_autoplay_timeleft'             => '',
                'control_autoplay_timeleft_position'    => 'bottom-right',
                'control_autoplay_timeleft_font_size'   => '5',
                'zoom_images'                           => '',
                'custom_class_name'                     => '',
            );
            
            $wpspOptions = wp_parse_args( $wpspOptions, $attr_defaults );

            // Extract logic
             $arrow_style                   = isset($wpspOptions['navigation_arrow_style']) ? $wpspOptions['navigation_arrow_style'] : 'style1';
            $bullets_style                  = isset($wpspOptions['bullets_navigation_style']) ? $wpspOptions['bullets_navigation_style'] : 'style1';
            $custom_style                   = isset($wpspOptions['custom_navigation_style']) ? $wpspOptions['custom_navigation_style'] : 'style1';
            $lazy_load                      = isset($wpspOptions['control_lazyload_images']) ? $wpspOptions['control_lazyload_images'] : '';
            $pagination_type                = isset($wpspOptions['pagination_type']) ? $wpspOptions['pagination_type'] : 'bullets';
            $progress_position              = isset($wpspOptions['progress_bar_position']) ? $wpspOptions['progress_bar_position'] : 'bottom';
            $is_vertical                    = isset($wpspOptions['control_slider_vertical']) && ($wpspOptions['control_slider_vertical'] == '1' || $wpspOptions['control_slider_vertical'] === true);
            $thumb_gallery                  = isset($wpspOptions['thumb_gallery']) && ($wpspOptions['thumb_gallery'] == '1' || $wpspOptions['thumb_gallery'] === true);
            $thumb_width                    = !empty($wpspOptions['thumb_gallery_width']) ? (int)$wpspOptions['thumb_gallery_width'] : 70;
            $thumb_height                   = !empty($wpspOptions['thumb_gallery_height']) ? (int)$wpspOptions['thumb_gallery_height'] : 70;
            $width_image_value              = !empty($wpspOptions['width_image']) ? $wpspOptions['width_image'] : 500;
            $height_image_value             = !empty($wpspOptions['height_image']) ? $wpspOptions['height_image'] : 500;
            $image_unit                     = !empty($wpspOptions['image_unit']) ? $wpspOptions['image_unit'] : 'px';
            $width_image                    = $width_image_value . $image_unit;
            $height_image                   = $height_image_value . $image_unit;
            $control_autoplay               = !empty($wpspOptions['control_autoplay']) && $wpspOptions['control_autoplay'] == '1';
            $control_autoplay_timeleft      = !empty($wpspOptions['control_autoplay_timeleft']) && $wpspOptions['control_autoplay_timeleft'] == '1';
            $zoom_enabled                   = !empty( $wpspOptions['zoom_images'] ) && in_array( $wpspOptions['zoom_images'], array( '1', 1, true, 'true', 'yes' ), true );
            $timeleft_position              = isset($wpspOptions['control_autoplay_timeleft_position']) ? $wpspOptions['control_autoplay_timeleft_position'] : 'bottom-right';
            $autoplay_timeleft_font_size    = isset($wpspOptions['control_autoplay_timeleft_font_size']) ? (int)$wpspOptions['control_autoplay_timeleft_font_size'] : 5;
    
            $timeleft_class = 'wpsp-timeleft-' . esc_attr($timeleft_position);
            $hasSlides      = !empty($slides) && is_array($slides);
            $hasImages      = !empty($imageIDs) && is_array($imageIDs);
    
            $custom_class_name = isset($wpspOptions['custom_class_name']) ? trim($wpspOptions['custom_class_name']) : '';
            
            $slideshow_main_class = trim(
                'wpsp_slider--' . $wpsp_slideshow_ID .
                ' wpsp-swiper-arrow-' . esc_attr($arrow_style) .
                ($pagination_type === 'custom' ? '' : ' ' . 'wpsp-swiper-dot-' . esc_attr($bullets_style)) .
                ' wpsp-swiper-custom-' . esc_attr($custom_style) .
                ' wpsp-pagination-' . esc_attr($pagination_type) .
                ' wpsp-progress-' . esc_attr($progress_position) .
                ' wpsp-timeleft-' . esc_attr($timeleft_position) .
                (!empty($custom_class_name) ? ' ' . esc_attr(sanitize_html_class($custom_class_name)) : '')
            );

            $slider_background_settings = WPSP_Helper::wpsp_get_background_settings( $wpsp_slideshow_ID );

            $wpsp_css = WPSP_Public::dynamic_wpsp_css($wpspOptions, $wpsp_slideshow_ID,
                array_merge(
                    $slider_background_settings,
                    array( 'background_settings' => $background_settings )
                )
            );

            echo '<div id="wpsp_live_preview" style="position: relative; width: 100%; overflow: hidden;">';
            
            if( !empty($wpsp_css) ) :
                echo '<style>' . wp_strip_all_tags( $wpsp_css, true ) . '</style>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            endif;

            wpsp_get_template(
                'frontend/slideshow.php',
                array(
                    'slides'                        => $slides,
                    'imageIDs'                      => $imageIDs, 
                    'wpsp_slideshow_ID'             => $wpsp_slideshow_ID,
                    'slideshow_main_class'          => $slideshow_main_class,
                    'bullets_style'                 => $bullets_style,
                    'custom_style'                  => $custom_style,
                    'arrow_style'                   => $arrow_style,
                    'lazy_load'                     => $lazy_load,
                    'pagination_type'               => $pagination_type,
                    'thumb_gallery'                 => $thumb_gallery,
                    'thumb_width'                   => $thumb_width,
                    'thumb_height'                  => $thumb_height,
                    'timeleft_position'             => $timeleft_position,
                    'timeleft_class'                => $timeleft_class,
                    'control_autoplay'              => $control_autoplay,
                    'autoplay_timeleft_font_size'   => $autoplay_timeleft_font_size,
                    'control_autoplay_timeleft'     => $control_autoplay_timeleft,
                    'hasSlides'                     => $hasSlides,
                    'hasImages'                     => $hasImages,
                    'zoom_enabled'                  => $zoom_enabled,
                    'wpsp_css'                      => $wpsp_css,
                    'options'                       => json_encode($wpspOptions),
    
                )
            );

            echo '</div>';
        }

    }

    new WPSP_Manage_Metadata();
endif;