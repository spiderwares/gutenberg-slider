<?php
/**
 * Manage slider shotcode
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'SLST_Shortcode' ) ) :

    /**
     * Class SLST_Shortcode
     *
     */
    class SLST_Shortcode {

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
            add_shortcode( 'slst_slider', [ $this, 'genrate_slider_Shortcode' ] );
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
                return '<p>' . esc_html__( "Error: Slideshow ID not found!", 'slider-studio' ) . '</p>';
            endif;

            unset( $args['id'] );

            return self::render_slider( $slider_id, $args );
        }

        public static function render_slider( $slst_slideshow_ID, $override_options = array() ) {
            if ( empty( $slst_slideshow_ID ) || ! is_numeric( $slst_slideshow_ID ) ) :
                return '<p>' . esc_html__( "No slides are available. Please add at least one image to proceed.", 'slider-studio' ) . '</p>';
            endif;
    
            $imageIDs      = json_decode( get_post_meta( $slst_slideshow_ID, 'slst_slider_image_ids', true ), true );
            $slstOptions   = get_post_meta( $slst_slideshow_ID, 'slst_slider_option', true );

            if ( ! is_array( $slstOptions ) ) :
                $slstOptions = get_post_meta( $slst_slideshow_ID, 'slst', true );
                if ( ! is_array( $slstOptions ) ) $slstOptions = array();
            endif;

            if ( ! empty( $override_options['slst_slide_ids'] ) && is_array( $override_options['slst_slide_ids'] ) ) :
                $child_slides = get_posts( array(
                    'post_type'      => 'slst_slide',
                    'post__in'       => $override_options['slst_slide_ids'],
                    'orderby'        => 'post__in',
                    'posts_per_page' => -1,
                ) );
            else :
                $child_slides = get_children( array(
                    'post_parent' => $slst_slideshow_ID,
                    'post_type'   => 'slst_slide',
                    'numberposts' => -1,
                    'orderby'     => 'menu_order',
                    'order'       => 'ASC',
                ) );
            endif;

            $slides = array();
            $background_settings = array();
            if ( $child_slides ) :
                foreach ( $child_slides as $slide ) :
                    $slides[ $slide->ID ] = $slide->post_content;
                    $background_settings[ $slide->ID ] = SLST_Helper::slst_get_background_settings( $slide->ID );
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
     
            $slstOptions = wp_parse_args( $slstOptions, $attr_defaults );
     
            if ( ! empty( $override_options ) && is_array( $override_options ) ) :
                foreach ( $override_options as $key => $value ) :
                    if ( $value !== '' ) :
                        $slstOptions[ $key ] = $value;
                    endif;
                endforeach;
            endif;
    
            $arrow_style                    = isset($slstOptions['navigation_arrow_style']) ? $slstOptions['navigation_arrow_style'] : 'style1';
            $bullets_style                  = isset($slstOptions['bullets_navigation_style']) ? $slstOptions['bullets_navigation_style'] : 'style1';
            $custom_style                   = isset($slstOptions['custom_navigation_style']) ? $slstOptions['custom_navigation_style'] : 'style1';
            $lazy_load                      = isset($slstOptions['control_lazyload_images']) ? $slstOptions['control_lazyload_images'] : '';
            $pagination_type                = isset($slstOptions['pagination_type']) ? $slstOptions['pagination_type'] : 'bullets';
            $progress_position              = isset($slstOptions['progress_bar_position']) ? $slstOptions['progress_bar_position'] : 'bottom';
            $is_vertical                    = isset($slstOptions['control_slider_vertical']) && ($slstOptions['control_slider_vertical'] == '1' || $slstOptions['control_slider_vertical'] === true);
            $thumb_gallery                  = isset($slstOptions['thumb_gallery']) && ($slstOptions['thumb_gallery'] == '1' || $slstOptions['thumb_gallery'] === true);
            $thumb_width                    = !empty($slstOptions['thumb_gallery_width']) ? (int)$slstOptions['thumb_gallery_width'] : 70;
            $thumb_height                   = !empty($slstOptions['thumb_gallery_height']) ? (int)$slstOptions['thumb_gallery_height'] : 70;
            $width_image_value              = !empty($slstOptions['width_image']) ? $slstOptions['width_image'] : 500;
            $height_image_value             = !empty($slstOptions['height_image']) ? $slstOptions['height_image'] : 500;
            $image_unit                     = !empty($slstOptions['image_unit']) ? $slstOptions['image_unit'] : 'px';
            $width_image                    = $width_image_value . $image_unit;
            $height_image                   = $height_image_value . $image_unit;
            $control_autoplay               = !empty($slstOptions['control_autoplay']) && $slstOptions['control_autoplay'] == '1';
            $control_autoplay_timeleft      = !empty($slstOptions['control_autoplay_timeleft']) && $slstOptions['control_autoplay_timeleft'] == '1';
            $zoom_enabled                   = !empty( $slstOptions['zoom_images'] ) && in_array( $slstOptions['zoom_images'], array( '1', 1, true, 'true', 'yes' ), true );
            $timeleft_position              = isset($slstOptions['control_autoplay_timeleft_position']) ? $slstOptions['control_autoplay_timeleft_position'] : 'bottom-right';
            $autoplay_timeleft_font_size    = isset($slstOptions['control_autoplay_timeleft_font_size']) ? (int)$slstOptions['control_autoplay_timeleft_font_size'] : 5;
    
            $timeleft_class = 'slst-timeleft-' . esc_attr($timeleft_position);
            $hasSlides      = !empty($slides) && is_array($slides);
            $hasImages      = !empty($imageIDs) && is_array($imageIDs);
            $custom_class   = isset($slstOptions['custom_class']) ? trim($slstOptions['custom_class']) : '';
            
            $slideshow_main_class = trim(
                'slst_slider--' . $slst_slideshow_ID .
                ' slst-swiper-arrow-' . esc_attr($arrow_style) .
                ($pagination_type === 'custom' ? '' : ' ' . 'slst-swiper-dot-' . esc_attr($bullets_style)) .
                ' slst-swiper-custom-' . esc_attr($custom_style) .
                ' slst-pagination-' . esc_attr($pagination_type) .
                ' slst-progress-' . esc_attr($progress_position) .
                ' slst-timeleft-' . esc_attr($timeleft_position) .
                (!empty($custom_class) ? ' ' . esc_attr(sanitize_html_class($custom_class)) : '')
            );
 
            $slider_background_settings = SLST_Helper::slst_get_background_settings( $slst_slideshow_ID );
 
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

            $slst_css = SLST_Public::dynamic_slst_css($slstOptions, $slst_slideshow_ID,
                array_merge(
                    $slider_background_settings,
                    array( 'background_settings' => $background_settings )
                )
            );
    
            ob_start();
            slst_get_template(
                'frontend/slideshow.php',
                array(
                    'slides'                        => $slides,
                    'imageIDs'                      => $imageIDs, 
                    'slst_slideshow_ID'             => $slst_slideshow_ID,
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
                    'slst_css'                      => $slst_css,
                    'options'                       => json_encode($slstOptions),
    
                )
            );

            return ob_get_clean();
        }
    }

    new SLST_Shortcode();

endif;
