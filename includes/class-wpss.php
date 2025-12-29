<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPSS' ) ) :

    /**
     * Main WPSS Class
     *
     * @class WPSS   
     * @version 1.0.0
     */
    final class WPSS {

        /**
         * The single instance of the class.
         *
         * @var WPSS
         */
        protected static $instance = null;

        /**
         * The public class instance.
         *
         * @var WPSS
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
         * Main WPSS Instance.
         *
         * Ensures only one instance of WPSS is loaded or can be loaded.
         *
         * @static
         * @return WPSS - Main instance.
         */
        public static function instance() {
            if ( is_null( self::$instance ) ) :
                self::$instance = new self();

                /**
                 * Fire a custom action to allow dependencies
                 * after the successful plugin setup
                 */
                do_action( 'wpss_plugin_loaded' );
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
            
            require_once WPSS_PATH . 'includes/wpss-core-functions.php';
            require_once WPSS_PATH . 'includes/admin/settings/class-wpss-cpt.php';
            require_once WPSS_PATH . 'includes/admin/settings/class-wpss-helper.php';
            require_once WPSS_PATH . 'includes/public/class-wpss-shortcode.php';
            require_once WPSS_PATH . 'includes/public/class-wpss-public.php';
        }
        
        /**
         * Include Admin required files.
         */
        public function includes_admin() {
            require_once WPSS_PATH . 'includes/class-wpss-install.php';
            require_once WPSS_PATH . 'includes/admin/tab/class-wpss-tab.php';
            require_once WPSS_PATH . 'includes/admin/settings/class-wpss-admin-menu.php';
            require_once WPSS_PATH . 'includes/admin/settings/class-wpss-manage-metadata.php';
            require_once WPSS_PATH . 'includes/admin/settings/class-wpss-settings-field.php';
        }
        
        /**
         * Include Public required files.
         */
        public function includes_public() {
		}
    }

endif;
