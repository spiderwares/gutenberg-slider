<?php
/**
 * Slides Options Metabox Custom Class Setting.
 *
 * @package Block_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Retrieve the custom CSS settings fields from the BS_Settings_Fields class.
 * @var array $fields Array of custom CSS settings fields.
 * 
 */
$custom_css_fields = BS_Settings_Fields::custom_css_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'bs_slider_option', true );

?>

<div id="custom-class-tab" class="bs-tab-content">
    <?php 
    bs_get_template( 
        'fields/settings-forms.php', 
        array(
            'fields'  => $custom_css_fields,     // Merged field definitions.
            'options' => $options,    // Saved option values.
        ) 
    );
    ?>
</div>

