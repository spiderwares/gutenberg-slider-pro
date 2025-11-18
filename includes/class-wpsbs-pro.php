<?php

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPSBS_PRO' ) ) :

    /**
     * Class WPSBS_PRO
     */
    final class WPSBS_PRO {

        /**
         * The single instance of the class.
         *
         * @var WPSBS_PRO
         */
        protected static $instance = null;

        /**
         * Constructor for the class.
         */
        public function __construct() {
            $this->event_handler();
            $this->includes();
        }

         /**
         * Initialize hooks and filters.
         */
        private function event_handler() {
            add_action( 'plugins_loaded', array( $this, 'wpsbs_install' ), 11 );
            add_action( 'wpsbs_pro_init', array( $this, 'includes' ), 11 );
        }

        /**
         * Get the single instance of WPSBS_PRO
         *
         * @return WPSBS_PRO
         */
        public static function instance() {
            if ( is_null( self::$instance ) ) :
                self::$instance = new self();
                do_action( 'wpsbs_pro_plugin_loaded' );
            endif;
            return self::$instance;
        }

        /**
         * Function to display admin notice if Smart Block Slider Pro is not active.
         */
        public function wpsbs_slider_admin_notice() {
            ?>
            <div class="notice notice-error">
                <p><?php echo esc_html( 'Smart Block Slider Pro is activated but not effective — the required Smart Block Slider plugin free plugin is missing or inactive. Please install and activate the free Smart Block Slider plugin to enable all Pro features.', 'smart-block-slider-pro' ); ?></p>
            </div>
            <?php
        }

        /**
         * Function to initialize the plugin after checking free version.
         */
        public function wpsbs_install() {
            if ( ! class_exists( 'WPSBS_Manage_Metadata' ) ) :
                add_action( 'admin_notices', array( $this, 'wpsbs_slider_admin_notice' ) );
            else:
                do_action( 'wpsbs_pro_init' );
            endif;
        }

        /**
         * Include required files.
         */
        public function includes() {
            if ( is_admin() ) :
                $this->includes_admin();
            else:
                $this->includes_public();
            endif;

            require_once WPSBS_PRO_PATH . 'includes/wpsbs-core-functions-pro.php';
        }

        /**
         * Include admin files.
         */
        public function includes_admin() {
            require_once WPSBS_PRO_PATH . 'includes/class-wpsbs-install-pro.php';
            require_once WPSBS_PRO_PATH . 'includes/admin/view/class-wpsbs-option-pro.php';
            require_once WPSBS_PRO_PATH . 'includes/admin/class-wpsbs-settings-pro.php';
        }

        /**
         * Include public files.
         */
        public function includes_public() {
            require_once WPSBS_PRO_PATH . 'includes/public/class-wpsbs-public-pro.php';
        }
    }

endif;
