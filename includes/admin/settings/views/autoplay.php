<?php
/**
 * Slides Options Metabox Autoplay Setting.
 *
 * @package Slider_Studio
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

global $post;

/**
 * Retrieve the autoplay settings fields from the WPSS_Settings_Fields class.
 * @var array $fields Array of autoplay settings fields.
 * 
 */
$fields  = WPSS_Settings_Fields::autoplay_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'wpss_slider_option', true );

?>

<div id="autoplay-tab" class="wpss-tab-content">
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