<?php
/**
 * Manage slider post type
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'SLST_CPT' ) ) :
    /**
     * Class SLST_CPT
     *
     */
    class SLST_CPT {

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
            add_action( 'init', [ __CLASS__, 'slst_register_post_type' ], 10 );
            add_action( 'init', [ __CLASS__, 'slst_register_slide_post_type' ], 10 );
            add_action( 'add_meta_boxes', [ $this, 'slst_add_meta_boxes' ] );
            add_filter( 'manage_slst_slider_posts_columns', [ $this, 'add_columns' ] );
            add_action( 'manage_slst_slider_posts_custom_column', [ $this, 'render_shortcode_column' ], 10, 2 );
            add_action( 'save_post', [ $this, 'save_slideshow_metadata' ] );
            add_action( 'save_post', [ $this, 'save_slide_images_to_parent' ], 10, 2 );
        }

        /**
         * Add meta boxes for the slider.
         */
        public function slst_add_meta_boxes() {

            add_meta_box(
                'slst_slider_shortcode',
                esc_html__( 'SLST Slider Shortcode', 'slider-studio' ),
                array( $this, 'render_slider_shortcode_metabox' ),
                'slst_slider',
                'side',
                'default'
            );

            add_meta_box(
				'slst_slider_background_settings',
				esc_html__( 'Background Settings', 'slider-studio' ),
				array( $this, 'render_slst_background_settings' ),
				'slst_slider',
				'side',
				'low'
			);

            add_meta_box(
                'slst_background_settings',
                esc_html__( 'Background settings', 'slider-studio' ),
                array( $this, 'render_slst_background_settings' ),
                'slst_slide',
                'side',
                'default'
            );

            add_meta_box(
                'slst_parent_slider',
                esc_html__( 'Parent slider', 'slider-studio' ),
                array( $this, 'render_slst_parent_slider' ),
                'slst_slide',
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
                '<p>%s</p><hr><code>[slst_slider id="%d"]</code>', 
                esc_html__( 'Use the shortcode below to display the slider.', 'slider-studio' ), 
                esc_attr( $post->ID ) 
            );
        }

        /**
         * Render the background settings metabox.
         *
         */
        public function render_slst_background_settings( $post ) {

            $background_size     = get_post_meta( $post->ID, 'slst_background_size', true );
            $background_position = get_post_meta( $post->ID, 'slst_background_position', true );
            $background_repeat   = get_post_meta( $post->ID, 'slst_background_repeat', true );
            $background_color    = get_post_meta( $post->ID, 'slst_background_color', true );

            slst_get_template( 
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
        public function render_slst_parent_slider( $post ) {

            // phpcs:ignore WordPress.Security.NonceVerification.Recommended
            $parent_slider = isset( $_GET['parent_slider'] ) ? absint( wp_unslash( $_GET['parent_slider'] ) ) : false;

            slst_get_template( 
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
                    $new_columns['SLST_Shortcode'] = esc_html__( 'Shortcode', 'slider-studio' );
                endif;
            endforeach;

            return $new_columns;
        }

        public function render_shortcode_column( $column, $post_id ) {
            if ( $column === 'SLST_Shortcode' ) :
                printf( '<code>[slst_slider id="%d"]</code>', 
                esc_attr( $post_id ) 
            );
            endif;
        }

        /**
         * Register the slider post type.
         */
        public static function slst_register_post_type() {
            $labels = array(
				'name'               => esc_html__( 'Slider Studio', 'slider-studio' ),
				'singular_name'      => esc_html__( 'Slider Studio', 'slider-studio' ),
				'menu_name'          => esc_html__( 'Slider Studio', 'slider-studio' ),
				'name_admin_bar'     => esc_html__( 'Slider Studio', 'slider-studio' ),
				'add_new_item'       => esc_html__( 'Add New Slider', 'slider-studio' ),
				'new_item'           => esc_html__( 'New Slider', 'slider-studio' ),
				'edit_item'          => esc_html__( 'Edit Slider', 'slider-studio' ),
				'view_item'          => esc_html__( 'View Slider', 'slider-studio' ),
				'all_items'          => esc_html__( 'Slider Studio', 'slider-studio' ),
				'search_items'       => esc_html__( 'Search Slider', 'slider-studio' ),
				'parent_item_colon'  => esc_html__( 'Parent Slider:', 'slider-studio' ),
				'not_found'          => esc_html__( 'No sliders found.', 'slider-studio' ),
				'not_found_in_trash' => esc_html__( 'No sliders found in Trash.', 'slider-studio' ),
                'featured_image'        => esc_html__( 'Slider background image', 'slider-studio' ),
                'set_featured_image'    => esc_html__( 'Set background image', 'slider-studio' ),
                'remove_featured_image' => esc_html__( 'Remove background image', 'slider-studio' ),
                'use_featured_image'    => esc_html__( 'Use as background image', 'slider-studio' ),
            );

            $args = array(
				'label'               => esc_html__( 'Sliders', 'slider-studio' ),
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

            register_post_type( 'slst_slider', $args );
        }

        /**
         * Register the slide post type.
         */
        public static function slst_register_slide_post_type() {

            $labels = array(
                'name'               => esc_html__( 'Slider Studio', 'slider-studio' ),
                'singular_name'      => esc_html__( 'Slider Studio', 'slider-studio' ),
                'menu_name'          => esc_html__( 'Slider Studio', 'slider-studio' ),
                'name_admin_bar'     => esc_html__( 'Slider Studio', 'slider-studio' ),
                'add_new_item'       => esc_html__( 'Add New Slide', 'slider-studio' ),
                'new_item'           => esc_html__( 'New Slide', 'slider-studio' ),
                'edit_item'          => esc_html__( 'Edit Slide', 'slider-studio' ),
                'view_item'          => esc_html__( 'View Slide', 'slider-studio' ),
                'all_items'          => esc_html__( 'Slider Studio Slides', 'slider-studio' ),
                'search_items'       => esc_html__( 'Search Slides', 'slider-studio' ),
                'parent_item_colon'  => esc_html__( 'Parent Slider:', 'slider-studio' ),
                'not_found'          => esc_html__( 'No slides found.', 'slider-studio' ),
                'not_found_in_trash' => esc_html__( 'No slides found in Trash.', 'slider-studio' ),
                'featured_image'        => esc_html__( 'Slider background image', 'slider-studio' ),
                'set_featured_image'    => esc_html__( 'Set background image', 'slider-studio' ),
                'remove_featured_image' => esc_html__( 'Remove background image', 'slider-studio' ),
                'use_featured_image'    => esc_html__( 'Use as background image', 'slider-studio' ),
            );

            $args   = array(
                'label'               => esc_html__( 'Slide', 'slider-studio' ),
                'description'         => esc_html__( 'Slide post type', 'slider-studio' ),
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

            register_post_type( 'slst_slide', $args );
        }

        /**
         * Save the slideshow metadata.
         *
         */
        public function save_slideshow_metadata( $slst_slideshow_ID ) {

            if ( ! isset( $_POST['slst_slideshow_metabox_nonce'] ) || ! 
                wp_verify_nonce( 
                    sanitize_text_field( wp_unslash( $_POST['slst_slideshow_metabox_nonce'] ) ),
                    'slst_slideshow_metabox_data' 
                )
            ) :
                return;
            endif;

            if (get_post_type($slst_slideshow_ID) !== 'slst_slider') return $slst_slideshow_ID;

            $submitted = isset($_POST['slst_slide_ids']) ? array_map('absint', (array) $_POST['slst_slide_ids']) : [];
            $existing  = get_children(
                array(
                    'post_parent' => $slst_slideshow_ID, 
                    'post_type'   => 'slst_slide', 
                    'fields'      => 'ids'
                )
            );

            $deleted   = array_diff((array) $existing, $submitted);

            if ($deleted) :
                $map = json_decode(get_post_meta($slst_slideshow_ID, 'slst_slide_images', true), true) ?: [];

                foreach ($deleted as $slide_id) :
                    unset($map[$slide_id]);
                    wp_delete_post($slide_id, true);
                endforeach; 

                update_post_meta($slst_slideshow_ID, 'slst_slide_images', wp_json_encode($map));
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

            if ( isset( $_POST['slst_slider_image_ids'] ) && is_array( $_POST['slst_slider_image_ids'] ) ) :
                $image_ids = array_map( 'absint', wp_unslash( $_POST['slst_slider_image_ids'] ) ); 
                update_post_meta( $slst_slideshow_ID, 'slst_slider_image_ids', wp_json_encode( $image_ids ) );
            endif;

            if ( ! empty( $_POST['slst_slider_option'] ) && is_array( $_POST['slst_slider_option'] ) ) :
                $post_data = map_deep( wp_unslash( $_POST['slst_slider_option'] ), 'sanitize_text_field' ); 

                if ( isset( $_POST['slst_slider_option']['custom_css'] ) ) :
                    $post_data['custom_css'] = sanitize_textarea_field( wp_unslash( $_POST['slst_slider_option']['custom_css'] ) );
                endif;

                update_post_meta( $slst_slideshow_ID, 'slst_slider_option', $post_data );
                
            endif;

            $this->save_background_settings( $slst_slideshow_ID );

            return $slst_slideshow_ID;
        }

        /**
         * Save slide images to parent slider
         */
        public function save_slide_images_to_parent( $post_id, $post ) {

            if ( ! isset( $_POST['slst_slideshow_metabox_nonce'] ) || ! 
                wp_verify_nonce( 
                    sanitize_text_field( wp_unslash( $_POST['slst_slideshow_metabox_nonce'] ) ),
                    'slst_slideshow_metabox_data' 
                )
            ) :
                return;
            endif;

            $this->save_background_settings( $post_id );
        }

        /**
         * Save background settings for both slst_slider and slst_slide post types
         *
         */
        private function save_background_settings( $post_id ) {

            if ( ! isset( $_POST['slst_slideshow_metabox_nonce'] ) || ! 
                wp_verify_nonce( 
                    sanitize_text_field( wp_unslash( $_POST['slst_slideshow_metabox_nonce'] ) ),
                    'slst_slideshow_metabox_data' 
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

            if ( isset( $_POST['slst_background_size'] ) ) :
                $background_size = sanitize_text_field( wp_unslash( $_POST['slst_background_size'] ) );
                if ( in_array( $background_size, $allowed_sizes, true ) ) :
                    update_post_meta( $post_id, 'slst_background_size', $background_size );
                endif;
            endif;

            if ( isset( $_POST['slst_background_position'] ) ) :
                $background_position = sanitize_text_field( wp_unslash( $_POST['slst_background_position'] ) );
                if ( in_array( $background_position, $allowed_positions, true ) ) :
                    update_post_meta( $post_id, 'slst_background_position', $background_position );
                endif;
            endif;

            if ( isset( $_POST['slst_background_repeat'] ) ) :
                $background_repeat = sanitize_text_field( wp_unslash( $_POST['slst_background_repeat'] ) );
                if ( in_array( $background_repeat, $allowed_repeats, true ) ) :
                    update_post_meta( $post_id, 'slst_background_repeat', $background_repeat );
                endif;
            endif;

            if ( isset( $_POST['slst_background_color'] ) ) :
                $color = $this->sanitize_color_value( sanitize_text_field( wp_unslash( $_POST['slst_background_color'] ) ) );
                if ( $color ) :
                    update_post_meta( $post_id, 'slst_background_color', $color );
                endif;
            endif;
        }

        /**
         * Sanitize color value
         *
         */
        private function sanitize_color_value( $color ) {

            if ( empty( $color ) ) return false;
        
            $color = trim( $color );
        
            if ( preg_match('/^#([A-Fa-f0-9]{3}|[A-Fa-f0-9]{6})$/', $color ) ) :
                return sanitize_hex_color( $color );
            endif;
        
            if ( preg_match('/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*([\d.]+))?\)$/', $color, $m ) ) :
                $r = min(255, max(0, (int)$m[1]));
                $g = min(255, max(0, (int)$m[2]));
                $b = min(255, max(0, (int)$m[3]));
                $a = isset($m[4]) ? floatval($m[4]) : 1;
        
                if ( $a < 0 || $a > 1 ) return false;
        
                return ($a < 1) ? "rgba($r, $g, $b, $a)" : "rgb($r, $g, $b)";
            endif;
        
            return false;
        }

    }

    new SLST_CPT();

endif;
