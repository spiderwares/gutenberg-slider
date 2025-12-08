<?php
/**
 * WPSP Tab Class
 *
 * Handles the admin tab setup and related functionalities.
 *
 * @package Slider|_Press
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPSP_Tab' ) ) {

	/**
	 * Class WPSP_Tab
	 *
	 * Initializes the admin tab for WPSP.
	 */
	class WPSP_Tab {

		/**
		 * Constructor for WPSP_Tab class.
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
			
			// Enqueue the WPSP tab CSS.
			wp_enqueue_style(
				'wpsp-tab',
				WPSP_URL . 'includes/admin/tab/css/wpsp-tab.css',
				array(),
				WPSP_VERSION 
			);

		}

	}

	// Instantiate the WPSP_Tab class.
	new WPSP_Tab();
}
