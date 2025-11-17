<?php
/**
 * Block Slider Pro Public Class
 */

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'BS_Public_Pro' ) ) :

    /**
	 * Class BS_Public_Pro
     * 
	 */
    class BS_Public_Pro {

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
            add_filter( 'BS_PRO_scrollbar', [ $this, 'bs_scrollbar' ], 10, 2 );
            add_filter( 'BS_PRO_thumb_gallery', [ $this, 'bs_thumb_gallery' ], 10, 2 );
        }

        public function bs_scrollbar( $html, $context ) {
            return '<div class="swiper-scrollbar"></div>';
        }

        public function bs_thumb_gallery( $html, $context ) {
            $image_ids    = isset( $context['image_ids'] ) ? $context['image_ids'] : array();
            $slides       = isset( $context['slides'] ) ? $context['slides'] : array();
            $thumb_width  = isset( $context['thumb_width'] ) ? $context['thumb_width'] : 80;
            $thumb_height = isset( $context['thumb_height'] ) ? $context['thumb_height'] : 80;
            $hasSlides    = isset( $context['hasSlides'] ) ? $context['hasSlides'] : false;
            $hasImages    = isset( $context['hasImages'] ) ? $context['hasImages'] : false;
        
            ob_start(); 
            bs_get_template_pro(
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
                'bs-frontend-pro-style', 
                BS_PRO_URL . 'assets/css/bs-frontend-pro-style.css', 
                array(), 
                BS_PRO_VERSION
            );

            wp_enqueue_script(
                'bs-frontend-pro',
                BS_PRO_URL . 'assets/js/bs-frontend-pro.js',
                array('jquery'),
                BS_PRO_VERSION,
                true
            );
            
        }

    }
    new BS_Public_Pro();

endif;