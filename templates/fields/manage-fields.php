<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

foreach( $fields as $slst_field_Key => $slst_field ) :
    $slst_field_Val  = isset( $options[$slst_field_Key] ) ? $options[$slst_field_Key] : ( isset( $slst_field['default'] ) ? $slst_field['default'] : '' );
    $slst_row_class  = isset( $slst_field['extra_class'] ) ? $slst_field['extra_class'] : '' ;
    $slst_visible    = !$slst_row_class || strpos(json_encode($options), $slst_row_class) !== false; ?>

    <tr class="<?php echo esc_attr($slst_row_class); ?>" style="<?php echo $slst_visible ? '' : 'display: none;'; ?>">

        <th scope="row">
            <?php echo esc_html( $slst_field['title'] ); ?>
        </th>

        <?php 
        switch( $slst_field['field_type'] ) :
            
            case "slstradio" : 
                slst_get_template(
                    'fields/radio-field.php',
                    array(
                        'field'     => $slst_field,
                        'field_Val' => $slst_field_Val,
                        'field_Key' => $slst_field_Key
                    )
                );
                break;

            case "slstswitch" : 
                slst_get_template( 
                    'fields/switch-field.php',
                    array(
                        'field'     => $slst_field,
                        'field_Val' => $slst_field_Val,
                        'field_Key' => $slst_field_Key 
                    ) 
                );
                break;

            case "slstnumber":
                slst_get_template( 
                    'fields/number-field.php', 
                    array(
                        'field'     => $slst_field,
                        'field_Val' => $slst_field_Val,
                        'field_Key' => $slst_field_Key,
                        'options'   => $options
                    ) 
                );
                break;
                
            case "slstcolor":
                slst_get_template( 
                    'fields/color-field.php', 
                    array(
                        'field'     => $slst_field,
                        'field_Val' => $slst_field_Val,
                        'field_Key' => $slst_field_Key 
                    ) 
                );
                break;

            case "slstselect":
                slst_get_template( 
                    'fields/select-field.php', 
                    array(
                        'field'     => $slst_field,
                        'field_Val' => $slst_field_Val,
                        'field_Key' => $slst_field_Key 
                    ) 
                );
                break;

            case "slsttextarea":
                slst_get_template(
                    'fields/textarea-field.php',
                    array(
                        'field'     => $slst_field,
                        'field_Val' => $slst_field_Val,
                        'field_Key' => $slst_field_Key
                    )
                );
                break;

            case "slsttext":
                slst_get_template(
                    'fields/text-field.php',
                    array(
                        'field'     => $slst_field,
                        'field_Val' => $slst_field_Val,
                        'field_Key' => $slst_field_Key
                    )
                );
                break;

        endswitch; ?>
    </tr>
<?php endforeach; ?>