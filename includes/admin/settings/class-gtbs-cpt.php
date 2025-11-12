<?php
/**
 * Manage slider post type
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'GTBS_CPT' ) ) :

    class GTBS_CPT {

        public function __construct() {
            $this->event_handler();
        }

        public function event_handler() {
            add_action( 'init', [ __CLASS__, 'gtbs_register_post_type' ], 10 );
            add_action( 'init', [ __CLASS__, 'gtbs_register_slide_post_type' ], 10 );
            add_action( 'add_meta_boxes', [ $this, 'gtbs_add_meta_boxes' ] );

            add_filter( 'manage_gtbs_slider_posts_columns', [ $this, 'add_columns' ] );
            add_action( 'manage_gtbs_slider_posts_custom_column', [ $this, 'render_shortcode_column' ], 10, 2 );

            add_action( 'save_post', [ $this, 'save_slideshow_metadata' ] );
            add_action( 'save_post', [ $this, 'save_slide_images_to_parent' ], 10, 2 );

        }

        public function gtbs_add_meta_boxes() {

            add_meta_box(
                'gtbs_slider_shortcode',
                esc_html__( 'GTBS Slider Shortcode', 'gutenberg-slider' ),
                [ $this, 'render_slider_shortcode_metabox' ],
                'gtbs_slider',
                'side',
                'default'
            );

            add_meta_box(
				'gtbs_slider_background_settings',
				esc_html__( 'Background Settings', 'gutenberg-slider' ),
				array( $this, 'render_gtbs_background_settings' ),
				'gtbs_slider',
				'side',
				'low'
			);

            add_meta_box(
                'gtbs_background_settings',
                esc_html__( 'Background settings', 'gutenberg-slider' ),
                array( $this, 'render_gtbs_background_settings' ),
                'gtbs_slide',
                'side',
                'default'
            );

            add_meta_box(
                'gtbs_parent_slider',
                esc_html__( 'Parent slider', 'gutenberg-slider' ),
                array( $this, 'render_gtbs_parent_slider' ),
                'gtbs_slide',
                'side',
                'default'
            );
        }

        public function render_slider_shortcode_metabox( $post ) {
            printf( 
                '<p>%s</p><hr><code>[gtbs_slider id="%d"]</code>', 
                esc_html__( 'Use the shortcode below to display the slider.', 'gutenberg-slider' ), 
                esc_attr( $post->ID ) 
            );
        }

        public function render_gtbs_background_settings( $post ) {

            $background_size     = get_post_meta( $post->ID, 'gtbs_background_size', true );
            $background_position = get_post_meta( $post->ID, 'gtbs_background_position', true );
            $background_repeat   = get_post_meta( $post->ID, 'gtbs_background_repeat', true );
            $background_color    = get_post_meta( $post->ID, 'gtbs_background_color', true );

            gtbs_get_template( 
                'metabox/bg-settings.php', 
                array(
                    'background_size'     => $background_size,
                    'background_position' => $background_position,
                    'background_repeat'   => $background_repeat,
                    'background_color'   => $background_color
                )
            );
        }

        public function render_gtbs_parent_slider( $post ) {

            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Reading GET parameter for display purposes only, not processing form data.
            $parent_slider = isset( $_GET['parent_slider'] ) ? absint( wp_unslash( $_GET['parent_slider'] ) ) : false;

            gtbs_get_template( 
                'metabox/parent-slider.php', 
                array(
                    'parent_slider' => $parent_slider,
                    'post'          => $post
                )
            );
        }

        public function add_columns( $columns ) {
            $new_columns = [];

            foreach ( $columns as $key => $value ) :
                $new_columns[ $key ] = $value;

                if ( $key === 'title' ) :
                    $new_columns['gtbs_shortcode'] = esc_html__( 'Shortcode', 'gutenberg-slider' );
                endif;
            endforeach;

            return $new_columns;
        }

        public function render_shortcode_column( $column, $post_id ) {
            if ( $column === 'gtbs_shortcode' ) :
                printf( '<code>[gtbs_slider id="%d"]</code>', 
                esc_attr( $post_id ) 
            );
            endif;
        }

        public static function gtbs_register_post_type() {
            $labels = array(
				'name'               => esc_html__( 'GTB Sliders', 'gutenberg-slider' ),
				'singular_name'      => esc_html__( 'GTB Slider', 'gutenberg-slider' ),
				'menu_name'          => esc_html__( 'GTB Sliders', 'gutenberg-slider' ),
				'name_admin_bar'     => esc_html__( 'GTB Slider', 'gutenberg-slider' ),
				'add_new_item'       => esc_html__( 'Add New Slider', 'gutenberg-slider' ),
				'new_item'           => esc_html__( 'New Slider', 'gutenberg-slider' ),
				'edit_item'          => esc_html__( 'Edit Slider', 'gutenberg-slider' ),
				'view_item'          => esc_html__( 'View Slider', 'gutenberg-slider' ),
				'all_items'          => esc_html__( 'GTB Sliders', 'gutenberg-slider' ),
				'search_items'       => esc_html__( 'Search Sliders', 'gutenberg-slider' ),
				'parent_item_colon'  => esc_html__( 'Parent Sliders:', 'gutenberg-slider' ),
				'not_found'          => esc_html__( 'No sliders found.', 'gutenberg-slider' ),
				'not_found_in_trash' => esc_html__( 'No sliders found in Trash.', 'gutenberg-slider' ),
                'featured_image'        => esc_html__( 'Slider background image', 'gutenberg-slider' ),
                'set_featured_image'    => esc_html__( 'Set background image', 'gutenberg-slider' ),
                'remove_featured_image' => esc_html__( 'Remove background image', 'gutenberg-slider' ),
                'use_featured_image'    => esc_html__( 'Use as background image', 'gutenberg-slider' ),
            );

            $args = array(
				'label'               => esc_html__( 'Sliders', 'gutenberg-slider' ),
                'labels'              => $labels,
                'supports'            => array( 'title' , 'thumbnail' ),
                'hierarchical'        => true,
                'public'              => true,
                'show_ui'             => true,
                'show_in_rest'        => true,
                'show_in_menu'        => true,
                'menu_position'       => 10,
                'menu_icon'           => 'dashicons-images-alt2',
                'show_in_admin_bar'   => false,
                'show_in_nav_menus'   => false,
                'can_export'          => true,
                'has_archive'         => false,
                'exclude_from_search' => true,
                'publicly_queryable'  => false,
                'capability_type'     => 'page',
            );

            register_post_type( 'gtbs_slider', $args );
        }

        public static function gtbs_register_slide_post_type() {

            $labels = array(
                'name'               => esc_html__( 'GTB Slides', 'gutenberg-slider' ),
                'singular_name'      => esc_html__( 'GTB Slide', 'gutenberg-slider' ),
                'menu_name'          => esc_html__( 'GTB Slides', 'gutenberg-slider' ),
                'name_admin_bar'     => esc_html__( 'GTB Slide', 'gutenberg-slider' ),
                'add_new_item'       => esc_html__( 'Add New Slide', 'gutenberg-slider' ),
                'new_item'           => esc_html__( 'New Slide', 'gutenberg-slider' ),
                'edit_item'          => esc_html__( 'Edit Slide', 'gutenberg-slider' ),
                'view_item'          => esc_html__( 'View Slide', 'gutenberg-slider' ),
                'all_items'          => esc_html__( 'GTBSlides', 'gutenberg-slider' ),
                'search_items'       => esc_html__( 'Search Slides', 'gutenberg-slider' ),
                'parent_item_colon'  => esc_html__( 'Parent Slider:', 'gutenberg-slider' ),
                'not_found'          => esc_html__( 'No slides found.', 'gutenberg-slider' ),
                'not_found_in_trash' => esc_html__( 'No slides found in Trash.', 'gutenberg-slider' ),
                'featured_image'        => esc_html__( 'Slider background image', 'gutenberg-slider' ),
                'set_featured_image'    => esc_html__( 'Set background image', 'gutenberg-slider' ),
                'remove_featured_image' => esc_html__( 'Remove background image', 'gutenberg-slider' ),
                'use_featured_image'    => esc_html__( 'Use as background image', 'gutenberg-slider' ),
            );

            $args   = array(
                'label'               => esc_html__( 'Slide', 'gutenberg-slider' ),
                'description'         => esc_html__( 'Slide post type', 'gutenberg-slider' ),
                'labels'              => $labels,
                'show_in_rest'        => true,
                'supports'            => array( 'editor', 'thumbnail' ),
                'hierarchical'        => false,
                'public'              => true,
                'show_ui'             => true,
                'show_in_rest'        => true,
                'show_in_menu'        => false,
                'menu_position'       => 5,
                'menu_icon'           => 'dashicons-slides',
                'show_in_admin_bar'   => false,
                'show_in_nav_menus'   => false,
                'can_export'          => true,
                'has_archive'         => false,
                'exclude_from_search' => true,
                'publicly_queryable'  => false,
                'capability_type'     => 'page',
            );

            register_post_type( 'gtbs_slide', $args );
        }

        public function save_slideshow_metadata( $gtbs_slideshow_ID ) {

            if ( ! isset( $_POST['gtbs_slideshow_metabox_nonce'] ) || ! 
                wp_verify_nonce( 
                    sanitize_text_field( wp_unslash( $_POST['gtbs_slideshow_metabox_nonce'] ) ),
                    'gtbs_slideshow_metabox_data' 
                )
            ) :
                return;
            endif;

            if (get_post_type($gtbs_slideshow_ID) !== 'gtbs_slider') return $gtbs_slideshow_ID;

            $submitted = isset($_POST['gtbs_slide_ids']) ? array_map('absint', (array) $_POST['gtbs_slide_ids']) : [];
            $existing  = get_children(
                array(
                    'post_parent' => $gtbs_slideshow_ID, 
                    'post_type'   => 'gtbs_slide', 
                    'fields'      => 'ids'
                )
            );

            $deleted   = array_diff((array) $existing, $submitted);

            if ($deleted) :
                $map = json_decode(get_post_meta($gtbs_slideshow_ID, 'gtbs_slide_images', true), true) ?: [];

                foreach ($deleted as $slide_id) :
                    unset($map[$slide_id]);
                    wp_delete_post($slide_id, true);
                endforeach; 

                update_post_meta($gtbs_slideshow_ID, 'gtbs_slide_images', wp_json_encode($map));
            endif;

            if ( isset( $_POST['gtbs_slider_image_ids'] ) && is_array( $_POST['gtbs_slider_image_ids'] ) ) :
                $image_ids = array_map( 'absint', wp_unslash( $_POST['gtbs_slider_image_ids'] ) ); 
                update_post_meta( $gtbs_slideshow_ID, 'gtbs_slider_image_ids', wp_json_encode( $image_ids ) );
            endif;

            if ( isset( $_POST['gtbs_slider_option'] ) && is_array( $_POST['gtbs_slider_option'] ) ) :
                $slider_options = array_map( 'sanitize_text_field', wp_unslash( $_POST['gtbs_slider_option'] ) );
                update_post_meta( $gtbs_slideshow_ID, 'gtbs_slider_option', $slider_options );
            endif;

            if ( isset( $_POST['gtbs_background_size'] ) ) :
                $background_size = sanitize_text_field( wp_unslash( $_POST['gtbs_background_size'] ) );
                update_post_meta( $gtbs_slideshow_ID, 'gtbs_background_size', $background_size );
            endif;

            if ( isset( $_POST['gtbs_background_position'] ) ) :
                $background_position = sanitize_text_field( wp_unslash( $_POST['gtbs_background_position'] ) );
                update_post_meta( $gtbs_slideshow_ID, 'gtbs_background_position', $background_position );
            endif;

            if ( isset( $_POST['gtbs_background_repeat'] ) ) :
                $background_repeat = sanitize_text_field( wp_unslash( $_POST['gtbs_background_repeat'] ) );
                update_post_meta( $gtbs_slideshow_ID, 'gtbs_background_repeat', $background_repeat );
            endif;

            if ( isset( $_POST['gtbs_background_color'] ) ) :
                $background_color = sanitize_text_field( wp_unslash( $_POST['gtbs_background_color'] ) );
                update_post_meta( $gtbs_slideshow_ID, 'gtbs_background_color', $background_color );
            endif;

            return $gtbs_slideshow_ID;
        }

        /**
         * Save slide images to parent slider
         */
        public function save_slide_images_to_parent( $post_id, $post ) {

            // $parent = wp_get_post_parent_id($post_id) ?: absint($_GET['parent_slider'] ?? 0);
            
            // if ($parent && !wp_get_post_parent_id($post_id)) :
            //     wp_update_post(array(
            //         'ID' => $post_id, 
            //         'post_parent' => $parent
            //         )
            //     );
            // endif;

            // if (!$parent) return;

			// $image_ids = array();
            // if ($thumb = get_post_thumbnail_id($post_id)) $image_ids[] = $thumb;

            if ( isset( $_POST['gtbs_background_size'] ) ) :
                $background_size = sanitize_text_field( wp_unslash( $_POST['gtbs_background_size'] ) );
                update_post_meta( $post_id, 'gtbs_background_size', $background_size );
            endif;

            if ( isset( $_POST['gtbs_background_position'] ) ) :
                $background_position = sanitize_text_field( wp_unslash( $_POST['gtbs_background_position'] ) );
                update_post_meta( $post_id, 'gtbs_background_position', $background_position );
            endif;

            if ( isset( $_POST['gtbs_background_repeat'] ) ) :
                $background_repeat = sanitize_text_field( wp_unslash( $_POST['gtbs_background_repeat'] ) );
                update_post_meta( $post_id, 'gtbs_background_repeat', $background_repeat );
            endif;

            if ( isset( $_POST['gtbs_background_color'] ) ) :
                $background_color = sanitize_text_field( wp_unslash( $_POST['gtbs_background_color'] ) );
                update_post_meta( $post_id, 'gtbs_background_color', $background_color );
            endif;

        }

    }

    new GTBS_CPT();

endif;
