<?php
/**
 * Smart Block Slider Pro Option Class
*/

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPSBS_Option_Pro' ) ) :

    /**
     * Class WPSBS_Option_Pro
     */
    class WPSBS_Option_Pro {
        
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

            add_action( 'wpsbs_admin_tabs_after_responsive', [ $this, 'add_thumbnail_gallery_tab' ] );
            add_action( 'wpsbs_admin_tab_content_after_responsive', [ $this, 'add_thumbnail_gallery_tab_content' ] );
        }

        /**
         * Add thumbnail gallery tab link
         */
        public function add_thumbnail_gallery_tab() {
            ?>
            <a href="#thumbnail-gallery-tab" class="wpsbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSBS_PRO_URL . 'assets/images/thumbnail-gallery.svg'); ?>" alt="<?php echo esc_attr__( 'Thumbnail Gallery', 'smart-block-slider-pro' ); ?>" />
                <?php echo esc_html__( 'Thumbnail Gallery', 'smart-block-slider-pro' ); ?>
            </a>
            <a href="#scrollbar-tab" class="wpsbs-tab">
                <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin asset, not a WordPress media library attachment. ?>
                <img src="<?php echo esc_url( WPSBS_PRO_URL . 'assets/images/scrollbar.svg'); ?>" alt="<?php echo esc_attr__( 'Scrollbar', 'smart-block-slider-pro' ); ?>" />
                <?php echo esc_html__( 'Scrollbar', 'smart-block-slider-pro' ); ?>
            </a>
            <?php
        }

        /**
         * Add thumbnail gallery tab content
         */
        public function add_thumbnail_gallery_tab_content() {
            global $post;
            require_once WPSBS_PATH . 'includes/admin/settings/views/thumbnail-gallery.php';
            require_once WPSBS_PATH . 'includes/admin/settings/views/scrollbar.php';
        }
    }

    new WPSBS_Option_Pro();

endif;
