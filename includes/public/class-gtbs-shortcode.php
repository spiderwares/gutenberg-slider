<?php
/**
 * Manage slider shotcode
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'GTBS_Shortcode' ) ) :

    class GTBS_Shortcode {

        public function __construct() {
            $this->event_handler();
        }

        public function event_handler() {
            add_shortcode( 'gtbs_slider', [ $this, 'genrate_slider_Shortcode' ] );
        }

        public function genrate_slider_Shortcode( $args ) {
            $gtbs_slideshow_ID = !empty( $args['id'] ) ? $args['id'] : '';
            $this->slider_ID   = $gtbs_slideshow_ID;
    
            if ( empty( $gtbs_slideshow_ID ) ) :
                return '<p>' . esc_html__( "Error: Slideshow ID not found!", 'gutenberg-slider' ) . '</p>';
            endif;
    
            $imageIDs         = json_decode( get_post_meta( $gtbs_slideshow_ID, 'gtbs_slider_image_ids', true ), true );
            $gtbsOptions      = get_post_meta( $gtbs_slideshow_ID, 'gtbs_slider_option', true );

            // Collect child slides (Gutenberg content)
            $child_slides = get_children( array(
                'post_parent' => $gtbs_slideshow_ID,
                'post_type'   => 'gtbs_slide',
                'numberposts' => -1,
                'orderby'     => 'menu_order',
                'order'       => 'ASC',
            ) );

            if ( empty( $child_slides ) || ! is_array( $child_slides ) ) :
                return '<p>' . esc_html__( "No slides available. Please add at least one image to continue.", 'gutenberg-slider' ) . '</p>';
            endif;

            $slides = array();
            if ( $child_slides ) :
                foreach ( $child_slides as $slide ) :
                    $slides[] = apply_filters( 'the_content', $slide->post_content );
                endforeach;
            endif;

            // Normalize imageIDs to array
            if ( ! is_array( $imageIDs ) ) :
                $imageIDs = array();
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
                    $gtbsOptions[ $key ] = $value;
                endif;
            endforeach;
    
            $arrow_style                    = isset($gtbsOptions['navigation_arrow_style']) ? $gtbsOptions['navigation_arrow_style'] : 'style1';
            $bullets_style                  = isset($gtbsOptions['bullets_navigation_style']) ? $gtbsOptions['bullets_navigation_style'] : 'style1';
            $custom_style                   = isset($gtbsOptions['custom_navigation_style']) ? $gtbsOptions['custom_navigation_style'] : 'style1';
            $lazy_load                      = isset($gtbsOptions['control_lazyload_images']) ? $gtbsOptions['control_lazyload_images'] : '';
            $pagination_type                = isset($gtbsOptions['pagination_type']) ? $gtbsOptions['pagination_type'] : 'bullets';
            $progress_position              = isset($gtbsOptions['progress_bar_position']) ? $gtbsOptions['progress_bar_position'] : 'bottom';
            $is_vertical                    = isset($gtbsOptions['control_slider_vertical']) && ($gtbsOptions['control_slider_vertical'] == '1' || $gtbsOptions['control_slider_vertical'] === true);
            $thumb_gallery                  = isset($gtbsOptions['thumb_gallery']) && ($gtbsOptions['thumb_gallery'] == '1' || $gtbsOptions['thumb_gallery'] === true);
            $thumb_width                    = !empty($gtbsOptions['thumb_gallery_width']) ? (int)$gtbsOptions['thumb_gallery_width'] : 70;
            $thumb_height                   = !empty($gtbsOptions['thumb_gallery_height']) ? (int)$gtbsOptions['thumb_gallery_height'] : 70;
            $width_image_value              = !empty($gtbsOptions['width_image']) ? $gtbsOptions['width_image'] : 500;
            $height_image_value             = !empty($gtbsOptions['height_image']) ? $gtbsOptions['height_image'] : 500;
            $image_unit                     = !empty($gtbsOptions['image_unit']) ? $gtbsOptions['image_unit'] : 'px';
            $width_image                    = $width_image_value . $image_unit;
            $height_image                   = $height_image_value . $image_unit;
            $control_autoplay               = !empty($gtbsOptions['control_autoplay']) && $gtbsOptions['control_autoplay'] == '1';
            $control_autoplay_timeleft      = !empty($gtbsOptions['control_autoplay_timeleft']) && $gtbsOptions['control_autoplay_timeleft'] == '1';
            $timeleft_position              = isset($gtbsOptions['control_autoplay_timeleft_position']) ? $gtbsOptions['control_autoplay_timeleft_position'] : 'bottom-right';
            $autoplay_timeleft_font_size    = isset($gtbsOptions['control_autoplay_timeleft_font_size']) ? (int)$gtbsOptions['control_autoplay_timeleft_font_size'] : 5;
    
            $timeleft_class = 'gtbs-timeleft-' . esc_attr($timeleft_position);
            $hasSlides      = !empty($slides) && is_array($slides);
            $hasImages      = !empty($imageIDs) && is_array($imageIDs);
    
            $slideshow_main_class = trim(
                'gtbs_slider--' . $gtbs_slideshow_ID .
                ' ' . 'gtbs-swiper-arrow-' . esc_attr($arrow_style) .
                ($pagination_type === 'custom' ? '' : ' ' . 'gtbs-swiper-dot-' . esc_attr($bullets_style)) .
                ' ' . 'gtbs-swiper-custom-' . esc_attr($custom_style) .
                ' ' . 'gtbs-pagination-' . esc_attr($pagination_type) .
                ' ' . 'gtbs-progress-' . esc_attr($progress_position) .
                ' ' . 'gtbs-timeleft-' . esc_attr($timeleft_position) 
            );
    
            $style  = [];
            if ($height_image) $style[] = "height:" . esc_attr($height_image);
            $wrapper_style = $style ? 'style="' . implode('; ', $style) . '"' : '';

            $background_size     = get_post_meta( $gtbs_slideshow_ID, 'gtbs_background_size', true );
            $background_position = get_post_meta( $gtbs_slideshow_ID, 'gtbs_background_position', true );
            $background_repeat   = get_post_meta( $gtbs_slideshow_ID, 'gtbs_background_repeat', true );
            $background_color    = get_post_meta( $gtbs_slideshow_ID, 'gtbs_background_color', true );
            
            // Get featured image (background image)
            $background_id  = get_post_thumbnail_id( $gtbs_slideshow_ID );
            $background_url = $background_id ? wp_get_attachment_image_url( $background_id, 'full' ) : '';
            
            // Set defaults if not set
            $background_size     = $background_size ? $background_size : 'cover';
            $background_position = $background_position ? $background_position : 'center';
            $background_repeat   = $background_repeat ? $background_repeat : 'no-repeat';
            
            // Convert 'original' to 'auto' for CSS
            if ( $background_size === 'original' ) :
                $background_size = 'auto';
            endif;

            $gtbs_css = GTBS_Public::gtbs_css( $gtbsOptions, $gtbs_slideshow_ID, array(
                'background_size'     => $background_size,
                'background_position' => $background_position,
                'background_repeat'   => $background_repeat,
                'background_color'    => $background_color,
                'background_url'      => $background_url
            ) );
    
            ob_start();
            gtbs_get_template(
                'frontend/slideshow.php',
                array(
                    'slides'                        => $slides,
                    'imageIDs'                      => $imageIDs, 
                    'gtbs_slideshow_ID'             => $gtbs_slideshow_ID,
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
                    'gtbs_css'                      => $gtbs_css,
                    'options'                       => json_encode($gtbsOptions),
    
                )
            );
            return ob_get_clean();
        }

    }

    new GTBS_Shortcode();

endif;
