<?php
/**
 * Slides Options Metabox Thumbnail Gallery Setting.
 *
 * @package Blocksy_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Retrieve the thumbnail gallery settings fields from the WPBS_Settings_Fields class.
 * @var array $fields Array of thumbnail gallery settings fields.
 * 
 */
$fields  = WPBS_Settings_Fields::thumbnail_gallery_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'wpbs_slider_option', true );

?>

<div id="thumbnail-gallery-tab" class="wpbs-tab-content">
    <p class="wpbs_add_slide_message">
        <?php echo esc_html__( 'Note: Thumbnail gallery feature works only with image slides. It does not work with text-based slides.', 'blocksy-slider' ); ?>
    </p>
    <?php 
    wpbs_get_template( 
        'fields/settings-forms.php', 
        array(
            'fields'  => $fields,     // Field definitions.
            'options' => $options,    // Saved option values.
        ) 
    );
    ?>
</div>