<?php
/**
 * Slides Options Metabox Navigation Setting.
 *
 * @package Gutenberg_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

global $post;

$fields   = GTBS_Settings_Fields::navigation_field();
$options = get_post_meta( $post->ID, 'gtbs_slider_option', true );

// Ensure options is an array
if ( ! is_array( $options ) ) :
    $options = array();
endif;

?>

<div id="navigation-tab" class="gtbs-tab-content">
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