<?php
/**
 * Select Field Template
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<td>
    <select name="slst_slider_option[<?php echo esc_attr($field_Key); ?>]"
            class="slst_select slst_select_field"
            <?php if (!empty($field['data_hide'])) : ?>
                data-hide="<?php echo esc_attr($field['data_hide']); ?>"
            <?php endif; ?>>

        <?php foreach ($field['options'] as $slst_option_value => $slst_option_label) : 
            $slst_data_show = isset($field['data_show'][$slst_option_value]) ? $field['data_show'][$slst_option_value] : ''; ?>
            <option
                value="<?php echo esc_attr($slst_option_value); ?>"
                <?php if ($slst_data_show) : ?>
                    data-show="<?php echo esc_attr($slst_data_show); ?>"
                <?php endif; ?>
                <?php selected($field_Val, $slst_option_value); ?>
               <?php echo in_array($slst_option_value, isset($field['disabled_options']) ? $field['disabled_options'] : [], true) ? 'disabled' : ''; ?>>
                <?php echo esc_html($slst_option_label); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <p><?php echo isset( $field['desc'] ) ? wp_kses_post( $field['desc'] ) : ''; ?></p>
</td>

