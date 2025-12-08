<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! isset($slider_id) || empty($slider_id) ) :
    return;
endif;

if ( empty( $settings ) || ! is_array( $settings ) ) :
    return;
endif;

$arrow_color           = isset( $settings['arrow_color'] ) ? $settings['arrow_color'] : '#ffffff';
$arrow_bg_color        = isset( $settings['arrow_bg_color'] ) ? $settings['arrow_bg_color'] : '#000000';
$arrow_hover_color     = isset( $settings['arrow_hover_color'] ) ? $settings['arrow_hover_color'] : '#ffffff';
$arrow_hover_bg_color  = isset( $settings['arrow_hover_bg_color'] ) ? $settings['arrow_hover_bg_color'] : '#333333';
$arrow_border_color    = isset( $settings['arrow_border_color'] ) ? $settings['arrow_border_color'] : '#ffffff';
$arrow_hover_border_color = isset( $settings['arrow_hover_border_color'] ) ? $settings['arrow_hover_border_color'] : $arrow_border_color;
$arrow_style           = isset( $settings['navigation_arrow_style'] ) ? $settings['navigation_arrow_style'] : 'style1';
$arrow_font_size       = isset( $settings['arrow_font_size'] ) ? intval( $settings['arrow_font_size'] ) . 'px' : '30px';
$arrow_border_radius   = isset( $settings['arrow_border_radius'] ) ? intval( $settings['arrow_border_radius'] ) . '%' : '50%';

$bullets_bg_color       = isset( $settings['bullets_bg_color'] ) ? $settings['bullets_bg_color'] : '#ffffff';
$bullets_hover_bg_color = isset( $settings['bullets_hover_bg_color'] ) ? $settings['bullets_hover_bg_color'] : '#ffffff';
$bullets_border_color   = isset( $settings['bullets_border_color'] ) ? $settings['bullets_border_color'] : '#ffffff';
$bullets_style          = isset( $settings['bullets_navigation_style'] ) ? $settings['bullets_navigation_style'] : 'style1';
$unit                   = isset( $settings['arrow_position_unit'] ) ? $settings['arrow_position_unit'] : 'px';
$arrow_top              = isset( $settings['arrow_position_top'] ) ? intval( $settings['arrow_position_top'] ) . $unit : 'auto';
$arrow_bottom           = isset( $settings['arrow_position_bottom'] ) ? intval( $settings['arrow_position_bottom'] ) . $unit : 'auto';
$arrow_left             = isset( $settings['arrow_position_left'] ) ? intval( $settings['arrow_position_left'] ) . $unit : 'auto';
$arrow_right            = isset( $settings['arrow_position_right'] ) ? intval( $settings['arrow_position_right'] ) . $unit : 'auto';

$border_radius_image      = isset( $settings['border_radius_image'] ) ? $settings['border_radius_image'] . 'px' : '0px';
$width_image              = isset( $settings['width_image'] ) ? $settings['width_image'] : '';
$height_image             = isset( $settings['height_image'] ) ? $settings['height_image'] : '';
$image_unit               = isset( $settings['image_unit'] ) ? $settings['image_unit'] : 'px';
$width_image_value        = !empty($width_image) ? $width_image : 500;
$height_image_value       = !empty($height_image) ? $height_image : 500;
$is_vertical              = isset($settings['control_slider_vertical']) && ($settings['control_slider_vertical'] == '1' || $settings['control_slider_vertical'] === true);
$enable_grid_layout       = isset($settings['enable_grid_layout']) && ($settings['enable_grid_layout'] == '1' || $settings['enable_grid_layout'] === true);
$grid_layout_axis         = isset($settings['grid_layout_axis']) ? $settings['grid_layout_axis'] : 'row';
$grid_count               = !empty($settings['grid_count']) ? (int)$settings['grid_count'] : 2;

$control_enable_responsive    = isset( $settings['control_enable_responsive'] ) && ( $settings['control_enable_responsive'] == '1' || $settings['control_enable_responsive'] === true );
$autoplay_timeleft_font_size  = isset( $settings['control_autoplay_timeleft_font_size'] ) ? intval( $settings['control_autoplay_timeleft_font_size'] ) : 20;
$slide_control_view_auto      = isset( $settings['slide_control_view_auto'] ) && ( $settings['slide_control_view_auto'] == '1' || $settings['slide_control_view_auto'] === true );

?>

