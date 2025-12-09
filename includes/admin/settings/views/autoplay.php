<?php
/**
 * Slides Options Metabox Autoplay Setting.
 *
 * @package Slider_Press
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

global $post;

/**
 * Retrieve the autoplay settings fields from the WPSP_Settings_Fields class.
 * @var array $fields Array of autoplay settings fields.
 * 
 */
$fields  = WPSP_Settings_Fields::autoplay_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'wpsp_slider_option', true );

?>

<div id="autoplay-tab" class="wpsp-tab-content">
    <?php 
    wpsp_get_template( 
        'fields/settings-forms.php', 
        array(
            'fields'  => $fields,     // Field definitions. 
            'options' => $options,    // Saved option values.
        ) 
    );
    ?>
</div>