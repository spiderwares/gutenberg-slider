<?php
/**
 * Manage slider shotcode
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'BS_Shortcode' ) ) :

    /**
     * Class BS_Shortcode
     *
     */
    class BS_Shortcode {

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
            add_shortcode( 'bs_slider', [ $this, 'genrate_slider_Shortcode' ] );
        }

        /**
         * Generate slider shortcode
         *
         * @param array $args Shortcode arguments.
         * @return string Slider HTML.
         */
        public function genrate_slider_Shortcode( $args ) {
            $bs_slideshow_ID = !empty( $args['id'] ) ? $args['id'] : '';
            $this->slider_ID   = $bs_slideshow_ID;
    
            if ( empty( $bs_slideshow_ID ) ) :
                return '<p>' . esc_html__( "Error: Slideshow ID not found!", 'block-slider' ) . '</p>';
            endif;
    
            $imageIDs         = json_decode( get_post_meta( $bs_slideshow_ID, 'bs_slider_image_ids', true ), true );
            $bsOptions      = get_post_meta( $bs_slideshow_ID, 'bs_slider_option', true );

            // Collect child slides (Gutenberg content)
            $child_slides = get_children( array(
                'post_parent' => $bs_slideshow_ID,
                'post_type'   => 'bs_slide',
                'numberposts' => -1,
                'orderby'     => 'menu_order',
                'order'       => 'ASC',
            ) );

            if ( empty( $child_slides ) || ! is_array( $child_slides ) ) :
                return '<p>' . esc_html__( "No slides available. Please add at least one image to continue.", 'block-slider' ) . '</p>';
            endif;

            $slides = array();
            if ( $child_slides ) :
                foreach ( $child_slides as $slide ) :
                    // Store slide content with slide ID as key
                    $slides[ $slide->ID ] = $slide->post_content;
                    $slides_background_settings[ $slide->ID ] = BS_Helper::bs_get_background_settings( $slide->ID );
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
                    $bsOptions[ $key ] = $value;
                endif;
            endforeach;
    
            $arrow_style                    = isset($bsOptions['navigation_arrow_style']) ? $bsOptions['navigation_arrow_style'] : 'style1';
            $bullets_style                  = isset($bsOptions['bullets_navigation_style']) ? $bsOptions['bullets_navigation_style'] : 'style1';
            $custom_style                   = isset($bsOptions['custom_navigation_style']) ? $bsOptions['custom_navigation_style'] : 'style1';
            $lazy_load                      = isset($bsOptions['control_lazyload_images']) ? $bsOptions['control_lazyload_images'] : '';
            $pagination_type                = isset($bsOptions['pagination_type']) ? $bsOptions['pagination_type'] : 'bullets';
            $progress_position              = isset($bsOptions['progress_bar_position']) ? $bsOptions['progress_bar_position'] : 'bottom';
            $is_vertical                    = isset($bsOptions['control_slider_vertical']) && ($bsOptions['control_slider_vertical'] == '1' || $bsOptions['control_slider_vertical'] === true);
            $thumb_gallery                  = isset($bsOptions['thumb_gallery']) && ($bsOptions['thumb_gallery'] == '1' || $bsOptions['thumb_gallery'] === true);
            $thumb_width                    = !empty($bsOptions['thumb_gallery_width']) ? (int)$bsOptions['thumb_gallery_width'] : 70;
            $thumb_height                   = !empty($bsOptions['thumb_gallery_height']) ? (int)$bsOptions['thumb_gallery_height'] : 70;
            $width_image_value              = !empty($bsOptions['width_image']) ? $bsOptions['width_image'] : 500;
            $height_image_value             = !empty($bsOptions['height_image']) ? $bsOptions['height_image'] : 500;
            $image_unit                     = !empty($bsOptions['image_unit']) ? $bsOptions['image_unit'] : 'px';
            $width_image                    = $width_image_value . $image_unit;
            $height_image                   = $height_image_value . $image_unit;

            $enable_grid_layout             = isset($bsOptions['enable_grid_layout']) && ($bsOptions['enable_grid_layout'] == '1' || $bsOptions['enable_grid_layout'] === true);
            $grid_layout_axis               = isset($bsOptions['grid_layout_axis']) ? $bsOptions['grid_layout_axis'] : 'row';
            $grid_count                     = !empty($bsOptions['grid_count']) ? (int)$bsOptions['grid_count'] : 2;
            
            if ( $is_vertical ) :
                $wrapper_style = '';
            elseif ( $enable_grid_layout && $grid_layout_axis === 'row' ) :
                $total_height = $height_image_value * $grid_count;
                $wrapper_style = 'style="max-width:' . esc_attr($width_image) . '; height:' . esc_attr($total_height . $image_unit) . ';"';
            else :
                $wrapper_style = 'style="max-width:' . esc_attr($width_image) . '; height:' . esc_attr($height_image) . ';"';
            endif;
            
            $control_autoplay               = !empty($bsOptions['control_autoplay']) && $bsOptions['control_autoplay'] == '1';
            $control_autoplay_timeleft      = !empty($bsOptions['control_autoplay_timeleft']) && $bsOptions['control_autoplay_timeleft'] == '1';
            $timeleft_position              = isset($bsOptions['control_autoplay_timeleft_position']) ? $bsOptions['control_autoplay_timeleft_position'] : 'bottom-right';
            $autoplay_timeleft_font_size    = isset($bsOptions['control_autoplay_timeleft_font_size']) ? (int)$bsOptions['control_autoplay_timeleft_font_size'] : 5;
    
            $timeleft_class = 'bs-timeleft-' . esc_attr($timeleft_position);
            $hasSlides      = !empty($slides) && is_array($slides);
            $hasImages      = !empty($imageIDs) && is_array($imageIDs);
    
            // Get custom class name
            $custom_class_name = isset($bsOptions['custom_class_name']) ? trim($bsOptions['custom_class_name']) : '';
            
            $slideshow_main_class = trim(
                'bs_slider--' . $bs_slideshow_ID .
                ' bs-swiper-arrow-' . esc_attr($arrow_style) .
                ($pagination_type === 'custom' ? '' : ' ' . 'bs-swiper-dot-' . esc_attr($bullets_style)) .
                ' bs-swiper-custom-' . esc_attr($custom_style) .
                ' bs-pagination-' . esc_attr($pagination_type) .
                ' bs-progress-' . esc_attr($progress_position) .
                ' bs-timeleft-' . esc_attr($timeleft_position) .
                (!empty($custom_class_name) ? ' ' . esc_attr(sanitize_html_class($custom_class_name)) : '')
            );

            $slider_background_settings = BS_Helper::bs_get_background_settings( $bs_slideshow_ID );

            $bs_css = BS_Public::bs_css($bsOptions, $bs_slideshow_ID,
                array_merge(
                    $slider_background_settings,
                    array( 'slides_background_settings' => $slides_background_settings )
                )
            );
    
            ob_start();
            bs_get_template(
                'frontend/slideshow.php',
                array(
                    'slides'                        => $slides,
                    'imageIDs'                      => $imageIDs, 
                    'bs_slideshow_ID'             => $bs_slideshow_ID,
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
                    'control_autoplay_timeleft'     => $control_autoplay_timeleft,
                    'hasSlides'                     => $hasSlides,
                    'hasImages'                     => $hasImages,
                    'bs_css'                      => $bs_css,
                    'options'                       => json_encode($bsOptions),
    
                )
            );
            return ob_get_clean();
        }

    }

    new BS_Shortcode();

endif;
