<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Installation related functions and actions.
 */

if ( ! class_exists( 'BS_Install' ) ) :

    /**
     * BS_Install Class
     *
     * Handles installation processes like creating database tables,
     * setting up roles, and creating necessary pages on plugin activation.
     */
    class BS_Install {

        /**
         * Hook into WordPress actions and filters.
         */
        public static function init() {
            add_filter( 'plugin_action_links_' . plugin_basename( BS_FILE ), array( __CLASS__, 'plugin_action_links' ) );
        }

        /**
         * Install plugin.
         */
        public static function install() {
            if ( ! is_blog_installed() ) :
                return;
            endif;
        }

        /**
         * Add plugin action links.
         *
         * @param array $links Array of action links.
         * @return array Modified array of action links.
         */
        public static function plugin_action_links( $links ) {
            $action_links = array(
                'manage_sldier' => sprintf(
                    '<a href="%s" aria-label="%s">%s</a>',
                    admin_url( 'edit.php?post_type=bs_slider' ),
                    esc_attr__( 'Manage Sliders', 'block-slider' ),
                    esc_html__( 'Manage Sliders', 'block-slider' )
                ),
            );
            return array_merge( $action_links, $links );
        }
    }

    BS_Install::init();

endif;