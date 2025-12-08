<?php
/**
 * Slides Options Metabox Navigation Setting.
 *
 * @package Slider|_Press
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Retrieve the navigation settings fields from the WPSP_Settings_Fields class.
 * @var array $fields Array of navigation settings fields.
 * 
 */
$fields   = WPSP_Settings_Fields::navigation_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'wpsp_slider_option', true );

?>

<div id="navigation-tab" class="wpsp-tab-content">
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