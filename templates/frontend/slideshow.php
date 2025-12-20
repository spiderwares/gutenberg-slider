<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( $hasSlides || $hasImages ) :
    if ( ! empty( $wpsp_css ) ) : ?>
        <style>
        <?php 
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo wp_strip_all_tags( $wpsp_css ); ?>
        </style>
    <?php endif; ?>

    <div class="wpsp-swiper swiper swiper-slider-wrapper <?php echo esc_attr($slideshow_main_class); ?>"
    data-options='<?php echo esc_attr( $options );?>'>
        <div class="swiper-wrapper">
            <?php if ( $hasSlides ) :
                foreach ( $slides as $slide_id => $html ) : ?>
                    <div class="swiper-slide wpsp-slide-<?php echo esc_attr( $slide_id ); ?>">
                        <div class="wpsp-slide-content">
                            <?php 
                            $rendered_html = function_exists( 'do_blocks' ) ? do_blocks( $html ) : $html;
                            $slide_content = ( ! empty( $lazy_load ) && ( $lazy_load == '1' || $lazy_load === true ) ) 
                                ? WPSP_Helper::wpsp_lazy_load_images( $rendered_html ) 
                                : $rendered_html;
                        
                            if ( ! empty( $zoom_enabled ) ) : ?>
                                <div class="swiper-zoom-container">
                                    <?php echo wp_kses_post( $slide_content ); ?>
                                </div>
                            <?php else :
                                echo wp_kses_post( $slide_content );
                            endif; ?>
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
    <?php if ( ! empty( $thumb_gallery ) && ( $hasSlides || $hasImages ) ) : ?>
        <div class="wpsp-swiper-thumbs-gallery swiper">
            <div class="swiper-wrapper">

                <?php if ( $hasSlides ) :
                    foreach ( $slides as $slide_id => $html ) :
                        $thumb_image_id = get_post_thumbnail_id( $slide_id );
                        $thumb_url      = $thumb_image_id ? wp_get_attachment_image_url( $thumb_image_id, array( $thumb_width, $thumb_height ) ) : '';

                        if ( ! $thumb_url ) :
                            $blocks = parse_blocks( $html );
                            foreach ( $blocks as $block ) :
                                if ( isset( $block['attrs']['id'] ) ) :
                                    $thumb_url = wp_get_attachment_image_url( $block['attrs']['id'], array( $thumb_width, $thumb_height ) );
                                    if ( $thumb_url ) break;
                                endif;
                            endforeach;
                        endif;

                        if ( $thumb_url ) : ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_url( $thumb_url ); ?>" 
                                    alt="" 
                                    style="width: <?php echo esc_attr( $thumb_width ); ?>px; 
                                            height: <?php echo esc_attr( $thumb_height ); ?>px; 
                                            object-fit: cover;">
                            </div>
                        <?php endif;
                    endforeach;
                elseif ( $hasImages ) :
                    foreach ( $imageIDs as $imageID ) : ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url( wp_get_attachment_image_url( $imageID, array( $thumb_width, $thumb_height ) ) ); ?>" 
                                alt="" 
                                style="width: <?php echo esc_attr( $thumb_width ); ?>px; 
                                        height: <?php echo esc_attr( $thumb_height ); ?>px; 
                                        object-fit: cover;">
                        </div>
                    <?php endforeach;
                endif; ?>
            </div>
        </div>
    <?php endif;

endif; ?> 
