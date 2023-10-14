<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://titu.com
 * @since             1.0.0
 * @package           Woo_Quick_View
 *
 * @wordpress-plugin
 * Plugin Name:       Woo Quick View
 * Plugin URI:        https://titu.com
 * Description:       Lot of feature
 * Version:           1.0.0
 * Author:            TItu
 * Author URI:        https://titu.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woo-quick-view
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WOO_QUICK_VIEW_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woo-quick-view-activator.php
 */
function activate_woo_quick_view() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-quick-view-activator.php';
	Woo_Quick_View_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woo-quick-view-deactivator.php
 */
function deactivate_woo_quick_view() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-quick-view-deactivator.php';
	Woo_Quick_View_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woo_quick_view' );
register_deactivation_hook( __FILE__, 'deactivate_woo_quick_view' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woo-quick-view.php';
require plugin_dir_path( __FILE__ ) . 'admin/setting-option.php';
require plugin_dir_path( __FILE__ ) . 'admin/plugin-option.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woo_quick_view() {

	$plugin = new Woo_Quick_View();
	$plugin->run();

}
run_woo_quick_view();
