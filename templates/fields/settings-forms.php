<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<table class="form-table">
    <?php if ( isset( $title ) && ! empty( $title ) ) : ?>
    <tr class="heading">
        <th colspan="2">
            <?php echo esc_html( $title ); ?>
        </th>
    </tr>
    <?php endif; ?>
    <tr>
    <?php
        slst_get_template(
            'fields/manage-fields.php',
            array(
                'fields'  => $fields,
                'options' => isset( $options ) ? $options : array(),
            ),
        );
    ?>
    </tr>
</table>