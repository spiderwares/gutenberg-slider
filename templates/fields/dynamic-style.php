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

$border_radius_image      = isset( $settings['border_radius_image'] ) ? $settings['border_radius_image'] . '%' : '0%';
$height_image              = isset( $settings['height_image'] ) ? $settings['height_image'] : '';
$image_unit                = isset( $settings['image_unit'] ) ? $settings['image_unit'] : 'px';
$control_enable_responsive = isset( $settings['control_enable_responsive'] ) && ( $settings['control_enable_responsive'] == '1' || $settings['control_enable_responsive'] === true );
?>


/* --------------------------- Dynamic Arrow Style --------------------------- */
.bs_slider--<?php echo esc_attr($slider_id); ?>.bs-swiper-arrow-<?php echo esc_attr( $arrow_style ); ?> .swiper-button-next,
.bs_slider--<?php echo esc_attr($slider_id); ?>.bs-swiper-arrow-<?php echo esc_attr( $arrow_style ); ?> .swiper-button-prev {
    color: <?php echo esc_html( $arrow_color ); ?>;
    <?php if ( $arrow_style !== 'style1' && $arrow_style !== 'custom' && $arrow_style !== 'style5' ) : ?>
    background-color: <?php echo esc_html( $arrow_bg_color ); ?>;
    <?php endif; ?>
    <?php if ( $arrow_style !== 'style1' && $arrow_style !== 'none' && $arrow_style !== 'style5' ) : ?>
    border-color: <?php echo esc_html( $arrow_border_color ); ?>;
    <?php endif; ?>
}

.bs_slider--<?php echo esc_attr($slider_id); ?>.bs-swiper-arrow-<?php echo esc_attr( $arrow_style ); ?> .swiper-button-next:hover,
.bs_slider--<?php echo esc_attr($slider_id); ?>.bs-swiper-arrow-<?php echo esc_attr( $arrow_style ); ?> .swiper-button-prev:hover {
    color: <?php echo esc_html( $arrow_hover_color ); ?>;
    <?php if ( $arrow_style !== 'style1' && $arrow_style !== 'custom' && $arrow_style !== 'style5'  ) : ?>
    background-color: <?php echo esc_html( $arrow_hover_bg_color ); ?>;
    <?php endif; ?>
    <?php if ( $arrow_style !== 'style1' && $arrow_style !== 'none' && $arrow_style !== 'style5' ) : ?>
    border-color: <?php echo esc_html( $arrow_border_color ); ?>;
    <?php endif; ?>
}

.bs_slider--<?php echo esc_attr($slider_id); ?>.bs-swiper-arrow-<?php echo esc_attr($arrow_style); ?> .swiper-button-next,
.bs_slider--<?php echo esc_attr($slider_id); ?>.bs-swiper-arrow-<?php echo esc_attr($arrow_style); ?> .swiper-button-prev {
    font-size: <?php echo esc_html( $arrow_font_size ); ?> !important;
    <?php if ( $arrow_style !== 'style3' ) : ?>
    border-radius: <?php echo esc_html( $arrow_border_radius ); ?> !important;
    <?php endif; ?>
}

