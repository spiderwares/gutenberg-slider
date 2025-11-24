<?php
/**
 * Plugin Name:       Blocksy Slider
 * Description:       Create stunning, fully responsive sliders using the Gutenberg block editor with customizable navigation, autoplay, and animation effects.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            cosmicinfosoftware
 * Author URI:        https://cosmicinfosoftware.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       blocksy-slider
 *
 * @package Blocksy_Slider
 */

 if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'WPBS_FILE' ) ) :
    define( 'WPBS_FILE', __FILE__ ); // Define the plugin file path.
endif;

if ( ! defined( 'WPBS_BASENAME' ) ) :
    define( 'WPBS_BASENAME', plugin_basename( WPBS_FILE ) ); // Define the plugin basename.
endif;

if ( ! defined( 'WPBS_VERSION' ) ) :
    define( 'WPBS_VERSION', time() ); // Define the plugin version.
endif;

if ( ! defined( 'WPBS_PATH' ) ) :
    define( 'WPBS_PATH', plugin_dir_path( __FILE__ ) ); // Define the plugin directory path.
endif;

if ( ! defined( 'WPBS_URL' ) ) :
    define( 'WPBS_URL', plugin_dir_url( __FILE__ ) ); // Define the plugin directory URL.
endif;

if ( ! defined( 'WPBS_PRO_VERSION_URL' ) ) :
    define( 'WPBS_PRO_VERSION_URL', '#' ); // Pro Version URL
endif;

if ( ! class_exists( 'WPBS', false ) ) :
    include_once WPBS_PATH . 'includes/class-wpbs.php';
endif;

register_activation_hook( __FILE__, array( 'WPBS_Install', 'install' ) ); // set activation hook

WPBS::instance();
