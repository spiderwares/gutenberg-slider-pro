<?php

/**
 * Installation related functions and actions.
 */

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'BS_Install_Pro' ) ) :

    /**
     * BS_Install_Pro Class
     *
     * Handles installation processes like creating database tables,
     * setting up roles, and creating necessary pages on plugin activation.
     */
    class BS_Install_Pro {

        /**
         * Hook into WordPress actions and filters.
         */
        public static function init() {
            add_filter( 'plugin_action_links_' . plugin_basename( BS_PRO_FILE ), array( __CLASS__, 'plugin_action_links' ) );
        }

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
                    esc_attr__( 'Manage Sliders', 'block-slider-pro' ),
                    esc_html__( 'Manage Sliders', 'block-slider-pro' )
                ),
            );
            return array_merge( $action_links, $links );
        }
    }

    BS_Install_Pro::init();

endif;