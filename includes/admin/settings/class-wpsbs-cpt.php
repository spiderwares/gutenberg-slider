<?php
/**
 * Manage slider post type
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPSBS_CPT' ) ) :
    /**
     * Class WPSBS_CPT
     *
     */
    class WPSBS_CPT {

        /**
         * Constructor for the class.
         */
        public function __construct() {
            $this->event_handler();
        }

        /**
         * Initialize hooks and filters.
         */
        public function event_handler() {
            add_action( 'init', [ __CLASS__, 'wpsbs_register_post_type' ], 10 );
            add_action( 'init', [ __CLASS__, 'wpsbs_register_slide_post_type' ], 10 );
            add_action( 'add_meta_boxes', [ $this, 'wpsbs_add_meta_boxes' ] );

            add_filter( 'manage_wpsbs_slider_posts_columns', [ $this, 'add_columns' ] );
            add_action( 'manage_wpsbs_slider_posts_custom_column', [ $this, 'render_shortcode_column' ], 10, 2 );

            add_action( 'save_post', [ $this, 'save_slideshow_metadata' ] );
            add_action( 'save_post', [ $this, 'save_slide_images_to_parent' ], 10, 2 );

        }

        /**
         * Add meta boxes for the slider.
         */
        public function wpsbs_add_meta_boxes() {

            add_meta_box(
                'wpsbs_slider_shortcode',
                esc_html__( 'BS Slider Shortcode', 'smart-block-slider' ),
                [ $this, 'render_slider_shortcode_metabox' ],
                'wpsbs_slider',
                'side',
                'default'
            );

            add_meta_box(
				'wpsbs_slider_background_settings',
				esc_html__( 'Background Settings', 'smart-block-slider' ),
				array( $this, 'render_wpsbs_background_settings' ),
				'wpsbs_slider',
				'side',
				'low'
			);

            add_meta_box(
                'wpsbs_background_settings',
                esc_html__( 'Background settings', 'smart-block-slider' ),
                array( $this, 'render_wpsbs_background_settings' ),
                'wpsbs_slide',
                'side',
                'default'
            );

            add_meta_box(
                'wpsbs_parent_slider',
                esc_html__( 'Parent slider', 'smart-block-slider' ),
                array( $this, 'render_wpsbs_parent_slider' ),
                'wpsbs_slide',
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
                '<p>%s</p><hr><code>[wpsbs_slider id="%d"]</code>', 
                esc_html__( 'Use the shortcode below to display the slider.', 'smart-block-slider' ), 
                esc_attr( $post->ID ) 
            );
        }

        /**
         * Render the background settings metabox.
         *
         */
        public function render_wpsbs_background_settings( $post ) {

            $background_size     = get_post_meta( $post->ID, 'wpsbs_background_size', true );
            $background_position = get_post_meta( $post->ID, 'wpsbs_background_position', true );
            $background_repeat   = get_post_meta( $post->ID, 'wpsbs_background_repeat', true );
            $background_color    = get_post_meta( $post->ID, 'wpsbs_background_color', true );

            wpsbs_get_template( 
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
        public function render_wpsbs_parent_slider( $post ) {

            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Reading GET parameter for display purposes only, not processing form data.
            $parent_slider = isset( $_GET['parent_slider'] ) ? absint( wp_unslash( $_GET['parent_slider'] ) ) : false;

            wpsbs_get_template( 
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
                    $new_columns['WPSBS_Shortcode'] = esc_html__( 'Shortcode', 'smart-block-slider' );
                endif;
            endforeach;

            return $new_columns;
        }

        public function render_shortcode_column( $column, $post_id ) {
            if ( $column === 'WPSBS_Shortcode' ) :
                printf( '<code>[wpsbs_slider id="%d"]</code>', 
                esc_attr( $post_id ) 
            );
            endif;
        }

        /**
         * Register the slider post type.
         */
        public static function wpsbs_register_post_type() {
            $labels = array(
				'name'               => esc_html__( 'Smart Block Slider', 'smart-block-slider' ),
				'singular_name'      => esc_html__( 'Smart Block Slider', 'smart-block-slider' ),
				'menu_name'          => esc_html__( 'Smart Block Slider', 'smart-block-slider' ),
				'name_admin_bar'     => esc_html__( 'Smart Block Slider', 'smart-block-slider' ),
				'add_new_item'       => esc_html__( 'Add New Slider', 'smart-block-slider' ),
				'new_item'           => esc_html__( 'New Slider', 'smart-block-slider' ),
				'edit_item'          => esc_html__( 'Edit Slider', 'smart-block-slider' ),
				'view_item'          => esc_html__( 'View Slider', 'smart-block-slider' ),
				'all_items'          => esc_html__( 'Smart Block Sliders', 'smart-block-slider' ),
				'search_items'       => esc_html__( 'Search Sliders', 'smart-block-slider' ),
				'parent_item_colon'  => esc_html__( 'Parent Sliders:', 'smart-block-slider' ),
				'not_found'          => esc_html__( 'No sliders found.', 'smart-block-slider' ),
				'not_found_in_trash' => esc_html__( 'No sliders found in Trash.', 'smart-block-slider' ),
                'featured_image'        => esc_html__( 'Slider background image', 'smart-block-slider' ),
                'set_featured_image'    => esc_html__( 'Set background image', 'smart-block-slider' ),
                'remove_featured_image' => esc_html__( 'Remove background image', 'smart-block-slider' ),
                'use_featured_image'    => esc_html__( 'Use as background image', 'smart-block-slider' ),
            );

            $args = array(
				'label'               => esc_html__( 'Sliders', 'smart-block-slider' ),
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

            register_post_type( 'wpsbs_slider', $args );
        }

        /**
         * Register the slide post type.
         */
        public static function wpsbs_register_slide_post_type() {

            $labels = array(
                'name'               => esc_html__( 'Smart Block Slider', 'smart-block-slider' ),
                'singular_name'      => esc_html__( 'Smart Block Slider', 'smart-block-slider' ),
                'menu_name'          => esc_html__( 'Smart Block Slider', 'smart-block-slider' ),
                'name_admin_bar'     => esc_html__( 'Smart Block Slider', 'smart-block-slider' ),
                'add_new_item'       => esc_html__( 'Add New Slide', 'smart-block-slider' ),
                'new_item'           => esc_html__( 'New Slide', 'smart-block-slider' ),
                'edit_item'          => esc_html__( 'Edit Slide', 'smart-block-slider' ),
                'view_item'          => esc_html__( 'View Slide', 'smart-block-slider' ),
                'all_items'          => esc_html__( 'Smart Block Slider Slides', 'smart-block-slider' ),
                'search_items'       => esc_html__( 'Search Slides', 'smart-block-slider' ),
                'parent_item_colon'  => esc_html__( 'Parent Slider:', 'smart-block-slider' ),
                'not_found'          => esc_html__( 'No slides found.', 'smart-block-slider' ),
                'not_found_in_trash' => esc_html__( 'No slides found in Trash.', 'smart-block-slider' ),
                'featured_image'        => esc_html__( 'Slider background image', 'smart-block-slider' ),
                'set_featured_image'    => esc_html__( 'Set background image', 'smart-block-slider' ),
                'remove_featured_image' => esc_html__( 'Remove background image', 'smart-block-slider' ),
                'use_featured_image'    => esc_html__( 'Use as background image', 'smart-block-slider' ),
            );

            $args   = array(
                'label'               => esc_html__( 'Slide', 'smart-block-slider' ),
                'description'         => esc_html__( 'Slide post type', 'smart-block-slider' ),
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

            register_post_type( 'wpsbs_slide', $args );
        }

        /**
         * Save the slideshow metadata.
         *
         */
        public function save_slideshow_metadata( $wpsbs_slideshow_ID ) {

            if ( ! isset( $_POST['wpsbs_slideshow_metabox_nonce'] ) || ! 
                wp_verify_nonce( 
                    sanitize_text_field( wp_unslash( $_POST['wpsbs_slideshow_metabox_nonce'] ) ),
                    'wpsbs_slideshow_metabox_data' 
                )
            ) :
                return;
            endif;

            if (get_post_type($wpsbs_slideshow_ID) !== 'wpsbs_slider') return $wpsbs_slideshow_ID;

            $submitted = isset($_POST['wpsbs_slide_ids']) ? array_map('absint', (array) $_POST['wpsbs_slide_ids']) : [];
            $existing  = get_children(
                array(
                    'post_parent' => $wpsbs_slideshow_ID, 
                    'post_type'   => 'wpsbs_slide', 
                    'fields'      => 'ids'
                )
            );

            $deleted   = array_diff((array) $existing, $submitted);

            if ($deleted) :
                $map = json_decode(get_post_meta($wpsbs_slideshow_ID, 'wpsbs_slide_images', true), true) ?: [];

                foreach ($deleted as $slide_id) :
                    unset($map[$slide_id]);
                    wp_delete_post($slide_id, true);
                endforeach; 

                update_post_meta($wpsbs_slideshow_ID, 'wpsbs_slide_images', wp_json_encode($map));
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

            if ( isset( $_POST['wpsbs_slider_image_ids'] ) && is_array( $_POST['wpsbs_slider_image_ids'] ) ) :
                $image_ids = array_map( 'absint', wp_unslash( $_POST['wpsbs_slider_image_ids'] ) ); 
                update_post_meta( $wpsbs_slideshow_ID, 'wpsbs_slider_image_ids', wp_json_encode( $image_ids ) );
            endif;

            if ( isset( $_POST['wpsbs_slider_option'] ) && is_array( $_POST['wpsbs_slider_option'] ) ) :
                $slider_options = array();
                $post_data = wp_unslash( $_POST['wpsbs_slider_option'] ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
                foreach ( $post_data as $key => $value ) {
                    // Preserve line breaks for custom_css field
                    if ( $key === 'custom_css' ) :
                        $slider_options[ $key ] = sanitize_textarea_field( $value );
                    else :
                        $slider_options[ $key ] = sanitize_text_field( $value );
                    endif;
                }
                update_post_meta( $wpsbs_slideshow_ID, 'wpsbs_slider_option', $slider_options );
            endif;

            $this->save_background_settings( $wpsbs_slideshow_ID );

            return $wpsbs_slideshow_ID;
        }

        /**
         * Save slide images to parent slider
         */
        public function save_slide_images_to_parent( $post_id, $post ) {

            if ( ! isset( $_POST['wpsbs_slideshow_metabox_nonce'] ) || ! 
                wp_verify_nonce( 
                    sanitize_text_field( wp_unslash( $_POST['wpsbs_slideshow_metabox_nonce'] ) ),
                    'wpsbs_slideshow_metabox_data' 
                )
            ) :
                return;
            endif;

            // Save background settings using common method
            $this->save_background_settings( $post_id );
        }

        /**
         * Save background settings for both wpsbs_slider and wpsbs_slide post types
         *
         */
        private function save_background_settings( $post_id ) {

            if ( ! isset( $_POST['wpsbs_slideshow_metabox_nonce'] ) || ! 
                wp_verify_nonce( 
                    sanitize_text_field( wp_unslash( $_POST['wpsbs_slideshow_metabox_nonce'] ) ),
                    'wpsbs_slideshow_metabox_data' 
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

            if ( isset( $_POST['wpsbs_background_size'] ) ) :
                $background_size = sanitize_text_field( wp_unslash( $_POST['wpsbs_background_size'] ) );
                if ( in_array( $background_size, $allowed_sizes, true ) ) :
                    update_post_meta( $post_id, 'wpsbs_background_size', $background_size );
                endif;
            endif;

            if ( isset( $_POST['wpsbs_background_position'] ) ) :
                $background_position = sanitize_text_field( wp_unslash( $_POST['wpsbs_background_position'] ) );
                if ( in_array( $background_position, $allowed_positions, true ) ) :
                    update_post_meta( $post_id, 'wpsbs_background_position', $background_position );
                endif;
            endif;

            if ( isset( $_POST['wpsbs_background_repeat'] ) ) :
                $background_repeat = sanitize_text_field( wp_unslash( $_POST['wpsbs_background_repeat'] ) );
                if ( in_array( $background_repeat, $allowed_repeats, true ) ) :
                    update_post_meta( $post_id, 'wpsbs_background_repeat', $background_repeat );
                endif;
            endif;

            if ( isset( $_POST['wpsbs_background_color'] ) ) :
                $background_color = sanitize_hex_color( wp_unslash( $_POST['wpsbs_background_color'] ) );
                if ( $background_color ) :
                    update_post_meta( $post_id, 'wpsbs_background_color', $background_color );
                endif;
            endif;
        }

    }

    new WPSBS_CPT();

endif;