/* --------------------------- Dynamic Arrow Style --------------------------- */
.wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper-arrow-<?php echo esc_attr( $arrow_style ); ?> .swiper-button-next,
.wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper-arrow-<?php echo esc_attr( $arrow_style ); ?> .swiper-button-prev {
    color: <?php echo esc_html( $arrow_color ); ?>;
    <?php if ( $arrow_style !== 'style1' && $arrow_style !== 'custom' && $arrow_style !== 'style5' ) : ?>
    background-color: <?php echo esc_html( $arrow_bg_color ); ?>;
    <?php endif; ?>
    <?php if ( $arrow_style !== 'style1' && $arrow_style !== 'none' && $arrow_style !== 'style5' ) : ?>
    border-color: <?php echo esc_html( $arrow_border_color ); ?>;
    <?php endif; ?>
    <?php if ( $arrow_style !== 'style3' ) : ?>
    border-radius: <?php echo esc_html( $arrow_border_radius ); ?> !important;
    <?php endif; ?>
}

.wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper-arrow-<?php echo esc_attr( $arrow_style ); ?> .swiper-button-next:hover,
.wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper-arrow-<?php echo esc_attr( $arrow_style ); ?> .swiper-button-prev:hover {
    color: <?php echo esc_html( $arrow_hover_color ); ?>;
    <?php if ( $arrow_style !== 'style1' && $arrow_style !== 'custom' && $arrow_style !== 'style5'  ) : ?>
    background-color: <?php echo esc_html( $arrow_hover_bg_color ); ?>;
    <?php endif; ?>
    <?php if ( $arrow_style !== 'style1' && $arrow_style !== 'none' && $arrow_style !== 'style5' ) : ?>
    border-color: <?php echo esc_html( $arrow_hover_border_color ); ?>;
    <?php endif; ?>
}

.wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper-arrow-<?php echo esc_attr($arrow_style); ?> .swiper-button-next svg,
.wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper-arrow-<?php echo esc_attr($arrow_style); ?> .swiper-button-prev svg {
    height: <?php echo esc_html( $arrow_font_size ); ?> !important;
    <?php if ( $arrow_style === 'style5' || $arrow_style === 'style4' ) : ?>
    display: none;
    <?php endif; ?>
}

<?php if ( $arrow_style === 'custom' ) : ?>
    .wpsp_slider--<?php echo esc_attr( $slider_id ); ?>.wpsp-swiper-arrow-custom .swiper-button-prev {
        <?php if ( $settings['arrow_position_top'] !== '' ) : ?>
            top: <?php echo esc_html( $arrow_top ); ?>;
            bottom: auto;
        <?php elseif ( $settings['arrow_position_bottom'] !== '' ) : ?>
            top: auto;
            bottom: <?php echo esc_html( $arrow_bottom ); ?>;
        <?php endif; ?>

        left: <?php echo esc_html( $arrow_left ); ?>;
        right: auto;
    }

    .wpsp_slider--<?php echo esc_attr( $slider_id ); ?>.wpsp-swiper-arrow-custom .swiper-button-next {
        <?php if ( $settings['arrow_position_top'] !== '' ) : ?>
            top: <?php echo esc_html( $arrow_top ); ?>;
            bottom: auto;
        <?php elseif ( $settings['arrow_position_bottom'] !== '' ) : ?>
            top: auto;
            bottom: <?php echo esc_html( $arrow_bottom ); ?>;
        <?php endif; ?>

        left: auto;
        right: <?php echo esc_html( $arrow_right ); ?>;
    }
<?php endif;

if ( $arrow_style === 'style4' ) : ?>
.wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper-arrow-style4 .swiper-button-next,
.wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper-arrow-style4 .swiper-button-prev {
    color: <?php echo esc_html( $arrow_color ); ?>;
    background-color: <?php echo esc_html( $arrow_bg_color ); ?>;
    border-color: <?php echo esc_html( $arrow_border_color ); ?>;
    font-size: <?php echo esc_html( $arrow_font_size ); ?>;
    border-radius: <?php echo esc_html( $arrow_border_radius ); ?>;
}

.wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper-arrow-style4 .swiper-button-next:hover,
.wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper-arrow-style4 .swiper-button-prev:hover {
    color: <?php echo esc_html( $arrow_hover_color ); ?>;
    background-color: <?php echo esc_html( $arrow_hover_bg_color ); ?>;
    border-color: <?php echo esc_html( $arrow_hover_border_color ); ?>;
}
<?php endif; 

if ( $arrow_style === 'style5' ) : ?>
.wpsp_slider--<?php echo esc_attr( $slider_id ); ?>.wpsp-swiper-arrow-style5 .swiper-button-next,
.wpsp_slider--<?php echo esc_attr( $slider_id ); ?>.wpsp-swiper-arrow-style5 .swiper-button-prev {
    color: <?php echo esc_html( $arrow_color ); ?>;
    font-size: <?php echo esc_html( $arrow_font_size ); ?>;
}

.wpsp_slider--<?php echo esc_attr( $slider_id ); ?>.wpsp-swiper-arrow-style5 .swiper-button-next:hover,
.wpsp_slider--<?php echo esc_attr( $slider_id ); ?>.wpsp-swiper-arrow-style5 .swiper-button-prev:hover {
    color: <?php echo esc_html( $arrow_hover_color ); ?>;
}
<?php endif; ?>

