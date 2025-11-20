<?php
/**
 * WPBS Tab Class
 *
 * Handles the admin tab setup and related functionalities.
 *
 * @package Blocksy_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPBS_Tab' ) ) {

	/**
	 * Class WPBS_Tab
	 *
	 * Initializes the admin tab for WPBS.
	 */
	class WPBS_Tab {

		/**
		 * Constructor for WPBS_Tab class.
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
			
			// Enqueue the WPBS tab CSS.
			wp_enqueue_style(
				'wpbs-tab',
				WPBS_URL . 'includes/admin/tab/css/wpbs-tab.css',
				array(),
				WPBS_VERSION 
			);

		}

	}

	// Instantiate the WPBS_Tab class.
	new WPBS_Tab();
}
