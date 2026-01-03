<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'SLST' ) ) :

    /**
     * Main SLST Class
     *
     * @class SLST   
     * @version 1.0.0
     */
    final class SLST {

        /**
         * The single instance of the class.
         *
         * @var SLST
         */
        protected static $instance = null;

        /**
         * The public class instance.
         *
         * @var SLST
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
         * Main SLST Instance.
         *
         * Ensures only one instance of SLST is loaded or can be loaded.
         *
         * @static
         * @return SLST - Main instance.
         */
        public static function instance() {
            if ( is_null( self::$instance ) ) :
                self::$instance = new self();

                /**
                 * Fire a custom action to allow dependencies
                 * after the successful plugin setup
                 */
                do_action( 'slst_plugin_loaded' );
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
            
            require_once SLST_PATH . 'includes/slst-core-functions.php';
            require_once SLST_PATH . 'includes/admin/settings/class-slst-cpt.php';
            require_once SLST_PATH . 'includes/admin/settings/class-slst-helper.php';
            require_once SLST_PATH . 'includes/public/class-slst-shortcode.php';
            require_once SLST_PATH . 'includes/public/class-slst-public.php';
        }
        
        /**
         * Include Admin required files.
         */
        public function includes_admin() {
            require_once SLST_PATH . 'includes/class-slst-install.php';
            require_once SLST_PATH . 'includes/admin/settings/class-slst-admin-menu.php';
            require_once SLST_PATH . 'includes/admin/settings/class-slst-manage-metadata.php';
            require_once SLST_PATH . 'includes/admin/settings/class-slst-settings-field.php';
        }
        
        /**
         * Include Public required files.
         */
        public function includes_public() {
		}
    }

endif;