/* --------------------------- End Dynamic Arrow Style --------------------------- */


/*--------------------------- Dynamic Dot Style ---------------------------*/

.wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper-dot-<?php echo esc_attr( $bullets_style ); ?> .swiper-pagination-bullet {
    background-color: <?php echo esc_html( $bullets_bg_color ); ?>;
    background-color: <?php echo esc_html( $bullets_bg_color ); ?>;
    border: 2px solid <?php echo esc_html( $bullets_border_color ); ?>;
}

.wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper-dot-<?php echo esc_attr( $bullets_style ); ?> .swiper-pagination-bullet-active,
.wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper-dot-<?php echo esc_attr( $bullets_style ); ?> .swiper-pagination-bullet:hover {
    background-color: <?php echo esc_html( $bullets_hover_bg_color ); ?>;
    border: 2px solid <?php echo esc_html( $bullets_border_color ); ?>;
}

/* --------------------------- End Dynamic Dot Style --------------------------- */

/*--------------------------- Dynamic Image Style ---------------------------*/

.wpsp_slider--<?php echo esc_attr($slider_id); ?> {
    border-radius: <?php echo esc_html( $border_radius_image ); ?>;
}

/* --------------------------- End Dynamic Image Style --------------------------- */

/*--------------------------- Dynamic Wrapper Style ---------------------------*/

<?php
$width_image_with_unit = $width_image_value . $image_unit;
$height_image_with_unit = $height_image_value . $image_unit;

if ( $is_vertical ) :
?>
    .wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper {
        max-width: <?php echo esc_html( $width_image_with_unit ); ?>;
    }
<?php
elseif ( $enable_grid_layout && $grid_layout_axis === 'row' ) :
    $total_height = $height_image_value * $grid_count;
?>
    .wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper {
        max-width: <?php echo esc_html( $width_image_with_unit ); ?>;
        height: <?php echo esc_html( $total_height . $image_unit ); ?>;
    }
<?php
else :
?>
    .wpsp_slider--<?php echo esc_attr($slider_id); ?>.wpsp-swiper {
        max-width: <?php echo esc_html( $width_image_with_unit ); ?>;
        height: <?php echo esc_html( $height_image_with_unit ); ?>;
    }
<?php
endif;
?>

/* --------------------------- End Dynamic Wrapper Style --------------------------- */


/*--------------------------- Background Settings Style ---------------------------*/

<?php
if ( ! function_exists( 'wpsp_generate_background_css' ) ) {
    function wpsp_generate_background_css( $selector, $bg_settings ) {

        $background_url = '';
        if ( ! empty( $bg_settings['background_id'] ) ) :
            $background_url = wp_get_attachment_image_url( $bg_settings['background_id'], 'full' );
        elseif ( ! empty( $bg_settings['background_url'] ) ) :
            $background_url = $bg_settings['background_url'];
        endif;

        $background_size     = $bg_settings['background_size'] ?? 'cover';
        $background_position = $bg_settings['background_position'] ?? 'center';
        $background_repeat   = $bg_settings['background_repeat'] ?? 'no-repeat';
        $background_color    = $bg_settings['background_color'] ?? '';

        if ( $background_size === 'original' ) :    
            $background_size = 'auto';
        endif;

        if ( ! empty( $background_url ) || ! empty( $background_color ) ) :
            echo esc_attr( $selector ) . " {\n";
            if ( ! empty( $background_color ) ) :
                echo "    background-color: " . esc_html( $background_color ) . ";\n";
            endif;
            if ( ! empty( $background_url ) ) :
                echo "    background-image: url(" . esc_url( $background_url ) . ");\n";
            endif;
            echo "    background-size: " . esc_html( $background_size ) . ";\n";
            echo "    background-position: " . esc_html( $background_position ) . ";\n";
            echo "    background-repeat: " . esc_html( $background_repeat ) . ";\n";
            echo "}\n";
        endif;
    }
}

// Slider background CSS
wpsp_generate_background_css(
    '.wpsp_slider--' . esc_attr( $slider_id ) . '.wpsp-swiper',
    array(
        'background_url'      => $background_url,
        'background_size'     => $background_size,
        'background_position' => $background_position,
        'background_repeat'   => $background_repeat,
        'background_color'    => $background_color,
    )
);

// Slide-specific CSS
if ( ! empty( $background_settings ) && is_array( $background_settings ) ) :
    foreach ( $background_settings as $slide_id => $slide_bg_settings ) :
        wpsp_generate_background_css(
            '.wpsp_slider--' . esc_attr( $slider_id ) . ' .wpsp-slide-' . esc_attr( $slide_id ),
            $slide_bg_settings
        );
    endforeach;
