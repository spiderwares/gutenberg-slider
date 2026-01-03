<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( $hasSlides || $hasImages ) :
    if ( ! empty( $slst_css ) ) : ?>
        <style><?php echo esc_html( $slst_css ); ?></style>
    <?php endif; ?>

    <div class="slst-swiper swiper swiper-slider-wrapper <?php echo esc_attr($slideshow_main_class); ?>"
    data-options='<?php echo esc_attr( $options );?>'>
        <div class="swiper-wrapper">
            <?php if ( $hasSlides ) :
                foreach ( $slides as $slst_slide_id => $slst_html ) : ?>
                    <div class="swiper-slide slst-slide-<?php echo esc_attr( $slst_slide_id ); ?>">
                        <div class="slst-slide-content">
                            <?php 
                            $slst_slide_content = $slst_html;
                            if ( has_blocks( $slst_slide_content ) ) :
                                $slst_slide_content = do_blocks( $slst_slide_content );
                            endif;
                            $slst_slide_content = do_shortcode( $slst_slide_content );
                            
                            if ( ! empty( $lazy_load ) && ( $lazy_load == '1' || $lazy_load === true ) ) :
                                $slst_slide_content = SLST_Helper::slst_lazy_load_images( $slst_slide_content );
                            endif;
                        
                            if ( ! empty( $zoom_enabled ) ) : ?>
                                <div class="swiper-zoom-container">
                                    <?php echo wp_kses_post( $slst_slide_content ); ?>
                                </div>
                            <?php else :
                                echo wp_kses_post( $slst_slide_content );
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
        <div class="slst-swiper-thumbs-gallery swiper">
            <div class="swiper-wrapper">

                <?php if ( $hasSlides ) :
                    foreach ( $slides as $slst_slide_id => $slst_html ) :
                        $slst_thumb_image_id = get_post_thumbnail_id( $slst_slide_id );
                        $slst_thumb_url      = $slst_thumb_image_id ? wp_get_attachment_image_url( $slst_thumb_image_id, array( $thumb_width, $thumb_height ) ) : '';

                        if ( ! $slst_thumb_url ) :
                            $slst_blocks = parse_blocks( $slst_html );
                            foreach ( $slst_blocks as $slst_block ) :
                                if ( isset( $slst_block['attrs']['id'] ) ) :
                                    $slst_thumb_url = wp_get_attachment_image_url( $slst_block['attrs']['id'], array( $thumb_width, $thumb_height ) );
                                    if ( $slst_thumb_url ) break;
                                endif;
                            endforeach;
                        endif;

                        if ( $slst_thumb_url ) : ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_url( $slst_thumb_url ); ?>" 
                                    alt="" 
                                    style="width: <?php echo esc_attr( $thumb_width ); ?>px; 
                                            height: <?php echo esc_attr( $thumb_height ); ?>px; 
                                            object-fit: cover;">
                            </div>
                        <?php endif;
                    endforeach;
                elseif ( $hasImages ) :
                    foreach ( $slst_imageIDs as $slst_imageID ) : ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url( wp_get_attachment_image_url( $slst_imageID, array( $thumb_width, $thumb_height ) ) ); ?>" 
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

else :
    if ( is_admin() ) : ?>
        <div class="slst_no_slides_preview">
            <p><?php echo esc_html__( 'No slides found. Please add slides to preview.', 'slider-studio' ); ?></p>
        </div>
    <?php endif; 

endif; ?> 
