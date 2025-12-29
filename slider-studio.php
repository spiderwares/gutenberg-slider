<?php
/**
 * Plugin Name:       Slider Studio
 * Description:       Build beautiful, fully responsive sliders in Gutenberg with customizable navigation, autoplay, and animation effects.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            cosmicinfosoftware
 * Author URI:        https://cosmicinfosoftware.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       slider-studio
 *
 * @package Slider_Studio
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'WPSS_FILE' ) ) :
    define( 'WPSS_FILE', __FILE__ ); // Define the plugin file path.
endif;

if ( ! defined( 'WPSS_BASENAME' ) ) :
    define( 'WPSS_BASENAME', plugin_basename( WPSS_FILE ) ); // Define the plugin basename.
endif;

if ( ! defined( 'WPSS_VERSION' ) ) :
    define( 'WPSS_VERSION', '1.0.0' ); // Define the plugin version.
endif;

if ( ! defined( 'WPSS_PATH' ) ) :
    define( 'WPSS_PATH', plugin_dir_path( __FILE__ ) ); // Define the plugin directory path.
endif;

if ( ! defined( 'WPSS_URL' ) ) :
    define( 'WPSS_URL', plugin_dir_url( __FILE__ ) ); // Define the plugin directory URL.
endif;

if ( ! class_exists( 'WPSS', false ) ) :
    include_once WPSS_PATH . 'includes/class-wpss.php';
endif;

register_activation_hook( __FILE__, array( 'WPSS_Install', 'install' ) ); // set activation hook

WPSS::instance();
