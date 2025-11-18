<?php
/**
 * Manage slider shotcode
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPSBS_Shortcode' ) ) :

    /**
     * Class WPSBS_Shortcode
     *
     */
    class WPSBS_Shortcode {

        /**
         * Constructor for the class.
         */
        public function __construct() {
            $this->event_handler();
        }

        /**
         * Initialize hooks and filters.
         */
        public function event_handler() {
            add_shortcode( 'wpsbs_slider', [ $this, 'genrate_slider_Shortcode' ] );
        }

        /**
         * Generate slider shortcode
         *
         * @param array $args Shortcode arguments.
         * @return string Slider HTML.
         */
        public function genrate_slider_Shortcode( $args ) {
            $wpsbs_slideshow_ID = !empty( $args['id'] ) ? $args['id'] : '';
            $this->slider_ID   = $wpsbs_slideshow_ID;
    
            if ( empty( $wpsbs_slideshow_ID ) ) :
                return '<p>' . esc_html__( "Error: Slideshow ID not found!", 'smart-block-slider' ) . '</p>';
            endif;
    
            $imageIDs         = json_decode( get_post_meta( $wpsbs_slideshow_ID, 'wpsbs_slider_image_ids', true ), true );
            $wpsbsOptions      = get_post_meta( $wpsbs_slideshow_ID, 'wpsbs_slider_option', true );

            // Collect child slides (Gutenberg content)
            $child_slides = get_children( array(
                'post_parent' => $wpsbs_slideshow_ID,
                'post_type'   => 'wpsbs_slide',
                'numberposts' => -1,
                'orderby'     => 'menu_order',
                'order'       => 'ASC',
            ) );

            if ( empty( $child_slides ) || ! is_array( $child_slides ) ) :
                return '<p>' . esc_html__( "No slides available. Please add at least one image to continue.", 'smart-block-slider' ) . '</p>';
            endif;

            $slides = array();
            if ( $child_slides ) :
                foreach ( $child_slides as $slide ) :
                    // Store slide content with slide ID as key
                    $slides[ $slide->ID ] = $slide->post_content;
                    $slides_background_settings[ $slide->ID ] = WPSBS_Helper::wpsbs_get_background_settings( $slide->ID );
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
                'control_autoplay_time'             => '',
                'control_autoplay_time_position'    => '',
                'control_autoplay_time_font_size'   => '',
            );
     
            $attrs = shortcode_atts( $attr_defaults, $args );
     
            foreach ( $attrs as $key => $value ) :
                if ( $value !== '' ) :
                    $wpsbsOptions[ $key ] = $value;
                endif;
            endforeach;
    
            $arrow_style                    = isset($wpsbsOptions['navigation_arrow_style']) ? $wpsbsOptions['navigation_arrow_style'] : 'style1';
            $bullets_style                  = isset($wpsbsOptions['bullets_navigation_style']) ? $wpsbsOptions['bullets_navigation_style'] : 'style1';
            $custom_style                   = isset($wpsbsOptions['custom_navigation_style']) ? $wpsbsOptions['custom_navigation_style'] : 'style1';
            $lazy_load                      = isset($wpsbsOptions['control_lazyload_images']) ? $wpsbsOptions['control_lazyload_images'] : '';
            $pagination_type                = isset($wpsbsOptions['pagination_type']) ? $wpsbsOptions['pagination_type'] : 'bullets';
            $progress_position              = isset($wpsbsOptions['progress_bar_position']) ? $wpsbsOptions['progress_bar_position'] : 'bottom';
            $is_vertical                    = isset($wpsbsOptions['control_slider_vertical']) && ($wpsbsOptions['control_slider_vertical'] == '1' || $wpsbsOptions['control_slider_vertical'] === true);
            $thumb_gallery                  = isset($wpsbsOptions['thumb_gallery']) && ($wpsbsOptions['thumb_gallery'] == '1' || $wpsbsOptions['thumb_gallery'] === true);
            $thumb_width                    = !empty($wpsbsOptions['thumb_gallery_width']) ? (int)$wpsbsOptions['thumb_gallery_width'] : 70;
            $thumb_height                   = !empty($wpsbsOptions['thumb_gallery_height']) ? (int)$wpsbsOptions['thumb_gallery_height'] : 70;
            $width_image_value              = !empty($wpsbsOptions['width_image']) ? $wpsbsOptions['width_image'] : 500;
            $height_image_value             = !empty($wpsbsOptions['height_image']) ? $wpsbsOptions['height_image'] : 500;
            $image_unit                     = !empty($wpsbsOptions['image_unit']) ? $wpsbsOptions['image_unit'] : 'px';
            $width_image                    = $width_image_value . $image_unit;
            $height_image                   = $height_image_value . $image_unit;

            $enable_grid_layout             = isset($wpsbsOptions['enable_grid_layout']) && ($wpsbsOptions['enable_grid_layout'] == '1' || $wpsbsOptions['enable_grid_layout'] === true);
            $grid_layout_axis               = isset($wpsbsOptions['grid_layout_axis']) ? $wpsbsOptions['grid_layout_axis'] : 'row';
            $grid_count                     = !empty($wpsbsOptions['grid_count']) ? (int)$wpsbsOptions['grid_count'] : 2;
            
            if ( $is_vertical ) :
                $wrapper_style = '';
            elseif ( $enable_grid_layout && $grid_layout_axis === 'row' ) :
                $total_height = $height_image_value * $grid_count;
                $wrapper_style = 'style="max-width:' . esc_attr($width_image) . '; height:' . esc_attr($total_height . $image_unit) . ';"';
            else :
                $wrapper_style = 'style="max-width:' . esc_attr($width_image) . '; height:' . esc_attr($height_image) . ';"';
            endif;
            
            $control_autoplay               = !empty($wpsbsOptions['control_autoplay']) && $wpsbsOptions['control_autoplay'] == '1';
            $control_autoplay_time      = !empty($wpsbsOptions['control_autoplay_time']) && $wpsbsOptions['control_autoplay_time'] == '1';
            $timeleft_position              = isset($wpsbsOptions['control_autoplay_time_position']) ? $wpsbsOptions['control_autoplay_time_position'] : 'bottom-right';
            $autoplay_timeleft_font_size    = isset($wpsbsOptions['control_autoplay_time_font_size']) ? (int)$wpsbsOptions['control_autoplay_time_font_size'] : 5;
    
            $timeleft_class = 'wpsbs-timeleft-' . esc_attr($timeleft_position);
            $hasSlides      = !empty($slides) && is_array($slides);
            $hasImages      = !empty($imageIDs) && is_array($imageIDs);
    
            // Get custom class name
            $custom_class_name = isset($wpsbsOptions['custom_class_name']) ? trim($wpsbsOptions['custom_class_name']) : '';
            
            $slideshow_main_class = trim(
                'wpsbs_slider--' . $wpsbs_slideshow_ID .
                ' wpsbs-swiper-arrow-' . esc_attr($arrow_style) .
                ($pagination_type === 'custom' ? '' : ' ' . 'wpsbs-swiper-dot-' . esc_attr($bullets_style)) .
                ' wpsbs-swiper-custom-' . esc_attr($custom_style) .
                ' wpsbs-pagination-' . esc_attr($pagination_type) .
                ' wpsbs-progress-' . esc_attr($progress_position) .
                ' wpsbs-timeleft-' . esc_attr($timeleft_position) .
                (!empty($custom_class_name) ? ' ' . esc_attr(sanitize_html_class($custom_class_name)) : '')
            );

            $slider_background_settings = WPSBS_Helper::wpsbs_get_background_settings( $wpsbs_slideshow_ID );

            $wpsbs_css = WPSBS_Public::wpsbs_css($wpsbsOptions, $wpsbs_slideshow_ID,
                array_merge(
                    $slider_background_settings,
                    array( 'slides_background_settings' => $slides_background_settings )
                )
            );
    
            ob_start();
            wpsbs_get_template(
                'frontend/slideshow.php',
                array(
                    'slides'                        => $slides,
                    'imageIDs'                      => $imageIDs, 
                    'wpsbs_slideshow_ID'            => $wpsbs_slideshow_ID,
                    'slideshow_main_class'          => $slideshow_main_class,
                    'bullets_style'                 => $bullets_style,
                    'custom_style'                  => $custom_style,
                    'arrow_style'                   => $arrow_style,
                    'lazy_load'                     => $lazy_load,
                    'pagination_type'               => $pagination_type,
                    'width_image'                   => $width_image,
                    'height_image'                  => $height_image,
                    'wrapper_style'                 => $wrapper_style,
                    'thumb_gallery'                 => $thumb_gallery,
                    'thumb_width'                   => $thumb_width,
                    'thumb_height'                  => $thumb_height,
                    'timeleft_position'             => $timeleft_position,
                    'progress_position'             => $progress_position,
                    'timeleft_class'                => $timeleft_class,
                    'control_autoplay'              => $control_autoplay,
                    'autoplay_timeleft_font_size'   => $autoplay_timeleft_font_size,
                    'control_autoplay_time'         => $control_autoplay_time,
                    'hasSlides'                     => $hasSlides,
                    'hasImages'                     => $hasImages,
                    'wpsbs_css'                     => $wpsbs_css,
                    'options'                       => json_encode($wpsbsOptions),
    
                )
            );
            return ob_get_clean();
        }

    }

    new WPSBS_Shortcode();

endif;
