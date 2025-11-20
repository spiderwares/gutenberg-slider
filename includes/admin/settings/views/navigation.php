<?php
/**
 * Slides Options Metabox Navigation Setting.
 *
 * @package Blocksy_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Retrieve the navigation settings fields from the WPBS_Settings_Fields class.
 * @var array $fields Array of navigation settings fields.
 * 
 */
$fields   = WPBS_Settings_Fields::navigation_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'wpbs_slider_option', true );

?>

<div id="navigation-tab" class="wpbs-tab-content">
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