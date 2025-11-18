<?php
/**
 * Slides Chart Options Metabox View.
 *
 * @package Slides
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<!-- Navigation tabs for plugin settings -->
<div class="wpsbs_page wpsbs_settings_page wrap">

    <div class="wpsbs_settings_page_nav">
        <div class="wpsbs-tab-wrapper">
            <a href="#transition-tab" class="wpsbs-tab wpsbs-tab-active">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSBS_URL . 'assets/images/transition.svg'); ?>" alt="<?php echo esc_attr__( 'Transition', 'smart-block-slider' ); ?>" />
                <?php echo esc_html__( 'Transition', 'smart-block-slider' ); ?>
            </a>

            <a href="#navigation-tab" class="wpsbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSBS_URL . 'assets/images/navigation.svg'); ?>" alt="<?php echo esc_attr__( 'Navigation', 'smart-block-slider' ); ?>" />
                <?php echo esc_html__( 'Navigation', 'smart-block-slider' ); ?>
            </a>

            <a href="#pagination-tab" class="wpsbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSBS_URL . 'assets/images/pagination.svg'); ?>" alt="<?php echo esc_attr__( 'Pagination', 'smart-block-slider' ); ?>" />
                <?php echo esc_html__( 'Pagination', 'smart-block-slider' ); ?>
            </a>

            <a href="#responsive-tab" class="wpsbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSBS_URL . 'assets/images/responsive.svg'); ?>" alt="<?php echo esc_attr__( 'Responsive', 'smart-block-slider' ); ?>" />
                <?php echo esc_html__( 'Responsive', 'smart-block-slider' ); ?>
            </a>

            <?php do_action( 'wpsbs_admin_tabs_after_responsive' ); ?>

            <a href="#autoplay-tab" class="wpsbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSBS_URL . 'assets/images/autoplay.svg'); ?>" alt="<?php echo esc_attr__( 'Autoplay', 'smart-block-slider' ); ?>" />
                <?php echo esc_html__( 'Autoplay', 'smart-block-slider' ); ?>
            </a>

            <a href="#other-options-tab" class="wpsbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSBS_URL . 'assets/images/other-options.svg'); ?>" alt="<?php echo esc_attr__( 'Other Options', 'smart-block-slider' ); ?>" />
                <?php echo esc_html__( 'Other Options', 'smart-block-slider' ); ?>
            </a>

            <a href="#custom-class-tab" class="wpsbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSBS_URL . 'assets/images/custom-css.svg'); ?>" alt="<?php echo esc_attr__( 'Custom CSS', 'smart-block-slider' ); ?>" />
                <?php echo esc_html__( 'Custom CSS', 'smart-block-slider' ); ?>
            </a>

            <?php  if( ! class_exists( 'WPSBS_PRO' ) ): ?>
                <a href="#features-tab" class="wpsbs-tab">
                    <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                    <img src="<?php echo esc_url( WPSBS_URL . 'assets/images/features.svg'); ?>" alt="<?php echo esc_attr__( 'Features', 'smart-block-slider' ); ?>" />
                    <?php echo esc_html__( 'Features', 'smart-block-slider' ); ?>
                </a>
            <?php endif; ?>

        </div>
    </div>

    <!-- Content area for the active settings tab -->
    <div class="wpsbs_settings_page_content">
        <?php global $post;

            wp_nonce_field( 'wpsbs_slider_options_nonce', 'wpsbs_slider_options_nonce' );
            require_once WPSBS_PATH . 'includes/admin/settings/views/transition.php';
            require_once WPSBS_PATH . 'includes/admin/settings/views/navigation.php';
            require_once WPSBS_PATH . 'includes/admin/settings/views/pagination.php';
            require_once WPSBS_PATH . 'includes/admin/settings/views/responsive.php';
            do_action( 'wpsbs_admin_tab_content_after_responsive' );
            require_once WPSBS_PATH . 'includes/admin/settings/views/autoplay.php';
            require_once WPSBS_PATH . 'includes/admin/settings/views/other-options.php';
            require_once WPSBS_PATH . 'includes/admin/settings/views/custom-class.php';
            require_once WPSBS_PATH . 'includes/admin/settings/views/features.php';
        ?>
    </div>

    <div class="wpsbs_notice_wrapper">
</div>