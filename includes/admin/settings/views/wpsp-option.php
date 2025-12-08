<?php
/**
 * Slides Chart Options Metabox View.
 *
 * @package Slides
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<!-- Navigation tabs for plugin settings -->
<div class="wpsp_page wpsp_settings_page wrap">

    <div class="wpsp_settings_page_nav">
        <div class="wpsp-tab-wrapper">
            <a href="#transition-tab" class="wpsp-tab wpsp-tab-active">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSP_URL . 'assets/images/transition.svg'); ?>" alt="<?php echo esc_attr__( 'Transition', 'slider-press' ); ?>" />
                <?php echo esc_html__( 'Transition', 'slider-press' ); ?>
            </a>

            <a href="#navigation-tab" class="wpsp-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSP_URL . 'assets/images/navigation.svg'); ?>" alt="<?php echo esc_attr__( 'Navigation', 'slider-press' ); ?>" />
                <?php echo esc_html__( 'Navigation', 'slider-press' ); ?>
            </a>

            <a href="#pagination-tab" class="wpsp-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSP_URL . 'assets/images/pagination.svg'); ?>" alt="<?php echo esc_attr__( 'Pagination', 'slider-press' ); ?>" />
                <?php echo esc_html__( 'Pagination', 'slider-press' ); ?>
            </a>

            <a href="#responsive-tab" class="wpsp-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSP_URL . 'assets/images/responsive.svg'); ?>" alt="<?php echo esc_attr__( 'Responsive', 'slider-press' ); ?>" />
                <?php echo esc_html__( 'Responsive', 'slider-press' ); ?>
            </a>

            <a href="#autoplay-tab" class="wpsp-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSP_URL . 'assets/images/autoplay.svg'); ?>" alt="<?php echo esc_attr__( 'Autoplay', 'slider-press' ); ?>" />
                <?php echo esc_html__( 'Autoplay', 'slider-press' ); ?>
            </a>

            <a href="#thumbnail-gallery-tab" class="wpsp-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSP_URL . 'assets/images/thumbnail-gallery.svg'); ?>" alt="<?php echo esc_attr__( 'Thumbnail Gallery', 'slider-press' ); ?>" />
                <?php echo esc_html__( 'Thumbnail Gallery', 'slider-press' ); ?>
            </a>

            <a href="#scrollbar-tab" class="wpsp-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSP_URL . 'assets/images/scrollbar.svg'); ?>" alt="<?php echo esc_attr__( 'Scrollbar', 'slider-press' ); ?>" />
                <?php echo esc_html__( 'Scrollbar', 'slider-press' ); ?>
            </a>

            <a href="#other-options-tab" class="wpsp-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSP_URL . 'assets/images/other-options.svg'); ?>" alt="<?php echo esc_attr__( 'Other Options', 'slider-press' ); ?>" />
                <?php echo esc_html__( 'Other Options', 'slider-press' ); ?>
            </a>

            <a href="#custom-class-tab" class="wpsp-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSP_URL . 'assets/images/custom-css.svg'); ?>" alt="<?php echo esc_attr__( 'Custom CSS', 'slider-press' ); ?>" />
                <?php echo esc_html__( 'Custom CSS', 'slider-press' ); ?>
            </a>

        </div>
    </div>

    <!-- Content area for the active settings tab -->
    <div class="wpsp_settings_page_content">
        <?php global $post;

            wp_nonce_field( 'wpsp_slider_options_nonce', 'wpsp_slider_options_nonce' );
            require_once WPSP_PATH . 'includes/admin/settings/views/transition.php';
            require_once WPSP_PATH . 'includes/admin/settings/views/navigation.php';
            require_once WPSP_PATH . 'includes/admin/settings/views/pagination.php';
            require_once WPSP_PATH . 'includes/admin/settings/views/responsive.php';
            require_once WPSP_PATH . 'includes/admin/settings/views/thumbnail-gallery.php';
            require_once WPSP_PATH . 'includes/admin/settings/views/scrollbar.php';
            require_once WPSP_PATH . 'includes/admin/settings/views/autoplay.php';
            require_once WPSP_PATH . 'includes/admin/settings/views/other-options.php';
            require_once WPSP_PATH . 'includes/admin/settings/views/custom-class.php';
        ?>
    </div>

    <h2 class="wpsp_notice_wrapper"></h2>
</div>