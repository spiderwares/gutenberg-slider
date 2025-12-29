<?php
/**
 * Slides Options Metabox Other Options Setting.
 *
 * @package Slider_Studio
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Retrieve the other options settings fields from the WPSS_Settings_Fields class.
 * @var array $fields Array of other options settings fields.
 * 
 */
$fields   = WPSS_Settings_Fields::other_options_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'wpss_slider_option', true );

?>

<div id="other-options-tab" class="wpss-tab-content">
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