<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPBS' ) ) :

    /**
     * Main WPBS Class
     *
     * @class WPBS   
     * @version 1.0.0
     */
    final class WPBS {

        /**
         * The single instance of the class.
         *
         * @var WPBS
         */
        protected static $instance = null;

        /**
         * The public class instance.
         *
         * @var WPBS
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
         * Main WPBS Instance.
         *
         * Ensures only one instance of WPBS is loaded or can be loaded.
         *
         * @static
         * @return WPBS - Main instance.
         */
        public static function instance() {
            if ( is_null( self::$instance ) ) :
                self::$instance = new self();

                /**
                 * Fire a custom action to allow dependencies
                 * after the successful plugin setup
                 */
                do_action( 'wpbs_plugin_loaded' );
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
            
            require_once WPBS_PATH . 'includes/wpbs-core-functions.php';
            require_once WPBS_PATH . 'includes/admin/settings/class-wpbs-cpt.php';
            require_once WPBS_PATH . 'includes/admin/settings/class-wpbs-helper.php';
        }
        
        /**
         * Include Admin required files.
         */
        public function includes_admin() {
            require_once WPBS_PATH . 'includes/class-wpbs-install.php';
            require_once WPBS_PATH . 'includes/admin/tab/class-wpbs-tab.php';
            require_once WPBS_PATH . 'includes/admin/settings/class-wpbs-manage-metadata.php';
            require_once WPBS_PATH . 'includes/admin/settings/class-wpbs-settings-field.php';
        }
        
        /**
         * Include Public required files.
         */
        public function includes_public() {
            require_once WPBS_PATH . 'includes/public/class-wpbs-public.php';
            require_once WPBS_PATH . 'includes/public/class-wpbs-shortcode.php';
		}
    }

endif;
