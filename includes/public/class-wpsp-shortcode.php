<?php
/**
 * Manage slider shotcode
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPSP_Shortcode' ) ) :

    /**
     * Class WPSP_Shortcode
     *
     */
    class WPSP_Shortcode {

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
            add_shortcode( 'wpsp_slider', [ $this, 'genrate_slider_Shortcode' ] );
        }

        /**
         * Generate slider shortcode
         *
         * @param array $args Shortcode arguments.
         * @return string Slider HTML.
         */
        public function genrate_slider_Shortcode( $args ) {
            $slider_id = ! empty( $args['id'] ) ? $args['id'] : '';
            if ( empty( $slider_id ) ) :
                return '<p>' . esc_html__( "Error: Slideshow ID not found!", 'sliderpress' ) . '</p>';
            endif;

            unset( $args['id'] );

            return self::render_slider( $slider_id, $args );
        }

        public static function render_slider( $wpsp_slideshow_ID, $override_options = array() ) {
            if ( empty( $wpsp_slideshow_ID ) || ! is_numeric( $wpsp_slideshow_ID ) ) :
                return '<p>' . esc_html__( "No slides are available. Please add at least one image to proceed.", 'sliderpress' ) . '</p>';
            endif;
    
            $imageIDs      = json_decode( get_post_meta( $wpsp_slideshow_ID, 'wpsp_slider_image_ids', true ), true );
            $wpspOptions   = get_post_meta( $wpsp_slideshow_ID, 'wpsp_slider_option', true );

            if ( ! is_array( $wpspOptions ) ) :
                $wpspOptions = get_post_meta( $wpsp_slideshow_ID, 'wpsp', true );
                if ( ! is_array( $wpspOptions ) ) $wpspOptions = array();
            endif;

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
                'custom_class'                     => '',
            );
     
            $wpspOptions = wp_parse_args( $wpspOptions, $attr_defaults );
     
            if ( ! empty( $override_options ) && is_array( $override_options ) ) :
                foreach ( $override_options as $key => $value ) :
                    if ( $value !== '' ) :
                        $wpspOptions[ $key ] = $value;
                    endif;
                endforeach;
            endif;
    
            $arrow_style                    = isset($wpspOptions['navigation_arrow_style']) ? $wpspOptions['navigation_arrow_style'] : 'style1';
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
            $custom_class   = isset($wpspOptions['custom_class']) ? trim($wpspOptions['custom_class']) : '';
            
            $slideshow_main_class = trim(
                'wpsp_slider--' . $wpsp_slideshow_ID .
                ' wpsp-swiper-arrow-' . esc_attr($arrow_style) .
                ($pagination_type === 'custom' ? '' : ' ' . 'wpsp-swiper-dot-' . esc_attr($bullets_style)) .
                ' wpsp-swiper-custom-' . esc_attr($custom_style) .
                ' wpsp-pagination-' . esc_attr($pagination_type) .
                ' wpsp-progress-' . esc_attr($progress_position) .
                ' wpsp-timeleft-' . esc_attr($timeleft_position) .
                (!empty($custom_class) ? ' ' . esc_attr(sanitize_html_class($custom_class)) : '')
            );
 
            $slider_background_settings = WPSP_Helper::wpsp_get_background_settings( $wpsp_slideshow_ID );
 
            // Handle background settings overrides
            $bg_keys = array( 'background_size', 'background_position', 'background_repeat', 'background_color' );
            foreach ( $bg_keys as $bg_key ) :
                if ( isset( $override_options[ $bg_key ] ) && $override_options[ $bg_key ] !== '' ) :
                    $slider_background_settings[ $bg_key ] = $override_options[ $bg_key ];
                endif;
            endforeach;

            if ( isset( $override_options['background_id'] ) && $override_options['background_id'] !== '' ) :
                $slider_background_settings['background_id']  = absint( $override_options['background_id'] );
                $slider_background_settings['background_url'] = wp_get_attachment_image_url( $slider_background_settings['background_id'], 'full' );
            endif;

            $wpsp_css = WPSP_Public::dynamic_wpsp_css($wpspOptions, $wpsp_slideshow_ID,
                array_merge(
                    $slider_background_settings,
                    array( 'background_settings' => $background_settings )
                )
            );
    
            ob_start();
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

            return ob_get_clean();
        }
    }

    new WPSP_Shortcode();

endif;
