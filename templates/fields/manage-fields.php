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
            
            case "gtbsradio" : 
                gtbs_get_template(
                    'fields/radio-field.php',
                    array(
                        'field'     => $field,
                        'field_Val' => $field_Val,
                        'field_Key' => $field_Key
                    )
                );
                break;

            case "gtbsswitch" : 
                gtbs_get_template( 
                    'fields/switch-field.php',
                    array(
                        'field'     => $field,
                        'field_Val' => $field_Val,
                        'field_Key' => $field_Key 
                    ) 
                );
                break;

            case "gtbsnumber":
                gtbs_get_template( 
                    'fields/number-field.php', 
                    array(
                        'field'     => $field,
                        'field_Val' => $field_Val,
                        'field_Key' => $field_Key 
                    ) 
                );
                break;
                
            case "gtbscolor":
                gtbs_get_template( 
                    'fields/color-field.php', 
                    array(
                        'field'     => $field,
                        'field_Val' => $field_Val,
                        'field_Key' => $field_Key 
                    ) 
                );
                break;

            case "gtbsselect":
                gtbs_get_template( 
                    'fields/select-field.php', 
                    array(
                        'field'     => $field,
                        'field_Val' => $field_Val,
                        'field_Key' => $field_Key 
                    ) 
                );
                break;

            case "gtbsrange":
                gtbs_get_template( 
                    'fields/range-field.php', 
                    array(
                        'field'     => $field,
                        'field_Val' => $field_Val,
                        'field_Key' => $field_Key 
                    ) 
                );
                break;

            case "gtbspro":
                gtbs_get_template(
                    'fields/pro-field.php',
                    array(
                        'field'      => $field,
                        'field_Val'  => $field_Val,
                        'field_Key'  => $field_Key
                    )
                );
                break;

        endswitch; ?>
    </tr>
<?php endforeach; ?>