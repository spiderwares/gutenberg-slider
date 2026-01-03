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

if ( ! defined( 'SLST_FILE' ) ) :
    define( 'SLST_FILE', __FILE__ ); // Define the plugin file path.
endif;

if ( ! defined( 'SLST_BASENAME' ) ) :
    define( 'SLST_BASENAME', plugin_basename( SLST_FILE ) ); // Define the plugin basename.
endif;

if ( ! defined( 'SLST_VERSION' ) ) :
    define( 'SLST_VERSION', '1.0.0' ); // Define the plugin version.
endif;

if ( ! defined( 'SLST_PATH' ) ) :
    define( 'SLST_PATH', plugin_dir_path( __FILE__ ) ); // Define the plugin directory path.
endif;

if ( ! defined( 'SLST_URL' ) ) :
    define( 'SLST_URL', plugin_dir_url( __FILE__ ) ); // Define the plugin directory URL.
endif;

if ( ! class_exists( 'SLST', false ) ) :
    include_once SLST_PATH . 'includes/class-slst.php';
endif;

register_activation_hook( __FILE__, array( 'SLST_Install', 'install' ) ); // set activation hook

SLST::instance();