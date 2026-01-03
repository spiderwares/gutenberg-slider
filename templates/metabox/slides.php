<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<div class="slst_slides_wrap">
    <ul class="slst_slides">
        <?php
        if ( isset( $slidesData ) && is_array( $slidesData ) && ! empty( $slidesData ) ) :

            foreach ( $slidesData as $slide ) :
                $has_thumb  = ! empty( $slide['thumb'] );
                $slide_id   = isset( $slide['id'] ) ? absint( $slide['id'] ) : 0;
                $slide_type = isset( $slide['type'] ) ? $slide['type'] : 'text';
                $edit_url   = isset( $slide['edit'] ) ? $slide['edit'] : '#';
                ?>
                
                <li data-slide-id="<?php echo esc_attr( $slide_id ); ?>">

                    <?php if ( $has_thumb ) :
                        // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                        <img width="250" src="<?php echo esc_url( $slide['thumb'] ); ?>" alt="Slide Image" />

                    <?php else : 
                        // Placeholder for non-image slides
                        $icon = 'dashicons-align-left';
                        if ( $slide_type === 'video' ) $icon = 'dashicons-video-alt3';
                        if ( $slide_type === 'list' )  $icon = 'dashicons-editor-ul';
                    ?>
                        <div class="slst_slide_placeholder">
                            <span class="dashicons <?php echo esc_attr( $icon ); ?>"></span>
                        </div>
                    <?php endif; ?>

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

                    <input type="hidden" name="slst_slide_ids[]" value="<?php echo esc_attr( $slide_id ); ?>" />
                </li>
            <?php
            endforeach;

        /**
         * Fallback: Legacy imageIDs (older slides)
         */
        elseif ( isset( $imageIDs ) && ! empty( $imageIDs ) && is_array( $imageIDs ) ) :

            foreach ( $imageIDs as $imageID ) :
                $image_src = wp_get_attachment_image_src( $imageID, 'slst_slideshow_thumbnail' )[0] ?? '';
                $slide_id  = isset( $imageSlide[ $imageID ] ) ? absint( $imageSlide[ $imageID ] ) : 0;

                if ( $slide_id ) :
                    $edit_url  = admin_url( "post.php?post=$slide_id&action=edit" );
                else :
                    $slider_id = isset( $slider_id ) ? $slider_id : get_the_ID();
                    $edit_url  = add_query_arg(
                        array(
                            'post_type'     => 'slst_slide',
                            'parent_slider' => $slider_id,
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
