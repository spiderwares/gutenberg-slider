<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPSBS_Settings_Fields' ) ) :

     /**
	 * Class WPSBS_Settings_Fields
	 *
	 */
    class WPSBS_Settings_Fields {

        /**
         * Transition field
         *
         * @return array
         */
        public static function transition_field(){

            $fields = array(

                'animation'  => array(
                    'title'         => esc_html__( 'Transition type', 'smart-block-slider' ),
                    'field_type'    => 'wpsbsradio',
                    'options'       => array(
                        'slide'             =>  'animation-slide.gif',
                        'fade'              =>  'animation-fade.gif',
                        'flip'              =>  'animation-flip.gif',
                        'cube'              =>  'animation-cube.gif',
                        'cards (pro)'       =>  'animation-cards.gif',
                        'coverflow (pro)'   =>  'animation-coverflow.gif',
                        'shadow push (pro)' =>  'animation-creative1.gif',
                        'zoom split (pro)'  =>  'animation-creative2.gif',
                        'slide flow(pro)'   =>  'animation-creative3.gif',
                        'flip deck (pro)'   =>  'animation-creative4.gif',
                        'twist flow (pro)'  =>  'animation-creative5.gif',
                        'mirror (pro)'      =>  'animation-creative6.gif',
                    ),
                    'default'   => 'slide',
                    'disabled_options' => array( 
                        'cards (pro)',
                        'coverflow (pro)',
                        'shadow push (pro)',
                        'zoom split (pro)',
                        'slide flow(pro)',
                        'flip deck (pro)',
                        'twist flow (pro)', 
                        'mirror (pro)'
                    ),
                    'data_hide'     => '.wpsbs_coverflow_options, .wpsbs_cube_options, .wpsbs_cards_options',
                    'data_show'     => array(
                        'cube'       => '.wpsbs_cube_options',
                        'cards'      => '.wpsbs_cards_options',
                        'coverflow'  => '.wpsbs_coverflow_options',
                    ),
                ),
                'cards_border' => array(
                    'title'       => esc_html__('Border Radius', 'smart-block-slider'),
                    'field_type'  => 'wpsbsrange',
                    'default'     => 20,
                    'extra_class' => 'wpsbs_cards_options',
                    'desc'        => esc_html__('Border radius cards.', 'smart-block-slider'),
                    'unit'        => array(
                        '%'      => esc_html__( '%', 'smart-block-slider' ),
                    ),
                    'unit_selected' => '%',
                    'unit_disabled' => 'yes',
                ),
                'cube_shadows' => array(
                    'title'       => esc_html__('Shadows', 'smart-block-slider'),
                    'field_type'  => 'wpsbsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsbs_cube_options',
                    'desc'        => esc_html__('Enable shadows.', 'smart-block-slider'),
                ),
                'cube_slide_shadows' => array(
                    'title'       => esc_html__('Slide Shadows', 'smart-block-slider'),
                    'field_type'  => 'wpsbsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsbs_cube_options',
                    'desc'        => esc_html__('Enable slide shadows.', 'smart-block-slider'),
                ),
                'cube_shadowoffset' => array(
                    'title'       => esc_html__('Shadow Offset', 'smart-block-slider'),
                    'field_type'  => 'wpsbsnumber',
                    'default'     => 20,
                    'extra_class' => 'wpsbs_cube_options',
                    'desc'        => esc_html__('Shadow Offset in slides.', 'smart-block-slider'),
                ),
                'cube_shadowScale' => array(
                    'title'       => esc_html__('Shadow Scale', 'smart-block-slider'),
                    'field_type'  => 'wpsbsnumber',
                    'default'     => 1,
                    'extra_class' => 'wpsbs_cube_options',
                    'desc'        => esc_html__('Shadow Scale in slides.', 'smart-block-slider'),
                ),

            );

            return apply_filters( 'wpsbs_transition_fields', $fields );
        }

        /**
         * Navigation field
         *
         * @return array
         */
        public static function navigation_field(){

            $fields = array(

                'navigation_arrow_style' => array(
                    'title'         => esc_html__( 'Navigation arrows style', 'smart-block-slider' ),
                    'field_type'    => 'wpsbsradio',
                    'options'       => array(
                        'none'   => 'arrow-style-none.jpg',
                        'style1' => 'arrow-style-1.jpg',
                        'style2' => 'arrow-style-2.jpg',
                        'style3' => 'arrow-style-3.jpg',
                        'style4' => 'arrow-style-4.png',
                        'style5 (pro)' => 'arrow-style-5.jpg',
                        'custom (pro)' => 'arrow-custom.jpg',
                    ),
                    'disabled_options' => array( 
                        'style5 (pro)',
                        'custom (pro)',
                    ),
                    'default'    => 'style1',
                    'data_hide'  => '.wpsbs_arrow_fields, .wpsbs_arrow_border_radius, .wpsbs_arrow_color, .wpsbs_arrow_bg_color, .wpsbs_arrow_hover_bg_color, .wpsbs_arrow_position',
                    'data_show'  => array(
                        'none'   => '',
                        'style1' => '.wpsbs_arrow_fields',
                        'style2' => '.wpsbs_arrow_fields, .wpsbs_arrow_border_radius, .wpsbs_arrow_color, .wpsbs_arrow_bg_color, .wpsbs_arrow_hover_bg_color',
                        'style3' => '.wpsbs_arrow_fields, .wpsbs_arrow_color, .wpsbs_arrow_bg_color, .wpsbs_arrow_hover_bg_color',
                        'style4' => '.wpsbs_arrow_fields, .wpsbs_arrow_border_radius, .wpsbs_arrow_color, .wpsbs_arrow_bg_color, .wpsbs_arrow_hover_bg_color',
                        'style5' => '.wpsbs_arrow_fields',
                        'custom' => '.wpsbs_arrow_fields, .wpsbs_arrow_border_radius, .wpsbs_arrow_color, .wpsbs_arrow_position',
                    ),
                ),
                'arrow_font_size' => array(
                    'title'       => esc_html__( 'Arrow Font Size', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsnumber',
                    'default'     => 40,
                    'desc'        => esc_html__( 'Set font size for arrow icon in px.', 'smart-block-slider' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'smart-block-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'wpsbs_arrow_fields',
                ),
                'arrow_color' => array(
                    'title'       => esc_html__( 'Arrow Color', 'smart-block-slider' ),
                    'field_type'  => 'wpsbscolor', 
                    'default'     => '#ffffff',
                    'extra_class' => 'wpsbs_arrow_fields',
                ),
                'arrow_hover_color' => array(
                    'title'       => esc_html__( 'Arrow Hover Color', 'smart-block-slider' ),
                    'field_type'  => 'wpsbscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpsbs_arrow_fields',
                ),
                'arrow_border_radius' => array(
                    'title'       => esc_html__( 'Arrow Border Radius', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsrange',
                    'default'     => 50,
                    'desc'        => esc_html__( 'Set border radius for arrow border.', 'smart-block-slider' ),
                    'unit'        => array(
                        'percent'    => esc_html__( '%', 'smart-block-slider' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'wpsbs_arrow_border_radius',
                ),
                'arrow_bg_color' => array(
                    'title'       => esc_html__( 'Arrow Background Color', 'smart-block-slider' ),
                    'field_type'  => 'wpsbscolor',
                    'default'     => '#000000',
                    'extra_class' => 'wpsbs_arrow_bg_color',
                ),
                'arrow_hover_bg_color' => array(
                    'title'       => esc_html__( 'Arrow Hover Background Color', 'smart-block-slider' ),
                    'field_type'  => 'wpsbscolor',
                    'default'     => '#333333',
                    'extra_class' => 'wpsbs_arrow_bg_hover_color',
                ),
                'arrow_border_color' => array(
                    'title'       => esc_html__( 'Arrow Border Color', 'smart-block-slider' ),
                    'field_type'  => 'wpsbscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpsbs_arrow_color',
                ),

            );

            return apply_filters( 'wpsbs_navigation_fields', $fields );
        }

        /**
         * Pagination field
         *
         * @return array
         */
        public static function pagination_field(){

            $fields = array(

                'pagination_type' => array(
                    'title'       => esc_html__( 'Pagination Type', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsselect',
                    'options'     => array(
                        'none'        => esc_html__( 'None', 'smart-block-slider' ),
                        'bullets'     => esc_html__( 'Bullets', 'smart-block-slider' ),
                        'progressbar' => esc_html__( 'Progress Bar', 'smart-block-slider' ),
                        'fraction'    => esc_html__( 'Fraction', 'smart-block-slider' ),
                        'custom'      => esc_html__( 'Custom', 'smart-block-slider' ),
                    ),
                    'disabled_options' => array( 'fraction' , 'custom' ),
                    'default'       => 'bullets',
                    'desc'          => esc_html__( 'Choose the type of pagination for the slider.', 'smart-block-slider' ),
                    'data_hide'     => '.wpsbs_bullet_style, .wpsbs_autoplay_progress, .wpsbs_progress_bar, .wpsbs_fraction_style, .wpsbs_custom_style, .wpsbs_bullets_bg_color, .wpsbs_bullets_hover_bg_color, .wpsbs_bullets_border_color',
                    'data_show' => array(
                        'bullets'     => '.wpsbs_bullet_style, .wpsbs_bullets_bg_color, .wpsbs_bullets_hover_bg_color, .wpsbs_bullets_border_color',
                        'progressbar' => '.wpsbs_autoplay_progress, .wpsbs_progress_bar',
                        'fraction'    => '.wpsbs_fraction_style',
                        'custom'      => '.wpsbs_custom_style',
                    ),
                ),
                'bullets_navigation_style'  => array(
                    'title'         => esc_html__( 'Bullet style', 'smart-block-slider' ),
                    'field_type'    => 'wpsbsradio',
                    'options'       => array(
                        'style1' =>  'bullets-style-1.jpg',
                        'style2' =>  'bullets-style-2.jpg',
                        'style3' =>  'bullets-style-3.jpg',
                        'style4' =>  'bullets-style-4.jpg',
                    ),
                    'default'       => 'style1',
                    'extra_class'   => 'wpsbs_bullet_style',
                ),
                'bullets_bg_color' => array(
                    'title'       => esc_html__( 'Bullet Background Color', 'smart-block-slider' ),
                    'field_type'  => 'wpsbscolor',
                    'default'     => '',
                    'extra_class' => 'wpsbs_bullets_bg_color',
                ),
                'bullets_hover_bg_color' => array(
                    'title'       => esc_html__( 'Bullet Hover Background Color', 'smart-block-slider' ),
                    'field_type'  => 'wpsbscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpsbs_bullets_hover_bg_color',
                ),
                'bullets_border_color' => array(
                    'title'       => esc_html__( 'Bullet Border Color', 'smart-block-slider' ),
                    'field_type'  => 'wpsbscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpsbs_bullets_border_color',
                ),
                'control_progress_bar'  => array(
                    'title'         => esc_html__( 'Progress Bar', 'smart-block-slider' ),
                    'field_type'    => 'wpsbsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Show a progress bar while autoplay is running.', 'smart-block-slider' ),
                    'data_show'     => '.wpsbs_progress_bar',
                    'extra_class'   => 'wpsbs_autoplay_progress',
                ),
                'progress_bar_position' => array(
                    'title'         => esc_html__( 'Progress Bar Position', 'smart-block-slider' ),
                    'field_type'    => 'wpsbsselect',
                    'options'       => array(
                        'bottom'    => esc_html__( 'Bottom (Use in Horizontal)', 'smart-block-slider' ),
                        'top'       => esc_html__( 'Top (Use in Horizontal)', 'smart-block-slider' ),
                        'left'      => esc_html__( 'Left (Use in Vertical)', 'smart-block-slider' ),
                        'right'     => esc_html__( 'Right (Use in Vertical)', 'smart-block-slider' ),
                    ),
                    'default'       => 'bottom',
                    'desc'          => esc_html__( 'Choose where to position the autoplay progress bar.', 'smart-block-slider' ),
                    'extra_class'      => 'wpsbs_progress_bar',
                    'disabled_options' => array('right','left'),
                ),
                'progress_bar_color' => array(
                    'title'          => esc_html__( 'Progress bar color', 'smart-block-slider' ),
                    'field_type'    => 'wpsbscolor',
                    'default'       => '#ff0000',
                    'extra_class'   => 'wpsbs_progress_bar',
                ),
                'fraction_navigation_style'  => array(
                    'title'       => esc_html__( 'Fraction style', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsradio',
                    'options'     => array(
                        'style1'  => 'bullets-fraction.png',
                    ),
                    'default'     => 'style1',
                    'extra_class' => 'wpsbs_fraction_style',
                ),
                'fraction_color' => array(
                    'title'         => esc_html__( 'Fraction color', 'smart-block-slider' ),
                    'field_type'    => 'wpsbscolor',
                    'default'       => '#ff0000',
                    'extra_class'   => 'wpsbs_fraction_style',
                ),
                'fraction_font_size' => array(
                    'title'       => esc_html__( 'Fraction Font Size', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsnumber',
                    'default'     => 16,
                    'extra_class' => 'wpsbs_fraction_style',
                    'desc'        => esc_html__( 'Set the font size for the fraction pagination.', 'smart-block-slider' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'smart-block-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                ),
                'fraction_position' => array(
                    'title'       => esc_html__( 'Fraction Position', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsselect',
                    'default'     => 'center',
                    'options'     => array(
                        'top-left'     => esc_html__( 'Top Left', 'smart-block-slider' ),
                        'top-right'    => esc_html__( 'Top Right', 'smart-block-slider' ),
                        'bottom-left'  => esc_html__( 'Bottom Left', 'smart-block-slider' ),
                        'bottom-right' => esc_html__( 'Bottom Right', 'smart-block-slider' ),
                        'center'       => esc_html__( 'Center', 'smart-block-slider' ),
                    ),
                    'desc'         => esc_html__( 'Choose position for fraction in pagination.', 'smart-block-slider' ),
                    'extra_class'  => 'wpsbs_fraction_style',
                ),
                'custom_navigation_style'  => array(
                    'title'       => esc_html__( 'Custom style', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsradio',
                    'options'     => array(
                        'style1'  => 'custom-style1.jpg',
                    ),
                    'default'     => 'style1',
                    'extra_class' => 'wpsbs_custom_style',
                ),
                'custom_text_color' => array(
                    'title'         => esc_html__( 'Custom Color', 'smart-block-slider' ),
                    'field_type'    => 'wpsbscolor',
                    'default'       => '#ffffff',
                    'extra_class'   => 'wpsbs_custom_style',
                    'desc'          => esc_html__( 'Set the text color for numbered pagination bullets.', 'smart-block-slider' ),
                ),
                'custom_background_color' => array(
                    'title'         => esc_html__( 'Custom Background Color', 'smart-block-slider' ),
                    'field_type'    => 'wpsbscolor',
                    'default'       => '#007aff',
                    'extra_class'   => 'wpsbs_custom_style',
                    'desc'          => esc_html__( 'Set the background color for active pagination bullets.', 'smart-block-slider' ),
                ),
                'custom_active_text_color' => array(
                    'title'         => esc_html__( 'Custom active Text Color', 'smart-block-slider' ),
                    'field_type'    => 'wpsbscolor',
                    'default'       => '#ffffff',
                    'extra_class'   => 'wpsbs_custom_style',
                    'desc'          => esc_html__( 'Set the text color for inactive numbered pagination bullets.', 'smart-block-slider' ),
                ),
                'custom_active_background_color' => array(
                    'title'         => esc_html__( 'Custom active Background Color', 'smart-block-slider' ),
                    'field_type'    => 'wpsbscolor',
                    'default'       => '#0a0607',
                    'extra_class'   => 'wpsbs_custom_style',
                    'desc'          => esc_html__( 'Set the background color for inactive pagination bullets.', 'smart-block-slider' ),
                ),

            );

            return apply_filters( 'wpsbs_pagination_fields', $fields );
        }

        /**
         * Responsive field
         *
         * @return array
         */
        public static function responsive_field(){

            $fields = array(

                'control_enable_responsive'   => array(
                    'title'         => esc_html__( 'Enable Responsive', 'smart-block-slider' ),
                    'field_type'    => 'wpsbsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Enable responsive layout for different screen sizes (mobile, tablet, desktop).', 'smart-block-slider' ),
                    'data_show'     => '.wpsbs_responsive_field',
                ),
                'items_in_desktop'  => array(
                    'title'         => esc_html__( 'Items in Desktop', 'smart-block-slider' ),
                    'field_type'    => 'wpsbsnumber',
                    'default'       => 4,
                    'extra_class'   => 'wpsbs_responsive_field',
                ),
                'items_in_tablet'   => array(
                    'title'         => esc_html__( 'Items in Tablet', 'smart-block-slider' ),
                    'field_type'    => 'wpsbsnumber',
                    'default'       => 2,
                    'extra_class'   => 'wpsbs_responsive_field',
                ),
                'items_in_mobile'   => array(
                    'title'         => esc_html__( 'Items in Mobile', 'smart-block-slider' ),
                    'field_type'    => 'wpsbsnumber',
                    'default'       => 1,
                    'extra_class'   => 'wpsbs_responsive_field',
                ),

            );

            return apply_filters( 'wpsbs_responsive_fields', $fields );
        }

        /**
         * Thumbnail gallery field
         *
         * @return array
         */
        public static function thumbnail_gallery_field(){
            $fields = array();
            return apply_filters( 'wpsbs_thumbnail_gallery_fields', $fields );
        }

        /**
         * Autoplay field
         *
         * @return array
         */
        public static function autoplay_field(){

            $fields = array(

                'control_autoplay'  => array(
                    'title'         => esc_html__( 'Autoplay', 'smart-block-slider' ),
                    'field_type'    => 'wpsbsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Enable or disable autoplay functionality.', 'smart-block-slider' ),
                    'data_show'     => '.wpsbs_autoplay_timing',
                ),
                'autoplay_timing'   => array(
                    'title'         => esc_html__( 'Autoplay time', 'smart-block-slider' ),
                    'field_type'    => 'wpsbsnumber',
                    'default'       => 3000,
                    'desc'          => esc_html__( 'Enter autoplay speed in milliseconds (e.g., 3000 for 3 seconds).', 'smart-block-slider' ),
                    'unit'          => array(
                        'seconds'   => esc_html__( 'Second\'s', 'smart-block-slider' ),
                    ),
                    'unit_selected' => 'seconds',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'wpsbs_autoplay_timing',
                ),
                'control_autoplay_time' => array(
                    'title'       => esc_html__( 'Circular Autoplay Progress', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Show circular progress countdown during autoplay.', 'smart-block-slider' ),
                    'data_show'   => '.wpsbs_autoplay_timeleft', 
                ),
                'control_autoplay_time_color' => array(
                    'title'       => esc_html__( 'TimeLeft Color', 'smart-block-slider' ),
                    'field_type'  => 'wpsbscolor',
                    'default'     => '#007aff',
                    'desc'        => esc_html__( 'Set color for circular autoplay progress.', 'smart-block-slider' ),
                    'extra_class' => 'wpsbs_autoplay_timeleft',
                ),
                'control_autoplay_time_position' => array(
                    'title'       => esc_html__( 'Autoplay TimeLeft Position', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsselect',
                    'default'     => 'bottom-right',
                    'options'     => array(
                        'top-left'     => esc_html__( 'Top Left', 'smart-block-slider' ),
                        'top-right'    => esc_html__( 'Top Right', 'smart-block-slider' ),
                        'bottom-left'  => esc_html__( 'Bottom Left', 'smart-block-slider' ),
                        'bottom-right' => esc_html__( 'Bottom Right', 'smart-block-slider' ),
                    ),
                    'desc'          => esc_html__( 'Choose position for autoplay time left circle.', 'smart-block-slider' ),
                    'extra_class'   => 'wpsbs_autoplay_timeleft',
                ),
                'control_autoplay_time_font_size' => array(
                    'title'       => esc_html__( 'Time Left Font Size', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsnumber',
                    'default'     => 20,
                    'desc'        => esc_html__( 'Font size for the autoplay time left number.', 'smart-block-slider' ),
                    'unit'          => array(
                        'px'      => esc_html__( 'PX', 'smart-block-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'extra_class' => 'wpsbs_autoplay_timeleft',
                ),

            );

            return apply_filters( 'wpsbs_autoplay_fields', $fields );    
        }

        /**
         * Scrollbar field
         *
         * @return array
         */
        public static function scrollbar_field(){
            $fields = array();
            return apply_filters( 'wpsbs_scrollbar_fields', $fields );
        }

        /**
         * Other options field
         *
         * @return array
         */
        public static function other_options_field(){

            $fields = array(

                'image_unit' => array(
                    'title'       => esc_html__( 'Set Width & Height', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsselect',
                    'options'     => array(
                        'px'  => 'px',
                        '%'   => '%',
                        'em'  => 'em',
                        'rem' => 'rem',
                        'vh'  => 'vh',
                    ),
                    'default'    => 'px',
                    'desc'       => esc_html__( 'Unit to use for image width and height (e.g, px, %, em). Applied to each slide image.', 'smart-block-slider' ),
                ),
                'width_image' => array(
                    'title'       => esc_html__( 'Width of Image', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsnumber',
                    'default'     => 800,
                    'desc'        =>  esc_html__( 'Specify the width of each slide image.', 'smart-block-slider' ),
                ),
                'height_image'  => array(
                    'title'       => esc_html__( 'Height of Image', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsnumber',
                    'default'     => 500,
                    'desc'        =>  esc_html__( 'Specify the height of each slide image.', 'smart-block-slider' ),
                ),
                'border_radius_image' => array(
                    'title'       => esc_html__( 'Border Radius of Image', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsrange',
                    'default'     => 0,
                    'desc'        => esc_html__( 'Specify the border radius of each slide image.', 'smart-block-slider' ),
                    'unit'          => array(
                        'percent'      => esc_html__( '%', 'smart-block-slider' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                ),
                'control_lazyload_images' => array(
                    'title'         => esc_html__( 'Lazy load images', 'smart-block-slider' ),  
                    'field_type'    => 'wpsbsswitch',
                    'default'       => 'yes',
                    'desc'          => esc_html__( 'Load images only when they are needed.', 'smart-block-slider' ),
                ),
                'control_grab_cursor'   => array(
                    'title'         => esc_html__( 'Grab cursor', 'smart-block-slider' ),
                    'field_type'    => 'wpsbsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Change the mouse cursor to a hand icon when hovering over the slider.', 'smart-block-slider' ),
                ),
                'control_rewind' => array(
                    'title'       => esc_html__( 'Rewind', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable rewind functionality for the slider.', 'smart-block-slider' ),
                ),
                'control_slide_space' => array(
                    'title'       => esc_html__( 'Slides Space', 'smart-block-slider' ),
                    'field_type'  => 'wpsbsnumber',
                    'default'     => 10,
                    'desc'        => esc_html__( 'Space between each slide.', 'smart-block-slider' ),
                    'unit'          => array(
                        'px'      => esc_html__( 'PX', 'smart-block-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                ),

            );

            return apply_filters( 'wpsbs_other_options_fields', $fields );
        }

        /**
         * Custom CSS field
         *
         * @return array
         */
        public static function custom_css_field(){

            $fields = array(

                'custom_class_name' => array(
                    'title'       => esc_html__( 'Custom Class Name', 'smart-block-slider' ),
                    'field_type'  => 'wpsbstext',
                    'default'     => '',
                    'placeholder' => esc_html__( 'my-custom-slider', 'smart-block-slider' ),
                    'desc'        => esc_html__( 'Enter a custom CSS class name (without dot). This class will be added to the slider wrapper. Example: my-custom-slider', 'smart-block-slider' ),
                ),

                'custom_css' => array(
                    'title'       => esc_html__( 'Custom CSS', 'smart-block-slider' ),
                    'field_type'  => 'wpswpsbstextarea',
                    'default'     => '',
                    'rows'        => 25,
                    'cols'        => 50,
                    'placeholder' => esc_html__( '/* Add your custom CSS here */', 'smart-block-slider' ),
                    'desc'        => esc_html__( 'Add your custom CSS here. This CSS will apply globally to the slider and its elements.', 'smart-block-slider' ),
                ),

            );

            return apply_filters( 'wpsbs_custom_css_fields', $fields );
        }
    }

endif;
