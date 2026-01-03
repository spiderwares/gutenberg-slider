<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<div class="slst_slides_wrap">
    <ul class="slst_slides">
        <?php
        if ( isset( $slidesData ) && is_array( $slidesData ) && ! empty( $slidesData ) ) :

            foreach ( $slidesData as $slst_slide ) :
                $slst_has_thumb  = ! empty( $slst_slide['thumb'] );
                $slst_slide_id   = isset( $slst_slide['id'] ) ? absint( $slst_slide['id'] ) : 0;
                $slst_slide_type = isset( $slst_slide['type'] ) ? $slst_slide['type'] : 'text';
                $slst_edit_url   = isset( $slst_slide['edit'] ) ? $slst_slide['edit'] : '#';
                ?>
                
                <li data-slide-id="<?php echo esc_attr( $slst_slide_id ); ?>">

                    <?php if ( $slst_has_thumb ) :
                        // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                        <img width="250" src="<?php echo esc_url( $slst_slide['thumb'] ); ?>" alt="Slide Image" />

                    <?php else : 
                        // Placeholder for non-image slides
                        $slst_icon = 'dashicons-align-left';
                        if ( $slst_slide_type === 'video' ) $slst_icon = 'dashicons-video-alt3';
                        if ( $slst_slide_type === 'list' )  $slst_icon = 'dashicons-editor-ul';
                    ?>
                        <div class="slst_slide_placeholder">
                            <span class="dashicons <?php echo esc_attr( $slst_icon ); ?>"></span>
                        </div>
                    <?php endif; ?>

                    <div class="slst_slide_actions">
                        <a href="<?php echo esc_url( $slst_edit_url ); ?>" class="slst_slide_edit" target="_blank">
                            <span class="tooltip"><?php echo esc_html__( 'Edit', 'slider-studio' ); ?></span>
                            <i class="dashicons dashicons-edit"></i>
                        </a>

                        <a href="#" class="slst_slide_move">
                            <span class="tooltip"><?php echo esc_html__( 'Drag & Sort', 'slider-studio' ); ?></span>
                            <i class="dashicons dashicons-move"></i>
                        </a>

                        <a href="#" class="slst_slide_remove">
                            <span class="tooltip"><?php echo esc_html__( 'Delete', 'slider-studio' ); ?></span>
                            <i class="dashicons dashicons-trash"></i>
                        </a>
                    </div>

                    <input type="hidden" name="slst_slide_ids[]" value="<?php echo esc_attr( $slst_slide_id ); ?>" />
                </li>
            <?php
            endforeach;

        /**
         * Fallback: Legacy imageIDs (older slides)
         */
        elseif ( isset( $imageIDs ) && ! empty( $imageIDs ) && is_array( $imageIDs ) ) :

            foreach ( $imageIDs as $slst_imageID ) :
                $slst_image_src = wp_get_attachment_image_src( $slst_imageID, 'slst_slideshow_thumbnail' )[0] ?? '';
                $slst_slide_id  = isset( $imageSlide[ $slst_imageID ] ) ? absint( $imageSlide[ $slst_imageID ] ) : 0;

                if ( $slst_slide_id ) :
                    $slst_edit_url  = admin_url( "post.php?post=$slst_slide_id&action=edit" );
                else :
                    $slst_slider_id = isset( $slst_slider_id ) ? $slst_slider_id : get_the_ID();
                    $slst_edit_url  = add_query_arg(
                        array(
                            'post_type'     => 'slst_slide',
                            'parent_slider' => $slst_slider_id,
                        ),
                        admin_url( 'post-new.php' )
                    );
                endif;
                ?>
                
                <li>
                    <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                    <img width="250" src="<?php echo esc_url( $image_src ); ?>" alt="Slide Thumbnail" />

                    <div class="slst_slide_actions">
                        <a href="<?php echo esc_url( $edit_url ); ?>" class="slst_slide_edit" target="_blank">
                            <span class="tooltip"><?php echo esc_html__( 'Edit', 'slider-studio' ); ?></span>
                            <i class="dashicons dashicons-edit"></i>
                        </a>

                        <a href="#" class="slst_slide_move">
                            <span class="tooltip"><?php echo esc_html__( 'Drag & Sort', 'slider-studio' ); ?></span>
                            <i class="dashicons dashicons-move"></i>
                        </a>

                        <a href="#" class="slst_slide_remove">
                            <span class="tooltip"><?php echo esc_html__( 'Delete', 'slider-studio' ); ?></span>
                            <i class="dashicons dashicons-trash"></i>
                        </a>
                    </div>

                    <input type="hidden" name="slst_slider_image_ids[]" value="<?php echo esc_attr( $imageID ); ?>" />
                </li>
            <?php
            endforeach;

        endif;
        ?>
    </ul>

    <div style="clear: both;"></div>

    <?php
    // Nonce field for security
    wp_nonce_field( 'slst_slideshow_metabox_data', 'slst_slideshow_metabox_nonce' );
    
    if ( $is_saved ) : ?>
        <a href="<?php echo esc_url( $add_slide_url ); ?>" class="button slst_upload_slide">
            <?php echo esc_html__( 'Add New Slide', 'slider-studio' ); ?>
        </a>
    <?php else : ?>
        <p class="slst_add_slide_message">
            <?php echo esc_html__( 'Save your slider with a title to begin adding slides.', 'slider-studio' ); ?>
        </p>
    <?php endif; ?>
</div>
