<?php 
/**
 * Radio Image Field Template
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<td>
    <?php if ( isset( $field['options'] ) ) : ?>
        <div class="wpsbs_radio_field" <?php echo isset( $field['data_hide'] ) ? 'data-hide="' . esc_attr( $field['data_hide'] ) . '"' : ''; ?>>
            <?php foreach ( $field['options'] as $optionKey => $optionImg ) : ?>
                <p class="wpsbs_image_control <?php echo in_array( $optionKey, $field['disabled_options'] ?? array() ) ? 'wpsbs_disabled_option' : ''; ?>">
                    <input 
                        type="radio" 
                        name="wpsbs_slider_option[<?php echo esc_attr( $field_Key ); ?>]"
                        value="<?php echo esc_attr( $optionKey ); ?>"
                        id="<?php echo esc_attr( $field_Key . '_' . $optionKey ); ?>"
                        <?php checked( $optionKey, $field_Val ); ?>
                        <?php echo in_array( $optionKey, $field['disabled_options'] ?? array() ) ? 'disabled' : ''; ?>
                        data-show="<?php echo esc_attr( $field['data_show'][ $optionKey ] ?? '' ); ?>"
                    >

                    <label for="<?php echo esc_attr( $field_Key . '_' . $optionKey ); ?>">
                        <img 
                            width="150" 
                            src="<?php echo esc_url( WPSBS_URL . 'assets/images/options/' . $optionImg ); ?>" 
                            alt="<?php echo esc_attr( $optionKey ); ?>"
                            style="<?php echo in_array( $optionKey, $field['disabled_options'] ?? array() ) ? 'opacity: 0.5; cursor: not-allowed;' : ''; ?>"
                        >
                        <?php echo esc_html( $optionKey ); ?>
                    </label>
                </p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</td>


