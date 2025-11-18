<?php
/**
 * WPSBS Tab Class
 *
 * Handles the admin tab setup and related functionalities.
 *
 * @package Smart_Block_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPSBS_Tab' ) ) {

	/**
	 * Class WPSBS_Tab
	 *
	 * Initializes the admin tab for WPSBS.
	 */
	class WPSBS_Tab {

		/**
		 * Constructor for WPSBS_Tab class.
		 * Initializes the event handler.
		 */
		public function __construct() {
			$this->events_handler();
		}

		/**
		 * Initialize hooks for admin functionality.
		 */
		public function events_handler() {
			add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		}

		/**
		 * Enqueue admin-specific styles for the tab.
		 */
		public function enqueue_scripts() {
			
			// Enqueue the WPSBS tab CSS.
			wp_enqueue_style(
				'wpsbs-tab',
				WPSBS_URL . 'includes/admin/tab/css/wpsbs-tab.css',
				array(),
				WPSBS_VERSION 
			);

		}

	}

	// Instantiate the WPSBS_Tab class.
	new WPSBS_Tab();
}
