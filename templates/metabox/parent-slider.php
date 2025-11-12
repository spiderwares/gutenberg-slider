<?php 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 
?>

<p>
    <?php if ( $parent_slider ) : ?>
        <input type="hidden" name="parent_id" id="parent_id" value="<?php echo esc_attr( $parent_slider ); ?>">
        <a href="<?php echo esc_url( get_edit_post_link( $parent_slider ) ); ?>">
            <?php echo esc_html( get_the_title( $parent_slider ) ); ?>
        </a>

    <?php else : ?>
        <input type="hidden" name="parent_id" id="parent_id" value="<?php echo esc_attr( wp_get_post_parent_id( $post->ID ) ); ?>">
        <a href="<?php echo esc_url( get_edit_post_link( wp_get_post_parent_id( $post->ID ) ) ); ?>">
            <?php echo esc_html( get_the_title( wp_get_post_parent_id( $post->ID ) ) ); ?>
        </a>

    <?php endif; ?>
</p>

