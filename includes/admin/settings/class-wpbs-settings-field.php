<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPBS_Settings_Fields' ) ) :

     /**
	 * Class WPBS_Settings_Fields
	 *
	 */
    class WPBS_Settings_Fields {

        /**
         * Transition field
         *
         * @return array
         */
        public static function transition_field(){

            $fields = array(

                'animation'  => array(
                    'title'         => esc_html__( 'Transition type', 'blocksy-slider' ),
                    'field_type'    => 'wpbsradio',
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
                    'data_hide'   => '.wpbs_coverflow_options, .wpbs_cube_options, .wpbs_cards_options, .wpbs_shadow_push_options, .wpbs_zoom_split_options, .wpbs_slide_flow_options, .wpbs_flip_deck_options, .wpbs_twist_flow_options, .wpbs_mirror_options',
                    'data_show'   => array(
                        'cube'       => '.wpbs_cube_options',
                        'cards'      => '.wpbs_cards_options',
                        'coverflow'  => '.wpbs_coverflow_options',
                        'shadow push' => '.wpbs_shadow_push_options',
                        'zoom split' => '.wpbs_zoom_split_options',
                        'slide flow' => '.wpbs_slide_flow_options',
                        'flip deck' => '.wpbs_flip_deck_options',
                        'twist flow' => '.wpbs_twist_flow_options',
                        'mirror' => '.wpbs_mirror_options',
                    ),
                ),
                'cube_shadows' => array(
                    'title'       => esc_html__('Shadows', 'blocksy-slider'),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpbs_cube_options',
                    'desc'        => esc_html__('Enable shadows.', 'blocksy-slider'),
                ),
                'cube_slide_shadows' => array(
                    'title'       => esc_html__('Slide Shadows', 'blocksy-slider'),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpbs_cube_options',
                    'desc'        => esc_html__('Enable slide shadows.', 'blocksy-slider'),
                ),
                'cube_shadowoffset' => array(
                    'title'       => esc_html__('Shadow Offset', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 20,
                    'extra_class' => 'wpbs_cube_options',
                    'desc'        => esc_html__('Shadow Offset in slides.', 'blocksy-slider'),
                ),
                'cube_shadowScale' => array(
                    'title'       => esc_html__('Shadow Scale', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 1,
                    'extra_class' => 'wpbs_cube_options',
                    'desc'        => esc_html__('Shadow Scale in slides.', 'blocksy-slider'),
                ),
                'cards_border' => array(
                    'title'       => esc_html__('Border Radius', 'blocksy-slider'),
                    'field_type'  => 'wpbsrange',
                    'default'     => 20,
                    'extra_class' => 'wpbs_cards_options',
                    'desc'        => esc_html__('Border radius cards.', 'blocksy-slider'),
                    'unit'        => array(
                        '%'      => esc_html__( '%', 'blocksy-slider' ),
                    ),
                    'unit_selected' => '%',
                    'unit_disabled' => 'yes',
                ),
                'cards_initial_slide' => array(
                    'title'       => esc_html__('Initial Slide', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 2,
                    'extra_class' => 'wpbs_cards_options',
                    'desc'        => esc_html__('Initial slide for cards effect.', 'blocksy-slider'),
                ),
                'cards_loop_additional_slides' => array(
                    'title'       => esc_html__('Loop Additional Slides', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 2,
                    'extra_class' => 'wpbs_cards_options',
                    'desc'        => esc_html__('Loop additional slides for cards effect.', 'blocksy-slider'),
                ),
                'coverflow_rotate' => array(
                    'title'       => esc_html__('Rotate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 50,
                    'extra_class' => 'wpbs_coverflow_options',
                    'desc'        => esc_html__('Rotation angle for coverflow.', 'blocksy-slider'),
                ),
                'coverflow_stretch' => array(
                    'title'       => esc_html__('Stretch', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_coverflow_options',
                    'desc'        => esc_html__('Space between slides.', 'blocksy-slider'),
                ),
                'coverflow_depth' => array(
                    'title'       => esc_html__('Depth', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 100,
                    'extra_class' => 'wpbs_coverflow_options',
                    'desc'        => esc_html__('Depth offset.', 'blocksy-slider'),
                ),
                'coverflow_modifier' => array(
                    'title'       => esc_html__('Modifier', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 1,
                    'extra_class' => 'wpbs_coverflow_options',
                    'desc'        => esc_html__('Effect multiplier.', 'blocksy-slider'),
                ),
                'coverflow_shadows' => array(
                    'title'       => esc_html__('Slide Shadows', 'blocksy-slider'),
                    'field_type'  => 'wpbsswitch',
                    'default'     => true,
                    'extra_class' => 'wpbs_coverflow_options',
                    'desc'        => esc_html__('Enable slide shadows.', 'blocksy-slider'),
                ),

                // Shadow Push Effect Options
                'creative_shadow_push_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'blocksy-slider'),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpbs_shadow_push_options',
                    'desc'        => esc_html__('Enable shadow for previous slide.', 'blocksy-slider'),
                ),
                'creative_shadow_push_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_shadow_push_options',
                    'desc'        => esc_html__('X-axis translation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_shadow_push_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_shadow_push_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_shadow_push_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -400,
                    'extra_class' => 'wpbs_shadow_push_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_shadow_push_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 100,
                    'extra_class' => 'wpbs_shadow_push_options',
                    'desc'        => esc_html__('X-axis translation percentage for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_shadow_push_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_shadow_push_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_shadow_push_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_shadow_push_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),

                // Zoom Split Effect Options
                'creative_zoom_split_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'blocksy-slider'),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpbs_zoom_split_options',
                    'desc'        => esc_html__('Enable shadow.', 'blocksy-slider'),
                ),
                'creative_zoom_split_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -120,
                    'extra_class' => 'wpbs_zoom_split_options',
                    'desc'        => esc_html__('X-axis translation percentage for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_zoom_split_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_zoom_split_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_zoom_split_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -500,
                    'extra_class' => 'wpbs_zoom_split_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_zoom_split_next_shadow' => array(
                    'title'       => esc_html__('Next Shadow', 'blocksy-slider'),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpbs_zoom_split_options',
                    'desc'        => esc_html__('Enable shadow.', 'blocksy-slider'),
                ),  
                'creative_zoom_split_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 120,
                    'extra_class' => 'wpbs_zoom_split_options',
                    'desc'        => esc_html__('X-axis translation percentage for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_zoom_split_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_zoom_split_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_zoom_split_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -500,
                    'extra_class' => 'wpbs_zoom_split_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),

                // Slide Flow Effect Options
                'creative_slide_flow_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'blocksy-slider'),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpbs_slide_flow_options',
                    'desc'        => esc_html__('Enable shadow for previous slide.', 'blocksy-slider'),
                ),
                'creative_slide_flow_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -20,
                    'extra_class' => 'wpbs_slide_flow_options',
                    'desc'        => esc_html__('X-axis translation percentage for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent'      => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_slide_flow_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_slide_flow_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_slide_flow_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -1,
                    'extra_class' => 'wpbs_slide_flow_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_slide_flow_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 100,
                    'extra_class' => 'wpbs_slide_flow_options',
                    'desc'        => esc_html__('X-axis translation percentage for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_slide_flow_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_slide_flow_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_slide_flow_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_slide_flow_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),

                // Flip Deck Effect Options
                'creative_flip_deck_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'blocksy-slider'),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpbs_flip_deck_options',
                    'desc'        => esc_html__('Enable shadow for previous slide.', 'blocksy-slider'),
                ),
                'creative_flip_deck_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_flip_deck_options',
                    'desc'        => esc_html__('X-axis translation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_flip_deck_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -800,
                    'extra_class' => 'wpbs_flip_deck_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_prev_rotate_x' => array(
                    'title'       => esc_html__('Prev Rotate X', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 180,
                    'extra_class' => 'wpbs_flip_deck_options',
                    'desc'        => esc_html__('X-axis rotation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_prev_rotate_y' => array(
                    'title'       => esc_html__('Prev Rotate Y', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_flip_deck_options',
                    'desc'        => esc_html__('Y-axis rotation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_prev_rotate_z' => array(
                    'title'       => esc_html__('Prev Rotate Z', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_flip_deck_options',
                    'desc'        => esc_html__('Z-axis rotation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_shadow' => array(
                    'title'       => esc_html__('Next Shadow', 'blocksy-slider'),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpbs_flip_deck_options',
                    'desc'        => esc_html__('Enable shadow for next slide.', 'blocksy-slider'),
                ),
                'creative_flip_deck_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_flip_deck_options',
                    'desc'        => esc_html__('X-axis translation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_flip_deck_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -800,
                    'extra_class' => 'wpbs_flip_deck_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_rotate_x' => array(
                    'title'       => esc_html__('Next Rotate X', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -180,
                    'extra_class' => 'wpbs_flip_deck_options',
                    'desc'        => esc_html__('X-axis rotation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_rotate_y' => array(
                    'title'       => esc_html__('Next Rotate Y', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_flip_deck_options',
                    'desc'        => esc_html__('Y-axis rotation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_flip_deck_next_rotate_z' => array(
                    'title'       => esc_html__('Next Rotate Z', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_flip_deck_options',
                    'desc'        => esc_html__('Z-axis rotation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),

                // Twist Flow Effect Options
                'creative_twist_flow_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'blocksy-slider'),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpbs_twist_flow_options',
                    'desc'        => esc_html__('Enable shadow for previous slide.', 'blocksy-slider'),
                ),
                'creative_twist_flow_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -125,
                    'extra_class' => 'wpbs_twist_flow_options',
                    'desc'        => esc_html__('X-axis translation percentage for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_twist_flow_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_twist_flow_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -800,
                    'extra_class' => 'wpbs_twist_flow_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_prev_rotate_x' => array(
                    'title'       => esc_html__('Prev Rotate X', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_twist_flow_options',
                    'desc'        => esc_html__('X-axis rotation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_prev_rotate_y' => array(
                    'title'       => esc_html__('Prev Rotate Y', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_twist_flow_options',
                    'desc'        => esc_html__('Y-axis rotation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_prev_rotate_z' => array(
                    'title'       => esc_html__('Prev Rotate Z', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -90,
                    'extra_class' => 'wpbs_twist_flow_options',
                    'desc'        => esc_html__('Z-axis rotation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_next_shadow' => array(
                    'title'       => esc_html__('Next Shadow', 'blocksy-slider'),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpbs_twist_flow_options',
                    'desc'        => esc_html__('Enable shadow for next slide.', 'blocksy-slider'),
                ),
                'creative_twist_flow_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 125,
                    'extra_class' => 'wpbs_twist_flow_options',
                    'desc'        => esc_html__('X-axis translation percentage for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_twist_flow_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_twist_flow_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -800,
                    'extra_class' => 'wpbs_twist_flow_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_next_rotate_x' => array(
                    'title'       => esc_html__('Next Rotate X', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_twist_flow_options',
                    'desc'        => esc_html__('X-axis rotation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_next_rotate_y' => array(
                    'title'       => esc_html__('Next Rotate Y', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_twist_flow_options',
                    'desc'        => esc_html__('Y-axis rotation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_twist_flow_next_rotate_z' => array(
                    'title'       => esc_html__('Next Rotate Z', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 90,
                    'extra_class' => 'wpbs_twist_flow_options',
                    'desc'        => esc_html__('Z-axis rotation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),

                // Mirror Effect Options
                'creative_mirror_prev_shadow' => array(
                    'title'       => esc_html__('Prev Shadow', 'blocksy-slider'),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'yes',
                    'extra_class' => 'wpbs_mirror_options',
                    'desc'        => esc_html__('Enable shadow for previous slide.', 'blocksy-slider'),
                ),
                'creative_mirror_prev_origin' => array(
                    'title'       => esc_html__('Prev Origin', 'blocksy-slider'),
                    'field_type'  => 'wpbstext',
                    'default'     => 'left center',
                    'extra_class' => 'wpbs_mirror_options',
                    'desc'        => esc_html__('Transform origin for previous slide (e.g., "left center", "right center").', 'blocksy-slider'),
                ),
                'creative_mirror_prev_x' => array(
                    'title'       => esc_html__('Prev X Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -5,
                    'extra_class' => 'wpbs_mirror_options',
                    'desc'        => esc_html__('X-axis translation percentage for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_mirror_prev_y' => array(
                    'title'       => esc_html__('Prev Y Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_mirror_options',
                    'desc'        => esc_html__('Y-axis translation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_prev_z' => array(
                    'title'       => esc_html__('Prev Z Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -200,
                    'extra_class' => 'wpbs_mirror_options',
                    'desc'        => esc_html__('Z-axis translation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_prev_rotate_x' => array(
                    'title'       => esc_html__('Prev Rotate X', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_mirror_options',
                    'desc'        => esc_html__('X-axis rotation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_prev_rotate_y' => array(
                    'title'       => esc_html__('Prev Rotate Y', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 100,
                    'extra_class' => 'wpbs_mirror_options',
                    'desc'        => esc_html__('Y-axis rotation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_prev_rotate_z' => array(
                    'title'       => esc_html__('Prev Rotate Z', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_mirror_options',
                    'desc'        => esc_html__('Z-axis rotation for previous slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_next_origin' => array(
                    'title'       => esc_html__('Next Origin', 'blocksy-slider'),
                    'field_type'  => 'wpbstext',
                    'default'     => 'right center',
                    'extra_class' => 'wpbs_mirror_options',
                    'desc'        => esc_html__('Transform origin for next slide (e.g., "left center", "right center").', 'blocksy-slider'),
                ),
                'creative_mirror_next_x' => array(
                    'title'       => esc_html__('Next X Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 5,
                    'extra_class' => 'wpbs_mirror_options',
                    'desc'        => esc_html__('X-axis translation percentage for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'percent',
                ),
                'creative_mirror_next_y' => array(
                    'title'       => esc_html__('Next Y Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_mirror_options',
                    'desc'        => esc_html__('Y-axis translation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_next_z' => array(
                    'title'       => esc_html__('Next Z Translate', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -200,
                    'extra_class' => 'wpbs_mirror_options',
                    'desc'        => esc_html__('Z-axis translation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_next_rotate_x' => array(
                    'title'       => esc_html__('Next Rotate X', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_mirror_options',
                    'desc'        => esc_html__('X-axis rotation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_next_rotate_y' => array(
                    'title'       => esc_html__('Next Rotate Y', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => -100,
                    'extra_class' => 'wpbs_mirror_options',
                    'desc'        => esc_html__('Y-axis rotation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),
                'creative_mirror_next_rotate_z' => array(
                    'title'       => esc_html__('Next Rotate Z', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 0,
                    'extra_class' => 'wpbs_mirror_options',
                    'desc'        => esc_html__('Z-axis rotation for next slide.', 'blocksy-slider'),
                    'unit'        => array(
                        'percent' => esc_html__( '%', 'blocksy-slider' ),
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                ),

            );

            return apply_filters( 'wpbs_transition_fields', $fields );
        }

        /**
         * Navigation field
         *
         * @return array
         */
        public static function navigation_field(){

            $fields = array(

                'navigation_arrow_style' => array(
                    'title'         => esc_html__( 'Navigation arrows style', 'blocksy-slider' ),
                    'field_type'    => 'wpbsradio',
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
                    'data_hide'  => '.wpbs_arrow_fields, .wpbs_arrow_border_radius, .wpbs_arrow_color, .wpbs_arrow_bg_color, .wpbs_arrow_hover_bg_color, .wpbs_arrow_position',
                    'data_show'  => array(
                        'none'   => '',
                        'style1' => '.wpbs_arrow_fields',
                        'style2' => '.wpbs_arrow_fields, .wpbs_arrow_border_radius, .wpbs_arrow_color, .wpbs_arrow_bg_color, .wpbs_arrow_hover_bg_color',
                        'style3' => '.wpbs_arrow_fields, .wpbs_arrow_color, .wpbs_arrow_bg_color, .wpbs_arrow_hover_bg_color',
                        'style4' => '.wpbs_arrow_fields, .wpbs_arrow_border_radius, .wpbs_arrow_color, .wpbs_arrow_bg_color, .wpbs_arrow_hover_bg_color',
                        'style5' => '.wpbs_arrow_fields',
                        'custom' => '.wpbs_arrow_fields, .wpbs_arrow_border_radius, .wpbs_arrow_color, .wpbs_arrow_position',
                    ),
                ),
                'arrow_font_size' => array(
                    'title'       => esc_html__( 'Arrow Font Size', 'blocksy-slider' ),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 40,
                    'desc'        => esc_html__( 'Set font size for arrow icon in px.', 'blocksy-slider' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'wpbs_arrow_fields',
                ),
                'arrow_color' => array(
                    'title'       => esc_html__( 'Arrow Color', 'blocksy-slider' ),
                    'field_type'  => 'wpbscolor', 
                    'default'     => '#ffffff',
                    'extra_class' => 'wpbs_arrow_fields',
                ),
                'arrow_hover_color' => array(
                    'title'       => esc_html__( 'Arrow Hover Color', 'blocksy-slider' ),
                    'field_type'  => 'wpbscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpbs_arrow_fields',
                ),
                'arrow_border_radius' => array(
                    'title'       => esc_html__( 'Arrow Border Radius', 'blocksy-slider' ),
                    'field_type'  => 'wpbsrange',
                    'default'     => 50,
                    'desc'        => esc_html__( 'Set border radius for arrow border.', 'blocksy-slider' ),
                    'unit'        => array(
                        'percent'    => esc_html__( '%', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'wpbs_arrow_border_radius',
                ),
                'arrow_bg_color' => array(
                    'title'       => esc_html__( 'Arrow Background Color', 'blocksy-slider' ),
                    'field_type'  => 'wpbscolor',
                    'default'     => '#000000',
                    'extra_class' => 'wpbs_arrow_bg_color',
                ),
                'arrow_hover_bg_color' => array(
                    'title'       => esc_html__( 'Arrow Hover Background Color', 'blocksy-slider' ),
                    'field_type'  => 'wpbscolor',
                    'default'     => '#333333',
                    'extra_class' => 'wpbs_arrow_hover_bg_color',
                ),
                'arrow_border_color' => array(
                    'title'       => esc_html__( 'Arrow Border Color', 'blocksy-slider' ),
                    'field_type'  => 'wpbscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpbs_arrow_color',
                ),
                'arrow_hover_border_color' => array(
                    'title'       => esc_html__( 'Arrow Hover Border Color', 'blocksy-slider' ),
                    'field_type'  => 'wpbscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpbs_arrow_color',
                ),
                'arrow_position_unit' => array(
                    'title'        => esc_html__( 'Arrow Position Unit', 'blocksy-slider' ),
                    'field_type'  => 'wpbsselect',
                    'options'     => array(
                        'px'  => 'px',
                        '%'   => '%',
                        'em'  => 'em',
                        'rem' => 'rem',
                    ),
                    'default'     => 'px',
                    'extra_class' => 'wpbs_arrow_position',
                ),
                'arrow_position_top' => array(
                    'title'       => esc_html__( 'Arrow Top Position', 'blocksy-slider' ),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 220,
                    'desc'        => esc_html__( 'Distance from the top. Leave bottom blank if this is set.', 'blocksy-slider' ),
                    'extra_class' => 'wpbs_arrow_position',
                ),
                'arrow_position_bottom' => array(
                    'title'       => esc_html__( 'Arrow Bottom Position', 'blocksy-slider' ),
                    'field_type'  => 'wpbsnumber',
                    'default'     => '',
                    'desc'        => esc_html__( 'Distance from the bottom. Leave top blank if this is set.', 'blocksy-slider' ),
                    'extra_class' => 'wpbs_arrow_position',
                ),
                'arrow_position_left' => array(
                    'title'       => esc_html__( 'Arrow Left Position', 'blocksy-slider' ),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 10,
                    'desc'        => esc_html__( 'Distance from the left.', 'blocksy-slider' ),
                    'extra_class' => 'wpbs_arrow_position',
                ),
                'arrow_position_right' => array(
                    'title'       => esc_html__( 'Arrow Right Position', 'blocksy-slider' ),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 10,
                    'desc'        => esc_html__( 'Distance from the right.', 'blocksy-slider' ),
                    'extra_class' => 'wpbs_arrow_position',
                ),

            );

            return apply_filters( 'wpbs_navigation_fields', $fields );
        }

        /**
         * Pagination field
         *
         * @return array
         */
        public static function pagination_field(){

            $fields = array(

                'pagination_type' => array(
                    'title'       => esc_html__( 'Pagination Type', 'blocksy-slider' ),
                    'field_type'  => 'wpbsselect',
                    'options'     => array(
                        'none'        => esc_html__( 'None', 'blocksy-slider' ),
                        'bullets'     => esc_html__( 'Bullets', 'blocksy-slider' ),
                        'progressbar' => esc_html__( 'Progress Bar', 'blocksy-slider' ),
                        'fraction'    => esc_html__( 'Fraction', 'blocksy-slider' ),
                        'custom'      => esc_html__( 'Custom', 'blocksy-slider' ),
                    ),
                    'default'       => 'bullets',
                    'desc'          => esc_html__( 'Choose the type of pagination for the slider.', 'blocksy-slider' ),
                    'data_hide'     => '.wpbs_bullet_style, .wpbs_autoplay_progress, .wpbs_progress_bar, .wpbs_fraction_style, .wpbs_custom_style, .wpbs_bullets_bg_color, .wpbs_bullets_hover_bg_color, .wpbs_bullets_border_color',
                    'data_show' => array(
                        'bullets'     => '.wpbs_bullet_style, .wpbs_bullets_bg_color, .wpbs_bullets_hover_bg_color, .wpbs_bullets_border_color',
                        'progressbar' => '.wpbs_autoplay_progress, .wpbs_progress_bar',
                        'fraction'    => '.wpbs_fraction_style',
                        'custom'      => '.wpbs_custom_style',
                    ),
                ),
                'bullets_navigation_style'  => array(
                    'title'         => esc_html__( 'Bullet style', 'blocksy-slider' ),
                    'field_type'    => 'wpbsradio',
                    'options'       => array(
                        'style1' =>  'bullets-style-1.jpg',
                        'style2' =>  'bullets-style-2.jpg',
                        'style3' =>  'bullets-style-3.jpg',
                        'style4' =>  'bullets-style-4.jpg',
                    ),
                    'default'       => 'style1',
                    'extra_class'   => 'wpbs_bullet_style',
                ),
                'bullets_bg_color' => array(
                    'title'       => esc_html__( 'Bullet Background Color', 'blocksy-slider' ),
                    'field_type'  => 'wpbscolor',
                    'default'     => '',
                    'extra_class' => 'wpbs_bullets_bg_color',
                ),
                'bullets_hover_bg_color' => array(
                    'title'       => esc_html__( 'Bullet Hover Background Color', 'blocksy-slider' ),
                    'field_type'  => 'wpbscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpbs_bullets_hover_bg_color',
                ),
                'bullets_border_color' => array(
                    'title'       => esc_html__( 'Bullet Border Color', 'blocksy-slider' ),
                    'field_type'  => 'wpbscolor',
                    'default'     => '#ffffff',
                    'extra_class' => 'wpbs_bullets_border_color',
                ),
                'control_progress_bar'  => array(
                    'title'         => esc_html__( 'Progress Bar', 'blocksy-slider' ),
                    'field_type'    => 'wpbsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Show a progress bar while autoplay is running.', 'blocksy-slider' ),
                    'data_show'     => '.wpbs_progress_bar',
                    'extra_class'   => 'wpbs_autoplay_progress',
                ),
                'progress_bar_position' => array(
                    'title'         => esc_html__( 'Progress Bar Position', 'blocksy-slider' ),
                    'field_type'    => 'wpbsselect',
                    'options'       => array(
                        'bottom'    => esc_html__( 'Bottom (Use in Horizontal)', 'blocksy-slider' ),
                        'top'       => esc_html__( 'Top (Use in Horizontal)', 'blocksy-slider' ),
                        'left'      => esc_html__( 'Left (Use in Vertical)', 'blocksy-slider' ),
                        'right'     => esc_html__( 'Right (Use in Vertical)', 'blocksy-slider' ),
                    ),
                    'default'       => 'bottom',
                    'desc'          => esc_html__( 'Choose where to position the autoplay progress bar.', 'blocksy-slider' ),
                    'extra_class'   => 'wpbs_progress_bar',
                ),
                'progress_bar_color' => array(
                    'title'          => esc_html__( 'Progress bar color', 'blocksy-slider' ),
                    'field_type'     => 'wpbscolor',
                    'default'        => '#ff0000',
                    'extra_class'    => 'wpbs_progress_bar',
                ),
                'fraction_navigation_style' => array(
                    'title'       => esc_html__( 'Fraction style', 'blocksy-slider' ),
                    'field_type'  => 'wpbsradio',
                    'options'     => array(
                        'style1'  => 'bullets-fraction.png',
                    ),
                    'default'     => 'style1',
                    'extra_class' => 'wpbs_fraction_style',
                ),
                'fraction_color' => array(
                    'title'         => esc_html__( 'Fraction color', 'blocksy-slider' ),
                    'field_type'    => 'wpbscolor',
                    'default'       => '#ff0000',
                    'extra_class'   => 'wpbs_fraction_style',
                ),  
                'fraction_font_size' => array(
                    'title'       => esc_html__( 'Fraction Font Size', 'blocksy-slider' ),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 20,
                    'extra_class' => 'wpbs_fraction_style',
                    'desc'        => esc_html__( 'Set the font size for the fraction pagination.', 'blocksy-slider' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                ),
                'fraction_position' => array(
                    'title'       => esc_html__( 'Fraction Position', 'blocksy-slider' ),
                    'field_type'  => 'wpbsselect',
                    'default'     => 'center',
                    'options'     => array(
                        'center'       => esc_html__( 'Center', 'blocksy-slider' ),
                        'top-left'     => esc_html__( 'Top Left', 'blocksy-slider' ),
                        'top-right'    => esc_html__( 'Top Right', 'blocksy-slider' ),
                        'bottom-left'  => esc_html__( 'Bottom Left', 'blocksy-slider' ),
                        'bottom-right' => esc_html__( 'Bottom Right', 'blocksy-slider' ),
                    ),
                    'desc'         => esc_html__( 'Choose position for fraction in pagination.', 'blocksy-slider' ),
                    'extra_class'  => 'wpbs_fraction_style',
                ),
                'custom_navigation_style' => array(
                    'title'       => esc_html__( 'Custom style', 'blocksy-slider' ),
                    'field_type'  => 'wpbsradio',
                    'options'     => array(
                        'style1'  => 'custom-style1.jpg',
                    ),
                    'default'     => 'style1',
                    'extra_class' => 'wpbs_custom_style',
                ),
                'custom_text_color' => array(
                    'title'         => esc_html__( 'Custom Color', 'blocksy-slider' ),
                    'field_type'    => 'wpbscolor',
                    'default'       => '#ffffff',
                    'extra_class'   => 'wpbs_custom_style',
                    'desc'          => esc_html__( 'Set the text color for numbered pagination bullets.', 'blocksy-slider' ),
                ),
                'custom_background_color' => array(
                    'title'         => esc_html__( 'Custom Background Color', 'blocksy-slider' ),
                    'field_type'    => 'wpbscolor',
                    'default'       => '#007aff',
                    'extra_class'   => 'wpbs_custom_style',
                    'desc'          => esc_html__( 'Set the background color for active pagination bullets.', 'blocksy-slider' ),
                ),
                'custom_active_text_color' => array(
                    'title'         => esc_html__( 'Custom active Text Color', 'blocksy-slider' ),
                    'field_type'    => 'wpbscolor',
                    'default'       => '#ffffff',
                    'extra_class'   => 'wpbs_custom_style',
                    'desc'          => esc_html__( 'Set the text color for inactive numbered pagination bullets.', 'blocksy-slider' ),
                ),
                'custom_active_background_color' => array(
                    'title'         => esc_html__( 'Custom active Background Color', 'blocksy-slider' ),
                    'field_type'    => 'wpbscolor',
                    'default'       => '#0a0607',
                    'extra_class'   => 'wpbs_custom_style',
                    'desc'          => esc_html__( 'Set the background color for inactive pagination bullets.', 'blocksy-slider' ),
                ),

            );

            return apply_filters( 'wpbs_pagination_fields', $fields );
        }

        /**
         * Responsive field
         *
         * @return array
         */
        public static function responsive_field(){

            $fields = array(

                'control_enable_responsive'   => array(
                    'title'         => esc_html__( 'Enable Responsive', 'blocksy-slider' ),
                    'field_type'    => 'wpbsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Enable responsive layout for different screen sizes (mobile, tablet, desktop).', 'blocksy-slider' ),
                    'data_show'     => '.wpbs_responsive_field',
                ),
                'items_in_desktop'  => array(
                    'title'         => esc_html__( 'Items in Desktop', 'blocksy-slider' ),
                    'field_type'    => 'wpbsnumber',
                    'default'       => 4,
                    'extra_class'   => 'wpbs_responsive_field',
                ),
                'items_in_tablet'   => array(
                    'title'         => esc_html__( 'Items in Tablet', 'blocksy-slider' ),
                    'field_type'    => 'wpbsnumber',
                    'default'       => 2,
                    'extra_class'   => 'wpbs_responsive_field',
                ),
                'items_in_mobile'   => array(
                    'title'         => esc_html__( 'Items in Mobile', 'blocksy-slider' ),
                    'field_type'    => 'wpbsnumber',
                    'default'       => 1,
                    'extra_class'   => 'wpbs_responsive_field',
                ),
                'slide_control_view_auto' => array(
                    'title'       =>  esc_html__( 'Slides View Auto', 'blocksy-slider' ),
                    'field_type'  =>  'wpbsswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable slide show per view auto for the slider.', 'blocksy-slider' ),
                    'data_show'   => '.wpbs_auto_slide_width_fields',
                ),
                'auto_slide_width_default' => array(
                    'title'         => esc_html__( 'Default Slide Width', 'blocksy-slider' ),
                    'field_type'    => 'wpbsnumber',
                    'default'       => 30,
                    'desc'          => esc_html__( 'Default width for slides.', 'blocksy-slider' ),
                    'extra_class'   => 'wpbs_auto_slide_width_fields',
                    'unit'          => array(
                        'percent'   => esc_html__( '%', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                ),
                'auto_slide_width_2n' => array(
                    'title'         => esc_html__( '2n Slide Width', 'blocksy-slider' ),
                    'field_type'    => 'wpbsnumber',
                    'default'       => 40,
                    'desc'          => esc_html__( 'Width for every 2nd slide.', 'blocksy-slider' ),
                    'extra_class'   => 'wpbs_auto_slide_width_fields',
                    'unit'          => array(
                        'percent'   => esc_html__( '%', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                ),
                'auto_slide_width_3n' => array(
                    'title'         => esc_html__( '3n Slide Width', 'blocksy-slider' ),
                    'field_type'    => 'wpbsnumber',
                    'default'       => 30,
                    'desc'          => esc_html__( 'Width for every 3rd slide.', 'blocksy-slider' ),
                    'extra_class'   => 'wpbs_auto_slide_width_fields',
                    'unit'          => array(
                        'percent'   => esc_html__( '%', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                ),
                'slide_control_center' => array(
                    'title'       =>  esc_html__( 'Center Slides', 'blocksy-slider' ),
                    'field_type'  =>  'wpbsswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable slide centered for the slider.', 'blocksy-slider' ),
                ),

            );

            return apply_filters( 'wpbs_responsive_fields', $fields );
        }

        /**
         * Thumbnail gallery field
         *
         * @return array
         */
        public static function thumbnail_gallery_field(){

            $fields = array(

                'thumb_gallery' => array(
                    'title'       => esc_html__( 'Show Thumbnail Gallery', 'blocksy-slider' ),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable to display a thumbnail gallery below the main slider.', 'blocksy-slider' ),
                    'data_show'   => '.wpbs_thumb_gallery',
                ),
                'thumb_gallery_loop' => array(   
                    'title'       => esc_html__( 'Thumbnail Gallery Loop', 'blocksy-slider' ),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'yes',
                    'desc'        => esc_html__( 'Enable continuous loop mode for the thumbs gallery.', 'blocksy-slider' ),
                    'extra_class' => 'wpbs_thumb_gallery',
                ),
                'thumb_gallery_space' => array(
                    'title'       => esc_html__( 'Thumbnail Gallery Space', 'blocksy-slider' ),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 10,
                    'unit'        => array(
                        'px'   => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'desc'          => esc_html__( 'Space between each thumbs gallery.', 'blocksy-slider' ),
                    'extra_class'   => 'wpbs_thumb_gallery',
                ),
                'thumb_gallery_width' => array(
                    'title'       => esc_html__( 'Thumbnail Width', 'blocksy-slider' ),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 80,
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'desc'          => esc_html__( 'Set width of thumbnail images.', 'blocksy-slider' ),
                    'extra_class'   => 'wpbs_thumb_gallery',
                ),
                'thumb_gallery_height' => array(
                    'title'       => esc_html__( 'Thumbnail Height', 'blocksy-slider' ),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 80,
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'desc'          => esc_html__( 'Set height of thumbnail images.', 'blocksy-slider' ),
                    'extra_class'   => 'wpbs_thumb_gallery',
                ),
                'thumb_gallery_border_radius' => array(
                    'title'       => esc_html__( 'Thumbnail Border Radius', 'blocksy-slider' ),
                    'field_type'  => 'wpbsrange',
                    'default'     => 0,
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'desc'          => esc_html__( 'Set border radius of thumbnail images.', 'blocksy-slider' ),
                    'extra_class'   => 'wpbs_thumb_gallery',
                ),

            );

            return apply_filters( 'wpbs_thumbnail_gallery_fields', $fields );
        }

        /**
         * Autoplay field
         *
         * @return array
         */
        public static function autoplay_field(){

            $fields = array(

                'control_autoplay'  => array(
                    'title'         => esc_html__( 'Autoplay', 'blocksy-slider' ),
                    'field_type'    => 'wpbsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Enable or disable autoplay functionality.', 'blocksy-slider' ),
                    'data_show'     => '.wpbs_autoplay_timing',
                ),
                'autoplay_timing'   => array(
                    'title'         => esc_html__( 'Autoplay time', 'blocksy-slider' ),
                    'field_type'    => 'wpbsnumber',
                    'default'       => 3000,
                    'desc'          => esc_html__( 'Enter autoplay speed in milliseconds (e.g., 3000 for 3 seconds).', 'blocksy-slider' ),
                    'unit'          => array(
                        'seconds'   => esc_html__( 'Second\'s', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'seconds',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'wpbs_autoplay_timing',
                ),
                'control_autoplay_timeleft' => array(
                    'title'       => esc_html__( 'Circular Autoplay Progress', 'blocksy-slider' ),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Show circular progress countdown during autoplay.', 'blocksy-slider' ),
                    'data_show'   => '.wpbs_autoplay_time', 
                ),
                'control_autoplay_timeleft_color' => array(
                    'title'       => esc_html__( 'Time Color', 'blocksy-slider' ),
                    'field_type'  => 'wpbscolor',
                    'default'     => '#007aff',
                    'desc'        => esc_html__( 'Set color for circular autoplay progress.', 'blocksy-slider' ),
                    'extra_class' => 'wpbs_autoplay_time',
                ),
                'control_autoplay_timeleft_position' => array(
                    'title'       => esc_html__( 'Autoplay Time Position', 'blocksy-slider' ),
                    'field_type'  => 'wpbsselect',
                    'default'     => 'bottom-right',
                    'options'     => array(
                        'top-left'     => esc_html__( 'Top Left', 'blocksy-slider' ),
                        'top-right'    => esc_html__( 'Top Right', 'blocksy-slider' ),
                        'bottom-left'  => esc_html__( 'Bottom Left', 'blocksy-slider' ),
                        'bottom-right' => esc_html__( 'Bottom Right', 'blocksy-slider' ),
                    ),
                    'desc'          => esc_html__( 'Choose position for autoplay time circle.', 'blocksy-slider' ),
                    'extra_class'   => 'wpbs_autoplay_time',
                ),
                'control_autoplay_timeleft_font_size' => array(
                    'title'       => esc_html__( 'Time Font Size', 'blocksy-slider' ),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 20,
                    'desc'        => esc_html__( 'Font size for the autoplay time number.', 'blocksy-slider' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                    'extra_class'   => 'wpbs_autoplay_time',
                ),

            );

            return apply_filters( 'wpbs_autoplay_fields', $fields );    
        }

        /**
         * Scrollbar field
         *
         * @return array
         */
        public static function scrollbar_field(){

            $fields = array(

                'control_scrollbar' => array(
                    'title'       =>  esc_html__( 'Scrollbar Control', 'blocksy-slider' ),
                    'field_type'  =>  'wpbsswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable scrollbar navigation for the slider.', 'blocksy-slider' ),
                    'data_show'   => '.wpbs_scrollbar_wrapper',
                ),
                'scrollbar_position' => array(
                    'title'       => esc_html__('Scrollbar Position', 'blocksy-slider'),
                    'field_type'  => 'wpbsselect',
                    'default'     => 'bottom',
                    'desc'        => esc_html__('Choose scrollbar position.', 'blocksy-slider'),
                    'options'     => array(
                        'bottom' => esc_html__('Bottom (Use in Horizontal)', 'blocksy-slider'),
                        'top'    => esc_html__('Top (Use in Horizontal)', 'blocksy-slider'),
                        'left'   => esc_html__('Left ( Use in Vertical)', 'blocksy-slider'),
                        'right'  => esc_html__('Right ( Use in Vertical)', 'blocksy-slider'),
                    ),      
                    'extra_class' => 'wpbs_scrollbar_wrapper',
                ),
                'scrollbar_color' => array(
                    'title'       =>  esc_html__( 'Scrollbar Color', 'blocksy-slider' ),
                    'field_type'  =>  'wpbscolor',
                    'default'     =>  '#999999',
                    'extra_class' =>  'wpbs_scrollbar_wrapper',
                ), 

            );
            
            return apply_filters( 'wpbs_scrollbar_fields', $fields );
        }

        /**
         * Other options field
         *
         * @return array
         */
        public static function other_options_field(){

            $fields = array(

                'image_unit' => array(
                    'title'       => esc_html__( 'Set Width & Height', 'blocksy-slider' ),
                    'field_type'  => 'wpbsselect',
                    'options'     => array(
                        'px'  => 'px',
                        'em'  => 'em',
                        'rem' => 'rem',
                        'vh'  => 'vh',
                    ),
                    'default'    => 'px',
                    'desc'       => esc_html__( 'Unit to use for image width and height. Applied to each slide image.', 'blocksy-slider' ),
                ),
                'width_image' => array(
                    'title'       => esc_html__( 'Width of Image', 'blocksy-slider' ),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 1000,
                    'desc'        =>  esc_html__( 'Specify the width of each slide image.', 'blocksy-slider' ),
                ),
                'height_image'  => array(
                    'title'       => esc_html__( 'Height of Image', 'blocksy-slider' ),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 500,
                    'desc'        =>  esc_html__( 'Specify the height of each slide image.', 'blocksy-slider' ),
                ),
                'border_radius_image' => array(
                    'title'       => esc_html__( 'Border Radius of Image', 'blocksy-slider' ),
                    'field_type'  => 'wpbsrange',
                    'default'     => 0,
                    'desc'        => esc_html__( 'Specify the border radius of each slide image.', 'blocksy-slider' ),
                    'unit'          => array(
                        'percent'   => esc_html__( '%', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'percent',
                    'unit_disabled' => 'yes',
                ),
                'control_lazyload_images' => array(
                    'title'         => esc_html__( 'Lazy load images', 'blocksy-slider' ),  
                    'field_type'    => 'wpbsswitch',
                    'default'       => 'yes',
                    'desc'          => esc_html__( 'Load images only when they are needed.', 'blocksy-slider' ),
                ),
                'control_grab_cursor'   => array(
                    'title'         => esc_html__( 'Grab cursor', 'blocksy-slider' ),
                    'field_type'    => 'wpbsswitch',
                    'default'       => 'no',
                    'desc'          => esc_html__( 'Change the mouse cursor to a hand icon when hovering over the slider.', 'blocksy-slider' ),
                ),
                'control_rewind' => array(
                    'title'       => esc_html__( 'Rewind', 'blocksy-slider' ),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable rewind functionality for the slider.', 'blocksy-slider' ),
                ),
                'control_slide_space' => array(
                    'title'       => esc_html__( 'Slides Space', 'blocksy-slider' ),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 10,
                    'desc'        => esc_html__( 'Space between each slide.', 'blocksy-slider' ),
                    'unit'        => array(
                        'px'      => esc_html__( 'PX', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'px',
                    'unit_disabled' => 'yes',
                ),

                'control_slider_vertical' => array(
                    'title'       =>  esc_html__( 'Vertical Slider Control', 'blocksy-slider' ),
                    'field_type'  =>  'wpbsswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable vertical direction for the slider.', 'blocksy-slider' ),
                ),
    
                'control_loop_slider' => array(
                    'title'       => esc_html__( 'Loop Slides', 'blocksy-slider' ),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable continuous loop mode for the slider.', 'blocksy-slider' ),
                ),
    
                'control_slide_speed' => array(
                    'title'       => esc_html__( 'Slide Speed', 'blocksy-slider' ),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 400,
                    'desc'        => esc_html__( 'Set the speed of slide transition in milliseconds (e.g., 400 = 0.4 second).', 'blocksy-slider' ),
                    'unit'        => array(
                        'seconds' => esc_html__( 'Second\'s', 'blocksy-slider' ),
                    ),
                    'unit_selected' => 'seconds',
                    'unit_disabled' => 'yes',
                ),
    
                'zoom_images' => array(
                    'title'       => esc_html__( 'Zoom Images', 'blocksy-slider' ),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable a zoom images for slider.', 'blocksy-slider' ),
                ),
    
                'control_keyboard' => array(
                    'title'       =>  esc_html__( 'Keyboard Control', 'blocksy-slider' ),
                    'field_type'  =>  'wpbsswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable keyboard navigation for the slider using arrow keys.', 'blocksy-slider' ),
                ),
    
                'control_mousewheel' => array(
                    'title'       =>  esc_html__( 'Mousewheel Control', 'blocksy-slider' ),
                    'field_type'  =>  'wpbsswitch',
                    'default'     =>  'no',
                    'desc'        =>  esc_html__( 'Enable mouse wheel navigation for the slider.', 'blocksy-slider' ),
                ),
    
                'control_rtl_slider' => array(
                    'title'       => esc_html__( 'Enable RTL', 'blocksy-slider' ),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable Right-to-Left sliding for RTL languages.', 'blocksy-slider' ),
                ),
    
                'enable_grid_layout' => array(
                    'title'       => esc_html__('Enable Grid Layout', 'blocksy-slider'),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__('Enable Swiper grid layout.', 'blocksy-slider'),
                    'data_show'   => '.wpbs_grid_layout',
                ),
    
                'grid_layout_axis' => array(
                    'title'       => esc_html__('Grid Layout Type', 'blocksy-slider'),
                    'field_type'  => 'wpbsselect',
                    'default'     => 'row',
                    'options'     => array(
                        'row'     => esc_html__('Row', 'blocksy-slider'),
                        'column'  => esc_html__('Column', 'blocksy-slider'),
                    ),
                    'desc'         => esc_html__('Choose grid layout: Row or Column.', 'blocksy-slider'),
                    'extra_class'  => 'wpbs_grid_layout',
                ),
    
                'grid_count' => array(
                    'title'       => esc_html__('Grid Count', 'blocksy-slider'),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 2,
                    'desc'        => esc_html__('Set the number of rows or columns based on your layout.', 'blocksy-slider'),
                    'extra_class' => 'wpbs_grid_layout',
                ),
    
                'enable_slides_group' => array(
                    'title'       => esc_html__( 'Enable Slides Group', 'blocksy-slider' ),
                    'field_type'  => 'wpbsswitch',
                    'default'     => 'no',
                    'desc'        => esc_html__( 'Enable to control grouping of slides.', 'blocksy-slider' ),
                    'data_show'   => '.wpbs_slides_group',
                ),
    
                'slides_per_group' => array(
                    'title'       => esc_html__( 'Slides Per Group', 'blocksy-slider' ),
                    'field_type'  => 'wpbsnumber',
                    'default'     => 1,
                    'desc'        => esc_html__( 'Skip the number of slides from the beginning before grouping starts. Useful when first slide is featured.', 'blocksy-slider' ),
                    'extra_class' => 'wpbs_slides_group',
                ),

            );

            return apply_filters( 'wpbs_other_options_fields', $fields );
        }

        /**
         * Custom CSS field
         *
         * @return array
         */
        public static function custom_css_field(){

            $fields = array(

                'custom_class_name' => array(
                    'title'       => esc_html__( 'Custom Class Name', 'blocksy-slider' ),
                    'field_type'  => 'wpbstext',
                    'default'     => '',
                    'placeholder' => esc_html__( 'my-custom-slider', 'blocksy-slider' ),
                    'desc'        => esc_html__( 'Enter a custom CSS class name (without dot). This class will be added to the slider wrapper. Example: my-custom-slider', 'blocksy-slider' ),
                ),

                'custom_css' => array(
                    'title'       => esc_html__( 'Custom CSS', 'blocksy-slider' ),
                    'field_type'  => 'wpswpbstextarea',
                    'default'     => '',
                    'rows'        => 25,
                    'cols'        => 50,
                    'placeholder' => esc_html__( '/* Add your custom CSS here */', 'blocksy-slider' ),
                    'desc'        => esc_html__( 'Add your custom CSS here. This CSS will apply globally to the slider and its elements.', 'blocksy-slider' ),
                ),

            );

            return apply_filters( 'wpbs_custom_css_fields', $fields );
        }
    }

endif;
