<?php
/**
 * Pro version field
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<td>
    <div class="gtbs_pro_message">
        <?php 
            if ( ! empty( $field['pro_version_message'] ) ) :
                echo esc_html( $field['pro_version_message'] );
            else:
                echo esc_html__( 'This feature is available in the Pro version only.', 'gutenberg-slider' );
            endif;
        ?>

        <?php echo esc_html__( 'Click', 'gutenberg-slider' ); ?>
        <a href="<?php echo esc_url( GTBS_PRO_VERSION_URL ); ?>" target="_blank">
            <?php echo esc_html__( 'here', 'gutenberg-slider' ); ?>
        </a>
        <?php echo esc_html__( ' to buy', 'gutenberg-slider' ); ?>.
    </div>
</td>