<?php
/**
 * Plugin Name:       Block Slider Pro
 * Description:       Create stunning, fully responsive sliders using the Gutenberg block editor with customizable navigation, thumbnail gallery, and 10+ animation effects.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Cosmic
 * Author URI:        https://cosmicinfosoftware.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       block-slider-pro
 *
 * @package Block_Slider_Pro
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) :
    exit;
endif;

if ( ! defined( 'BS_PRO_FILE' ) ) :
    define( 'BS_PRO_FILE', __FILE__ ); // Define the plugin file path.
endif;

if ( ! defined( 'BS_PRO_BASENAME' ) ) :
    define( 'BS_PRO_BASENAME', plugin_basename( BS_PRO_FILE ) ); // Define the plugin basename.
endif;

if ( ! defined( 'BS_PRO_VERSION' ) ) :
    define( 'BS_PRO_VERSION', '1.0.0' ); // Plugin version
endif;

if ( ! defined( 'BS_PRO_PATH' ) ) :
    define( 'BS_PRO_PATH', plugin_dir_path( __FILE__ ) ); // Absolute path to plugin directory
endif;

if ( ! defined( 'BS_PRO_URL' ) ) :
    define( 'BS_PRO_URL', plugin_dir_url( __FILE__ ) ); // URL to plugin directory
endif;

if ( ! class_exists( 'BS_PRO', false ) ) :
    require_once BS_PRO_PATH . 'includes/class-bs-pro.php';
endif;

register_activation_hook( __FILE__, array( 'BS_Install_Pro', 'install' ) ); // set activation hook

BS_PRO::instance();