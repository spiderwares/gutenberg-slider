<?php
/**
 * Color Field Template
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<td>
    <div class="slst-color-control <?php echo isset($field['class']) ? esc_attr($field['class']) : ''; ?>">
        <label for="<?php echo esc_attr( $field_Key ); ?>">
            <input 
                type="text" 
                class="slst-color-picker" 
                name="slst_slider_option[<?php echo esc_attr( $field_Key ); ?>]" 
                id="<?php echo esc_attr( $field_Key ); ?>" 
                value="<?php echo esc_attr( $field_Val ); ?>" 
                data-default-color="<?php echo esc_attr( isset( $field['default'] ) ? $field['default'] : '#ff0000' ); ?>" 
                data-alpha-enabled="true"
            />
        </label>
    </div>
</td>