<?php
/**
 * Select Field Template
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<td>
    <select name="gtbs_slider_option[<?php echo esc_attr($field_Key); ?>]"
            class="gtbs_select gtbs_select_field"
            <?php if (!empty($field['data_hide'])) : ?>
                data-hide="<?php echo esc_attr($field['data_hide']); ?>"
            <?php endif; ?>>

        <?php foreach ($field['options'] as $option_value => $option_label) : 
            $data_show = isset($field['data_show'][$option_value]) ? $field['data_show'][$option_value] : ''; ?>
            <option
                value="<?php echo esc_attr($option_value); ?>"
                <?php if ($data_show) : ?>
                    data-show="<?php echo esc_attr($data_show); ?>"
                <?php endif; ?>
                <?php selected($field_Val, $option_value); ?>
               <?php echo in_array($option_value, isset($field['disabled_options']) ? $field['disabled_options'] : [], true) ? 'disabled' : ''; ?>>
                <?php echo esc_html($option_label); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <p><?php echo isset( $field['desc'] ) ? wp_kses_post( $field['desc'] ) : ''; ?></p>
</td>

