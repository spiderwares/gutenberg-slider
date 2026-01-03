<?php
/**
 * Slides Options Metabox Responsive Setting.
 *
 * @package Guternberg_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Retrieve the responsive settings fields from the SLST_Settings_Fields class.
 * @var array $fields Array of responsive settings fields.
 * 
 */
$fields  = SLST_Settings_Fields::responsive_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'slst_slider_option', true );

?>

<div id="responsive-tab" class="slst-tab-content">
    <?php 
    slst_get_template( 
        'fields/settings-forms.php', 
        array(
            'fields'  => $fields,     // Field definitions.
            'options' => $options,    // Saved option values.
        ) 
    );
    ?>
</div>