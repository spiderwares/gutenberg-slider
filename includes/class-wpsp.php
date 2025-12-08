<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPSP' ) ) :

    /**
     * Main WPSP Class
     *
     * @class WPSP   
     * @version 1.0.0
     */
    final class WPSP {

        /**
         * The single instance of the class.
         *
         * @var WPSP
         */
        protected static $instance = null;

        /**
         * The public class instance.
         *
         * @var WPSP
         */
        public $public = null;

        /**
         * Constructor for the class.
         */
        public function __construct() {
            $this->events_handler();
            $this->includes();
        }

        /**
         * Initialize hooks and filters.
         */
        private function events_handler() {
            add_action( 'plugins_loaded', array( $this, 'includes' ), 11 );
        }

        /**
         * Main WPSP Instance.
         *
         * Ensures only one instance of WPSP is loaded or can be loaded.
         *
         * @static
         * @return WPSP - Main instance.
         */
        public static function instance() {
            if ( is_null( self::$instance ) ) :
                self::$instance = new self();

                /**
                 * Fire a custom action to allow dependencies
                 * after the successful plugin setup
                 */
                do_action( 'wpsp_plugin_loaded' );
            endif;
            return self::$instance;
        }

        /**
         * Include required files.
         */
        public function includes() {
            if ( is_admin() ) :
                $this->includes_admin();
           else :
                $this->includes_public();
            endif;
            
            require_once WPSP_PATH . 'includes/wpsp-core-functions.php';
            require_once WPSP_PATH . 'includes/admin/settings/class-wpsp-cpt.php';
            require_once WPSP_PATH . 'includes/admin/settings/class-wpsp-helper.php';
        }
        
        /**
         * Include Admin required files.
         */
        public function includes_admin() {
            require_once WPSP_PATH . 'includes/class-wpsp-install.php';
            require_once WPSP_PATH . 'includes/admin/tab/class-wpsp-tab.php';
            require_once WPSP_PATH . 'includes/admin/settings/class-wpsp-manage-metadata.php';
            require_once WPSP_PATH . 'includes/admin/settings/class-wpsp-settings-field.php';
        }
        
        /**
         * Include Public required files.
         */
        public function includes_public() {
            require_once WPSP_PATH . 'includes/public/class-wpsp-public.php';
            require_once WPSP_PATH . 'includes/public/class-wpsp-shortcode.php';
		}
    }

endif;
