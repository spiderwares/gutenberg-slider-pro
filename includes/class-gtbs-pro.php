<?php

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'GTBS_PRO' ) ) :

    /**
     * Main GTBS_PRO Class
     */
    final class GTBS_PRO {

        /**
         * The single instance of the class.
         *
         * @var GTBS_PRO
         */
        protected static $instance = null;

        /**
         * Constructor
         */
        public function __construct() {
            $this->event_handler();
            $this->includes();
        }

        /**
         * Hook initialization
         */
        private function event_handler() {
            add_action( 'plugins_loaded', array( $this, 'gtbs_install' ), 11 );
            add_action( 'gtbs_init', array( $this, 'includes' ), 11 );
        }

        /**
         * Get the single instance of GTBS_PRO
         *
         * @return GTBS_PRO
         */
        public static function instance() {
            if ( is_null( self::$instance ) ) :
                self::$instance = new self();
                do_action( 'gtbs_plugin_loaded' );
            endif;
            return self::$instance;
        }

        /**
         * Function to display admin notice if Gutenberg Pro Slider is not active.
         */
        public function gtbs_slider_admin_notice() {
            ?>
            <div class="notice notice-error">
                <p><?php echo esc_html( 'Gutenberg Pro Slider is activated but not effective — the required Gutenberg Slider plugin free plugin is missing or inactive. Please install and activate the free Gutenberg Slider plugin to enable all Pro features.', 'gutenberg-pro-slider' ); ?></p>
            </div>
            <?php
        }

        /**
         * Function to initialize the plugin after checking free version.
         */
        public function gtbs_install() {
            if ( ! class_exists( 'GTBS_Manage_Metadata' ) ) :
                add_action( 'admin_notices', array( $this, 'gtbs_slider_admin_notice' ) );
            else:
                do_action( 'gtbs_init' );
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

            require_once GTBS_PRO_PATH . 'includes/gtbs-core-functions-pro.php';
        }

        /**
         * Include admin files.
         */
        public function includes_admin() {
            require_once GTBS_PRO_PATH . 'includes/class-gtbs-install-pro.php';
            require_once GTBS_PRO_PATH . 'includes/admin/class-gtbs-settings-pro.php';
        }

        /**
         * Include public files.
         */
        public function includes_public() {
            require_once GTBS_PRO_PATH . 'includes/public/class-gtbs-public-pro.php';
        }
    }

endif;
