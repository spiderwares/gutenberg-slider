<?php
/**
 * Plugin Name:       Guternberg Slider
 * Description:       Create stunning, fully responsive sliders using the Gutenberg block editor with customizable navigation, autoplay, and animation effects.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Cosmic
 * Author URI:        https://cosmicinfosoftware.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gutenberg-slider
 *
 * @package Gutenberg_Slider
 */

 if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'GTBS_FILE' ) ) :
    define( 'GTBS_FILE', __FILE__ ); // Define the plugin file path.
endif;

if ( ! defined( 'GTBS_BASENAME' ) ) :
    define( 'GTBS_BASENAME', plugin_basename( GTBS_FILE ) ); // Define the plugin basename.
endif;

if ( ! defined( 'GTBS_VERSION' ) ) :
    define( 'GTBS_VERSION', '1.0.0' ); // Define the plugin version.
endif;

if ( ! defined( 'GTBS_PATH' ) ) :
    define( 'GTBS_PATH', plugin_dir_path( __FILE__ ) ); // Define the plugin directory path.
endif;

if ( ! defined( 'GTBS_URL' ) ) :
    define( 'GTBS_URL', plugin_dir_url( __FILE__ ) ); // Define the plugin directory URL.
endif;

if ( ! defined( 'GTBS_PRO_VERSION_URL' ) ) :
    define( 'GTBS_PRO_VERSION_URL', '#' ); // Pro Version URL
endif;

if ( ! class_exists( 'GTBS', false ) ) :
    include_once GTBS_PATH . 'includes/class-gtbs.php';
endif;

register_activation_hook( __FILE__, array( 'GTBS_Install', 'install' ) ); // set activation hook

GTBS::instance();