<?php if ( $arrow_style === 'custom' ) : ?>
    .bs_slider--<?php echo esc_attr( $slider_id ); ?>.bs-swiper-arrow-custom .swiper-button-prev {
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

    .bs_slider--<?php echo esc_attr( $slider_id ); ?>.bs-swiper-arrow-custom .swiper-button-next {
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
.bs_slider--<?php echo esc_attr($slider_id); ?>.bs-swiper-arrow-style4 .swiper-button-next,
.bs_slider--<?php echo esc_attr($slider_id); ?>.bs-swiper-arrow-style4 .swiper-button-prev {
    color: <?php echo esc_html( $arrow_color ); ?>;
    background-color: <?php echo esc_html( $arrow_bg_color ); ?>;
    border-color: <?php echo esc_html( $arrow_border_color ); ?>;
    font-size: <?php echo esc_html( $arrow_font_size ); ?>;
    border-radius: <?php echo esc_html( $arrow_border_radius ); ?>;
}

.bs_slider--<?php echo esc_attr($slider_id); ?>.bs-swiper-arrow-style4 .swiper-button-next:hover,
.bs_slider--<?php echo esc_attr($slider_id); ?>.bs-swiper-arrow-style4 .swiper-button-prev:hover {
    color: <?php echo esc_html( $arrow_hover_color ); ?>;
    background-color: <?php echo esc_html( $arrow_hover_bg_color ); ?>;
    border-color: <?php echo esc_html( $arrow_border_color ); ?>;
}
<?php endif; 

if ( $arrow_style === 'style5' ) : ?>
.bs_slider--<?php echo esc_attr( $slider_id ); ?>.bs-swiper-arrow-style5 .swiper-button-next,
.bs_slider--<?php echo esc_attr( $slider_id ); ?>.bs-swiper-arrow-style5 .swiper-button-prev {
    color: <?php echo esc_html( $arrow_color ); ?>;
    font-size: <?php echo esc_html( $arrow_font_size ); ?>;
}

.bs_slider--<?php echo esc_attr( $slider_id ); ?>.bs-swiper-arrow-style5 .swiper-button-next:hover,
.bs_slider--<?php echo esc_attr( $slider_id ); ?>.bs-swiper-arrow-style5 .swiper-button-prev:hover {
    color: <?php echo esc_html( $arrow_hover_color ); ?>;
}
<?php endif; ?>

/* --------------------------- End Dynamic Arrow Style --------------------------- */


/*--------------------------- Dynamic Dot Style ---------------------------*/

.bs_slider--<?php echo esc_attr($slider_id); ?>.bs-swiper-dot-<?php echo esc_attr( $bullets_style ); ?> .swiper-pagination-bullet {
    background-color: <?php echo esc_html( $bullets_bg_color ); ?>;
    background-color: <?php echo esc_html( $bullets_bg_color ); ?>;
    border: 2px solid <?php echo esc_html( $bullets_border_color ); ?>;
}

.bs_slider--<?php echo esc_attr($slider_id); ?>.bs-swiper-dot-<?php echo esc_attr( $bullets_style ); ?> .swiper-pagination-bullet-active,
.bs_slider--<?php echo esc_attr($slider_id); ?>.bs-swiper-dot-<?php echo esc_attr( $bullets_style ); ?> .swiper-pagination-bullet:hover {
    background-color: <?php echo esc_html( $bullets_hover_bg_color ); ?>;
    border: 2px solid <?php echo esc_html( $bullets_border_color ); ?>;
}

/* --------------------------- End Dynamic Dot Style --------------------------- */

/*--------------------------- Dynamic Image Style ---------------------------*/

.bs_slider--<?php echo esc_attr($slider_id); ?> {
    border-radius: <?php echo esc_html( $border_radius_image ); ?>;
}

/* --------------------------- End Dynamic Image Style --------------------------- */

/*--------------------------- Background Settings Style ---------------------------*/

<?php
if ( ! function_exists( 'bs_generate_background_css' ) ) {
    function bs_generate_background_css( $selector, $bg_settings ) {

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
bs_generate_background_css(
    '.bs_slider--' . esc_attr( $slider_id ) . '.bs-swiper',
    array(
        'background_url'      => $background_url,
        'background_size'     => $background_size,
        'background_position' => $background_position,
        'background_repeat'   => $background_repeat,
        'background_color'    => $background_color,
    )
);

// Slide-specific CSS
if ( ! empty( $slides_background_settings ) && is_array( $slides_background_settings ) ) :
    foreach ( $slides_background_settings as $slide_id => $slide_bg_settings ) :
        bs_generate_background_css(
            '.bs_slider--' . esc_attr( $slider_id ) . ' .bs-slide-' . esc_attr( $slide_id ),
            $slide_bg_settings
        );
    endforeach;
endif;


/* --------------------------- End Background Settings Style --------------------------- */

/*--------------------------- Dynamic Image Style ---------------------------*/

if ( ! empty( $height_image ) ) : ?>
    <?php if ( $control_enable_responsive ) : ?>
        /* Responsive enabled: flexible width, fixed height */
        .bs_slider--<?php echo esc_attr( $slider_id ); ?> .swiper-slide img {
            height: <?php echo esc_html( $height_image . $image_unit ); ?>;
            width: 100%;
            max-width: 100%;
        }
        .bs_slider--<?php echo esc_attr( $slider_id ); ?> .swiper-slide {
            height: auto;
        }
    <?php else : ?>
        /* Responsive disabled: fixed height */
        .bs_slider--<?php echo esc_attr( $slider_id ); ?> .swiper-slide img {
            height: <?php echo esc_html( $height_image . $image_unit ); ?>;
        }
    <?php endif; ?>
<?php endif; ?>

/* --------------------------- End Dynamic Image Style --------------------------- */

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