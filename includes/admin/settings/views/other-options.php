<?php
/**
 * Slides Options Metabox Other Options Setting.
 *
 * @package Block_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Retrieve the other options settings fields from the BS_Settings_Fields class.
 * @var array $fields Array of other options settings fields.
 * 
 */
$fields   = BS_Settings_Fields::other_options_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'bs_slider_option', true );

?>

<div id="other-options-tab" class="bs-tab-content">
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