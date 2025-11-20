<?php
/**
 * Text Field Template
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<td>
    <input 
        type="text"
        id="<?php echo esc_attr( $field_Key ); ?>"
        name="wpbs_slider_option[<?php echo esc_attr( $field_Key ); ?>]"
        value="<?php echo esc_attr( $field_Val ); ?>"
        class="wpbs_input"
        placeholder="<?php echo isset( $field['placeholder'] ) ? esc_attr( $field['placeholder'] ) : ''; ?>"
    />
    <p><?php echo isset( $field['desc'] ) ? wp_kses_post( $field['desc'] ) : ''; ?></p>
</td>

