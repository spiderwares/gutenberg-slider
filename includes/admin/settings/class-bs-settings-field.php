<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'BS_Settings_Fields' ) ) :

     /**
	 * Class BS_Settings_Fields
	 *
	 */
    class BS_Settings_Fields {

        /**
         * Transition field
         *
         * @return array
         */
        public static function transition_field(){

            $fields = array(

                'animation'  => array(
                    'title'         => esc_html__( 'Transition type', 'block-slider' ),
                    'field_type'    => 'bsradio',
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
                    'data_hide'     => '.bs_coverflow_options, .bs_cube_options, .bs_cards_options',
                    'data_show'     => array(
                        'cube'       => '.bs_cube_options',
                        'cards'      => '.bs_cards_options',
                        'coverflow'  => '.bs_coverflow_options',
                    ),
                ),
                'cards_border' => array(
                    'title'       => esc_html__('Border Radius', 'block-slider'),
                    'field_type'  => 'bsrange',
                    'default'     => 20,
                    'extra_class' => 'bs_cards_options',
                    'desc'        => esc_html__('Border radius cards.', 'block-slider'),
                    'unit'        => array(
                        '%'      => esc_html__( '%', 'block-slider' ),
                    ),
                    'unit_selected' => '%',
                    'unit_disabled' => 'yes',
                ),
                'cube_shadows' => array(
                    'title'       => esc_html__('Shadows', 'block-slider'),
                    'field_type'  => 'bsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'bs_cube_options',
                    'desc'        => esc_html__('Enable shadows.', 'block-slider'),
                ),
                'cube_slide_shadows' => array(
                    'title'       => esc_html__('Slide Shadows', 'block-slider'),
                    'field_type'  => 'bsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'bs_cube_options',
                    'desc'        => esc_html__('Enable slide shadows.', 'block-slider'),
                ),
                'cube_shadowoffset' => array(
                    'title'       => esc_html__('Shadow Offset', 'block-slider'),
                    'field_type'  => 'bsnumber',
                    'default'     => 20,
                    'extra_class' => 'bs_cube_options',
                    'desc'        => esc_html__('Shadow Offset in slides.', 'block-slider'),
                ),
                'cube_shadowScale' => array(
                    'title'       => esc_html__('Shadow Scale', 'block-slider'),
                    'field_type'  => 'bsnumber',
                    'default'     => 1,
                    'extra_class' => 'bs_cube_options',
                    'desc'        => esc_html__('Shadow Scale in slides.', 'block-slider'),
                ),

            );

            return apply_filters( 'bs_transition_fields', $fields );
        }

        /**
         * Navigation field
         *
         * @return array
         */
        public static function navigation_field(){

            $fields = array(

                'navigation_arrow_style' => array(
                    'title'         => esc_html__( 'Navigation arrows style', 'block-slider' ),
                    'field_type'    => 'bsradio',
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
                    'data_hide'  => '.bs_arrow_fields, .bs_arrow_border_radius, .bs_arrow_color, .bs_arrow_bg_color, .bs_arrow_hover_bg_color, .bs_arrow_position',
                    'data_show'  => array(
                        'none'   => '',
                        'style1' => '.bs_arrow_fields',
                        'style2' => '.bs_arrow_fields, .bs_arrow_border_radius, .bs_arrow_color, .bs_arrow_bg_color, .bs_arrow_hover_bg_color',
                        'style3' => '.bs_arrow_fields, .bs_arrow_color, .bs_arrow_bg_color, .bs_arrow_hover_bg_color',
                        'style4' => '.bs_arrow_fields, .bs_arrow_border_radius, .bs_arrow_color, .bs_arrow_bg_color, .bs_arrow_hover_bg_color',
                        'style5' => '.bs_arrow_fields',
                        'custom' => '.bs_arrow_fields, .bs_arrow_border_radius, .bs_arrow_color, .bs_arrow_position',
                    ),
                ),
                'arrow_font_size' => array(
                    'title'       => esc_html__( 'Arrow Font Size', 'block-slider' ),
                    'field_type'  => 'bsnumber',
                    'default'     => 16,
                    'desc'        => esc_html__( 'Set font size for arrow icon in px.', 'block-slider' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'block-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'bs_arrow_fields',
                ),
                'arrow_color' => array(
                    'title'       => esc_html__( 'Arrow Color', 'block-slider' ),
                    'field_type'  => 'bscolor', 
                    'default'     => '#ffffff',
                    'extra_class' => 'bs_arrow_fields',
                ),
                'arrow_hover_color' => array(
                    'title'       => esc_html__( 'Arrow Hover Color', 'block-slider' ),
                    'field_type'  => 'bscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'bs_arrow_fields',
                ),
                'arrow_border_radius' => array(
                    'title'       => esc_html__( 'Arrow Border Radius', 'block-slider' ),
                    'field_type'  => 'bsrange',
                    'default'     => 50,
                    'desc'        => esc_html__( 'Set border radius for arrow border.', 'block-slider' ),
                    'unit'        => array(
                        'percent'    => esc_html__( '%', 'block-slider' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'bs_arrow_border_radius',
                ),
                'arrow_bg_color' => array(
                    'title'       => esc_html__( 'Arrow Background Color', 'block-slider' ),
                    'field_type'  => 'bscolor',
                    'default'     => '#000000',
                    'extra_class' => 'bs_arrow_bg_color',
                ),
                'arrow_hover_bg_color' => array(
                    'title'       => esc_html__( 'Arrow Hover Background Color', 'block-slider' ),
                    'field_type'  => 'bscolor',
                    'default'     => '#333333',
                    'extra_class' => 'bs_arrow_bg_hover_color',
                ),
                'arrow_border_color' => array(
                    'title'       => esc_html__( 'Arrow Border Color', 'block-slider' ),
                    'field_type'  => 'bscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'bs_arrow_color',
                ),

            );

            return apply_filters( 'bs_navigation_fields', $fields );
        }

        /**
         * Pagination field
         *
         * @return array
         */
        public static function pagination_field(){

            $fields = array(

                'pagination_type' => array(
                    'title'       => esc_html__( 'Pagination Type', 'block-slider' ),
                    'field_type'  => 'bsselect',
                    'options'     => array(
                        'none'        => esc_html__( 'None', 'block-slider' ),
                        'bullets'     => esc_html__( 'Bullets', 'block-slider' ),
                        'progressbar' => esc_html__( 'Progress Bar', 'block-slider' ),
                        'fraction'    => esc_html__( 'Fraction', 'block-slider' ),
                        'custom'      => esc_html__( 'Custom', 'block-slider' ),
                    ),
                    'disabled_options' => array( 'fraction' , 'custom' ),
                    'default'       => 'bullets',
                    'desc'          => esc_html__( 'Choose the type of pagination for the slider.', 'block-slider' ),
                    'data_hide'     => '.bs_bullet_style, .bs_autoplay_progress, .bs_progress_bar, .bs_fraction_style, .bs_custom_style, .bs_bullets_bg_color, .bs_bullets_hover_bg_color, .bs_bullets_border_color',
                    'data_show' => array(
                        'bullets'     => '.bs_bullet_style, .bs_bullets_bg_color, .bs_bullets_hover_bg_color, .bs_bullets_border_color',
                        'progressbar' => '.bs_autoplay_progress, .bs_progress_bar',
                        'fraction'    => '.bs_fraction_style',
                        'custom'      => '.bs_custom_style',
                    ),
                ),
                'bullets_navigation_style'  => array(
                    'title'         => esc_html__( 'Bullet style', 'block-slider' ),
                    'field_type'    => 'bsradio',
                    'options'       => array(
                        'style1' =>  'bullets-style-1.jpg',
                        'style2' =>  'bullets-style-2.jpg',
                        'style3' =>  'bullets-style-3.jpg',
                        'style4' =>  'bullets-style-4.jpg',
                    ),
                    'default'       => 'style1',
                    'extra_class'   => 'bs_bullet_style',
                ),
                'bullets_bg_color' => array(
                    'title'       => esc_html__( 'Bullet Background Color', 'block-slider' ),
                    'field_type'  => 'bscolor',
                    'default'     => '',
                    'extra_class' => 'bs_bullets_bg_color',
                ),
                'bullets_hover_bg_color' => array(
                    'title'       => esc_html__( 'Bullet Hover Background Color', 'block-slider' ),
                    'field_type'  => 'bscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'bs_bullets_hover_bg_color',
                ),
                'bullets_border_color' => array(
                    'title'       => esc_html__( 'Bullet Border Color', 'block-slider' ),
                    'field_type'  => 'bscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'bs_bullets_border_color',
                ),
                'control_progress_bar'  => array(
                    'title'         => esc_html__( 'Progress Bar', 'block-slider' ),
                    'field_type'    => 'bsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Show a progress bar while autoplay is running.', 'block-slider' ),
                    'data_show'     => '.bs_progress_bar',
                    'extra_class'   => 'bs_autoplay_progress',
                ),
                'progress_bar_position' => array(
                    'title'         => esc_html__( 'Progress Bar Position', 'block-slider' ),
                    'field_type'    => 'bsselect',
                    'options'       => array(
                        'bottom'    => esc_html__( 'Bottom (Use in Horizontal)', 'block-slider' ),
                        'top'       => esc_html__( 'Top (Use in Horizontal)', 'block-slider' ),
                        'left'      => esc_html__( 'Left (Use in Vertical)', 'block-slider' ),
                        'right'     => esc_html__( 'Right (Use in Vertical)', 'block-slider' ),
                    ),
                    'default'       => 'bottom',
                    'desc'          => esc_html__( 'Choose where to position the autoplay progress bar.', 'block-slider' ),
                    'extra_class'      => 'bs_progress_bar',
                    'disabled_options' => array('right','left'),
                ),
                'progress_bar_color' => array(
                    'title'          => esc_html__( 'Progress bar color', 'block-slider' ),
                    'field_type'    => 'bscolor',
                    'default'       => '#ff0000',
                    'extra_class'   => 'bs_progress_bar',
                ),
                'fraction_navigation_style'  => array(
                    'title'       => esc_html__( 'Fraction style', 'block-slider' ),
                    'field_type'  => 'bsradio',
                    'options'     => array(
                        'style1'  => 'bullets-fraction.png',
                    ),
                    'default'     => 'style1',
                    'extra_class' => 'bs_fraction_style',
                ),
                'fraction_color' => array(
                    'title'         => esc_html__( 'Fraction color', 'block-slider' ),
                    'field_type'    => 'bscolor',
                    'default'       => '#ff0000',
                    'extra_class'   => 'bs_fraction_style',
                ),
                'fraction_font_size' => array(
                    'title'       => esc_html__( 'Fraction Font Size', 'block-slider' ),
                    'field_type'  => 'bsnumber',
                    'default'     => 16,
                    'extra_class' => 'bs_fraction_style',
                    'desc'        => esc_html__( 'Set the font size for the fraction pagination.', 'block-slider' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'block-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                ),
                'fraction_position' => array(
                    'title'       => esc_html__( 'Fraction Position', 'block-slider' ),
                    'field_type'  => 'bsselect',
                    'default'     => 'center',
                    'options'     => array(
                        'top-left'     => esc_html__( 'Top Left', 'block-slider' ),
                        'top-right'    => esc_html__( 'Top Right', 'block-slider' ),
                        'bottom-left'  => esc_html__( 'Bottom Left', 'block-slider' ),
                        'bottom-right' => esc_html__( 'Bottom Right', 'block-slider' ),
                        'center'       => esc_html__( 'Center', 'block-slider' ),
                    ),
                    'desc'         => esc_html__( 'Choose position for fraction in pagination.', 'block-slider' ),
                    'extra_class'  => 'bs_fraction_style',
                ),
                'custom_navigation_style'  => array(
                    'title'       => esc_html__( 'Custom style', 'block-slider' ),
                    'field_type'  => 'bsradio',
                    'options'     => array(
                        'style1'  => 'custom-style1.jpg',
                    ),
                    'default'     => 'style1',
                    'extra_class' => 'bs_custom_style',
                ),
                'custom_text_color' => array(
                    'title'         => esc_html__( 'Custom Color', 'block-slider' ),
                    'field_type'    => 'bscolor',
                    'default'       => '#ffffff',
                    'extra_class'   => 'bs_custom_style',
                    'desc'          => esc_html__( 'Set the text color for numbered pagination bullets.', 'block-slider' ),
                ),
                'custom_background_color' => array(
                    'title'         => esc_html__( 'Custom Background Color', 'block-slider' ),
                    'field_type'    => 'bscolor',
                    'default'       => '#007aff',
                    'extra_class'   => 'bs_custom_style',
                    'desc'          => esc_html__( 'Set the background color for active pagination bullets.', 'block-slider' ),
                ),
                'custom_active_text_color' => array(
                    'title'         => esc_html__( 'Custom active Text Color', 'block-slider' ),
                    'field_type'    => 'bscolor',
                    'default'       => '#ffffff',
                    'extra_class'   => 'bs_custom_style',
                    'desc'          => esc_html__( 'Set the text color for inactive numbered pagination bullets.', 'block-slider' ),
                ),
                'custom_active_background_color' => array(
                    'title'         => esc_html__( 'Custom active Background Color', 'block-slider' ),
                    'field_type'    => 'bscolor',
                    'default'       => '#0a0607',
                    'extra_class'   => 'bs_custom_style',
                    'desc'          => esc_html__( 'Set the background color for inactive pagination bullets.', 'block-slider' ),
                ),

            );

            return apply_filters( 'bs_pagination_fields', $fields );
        }

        /**
         * Responsive field
         *
         * @return array
         */
        public static function responsive_field(){

            $fields = array(

                'control_enable_responsive'   => array(
                    'title'         => esc_html__( 'Enable Responsive', 'block-slider' ),
                    'field_type'    => 'bsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Enable responsive layout for different screen sizes (mobile, tablet, desktop).', 'block-slider' ),
                    'data_show'     => '.bs_responsive_field',
                ),
                'items_in_desktop'  => array(
                    'title'         => esc_html__( 'Items in Desktop', 'block-slider' ),
                    'field_type'    => 'bsnumber',
                    'default'       => 4,
                    'extra_class'   => 'bs_responsive_field',
                ),
                'items_in_tablet'   => array(
                    'title'         => esc_html__( 'Items in Tablet', 'block-slider' ),
                    'field_type'    => 'bsnumber',
                    'default'       => 2,
                    'extra_class'   => 'bs_responsive_field',
                ),
                'items_in_mobile'   => array(
                    'title'         => esc_html__( 'Items in Mobile', 'block-slider' ),
                    'field_type'    => 'bsnumber',
                    'default'       => 1,
                    'extra_class'   => 'bs_responsive_field',
                ),

            );

            return apply_filters( 'bs_responsive_fields', $fields );
        }

        /**
         * Thumbnail gallery field
         *
         * @return array
         */
        public static function thumbnail_gallery_field(){
            $fields = array();
            return apply_filters( 'bs_thumbnail_gallery_fields', $fields );
        }

        /**
         * Autoplay field
         *
         * @return array
         */
        public static function autoplay_field(){

            $fields = array(

                'control_autoplay'  => array(
                    'title'         => esc_html__( 'Autoplay', 'block-slider' ),
                    'field_type'    => 'bsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Enable or disable autoplay functionality.', 'block-slider' ),
                    'data_show'     => '.bs_autoplay_timing',
                ),
                'autoplay_timing'   => array(
                    'title'         => esc_html__( 'Autoplay timing', 'block-slider' ),
                    'field_type'    => 'bsnumber',
                    'default'       => 3000,
                    'desc'          => esc_html__( 'Enter autoplay speed in milliseconds (e.g., 3000 for 3 seconds).', 'block-slider' ),
                    'unit'          => array(
                        'seconds'   => esc_html__( 'Second\'s', 'block-slider' ),
                    ),
                    'unit_selected' => 'seconds',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'bs_autoplay_timing',
                ),
                'control_autoplay_timeleft' => array(
                    'title'       => esc_html__( 'Circular Autoplay Progress', 'block-slider' ),
                    'field_type'  => 'bsswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Show circular progress countdown during autoplay.', 'block-slider' ),
                    'data_show'   => '.bs_autoplay_timeleft', 
                ),
                'control_autoplay_timeleft_color' => array(
                    'title'       => esc_html__( 'TimeLeft Color', 'block-slider' ),
                    'field_type'  => 'bscolor',
                    'default'     => '#007aff',
                    'desc'        => esc_html__( 'Set color for circular autoplay progress.', 'block-slider' ),
                    'extra_class' => 'bs_autoplay_timeleft',
                ),
                'control_autoplay_timeleft_position' => array(
                    'title'       => esc_html__( 'Autoplay TimeLeft Position', 'block-slider' ),
                    'field_type'  => 'bsselect',
                    'default'     => 'bottom-right',
                    'options'     => array(
                        'top-left'     => esc_html__( 'Top Left', 'block-slider' ),
                        'top-right'    => esc_html__( 'Top Right', 'block-slider' ),
                        'bottom-left'  => esc_html__( 'Bottom Left', 'block-slider' ),
                        'bottom-right' => esc_html__( 'Bottom Right', 'block-slider' ),
                    ),
                    'desc'          => esc_html__( 'Choose position for autoplay time left circle.', 'block-slider' ),
                    'extra_class'   => 'bs_autoplay_timeleft',
                ),
                'control_autoplay_timeleft_font_size' => array(
                    'title'       => esc_html__( 'Time Left Font Size', 'block-slider' ),
                    'field_type'  => 'bsnumber',
                    'default'     => 20,
                    'desc'        => esc_html__( 'Font size for the autoplay time left number.', 'block-slider' ),
                    'unit'          => array(
                        'px'      => esc_html__( 'PX', 'block-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'extra_class' => 'bs_autoplay_timeleft',
                ),

            );

            return apply_filters( 'bs_autoplay_fields', $fields );    
        }

        /**
         * Scrollbar field
         *
         * @return array
         */
        public static function scrollbar_field(){
            $fields = array();
            return apply_filters( 'bs_scrollbar_fields', $fields );
        }

        /**
         * Other options field
         *
         * @return array
         */
        public static function other_options_field(){

            $fields = array(

                'image_unit' => array(
                    'title'       => esc_html__( 'Set Width & Height', 'block-slider' ),
                    'field_type'  => 'bsselect',
                    'options'     => array(
                        'px'  => 'px',
                        '%'   => '%',
                        'em'  => 'em',
                        'rem' => 'rem',
                        'vh'  => 'vh',
                    ),
                    'default'    => 'px',
                    'desc'       => esc_html__( 'Unit to use for image width and height (e.g, px, %, em). Applied to each slide image.', 'block-slider' ),
                ),
                'width_image' => array(
                    'title'       => esc_html__( 'Width of Image', 'block-slider' ),
                    'field_type'  => 'bsnumber',
                    'default'     => 700,
                    'desc'        =>  esc_html__( 'Specify the width of each slide image.', 'block-slider' ),
                ),
                'height_image'  => array(
                    'title'       => esc_html__( 'Height of Image', 'block-slider' ),
                    'field_type'  => 'bsnumber',
                    'default'     => 400,
                    'desc'        =>  esc_html__( 'Specify the height of each slide image.', 'block-slider' ),
                ),
                'border_radius_image' => array(
                    'title'       => esc_html__( 'Border Radius of Image', 'block-slider' ),
                    'field_type'  => 'bsrange',
                    'default'     => 0,
                    'desc'        => esc_html__( 'Specify the border radius of each slide image.', 'block-slider' ),
                    'unit'          => array(
                        'percent'      => esc_html__( '%', 'block-slider' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                ),
                'control_lazyload_images' => array(
                    'title'         => esc_html__( 'Lazy load images', 'block-slider' ),  
                    'field_type'    => 'bsswitch',
                    'default'       => 'yes',
                    'desc'          => esc_html__( 'Load images only when they are needed.', 'block-slider' ),
                ),
                'control_grab_cursor'   => array(
                    'title'         => esc_html__( 'Grab cursor', 'block-slider' ),
                    'field_type'    => 'bsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Change the mouse cursor to a hand icon when hovering over the slider.', 'block-slider' ),
                ),
                'control_rewind' => array(
                    'title'       => esc_html__( 'Rewind', 'block-slider' ),
                    'field_type'  => 'bsswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable rewind functionality for the slider.', 'block-slider' ),
                ),
                'control_slide_space' => array(
                    'title'       => esc_html__( 'Slides Space', 'block-slider' ),
                    'field_type'  => 'bsnumber',
                    'default'     => 10,
                    'desc'        => esc_html__( 'Space between each slide.', 'block-slider' ),
                    'unit'          => array(
                        'px'      => esc_html__( 'PX', 'block-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                ),

            );

            return apply_filters( 'bs_other_options_fields', $fields );
        }

        /**
         * Custom CSS field
         *
         * @return array
         */
        public static function custom_css_field(){

            $fields = array(

                'custom_class_name' => array(
                    'title'       => esc_html__( 'Custom Class Name', 'block-slider' ),
                    'field_type'  => 'bstext',
                    'default'     => '',
                    'placeholder' => esc_html__( 'my-custom-slider', 'block-slider' ),
                    'desc'        => esc_html__( 'Enter a custom CSS class name (without dot). This class will be added to the slider wrapper. Example: my-custom-slider', 'block-slider' ),
                ),

                // 'custom_css' => array(
                //     'title'       => esc_html__( 'Custom CSS', 'block-slider' ),
                //     'field_type'  => 'bstextarea',
                //     'default'     => '',
                //     'rows'        => 25,
                //     'cols'        => 50,
                //     'placeholder' => esc_html__( '/* Add your custom CSS here */', 'block-slider' ),
                //     'desc'        => sprintf(
                //         '%s<br><br><strong>%s</strong><br>%s<br><br><strong>%s</strong><br>%s<br><br><strong>%s</strong><br>%s<br><br><strong>%s</strong><br>%s<br><br><strong>%s</strong><br>%s<br><br><strong>%s</strong><br>%s',
                //         esc_html__( 'Add custom CSS in this single textarea. You can add CSS for your custom class (if you entered a class name above) and also for plugin classes. Both will work together.', 'block-slider' ),
                //         esc_html__( 'For Custom Class:', 'block-slider' ),
                //         esc_html__( 'If you entered a custom class name above (e.g., "my-slider"), add CSS like: .my-slider { background: red; }', 'block-slider' ),
                //         esc_html__( 'For Plugin Classes:', 'block-slider' ),
                //         esc_html__( 'Main Classes: .bs-swiper (main wrapper), .swiper-wrapper (slides container), .swiper-slide (individual slides)', 'block-slider' ),
                //         esc_html__( 'Navigation:', 'block-slider' ),
                //         esc_html__( '.swiper-button-next, .swiper-button-prev (arrows), .swiper-button-next:hover, .swiper-button-prev:hover', 'block-slider' ),
                //         esc_html__( 'Pagination:', 'block-slider' ),
                //         esc_html__( '.swiper-pagination, .swiper-pagination-bullet, .swiper-pagination-bullet-active, .swiper-pagination-fraction,  .swiper-pagination-progressbar, .swiper-pagination-progressbar-fill', 'block-slider' ),
                //         esc_html__( 'Images:', 'block-slider' ),
                //         esc_html__( '.swiper-slide img, .swiper-zoom-container', 'block-slider' ),
                //         esc_html__( 'Autoplay:', 'block-slider' ),
                //         esc_html__( '.autoplay-progress (autoplay timer), .autoplay-progress svg circle (progress circle)', 'block-slider' )
                //     ),
                // ),

                'custom_css' => array(
                    'title'       => esc_html__( 'Custom CSS', 'block-slider' ),
                    'field_type'  => 'bstextarea',
                    'default'     => '',
                    'rows'        => 25,
                    'cols'        => 50,
                    'placeholder' => esc_html__( '/* Add your custom CSS here */', 'block-slider' ),
                    'desc'        => esc_html__( 'Add your custom CSS here. This CSS will apply globally to the slider and its elements.', 'block-slider' ),
                ),


            );

            return apply_filters( 'bs_custom_css_fields', $fields );
        }
    }

endif;
