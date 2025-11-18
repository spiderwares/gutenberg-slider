<?php
/**
 * Slides Options Metabox Thumbnail Gallery Setting.
 *
 * @package Smart_Block_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Retrieve the thumbnail gallery settings fields from the WPSBS_Settings_Fields class.
 * @var array $fields Array of thumbnail gallery settings fields.
 * 
 */
$fields  = WPSBS_Settings_Fields::thumbnail_gallery_field();

/**
 * Fetch the saved slider settings from the WordPress options table.
 * 
 */
$options = get_post_meta( $post->ID, 'wpsbs_slider_option', true );

?>

<div id="thumbnail-gallery-tab" class="wpsbs-tab-content">
    <?php 
    wpsbs_get_template( 
        'fields/settings-forms.php', 
        array(
            'fields'  => $fields,     // Field definitions.
            'options' => $options,    // Saved option values.
        ) 
    );
    ?>
</div>