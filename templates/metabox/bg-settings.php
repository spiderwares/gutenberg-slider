<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Add nonce field for slide background settings
wp_nonce_field( 'wpsp_slideshow_metabox_data', 'wpsp_slideshow_metabox_nonce' );
?>

<p>
    <label>
        <?php echo esc_html__( 'Background size', 'sliderpress' ); ?>
    </label>

    <select name="wpsp_background_size" id="wpsp_background_size" style="width: 100%;">
        <option value="cover" <?php selected( 'cover', $background_size ); ?>>
            <?php echo esc_html__( 'Cover', 'sliderpress' ); ?>
        </option>
        <option value="contain" <?php selected( 'contain', $background_size ); ?>>
            <?php echo esc_html__( 'Contain', 'sliderpress' ); ?>
        </option>
        <option value="original" <?php selected( 'original', $background_size ); ?>>
            <?php echo esc_html__( 'Original', 'sliderpress' ); ?>
        </option>
    </select>
</p>

<p>
    <label>
        <?php echo esc_html__( 'Background position', 'sliderpress' ); ?>
    </label>

    <select name="wpsp_background_position" id="wpsp_background_position" style="width: 100%;">
        <option value="center" <?php selected( 'center', $background_position ); ?>>
            <?php echo esc_html__( 'Center', 'sliderpress' ); ?>
        </option>
        <option value="left top" <?php selected( 'left top', $background_position ); ?>>
            <?php echo esc_html__( 'Left Top', 'sliderpress' ); ?>
        </option>
        <option value="left center" <?php selected( 'left center', $background_position ); ?>>
            <?php echo esc_html__( 'Left Center', 'sliderpress' ); ?>
        </option>
        <option value="left bottom" <?php selected( 'left bottom', $background_position ); ?>>
            <?php echo esc_html__( 'Left Bottom', 'sliderpress' ); ?>
        </option>
        <option value="right top" <?php selected( 'right top', $background_position ); ?>>
            <?php echo esc_html__( 'Right Top', 'sliderpress' ); ?>
        </option>
        <option value="right center" <?php selected( 'right center', $background_position ); ?>>
            <?php echo esc_html__( 'Right Center', 'sliderpress' ); ?>
        </option>
        <option value="right bottom" <?php selected( 'right bottom', $background_position ); ?>>
            <?php echo esc_html__( 'Right Bottom', 'sliderpress' ); ?>
        </option>
        <option value="center top" <?php selected( 'center top', $background_position ); ?>>
            <?php echo esc_html__( 'Center Top', 'sliderpress' ); ?>
        </option>
        <option value="center bottom" <?php selected( 'center bottom', $background_position ); ?>>
            <?php echo esc_html__( 'Center Bottom', 'sliderpress' ); ?>
        </option>
    </select>
</p>

<p>
    <label>
        <?php echo esc_html__( 'Background repeat', 'sliderpress' ); ?>
    </label>

    <select name="wpsp_background_repeat" id="wpsp_background_repeat" style="width: 100%;">
        <option value="no-repeat" <?php selected( 'no-repeat', $background_repeat ); ?>>
            <?php echo esc_html__( 'No Repeat', 'sliderpress' ); ?>
        </option>
        <option value="repeat" <?php selected( 'repeat', $background_repeat ); ?>>
            <?php echo esc_html__( 'Repeat', 'sliderpress' ); ?>
        </option>
        <option value="repeat-x" <?php selected( 'repeat-x', $background_repeat ); ?>>
            <?php echo esc_html__( 'Repeat X', 'sliderpress' ); ?>
        </option>
        <option value="repeat-y" <?php selected( 'repeat-y', $background_repeat ); ?>>
            <?php echo esc_html__( 'Repeat Y', 'sliderpress' ); ?>
        </option>
    </select>
</p>

<p>
    <label>
        <?php echo esc_html__( 'Background Color', 'sliderpress' ); ?>
    </label><br>

    <input type="text" class="wpsp-color-picker" name="wpsp_background_color" id="wpsp_background_color" value="<?php echo esc_attr( $background_color ); ?>" data-default-color="#ffffff" data-alpha-enabled="true">
</p>