<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'BS' ) ) :

    /**
     * Main BS Class
     *
     * @class BS   
     * @version 1.0.0
     */
    final class BS {

        /**
         * The single instance of the class.
         *
         * @var BS
         */
        protected static $instance = null;

        /**
         * The public class instance.
         *
         * @var BS
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
         * Main BS Instance.
         *
         * Ensures only one instance of BS is loaded or can be loaded.
         *
         * @static
         * @return BS - Main instance.
         */
        public static function instance() {
            if ( is_null( self::$instance ) ) :
                self::$instance = new self();

                /**
                 * Fire a custom action to allow dependencies
                 * after the successful plugin setup
                 */
                do_action( 'bs_plugin_loaded' );
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
            
            require_once BS_PATH . 'includes/bs-core-functions.php';
            require_once BS_PATH . 'includes/admin/settings/class-bs-cpt.php';
            require_once BS_PATH . 'includes/admin/settings/class-bs-helper.php';
        }
        
        /**
         * Include Admin required files.
         */
        public function includes_admin() {
            require_once BS_PATH . 'includes/class-bs-install.php';
            require_once BS_PATH . 'includes/admin/tab/class-cosmic-tab.php';
            require_once BS_PATH . 'includes/admin/settings/class-bs-manage-metadata.php';
            require_once BS_PATH . 'includes/admin/settings/class-bs-settings-field.php';
        }
        
        /**
         * Include Public required files.
         */
        public function includes_public() {
            require_once BS_PATH . 'includes/public/class-bs-public.php';
            require_once BS_PATH . 'includes/public/class-bs-shortcode.php';
		}
    }

endif;
