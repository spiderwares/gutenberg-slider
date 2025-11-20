<?php
/**
 * Textarea Field Template
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<td>
    <div class="wpbs-textarea-wrapper">
        <div class="wpbs-line-numbers"></div>
        <textarea 
            id="<?php echo esc_attr( $field_Key ); ?>"
            name="wpbs_slider_option[<?php echo esc_attr( $field_Key ); ?>]"
            rows="<?php echo isset( $field['rows'] ) ? esc_attr( $field['rows'] ) : '10'; ?>"
            cols="<?php echo isset( $field['cols'] ) ? esc_attr( $field['cols'] ) : '50'; ?>"
            class="wpbs_textarea wpbs_input wpbs_custom_textarea"
            placeholder="<?php echo isset( $field['placeholder'] ) ? esc_attr( $field['placeholder'] ) : ''; ?>"
        ><?php echo esc_textarea( $field_Val ); ?></textarea>
    </div>
    <p><?php echo isset( $field['desc'] ) ? wp_kses_post( $field['desc'] ) : ''; ?></p>
</td>

