<?php

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'BS_PRO' ) ) :

    /**
     * Main BS_PRO Class
     */
    final class BS_PRO {

        /**
         * The single instance of the class.
         *
         * @var BS_PRO
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
            add_action( 'plugins_loaded', array( $this, 'bs_install' ), 11 );
            add_action( 'bs_init', array( $this, 'includes' ), 11 );
        }

        /**
         * Get the single instance of BS_PRO
         *
         * @return BS_PRO
         */
        public static function instance() {
            if ( is_null( self::$instance ) ) :
                self::$instance = new self();
                do_action( 'bs_plugin_loaded' );
            endif;
            return self::$instance;
        }

        /**
         * Function to display admin notice if Block Slider Pro is not active.
         */
        public function bs_slider_admin_notice() {
            ?>
            <div class="notice notice-error">
                <p><?php echo esc_html( 'Block Slider Pro is activated but not effective — the required Gutenberg Slider plugin free plugin is missing or inactive. Please install and activate the free Gutenberg Slider plugin to enable all Pro features.', 'block-slider-pro' ); ?></p>
            </div>
            <?php
        }

        /**
         * Function to initialize the plugin after checking free version.
         */
        public function bs_install() {
            if ( ! class_exists( 'BS_Manage_Metadata' ) ) :
                add_action( 'admin_notices', array( $this, 'bs_slider_admin_notice' ) );
            else:
                do_action( 'bs_init' );
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

            require_once BS_PRO_PATH . 'includes/bs-core-functions-pro.php';
        }

        /**
         * Include admin files.
         */
        public function includes_admin() {
            require_once BS_PRO_PATH . 'includes/class-bs-install-pro.php';
            require_once BS_PRO_PATH . 'includes/admin/view/class-bs-option-pro.php';
            require_once BS_PRO_PATH . 'includes/admin/class-bs-settings-pro.php';
        }

        /**
         * Include public files.
         */
        public function includes_public() {
            require_once BS_PRO_PATH . 'includes/public/class-bs-public-pro.php';
        }
    }

endif;
