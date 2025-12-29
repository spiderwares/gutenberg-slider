<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPSS_Settings_Fields' ) ) :

     /**
	 * Class WPSS_Settings_Fields
	 *
	 */
    class WPSS_Settings_Fields {

        /**
         * Transition field
         *
         * @return array
         */
        public static function transition_field(){

            $fields = array(

                'animation'  => array(
                    'title'         => esc_html__( 'Transition type', 'slider-studio' ),
                    'field_type'    => 'wpssradio',
                    'options'       => array(
                        'slide'         =>  'animation-slide.gif',
                        'fade'          =>  'animation-fade.gif',
                        'flip'          =>  'animation-flip.gif',
                        'cube'          =>  'animation-cube.gif',
                        'cards'         =>  'animation-cards.gif',
                        'coverflow'     =>  'animation-coverflow.gif',
                        'shadow push'   =>  'animation-creative1.gif',
                        'zoom split'    =>  'animation-creative2.gif',
                        'slide flow'     =>  'animation-creative3.gif',
                        'flip deck'     =>  'animation-creative4.gif',
                        'twist flow'    =>  'animation-creative5.gif',
                        'mirror'        =>  'animation-creative6.gif',
                    ),
                    'default'     => 'slide',
                    'data_hide'   => '.wpss_coverflow_options, .wpss_cube_options, .wpss_cards_options, .wpss_shadow_push_options, .wpss_zoom_split_options, .wpss_slide_flow_options, .wpss_flip_deck_options, .wpss_twist_flow_options, .wpss_mirror_options',
                    'data_show'   => array(
                        'cube'       => '.wpss_cube_options',
                        'cards'      => '.wpss_cards_options',
                        'coverflow'  => '.wpss_coverflow_options',
                        'shadow push' => '.wpss_shadow_push_options',
                        'zoom split' => '.wpss_zoom_split_options',
                        'slide flow' => '.wpss_slide_flow_options',
                        'flip deck' => '.wpss_flip_deck_options',
                        'twist flow' => '.wpss_twist_flow_options',
                        'mirror' => '.wpss_mirror_options',
                    ),
                ),
                'cube_shadows' => array(
                    'title'       => esc_html__('Shadows', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpss_cube_options',
                    'desc'        => esc_html__('Enable shadows.', 'slider-studio'),
                ),
                'cube_slide_shadows' => array(
                    'title'       => esc_html__('Slide Shadows', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpss_cube_options',
                    'desc'        => esc_html__('Enable slide shadows.', 'slider-studio'),
                ),
                'cube_shadowoffset' => array(
                    'title'       => esc_html__('Shadow Offset', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 20,
                    'extra_class' => 'wpss_cube_options',
                    'desc'        => esc_html__('Shadow Offset in slides.', 'slider-studio'),
                ),
                'cube_shadowScale' => array(
                    'title'       => esc_html__('Shadow Scale', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 1,
                    'extra_class' => 'wpss_cube_options',
                    'desc'        => esc_html__('Shadow Scale in slides.', 'slider-studio'),
                ),
                'cards_border' => array(
                    'title'       => esc_html__('Border Radius', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 20,
                    'extra_class' => 'wpss_cards_options',
                    'desc'        => esc_html__('Border radius cards.', 'slider-studio'),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                ),
                'cards_initial_slide' => array(
                    'title'       => esc_html__('Initial Slide', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 2,
                    'extra_class' => 'wpss_cards_options',
                    'desc'        => esc_html__('Initial slide for cards effect.', 'slider-studio'),
                ),
                'cards_loop_additional_slides' => array(
                    'title'       => esc_html__('Loop Additional Slides', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 2,
                    'extra_class' => 'wpss_cards_options',
                    'desc'        => esc_html__('Loop additional slides for cards effect.', 'slider-studio'),
                ),
                'coverflow_rotate' => array(
                    'title'       => esc_html__('Rotate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 50,
                    'extra_class' => 'wpss_coverflow_options',
                    'desc'        => esc_html__('Rotation angle for coverflow.', 'slider-studio'),
                ),
                'coverflow_stretch' => array(
                    'title'       => esc_html__('Stretch', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_coverflow_options',
                    'desc'        => esc_html__('Space between slides.', 'slider-studio'),
                ),
                'coverflow_depth' => array(
                    'title'       => esc_html__('Depth', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 100,
                    'extra_class' => 'wpss_coverflow_options',
                    'desc'        => esc_html__('Depth offset.', 'slider-studio'),
                ),
                'coverflow_modifier' => array(
                    'title'       => esc_html__('Modifier', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 1,
                    'extra_class' => 'wpss_coverflow_options',
                    'desc'        => esc_html__('Effect multiplier.', 'slider-studio'),
                ),
                'coverflow_shadows' => array(
                    'title'       => esc_html__('Slide Shadows', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => true,
                    'extra_class' => 'wpss_coverflow_options',
                    'desc'        => esc_html__('Enable slide shadows.', 'slider-studio'),
                ),

                // Shadow Push Effect Options
                'creative_shadow_push_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpss_shadow_push_options',
                    'desc'        => esc_html__('Enable shadow for previous slide.', 'slider-studio'),
                ),
                'creative_shadow_push_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_shadow_push_options',
                    'desc'        => esc_html__('X-axis translation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_shadow_push_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_shadow_push_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_shadow_push_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -400,
                    'extra_class' => 'wpss_shadow_push_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_shadow_push_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 100,
                    'extra_class' => 'wpss_shadow_push_options',
                    'desc'        => esc_html__('X-axis translation percentage for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_shadow_push_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_shadow_push_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_shadow_push_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_shadow_push_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),

                // Zoom Split Effect Options
                'creative_zoom_split_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpss_zoom_split_options',
                    'desc'        => esc_html__('Enable shadow.', 'slider-studio'),
                ),
                'creative_zoom_split_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -120,
                    'extra_class' => 'wpss_zoom_split_options',
                    'desc'        => esc_html__('X-axis translation percentage for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_zoom_split_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_zoom_split_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_zoom_split_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -500,
                    'extra_class' => 'wpss_zoom_split_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_zoom_split_next_shadow' => array(
                    'title'       => esc_html__('Next Shadow', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpss_zoom_split_options',
                    'desc'        => esc_html__('Enable shadow.', 'slider-studio'),
                ),  
                'creative_zoom_split_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 120,
                    'extra_class' => 'wpss_zoom_split_options',
                    'desc'        => esc_html__('X-axis translation percentage for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_zoom_split_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_zoom_split_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_zoom_split_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -500,
                    'extra_class' => 'wpss_zoom_split_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),

                // Slide Flow Effect Options
                'creative_slide_flow_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpss_slide_flow_options',
                    'desc'        => esc_html__('Enable shadow for previous slide.', 'slider-studio'),
                ),
                'creative_slide_flow_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -20,
                    'extra_class' => 'wpss_slide_flow_options',
                    'desc'        => esc_html__('X-axis translation percentage for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent'      => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_slide_flow_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_slide_flow_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_slide_flow_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -1,
                    'extra_class' => 'wpss_slide_flow_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_slide_flow_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 100,
                    'extra_class' => 'wpss_slide_flow_options',
                    'desc'        => esc_html__('X-axis translation percentage for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_slide_flow_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_slide_flow_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_slide_flow_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_slide_flow_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),

                // Flip Deck Effect Options
                'creative_flip_deck_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpss_flip_deck_options',
                    'desc'        => esc_html__('Enable shadow for previous slide.', 'slider-studio'),
                ),
                'creative_flip_deck_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_flip_deck_options',
                    'desc'        => esc_html__('X-axis translation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_flip_deck_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -800,
                    'extra_class' => 'wpss_flip_deck_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_prev_rotate_x' => array(
                    'title'       => esc_html__('Prev Rotate X', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 180,
                    'extra_class' => 'wpss_flip_deck_options',
                    'desc'        => esc_html__('X-axis rotation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_prev_rotate_y' => array(
                    'title'       => esc_html__('Prev Rotate Y', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_flip_deck_options',
                    'desc'        => esc_html__('Y-axis rotation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_prev_rotate_z' => array(
                    'title'       => esc_html__('Prev Rotate Z', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_flip_deck_options',
                    'desc'        => esc_html__('Z-axis rotation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_shadow' => array(
                    'title'       => esc_html__('Next Shadow', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpss_flip_deck_options',
                    'desc'        => esc_html__('Enable shadow for next slide.', 'slider-studio'),
                ),
                'creative_flip_deck_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_flip_deck_options',
                    'desc'        => esc_html__('X-axis translation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_flip_deck_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -800,
                    'extra_class' => 'wpss_flip_deck_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_rotate_x' => array(
                    'title'       => esc_html__('Next Rotate X', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -180,
                    'extra_class' => 'wpss_flip_deck_options',
                    'desc'        => esc_html__('X-axis rotation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_rotate_y' => array(
                    'title'       => esc_html__('Next Rotate Y', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_flip_deck_options',
                    'desc'        => esc_html__('Y-axis rotation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_rotate_z' => array(
                    'title'       => esc_html__('Next Rotate Z', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_flip_deck_options',
                    'desc'        => esc_html__('Z-axis rotation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),

                // Twist Flow Effect Options
                'creative_twist_flow_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpss_twist_flow_options',
                    'desc'        => esc_html__('Enable shadow for previous slide.', 'slider-studio'),
                ),
                'creative_twist_flow_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -125,
                    'extra_class' => 'wpss_twist_flow_options',
                    'desc'        => esc_html__('X-axis translation percentage for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_twist_flow_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_twist_flow_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -800,
                    'extra_class' => 'wpss_twist_flow_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_prev_rotate_x' => array(
                    'title'       => esc_html__('Prev Rotate X', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_twist_flow_options',
                    'desc'        => esc_html__('X-axis rotation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_prev_rotate_y' => array(
                    'title'       => esc_html__('Prev Rotate Y', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_twist_flow_options',
                    'desc'        => esc_html__('Y-axis rotation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_prev_rotate_z' => array(
                    'title'       => esc_html__('Prev Rotate Z', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -90,
                    'extra_class' => 'wpss_twist_flow_options',
                    'desc'        => esc_html__('Z-axis rotation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_next_shadow' => array(
                    'title'       => esc_html__('Next Shadow', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpss_twist_flow_options',
                    'desc'        => esc_html__('Enable shadow for next slide.', 'slider-studio'),
                ),
                'creative_twist_flow_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 125,
                    'extra_class' => 'wpss_twist_flow_options',
                    'desc'        => esc_html__('X-axis translation percentage for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_twist_flow_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_twist_flow_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -800,
                    'extra_class' => 'wpss_twist_flow_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_next_rotate_x' => array(
                    'title'       => esc_html__('Next Rotate X', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_twist_flow_options',
                    'desc'        => esc_html__('X-axis rotation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_next_rotate_y' => array(
                    'title'       => esc_html__('Next Rotate Y', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_twist_flow_options',
                    'desc'        => esc_html__('Y-axis rotation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_next_rotate_z' => array(
                    'title'       => esc_html__('Next Rotate Z', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 90,
                    'extra_class' => 'wpss_twist_flow_options',
                    'desc'        => esc_html__('Z-axis rotation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),

                // Mirror Effect Options
                'creative_mirror_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpss_mirror_options',
                    'desc'        => esc_html__('Enable shadow for previous slide.', 'slider-studio'),
                ),
                'creative_mirror_prev_origin' => array(
                    'title'       => esc_html__('Prev Origin', 'slider-studio'),
                    'field_type'  => 'wpsstext',
                    'default'     => 'left center',
                    'extra_class' => 'wpss_mirror_options',
                    'desc'        => esc_html__('Transform origin for previous slide (e.g., "left center", "right center").', 'slider-studio'),
                ),
                'creative_mirror_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -5,
                    'extra_class' => 'wpss_mirror_options',
                    'desc'        => esc_html__('X-axis translation percentage for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_mirror_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_mirror_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -200,
                    'extra_class' => 'wpss_mirror_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_prev_rotate_x' => array(
                    'title'       => esc_html__('Prev Rotate X', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_mirror_options',
                    'desc'        => esc_html__('X-axis rotation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_prev_rotate_y' => array(
                    'title'       => esc_html__('Prev Rotate Y', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 100,
                    'extra_class' => 'wpss_mirror_options',
                    'desc'        => esc_html__('Y-axis rotation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_prev_rotate_z' => array(
                    'title'       => esc_html__('Prev Rotate Z', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_mirror_options',
                    'desc'        => esc_html__('Z-axis rotation for previous slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_next_origin' => array(
                    'title'       => esc_html__('Next Origin', 'slider-studio'),
                    'field_type'  => 'wpsstext',
                    'default'     => 'right center',
                    'extra_class' => 'wpss_mirror_options',
                    'desc'        => esc_html__('Transform origin for next slide (e.g., "left center", "right center").', 'slider-studio'),
                ),
                'creative_mirror_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 5,
                    'extra_class' => 'wpss_mirror_options',
                    'desc'        => esc_html__('X-axis translation percentage for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_mirror_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_mirror_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -200,
                    'extra_class' => 'wpss_mirror_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_next_rotate_x' => array(
                    'title'       => esc_html__('Next Rotate X', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_mirror_options',
                    'desc'        => esc_html__('X-axis rotation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_next_rotate_y' => array(
                    'title'       => esc_html__('Next Rotate Y', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => -100,
                    'extra_class' => 'wpss_mirror_options',
                    'desc'        => esc_html__('Y-axis rotation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_next_rotate_z' => array(
                    'title'       => esc_html__('Next Rotate Z', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'extra_class' => 'wpss_mirror_options',
                    'desc'        => esc_html__('Z-axis rotation for next slide.', 'slider-studio'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-studio' ),
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                ),
            );

            return apply_filters( 'wpss_transition_fields', $fields );
        }

        /**
         * Navigation field
         *
         * @return array
         */
        public static function navigation_field(){

            $fields = array(

                'navigation_arrow_style' => array(
                    'title'         => esc_html__( 'Navigation arrows style', 'slider-studio' ),
                    'field_type'    => 'wpssradio',
                    'options'       => array(
                        'none'   => 'arrow-style-none.jpg',
                        'style1' => 'arrow-style-1.jpg',
                        'style2' => 'arrow-style-2.jpg',
                        'style3' => 'arrow-style-3.jpg',
                        'style4' => 'arrow-style-4.png',
                        'style5' => 'arrow-style-5.jpg',
                        'custom' => 'arrow-custom.jpg',
                    ),
                    'default'    => 'style1',
                    'data_hide'  => '.wpss_arrow_fields, .wpss_arrow_border_radius, .wpss_arrow_color, .wpss_arrow_bg_color, .wpss_arrow_hover_bg_color, .wpss_arrow_position',
                    'data_show'  => array(
                        'none'   => '',
                        'style1' => '.wpss_arrow_fields',
                        'style2' => '.wpss_arrow_fields, .wpss_arrow_border_radius, .wpss_arrow_color, .wpss_arrow_bg_color, .wpss_arrow_hover_bg_color',
                        'style3' => '.wpss_arrow_fields, .wpss_arrow_color, .wpss_arrow_bg_color, .wpss_arrow_hover_bg_color',
                        'style4' => '.wpss_arrow_fields, .wpss_arrow_border_radius, .wpss_arrow_color, .wpss_arrow_bg_color, .wpss_arrow_hover_bg_color',
                        'style5' => '.wpss_arrow_fields',
                        'custom' => '.wpss_arrow_fields, .wpss_arrow_border_radius, .wpss_arrow_color, .wpss_arrow_position',
                    ),
                ),
                'arrow_font_size' => array(
                    'title'       => esc_html__( 'Arrow Font Size', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 40,
                    'desc'        => esc_html__( 'Set font size for arrow icon in px.', 'slider-studio' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'wpss_arrow_fields',
                ),
                'arrow_color' => array(
                    'title'       => esc_html__( 'Arrow Color', 'slider-studio' ),
                    'field_type'  => 'wpsscolor', 
                    'default'     => '#ffffff',
                    'extra_class' => 'wpss_arrow_fields',
                ),
                'arrow_hover_color' => array(
                    'title'       => esc_html__( 'Arrow Hover Color', 'slider-studio' ),
                    'field_type'  => 'wpsscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpss_arrow_fields',
                ),
                'arrow_border_radius' => array(
                    'title'       => esc_html__( 'Arrow Border Radius', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 50,
                    'desc'        => esc_html__( 'Set border radius for arrow border.', 'slider-studio' ),
                    'unit'        => array(
                        'px'    => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'wpss_arrow_border_radius',
                ),
                'arrow_bg_color' => array(
                    'title'       => esc_html__( 'Arrow Background Color', 'slider-studio' ),
                    'field_type'  => 'wpsscolor',
                    'default'     => '#000000',
                    'extra_class' => 'wpss_arrow_bg_color',
                ),
                'arrow_hover_bg_color' => array(
                    'title'       => esc_html__( 'Arrow Hover Background Color', 'slider-studio' ),
                    'field_type'  => 'wpsscolor',
                    'default'     => '#333333',
                    'extra_class' => 'wpss_arrow_hover_bg_color',
                ),
                'arrow_border_color' => array(
                    'title'       => esc_html__( 'Arrow Border Color', 'slider-studio' ),
                    'field_type'  => 'wpsscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpss_arrow_color',
                ),
                'arrow_hover_border_color' => array(
                    'title'       => esc_html__( 'Arrow Hover Border Color', 'slider-studio' ),
                    'field_type'  => 'wpsscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpss_arrow_color',
                ),
                'arrow_position_unit' => array(
                    'title'        => esc_html__( 'Arrow Position Unit', 'slider-studio' ),
                    'field_type'  => 'wpssselect',
                    'options'     => array(
                        'px'  => 'px',
                        '%'   => '%',
                        'em'  => 'em',
                        'rem' => 'rem',
                    ),
                    'default'     => 'px',
                    'extra_class' => 'wpss_arrow_position',
                ),
                'arrow_position_top' => array(
                    'title'       => esc_html__( 'Arrow Top Position', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 220,
                    'desc'        => esc_html__( 'Distance from the top. Leave bottom blank if this is set.', 'slider-studio' ),
                    'extra_class' => 'wpss_arrow_position',
                ),
                'arrow_position_bottom' => array(
                    'title'       => esc_html__( 'Arrow Bottom Position', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => '',
                    'desc'        => esc_html__( 'Distance from the bottom. Leave top blank if this is set.', 'slider-studio' ),
                    'extra_class' => 'wpss_arrow_position',
                ),
                'arrow_position_left' => array(
                    'title'       => esc_html__( 'Arrow Left Position', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 10,
                    'desc'        => esc_html__( 'Distance from the left.', 'slider-studio' ),
                    'extra_class' => 'wpss_arrow_position',
                ),
                'arrow_position_right' => array(
                    'title'       => esc_html__( 'Arrow Right Position', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 10,
                    'desc'        => esc_html__( 'Distance from the right.', 'slider-studio' ),
                    'extra_class' => 'wpss_arrow_position',
                ),
            );

            return apply_filters( 'wpss_navigation_fields', $fields );
        }

        /**
         * Pagination field
         *
         * @return array
         */
        public static function pagination_field(){

            $fields = array(

                'pagination_type' => array(
                    'title'       => esc_html__( 'Pagination Type', 'slider-studio' ),
                    'field_type'  => 'wpssselect',
                    'options'     => array(
                        'none'        => esc_html__( 'None', 'slider-studio' ),
                        'bullets'     => esc_html__( 'Bullets', 'slider-studio' ),
                        'progressbar' => esc_html__( 'Progress Bar', 'slider-studio' ),
                        'fraction'    => esc_html__( 'Fraction', 'slider-studio' ),
                        'custom'      => esc_html__( 'Custom', 'slider-studio' ),
                    ),
                    'default'       => 'bullets',
                    'desc'          => esc_html__( 'Choose the type of pagination for the slider.', 'slider-studio' ),
                    'data_hide'     => '.wpss_bullet_style, .wpss_autoplay_progress, .wpss_progress_bar, .wpss_fraction_style, .wpss_custom_style, .wpss_bullet_click, .wpss_dynamic_bullets, .wpss_bullets_bg_color, .wpss_bullets_hover_bg_color, .wpss_bullets_border_color',
                    'data_show' => array(
                        'bullets'     => '.wpss_bullet_style, .wpss_bullets_bg_color, .wpss_bullets_hover_bg_color, .wpss_bullets_border_color, .wpss_bullet_click, .wpss_dynamic_bullets',
                        'progressbar' => '.wpss_autoplay_progress, .wpss_progress_bar',
                        'fraction'    => '.wpss_fraction_style',
                        'custom'      => '.wpss_bullet_click, .wpss_dynamic_bullets, .wpss_custom_style',
                    ),
                ),
                'bullets_navigation_style'  => array(
                    'title'         => esc_html__( 'Bullet style', 'slider-studio' ),
                    'field_type'    => 'wpssradio',
                    'options'       => array(
                        'style1' =>  'bullets-style-1.jpg',
                        'style2' =>  'bullets-style-2.jpg',
                        'style3' =>  'bullets-style-3.jpg',
                        'style4' =>  'bullets-style-4.jpg'
                    ),
                    'default'       => 'style1',
                    'extra_class'   => 'wpss_bullet_style',
                ),
                'bullets_bg_color' => array(
                    'title'       => esc_html__( 'Bullet Background Color', 'slider-studio' ),
                    'field_type'  => 'wpsscolor',
                    'default'     => '',
                    'extra_class' => 'wpss_bullets_bg_color',
                ),
                'bullets_hover_bg_color' => array(
                    'title'       => esc_html__( 'Bullet Hover Background Color', 'slider-studio' ),
                    'field_type'  => 'wpsscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpss_bullets_hover_bg_color',
                ),
                'bullets_border_color' => array(
                    'title'       => esc_html__( 'Bullet Border Color', 'slider-studio' ),
                    'field_type'  => 'wpsscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpss_bullets_border_color',
                ),
                'control_progress_bar'  => array(
                    'title'         => esc_html__( 'Progress Bar', 'slider-studio' ),
                    'field_type'    => 'wpssswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Show a progress bar while autoplay is running.', 'slider-studio' ),
                    'data_show'     => '.wpss_progress_bar',
                    'extra_class'   => 'wpss_autoplay_progress',
                ),
                'progress_bar_position' => array(
                    'title'         => esc_html__( 'Progress Bar Position', 'slider-studio' ),
                    'field_type'    => 'wpssselect',
                    'options'       => array(
                        'bottom'    => esc_html__( 'Bottom (Use in Horizontal)', 'slider-studio' ),
                        'top'       => esc_html__( 'Top (Use in Horizontal)', 'slider-studio' ),
                        'left'      => esc_html__( 'Left (Use in Vertical)', 'slider-studio' ),
                        'right'     => esc_html__( 'Right (Use in Vertical)', 'slider-studio' ),
                    ),
                    'default'       => 'bottom',
                    'desc'          => esc_html__( 'Choose where to position the autoplay progress bar.', 'slider-studio' ),
                    'extra_class'   => 'wpss_progress_bar',
                ),
                'progress_bar_color' => array(
                    'title'          => esc_html__( 'Progress bar color', 'slider-studio' ),
                    'field_type'     => 'wpsscolor',
                    'default'        => '#ff0000',
                    'extra_class'    => 'wpss_progress_bar',
                ),
                'fraction_navigation_style' => array(
                    'title'       => esc_html__( 'Fraction style', 'slider-studio' ),
                    'field_type'  => 'wpssradio',
                    'options'     => array(
                        'style1'  => 'bullets-fraction.png',
                    ),
                    'default'     => 'style1',
                    'extra_class' => 'wpss_fraction_style',
                ),
                'fraction_color' => array(
                    'title'         => esc_html__( 'Fraction color', 'slider-studio' ),
                    'field_type'    => 'wpsscolor',
                    'default'       => '#ff0000',
                    'extra_class'   => 'wpss_fraction_style',
                ),  
                'fraction_font_size' => array(
                    'title'       => esc_html__( 'Fraction Font Size', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 20,
                    'extra_class' => 'wpss_fraction_style',
                    'desc'        => esc_html__( 'Set the font size for the fraction pagination.', 'slider-studio' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                ),
                'fraction_position' => array(
                    'title'       => esc_html__( 'Fraction Position', 'slider-studio' ),
                    'field_type'  => 'wpssselect',
                    'default'     => 'center',
                    'options'     => array(
                        'center'       => esc_html__( 'Center', 'slider-studio' ),
                        'top-left'     => esc_html__( 'Top Left', 'slider-studio' ),
                        'top-right'    => esc_html__( 'Top Right', 'slider-studio' ),
                        'bottom-left'  => esc_html__( 'Bottom Left', 'slider-studio' ),
                        'bottom-right' => esc_html__( 'Bottom Right', 'slider-studio' ),
                    ),
                    'desc'         => esc_html__( 'Choose position for fraction in pagination.', 'slider-studio' ),
                    'extra_class'  => 'wpss_fraction_style',
                ),
                'custom_navigation_style' => array(
                    'title'       => esc_html__( 'Custom style', 'slider-studio' ),
                    'field_type'  => 'wpssradio',
                    'options'     => array(
                        'style1'  => 'custom-style1.jpg',
                    ),
                    'default'     => 'style1',
                    'extra_class' => 'wpss_custom_style',
                ),
                'bullets_click' => array(
                    'title'       => esc_html__('Bullets Clickable', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpss_bullet_click',
                    'desc'        => esc_html__('Allow users to click on slider bullets to navigate between slides.', 'slider-studio'),
                ),
                'dynamic_bullets' => array(
                    'title'       => esc_html__('Dynamic Bullets', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpss_dynamic_bullets',
                    'desc'        => esc_html__('Enable dynamic bullets for the slider.', 'slider-studio'),
                ),
                'custom_text_color' => array(
                    'title'         => esc_html__( 'Custom Color', 'slider-studio' ),
                    'field_type'    => 'wpsscolor',
                    'default'       => '#ffffff',
                    'extra_class'   => 'wpss_custom_style',
                    'desc'          => esc_html__( 'Set the text color for numbered pagination bullets.', 'slider-studio' ),
                ),
                'custom_background_color' => array(
                    'title'         => esc_html__( 'Custom Background Color', 'slider-studio' ),
                    'field_type'    => 'wpsscolor',
                    'default'       => '#007aff',
                    'extra_class'   => 'wpss_custom_style',
                    'desc'          => esc_html__( 'Set the background color for active pagination bullets.', 'slider-studio' ),
                ),
                'custom_active_text_color' => array(
                    'title'         => esc_html__( 'Custom active Text Color', 'slider-studio' ),
                    'field_type'    => 'wpsscolor',
                    'default'       => '#ffffff',
                    'extra_class'   => 'wpss_custom_style',
                    'desc'          => esc_html__( 'Set the text color for inactive numbered pagination bullets.', 'slider-studio' ),
                ),
                'custom_active_background_color' => array(
                    'title'         => esc_html__( 'Custom active Background Color', 'slider-studio' ),
                    'field_type'    => 'wpsscolor',
                    'default'       => '#0a0607',
                    'extra_class'   => 'wpss_custom_style',
                    'desc'          => esc_html__( 'Set the background color for inactive pagination bullets.', 'slider-studio' ),
                ),
            );

            return apply_filters( 'wpss_pagination_fields', $fields );
        }

        /**
         * Responsive field
         *
         * @return array
         */
        public static function responsive_field(){

            $fields = array(

                'control_enable_responsive'   => array(
                    'title'         => esc_html__( 'Enable Responsive', 'slider-studio' ),
                    'field_type'    => 'wpssswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Enable responsive layout for different screen sizes (mobile, tablet, desktop).', 'slider-studio' ),
                    'data_show'     => '.wpss_responsive_field',
                ),
                'items_in_desktop'  => array(
                    'title'         => esc_html__( 'Items in Desktop', 'slider-studio' ),
                    'field_type'    => 'wpssnumber',
                    'default'       => 4,
                    'extra_class'   => 'wpss_responsive_field',
                ),
                'items_in_tablet'   => array(
                    'title'         => esc_html__( 'Items in Tablet', 'slider-studio' ),
                    'field_type'    => 'wpssnumber',
                    'default'       => 2,
                    'extra_class'   => 'wpss_responsive_field',
                ),
                'items_in_mobile'   => array(
                    'title'         => esc_html__( 'Items in Mobile', 'slider-studio' ),
                    'field_type'    => 'wpssnumber',
                    'default'       => 1,
                    'extra_class'   => 'wpss_responsive_field',
                ),
                'slide_control_view_auto' => array(
                    'title'       =>  esc_html__( 'Slides View Auto', 'slider-studio' ),
                    'field_type'  =>  'wpssswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable slide show per view auto for the slider.', 'slider-studio' ),
                    'data_show'   => '.wpss_auto_slide_width_fields',
                ),
                'auto_slide_width_default' => array(
                    'title'         => esc_html__( 'Default Slide Width', 'slider-studio' ),
                    'field_type'    => 'wpssnumber',
                    'default'       => 30,
                    'desc'          => esc_html__( 'Default width for slides.', 'slider-studio' ),
                    'extra_class'   => 'wpss_auto_slide_width_fields',
                    'unit'          => array(
                        'percent'   => esc_html__( '%', 'slider-studio' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                ),
                'auto_slide_width_2n' => array(
                    'title'         => esc_html__( '2n Slide Width', 'slider-studio' ),
                    'field_type'    => 'wpssnumber',
                    'default'       => 40,
                    'desc'          => esc_html__( 'Width for every 2nd slide.', 'slider-studio' ),
                    'extra_class'   => 'wpss_auto_slide_width_fields',
                    'unit'          => array(
                        'percent'   => esc_html__( '%', 'slider-studio' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                ),
                'auto_slide_width_3n' => array(
                    'title'         => esc_html__( '3n Slide Width', 'slider-studio' ),
                    'field_type'    => 'wpssnumber',
                    'default'       => 30,
                    'desc'          => esc_html__( 'Width for every 3rd slide.', 'slider-studio' ),
                    'extra_class'   => 'wpss_auto_slide_width_fields',
                    'unit'          => array(
                        'percent'   => esc_html__( '%', 'slider-studio' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                ),
                'slide_control_center' => array(
                    'title'       =>  esc_html__( 'Center Slides', 'slider-studio' ),
                    'field_type'  =>  'wpssswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable slide centered for the slider.', 'slider-studio' ),
                ),
            );

            return apply_filters( 'wpss_responsive_fields', $fields );
        }

        /**
         * Thumbnail gallery field
         *
         * @return array
         */
        public static function thumbnail_gallery_field(){

            $fields = array(

                'thumb_gallery' => array(
                    'title'       => esc_html__( 'Show Thumbnail Gallery', 'slider-studio' ),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable to display a thumbnail gallery below the main slider.', 'slider-studio' ),
                    'data_show'   => '.wpss_thumb_gallery',
                ),
                'thumb_gallery_loop' => array(   
                    'title'       => esc_html__( 'Thumbnail Gallery Loop', 'slider-studio' ),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'yes',
                    'desc'        => esc_html__( 'Enable continuous loop mode for the thumbs gallery.', 'slider-studio' ),
                    'extra_class' => 'wpss_thumb_gallery',
                ),
                'thumb_gallery_space' => array(
                    'title'       => esc_html__( 'Thumbnail Gallery Space', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 10,
                    'unit'        => array(
                        'px'   => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'desc'          => esc_html__( 'Space between each thumbs gallery.', 'slider-studio' ),
                    'extra_class'   => 'wpss_thumb_gallery',
                ),
                'thumb_gallery_width' => array(
                    'title'       => esc_html__( 'Thumbnail Width', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 80,
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'desc'          => esc_html__( 'Set width of thumbnail images.', 'slider-studio' ),
                    'extra_class'   => 'wpss_thumb_gallery',
                ),
                'thumb_gallery_height' => array(
                    'title'       => esc_html__( 'Thumbnail Height', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 80,
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'desc'          => esc_html__( 'Set height of thumbnail images.', 'slider-studio' ),
                    'extra_class'   => 'wpss_thumb_gallery',
                ),
                'thumb_gallery_border_radius' => array(
                    'title'       => esc_html__( 'Thumbnail Border Radius', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'desc'          => esc_html__( 'Set border radius of thumbnail images.', 'slider-studio' ),
                    'extra_class'   => 'wpss_thumb_gallery',
                ),
            );

            return apply_filters( 'wpss_thumbnail_gallery_fields', $fields );
        }

        /**
         * Autoplay field
         *
         * @return array
         */
        public static function autoplay_field(){

            $fields = array(

                'control_autoplay'  => array(
                    'title'         => esc_html__( 'Autoplay', 'slider-studio' ),
                    'field_type'    => 'wpssswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Enable or disable autoplay functionality.', 'slider-studio' ),
                    'data_show'     => '.wpss_autoplay_timing',
                ),
                'autoplay_timing'   => array(
                    'title'         => esc_html__( 'Autoplay time', 'slider-studio' ),
                    'field_type'    => 'wpssnumber',
                    'default'       => 3000,
                    'desc'          => esc_html__( 'Enter autoplay speed in milliseconds (e.g., 3000 for 3 seconds).', 'slider-studio' ),
                    'unit'          => array(
                        'seconds'   => esc_html__( 'Second\'s', 'slider-studio' ),
                    ),
                    'unit_selected' => 'seconds',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'wpss_autoplay_timing',
                ),
                'control_autoplay_timeleft' => array(
                    'title'       => esc_html__( 'Circular Autoplay Progress', 'slider-studio' ),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Show circular progress countdown during autoplay.', 'slider-studio' ),
                    'data_show'   => '.wpss_autoplay_time', 
                ),
                'control_autoplay_timeleft_color' => array(
                    'title'       => esc_html__( 'Time Color', 'slider-studio' ),
                    'field_type'  => 'wpsscolor',
                    'default'     => '#007aff',
                    'desc'        => esc_html__( 'Set color for circular autoplay progress.', 'slider-studio' ),
                    'extra_class' => 'wpss_autoplay_time',
                ),
                'control_autoplay_timeleft_position' => array(
                    'title'       => esc_html__( 'Autoplay Time Position', 'slider-studio' ),
                    'field_type'  => 'wpssselect',
                    'default'     => 'bottom-right',
                    'options'     => array(
                        'top-left'     => esc_html__( 'Top Left', 'slider-studio' ),
                        'top-right'    => esc_html__( 'Top Right', 'slider-studio' ),
                        'bottom-left'  => esc_html__( 'Bottom Left', 'slider-studio' ),
                        'bottom-right' => esc_html__( 'Bottom Right', 'slider-studio' ),
                    ),
                    'desc'          => esc_html__( 'Choose position for autoplay time circle.', 'slider-studio' ),
                    'extra_class'   => 'wpss_autoplay_time',
                ),
                'control_autoplay_timeleft_font_size' => array(
                    'title'       => esc_html__( 'Time Font Size', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 20,
                    'desc'        => esc_html__( 'Font size for the autoplay time number.', 'slider-studio' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'wpss_autoplay_time',
                ),
            );

            return apply_filters( 'wpss_autoplay_fields', $fields );    
        }

        /**
         * Scrollbar field
         *
         * @return array
         */
        public static function scrollbar_field(){

            $fields = array(

                'control_scrollbar' => array(
                    'title'       =>  esc_html__( 'Scrollbar Control', 'slider-studio' ),
                    'field_type'  =>  'wpssswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable scrollbar navigation for the slider.', 'slider-studio' ),
                    'data_show'   => '.wpss_scrollbar_wrapper',
                ),
                'scrollbar_position' => array(
                    'title'       => esc_html__('Scrollbar Position', 'slider-studio'),
                    'field_type'  => 'wpssselect',
                    'default'     => 'bottom',
                    'desc'        => esc_html__('Choose scrollbar position.', 'slider-studio'),
                    'options'     => array(
                        'bottom' => esc_html__('Bottom (Use in Horizontal)', 'slider-studio'),
                        'top'    => esc_html__('Top (Use in Horizontal)', 'slider-studio'),
                        'left'   => esc_html__('Left ( Use in Vertical)', 'slider-studio'),
                        'right'  => esc_html__('Right ( Use in Vertical)', 'slider-studio'),
                    ),      
                    'extra_class' => 'wpss_scrollbar_wrapper',
                ),
                'scrollbar_color' => array(
                    'title'       =>  esc_html__( 'Scrollbar Color', 'slider-studio' ),
                    'field_type'  =>  'wpsscolor',
                    'default'     =>  '#999999',
                    'extra_class' =>  'wpss_scrollbar_wrapper',
                ), 
                'scrollbar_draggable' => array(
                    'title'       => esc_html__('Scrollbar Draggable', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpss_scrollbar_wrapper',
                    'desc'        => esc_html__('Enable draggable scrollbar.', 'slider-studio'),
                ),
            );
            
            return apply_filters( 'wpss_scrollbar_fields', $fields );
        }

        /**
         * Other options field
         *
         * @return array
         */
        public static function other_options_field(){

            $fields = array(

                'image_unit' => array(
                    'title'       => esc_html__( 'Set Width & Height', 'slider-studio' ),
                    'field_type'  => 'wpssselect',
                    'options'     => array(
                        'px'  => 'px',
                        'em'  => 'em',
                        'rem' => 'rem',
                        'vh'  => 'vh',
                    ),
                    'default'    => 'px',
                    'desc'       => esc_html__( 'Unit to use for image width and height. Applied to each slide image.', 'slider-studio' ),
                ),
                'width_image' => array(
                    'title'       => esc_html__( 'Width of Image', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 1000,
                    'desc'        =>  esc_html__( 'Specify the width of each slide image.', 'slider-studio' ),
                ),
                'height_image'  => array(
                    'title'       => esc_html__( 'Height of Image', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 500,
                    'desc'        =>  esc_html__( 'Specify the height of each slide image.', 'slider-studio' ),
                ),
                'border_radius_image' => array(
                    'title'       => esc_html__( 'Border Radius of Image', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 0,
                    'desc'        => esc_html__( 'Specify the border radius of each slide image.', 'slider-studio' ),
                    'unit'          => array(
                        'px'   => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                ),
                'control_lazyload_images' => array(
                    'title'         => esc_html__( 'Lazy load images', 'slider-studio' ),  
                    'field_type'    => 'wpssswitch',
                    'default'       => 'yes',
                    'desc'          => esc_html__( 'Load images only when they are needed.', 'slider-studio' ),
                ),
                'control_grab_cursor'   => array(
                    'title'         => esc_html__( 'Grab cursor', 'slider-studio' ),
                    'field_type'    => 'wpssswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Change the mouse cursor to a hand icon when hovering over the slider.', 'slider-studio' ),
                ),
                'control_rewind' => array(
                    'title'       => esc_html__( 'Rewind', 'slider-studio' ),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable rewind functionality for the slider.', 'slider-studio' ),
                ),
                'control_slide_space' => array(
                    'title'       => esc_html__( 'Slides Space', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 10,
                    'desc'        => esc_html__( 'Space between each slide.', 'slider-studio' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-studio' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                ),
                'control_slider_vertical' => array(
                    'title'       =>  esc_html__( 'Vertical Slider Control', 'slider-studio' ),
                    'field_type'  =>  'wpssswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable vertical direction for the slider.', 'slider-studio' ),
                ),
                'control_loop_slider' => array(
                    'title'       => esc_html__( 'Loop Slides', 'slider-studio' ),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable continuous loop mode for the slider.', 'slider-studio' ),
                ),
                'control_slide_speed' => array(
                    'title'       => esc_html__( 'Slide Speed', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 400,
                    'desc'        => esc_html__( 'Set the speed of slide transition in milliseconds (e.g., 400 = 0.4 second).', 'slider-studio' ),
                    'unit'        => array(
                        'seconds' => esc_html__( 'Second\'s', 'slider-studio' ),
                    ),
                    'unit_selected' => 'seconds',
                    'unit_disabled' => 'yes',
                ),
                'zoom_images' => array(
                    'title'       => esc_html__( 'Zoom Images', 'slider-studio' ),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable a zoom images for slider.', 'slider-studio' ),
                ),
                'control_keyboard' => array(
                    'title'       =>  esc_html__( 'Keyboard Control', 'slider-studio' ),
                    'field_type'  =>  'wpssswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable keyboard navigation for the slider using arrow keys.', 'slider-studio' ),
                ),
                'control_mousewheel' => array(
                    'title'       =>  esc_html__( 'Mousewheel Control', 'slider-studio' ),
                    'field_type'  =>  'wpssswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable mouse wheel navigation for the slider.', 'slider-studio' ),
                ),
                'control_rtl_slider' => array(
                    'title'       => esc_html__( 'Enable RTL', 'slider-studio' ),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable Right-to-Left sliding for RTL languages.', 'slider-studio' ),
                ),
                'enable_grid_layout' => array(
                    'title'       => esc_html__('Enable Grid Layout', 'slider-studio'),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__('Enable Swiper grid layout.', 'slider-studio'),
                    'data_show'   => '.wpss_grid_layout',
                ),
                'grid_layout_axis' => array(
                    'title'       => esc_html__('Grid Layout Type', 'slider-studio'),
                    'field_type'  => 'wpssselect',
                    'default'     => 'row',
                    'options'     => array(
                        'row'     => esc_html__('Row', 'slider-studio'),
                        'column'  => esc_html__('Column', 'slider-studio'),
                    ),
                    'desc'         => esc_html__('Choose grid layout: Row or Column.', 'slider-studio'),
                    'extra_class'  => 'wpss_grid_layout',
                ),
                'grid_count' => array(
                    'title'       => esc_html__('Grid Count', 'slider-studio'),
                    'field_type'  => 'wpssnumber',
                    'default'     => 2,
                    'desc'        => esc_html__('Set the number of rows or columns based on your layout.', 'slider-studio'),
                    'extra_class' => 'wpss_grid_layout',
                ),
                'enable_slides_group' => array(
                    'title'       => esc_html__( 'Enable Slides Group', 'slider-studio' ),
                    'field_type'  => 'wpssswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable to control grouping of slides.', 'slider-studio' ),
                    'data_show'   => '.wpss_slides_group',
                ),
                'slides_per_group' => array(
                    'title'       => esc_html__( 'Slides Per Group', 'slider-studio' ),
                    'field_type'  => 'wpssnumber',
                    'default'     => 1,
                    'desc'        => esc_html__( 'Skip the number of slides from the beginning before grouping starts. Useful when first slide is featured.', 'slider-studio' ),
                    'extra_class' => 'wpss_slides_group',
                ),
            );

            return apply_filters( 'wpss_other_options_fields', $fields );
        }

        /**
         * Custom CSS field
         *
         * @return array
         */
        public static function custom_css_field(){

            $fields = array(

                'custom_class' => array(
                    'title'       => esc_html__( 'Custom Class Name', 'slider-studio' ),
                    'field_type'  => 'wpsstext',
                    'default'     => '',
                    'placeholder' => esc_html__( 'my-custom-slider', 'slider-studio' ),
                    'desc'        => esc_html__( 'Enter a custom CSS class name (without dot). This class will be added to the slider wrapper. Example: my-custom-slider', 'slider-studio' ),
                ),
                'custom_css' => array(
                    'title'       => esc_html__( 'Custom CSS', 'slider-studio' ),
                    'field_type'  => 'wpsstextarea',
                    'default'     => '',
                    'rows'        => 25,
                    'cols'        => 50,
                    'placeholder' => esc_html__( '/* Add your custom CSS here */', 'slider-studio' ),
                    'desc'        => esc_html__( 'Add your custom CSS here. This CSS will apply globally to the slider and its elements.', 'slider-studio' ),
                ),
            );

            return apply_filters( 'wpss_custom_css_fields', $fields );
        }
    }

endif;
