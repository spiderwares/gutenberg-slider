<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPSBS' ) ) :

    /**
     * Main WPSBS Class
     *
     * @class WPSBS   
     * @version 1.0.0
     */
    final class WPSBS {

        /**
         * The single instance of the class.
         *
         * @var WPSBS
         */
        protected static $instance = null;

        /**
         * The public class instance.
         *
         * @var WPSBS
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
         * Main WPSBS Instance.
         *
         * Ensures only one instance of WPSBS is loaded or can be loaded.
         *
         * @static
         * @return WPSBS - Main instance.
         */
        public static function instance() {
            if ( is_null( self::$instance ) ) :
                self::$instance = new self();

                /**
                 * Fire a custom action to allow dependencies
                 * after the successful plugin setup
                 */
                do_action( 'wpsbs_plugin_loaded' );
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
            
            require_once WPSBS_PATH . 'includes/wpsbs-core-functions.php';
            require_once WPSBS_PATH . 'includes/admin/settings/class-wpsbs-cpt.php';
            require_once WPSBS_PATH . 'includes/admin/settings/class-wpsbs-helper.php';
        }
        
        /**
         * Include Admin required files.
         */
        public function includes_admin() {
            require_once WPSBS_PATH . 'includes/class-wpsbs-install.php';
            require_once WPSBS_PATH . 'includes/admin/tab/class-wpsbs-tab.php';
            require_once WPSBS_PATH . 'includes/admin/settings/class-wpsbs-manage-metadata.php';
            require_once WPSBS_PATH . 'includes/admin/settings/class-wpsbs-settings-field.php';
        }
        
        /**
         * Include Public required files.
         */
        public function includes_public() {
            require_once WPSBS_PATH . 'includes/public/class-wpsbs-public.php';
            require_once WPSBS_PATH . 'includes/public/class-wpsbs-shortcode.php';
		}
    }

endif;
