<?php
/**
 * Slides Chart Options Metabox View.
 *
 * @package Slides
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<!-- Navigation tabs for plugin settings -->
<div class="wpbs_page wpbs_settings_page wrap">

    <div class="wpbs_settings_page_nav">
        <div class="wpbs-tab-wrapper">
            <a href="#transition-tab" class="wpbs-tab wpbs-tab-active">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPBS_URL . 'assets/images/transition.svg'); ?>" alt="<?php echo esc_attr__( 'Transition', 'blocksy-slider' ); ?>" />
                <?php echo esc_html__( 'Transition', 'blocksy-slider' ); ?>
            </a>

            <a href="#navigation-tab" class="wpbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPBS_URL . 'assets/images/navigation.svg'); ?>" alt="<?php echo esc_attr__( 'Navigation', 'blocksy-slider' ); ?>" />
                <?php echo esc_html__( 'Navigation', 'blocksy-slider' ); ?>
            </a>

            <a href="#pagination-tab" class="wpbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPBS_URL . 'assets/images/pagination.svg'); ?>" alt="<?php echo esc_attr__( 'Pagination', 'blocksy-slider' ); ?>" />
                <?php echo esc_html__( 'Pagination', 'blocksy-slider' ); ?>
            </a>

            <a href="#responsive-tab" class="wpbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPBS_URL . 'assets/images/responsive.svg'); ?>" alt="<?php echo esc_attr__( 'Responsive', 'blocksy-slider' ); ?>" />
                <?php echo esc_html__( 'Responsive', 'blocksy-slider' ); ?>
            </a>

            <a href="#autoplay-tab" class="wpbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPBS_URL . 'assets/images/autoplay.svg'); ?>" alt="<?php echo esc_attr__( 'Autoplay', 'blocksy-slider' ); ?>" />
                <?php echo esc_html__( 'Autoplay', 'blocksy-slider' ); ?>
            </a>

            <a href="#thumbnail-gallery-tab" class="wpbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPBS_URL . 'assets/images/thumbnail-gallery.svg'); ?>" alt="<?php echo esc_attr__( 'Thumbnail Gallery', 'blocksy-slider' ); ?>" />
                <?php echo esc_html__( 'Thumbnail Gallery', 'blocksy-slider' ); ?>
            </a>

            <a href="#scrollbar-tab" class="wpbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPBS_URL . 'assets/images/scrollbar.svg'); ?>" alt="<?php echo esc_attr__( 'Scrollbar', 'blocksy-slider' ); ?>" />
                <?php echo esc_html__( 'Scrollbar', 'blocksy-slider' ); ?>
            </a>

            <a href="#other-options-tab" class="wpbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPBS_URL . 'assets/images/other-options.svg'); ?>" alt="<?php echo esc_attr__( 'Other Options', 'blocksy-slider' ); ?>" />
                <?php echo esc_html__( 'Other Options', 'blocksy-slider' ); ?>
            </a>

            <a href="#custom-class-tab" class="wpbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPBS_URL . 'assets/images/custom-css.svg'); ?>" alt="<?php echo esc_attr__( 'Custom CSS', 'blocksy-slider' ); ?>" />
                <?php echo esc_html__( 'Custom CSS', 'blocksy-slider' ); ?>
            </a>

        </div>
    </div>

    <!-- Content area for the active settings tab -->
    <div class="wpbs_settings_page_content">
        <?php global $post;

            wp_nonce_field( 'wpbs_slider_options_nonce', 'wpbs_slider_options_nonce' );
            require_once WPBS_PATH . 'includes/admin/settings/views/transition.php';
            require_once WPBS_PATH . 'includes/admin/settings/views/navigation.php';
            require_once WPBS_PATH . 'includes/admin/settings/views/pagination.php';
            require_once WPBS_PATH . 'includes/admin/settings/views/responsive.php';
            require_once WPBS_PATH . 'includes/admin/settings/views/thumbnail-gallery.php';
            require_once WPBS_PATH . 'includes/admin/settings/views/scrollbar.php';
            require_once WPBS_PATH . 'includes/admin/settings/views/autoplay.php';
            require_once WPBS_PATH . 'includes/admin/settings/views/other-options.php';
            require_once WPBS_PATH . 'includes/admin/settings/views/custom-class.php';
        ?>
    </div>

    <h2 class="wpbs_notice_wrapper"></h2>
</div>