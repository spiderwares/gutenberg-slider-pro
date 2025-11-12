<?php
/**
 * Gutenberg Pro Slider Public Class
 */

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'GTBS_Public_Pro' ) ) :

    class GTBS_Public_Pro {

        public function __construct() {
            $this->events_handler();
        }

        public function events_handler() {
            add_action( 'wp_enqueue_scripts', [ $this, 'frontend_assets_pro' ], 10 );
            add_filter( 'gtbs_pro_scrollbar', [ $this, 'gtbs_scrollbar' ], 10, 2 );
            add_filter( 'gtbs_pro_thumb_gallery', [ $this, 'gtbs_thumb_gallery' ], 10, 2 );
        }

        public function gtbs_scrollbar( $html, $context ) {
            return '<div class="swiper-scrollbar"></div>';
        }

        public function gtbs_thumb_gallery( $html, $context ) {
            $image_ids    = isset( $context['image_ids'] ) ? $context['image_ids'] : array();
            $thumb_width  = isset( $context['thumb_width'] ) ? $context['thumb_width'] : 80;
            $thumb_height = isset( $context['thumb_height'] ) ? $context['thumb_height'] : 80;
            $thumb_gallery_view = isset( $thumb_gallery_view ) ? (int) $thumb_gallery_view : 5;

            ob_start(); 
            gtbs_get_template_pro(
            'frontend/slideshow-pro.php',
                array(
                    'image_ids'     => $image_ids, 
                    'thumb_width'   => $thumb_width,
                    'thumb_height'  => $thumb_height,
                )
            );
            
            return ob_get_clean();
        }

        public function frontend_assets_pro() {

            wp_enqueue_style( 
                'gtbs-frontend-pro-style', 
                GTBS_PRO_URL . 'assets/css/gtbs-frontend-pro-style.css', 
                array(), 
                GTBS_PRO_VERSION
            );

            wp_enqueue_script(
                'gtbs-frontend-pro',
                GTBS_PRO_URL . 'assets/js/gtbs-frontend-pro.js',
                array('jquery'),
                GTBS_PRO_VERSION,
                true
            );
            
        }

    }
    new GTBS_Public_Pro();

endif;