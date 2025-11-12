<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'GTBS' ) ) :

    /**
     * Main GTBS Class
     *
     * @class GTBS
     * @version 1.0.0
     */
    final class GTBS {

        /**
         * The single instance of the class.
         *
         * @var GTBS
         */
        protected static $instance = null;

        /**
         * The public class instance.
         *
         * @var GTBS
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
         * Main GTBS Instance.
         *
         * Ensures only one instance of GTBS is loaded or can be loaded.
         *
         * @static
         * @return GTBS - Main instance.
         */
        public static function instance() {
            if ( is_null( self::$instance ) ) :
                self::$instance = new self();

                /**
                 * Fire a custom action to allow dependencies
                 * after the successful plugin setup
                 */
                do_action( 'gtbs_plugin_loaded' );
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
            
            require_once GTBS_PATH . 'includes/gtbs-core-functions.php';
            require_once GTBS_PATH . 'includes/admin/settings/class-gtbs-cpt.php';
            require_once GTBS_PATH . 'includes/admin/settings/class-gtbs-helper.php';
        }
        
        /**
         * Include Admin required files.
         */
        public function includes_admin() {
            require_once GTBS_PATH . 'includes/class-gtbs-install.php';
            require_once GTBS_PATH . 'includes/admin/tab/class-cosmic-tab.php';
            require_once GTBS_PATH . 'includes/admin/settings/class-gtbs-manage-metadata.php';
            require_once GTBS_PATH . 'includes/admin/settings/class-gtbs-settings-field.php';
        }
        
        /**
         * Include Public required files.
         */
        public function includes_public() {
            require_once GTBS_PATH . 'includes/public/class-gtbs-public.php';
            require_once GTBS_PATH . 'includes/public/class-gtbs-shortcode.php';
		}
    }

endif;
