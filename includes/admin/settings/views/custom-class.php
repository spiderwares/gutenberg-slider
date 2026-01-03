<?php
/**
 * Slides Options Metabox Custom Class Setting.
 *
 * @package Slider_Studio
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Retrieve the custom CSS settings fields from the SLST_Settings_Fields class.
 * @var array $fields Array of custom CSS settings fields.
 * 
 */
$custom_css_fields = SLST_Settings_Fields::custom_css_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'slst_slider_option', true );

?>

<div id="custom-class-tab" class="slst-tab-content">
    <?php 
    slst_get_template( 
        'fields/settings-forms.php', 
        array(
            'fields'  => $custom_css_fields,     // Merged field definitions.
            'options' => $options,    // Saved option values.
        ) 
    );
    ?>
</div>

