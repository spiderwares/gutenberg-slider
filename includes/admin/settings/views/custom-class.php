<?php
/**
 * Slides Options Metabox Custom Class Setting.
 *
 * @package Smart_Block_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Retrieve the custom CSS settings fields from the WPSBS_Settings_Fields class.
 * @var array $fields Array of custom CSS settings fields.
 * 
 */
$custom_css_fields = WPSBS_Settings_Fields::custom_css_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'wpsbs_slider_option', true );

?>

<div id="custom-class-tab" class="wpsbs-tab-content">
    <?php 
    wpsbs_get_template( 
        'fields/settings-forms.php', 
        array(
            'fields'  => $custom_css_fields,     // Merged field definitions.
            'options' => $options,    // Saved option values.
        ) 
    );
    ?>
</div>

