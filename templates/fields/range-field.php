<?php 
/**
 * Range Field Template
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<td>
	<div class="wpsbs_range_field">
		<div class="wpsbs_range_wrap">
			<input
				type="range"
				id="<?php echo esc_attr( $field_Key ); ?>"
				name="wpsbs_slider_option[<?php echo esc_attr( $field_Key ); ?>]"
				value="<?php echo esc_attr( $field_Val ); ?>"
				min="<?php echo isset( $field['min'] ) ? esc_attr( $field['min'] ) : '0'; ?>"
				max="<?php echo isset( $field['max'] ) ? esc_attr( $field['max'] ) : '100'; ?>"
				step="<?php echo isset( $field['step'] ) ? esc_attr( $field['step'] ) : '1'; ?>"
				class="wpsbs_input wpsbs_input_range"
				oninput="this.nextElementSibling.value=this.value"
			>
			<output class="wpsbs_range_value"><?php echo esc_html( $field_Val ); ?></output>

			<?php if ( isset( $field['unit'] ) && is_array( $field['unit'] ) ) : ?>
				<?php if ( isset( $field['unit_disabled'] ) && $field['unit_disabled'] ) : ?>
					<span class="wpsbs_unit_text">
						<?php echo esc_html( $field['unit'][ $field['unit_selected'] ] ); ?>
					</span>
				<?php else : ?>
					<?php
					$options = get_option( 'wpsbs_slider_option', array() );
					$selected_unit = isset( $options[ $field_Key . '_unit' ] )
						? $options[ $field_Key . '_unit' ]
						: ( $field['unit_selected'] ?? '' );
					?>
					<select name="wpsbs_slider_option[<?php echo esc_attr( $field_Key . '_unit' ); ?>]">
						<?php foreach ( $field['unit'] as $key => $label ) : ?>
							<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $selected_unit, $key ); ?>>
								<?php echo esc_html( $label ); ?>
							</option>
						<?php endforeach; ?>
					</select>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>

	<p><?php echo isset( $field['desc'] ) ? wp_kses_post( $field['desc'] ) : ''; ?></p>
</td>