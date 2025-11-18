<?php
/**
 * Smart Block Slider Pro Public Class
 */

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPSBS_Public_Pro' ) ) :

    /**
	 * Class WPSBS_Public_Pro
     * 
	 */
    class WPSBS_Public_Pro {

        /**
         * Constructor for the class.
         */
        public function __construct() {
            $this->events_handler();
        }

        /**
         * Initialize hooks and filters.
         */
        public function events_handler() {
            add_action( 'wp_enqueue_scripts', [ $this, 'frontend_assets_pro' ], 10 );
            add_filter( 'wpsbs_pro_scrollbar', [ $this, 'wpsbs_scrollbar' ], 10, 2 );
            add_filter( 'wpsbs_pro_thumb_gallery', [ $this, 'wpsbs_thumb_gallery' ], 10, 2 );
        }

        public function wpsbs_scrollbar( $html, $context ) {
            return '<div class="swiper-scrollbar"></div>';
        }

        public function wpsbs_thumb_gallery( $html, $context ) {
            $image_ids    = isset( $context['image_ids'] ) ? $context['image_ids'] : array();
            $slides       = isset( $context['slides'] ) ? $context['slides'] : array();
            $thumb_width  = isset( $context['thumb_width'] ) ? $context['thumb_width'] : 80;
            $thumb_height = isset( $context['thumb_height'] ) ? $context['thumb_height'] : 80;
            $hasSlides    = isset( $context['hasSlides'] ) ? $context['hasSlides'] : false;
            $hasImages    = isset( $context['hasImages'] ) ? $context['hasImages'] : false;
        
            ob_start(); 
            wpsbs_get_template_pro(
                'frontend/slideshow-pro.php',
                array(
                    'image_ids'     => $image_ids,
                    'slides'        => $slides,
                    'thumb_width'   => $thumb_width,
                    'thumb_height'  => $thumb_height,
                    'hasSlides'     => $hasSlides,
                    'hasImages'     => $hasImages,
                )
            );
            
            return ob_get_clean();
        }

        public function frontend_assets_pro() {

            wp_enqueue_style( 
                'wpsbs-frontend-pro-style', 
                WPSBS_PRO_URL . 'assets/css/wpsbs-frontend-pro-style.css', 
                array(), 
                WPSBS_PRO_VERSION
            );

            wp_enqueue_script(
                'wpsbs-frontend-pro',
                WPSBS_PRO_URL . 'assets/js/wpsbs-frontend-pro.js',
                array('jquery'),
                WPSBS_PRO_VERSION,
                true
            );
            
        }

    }
    new WPSBS_Public_Pro();

endif;