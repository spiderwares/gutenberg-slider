<?php
/**
 * Slides Options Metabox Scrollbar Setting.
 *
 * @package Slider_Studio
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Retrieve the scrollbar settings fields from the SLST_Settings_Fields class.
 * @var array $slst_fields Array of scrollbar settings fields.
 * 
 */
$slst_fields  = SLST_Settings_Fields::scrollbar_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$slst_options = get_post_meta( $post->ID, 'slst_slider_option', true );

?>

<div id="scrollbar-tab" class="slst-tab-content">
    <?php 
    slst_get_template( 
        'fields/settings-forms.php', 
        array(
            'fields'  => $slst_fields,     // Field definitions.
            'options' => $slst_options,    // Saved option values.
        ) 
    );
    ?>
</div>