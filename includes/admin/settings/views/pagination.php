<?php
/**
 * Slides Options Metabox Pagination Setting.
 *
 * @package Guternberg_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Retrieve the pagination settings fields from the WPBS_Settings_Fields class.
 * @var array $fields Array of pagination settings fields.
 * 
 */
$fields  = WPBS_Settings_Fields::pagination_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'wpbs_slider_option', true );

?>

<div id="pagination-tab" class="wpbs-tab-content">
    <?php 
    wpbs_get_template( 
        'fields/settings-forms.php', 
        array(
            'fields'  => $fields,     // Field definitions.
            'options' => $options,   // Saved option values.
        ) 
    );
    ?>
</div>