<?php
/**
 * Plugin Name:       Smart Block Slider Pro
 * Description:       Create modern, fully responsive sliders in Gutenberg with advanced animations and customizable navigation.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Cosmic
 * Author URI:        https://cosmicinfosoftware.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       smart-block-slider-pro
 *
 * @package Smart_Block_Slider_Pro
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) :
    exit;
endif;

if ( ! defined( 'WPSBS_PRO_FILE' ) ) :
    define( 'WPSBS_PRO_FILE', __FILE__ ); // Define the plugin file path.
endif;

if ( ! defined( 'WPSBS_PRO_BASENAME' ) ) :
    define( 'WPSBS_PRO_BASENAME', plugin_basename( WPSBS_PRO_FILE ) ); // Define the plugin basename.
endif;

if ( ! defined( 'WPSBS_PRO_VERSION' ) ) :
    define( 'WPSBS_PRO_VERSION', '1.0.0' ); // Plugin version
endif;

if ( ! defined( 'WPSBS_PRO_PATH' ) ) :
    define( 'WPSBS_PRO_PATH', plugin_dir_path( __FILE__ ) ); // Absolute path to plugin directory
endif;

if ( ! defined( 'WPSBS_PRO_URL' ) ) :
    define( 'WPSBS_PRO_URL', plugin_dir_url( __FILE__ ) ); // URL to plugin directory
endif;

if ( ! class_exists( 'WPSBS_PRO', false ) ) :
    require_once WPSBS_PRO_PATH . 'includes/class-wpsbs-pro.php';
endif;

register_activation_hook( __FILE__, array( 'WPSBS_Install_Pro', 'install' ) ); // set activation hook

WPSBS_PRO::instance();