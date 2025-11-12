<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'GTBS_Settings_Fields' ) ) :

     /**
	 * Class GTBS_Settings_Fields
	 *
	 */
    class GTBS_Settings_Fields {

        /**
         * Animation field
         *
         * @return array
         */
        public static function animation_field(){

            $fields = array(

                'animation'  => array(
                    'title'         => esc_html__( 'Transition type', 'gutenberg-slider' ),
                    'field_type'    => 'gtbsradio',
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
                    'data_hide'     => '.gtbs_coverflow_options, .gtbs_cube_options, .gtbs_cards_options',
                    'data_show'     => array(
                        'cube'       => '.gtbs_cube_options',
                        'cards'      => '.gtbs_cards_options',
                        'coverflow'  => '.gtbs_coverflow_options',
                    ),
                ),
                
                'cards_border' => array(
                    'title'       => esc_html__('Border Radius', 'gutenberg-slider'),
                    'field_type'  => 'gtbsnumber',
                    'default'     => 20,
                    'extra_class' => 'gtbs_cards_options',
                    'desc'        => esc_html__('Border radius cards in px.', 'gutenberg-slider'),
                ),

                'cube_shadows' => array(
                    'title'       => esc_html__('Shadows', 'gutenberg-slider'),
                    'field_type'  => 'gtbsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'gtbs_cube_options',
                    'desc'        => esc_html__('Enable shadows.', 'gutenberg-slider'),
                ),
                'cube_slide_shadows' => array(
                    'title'       => esc_html__('Slide Shadows', 'gutenberg-slider'),
                    'field_type'  => 'gtbsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'gtbs_cube_options',
                    'desc'        => esc_html__('Enable slide shadows.', 'gutenberg-slider'),
                ),
                'cube_shadowoffset' => array(
                    'title'       => esc_html__('Shadow Offset', 'gutenberg-slider'),
                    'field_type'  => 'gtbsnumber',
                    'default'     => 20,
                    'extra_class' => 'gtbs_cube_options',
                    'desc'        => esc_html__('Shadow Offset in slides.', 'gutenberg-slider'),
                ),
                'cube_shadowScale' => array(
                    'title'       => esc_html__('Shadow Scale', 'gutenberg-slider'),
                    'field_type'  => 'gtbsnumber',
                    'default'     => 1,
                    'extra_class' => 'gtbs_cube_options',
                    'desc'        => esc_html__('Shadow Scale in slides.', 'gutenberg-slider'),
                ),

            );

            return apply_filters( 'gtbs_animation_fields', $fields );
        }

        /**
         * Navigation field
         *
         * @return array
         */
        public static function navigation_field(){

            $fields = array(

                'navigation_arrow_style' => array(
                    'title'         => esc_html__( 'Navigation arrows style', 'gutenberg-slider' ),
                    'field_type'    => 'gtbsradio',
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
                    'data_hide'  => '.gtbs_arrow_fields, .gtbs_arrow_border_radius, .gtbs_arrow_color, .gtbs_arrow_bg_color, .gtbs_arrow_hover_bg_color, .gtbs_arrow_position',
                    'data_show'  => array(
                        'none'   => '',
                        'style1' => '.gtbs_arrow_fields',
                        'style2' => '.gtbs_arrow_fields, .gtbs_arrow_border_radius, .gtbs_arrow_color, .gtbs_arrow_bg_color, .gtbs_arrow_hover_bg_color',
                        'style3' => '.gtbs_arrow_fields, .gtbs_arrow_color, .gtbs_arrow_bg_color, .gtbs_arrow_hover_bg_color',
                        'style4' => '.gtbs_arrow_fields, .gtbs_arrow_border_radius, .gtbs_arrow_color, .gtbs_arrow_bg_color, .gtbs_arrow_hover_bg_color',
                        'style5' => '.gtbs_arrow_fields',
                        'custom' => '.gtbs_arrow_fields, .gtbs_arrow_border_radius, .gtbs_arrow_color, .gtbs_arrow_position',
                    ),
                ),
                'arrow_font_size' => array(
                    'title'       => esc_html__( 'Arrow Font Size', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsnumber',
                    'default'     => 16,
                    'desc'        => esc_html__( 'Set font size for arrow icon in px.', 'gutenberg-slider' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'gutenberg-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'gtbs_arrow_fields',
                ),
                'arrow_color' => array(
                    'title'       => esc_html__( 'Arrow Color', 'gutenberg-slider' ),
                    'field_type'  => 'gtbscolor', 
                    'default'     => '#ffffff',
                    'extra_class' => 'gtbs_arrow_fields',
                ),
                'arrow_hover_color' => array(
                    'title'       => esc_html__( 'Arrow Hover Color', 'gutenberg-slider' ),
                    'field_type'  => 'gtbscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'gtbs_arrow_fields',
                ),

                'arrow_border_radius' => array(
                    'title'       => esc_html__( 'Arrow Border Radius', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsrange',
                    'default'     => 50,
                    'desc'        => esc_html__( 'Set border radius for arrow border.', 'gutenberg-slider' ),
                    'unit'        => array(
                        'percent'    => esc_html__( '%', 'gutenberg-slider' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'gtbs_arrow_border_radius',
                ),

                'arrow_bg_color' => array(
                    'title'       => esc_html__( 'Arrow Background Color', 'gutenberg-slider' ),
                    'field_type'  => 'gtbscolor',
                    'default'     => '#000000',
                    'extra_class' => 'gtbs_arrow_bg_color',
                ),
                'arrow_hover_bg_color' => array(
                    'title'       => esc_html__( 'Arrow Hover Background Color', 'gutenberg-slider' ),
                    'field_type'  => 'gtbscolor',
                    'default'     => '#333333',
                    'extra_class' => 'gtbs_arrow_bg_hover_color',
                ),
                'arrow_border_color' => array(
                    'title'       => esc_html__( 'Arrow Border Color', 'gutenberg-slider' ),
                    'field_type'  => 'gtbscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'gtbs_arrow_color',
                ),
                'arrow_position_unit' => array(
                    'title'        => esc_html__( 'Arrow Position Unit', 'gutenberg-slider' ),
                    'field_type'  => 'select',
                    'options'     => array(
                        'px'  => 'px',
                        '%'   => '%',
                        'em'  => 'em',
                        'rem' => 'rem',
                    ),
                    'default'     => 'px',
                    'extra_class' => 'gtbs_arrow_position',
                ),
                'arrow_position_top' => array(
                    'title'       => esc_html__( 'Arrow Top Position', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsnumber',
                    'default'     => 220,
                    'desc'        => esc_html__( 'Distance from the top. Leave bottom blank if this is set.', 'gutenberg-slider' ),
                    'extra_class' => 'gtbs_arrow_position',
                ),
                'arrow_position_bottom' => array(
                    'title'       => esc_html__( 'Arrow Bottom Position', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsnumber',
                    'default'     => '',
                    'desc'        => esc_html__( 'Distance from the bottom. Leave top blank if this is set.', 'gutenberg-slider' ),
                    'extra_class' => 'gtbs_arrow_position',
                ),
                'arrow_position_left' => array(
                    'title'       => esc_html__( 'Arrow Left Position', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsnumber',
                    'default'     => 10,
                    'desc'        => esc_html__( 'Distance from the left.', 'gutenberg-slider' ),
                    'extra_class' => 'gtbs_arrow_position',
                ),
                'arrow_position_right' => array(
                    'title'       => esc_html__( 'Arrow Right Position', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsnumber',
                    'default'     => 10,
                    'desc'        => esc_html__( 'Distance from the right.', 'gutenberg-slider' ),
                    'extra_class' => 'gtbs_arrow_position',
                ),

            );

            return apply_filters( 'gtbs_navigation_fields', $fields );
        }

        /**
         * Pagination field
         *
         * @return array
         */
        public static function pagination_field(){

            $fields = array(

                'pagination_type' => array(
                    'title'       => esc_html__( 'Pagination Type', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsselect',
                    'options'     => array(
                        'none'        => esc_html__( 'None', 'gutenberg-slider' ),
                        'bullets'     => esc_html__( 'Bullets', 'gutenberg-slider' ),
                        'progressbar' => esc_html__( 'Progress Bar', 'gutenberg-slider' ),
                        'fraction'    => esc_html__( 'Fraction', 'gutenberg-slider' ),
                        'custom'      => esc_html__( 'Custom', 'gutenberg-slider' ),
                    ),
                    'disabled_options' => array( 'fraction' , 'custom' ),
                    'default'       => 'bullets',
                    'desc'          => esc_html__( 'Choose the type of pagination for the slider.', 'gutenberg-slider' ),
                    'data_hide'     => '.gtbs_bullet_style, .gtbs_autoplay_progress, .gtbs_progress_bar, .gtbs_fraction_style, .gtbs_custom_style, .gtbs_bullets_bg_color, .gtbs_bullets_hover_bg_color, .gtbs_bullets_border_color',
                    'data_show' => array(
                        'bullets'     => '.gtbs_bullet_style, .gtbs_bullets_bg_color, .gtbs_bullets_hover_bg_color, .gtbs_bullets_border_color',
                        'progressbar' => '.gtbs_autoplay_progress, .gtbs_progress_bar',
                        'fraction'    => '.gtbs_fraction_style',
                        'custom'      => '.gtbs_custom_style',
                    ),
                ),

                'bullets_navigation_style'  => array(
                    'title'         => esc_html__( 'Bullet style', 'gutenberg-slider' ),
                    'field_type'    => 'gtbsradio',
                    'options'       => array(
                        'style1' =>  'bullets-style-1.jpg',
                        'style2' =>  'bullets-style-2.jpg',
                        'style3' =>  'bullets-style-3.jpg',
                        'style4' =>  'bullets-style-4.jpg',
                    ),
                    'default'       => 'style1',
                    'extra_class'   => 'gtbs_bullet_style',
                ),

                'bullets_bg_color' => array(
                    'title'       => esc_html__( 'Bullet Background Color', 'gutenberg-slider' ),
                    'field_type'  => 'gtbscolor',
                    'default'     => '',
                    'extra_class' => 'gtbs_bullets_bg_color',
                ),
                'bullets_hover_bg_color' => array(
                    'title'       => esc_html__( 'Bullet Hover Background Color', 'gutenberg-slider' ),
                    'field_type'  => 'gtbscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'gtbs_bullets_hover_bg_color',
                ),
                'bullets_border_color' => array(
                    'title'       => esc_html__( 'Bullet Border Color', 'gutenberg-slider' ),
                    'field_type'  => 'gtbscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'gtbs_bullets_border_color',
                ),
                'control_autoplay_progress'   => array(
                    'title'         => esc_html__( 'Progress Bar', 'gutenberg-slider' ),
                    'field_type'    => 'gtbsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Show a progress bar while autoplay is running.', 'gutenberg-slider' ),
                    'data_show'     => '.gtbs_progress_bar',
                    'extra_class'   => 'gtbs_autoplay_progress',
                ),
                'progress_bar_position' => array(
                    'title'         => esc_html__( 'Progress Bar Position', 'gutenberg-slider' ),
                    'field_type'    => 'gtbsselect',
                    'options'       => array(
                        'bottom'    => esc_html__( 'Bottom (Use in Horizontal)', 'gutenberg-slider' ),
                        'top'       => esc_html__( 'Top (Use in Horizontal)', 'gutenberg-slider' ),
                        'left'      => esc_html__( 'Left (Use in Vertical)', 'gutenberg-slider' ),
                        'right'     => esc_html__( 'Right (Use in Vertical)', 'gutenberg-slider' ),
                    ),
                    'default'       => 'bottom',
                    'desc'          => esc_html__( 'Choose where to position the autoplay progress bar.', 'gutenberg-slider' ),
                    'extra_class'      => 'gtbs_progress_bar',
                    'disabled_options' => array('right','left'),
                ),
                'progress_bar_color' => array(
                    'title'          => esc_html__( 'Progress bar color', 'gutenberg-slider' ),
                    'field_type'    => 'gtbscolor',
                    'default'       => '#ff0000',
                    'extra_class'   => 'gtbs_progress_bar',
                ),
                'fraction_navigation_style'  => array(
                    'title'       => esc_html__( 'Fraction style', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsradio',
                    'options'     => array(
                        'style1'  => 'bullets-fraction.png',
                    ),
                    'default'     => 'style1',
                    'extra_class' => 'gtbs_fraction_style',
                ),
                'fraction_color' => array(
                    'title'         => esc_html__( 'Fraction color', 'gutenberg-slider' ),
                    'field_type'    => 'gtbscolor',
                    'default'       => '#ff0000',
                    'extra_class'   => 'gtbs_fraction_style',
                ),
                'fraction_font_size' => array(
                    'title'       => esc_html__( 'Fraction Font Size (px)', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsnumber',
                    'default'     => 16,
                    'extra_class' => 'gtbs_fraction_style',
                    'desc'        => esc_html__( 'Set the font size for the fraction pagination.', 'gutenberg-slider' ),
                ),
                'fraction_position' => array(
                    'title'       => esc_html__( 'Fraction Position', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsselect',
                    'default'     => 'center',
                    'options'     => array(
                        'top-left'     => esc_html__( 'Top Left', 'gutenberg-slider' ),
                        'top-right'    => esc_html__( 'Top Right', 'gutenberg-slider' ),
                        'bottom-left'  => esc_html__( 'Bottom Left', 'gutenberg-slider' ),
                        'bottom-right' => esc_html__( 'Bottom Right', 'gutenberg-slider' ),
                        'center'       => esc_html__( 'Center', 'gutenberg-slider' ),
                    ),
                    'desc'         => esc_html__( 'Choose position for fraction in pagination.', 'gutenberg-slider' ),
                    'extra_class'  => 'gtbs_fraction_style',
                ),
                'custom_navigation_style'  => array(
                    'title'       => esc_html__( 'Custom style', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsradio',
                    'options'     => array(
                        'style1'  => 'custom-style1.jpg',
                    ),
                    'default'     => 'style1',
                    'extra_class' => 'gtbs_custom_style',
                ),
                'custom_text_color' => array(
                    'title'         => esc_html__( 'Custom Color', 'gutenberg-slider' ),
                    'field_type'    => 'gtbscolor',
                    'default'       => '#ffffff',
                    'extra_class'   => 'gtbs_custom_style',
                    'desc'          => esc_html__( 'Set the text color for numbered pagination bullets.', 'gutenberg-slider' ),
                ),
                'custom_background_color' => array(
                    'title'         => esc_html__( 'Custom Background Color', 'gutenberg-slider' ),
                    'field_type'    => 'gtbscolor',
                    'default'       => '#007aff',
                    'extra_class'   => 'gtbs_custom_style',
                    'desc'          => esc_html__( 'Set the background color for active pagination bullets.', 'gutenberg-slider' ),
                ),
                'custom_active_text_color' => array(
                    'title'         => esc_html__( 'Custom active Text Color', 'gutenberg-slider' ),
                    'field_type'    => 'gtbscolor',
                    'default'       => '#ffffff',
                    'extra_class'   => 'gtbs_custom_style',
                    'desc'          => esc_html__( 'Set the text color for inactive numbered pagination bullets.', 'gutenberg-slider' ),
                ),
                'custom_active_background_color' => array(
                    'title'         => esc_html__( 'Custom active Background Color', 'gutenberg-slider' ),
                    'field_type'    => 'gtbscolor',
                    'default'       => '#0a0607',
                    'extra_class'   => 'gtbs_custom_style',
                    'desc'          => esc_html__( 'Set the background color for inactive pagination bullets.', 'gutenberg-slider' ),
                ),

            );

            return apply_filters( 'gtbs_pagination_fields', $fields );
        }

        /**
         * Responsive field
         *
         * @return array
         */
        public static function responsive_field(){

            $fields = array(

                'control_enable_responsive'   => array(
                    'title'         => esc_html__( 'Enable Responsive', 'gutenberg-slider' ),
                    'field_type'    => 'gtbsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Enable responsive layout for different screen sizes (mobile, tablet, desktop).', 'gutenberg-slider' ),
                    'data_show'     => '.gtbs_responsive_field',
                ),
                'items_in_desktop'  => array(
                    'title'         => esc_html__( 'Items in Standard Desktop', 'gutenberg-slider' ),
                    'field_type'    => 'gtbsnumber',
                    'default'       => 4,
                    'extra_class'   => 'gtbs_responsive_field',
                ),
                'items_in_tablet'   => array(
                    'title'         => esc_html__( 'Items in Tablet', 'gutenberg-slider' ),
                    'field_type'    => 'gtbsnumber',
                    'default'       => 2,
                    'extra_class'   => 'gtbs_responsive_field',
                ),
                'items_in_mobile'   => array(
                    'title'         => esc_html__( 'Items in Mobile', 'gutenberg-slider' ),
                    'field_type'    => 'gtbsnumber',
                    'default'       => 1,
                    'extra_class'   => 'gtbs_responsive_field',
                ),
                'slide_control_view_auto' => array(
                    'title'       =>  esc_html__( 'Slides Per View Auto', 'gutenberg-slider' ),
                    'field_type'  =>  'gtbspro',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable slide show per view auto for the slider.', 'gutenberg-slider' ),
                ),
                'slide_control_center' => array(
                    'title'       =>  esc_html__( 'Slides Centered', 'gutenberg-slider' ),
                    'field_type'  =>  'gtbspro',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable slide centered for the slider.', 'gutenberg-slider' ),
                ),

            );

            return apply_filters( 'gtbs_responsive_fields', $fields );
        }

        /**
         * Thumbnail gallery field
         *
         * @return array
         */
        public static function thumbnail_gallery_field(){   

            $fields = array(

                'thumb_gallery' => array(
                    'title'       => esc_html__( 'Show Thumbnail Gallery', 'gutenberg-slider' ),
                    'field_type'  => 'gtbspro',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable to display a thumbnail gallery below the main slider.', 'gutenberg-slider' ),
                    'data_show'   => '.gtbs_thumb_gallery',
                ),
                'thumb_gallery_loop' => array(   
                    'title'       => esc_html__( 'Thumbnail Gallery Loop', 'gutenberg-slider' ),
                    'field_type'  => 'gtbspro',
                    'default'     => 'yes',
                    'desc'        => esc_html__( 'Enable continuous loop mode for the thumbs gallery.', 'gutenberg-slider' ),
                    'extra_class' => 'gtbs_thumb_gallery',
                ),
                'thumb_gallery_space' => array(
                    'title'       => esc_html__( 'Thumbnail Gallery Space', 'gutenberg-slider' ),
                    'field_type'  => 'gtbspro',
                    'default'     => 10,
                    'desc'        => esc_html__( 'Space between each thumbs gallery (in px).', 'gutenberg-slider' ),
                    'extra_class' => 'gtbs_thumb_gallery',
                ),
                'thumb_gallery_width' => array(
                    'title'       => esc_html__( 'Thumbnail Width', 'gutenberg-slider' ),
                    'field_type'  => 'gtbspro',
                    'default'     => 80,
                    'desc'        => esc_html__( 'Set width of thumbnail images in px.', 'gutenberg-slider' ),
                    'extra_class' => 'gtbs_thumb_gallery',
                ),
                'thumb_gallery_height' => array(
                    'title'       => esc_html__( 'Thumbnail Height', 'gutenberg-slider' ),
                    'field_type'  => 'gtbspro',
                    'default'     => 80,
                    'desc'        => esc_html__( 'Set height of thumbnail images in px.', 'gutenberg-slider' ),
                    'extra_class' => 'gtbs_thumb_gallery',
                ),

            );

            return apply_filters( 'gtbs_thumbnail_gallery_fields', $fields );
        }

        /**
         * Autoplay field
         *
         * @return array
         */
        public static function autoplay_field(){

            $fields = array(

                'control_autoplay'  => array(
                    'title'         => esc_html__( 'Autoplay', 'gutenberg-slider' ),
                    'field_type'    => 'gtbsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Enable or disable autoplay functionality.', 'gutenberg-slider' ),
                    'data_show'     => '.gtbs_autoplay_timing',
                ),
                'autoplay_timing'   => array(
                    'title'         => esc_html__( 'Autoplay timing', 'gutenberg-slider' ),
                    'field_type'    => 'gtbsnumber',
                    'default'       => 3000,
                    'desc'          => esc_html__( 'Enter autoplay speed in milliseconds (e.g., 3000 for 3 seconds).', 'gutenberg-slider' ),
                    'unit'          => array(
                        'seconds'   => esc_html__( 'Seconds', 'gutenberg-slider' ),
                    ),
                    'unit_selected' => 'seconds',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'gtbs_autoplay_timing',
                ),
                'control_autoplay_timeleft' => array(
                    'title'       => esc_html__( 'Circular Autoplay Progress', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Show circular progress countdown during autoplay (available for all pagination types).', 'gutenberg-slider' ),
                    'data_show'   => '.gtbs_autoplay_timeleft', 
                ),
                'control_autoplay_timeleft_color' => array(
                    'title'       => esc_html__( 'TimeLeft Color', 'gutenberg-slider' ),
                    'field_type'  => 'gtbscolor',
                    'default'     => '#007aff',
                    'desc'        => esc_html__( 'Set color for circular autoplay progress.', 'gutenberg-slider' ),
                    'extra_class' => 'gtbs_autoplay_timeleft',
                ),
                'control_autoplay_timeleft_position' => array(
                    'title'       => esc_html__( 'Autoplay TimeLeft Position', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsselect',
                    'default'     => 'bottom-right',
                    'options'     => array(
                        'top-left'     => esc_html__( 'Top Left', 'gutenberg-slider' ),
                        'top-right'    => esc_html__( 'Top Right', 'gutenberg-slider' ),
                        'bottom-left'  => esc_html__( 'Bottom Left', 'gutenberg-slider' ),
                        'bottom-right' => esc_html__( 'Bottom Right', 'gutenberg-slider' ),
                    ),
                    'desc'          => esc_html__( 'Choose position for autoplay time left circle.', 'gutenberg-slider' ),
                    'extra_class'   => 'gtbs_autoplay_timeleft',
                ),
                'control_autoplay_timeleft_font_size' => array(
                    'title'       => esc_html__( 'Time Left Font Size', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsnumber',
                    'default'     => 20,
                    'desc'        => esc_html__( 'Font size for the autoplay time left number.', 'gutenberg-slider' ),
                    'unit'          => array(
                        'px'      => esc_html__( 'PX', 'gutenberg-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'extra_class' => 'gtbs_autoplay_timeleft',
                ),

            );

            return apply_filters( 'gtbs_autoplay_fields', $fields );    
        }

        /**
         * Scrollbar field
         *
         * @return array
         */
        public static function scrollbar_field(){

            $fields = array(

                'control_scrollbar' => array(
                    'title'       =>  esc_html__( 'Scrollbar Control', 'gutenberg-slider' ),
                    'field_type'  =>  'gtbspro',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable scrollbar navigation for the slider.', 'gutenberg-slider' ),
                    'data_show'   => '.gtbs_scrollbar_wrapper',
                ),
                'scrollbar_position' => array(
                    'title'       => esc_html__('Scrollbar Position', 'gutenberg-slider'),
                    'field_type'  => 'gtbspro',
                    'default'     => 'bottom',
                    'desc'        => esc_html__('Choose scrollbar position.', 'gutenberg-slider'),
                    'options'     => array(
                        'bottom' => esc_html__('Bottom (Use in Horizontal)', 'gutenberg-slider'),
                        'top'    => esc_html__('Top (Use in Horizontal)', 'gutenberg-slider'),
                        'left'   => esc_html__('Left ( Use in Vertical)', 'gutenberg-slider'),
                        'right'  => esc_html__('Right ( Use in Vertical)', 'gutenberg-slider'),
                    ),      
                    'extra_class' => 'gtbs_scrollbar_wrapper',
                ),
                'scrollbar_color' => array(
                    'title'       =>  esc_html__( 'Scrollbar Color', 'gutenberg-slider' ),
                    'field_type'  =>  'gtbspro',
                    'default'     =>  '#999999',
                    'extra_class' =>  'gtbs_scrollbar_wrapper',
                ),  

            );

            return apply_filters( 'gtbs_scrollbar_fields', $fields );
        }

        /**
         * Other options field
         *
         * @return array
         */
        public static function other_options_field(){

            $fields = array(

                'image_unit' => array(
                    'title'       => esc_html__( 'Set Width & Height', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsselect',
                    'options'     => array(
                        'px'  => 'px',
                        '%'   => '%',
                        'em'  => 'em',
                        'rem' => 'rem',
                        'vh'  => 'vh',
                    ),
                    'default'    => 'px',
                    'desc'       => esc_html__( 'Unit to use for image width and height (e.g., px, %, em). Applied to each slide image.', 'gutenberg-slider' ),
                ),
                'width_image' => array(
                    'title'       => esc_html__( 'Width of Image', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsnumber',
                    'default'     => 700,
                    'desc'        =>  esc_html__( 'Specify the width of each slide image.', 'gutenberg-slider' ),
                ),
                'height_image'  => array(
                    'title'       => esc_html__( 'Height of Image', 'gutenberg-slider' ),
                    'field_type'  => 'gtbsnumber',
                    'default'     => 400,
                    'desc'        =>  esc_html__( 'Specify the height of each slide image.', 'gutenberg-slider' ),
                ),
                'control_slider_vertical' => array(
                    'title'       =>  esc_html__( 'Vertical Slider Control', 'gutenberg-slider' ),
                    'field_type'  =>  'gtbspro',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable vertical direction for the slider.', 'gutenberg-slider' ),
                ),
                'control_lazyload_images'   => array(
                    'title'         => esc_html__( 'Lazy load images', 'gutenberg-slider' ),  
                    'field_type'    => 'gtbsswitch',
                    'default'       => 'yes',
                    'desc'          => esc_html__( 'Load images only when they are needed.', 'gutenberg-slider' ),
                ),
                'control_grab_cursor'   => array(
                    'title'         => esc_html__( 'Grab cursor', 'gutenberg-slider' ),
                    'field_type'    => 'gtbsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Change the mouse cursor to a hand icon when hovering over the slider.', 'gutenberg-slider' ),
                ),
                'control_loop_slider' => array(
                    'title'       => esc_html__( 'Loop Slides', 'gutenberg-slider' ),
                    'field_type'  => 'gtbspro',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable continuous loop mode for the slider.', 'gutenberg-slider' ),
                ),
                'control_slide_speed' => array(
                    'title'       => esc_html__( 'Slide Speed', 'gutenberg-slider' ),
                    'field_type'  => 'gtbspro',
                    'default'     => 400,
                    'desc'        => esc_html__( 'Set the speed of slide transition in milliseconds (e.g., 400 = 0.4 seconds).', 'gutenberg-slider' ),
                ),
                'control_slide_space' => array(
                    'title'       => esc_html__( 'Slides Space', 'gutenberg-slider' ),
                    'field_type'  => 'gtbspro',
                    'default'     => 10,
                    'desc'        => esc_html__( 'Space between each slide (in px).', 'gutenberg-slider' ),
                ),
                'zoom_images' => array(
                    'title'       => esc_html__( 'Zoom Images', 'gutenberg-slider' ),
                    'field_type'  => 'gtbspro',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable a zoom images for slider.', 'gutenberg-slider' ),
                ),
                'control_keyboard' => array(
                    'title'       =>  esc_html__( 'Keyboard Control', 'gutenberg-slider' ),
                    'field_type'  =>  'gtbspro',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable keyboard navigation for the slider using arrow keys.', 'gutenberg-slider' ),
                ),
                'control_mousewheel' => array(
                    'title'       =>  esc_html__( 'Mousewheel Control', 'gutenberg-slider' ),
                    'field_type'  =>  'gtbspro',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable mouse wheel navigation for the slider.', 'gutenberg-slider' ),
                ),
                'control_rtl_slider' => array(
                    'title'       => esc_html__( 'Enable RTL', 'gutenberg-slider' ),
                    'field_type'  => 'gtbspro',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable Right-to-Left sliding for RTL languages.', 'gutenberg-slider' ),
                ),
                'enable_grid_layout' => array(
                    'title'       => esc_html__('Enable Grid Layout', 'gutenberg-slider'),
                    'field_type'  => 'gtbspro',
                    'default'     => 'no',
                    'desc'        => esc_html__('Enable Swiper grid layout.', 'gutenberg-slider'),
                    'data_show'   => '.gtbs_grid_layout',
                ),
                'grid_layout_axis' => array(
                    'title'       => esc_html__('Grid Layout Type', 'gutenberg-slider'),
                    'field_type'  => 'gtbspro',
                    'default'     => 'row',
                    'options'     => array(
                        'row'     => esc_html__('Row', 'gutenberg-slider'),
                        'column'  => esc_html__('Column', 'gutenberg-slider'),
                    ),
                    'desc'         => esc_html__('Choose grid layout: Row or Column.', 'gutenberg-slider'),
                    'extra_class'  => 'gtbs_grid_layout',
                ),
                'grid_count' => array(
                    'title'       => esc_html__('Grid Count', 'gutenberg-slider'),
                    'field_type'  => 'gtbspro',
                    'default'     => 2,
                    'desc'        => esc_html__('Set the number of rows or columns based on your layout.', 'gutenberg-slider'),
                    'extra_class' => 'gtbs_grid_layout',
                ),
                'enable_slides_group' => array(
                    'title'       => esc_html__( 'Enable Slides Group', 'gutenberg-slider' ),
                    'field_type'  => 'gtbspro',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable to control grouping of slides.', 'gutenberg-slider' ),
                    'data_show'   => '.gtbs_slides_group',
                ),
                'slides_per_group' => array(
                    'title'       => esc_html__( 'Slides Per Group', 'gutenberg-slider' ),
                    'field_type'  => 'gtbspro',
                    'default'     => 1,
                    'desc'        => esc_html__( 'Skip the number of slides from the beginning before grouping starts. Useful when first slide is featured.', 'gutenberg-slider' ),
                    'extra_class' => 'gtbs_slides_group',
                ),

            );

            return apply_filters( 'gtbs_other_options_fields', $fields );
        }
    }

endif;
