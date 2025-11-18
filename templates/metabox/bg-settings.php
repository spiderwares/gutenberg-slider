<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Add nonce field for slide background settings
wp_nonce_field( 'wpsbs_slideshow_metabox_data', 'wpsbs_slideshow_metabox_nonce' );
?>

<p>
    <label>
        <?php echo esc_html__( 'Background size', 'smart-block-slider' ); ?>
    </label>

    <select name="wpsbs_background_size" id="wpsbs_background_size" style="width: 100%;">
        <option value="cover" <?php selected( 'cover', $background_size ); ?>>
            <?php echo esc_html__( 'Cover', 'smart-block-slider' ); ?>
        </option>
        <option value="contain" <?php selected( 'contain', $background_size ); ?>>
            <?php echo esc_html__( 'Contain', 'smart-block-slider' ); ?>
        </option>
        <option value="original" <?php selected( 'original', $background_size ); ?>>
            <?php echo esc_html__( 'Original', 'smart-block-slider' ); ?>
        </option>
    </select>
</p>

<p>
    <label>
        <?php echo esc_html__( 'Background position', 'smart-block-slider' ); ?>
    </label>

    <select name="wpsbs_background_position" id="wpsbs_background_position" style="width: 100%;">
        <option value="center" <?php selected( 'center', $background_position ); ?>>
            <?php echo esc_html__( 'Center', 'smart-block-slider' ); ?>
        </option>
        <option value="left top" <?php selected( 'left top', $background_position ); ?>>
            <?php echo esc_html__( 'Left Top', 'smart-block-slider' ); ?>
        </option>
        <option value="left center" <?php selected( 'left center', $background_position ); ?>>
            <?php echo esc_html__( 'Left Center', 'smart-block-slider' ); ?>
        </option>
        <option value="left bottom" <?php selected( 'left bottom', $background_position ); ?>>
            <?php echo esc_html__( 'Left Bottom', 'smart-block-slider' ); ?>
        </option>
        <option value="right top" <?php selected( 'right top', $background_position ); ?>>
            <?php echo esc_html__( 'Right Top', 'smart-block-slider' ); ?>
        </option>
        <option value="right center" <?php selected( 'right center', $background_position ); ?>>
            <?php echo esc_html__( 'Right Center', 'smart-block-slider' ); ?>
        </option>
        <option value="right bottom" <?php selected( 'right bottom', $background_position ); ?>>
            <?php echo esc_html__( 'Right Bottom', 'smart-block-slider' ); ?>
        </option>
        <option value="center top" <?php selected( 'center top', $background_position ); ?>>
            <?php echo esc_html__( 'Center Top', 'smart-block-slider' ); ?>
        </option>
        <option value="center bottom" <?php selected( 'center bottom', $background_position ); ?>>
            <?php echo esc_html__( 'Center Bottom', 'smart-block-slider' ); ?>
        </option>
    </select>
</p>

<p>
    <label>
        <?php echo esc_html__( 'Background repeat', 'smart-block-slider' ); ?>
    </label>

    <select name="wpsbs_background_repeat" id="wpsbs_background_repeat" style="width: 100%;">
        <option value="no-repeat" <?php selected( 'no-repeat', $background_repeat ); ?>>
            <?php echo esc_html__( 'No Repeat', 'smart-block-slider' ); ?>
        </option>
        <option value="repeat" <?php selected( 'repeat', $background_repeat ); ?>>
            <?php echo esc_html__( 'Repeat', 'smart-block-slider' ); ?>
        </option>
        <option value="repeat-x" <?php selected( 'repeat-x', $background_repeat ); ?>>
            <?php echo esc_html__( 'Repeat X', 'smart-block-slider' ); ?>
        </option>
        <option value="repeat-y" <?php selected( 'repeat-y', $background_repeat ); ?>>
            <?php echo esc_html__( 'Repeat Y', 'smart-block-slider' ); ?>
        </option>
    </select>
</p>

<p>
    <label>
        <?php echo esc_html__( 'Background Color', 'smart-block-slider' ); ?>
    </label><br>

    <input type="text" class="wpsbs-color-picker" name="wpsbs_background_color" id="wpsbs_background_color" value="<?php echo esc_attr( $background_color ); ?>" data-default-color="#ffffff">
</p>