endif;  ?>


/* --------------------------- End Background Settings Style --------------------------- */

/*--------------------------- Dynamic Image Style ---------------------------*/

<?php if ( ! empty( $width_image ) || ! empty( $height_image ) ) : ?>
    <?php if ( $control_enable_responsive ) : ?>
        /* Responsive enabled: flexible width, fixed height */
        .wpsp_slider--<?php echo esc_attr( $slider_id ); ?> .swiper-slide img {
            <?php if ( ! empty( $height_image ) ) : ?>
            height: <?php echo esc_html( $height_image . $image_unit ); ?>;
            <?php endif; ?>
            width: 100%;
            max-width: 100%;
        }
        .wpsp_slider--<?php echo esc_attr( $slider_id ); ?> .swiper-slide {
            height: auto;
        }
    <?php else : ?>
        /* Responsive disabled: fixed width and height */
        .wpsp_slider--<?php echo esc_attr( $slider_id ); ?> .swiper-slide img {
            <?php if ( ! empty( $width_image ) ) : ?>
            width: <?php echo esc_html( $width_image . $image_unit ); ?>;
            <?php endif; ?>
            <?php if ( ! empty( $height_image ) ) : ?>
            height: <?php echo esc_html( $height_image . $image_unit ); ?>;
            <?php endif; ?>
        }
    <?php endif;
endif; ?>

/* --------------------------- End Dynamic Image Style --------------------------- */

/*--------------------------- Dynamic Autoplay Progress Style ---------------------------*/

<?php if ( ! empty( $autoplay_timeleft_font_size ) ) :
    $progress_container_size = round( $autoplay_timeleft_font_size * 2.2 );
?>
    .wpsp_slider--<?php echo esc_attr( $slider_id ); ?> .autoplay-progress {
        width: <?php echo esc_html( $progress_container_size ); ?>px;
        height: <?php echo esc_html( $progress_container_size ); ?>px;
    }
    .wpsp_slider--<?php echo esc_attr( $slider_id ); ?> .autoplay-progress span {
        font-size: <?php echo esc_html( $autoplay_timeleft_font_size ); ?>px;
    }
<?php endif; ?>

/* --------------------------- End Dynamic Autoplay Progress Style --------------------------- */

/*--------------------------- Dynamic Auto Slides ---------------------------*/

<?php if ( $slide_control_view_auto ) :
    $auto_slide_width_default = isset( $settings['auto_slide_width_default'] ) ? floatval( $settings['auto_slide_width_default'] ) : 60;
    $auto_slide_width_2n = isset( $settings['auto_slide_width_2n'] ) ? floatval( $settings['auto_slide_width_2n'] ) : 40;
    $auto_slide_width_3n = isset( $settings['auto_slide_width_3n'] ) ? floatval( $settings['auto_slide_width_3n'] ) : 20;
?>
    .wpsp_slider--<?php echo esc_attr( $slider_id ); ?>.wpsp-auto-slides .swiper-slide {
        width: <?php echo esc_html( $auto_slide_width_default ); ?>% !important;
    }

    .wpsp_slider--<?php echo esc_attr( $slider_id ); ?>.wpsp-auto-slides .swiper-slide:nth-child(2n) {
        width: <?php echo esc_html( $auto_slide_width_2n ); ?>% !important;
    }

    .wpsp_slider--<?php echo esc_attr( $slider_id ); ?>.wpsp-auto-slides .swiper-slide:nth-child(3n) {
        width: <?php echo esc_html( $auto_slide_width_3n ); ?>% !important;
    }
<?php endif; ?>

/* --------------------------- End Dynamic Auto Slides --------------------------- */

/*--------------------------- Dynamic Thumbnail Gallery Border Radius ---------------------------*/

<?php
$thumb_gallery_border_radius = isset( $settings['thumb_gallery_border_radius'] ) ? intval( $settings['thumb_gallery_border_radius'] ) : 0;
if ( $thumb_gallery_border_radius > 0 ) :
?>
    .wpsp-swiper-thumbs-gallery img {
        border-radius: <?php echo esc_html( $thumb_gallery_border_radius ); ?>%;
    }
<?php endif; ?>

/* --------------------------- End Dynamic Thumbnail Gallery Border Radius --------------------------- */

/*--------------------------- Custom CSS ---------------------------*/

<?php
$custom_css = isset( $settings['custom_css'] ) ? $settings['custom_css'] : '';
if ( ! empty( $custom_css ) ) :
    // Output custom CSS wrapped in slider-specific selector for scoping
    echo "\n/* Custom CSS for Slider ID: " . esc_attr( $slider_id ) . " */\n";
    echo wp_kses_post( $custom_css );
    echo "\n";
endif;
?>

/* --------------------------- End Custom CSS --------------------------- */