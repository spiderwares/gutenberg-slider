<?php
/**
 * Color Field Template
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<td>
    <p class="bs-color-control <?php echo isset($field['class']) ? esc_attr($field['class']) : ''; ?>">
        <label for="<?php echo esc_attr( $field_Key ); ?>">
            <input 
                type="text" 
                class="bs-color-picker" 
                name="bs_slider_option[<?php echo esc_attr( $field_Key ); ?>]" 
                id="<?php echo esc_attr( $field_Key ); ?>" 
                value="<?php echo esc_attr( $field_Val ); ?>" 
                data-default-color="<?php echo esc_attr( isset( $field['default'] ) ? $field['default'] : '#ff0000' ); ?>" 
                data-alpha-enabled="true"
            />
        </label>
    </p>
</td>