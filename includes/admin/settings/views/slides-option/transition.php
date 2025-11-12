<?php
/**
 * Slides Options Metabox Animation Setting.
 *
 * @package Guternberg_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

global $post;

$fields  = GTBS_Settings_Fields::animation_field();
$options = get_post_meta( $post->ID, 'gtbs_slider_option', true );

// Ensure options is an array
if ( ! is_array( $options ) ) :
    $options = array();
endif;

?>

<div id="transition-tab" class="gtbs-tab-content">
    <?php 
    gtbs_get_template( 
        'fields/settings-forms.php', 
        array(
            'fields'  => $fields,
            'options' => $options,
        ) 
    );
    ?>
</div>