<?php
/**
 * Manage slider post type
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPBS_CPT' ) ) :
    /**
     * Class WPBS_CPT
     *
     */
    class WPBS_CPT {

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
            add_action( 'init', [ __CLASS__, 'wpbs_register_post_type' ], 10 );
            add_action( 'init', [ __CLASS__, 'wpbs_register_slide_post_type' ], 10 );
            add_action( 'add_meta_boxes', [ $this, 'wpbs_add_meta_boxes' ] );

            add_filter( 'manage_wpbs_slider_posts_columns', [ $this, 'add_columns' ] );
            add_action( 'manage_wpbs_slider_posts_custom_column', [ $this, 'render_shortcode_column' ], 10, 2 );

            add_action( 'save_post', [ $this, 'save_slideshow_metadata' ] );
            add_action( 'save_post', [ $this, 'save_slide_images_to_parent' ], 10, 2 );

        }

        /**
         * Add meta boxes for the slider.
         */
        public function wpbs_add_meta_boxes() {

            add_meta_box(
                'wpbs_slider_shortcode',
                esc_html__( 'WPBS Slider Shortcode', 'blocksy-slider' ),
                [ $this, 'render_slider_shortcode_metabox' ],
                'wpbs_slider',
                'side',
                'default'
            );

            add_meta_box(
				'wpbs_slider_background_settings',
				esc_html__( 'Background Settings', 'blocksy-slider' ),
				array( $this, 'render_wpbs_background_settings' ),
				'wpbs_slider',
				'side',
				'low'
			);

            add_meta_box(
                'wpbs_background_settings',
                esc_html__( 'Background settings', 'blocksy-slider' ),
                array( $this, 'render_wpbs_background_settings' ),
                'wpbs_slide',
                'side',
                'default'
            );

            add_meta_box(
                'wpbs_parent_slider',
                esc_html__( 'Parent slider', 'blocksy-slider' ),
                array( $this, 'render_wpbs_parent_slider' ),
                'wpbs_slide',
                'side',
                'default'
            );
        }

        /**
         * Render the slider shortcode metabox.
         *
         */
        public function render_slider_shortcode_metabox( $post ) {
            printf( 
                '<p>%s</p><hr><code>[wpbs_slider id="%d"]</code>', 
                esc_html__( 'Use the shortcode below to display the slider.', 'blocksy-slider' ), 
                esc_attr( $post->ID ) 
            );
        }

        /**
         * Render the background settings metabox.
         *
         */
        public function render_wpbs_background_settings( $post ) {

            $background_size     = get_post_meta( $post->ID, 'wpbs_background_size', true );
            $background_position = get_post_meta( $post->ID, 'wpbs_background_position', true );
            $background_repeat   = get_post_meta( $post->ID, 'wpbs_background_repeat', true );
            $background_color    = get_post_meta( $post->ID, 'wpbs_background_color', true );

            wpbs_get_template( 
                'metabox/bg-settings.php', 
                array(
                    'background_size'     => $background_size,
                    'background_position' => $background_position,
                    'background_repeat'   => $background_repeat,
                    'background_color'    => $background_color
                )
            );
        }

        /**
         * Render the parent slider metabox.
         *
         */
        public function render_wpbs_parent_slider( $post ) {

            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Reading GET parameter for display purposes only, not processing form data.
            $parent_slider = isset( $_GET['parent_slider'] ) ? absint( wp_unslash( $_GET['parent_slider'] ) ) : false;

            wpbs_get_template( 
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
                    $new_columns['WPBS_Shortcode'] = esc_html__( 'Shortcode', 'blocksy-slider' );
                endif;
            endforeach;

            return $new_columns;
        }

        public function render_shortcode_column( $column, $post_id ) {
            if ( $column === 'WPBS_Shortcode' ) :
                printf( '<code>[wpbs_slider id="%d"]</code>', 
                esc_attr( $post_id ) 
            );
            endif;
        }

        /**
         * Register the slider post type.
         */
        public static function wpbs_register_post_type() {
            $labels = array(
				'name'               => esc_html__( 'Blocksy Slider', 'blocksy-slider' ),
				'singular_name'      => esc_html__( 'Blocksy Slider', 'blocksy-slider' ),
				'menu_name'          => esc_html__( 'Blocksy Slider', 'blocksy-slider' ),
				'name_admin_bar'     => esc_html__( 'Blocksy Slider', 'blocksy-slider' ),
				'add_new_item'       => esc_html__( 'Add New Slider', 'blocksy-slider' ),
				'new_item'           => esc_html__( 'New Slider', 'blocksy-slider' ),
				'edit_item'          => esc_html__( 'Edit Slider', 'blocksy-slider' ),
				'view_item'          => esc_html__( 'View Slider', 'blocksy-slider' ),
				'all_items'          => esc_html__( 'Blocksy Slider', 'blocksy-slider' ),
				'search_items'       => esc_html__( 'Search Slider', 'blocksy-slider' ),
				'parent_item_colon'  => esc_html__( 'Parent Slider:', 'blocksy-slider' ),
				'not_found'          => esc_html__( 'No sliders found.', 'blocksy-slider' ),
				'not_found_in_trash' => esc_html__( 'No sliders found in Trash.', 'blocksy-slider' ),
                'featured_image'        => esc_html__( 'Slider background image', 'blocksy-slider' ),
                'set_featured_image'    => esc_html__( 'Set background image', 'blocksy-slider' ),
                'remove_featured_image' => esc_html__( 'Remove background image', 'blocksy-slider' ),
                'use_featured_image'    => esc_html__( 'Use as background image', 'blocksy-slider' ),
            );

            $args = array(
				'label'               => esc_html__( 'Sliders', 'blocksy-slider' ),
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

            register_post_type( 'wpbs_slider', $args );
        }

        /**
         * Register the slide post type.
         */
        public static function wpbs_register_slide_post_type() {

            $labels = array(
                'name'               => esc_html__( 'Blocksy Slider', 'blocksy-slider' ),
                'singular_name'      => esc_html__( 'Blocksy Slider', 'blocksy-slider' ),
                'menu_name'          => esc_html__( 'Blocksy Slider', 'blocksy-slider' ),
                'name_admin_bar'     => esc_html__( 'Blocksy Slider', 'blocksy-slider' ),
                'add_new_item'       => esc_html__( 'Add New Slide', 'blocksy-slider' ),
                'new_item'           => esc_html__( 'New Slide', 'blocksy-slider' ),
                'edit_item'          => esc_html__( 'Edit Slide', 'blocksy-slider' ),
                'view_item'          => esc_html__( 'View Slide', 'blocksy-slider' ),
                'all_items'          => esc_html__( 'Blocksy Slider Slides', 'blocksy-slider' ),
                'search_items'       => esc_html__( 'Search Slides', 'blocksy-slider' ),
                'parent_item_colon'  => esc_html__( 'Parent Slider:', 'blocksy-slider' ),
                'not_found'          => esc_html__( 'No slides found.', 'blocksy-slider' ),
                'not_found_in_trash' => esc_html__( 'No slides found in Trash.', 'blocksy-slider' ),
                'featured_image'        => esc_html__( 'Slider background image', 'blocksy-slider' ),
                'set_featured_image'    => esc_html__( 'Set background image', 'blocksy-slider' ),
                'remove_featured_image' => esc_html__( 'Remove background image', 'blocksy-slider' ),
                'use_featured_image'    => esc_html__( 'Use as background image', 'blocksy-slider' ),
            );

            $args   = array(
                'label'               => esc_html__( 'Slide', 'blocksy-slider' ),
                'description'         => esc_html__( 'Slide post type', 'blocksy-slider' ),
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

            register_post_type( 'wpbs_slide', $args );
        }

        /**
         * Save the slideshow metadata.
         *
         */
        public function save_slideshow_metadata( $wpbs_slideshow_ID ) {

            if ( ! isset( $_POST['wpbs_slideshow_metabox_nonce'] ) || ! 
                wp_verify_nonce( 
                    sanitize_text_field( wp_unslash( $_POST['wpbs_slideshow_metabox_nonce'] ) ),
                    'wpbs_slideshow_metabox_data' 
                )
            ) :
                return;
            endif;

            if (get_post_type($wpbs_slideshow_ID) !== 'wpbs_slider') return $wpbs_slideshow_ID;

            $submitted = isset($_POST['wpbs_slide_ids']) ? array_map('absint', (array) $_POST['wpbs_slide_ids']) : [];
            $existing  = get_children(
                array(
                    'post_parent' => $wpbs_slideshow_ID, 
                    'post_type'   => 'wpbs_slide', 
                    'fields'      => 'ids'
                )
            );

            $deleted   = array_diff((array) $existing, $submitted);

            if ($deleted) :
                $map = json_decode(get_post_meta($wpbs_slideshow_ID, 'wpbs_slide_images', true), true) ?: [];

                foreach ($deleted as $slide_id) :
                    unset($map[$slide_id]);
                    wp_delete_post($slide_id, true);
                endforeach; 

                update_post_meta($wpbs_slideshow_ID, 'wpbs_slide_images', wp_json_encode($map));
            endif;

            // Update menu_order based on submitted order
            if (!empty($submitted)) :
                foreach ($submitted as $index => $id) :
                    wp_update_post(array( 
                        'ID'         => $id,
                        'menu_order' => $index + 1
                    ) );
                endforeach;
            endif;

            if ( isset( $_POST['wpbs_slider_image_ids'] ) && is_array( $_POST['wpbs_slider_image_ids'] ) ) :
                $image_ids = array_map( 'absint', wp_unslash( $_POST['wpbs_slider_image_ids'] ) ); 
                update_post_meta( $wpbs_slideshow_ID, 'wpbs_slider_image_ids', wp_json_encode( $image_ids ) );
            endif;

            if ( isset( $_POST['wpbs_slider_option'] ) && is_array( $_POST['wpbs_slider_option'] ) ) :
                $slider_options = array();
                $post_data = wp_unslash( $_POST['wpbs_slider_option'] ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
                foreach ( $post_data as $key => $value ) {
                    // Preserve line breaks for custom_css field
                    if ( $key === 'custom_css' ) :
                        $slider_options[ $key ] = sanitize_textarea_field( $value );
                    else :
                        $slider_options[ $key ] = sanitize_text_field( $value );
                    endif;
                }
                update_post_meta( $wpbs_slideshow_ID, 'wpbs_slider_option', $slider_options );
            endif;

            $this->save_background_settings( $wpbs_slideshow_ID );

            return $wpbs_slideshow_ID;
        }

        /**
         * Save slide images to parent slider
         */
        public function save_slide_images_to_parent( $post_id, $post ) {

            if ( ! isset( $_POST['wpbs_slideshow_metabox_nonce'] ) || ! 
                wp_verify_nonce( 
                    sanitize_text_field( wp_unslash( $_POST['wpbs_slideshow_metabox_nonce'] ) ),
                    'wpbs_slideshow_metabox_data' 
                )
            ) :
                return;
            endif;

            // Save background settings using common method
            $this->save_background_settings( $post_id );
        }

        /**
         * Save background settings for both wpbs_slider and wpbs_slide post types
         *
         */
        private function save_background_settings( $post_id ) {

            if ( ! isset( $_POST['wpbs_slideshow_metabox_nonce'] ) || ! 
                wp_verify_nonce( 
                    sanitize_text_field( wp_unslash( $_POST['wpbs_slideshow_metabox_nonce'] ) ),
                    'wpbs_slideshow_metabox_data' 
                )
            ) :
                return;
            endif;

            // Allowed values for background size
            $allowed_sizes     = array( 'cover', 'contain', 'original', 'auto' );
            $allowed_positions = array( 
                'center', 'left top', 'left center', 'left bottom', 'right top', 
                'right center', 'right bottom', 'center top', 'center bottom' 
            );

            $allowed_repeats = array( 'no-repeat', 'repeat', 'repeat-x', 'repeat-y' );

            if ( isset( $_POST['wpbs_background_size'] ) ) :
                $background_size = sanitize_text_field( wp_unslash( $_POST['wpbs_background_size'] ) );
                if ( in_array( $background_size, $allowed_sizes, true ) ) :
                    update_post_meta( $post_id, 'wpbs_background_size', $background_size );
                endif;
            endif;

            if ( isset( $_POST['wpbs_background_position'] ) ) :
                $background_position = sanitize_text_field( wp_unslash( $_POST['wpbs_background_position'] ) );
                if ( in_array( $background_position, $allowed_positions, true ) ) :
                    update_post_meta( $post_id, 'wpbs_background_position', $background_position );
                endif;
            endif;

            if ( isset( $_POST['wpbs_background_repeat'] ) ) :
                $background_repeat = sanitize_text_field( wp_unslash( $_POST['wpbs_background_repeat'] ) );
                if ( in_array( $background_repeat, $allowed_repeats, true ) ) :
                    update_post_meta( $post_id, 'wpbs_background_repeat', $background_repeat );
                endif;
            endif;

            if ( isset( $_POST['wpbs_background_color'] ) ) :
                $background_color = sanitize_hex_color( wp_unslash( $_POST['wpbs_background_color'] ) );
                if ( $background_color ) :
                    update_post_meta( $post_id, 'wpbs_background_color', $background_color );
                endif;
            endif;
        }

    }

    new WPBS_CPT();

endif;
