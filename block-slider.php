<?php
/**
 * Plugin Name:       Block Slider
 * Description:       Create stunning, fully responsive sliders using the Gutenberg block editor with customizable navigation, autoplay, and animation effects.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Cosmic
 * Author URI:        https://cosmicinfosoftware.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       block-slider
 *
 * @package Block_Slider
 */

 if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'BS_FILE' ) ) :
    define( 'BS_FILE', __FILE__ ); // Define the plugin file path.
endif;

if ( ! defined( 'BS_BASENAME' ) ) :
    define( 'BS_BASENAME', plugin_basename( BS_FILE ) ); // Define the plugin basename.
endif;

if ( ! defined( 'BS_VERSION' ) ) :
    define( 'BS_VERSION', '1.0.0' ); // Define the plugin version.
endif;

if ( ! defined( 'BS_PATH' ) ) :
    define( 'BS_PATH', plugin_dir_path( __FILE__ ) ); // Define the plugin directory path.
endif;

if ( ! defined( 'BS_URL' ) ) :
    define( 'BS_URL', plugin_dir_url( __FILE__ ) ); // Define the plugin directory URL.
endif;

if ( ! defined( 'BS_PRO_VERSION_URL' ) ) :
    define( 'BS_PRO_VERSION_URL', '#' ); // Pro Version URL
endif;

if ( ! class_exists( 'BS', false ) ) :
    include_once BS_PATH . 'includes/class-bs.php';
endif;

register_activation_hook( __FILE__, array( 'BS_Install', 'install' ) ); // set activation hook

BS::instance();
