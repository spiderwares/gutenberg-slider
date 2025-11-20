<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( $hasSlides || $hasImages ) :
    if ( ! empty( $wpbs_css ) ) : ?>
        <style><?php echo esc_html( $wpbs_css ); ?></style>
    <?php endif; ?>

    <div class="wpbs-swiper swiper swiper-slider-wrapper <?php echo esc_attr($slideshow_main_class); ?>" 
    data-options='<?php echo esc_attr( $options );?>'
    <?php echo wp_kses_post( $wrapper_style ); ?>>
        <div class="swiper-wrapper">
            <?php if ( $hasSlides ) :
                foreach ( $slides as $slide_id => $html ) : ?>
                    <div class="swiper-slide wpbs-slide-<?php echo esc_attr( $slide_id ); ?>">
                        <div class="wpbs-slide-content">
                            <?php echo wp_kses_post( $html ); ?>
                        </div>
                    </div>
                <?php endforeach;
            else :
                foreach( $imageIDs as $imageID ) :
                    $image_style = sprintf(
                        'width: %s; height: %s; object-fit: cover;',
                        esc_attr($width_image),
                        esc_attr($height_image)
                    ); ?>
                    <div class="swiper-slide">
                        <div class="swiper-zoom-container">
                            <img 
                                src="<?php echo esc_url( wp_get_attachment_image_url( $imageID, 'full' ) ); ?>" 
                                alt="" 
                                loading="lazy"
                                style="<?php echo esc_attr($image_style); ?>"
                            />

                            <?php if( $lazy_load ): ?>
                                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach;
            endif; ?>
        </div>

        <!-- Pagination Type -->
        <?php if ( $pagination_type !== 'none' ) : ?>
            <div class="swiper-pagination"></div>
        <?php endif; ?>

        <!-- Scrollbar --->
        <div class="swiper-scrollbar"></div>

        <!-- Next & Prev Button -->
        <?php if( $arrow_style != 'none' ): ?>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        <?php endif; ?>

        <div class="autoplay-progress <?php echo esc_attr($timeleft_class); ?>">
            <svg viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20"></circle>
            </svg>
            <span></span>
        </div>
    </div>

    <!-- Swiper Thumbs Gallery -->
    <?php
        // If thumbnail gallery is enabled and slides/images exist
        if ( ! empty( $thumb_gallery ) && ( $hasSlides || $hasImages ) ) :

            ?>
            <div class="wpbs-swiper-thumbs-gallery swiper">
                <div class="swiper-wrapper">

                    <?php if ( $hasSlides ) : ?>

                        <?php foreach ( $slides as $slide_id => $html ) : ?>
                            <?php
                            $thumb_image_id = get_post_thumbnail_id( $slide_id );
                            $thumb_url = $thumb_image_id ? wp_get_attachment_image_url( $thumb_image_id, array( $thumb_width, $thumb_height ) ) : '';

                            // If no featured image → check slide blocks
                            if ( ! $thumb_url ) :
                                $blocks = parse_blocks( $html );
                                foreach ( $blocks as $block ) :
                                    if ( isset( $block['attrs']['id'] ) ) :
                                        $thumb_url = wp_get_attachment_image_url( $block['attrs']['id'], array( $thumb_width, $thumb_height ) );
                                        if ( $thumb_url ) break;
                                    endif;
                                endforeach;
                            endif;
                            ?>

                            <?php if ( $thumb_url ) : ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo esc_url( $thumb_url ); ?>" 
                                        alt="" 
                                        style="width: <?php echo esc_attr( $thumb_width ); ?>px; 
                                                height: <?php echo esc_attr( $thumb_height ); ?>px; 
                                                object-fit: cover;">
                                </div>
                            <?php endif; ?>

                        <?php endforeach; ?>

                    <?php elseif ( $hasImages ) : ?>

                        <?php foreach ( $imageIDs as $imageID ) : ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_url( wp_get_attachment_image_url( $imageID, array( $thumb_width, $thumb_height ) ) ); ?>" 
                                    alt="" 
                                    style="width: <?php echo esc_attr( $thumb_width ); ?>px; 
                                            height: <?php echo esc_attr( $thumb_height ); ?>px; 
                                            object-fit: cover;">
                            </div>
                        <?php endforeach; ?>

                    <?php endif; ?>

                </div>
            </div>
            <?php

        endif;
        ?>


<?php endif; ?> 
