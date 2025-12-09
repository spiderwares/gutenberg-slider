<?php
/**
 * Plugin Name:       Sliderpress
 * Description:       Create stunning, fully responsive sliders using the Gutenberg block editor with customizable navigation, autoplay, and animation effects.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            cosmicinfosoftware
 * Author URI:        https://cosmicinfosoftware.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       sliderpress
 *
 * @package Slider_Press
 */

 if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'WPSP_FILE' ) ) :
    define( 'WPSP_FILE', __FILE__ ); // Define the plugin file path.
endif;

if ( ! defined( 'WPSP_BASENAME' ) ) :
    define( 'WPSP_BASENAME', plugin_basename( WPSP_FILE ) ); // Define the plugin basename.
endif;

if ( ! defined( 'WPSP_VERSION' ) ) :
    define( 'WPSP_VERSION', time() ); // Define the plugin version.
endif;

if ( ! defined( 'WPSP_PATH' ) ) :
    define( 'WPSP_PATH', plugin_dir_path( __FILE__ ) ); // Define the plugin directory path.
endif;

if ( ! defined( 'WPSP_URL' ) ) :
    define( 'WPSP_URL', plugin_dir_url( __FILE__ ) ); // Define the plugin directory URL.
endif;

if ( ! defined( 'WPSP_PRO_VERSION_URL' ) ) :
    define( 'WPSP_PRO_VERSION_URL', '#' ); // Pro Version URL
endif;

if ( ! class_exists( 'WPSP', false ) ) :
    include_once WPSP_PATH . 'includes/class-wpsp.php';
endif;

register_activation_hook( __FILE__, array( 'WPSP_Install', 'install' ) ); // set activation hook

WPSP::instance();
