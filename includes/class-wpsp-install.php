<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Installation related functions and actions.
 */

if ( ! class_exists( 'WPSP_Install' ) ) :

    /**
     * WPSP_Install Class
     *
     * Handles installation processes like creating database tables,
     * setting up roles, and creating necessary pages on plugin activation.
     */
    class WPSP_Install {

        /**
         * Hook into WordPress actions and filters.
         */
        public static function init() {
            add_filter( 'plugin_action_links_' . plugin_basename( WPSP_FILE ), array( __CLASS__, 'plugin_action_links' ) );
            add_filter( 'plugin_row_meta', array( __CLASS__, 'plugin_row_meta' ), 10, 2 );
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
         * Add link to Documentation.
         *
         * @param array $links Array of action links.
         * @param string $file Plugin file.
         * @return array Modified array of action links.
         */
        public static function plugin_row_meta( $links, $file ) {
            if ( plugin_basename( WPSP_FILE ) === $file ) :
                $doc_url   = esc_url( 'https://documentation.cosmicinfosoftware.com/slider-press/documents/getting-started/introduction/' );
                $doc_label = esc_html( 'Documentation' );
        
                $new_links = array(
                    '<a href="' . $doc_url . '" target="_blank">' . $doc_label . '</a>',
                );
        
                $links = array_merge( $links, $new_links );
            endif;
        
            return $links;
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
                    admin_url( 'edit.php?post_type=wpsp_slider' ),
                    esc_attr__( 'Manage Sliders', 'slider-press' ),
                    esc_html__( 'Manage Sliders', 'slider-press' )
                ),
            );
            return array_merge( $action_links, $links );
        }
    }

    WPSP_Install::init();

endif;