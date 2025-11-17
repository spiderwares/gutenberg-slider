<?php
/**
 * Slides Options Metabox Scrollbar Setting.
 *
 * @package Block_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Retrieve the scrollbar settings fields from the BS_Settings_Fields class.
 * @var array $fields Array of scrollbar settings fields.
 * 
 */
$fields  = BS_Settings_Fields::scrollbar_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'bs_slider_option', true );

?>

<div id="scrollbar-tab" class="bs-tab-content">
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