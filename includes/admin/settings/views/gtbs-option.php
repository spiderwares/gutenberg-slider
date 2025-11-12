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
        <div class="nav-tab-wrapper">
            <a href="#transition-tab" class="nav-tab nav-tab-active">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( GTBS_URL . 'assets/images/transition.svg'); ?>" alt="<?php echo esc_attr__( 'Transition', 'gutenberg-slider' ); ?>" />
                <?php echo esc_html__( 'Transition', 'gutenberg-slider' ); ?>
            </a>
            <a href="#navigation-tab" class="nav-tab">
                <img src="<?php echo esc_url( GTBS_URL . 'assets/images/navigation.svg'); ?>" alt="<?php echo esc_attr__( 'Navigation', 'gutenberg-slider' ); ?>" />
                <?php echo esc_html__( 'Navigation', 'gutenberg-slider' ); ?>
            </a>
            <a href="#pagination-tab" class="nav-tab">
                <img src="<?php echo esc_url( GTBS_URL . 'assets/images/pagination.svg'); ?>" alt="<?php echo esc_attr__( 'Pagination', 'gutenberg-slider' ); ?>" />
                <?php echo esc_html__( 'Pagination', 'gutenberg-slider' ); ?>
            </a>
            <a href="#responsive-tab" class="nav-tab">
                <img src="<?php echo esc_url( GTBS_URL . 'assets/images/responsive.svg'); ?>" alt="<?php echo esc_attr__( 'Responsive', 'gutenberg-slider' ); ?>" />
                <?php echo esc_html__( 'Responsive', 'gutenberg-slider' ); ?>
            </a>
            <a href="#thumbnail-gallery-tab" class="nav-tab">
                <img src="<?php echo esc_url( GTBS_URL . 'assets/images/thumbnail-gallery.svg'); ?>" alt="<?php echo esc_attr__( 'Thumbnail Gallery', 'gutenberg-slider' ); ?>" />
                <?php echo esc_html__( 'Thumbnail Gallery', 'gutenberg-slider' ); ?>
            </a>
            <a href="#autoplay-tab" class="nav-tab">
                <img src="<?php echo esc_url( GTBS_URL . 'assets/images/autoplay.svg'); ?>" alt="<?php echo esc_attr__( 'Autoplay', 'gutenberg-slider' ); ?>" />
                <?php echo esc_html__( 'Autoplay', 'gutenberg-slider' ); ?>
            </a>
            <a href="#scrollbar-tab" class="nav-tab">
                <img src="<?php echo esc_url( GTBS_URL . 'assets/images/scrollbar.svg'); ?>" alt="<?php echo esc_attr__( 'Scrollbar', 'gutenberg-slider' ); ?>" />
                <?php echo esc_html__( 'Scrollbar', 'gutenberg-slider' ); ?>
            </a>
            <a href="#other-options-tab" class="nav-tab">
                <img src="<?php echo esc_url( GTBS_URL . 'assets/images/other-options.svg'); ?>" alt="<?php echo esc_attr__( 'Other Options', 'gutenberg-slider' ); ?>" />
                <?php echo esc_html__( 'Other Options', 'gutenberg-slider' ); ?>
            </a>
        </div>
    </div>

    <!-- Content area for the active settings tab -->
    <div class="cosmic_settings_page_content">
        <?php global $post; ?>
        <form method="post" enctype="multipart/form-data">
            <?php 
            wp_nonce_field( 'gtbs_slider_options_nonce', 'gtbs_slider_options_nonce' );
            require_once GTBS_PATH . 'includes/admin/settings/views/slides-option/transition.php';
            require_once GTBS_PATH . 'includes/admin/settings/views/slides-option/navigation.php';
            require_once GTBS_PATH . 'includes/admin/settings/views/slides-option/pagination.php';
            require_once GTBS_PATH . 'includes/admin/settings/views/slides-option/responsive.php';
            require_once GTBS_PATH . 'includes/admin/settings/views/slides-option/thumbnail-gallery.php';
            require_once GTBS_PATH . 'includes/admin/settings/views/slides-option/autoplay.php';
            require_once GTBS_PATH . 'includes/admin/settings/views/slides-option/scrollbar.php';
            require_once GTBS_PATH . 'includes/admin/settings/views/slides-option/other-options.php';
            ?>
        </form>
    </div>
</div>