<?php
/**
 * Manage slider shotcode
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPBS_Shortcode' ) ) :

    /**
     * Class WPBS_Shortcode
     *
     */
    class WPBS_Shortcode {

        /**
         * Constructor for the class.
         */
        public function __construct() {
            $this->events_handler();
        }

        /**
         * Initialize hooks and filters.
         */
        public function events_handler() {
            add_shortcode( 'wpbs_slider', [ $this, 'genrate_slider_Shortcode' ] );
        }

        /**
         * Generate slider shortcode
         *
         * @param array $args Shortcode arguments.
         * @return string Slider HTML.
         */
        public function genrate_slider_Shortcode( $args ) {
            $wpbs_slideshow_ID = !empty( $args['id'] ) ? $args['id'] : '';
            $this->slider_ID   = $wpbs_slideshow_ID;
    
            if ( empty( $wpbs_slideshow_ID ) ) :
                return '<p>' . esc_html__( "Error: Slideshow ID not found!", 'blocksy-slider' ) . '</p>';
            endif;
    
            $imageIDs         = json_decode( get_post_meta( $wpbs_slideshow_ID, 'wpbs_slider_image_ids', true ), true );
            $wpbsOptions      = get_post_meta( $wpbs_slideshow_ID, 'wpbs_slider_option', true );

            // Collect child slides (Gutenberg content)
            $child_slides = get_children( array(
                'post_parent' => $wpbs_slideshow_ID,
                'post_type'   => 'wpbs_slide',
                'numberposts' => -1,
                'orderby'     => 'menu_order',
                'order'       => 'ASC',
            ) );

            if ( empty( $child_slides ) || ! is_array( $child_slides ) ) :
                return '<p>' . esc_html__( "No slides available. Please add at least one image to continue.", 'blocksy-slider' ) . '</p>';
            endif;

            $slides = array();
            if ( $child_slides ) :
                foreach ( $child_slides as $slide ) :
                    // Store slide content with slide ID as key
                    $slides[ $slide->ID ] = $slide->post_content;
                    $background_settings[ $slide->ID ] = WPBS_Helper::wpbs_get_background_settings( $slide->ID );
                endforeach;
            endif;
    
            $attr_defaults = array(
                'navigation_arrow_style'                => '',
                'bullets_navigation_style'              => '',
                'custom_navigation_style'               => '',
                'control_lazyload_images'               => '',
                'pagination_type'                       => '',
                'progress_bar_position'                 => '',
                'control_slider_vertical'               => '',
                'thumb_gallery'                         => '',
                'thumb_gallery_width'                   => '',
                'thumb_gallery_height'                  => '',
                'width_image'                           => '',
                'height_image'                          => '',
                'image_unit'                            => '',
                'control_autoplay'                      => '',
                'control_autoplay_timeleft'             => '',
                'control_autoplay_timeleft_position'    => '',
                'control_autoplay_timeleft_font_size'   => '',
            );
     
            $attrs = shortcode_atts( $attr_defaults, $args );
     
            foreach ( $attrs as $key => $value ) :
                if ( $value !== '' ) :
                    $wpbsOptions[ $key ] = $value;
                endif;
            endforeach;
    
            $arrow_style                    = isset($wpbsOptions['navigation_arrow_style']) ? $wpbsOptions['navigation_arrow_style'] : 'style1';
            $bullets_style                  = isset($wpbsOptions['bullets_navigation_style']) ? $wpbsOptions['bullets_navigation_style'] : 'style1';
            $custom_style                   = isset($wpbsOptions['custom_navigation_style']) ? $wpbsOptions['custom_navigation_style'] : 'style1';
            $lazy_load                      = isset($wpbsOptions['control_lazyload_images']) ? $wpbsOptions['control_lazyload_images'] : '';
            $pagination_type                = isset($wpbsOptions['pagination_type']) ? $wpbsOptions['pagination_type'] : 'bullets';
            $progress_position              = isset($wpbsOptions['progress_bar_position']) ? $wpbsOptions['progress_bar_position'] : 'bottom';
            $is_vertical                    = isset($wpbsOptions['control_slider_vertical']) && ($wpbsOptions['control_slider_vertical'] == '1' || $wpbsOptions['control_slider_vertical'] === true);
            $thumb_gallery                  = isset($wpbsOptions['thumb_gallery']) && ($wpbsOptions['thumb_gallery'] == '1' || $wpbsOptions['thumb_gallery'] === true);
            $thumb_width                    = !empty($wpbsOptions['thumb_gallery_width']) ? (int)$wpbsOptions['thumb_gallery_width'] : 70;
            $thumb_height                   = !empty($wpbsOptions['thumb_gallery_height']) ? (int)$wpbsOptions['thumb_gallery_height'] : 70;
            $width_image_value              = !empty($wpbsOptions['width_image']) ? $wpbsOptions['width_image'] : 500;
            $height_image_value             = !empty($wpbsOptions['height_image']) ? $wpbsOptions['height_image'] : 500;
            $image_unit                     = !empty($wpbsOptions['image_unit']) ? $wpbsOptions['image_unit'] : 'px';
            $width_image                    = $width_image_value . $image_unit;
            $height_image                   = $height_image_value . $image_unit;
            $control_autoplay               = !empty($wpbsOptions['control_autoplay']) && $wpbsOptions['control_autoplay'] == '1';
            $control_autoplay_timeleft      = !empty($wpbsOptions['control_autoplay_timeleft']) && $wpbsOptions['control_autoplay_timeleft'] == '1';
            $zoom_enabled                   = !empty( $wpbsOptions['zoom_images'] ) && in_array( $wpbsOptions['zoom_images'], array( '1', 1, true, 'true', 'yes' ), true );
            $timeleft_position              = isset($wpbsOptions['control_autoplay_timeleft_position']) ? $wpbsOptions['control_autoplay_timeleft_position'] : 'bottom-right';
            $autoplay_timeleft_font_size    = isset($wpbsOptions['control_autoplay_timeleft_font_size']) ? (int)$wpbsOptions['control_autoplay_timeleft_font_size'] : 5;
    
            $timeleft_class = 'wpbs-timeleft-' . esc_attr($timeleft_position);
            $hasSlides      = !empty($slides) && is_array($slides);
            $hasImages      = !empty($imageIDs) && is_array($imageIDs);
    
            // Get custom class name
            $custom_class_name = isset($wpbsOptions['custom_class_name']) ? trim($wpbsOptions['custom_class_name']) : '';
            
            $slideshow_main_class = trim(
                'wpbs_slider--' . $wpbs_slideshow_ID .
                ' wpbs-swiper-arrow-' . esc_attr($arrow_style) .
                ($pagination_type === 'custom' ? '' : ' ' . 'wpbs-swiper-dot-' . esc_attr($bullets_style)) .
                ' wpbs-swiper-custom-' . esc_attr($custom_style) .
                ' wpbs-pagination-' . esc_attr($pagination_type) .
                ' wpbs-progress-' . esc_attr($progress_position) .
                ' wpbs-timeleft-' . esc_attr($timeleft_position) .
                (!empty($custom_class_name) ? ' ' . esc_attr(sanitize_html_class($custom_class_name)) : '')
            );

            $slider_background_settings = WPBS_Helper::wpbs_get_background_settings( $wpbs_slideshow_ID );

            $wpbs_css = WPBS_Public::dynamic_wpbs_css($wpbsOptions, $wpbs_slideshow_ID,
                array_merge(
                    $slider_background_settings,
                    array( 'background_settings' => $background_settings )
                )
            );
    
            ob_start();
            wpbs_get_template(
                'frontend/slideshow.php',
                array(
                    'slides'                        => $slides,
                    'imageIDs'                      => $imageIDs, 
                    'wpbs_slideshow_ID'             => $wpbs_slideshow_ID,
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
                    'wpbs_css'                      => $wpbs_css,
                    'options'                       => json_encode($wpbsOptions),
    
                )
            );
            return ob_get_clean();
        }

    }

    new WPBS_Shortcode();

endif;
