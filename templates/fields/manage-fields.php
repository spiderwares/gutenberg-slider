<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

foreach( $fields as $field_Key => $field ) :
    $field_Val  = isset( $options[$field_Key] ) ? $options[$field_Key] : ( isset( $field['default'] ) ? $field['default'] : '' );
    $row_class  = isset( $field['extra_class'] ) ? $field['extra_class'] : '' ;
    $visible    = !$row_class || strpos(json_encode($options), $row_class) !== false; ?>

    <tr class="<?php echo esc_attr($row_class); ?>" style="<?php echo $visible ? '' : 'display: none;'; ?>">

        <th scope="row">
            <?php echo esc_html( $field['title'] ); ?>
        </th>

        <?php 
        switch( $field['field_type'] ) :
            
            case "wpssradio" : 
                wpss_get_template(
                    'fields/radio-field.php',
                    array(
                        'field'     => $field,
                        'field_Val' => $field_Val,
                        'field_Key' => $field_Key
                    )
                );
                break;

            case "wpssswitch" : 
                wpss_get_template( 
                    'fields/switch-field.php',
                    array(
                        'field'     => $field,
                        'field_Val' => $field_Val,
                        'field_Key' => $field_Key 
                    ) 
                );
                break;

            case "wpssnumber":
                wpss_get_template( 
                    'fields/number-field.php', 
                    array(
                        'field'     => $field,
                        'field_Val' => $field_Val,
                        'field_Key' => $field_Key,
                        'options'   => $options
                    ) 
                );
                break;
                
            case "wpsscolor":
                wpss_get_template( 
                    'fields/color-field.php', 
                    array(
                        'field'     => $field,
                        'field_Val' => $field_Val,
                        'field_Key' => $field_Key 
                    ) 
                );
                break;

            case "wpssselect":
                wpss_get_template( 
                    'fields/select-field.php', 
                    array(
                        'field'     => $field,
                        'field_Val' => $field_Val,
                        'field_Key' => $field_Key 
                    ) 
                );
                break;

            case "wpsstextarea":
                wpss_get_template(
                    'fields/textarea-field.php',
                    array(
                        'field'     => $field,
                        'field_Val' => $field_Val,
                        'field_Key' => $field_Key
                    )
                );
                break;

            case "wpsstext":
                wpss_get_template(
                    'fields/text-field.php',
                    array(
                        'field'     => $field,
                        'field_Val' => $field_Val,
                        'field_Key' => $field_Key
                    )
                );
                break;

        endswitch; ?>
    </tr>
<?php endforeach; ?>