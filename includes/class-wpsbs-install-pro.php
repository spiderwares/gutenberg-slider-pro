<?php

/**
 * Installation related functions and actions.
 */

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPSBS_Install_Pro' ) ) :

    /**
     * Class WPSBS_Install_Pro
     *
     */
    class WPSBS_Install_Pro {

        /**
         * Hook into WordPress actions and filters.
         */
        public static function init() {
            add_filter( 'plugin_action_links_' . plugin_basename( WPSBS_PRO_FILE ), array( __CLASS__, 'plugin_action_links' ) );
            add_filter( 'plugin_row_meta', array( __CLASS__, 'plugin_row_meta' ), 10, 2 );
        }

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
            if ( plugin_basename( WPSBS_PRO_FILE ) === $file ) :
                $doc_url   = esc_url( 'https://documentation.cosmicinfosoftware.com/block-slider/documents/getting-started/introduction/' );
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
                    admin_url( 'edit.php?post_type=wpsbs_slider' ),
                    esc_attr__( 'Manage Sliders', 'smart-block-slider-pro' ),
                    esc_html__( 'Manage Sliders', 'smart-block-slider-pro' )
                ),
            );
            return array_merge( $action_links, $links );
        }
    }

   WPSBS_Install_Pro::init();

endif;