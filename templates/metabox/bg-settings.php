<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Add nonce field for slide background settings
wp_nonce_field( 'bs_slideshow_metabox_data', 'bs_slideshow_metabox_nonce' );
?>

<p>
    <label>
        <?php echo esc_html__( 'Background size', 'block-slider' ); ?>
    </label>

    <select name="bs_background_size" id="bs_background_size" style="width: 100%;">
        <option value="cover" <?php selected( 'cover', $background_size ); ?>>
            <?php echo esc_html__( 'Cover', 'block-slider' ); ?>
        </option>
        <option value="contain" <?php selected( 'contain', $background_size ); ?>>
            <?php echo esc_html__( 'Contain', 'block-slider' ); ?>
        </option>
        <option value="original" <?php selected( 'original', $background_size ); ?>>
            <?php echo esc_html__( 'Original', 'block-slider' ); ?>
        </option>
    </select>
</p>

<p>
    <label>
        <?php echo esc_html__( 'Background position', 'block-slider' ); ?>
    </label>

    <select name="bs_background_position" id="bs_background_position" style="width: 100%;">
        <option value="center" <?php selected( 'center', $background_position ); ?>>
            <?php echo esc_html__( 'Center', 'block-slider' ); ?>
        </option>
        <option value="left top" <?php selected( 'left top', $background_position ); ?>>
            <?php echo esc_html__( 'Left Top', 'block-slider' ); ?>
        </option>
        <option value="left center" <?php selected( 'left center', $background_position ); ?>>
            <?php echo esc_html__( 'Left Center', 'block-slider' ); ?>
        </option>
        <option value="left bottom" <?php selected( 'left bottom', $background_position ); ?>>
            <?php echo esc_html__( 'Left Bottom', 'block-slider' ); ?>
        </option>
        <option value="right top" <?php selected( 'right top', $background_position ); ?>>
            <?php echo esc_html__( 'Right Top', 'block-slider' ); ?>
        </option>
        <option value="right center" <?php selected( 'right center', $background_position ); ?>>
            <?php echo esc_html__( 'Right Center', 'block-slider' ); ?>
        </option>
        <option value="right bottom" <?php selected( 'right bottom', $background_position ); ?>>
            <?php echo esc_html__( 'Right Bottom', 'block-slider' ); ?>
        </option>
        <option value="center top" <?php selected( 'center top', $background_position ); ?>>
            <?php echo esc_html__( 'Center Top', 'block-slider' ); ?>
        </option>
        <option value="center bottom" <?php selected( 'center bottom', $background_position ); ?>>
            <?php echo esc_html__( 'Center Bottom', 'block-slider' ); ?>
        </option>
    </select>
</p>

<p>
    <label>
        <?php echo esc_html__( 'Background repeat', 'block-slider' ); ?>
    </label>

    <select name="bs_background_repeat" id="bs_background_repeat" style="width: 100%;">
        <option value="no-repeat" <?php selected( 'no-repeat', $background_repeat ); ?>>
            <?php echo esc_html__( 'No Repeat', 'block-slider' ); ?>
        </option>
        <option value="repeat" <?php selected( 'repeat', $background_repeat ); ?>>
            <?php echo esc_html__( 'Repeat', 'block-slider' ); ?>
        </option>
        <option value="repeat-x" <?php selected( 'repeat-x', $background_repeat ); ?>>
            <?php echo esc_html__( 'Repeat X', 'block-slider' ); ?>
        </option>
        <option value="repeat-y" <?php selected( 'repeat-y', $background_repeat ); ?>>
            <?php echo esc_html__( 'Repeat Y', 'block-slider' ); ?>
        </option>
    </select>
</p>

<p>
    <label>
        <?php echo esc_html__( 'Background Color', 'block-slider' ); ?>
    </label><br>

    <input type="text" class="bs-color-picker" name="bs_background_color" id="bs_background_color" value="<?php echo esc_attr( $background_color ); ?>" data-default-color="#ffffff">
</p>