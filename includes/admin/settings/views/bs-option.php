<?php
/**
 * Slides Chart Options Metabox View.
 *
 * @package Slides
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<!-- Navigation tabs for plugin settings -->
<div class="cosmic_page cosmic_settings_page wrap">

    <div class="cosmic_settings_page_nav">
        <div class="bs-tab-wrapper">
            <a href="#transition-tab" class="bs-tab bs-tab-active">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( BS_URL . 'assets/images/transition.svg'); ?>" alt="<?php echo esc_attr__( 'Transition', 'block-slider' ); ?>" />
                <?php echo esc_html__( 'Transition', 'block-slider' ); ?>
            </a>

            <a href="#navigation-tab" class="bs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( BS_URL . 'assets/images/navigation.svg'); ?>" alt="<?php echo esc_attr__( 'Navigation', 'block-slider' ); ?>" />
                <?php echo esc_html__( 'Navigation', 'block-slider' ); ?>
            </a>

            <a href="#pagination-tab" class="bs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( BS_URL . 'assets/images/pagination.svg'); ?>" alt="<?php echo esc_attr__( 'Pagination', 'block-slider' ); ?>" />
                <?php echo esc_html__( 'Pagination', 'block-slider' ); ?>
            </a>

            <a href="#responsive-tab" class="bs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( BS_URL . 'assets/images/responsive.svg'); ?>" alt="<?php echo esc_attr__( 'Responsive', 'block-slider' ); ?>" />
                <?php echo esc_html__( 'Responsive', 'block-slider' ); ?>
            </a>

            <?php do_action( 'bs_admin_tabs_after_responsive' ); ?>

            <a href="#autoplay-tab" class="bs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( BS_URL . 'assets/images/autoplay.svg'); ?>" alt="<?php echo esc_attr__( 'Autoplay', 'block-slider' ); ?>" />
                <?php echo esc_html__( 'Autoplay', 'block-slider' ); ?>
            </a>

            <a href="#other-options-tab" class="bs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( BS_URL . 'assets/images/other-options.svg'); ?>" alt="<?php echo esc_attr__( 'Other Options', 'block-slider' ); ?>" />
                <?php echo esc_html__( 'Other Options', 'block-slider' ); ?>
            </a>

            <a href="#custom-class-tab" class="bs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( BS_URL . 'assets/images/custom-css.svg'); ?>" alt="<?php echo esc_attr__( 'Custom CSS', 'block-slider' ); ?>" />
                <?php echo esc_html__( 'Custom CSS', 'block-slider' ); ?>
            </a>

            <?php  if( ! class_exists( 'BS_PRO' ) ): ?>
                <a href="#features-tab" class="bs-tab">
                    <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                    <img src="<?php echo esc_url( BS_URL . 'assets/images/features.svg'); ?>" alt="<?php echo esc_attr__( 'Features', 'block-slider' ); ?>" />
                    <?php echo esc_html__( 'Features', 'block-slider' ); ?>
                </a>
            <?php endif; ?>

        </div>
    </div>

    <!-- Content area for the active settings tab -->
    <div class="cosmic_settings_page_content">
        <?php global $post;

            wp_nonce_field( 'bs_slider_options_nonce', 'bs_slider_options_nonce' );
            require_once BS_PATH . 'includes/admin/settings/views/transition.php';
            require_once BS_PATH . 'includes/admin/settings/views/navigation.php';
            require_once BS_PATH . 'includes/admin/settings/views/pagination.php';
            require_once BS_PATH . 'includes/admin/settings/views/responsive.php';
            do_action( 'bs_admin_tab_content_after_responsive' );
            require_once BS_PATH . 'includes/admin/settings/views/autoplay.php';
            require_once BS_PATH . 'includes/admin/settings/views/other-options.php';
            require_once BS_PATH . 'includes/admin/settings/views/custom-class.php';
            require_once BS_PATH . 'includes/admin/settings/views/features.php';
        ?>
    </div>

    <div class="bs_notice_wrapper">
</div>