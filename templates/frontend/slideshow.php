<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( $hasSlides || $hasImages ) :
    if ( ! empty( $wpss_css ) ) : ?>
        <style>
        <?php 
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo wp_strip_all_tags( $wpss_css ); ?>
        </style>
    <?php endif; ?>

    <div class="wpss-swiper swiper swiper-slider-wrapper <?php echo esc_attr($slideshow_main_class); ?>"
    data-options='<?php echo esc_attr( $options );?>'>
        <div class="swiper-wrapper">
            <?php if ( $hasSlides ) :
                foreach ( $slides as $slide_id => $html ) : ?>
                    <div class="swiper-slide wpss-slide-<?php echo esc_attr( $slide_id ); ?>">
                        <div class="wpss-slide-content">
                            <?php 
                            $slide_content = $html;
                            if ( has_blocks( $slide_content ) ) :
                                $slide_content = do_blocks( $slide_content );
                            endif;
                            $slide_content = do_shortcode( $slide_content );
                            
                            if ( ! empty( $lazy_load ) && ( $lazy_load == '1' || $lazy_load === true ) ) :
                                $slide_content = WPSS_Helper::wpss_lazy_load_images( $slide_content );
                            endif;
                        
                            if ( ! empty( $zoom_enabled ) ) : ?>
                                <div class="swiper-zoom-container">
                                    <?php echo $slide_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </div>
                            <?php else :
                                echo $slide_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
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
        <div class="wpss-swiper-thumbs-gallery swiper">
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

else :
    if ( is_admin() ) : ?>
        <div class="wpss_no_slides_preview">
            <p><?php echo esc_html__( 'No slides found. Please add slides to preview.', 'slider-studio' ); ?></p>
        </div>
    <?php endif; 

endif; ?> 
