<?php
/**
 * Slides Options Metabox Thumbnail Gallery Setting.
 *
 * @package Slider_Studio
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Retrieve the thumbnail gallery settings fields from the WPSS_Settings_Fields class.
 * @var array $fields Array of thumbnail gallery settings fields.
 * 
 */
$fields  = WPSS_Settings_Fields::thumbnail_gallery_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'wpss_slider_option', true );

?>

<div id="thumbnail-gallery-tab" class="wpss-tab-content">
    <p class="wpss_add_slide_message">
        <?php echo esc_html__( 'Note: Thumbnail gallery feature works only with image slides. It does not work with text-based slides.', 'slider-studio' ); ?>
    </p>
    <?php 
    wpss_get_template( 
        'fields/settings-forms.php', 
        array(
            'fields'  => $fields,     // Field definitions.
            'options' => $options,    // Saved option values.
        ) 
    );
    ?>
</div>