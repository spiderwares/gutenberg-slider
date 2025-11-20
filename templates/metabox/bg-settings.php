<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Add nonce field for slide background settings
wp_nonce_field( 'wpbs_slideshow_metabox_data', 'wpbs_slideshow_metabox_nonce' );
?>

<p>
    <label>
        <?php echo esc_html__( 'Background size', 'blocksy-slider' ); ?>
    </label>

    <select name="wpbs_background_size" id="wpbs_background_size" style="width: 100%;">
        <option value="cover" <?php selected( 'cover', $background_size ); ?>>
            <?php echo esc_html__( 'Cover', 'blocksy-slider' ); ?>
        </option>
        <option value="contain" <?php selected( 'contain', $background_size ); ?>>
            <?php echo esc_html__( 'Contain', 'blocksy-slider' ); ?>
        </option>
        <option value="original" <?php selected( 'original', $background_size ); ?>>
            <?php echo esc_html__( 'Original', 'blocksy-slider' ); ?>
        </option>
    </select>
</p>

<p>
    <label>
        <?php echo esc_html__( 'Background position', 'blocksy-slider' ); ?>
    </label>

    <select name="wpbs_background_position" id="wpbs_background_position" style="width: 100%;">
        <option value="center" <?php selected( 'center', $background_position ); ?>>
            <?php echo esc_html__( 'Center', 'blocksy-slider' ); ?>
        </option>
        <option value="left top" <?php selected( 'left top', $background_position ); ?>>
            <?php echo esc_html__( 'Left Top', 'blocksy-slider' ); ?>
        </option>
        <option value="left center" <?php selected( 'left center', $background_position ); ?>>
            <?php echo esc_html__( 'Left Center', 'blocksy-slider' ); ?>
        </option>
        <option value="left bottom" <?php selected( 'left bottom', $background_position ); ?>>
            <?php echo esc_html__( 'Left Bottom', 'blocksy-slider' ); ?>
        </option>
        <option value="right top" <?php selected( 'right top', $background_position ); ?>>
            <?php echo esc_html__( 'Right Top', 'blocksy-slider' ); ?>
        </option>
        <option value="right center" <?php selected( 'right center', $background_position ); ?>>
            <?php echo esc_html__( 'Right Center', 'blocksy-slider' ); ?>
        </option>
        <option value="right bottom" <?php selected( 'right bottom', $background_position ); ?>>
            <?php echo esc_html__( 'Right Bottom', 'blocksy-slider' ); ?>
        </option>
        <option value="center top" <?php selected( 'center top', $background_position ); ?>>
            <?php echo esc_html__( 'Center Top', 'blocksy-slider' ); ?>
        </option>
        <option value="center bottom" <?php selected( 'center bottom', $background_position ); ?>>
            <?php echo esc_html__( 'Center Bottom', 'blocksy-slider' ); ?>
        </option>
    </select>
</p>

<p>
    <label>
        <?php echo esc_html__( 'Background repeat', 'blocksy-slider' ); ?>
    </label>

    <select name="wpbs_background_repeat" id="wpbs_background_repeat" style="width: 100%;">
        <option value="no-repeat" <?php selected( 'no-repeat', $background_repeat ); ?>>
            <?php echo esc_html__( 'No Repeat', 'blocksy-slider' ); ?>
        </option>
        <option value="repeat" <?php selected( 'repeat', $background_repeat ); ?>>
            <?php echo esc_html__( 'Repeat', 'blocksy-slider' ); ?>
        </option>
        <option value="repeat-x" <?php selected( 'repeat-x', $background_repeat ); ?>>
            <?php echo esc_html__( 'Repeat X', 'blocksy-slider' ); ?>
        </option>
        <option value="repeat-y" <?php selected( 'repeat-y', $background_repeat ); ?>>
            <?php echo esc_html__( 'Repeat Y', 'blocksy-slider' ); ?>
        </option>
    </select>
</p>

<p>
    <label>
        <?php echo esc_html__( 'Background Color', 'blocksy-slider' ); ?>
    </label><br>

    <input type="text" class="wpbs-color-picker" name="wpbs_background_color" id="wpbs_background_color" value="<?php echo esc_attr( $background_color ); ?>" data-default-color="#ffffff">
</p>