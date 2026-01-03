<?php 
/**
 * Number Field Template
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<td>
    <div class="slst_number_field">
        <div class="slst_number_wrap">
            <input 
                type="number" 
                id="<?php echo esc_attr( $field_Key ); ?>"
                name="slst_slider_option[<?php echo esc_attr( $field_Key ); ?>]" 
                value="<?php echo esc_attr( $field_Val ); ?>"
                <?php if ( isset( $field['min'] ) ) : ?>
                    min="<?php echo esc_attr( $field['min'] ); ?>"
                <?php endif;
                if ( isset( $field['max'] ) && $field['max'] !== '' ) : ?>
                    max="<?php echo esc_attr( $field['max'] ); ?>"
                <?php endif; ?>
                step="<?php echo isset( $field['step'] ) ? esc_attr( $field['step'] ) : '1'; ?>"
            >

            <?php if ( isset( $field['unit'] ) && is_array( $field['unit'] ) ) :
                if ( isset( $field['unit_disabled'] ) && $field['unit_disabled'] ) : ?>
                    <span class="slst_unit_text">
                        <?php echo esc_html( $field['unit'][ $field['unit_selected'] ] ); ?>
                    </span>
                <?php else :
                    // Use passed options or fallback to get_option
                    $slst_saved_options = isset( $options ) ? $options : get_option( 'slst_slider_option', array() );
                    $slst_selected_unit = isset( $slst_saved_options[ $field_Key . '_unit' ] ) ? $slst_saved_options[ $field_Key . '_unit' ] : ( $field['unit_selected'] ?? '' );
                    ?>
                    <select 
                        name="slst_slider_option[<?php echo esc_attr( $field_Key . '_unit' ); ?>]"
                        class="slst_select"
                        id="<?php echo esc_attr( $field_Key . '_unit' ); ?>"
                    >
                        <?php foreach ( $field['unit'] as $slst_key => $slst_label ) : ?>
                            <option value="<?php echo esc_attr( $slst_key ); ?>" <?php selected( $slst_selected_unit, $slst_key ); ?>>
                                <?php echo esc_html( $slst_label ); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                <?php endif;
            endif; ?>
        </div>
    </div>
    
    <p><?php echo isset( $field['desc'] ) ? wp_kses_post( $field['desc'] ) : ''; ?></p>
</td>
