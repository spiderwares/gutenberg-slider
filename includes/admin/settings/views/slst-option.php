<?php
/**
 * Slides Chart Options Metabox View.
 *
 * @package Slides
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<!-- Navigation tabs for plugin settings -->
<div class="slst_page slst_settings_page wrap">

    <div class="slst_settings_page_nav">
        <div class="slst-tab-wrapper">
            <a href="#transition-tab" class="slst-tab slst-tab-active">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( SLST_URL . 'assets/images/transition.svg'); ?>" alt="<?php echo esc_attr__( 'Transition', 'slider-studio' ); ?>" />
                <?php echo esc_html__( 'Transition', 'slider-studio' ); ?>
            </a>

            <a href="#navigation-tab" class="slst-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( SLST_URL . 'assets/images/navigation.svg'); ?>" alt="<?php echo esc_attr__( 'Navigation', 'slider-studio' ); ?>" />
                <?php echo esc_html__( 'Navigation', 'slider-studio' ); ?>
            </a>

            <a href="#pagination-tab" class="slst-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( SLST_URL . 'assets/images/pagination.svg'); ?>" alt="<?php echo esc_attr__( 'Pagination', 'slider-studio' ); ?>" />
                <?php echo esc_html__( 'Pagination', 'slider-studio' ); ?>
            </a>

            <a href="#responsive-tab" class="slst-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( SLST_URL . 'assets/images/responsive.svg'); ?>" alt="<?php echo esc_attr__( 'Responsive', 'slider-studio' ); ?>" />
                <?php echo esc_html__( 'Responsive', 'slider-studio' ); ?>
            </a>

            <a href="#autoplay-tab" class="slst-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( SLST_URL . 'assets/images/autoplay.svg'); ?>" alt="<?php echo esc_attr__( 'Autoplay', 'slider-studio' ); ?>" />
                <?php echo esc_html__( 'Autoplay', 'slider-studio' ); ?>
            </a>

            <a href="#thumbnail-gallery-tab" class="slst-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( SLST_URL . 'assets/images/thumbnail-gallery.svg'); ?>" alt="<?php echo esc_attr__( 'Thumbnail Gallery', 'slider-studio' ); ?>" />
                <?php echo esc_html__( 'Thumbnail Gallery', 'slider-studio' ); ?>
            </a>

            <a href="#scrollbar-tab" class="slst-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( SLST_URL . 'assets/images/scrollbar.svg'); ?>" alt="<?php echo esc_attr__( 'Scrollbar', 'slider-studio' ); ?>" />
                <?php echo esc_html__( 'Scrollbar', 'slider-studio' ); ?>
            </a>

            <a href="#other-options-tab" class="slst-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( SLST_URL . 'assets/images/other-options.svg'); ?>" alt="<?php echo esc_attr__( 'Other Options', 'slider-studio' ); ?>" />
                <?php echo esc_html__( 'Other Options', 'slider-studio' ); ?>
            </a>

            <a href="#custom-class-tab" class="slst-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( SLST_URL . 'assets/images/custom-css.svg'); ?>" alt="<?php echo esc_attr__( 'Custom CSS', 'slider-studio' ); ?>" />
                <?php echo esc_html__( 'Custom CSS', 'slider-studio' ); ?>
            </a>

        </div>
    </div>

    <!-- Content area for the active settings tab -->
    <div class="slst_settings_page_content">
        <?php global $post;

            wp_nonce_field( 'slst_slider_options_nonce', 'slst_slider_options_nonce' );
            require_once SLST_PATH . 'includes/admin/settings/views/transition.php';
            require_once SLST_PATH . 'includes/admin/settings/views/navigation.php';
            require_once SLST_PATH . 'includes/admin/settings/views/pagination.php';
            require_once SLST_PATH . 'includes/admin/settings/views/responsive.php';
            require_once SLST_PATH . 'includes/admin/settings/views/thumbnail-gallery.php';
            require_once SLST_PATH . 'includes/admin/settings/views/scrollbar.php';
            require_once SLST_PATH . 'includes/admin/settings/views/autoplay.php';
            require_once SLST_PATH . 'includes/admin/settings/views/other-options.php';
            require_once SLST_PATH . 'includes/admin/settings/views/custom-class.php';
        ?>
    </div>

    <h2 class="slst_notice_wrapper"></h2>
</div>