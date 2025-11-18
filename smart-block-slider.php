<?php
/**
 * Plugin Name:       Smart Block Slider
 * Description:       Create stunning, fully responsive sliders using the Gutenberg block editor with customizable navigation, autoplay, and animation effects.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Cosmic
 * Author URI:        https://cosmicinfosoftware.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       smart-block-slider
 *
 * @package Smart_Block_Slider
 */

 if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'WPSBS_FILE' ) ) :
    define( 'WPSBS_FILE', __FILE__ ); // Define the plugin file path.
endif;

if ( ! defined( 'WPSBS_BASENAME' ) ) :
    define( 'WPSBS_BASENAME', plugin_basename( WPSBS_FILE ) ); // Define the plugin basename.
endif;

if ( ! defined( 'WPSBS_VERSION' ) ) :
    define( 'WPSBS_VERSION', '1.0.0' ); // Define the plugin version.
endif;

if ( ! defined( 'WPSBS_PATH' ) ) :
    define( 'WPSBS_PATH', plugin_dir_path( __FILE__ ) ); // Define the plugin directory path.
endif;

if ( ! defined( 'WPSBS_URL' ) ) :
    define( 'WPSBS_URL', plugin_dir_url( __FILE__ ) ); // Define the plugin directory URL.
endif;

if ( ! defined( 'WPSBS_PRO_VERSION_URL' ) ) :
    define( 'WPSBS_PRO_VERSION_URL', '#' ); // Pro Version URL
endif;

if ( ! class_exists( 'WPSBS', false ) ) :
    include_once WPSBS_PATH . 'includes/class-wpsbs.php';
endif;

register_activation_hook( __FILE__, array( 'WPSBS_Install', 'install' ) ); // set activation hook

WPSBS::instance();
