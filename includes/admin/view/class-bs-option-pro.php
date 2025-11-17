<?php
/**
 * Block Slider Pro Option Class
*/

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'BS_Option_Pro' ) ) :

    /**
     * Class BS_Option_Pro
     */
    class BS_Option_Pro {
        
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

            add_action( 'bs_admin_tabs_after_responsive', [ $this, 'add_thumbnail_gallery_tab' ] );
            add_action( 'bs_admin_tab_content_after_responsive', [ $this, 'add_thumbnail_gallery_tab_content' ] );
        }

        /**
         * Add thumbnail gallery tab link
         */
        public function add_thumbnail_gallery_tab() {
            ?>
            <a href="#thumbnail-gallery-tab" class="bs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( BS_PRO_URL . 'assets/images/thumbnail-gallery.svg'); ?>" alt="<?php echo esc_attr__( 'Thumbnail Gallery', 'block-slider-pro' ); ?>" />
                <?php echo esc_html__( 'Thumbnail Gallery', 'block-slider-pro' ); ?>
            </a>
            <a href="#scrollbar-tab" class="bs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( BS_PRO_URL . 'assets/images/scrollbar.svg'); ?>" alt="<?php echo esc_attr__( 'Scrollbar', 'block-slider-pro' ); ?>" />
                <?php echo esc_html__( 'Scrollbar', 'block-slider-pro' ); ?>
            </a>
            <?php
        }

        /**
         * Add thumbnail gallery tab content
         */
        public function add_thumbnail_gallery_tab_content() {
            global $post;
            require_once BS_PATH . 'includes/admin/settings/views/thumbnail-gallery.php';
            require_once BS_PATH . 'includes/admin/settings/views/scrollbar.php';
        }
    }

    new BS_Option_Pro();

endif;
