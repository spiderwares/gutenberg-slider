<?php
/**
 * WPSS Tab Class
 *
 * Handles the admin tab setup and related functionalities.
 *
 * @package Slider_Studio
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPSS_Tab' ) ) {

	/**
	 * Class WPSS_Tab
	 *
	 * Initializes the admin tab for WPSS.
	 */
	class WPSS_Tab {

		/**
		 * Constructor for WPSS_Tab class.
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
			
			// Enqueue the WPSS tab CSS.
			wp_enqueue_style(
				'wpss-tab',
				WPSS_URL . 'includes/admin/tab/css/wpss-tab.css',
				array(),
				WPSS_VERSION 
			);

		}

	}

	// Instantiate the WPSS_Tab class.
	new WPSS_Tab();
}
