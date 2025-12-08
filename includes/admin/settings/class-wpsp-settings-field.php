<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPSP_Settings_Fields' ) ) :

     /**
	 * Class WPSP_Settings_Fields
	 *
	 */
    class WPSP_Settings_Fields {

        /**
         * Transition field
         *
         * @return array
         */
        public static function transition_field(){

            $fields = array(

                'animation'  => array(
                    'title'         => esc_html__( 'Transition type', 'slider-press' ),
                    'field_type'    => 'wpspradio',
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
                    'data_hide'   => '.wpsp_coverflow_options, .wpsp_cube_options, .wpsp_cards_options, .wpsp_shadow_push_options, .wpsp_zoom_split_options, .wpsp_slide_flow_options, .wpsp_flip_deck_options, .wpsp_twist_flow_options, .wpsp_mirror_options',
                    'data_show'   => array(
                        'cube'       => '.wpsp_cube_options',
                        'cards'      => '.wpsp_cards_options',
                        'coverflow'  => '.wpsp_coverflow_options',
                        'shadow push' => '.wpsp_shadow_push_options',
                        'zoom split' => '.wpsp_zoom_split_options',
                        'slide flow' => '.wpsp_slide_flow_options',
                        'flip deck' => '.wpsp_flip_deck_options',
                        'twist flow' => '.wpsp_twist_flow_options',
                        'mirror' => '.wpsp_mirror_options',
                    ),
                ),
                'cube_shadows' => array(
                    'title'       => esc_html__('Shadows', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsp_cube_options',
                    'desc'        => esc_html__('Enable shadows.', 'slider-press'),
                ),
                'cube_slide_shadows' => array(
                    'title'       => esc_html__('Slide Shadows', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsp_cube_options',
                    'desc'        => esc_html__('Enable slide shadows.', 'slider-press'),
                ),
                'cube_shadowoffset' => array(
                    'title'       => esc_html__('Shadow Offset', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 20,
                    'extra_class' => 'wpsp_cube_options',
                    'desc'        => esc_html__('Shadow Offset in slides.', 'slider-press'),
                ),
                'cube_shadowScale' => array(
                    'title'       => esc_html__('Shadow Scale', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 1,
                    'extra_class' => 'wpsp_cube_options',
                    'desc'        => esc_html__('Shadow Scale in slides.', 'slider-press'),
                ),
                'cards_border' => array(
                    'title'       => esc_html__('Border Radius', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 20,
                    'extra_class' => 'wpsp_cards_options',
                    'desc'        => esc_html__('Border radius cards.', 'slider-press'),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                ),
                'cards_initial_slide' => array(
                    'title'       => esc_html__('Initial Slide', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 2,
                    'extra_class' => 'wpsp_cards_options',
                    'desc'        => esc_html__('Initial slide for cards effect.', 'slider-press'),
                ),
                'cards_loop_additional_slides' => array(
                    'title'       => esc_html__('Loop Additional Slides', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 2,
                    'extra_class' => 'wpsp_cards_options',
                    'desc'        => esc_html__('Loop additional slides for cards effect.', 'slider-press'),
                ),
                'coverflow_rotate' => array(
                    'title'       => esc_html__('Rotate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 50,
                    'extra_class' => 'wpsp_coverflow_options',
                    'desc'        => esc_html__('Rotation angle for coverflow.', 'slider-press'),
                ),
                'coverflow_stretch' => array(
                    'title'       => esc_html__('Stretch', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_coverflow_options',
                    'desc'        => esc_html__('Space between slides.', 'slider-press'),
                ),
                'coverflow_depth' => array(
                    'title'       => esc_html__('Depth', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 100,
                    'extra_class' => 'wpsp_coverflow_options',
                    'desc'        => esc_html__('Depth offset.', 'slider-press'),
                ),
                'coverflow_modifier' => array(
                    'title'       => esc_html__('Modifier', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 1,
                    'extra_class' => 'wpsp_coverflow_options',
                    'desc'        => esc_html__('Effect multiplier.', 'slider-press'),
                ),
                'coverflow_shadows' => array(
                    'title'       => esc_html__('Slide Shadows', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => true,
                    'extra_class' => 'wpsp_coverflow_options',
                    'desc'        => esc_html__('Enable slide shadows.', 'slider-press'),
                ),

                // Shadow Push Effect Options
                'creative_shadow_push_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsp_shadow_push_options',
                    'desc'        => esc_html__('Enable shadow for previous slide.', 'slider-press'),
                ),
                'creative_shadow_push_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_shadow_push_options',
                    'desc'        => esc_html__('X-axis translation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_shadow_push_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_shadow_push_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_shadow_push_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -400,
                    'extra_class' => 'wpsp_shadow_push_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_shadow_push_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 100,
                    'extra_class' => 'wpsp_shadow_push_options',
                    'desc'        => esc_html__('X-axis translation percentage for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_shadow_push_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_shadow_push_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_shadow_push_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_shadow_push_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),

                // Zoom Split Effect Options
                'creative_zoom_split_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsp_zoom_split_options',
                    'desc'        => esc_html__('Enable shadow.', 'slider-press'),
                ),
                'creative_zoom_split_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -120,
                    'extra_class' => 'wpsp_zoom_split_options',
                    'desc'        => esc_html__('X-axis translation percentage for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_zoom_split_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_zoom_split_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_zoom_split_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -500,
                    'extra_class' => 'wpsp_zoom_split_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_zoom_split_next_shadow' => array(
                    'title'       => esc_html__('Next Shadow', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsp_zoom_split_options',
                    'desc'        => esc_html__('Enable shadow.', 'slider-press'),
                ),  
                'creative_zoom_split_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 120,
                    'extra_class' => 'wpsp_zoom_split_options',
                    'desc'        => esc_html__('X-axis translation percentage for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_zoom_split_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_zoom_split_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_zoom_split_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -500,
                    'extra_class' => 'wpsp_zoom_split_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),

                // Slide Flow Effect Options
                'creative_slide_flow_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsp_slide_flow_options',
                    'desc'        => esc_html__('Enable shadow for previous slide.', 'slider-press'),
                ),
                'creative_slide_flow_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -20,
                    'extra_class' => 'wpsp_slide_flow_options',
                    'desc'        => esc_html__('X-axis translation percentage for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent'      => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_slide_flow_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_slide_flow_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_slide_flow_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -1,
                    'extra_class' => 'wpsp_slide_flow_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_slide_flow_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 100,
                    'extra_class' => 'wpsp_slide_flow_options',
                    'desc'        => esc_html__('X-axis translation percentage for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_slide_flow_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_slide_flow_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_slide_flow_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_slide_flow_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),

                // Flip Deck Effect Options
                'creative_flip_deck_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsp_flip_deck_options',
                    'desc'        => esc_html__('Enable shadow for previous slide.', 'slider-press'),
                ),
                'creative_flip_deck_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_flip_deck_options',
                    'desc'        => esc_html__('X-axis translation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_flip_deck_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -800,
                    'extra_class' => 'wpsp_flip_deck_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_prev_rotate_x' => array(
                    'title'       => esc_html__('Prev Rotate X', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 180,
                    'extra_class' => 'wpsp_flip_deck_options',
                    'desc'        => esc_html__('X-axis rotation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_prev_rotate_y' => array(
                    'title'       => esc_html__('Prev Rotate Y', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_flip_deck_options',
                    'desc'        => esc_html__('Y-axis rotation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_prev_rotate_z' => array(
                    'title'       => esc_html__('Prev Rotate Z', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_flip_deck_options',
                    'desc'        => esc_html__('Z-axis rotation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_shadow' => array(
                    'title'       => esc_html__('Next Shadow', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsp_flip_deck_options',
                    'desc'        => esc_html__('Enable shadow for next slide.', 'slider-press'),
                ),
                'creative_flip_deck_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_flip_deck_options',
                    'desc'        => esc_html__('X-axis translation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_flip_deck_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -800,
                    'extra_class' => 'wpsp_flip_deck_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_rotate_x' => array(
                    'title'       => esc_html__('Next Rotate X', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -180,
                    'extra_class' => 'wpsp_flip_deck_options',
                    'desc'        => esc_html__('X-axis rotation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_rotate_y' => array(
                    'title'       => esc_html__('Next Rotate Y', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_flip_deck_options',
                    'desc'        => esc_html__('Y-axis rotation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_rotate_z' => array(
                    'title'       => esc_html__('Next Rotate Z', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_flip_deck_options',
                    'desc'        => esc_html__('Z-axis rotation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),

                // Twist Flow Effect Options
                'creative_twist_flow_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsp_twist_flow_options',
                    'desc'        => esc_html__('Enable shadow for previous slide.', 'slider-press'),
                ),
                'creative_twist_flow_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -125,
                    'extra_class' => 'wpsp_twist_flow_options',
                    'desc'        => esc_html__('X-axis translation percentage for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_twist_flow_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_twist_flow_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -800,
                    'extra_class' => 'wpsp_twist_flow_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_prev_rotate_x' => array(
                    'title'       => esc_html__('Prev Rotate X', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_twist_flow_options',
                    'desc'        => esc_html__('X-axis rotation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_prev_rotate_y' => array(
                    'title'       => esc_html__('Prev Rotate Y', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_twist_flow_options',
                    'desc'        => esc_html__('Y-axis rotation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_prev_rotate_z' => array(
                    'title'       => esc_html__('Prev Rotate Z', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -90,
                    'extra_class' => 'wpsp_twist_flow_options',
                    'desc'        => esc_html__('Z-axis rotation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_next_shadow' => array(
                    'title'       => esc_html__('Next Shadow', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsp_twist_flow_options',
                    'desc'        => esc_html__('Enable shadow for next slide.', 'slider-press'),
                ),
                'creative_twist_flow_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 125,
                    'extra_class' => 'wpsp_twist_flow_options',
                    'desc'        => esc_html__('X-axis translation percentage for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_twist_flow_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_twist_flow_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -800,
                    'extra_class' => 'wpsp_twist_flow_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_next_rotate_x' => array(
                    'title'       => esc_html__('Next Rotate X', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_twist_flow_options',
                    'desc'        => esc_html__('X-axis rotation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_next_rotate_y' => array(
                    'title'       => esc_html__('Next Rotate Y', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_twist_flow_options',
                    'desc'        => esc_html__('Y-axis rotation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_next_rotate_z' => array(
                    'title'       => esc_html__('Next Rotate Z', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 90,
                    'extra_class' => 'wpsp_twist_flow_options',
                    'desc'        => esc_html__('Z-axis rotation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),

                // Mirror Effect Options
                'creative_mirror_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsp_mirror_options',
                    'desc'        => esc_html__('Enable shadow for previous slide.', 'slider-press'),
                ),
                'creative_mirror_prev_origin' => array(
                    'title'       => esc_html__('Prev Origin', 'slider-press'),
                    'field_type'  => 'wpsptext',
                    'default'     => 'left center',
                    'extra_class' => 'wpsp_mirror_options',
                    'desc'        => esc_html__('Transform origin for previous slide (e.g., "left center", "right center").', 'slider-press'),
                ),
                'creative_mirror_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -5,
                    'extra_class' => 'wpsp_mirror_options',
                    'desc'        => esc_html__('X-axis translation percentage for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_mirror_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_mirror_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -200,
                    'extra_class' => 'wpsp_mirror_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_prev_rotate_x' => array(
                    'title'       => esc_html__('Prev Rotate X', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_mirror_options',
                    'desc'        => esc_html__('X-axis rotation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_prev_rotate_y' => array(
                    'title'       => esc_html__('Prev Rotate Y', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 100,
                    'extra_class' => 'wpsp_mirror_options',
                    'desc'        => esc_html__('Y-axis rotation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_prev_rotate_z' => array(
                    'title'       => esc_html__('Prev Rotate Z', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_mirror_options',
                    'desc'        => esc_html__('Z-axis rotation for previous slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_next_origin' => array(
                    'title'       => esc_html__('Next Origin', 'slider-press'),
                    'field_type'  => 'wpsptext',
                    'default'     => 'right center',
                    'extra_class' => 'wpsp_mirror_options',
                    'desc'        => esc_html__('Transform origin for next slide (e.g., "left center", "right center").', 'slider-press'),
                ),
                'creative_mirror_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 5,
                    'extra_class' => 'wpsp_mirror_options',
                    'desc'        => esc_html__('X-axis translation percentage for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_mirror_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_mirror_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -200,
                    'extra_class' => 'wpsp_mirror_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_next_rotate_x' => array(
                    'title'       => esc_html__('Next Rotate X', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_mirror_options',
                    'desc'        => esc_html__('X-axis rotation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_next_rotate_y' => array(
                    'title'       => esc_html__('Next Rotate Y', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => -100,
                    'extra_class' => 'wpsp_mirror_options',
                    'desc'        => esc_html__('Y-axis rotation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_next_rotate_z' => array(
                    'title'       => esc_html__('Next Rotate Z', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'extra_class' => 'wpsp_mirror_options',
                    'desc'        => esc_html__('Z-axis rotation for next slide.', 'slider-press'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'slider-press' ),
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                ),

            );

            return apply_filters( 'wpsp_transition_fields', $fields );
        }

        /**
         * Navigation field
         *
         * @return array
         */
        public static function navigation_field(){

            $fields = array(

                'navigation_arrow_style' => array(
                    'title'         => esc_html__( 'Navigation arrows style', 'slider-press' ),
                    'field_type'    => 'wpspradio',
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
                    'data_hide'  => '.wpsp_arrow_fields, .wpsp_arrow_border_radius, .wpsp_arrow_color, .wpsp_arrow_bg_color, .wpsp_arrow_hover_bg_color, .wpsp_arrow_position',
                    'data_show'  => array(
                        'none'   => '',
                        'style1' => '.wpsp_arrow_fields',
                        'style2' => '.wpsp_arrow_fields, .wpsp_arrow_border_radius, .wpsp_arrow_color, .wpsp_arrow_bg_color, .wpsp_arrow_hover_bg_color',
                        'style3' => '.wpsp_arrow_fields, .wpsp_arrow_color, .wpsp_arrow_bg_color, .wpsp_arrow_hover_bg_color',
                        'style4' => '.wpsp_arrow_fields, .wpsp_arrow_border_radius, .wpsp_arrow_color, .wpsp_arrow_bg_color, .wpsp_arrow_hover_bg_color',
                        'style5' => '.wpsp_arrow_fields',
                        'custom' => '.wpsp_arrow_fields, .wpsp_arrow_border_radius, .wpsp_arrow_color, .wpsp_arrow_position',
                    ),
                ),
                'arrow_font_size' => array(
                    'title'       => esc_html__( 'Arrow Font Size', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 40,
                    'desc'        => esc_html__( 'Set font size for arrow icon in px.', 'slider-press' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'wpsp_arrow_fields',
                ),
                'arrow_color' => array(
                    'title'       => esc_html__( 'Arrow Color', 'slider-press' ),
                    'field_type'  => 'wpspcolor', 
                    'default'     => '#ffffff',
                    'extra_class' => 'wpsp_arrow_fields',
                ),
                'arrow_hover_color' => array(
                    'title'       => esc_html__( 'Arrow Hover Color', 'slider-press' ),
                    'field_type'  => 'wpspcolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpsp_arrow_fields',
                ),
                'arrow_border_radius' => array(
                    'title'       => esc_html__( 'Arrow Border Radius', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 50,
                    'desc'        => esc_html__( 'Set border radius for arrow border.', 'slider-press' ),
                    'unit'        => array(
                        'px'    => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'wpsp_arrow_border_radius',
                ),
                'arrow_bg_color' => array(
                    'title'       => esc_html__( 'Arrow Background Color', 'slider-press' ),
                    'field_type'  => 'wpspcolor',
                    'default'     => '#000000',
                    'extra_class' => 'wpsp_arrow_bg_color',
                ),
                'arrow_hover_bg_color' => array(
                    'title'       => esc_html__( 'Arrow Hover Background Color', 'slider-press' ),
                    'field_type'  => 'wpspcolor',
                    'default'     => '#333333',
                    'extra_class' => 'wpsp_arrow_hover_bg_color',
                ),
                'arrow_border_color' => array(
                    'title'       => esc_html__( 'Arrow Border Color', 'slider-press' ),
                    'field_type'  => 'wpspcolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpsp_arrow_color',
                ),
                'arrow_hover_border_color' => array(
                    'title'       => esc_html__( 'Arrow Hover Border Color', 'slider-press' ),
                    'field_type'  => 'wpspcolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpsp_arrow_color',
                ),
                'arrow_position_unit' => array(
                    'title'        => esc_html__( 'Arrow Position Unit', 'slider-press' ),
                    'field_type'  => 'wpspselect',
                    'options'     => array(
                        'px'  => 'px',
                        '%'   => '%',
                        'em'  => 'em',
                        'rem' => 'rem',
                    ),
                    'default'     => 'px',
                    'extra_class' => 'wpsp_arrow_position',
                ),
                'arrow_position_top' => array(
                    'title'       => esc_html__( 'Arrow Top Position', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 220,
                    'desc'        => esc_html__( 'Distance from the top. Leave bottom blank if this is set.', 'slider-press' ),
                    'extra_class' => 'wpsp_arrow_position',
                ),
                'arrow_position_bottom' => array(
                    'title'       => esc_html__( 'Arrow Bottom Position', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => '',
                    'desc'        => esc_html__( 'Distance from the bottom. Leave top blank if this is set.', 'slider-press' ),
                    'extra_class' => 'wpsp_arrow_position',
                ),
                'arrow_position_left' => array(
                    'title'       => esc_html__( 'Arrow Left Position', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 10,
                    'desc'        => esc_html__( 'Distance from the left.', 'slider-press' ),
                    'extra_class' => 'wpsp_arrow_position',
                ),
                'arrow_position_right' => array(
                    'title'       => esc_html__( 'Arrow Right Position', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 10,
                    'desc'        => esc_html__( 'Distance from the right.', 'slider-press' ),
                    'extra_class' => 'wpsp_arrow_position',
                ),

            );

            return apply_filters( 'wpsp_navigation_fields', $fields );
        }

        /**
         * Pagination field
         *
         * @return array
         */
        public static function pagination_field(){

            $fields = array(

                'pagination_type' => array(
                    'title'       => esc_html__( 'Pagination Type', 'slider-press' ),
                    'field_type'  => 'wpspselect',
                    'options'     => array(
                        'none'        => esc_html__( 'None', 'slider-press' ),
                        'bullets'     => esc_html__( 'Bullets', 'slider-press' ),
                        'progressbar' => esc_html__( 'Progress Bar', 'slider-press' ),
                        'fraction'    => esc_html__( 'Fraction', 'slider-press' ),
                        'custom'      => esc_html__( 'Custom', 'slider-press' ),
                    ),
                    'default'       => 'bullets',
                    'desc'          => esc_html__( 'Choose the type of pagination for the slider.', 'slider-press' ),
                    'data_hide'     => '.wpsp_bullet_style, .wpsp_autoplay_progress, .wpsp_progress_bar, .wpsp_fraction_style, .wpsp_custom_style, .wpsp_bullet_click, .wpsp_dynamic_bullets, .wpsp_bullets_bg_color, .wpsp_bullets_hover_bg_color, .wpsp_bullets_border_color',
                    'data_show' => array(
                        'bullets'     => '.wpsp_bullet_style, .wpsp_bullets_bg_color, .wpsp_bullets_hover_bg_color, .wpsp_bullets_border_color, .wpsp_bullet_click, .wpsp_dynamic_bullets',
                        'progressbar' => '.wpsp_autoplay_progress, .wpsp_progress_bar',
                        'fraction'    => '.wpsp_fraction_style',
                        'custom'      => '.wpsp_bullet_click, .wpsp_dynamic_bullets, .wpsp_custom_style',
                    ),
                ),
                'bullets_navigation_style'  => array(
                    'title'         => esc_html__( 'Bullet style', 'slider-press' ),
                    'field_type'    => 'wpspradio',
                    'options'       => array(
                        'style1' =>  'bullets-style-1.jpg',
                        'style2' =>  'bullets-style-2.jpg',
                        'style3' =>  'bullets-style-3.jpg',
                        'style4' =>  'bullets-style-4.jpg'
                    ),
                    'default'       => 'style1',
                    'extra_class'   => 'wpsp_bullet_style',
                ),
                'bullets_bg_color' => array(
                    'title'       => esc_html__( 'Bullet Background Color', 'slider-press' ),
                    'field_type'  => 'wpspcolor',
                    'default'     => '',
                    'extra_class' => 'wpsp_bullets_bg_color',
                ),
                'bullets_hover_bg_color' => array(
                    'title'       => esc_html__( 'Bullet Hover Background Color', 'slider-press' ),
                    'field_type'  => 'wpspcolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpsp_bullets_hover_bg_color',
                ),
                'bullets_border_color' => array(
                    'title'       => esc_html__( 'Bullet Border Color', 'slider-press' ),
                    'field_type'  => 'wpspcolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpsp_bullets_border_color',
                ),
                'control_progress_bar'  => array(
                    'title'         => esc_html__( 'Progress Bar', 'slider-press' ),
                    'field_type'    => 'wpspswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Show a progress bar while autoplay is running.', 'slider-press' ),
                    'data_show'     => '.wpsp_progress_bar',
                    'extra_class'   => 'wpsp_autoplay_progress',
                ),
                'progress_bar_position' => array(
                    'title'         => esc_html__( 'Progress Bar Position', 'slider-press' ),
                    'field_type'    => 'wpspselect',
                    'options'       => array(
                        'bottom'    => esc_html__( 'Bottom (Use in Horizontal)', 'slider-press' ),
                        'top'       => esc_html__( 'Top (Use in Horizontal)', 'slider-press' ),
                        'left'      => esc_html__( 'Left (Use in Vertical)', 'slider-press' ),
                        'right'     => esc_html__( 'Right (Use in Vertical)', 'slider-press' ),
                    ),
                    'default'       => 'bottom',
                    'desc'          => esc_html__( 'Choose where to position the autoplay progress bar.', 'slider-press' ),
                    'extra_class'   => 'wpsp_progress_bar',
                ),
                'progress_bar_color' => array(
                    'title'          => esc_html__( 'Progress bar color', 'slider-press' ),
                    'field_type'     => 'wpspcolor',
                    'default'        => '#ff0000',
                    'extra_class'    => 'wpsp_progress_bar',
                ),
                'fraction_navigation_style' => array(
                    'title'       => esc_html__( 'Fraction style', 'slider-press' ),
                    'field_type'  => 'wpspradio',
                    'options'     => array(
                        'style1'  => 'bullets-fraction.png',
                    ),
                    'default'     => 'style1',
                    'extra_class' => 'wpsp_fraction_style',
                ),
                'fraction_color' => array(
                    'title'         => esc_html__( 'Fraction color', 'slider-press' ),
                    'field_type'    => 'wpspcolor',
                    'default'       => '#ff0000',
                    'extra_class'   => 'wpsp_fraction_style',
                ),  
                'fraction_font_size' => array(
                    'title'       => esc_html__( 'Fraction Font Size', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 20,
                    'extra_class' => 'wpsp_fraction_style',
                    'desc'        => esc_html__( 'Set the font size for the fraction pagination.', 'slider-press' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                ),
                'fraction_position' => array(
                    'title'       => esc_html__( 'Fraction Position', 'slider-press' ),
                    'field_type'  => 'wpspselect',
                    'default'     => 'center',
                    'options'     => array(
                        'center'       => esc_html__( 'Center', 'slider-press' ),
                        'top-left'     => esc_html__( 'Top Left', 'slider-press' ),
                        'top-right'    => esc_html__( 'Top Right', 'slider-press' ),
                        'bottom-left'  => esc_html__( 'Bottom Left', 'slider-press' ),
                        'bottom-right' => esc_html__( 'Bottom Right', 'slider-press' ),
                    ),
                    'desc'         => esc_html__( 'Choose position for fraction in pagination.', 'slider-press' ),
                    'extra_class'  => 'wpsp_fraction_style',
                ),
                'custom_navigation_style' => array(
                    'title'       => esc_html__( 'Custom style', 'slider-press' ),
                    'field_type'  => 'wpspradio',
                    'options'     => array(
                        'style1'  => 'custom-style1.jpg',
                    ),
                    'default'     => 'style1',
                    'extra_class' => 'wpsp_custom_style',
                ),
                'bullets_click' => array(
                    'title'       => esc_html__('Bullets Clickable', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsp_bullet_click',
                    'desc'        => esc_html__('Allow users to click on slider bullets to navigate between slides.', 'slider-press'),
                ),
                'dynamic_bullets' => array(
                    'title'       => esc_html__('Dynamic Bullets', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsp_dynamic_bullets',
                    'desc'        => esc_html__('Enable dynamic bullets for the slider.', 'slider-press'),
                ),
                'custom_text_color' => array(
                    'title'         => esc_html__( 'Custom Color', 'slider-press' ),
                    'field_type'    => 'wpspcolor',
                    'default'       => '#ffffff',
                    'extra_class'   => 'wpsp_custom_style',
                    'desc'          => esc_html__( 'Set the text color for numbered pagination bullets.', 'slider-press' ),
                ),
                'custom_background_color' => array(
                    'title'         => esc_html__( 'Custom Background Color', 'slider-press' ),
                    'field_type'    => 'wpspcolor',
                    'default'       => '#007aff',
                    'extra_class'   => 'wpsp_custom_style',
                    'desc'          => esc_html__( 'Set the background color for active pagination bullets.', 'slider-press' ),
                ),
                'custom_active_text_color' => array(
                    'title'         => esc_html__( 'Custom active Text Color', 'slider-press' ),
                    'field_type'    => 'wpspcolor',
                    'default'       => '#ffffff',
                    'extra_class'   => 'wpsp_custom_style',
                    'desc'          => esc_html__( 'Set the text color for inactive numbered pagination bullets.', 'slider-press' ),
                ),
                'custom_active_background_color' => array(
                    'title'         => esc_html__( 'Custom active Background Color', 'slider-press' ),
                    'field_type'    => 'wpspcolor',
                    'default'       => '#0a0607',
                    'extra_class'   => 'wpsp_custom_style',
                    'desc'          => esc_html__( 'Set the background color for inactive pagination bullets.', 'slider-press' ),
                ),

            );

            return apply_filters( 'wpsp_pagination_fields', $fields );
        }

        /**
         * Responsive field
         *
         * @return array
         */
        public static function responsive_field(){

            $fields = array(

                'control_enable_responsive'   => array(
                    'title'         => esc_html__( 'Enable Responsive', 'slider-press' ),
                    'field_type'    => 'wpspswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Enable responsive layout for different screen sizes (mobile, tablet, desktop).', 'slider-press' ),
                    'data_show'     => '.wpsp_responsive_field',
                ),
                'items_in_desktop'  => array(
                    'title'         => esc_html__( 'Items in Desktop', 'slider-press' ),
                    'field_type'    => 'wpspnumber',
                    'default'       => 4,
                    'extra_class'   => 'wpsp_responsive_field',
                ),
                'items_in_tablet'   => array(
                    'title'         => esc_html__( 'Items in Tablet', 'slider-press' ),
                    'field_type'    => 'wpspnumber',
                    'default'       => 2,
                    'extra_class'   => 'wpsp_responsive_field',
                ),
                'items_in_mobile'   => array(
                    'title'         => esc_html__( 'Items in Mobile', 'slider-press' ),
                    'field_type'    => 'wpspnumber',
                    'default'       => 1,
                    'extra_class'   => 'wpsp_responsive_field',
                ),
                'slide_control_view_auto' => array(
                    'title'       =>  esc_html__( 'Slides View Auto', 'slider-press' ),
                    'field_type'  =>  'wpspswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable slide show per view auto for the slider.', 'slider-press' ),
                    'data_show'   => '.wpsp_auto_slide_width_fields',
                ),
                'auto_slide_width_default' => array(
                    'title'         => esc_html__( 'Default Slide Width', 'slider-press' ),
                    'field_type'    => 'wpspnumber',
                    'default'       => 30,
                    'desc'          => esc_html__( 'Default width for slides.', 'slider-press' ),
                    'extra_class'   => 'wpsp_auto_slide_width_fields',
                    'unit'          => array(
                        'percent'   => esc_html__( '%', 'slider-press' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                ),
                'auto_slide_width_2n' => array(
                    'title'         => esc_html__( '2n Slide Width', 'slider-press' ),
                    'field_type'    => 'wpspnumber',
                    'default'       => 40,
                    'desc'          => esc_html__( 'Width for every 2nd slide.', 'slider-press' ),
                    'extra_class'   => 'wpsp_auto_slide_width_fields',
                    'unit'          => array(
                        'percent'   => esc_html__( '%', 'slider-press' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                ),
                'auto_slide_width_3n' => array(
                    'title'         => esc_html__( '3n Slide Width', 'slider-press' ),
                    'field_type'    => 'wpspnumber',
                    'default'       => 30,
                    'desc'          => esc_html__( 'Width for every 3rd slide.', 'slider-press' ),
                    'extra_class'   => 'wpsp_auto_slide_width_fields',
                    'unit'          => array(
                        'percent'   => esc_html__( '%', 'slider-press' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                ),
                'slide_control_center' => array(
                    'title'       =>  esc_html__( 'Center Slides', 'slider-press' ),
                    'field_type'  =>  'wpspswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable slide centered for the slider.', 'slider-press' ),
                ),

            );

            return apply_filters( 'wpsp_responsive_fields', $fields );
        }

        /**
         * Thumbnail gallery field
         *
         * @return array
         */
        public static function thumbnail_gallery_field(){

            $fields = array(

                'thumb_gallery' => array(
                    'title'       => esc_html__( 'Show Thumbnail Gallery', 'slider-press' ),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable to display a thumbnail gallery below the main slider.', 'slider-press' ),
                    'data_show'   => '.wpsp_thumb_gallery',
                ),
                'thumb_gallery_loop' => array(   
                    'title'       => esc_html__( 'Thumbnail Gallery Loop', 'slider-press' ),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'yes',
                    'desc'        => esc_html__( 'Enable continuous loop mode for the thumbs gallery.', 'slider-press' ),
                    'extra_class' => 'wpsp_thumb_gallery',
                ),
                'thumb_gallery_space' => array(
                    'title'       => esc_html__( 'Thumbnail Gallery Space', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 10,
                    'unit'        => array(
                        'px'   => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'desc'          => esc_html__( 'Space between each thumbs gallery.', 'slider-press' ),
                    'extra_class'   => 'wpsp_thumb_gallery',
                ),
                'thumb_gallery_width' => array(
                    'title'       => esc_html__( 'Thumbnail Width', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 80,
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'desc'          => esc_html__( 'Set width of thumbnail images.', 'slider-press' ),
                    'extra_class'   => 'wpsp_thumb_gallery',
                ),
                'thumb_gallery_height' => array(
                    'title'       => esc_html__( 'Thumbnail Height', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 80,
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'desc'          => esc_html__( 'Set height of thumbnail images.', 'slider-press' ),
                    'extra_class'   => 'wpsp_thumb_gallery',
                ),
                'thumb_gallery_border_radius' => array(
                    'title'       => esc_html__( 'Thumbnail Border Radius', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'desc'          => esc_html__( 'Set border radius of thumbnail images.', 'slider-press' ),
                    'extra_class'   => 'wpsp_thumb_gallery',
                ),

            );

            return apply_filters( 'wpsp_thumbnail_gallery_fields', $fields );
        }

        /**
         * Autoplay field
         *
         * @return array
         */
        public static function autoplay_field(){

            $fields = array(

                'control_autoplay'  => array(
                    'title'         => esc_html__( 'Autoplay', 'slider-press' ),
                    'field_type'    => 'wpspswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Enable or disable autoplay functionality.', 'slider-press' ),
                    'data_show'     => '.wpsp_autoplay_timing',
                ),
                'autoplay_timing'   => array(
                    'title'         => esc_html__( 'Autoplay time', 'slider-press' ),
                    'field_type'    => 'wpspnumber',
                    'default'       => 3000,
                    'desc'          => esc_html__( 'Enter autoplay speed in milliseconds (e.g., 3000 for 3 seconds).', 'slider-press' ),
                    'unit'          => array(
                        'seconds'   => esc_html__( 'Second\'s', 'slider-press' ),
                    ),
                    'unit_selected' => 'seconds',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'wpsp_autoplay_timing',
                ),
                'control_autoplay_timeleft' => array(
                    'title'       => esc_html__( 'Circular Autoplay Progress', 'slider-press' ),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Show circular progress countdown during autoplay.', 'slider-press' ),
                    'data_show'   => '.wpsp_autoplay_time', 
                ),
                'control_autoplay_timeleft_color' => array(
                    'title'       => esc_html__( 'Time Color', 'slider-press' ),
                    'field_type'  => 'wpspcolor',
                    'default'     => '#007aff',
                    'desc'        => esc_html__( 'Set color for circular autoplay progress.', 'slider-press' ),
                    'extra_class' => 'wpsp_autoplay_time',
                ),
                'control_autoplay_timeleft_position' => array(
                    'title'       => esc_html__( 'Autoplay Time Position', 'slider-press' ),
                    'field_type'  => 'wpspselect',
                    'default'     => 'bottom-right',
                    'options'     => array(
                        'top-left'     => esc_html__( 'Top Left', 'slider-press' ),
                        'top-right'    => esc_html__( 'Top Right', 'slider-press' ),
                        'bottom-left'  => esc_html__( 'Bottom Left', 'slider-press' ),
                        'bottom-right' => esc_html__( 'Bottom Right', 'slider-press' ),
                    ),
                    'desc'          => esc_html__( 'Choose position for autoplay time circle.', 'slider-press' ),
                    'extra_class'   => 'wpsp_autoplay_time',
                ),
                'control_autoplay_timeleft_font_size' => array(
                    'title'       => esc_html__( 'Time Font Size', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 20,
                    'desc'        => esc_html__( 'Font size for the autoplay time number.', 'slider-press' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'wpsp_autoplay_time',
                ),

            );

            return apply_filters( 'wpsp_autoplay_fields', $fields );    
        }

        /**
         * Scrollbar field
         *
         * @return array
         */
        public static function scrollbar_field(){

            $fields = array(

                'control_scrollbar' => array(
                    'title'       =>  esc_html__( 'Scrollbar Control', 'slider-press' ),
                    'field_type'  =>  'wpspswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable scrollbar navigation for the slider.', 'slider-press' ),
                    'data_show'   => '.wpsp_scrollbar_wrapper',
                ),
                'scrollbar_position' => array(
                    'title'       => esc_html__('Scrollbar Position', 'slider-press'),
                    'field_type'  => 'wpspselect',
                    'default'     => 'bottom',
                    'desc'        => esc_html__('Choose scrollbar position.', 'slider-press'),
                    'options'     => array(
                        'bottom' => esc_html__('Bottom (Use in Horizontal)', 'slider-press'),
                        'top'    => esc_html__('Top (Use in Horizontal)', 'slider-press'),
                        'left'   => esc_html__('Left ( Use in Vertical)', 'slider-press'),
                        'right'  => esc_html__('Right ( Use in Vertical)', 'slider-press'),
                    ),      
                    'extra_class' => 'wpsp_scrollbar_wrapper',
                ),
                'scrollbar_color' => array(
                    'title'       =>  esc_html__( 'Scrollbar Color', 'slider-press' ),
                    'field_type'  =>  'wpspcolor',
                    'default'     =>  '#999999',
                    'extra_class' =>  'wpsp_scrollbar_wrapper',
                ), 
                'scrollbar_draggable' => array(
                    'title'       => esc_html__('Scrollbar Draggable', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpsp_scrollbar_wrapper',
                    'desc'        => esc_html__('Enable draggable scrollbar.', 'slider-press'),
                ),

            );
            
            return apply_filters( 'wpsp_scrollbar_fields', $fields );
        }

        /**
         * Other options field
         *
         * @return array
         */
        public static function other_options_field(){

            $fields = array(

                'image_unit' => array(
                    'title'       => esc_html__( 'Set Width & Height', 'slider-press' ),
                    'field_type'  => 'wpspselect',
                    'options'     => array(
                        'px'  => 'px',
                        'em'  => 'em',
                        'rem' => 'rem',
                        'vh'  => 'vh',
                    ),
                    'default'    => 'px',
                    'desc'       => esc_html__( 'Unit to use for image width and height. Applied to each slide image.', 'slider-press' ),
                ),
                'width_image' => array(
                    'title'       => esc_html__( 'Width of Image', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 1000,
                    'desc'        =>  esc_html__( 'Specify the width of each slide image.', 'slider-press' ),
                ),
                'height_image'  => array(
                    'title'       => esc_html__( 'Height of Image', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 500,
                    'desc'        =>  esc_html__( 'Specify the height of each slide image.', 'slider-press' ),
                ),
                'border_radius_image' => array(
                    'title'       => esc_html__( 'Border Radius of Image', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 0,
                    'desc'        => esc_html__( 'Specify the border radius of each slide image.', 'slider-press' ),
                    'unit'          => array(
                        'px'   => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                ),
                'control_lazyload_images' => array(
                    'title'         => esc_html__( 'Lazy load images', 'slider-press' ),  
                    'field_type'    => 'wpspswitch',
                    'default'       => 'yes',
                    'desc'          => esc_html__( 'Load images only when they are needed.', 'slider-press' ),
                ),
                'control_grab_cursor'   => array(
                    'title'         => esc_html__( 'Grab cursor', 'slider-press' ),
                    'field_type'    => 'wpspswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Change the mouse cursor to a hand icon when hovering over the slider.', 'slider-press' ),
                ),
                'control_rewind' => array(
                    'title'       => esc_html__( 'Rewind', 'slider-press' ),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable rewind functionality for the slider.', 'slider-press' ),
                ),
                'control_slide_space' => array(
                    'title'       => esc_html__( 'Slides Space', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 10,
                    'desc'        => esc_html__( 'Space between each slide.', 'slider-press' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'slider-press' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                ),
                'control_slider_vertical' => array(
                    'title'       =>  esc_html__( 'Vertical Slider Control', 'slider-press' ),
                    'field_type'  =>  'wpspswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable vertical direction for the slider.', 'slider-press' ),
                ),
                'control_loop_slider' => array(
                    'title'       => esc_html__( 'Loop Slides', 'slider-press' ),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable continuous loop mode for the slider.', 'slider-press' ),
                ),
                'control_slide_speed' => array(
                    'title'       => esc_html__( 'Slide Speed', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 400,
                    'desc'        => esc_html__( 'Set the speed of slide transition in milliseconds (e.g., 400 = 0.4 second).', 'slider-press' ),
                    'unit'        => array(
                        'seconds' => esc_html__( 'Second\'s', 'slider-press' ),
                    ),
                    'unit_selected' => 'seconds',
                    'unit_disabled' => 'yes',
                ),
                'zoom_images' => array(
                    'title'       => esc_html__( 'Zoom Images', 'slider-press' ),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable a zoom images for slider.', 'slider-press' ),
                ),
                'control_keyboard' => array(
                    'title'       =>  esc_html__( 'Keyboard Control', 'slider-press' ),
                    'field_type'  =>  'wpspswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable keyboard navigation for the slider using arrow keys.', 'slider-press' ),
                ),
                'control_mousewheel' => array(
                    'title'       =>  esc_html__( 'Mousewheel Control', 'slider-press' ),
                    'field_type'  =>  'wpspswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable mouse wheel navigation for the slider.', 'slider-press' ),
                ),
                'control_rtl_slider' => array(
                    'title'       => esc_html__( 'Enable RTL', 'slider-press' ),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable Right-to-Left sliding for RTL languages.', 'slider-press' ),
                ),
                'enable_grid_layout' => array(
                    'title'       => esc_html__('Enable Grid Layout', 'slider-press'),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__('Enable Swiper grid layout.', 'slider-press'),
                    'data_show'   => '.wpsp_grid_layout',
                ),
                'grid_layout_axis' => array(
                    'title'       => esc_html__('Grid Layout Type', 'slider-press'),
                    'field_type'  => 'wpspselect',
                    'default'     => 'row',
                    'options'     => array(
                        'row'     => esc_html__('Row', 'slider-press'),
                        'column'  => esc_html__('Column', 'slider-press'),
                    ),
                    'desc'         => esc_html__('Choose grid layout: Row or Column.', 'slider-press'),
                    'extra_class'  => 'wpsp_grid_layout',
                ),
                'grid_count' => array(
                    'title'       => esc_html__('Grid Count', 'slider-press'),
                    'field_type'  => 'wpspnumber',
                    'default'     => 2,
                    'desc'        => esc_html__('Set the number of rows or columns based on your layout.', 'slider-press'),
                    'extra_class' => 'wpsp_grid_layout',
                ),
                'enable_slides_group' => array(
                    'title'       => esc_html__( 'Enable Slides Group', 'slider-press' ),
                    'field_type'  => 'wpspswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable to control grouping of slides.', 'slider-press' ),
                    'data_show'   => '.wpsp_slides_group',
                ),
                'slides_per_group' => array(
                    'title'       => esc_html__( 'Slides Per Group', 'slider-press' ),
                    'field_type'  => 'wpspnumber',
                    'default'     => 1,
                    'desc'        => esc_html__( 'Skip the number of slides from the beginning before grouping starts. Useful when first slide is featured.', 'slider-press' ),
                    'extra_class' => 'wpsp_slides_group',
                ),

            );

            return apply_filters( 'wpsp_other_options_fields', $fields );
        }

        /**
         * Custom CSS field
         *
         * @return array
         */
        public static function custom_css_field(){

            $fields = array(

                'custom_class_name' => array(
                    'title'       => esc_html__( 'Custom Class Name', 'slider-press' ),
                    'field_type'  => 'wpsptext',
                    'default'     => '',
                    'placeholder' => esc_html__( 'my-custom-slider', 'slider-press' ),
                    'desc'        => esc_html__( 'Enter a custom CSS class name (without dot). This class will be added to the slider wrapper. Example: my-custom-slider', 'slider-press' ),
                ),
                'custom_css' => array(
                    'title'       => esc_html__( 'Custom CSS', 'slider-press' ),
                    'field_type'  => 'wpsptextarea',
                    'default'     => '',
                    'rows'        => 25,
                    'cols'        => 50,
                    'placeholder' => esc_html__( '/* Add your custom CSS here */', 'slider-press' ),
                    'desc'        => esc_html__( 'Add your custom CSS here. This CSS will apply globally to the slider and its elements.', 'slider-press' ),
                ),

            );

            return apply_filters( 'wpsp_custom_css_fields', $fields );
        }
    }

endif;
