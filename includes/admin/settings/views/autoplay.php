<?php
/**
 * Slides Options Metabox Autoplay Setting.
 *
 * @package Block_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

global $post;

/**
 * Retrieve the autoplay settings fields from the BS_Settings_Fields class.
 * @var array $fields Array of autoplay settings fields.
 * 
 */
$fields  = BS_Settings_Fields::autoplay_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'bs_slider_option', true );

// Ensure options is an array
if ( ! is_array( $options ) ) :
    $options = array();
endif;
?>

<div id="autoplay-tab" class="bs-tab-content">
    <?php 
    bs_get_template( 
        'fields/settings-forms.php', 
        array(
            'fields'  => $fields,     // Field definitions. 
            'options' => $options,    // Saved option values.
        ) 
    );
    ?>
</div>