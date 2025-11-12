<?php
/**
 * Plugin Name:       Gutenberg Pro Slider
 * Description:       Create stunning, fully responsive sliders using the Gutenberg block editor with customizable navigation, autoplay, and animation effects.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Cosmic
 * Author URI:        https://cosmicinfosoftware.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gutenberg-pro-slider
 *
 * @package Gutenberg_Pro_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) :
    exit;
endif;

if ( ! defined( 'GTBS_PRO_FILE' ) ) :
    define( 'GTBS_PRO_FILE', __FILE__ ); // Define the plugin file path.
endif;

if ( ! defined( 'GTBS_PRO_BASENAME' ) ) :
    define( 'GTBS_PRO_BASENAME', plugin_basename( GTBS_PRO_FILE ) ); // Define the plugin basename.
endif;

if ( ! defined( 'GTBS_PRO_VERSION' ) ) :
    define( 'GTBS_PRO_VERSION', '1.0.0' ); // Plugin version
endif;

if ( ! defined( 'GTBS_PRO_PATH' ) ) :
    define( 'GTBS_PRO_PATH', plugin_dir_path( __FILE__ ) ); // Absolute path to plugin directory
endif;

if ( ! defined( 'GTBS_PRO_URL' ) ) :
    define( 'GTBS_PRO_URL', plugin_dir_url( __FILE__ ) ); // URL to plugin directory
endif;

if ( ! class_exists( 'GTBS_PRO', false ) ) :
    require_once GTBS_PRO_PATH . 'includes/class-gtbs-pro.php';
endif;

register_activation_hook( __FILE__, array( 'GTBS_Install_Pro', 'install' ) ); // set activation hook

GTBS_PRO::instance();