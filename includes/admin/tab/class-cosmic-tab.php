<?php
/**
 * Cosmic Dashboard Class
 *
 * Handles the admin tab setup and related functionalities.
 *
 * @package Gutenberg_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Cosmic_Tab' ) ) {

	/**
	 * Class Cosmic_Tab
	 *
	 * Initializes the admin tab for Cosmic.
	 */
	class Cosmic_Tab {

		/**
		 * Constructor for Cosmic_Tab class.
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
			
			// Enqueue the Cosmic tab CSS.
			wp_enqueue_style(
				'cosmic-tab',
				GTBS_URL . 'includes/admin/tab/css/cosmic-tab.css',
				[],
				GTBS_VERSION 
			);

		}

	}

	// Instantiate the Cosmic_Tab class.
	new Cosmic_Tab();
}
