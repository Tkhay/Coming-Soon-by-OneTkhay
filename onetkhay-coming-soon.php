<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://tiekuasare.com
 * @since             1.0.0
 * @package           Onetkhay_Coming_Soon
 *
 * @wordpress-plugin
 * Plugin Name:       Coming Soon by OneTkhay
 * Plugin URI:        https://tiekuasare.com
 * Description:       Easily create a professional coming soon page to inform visitors your site is under development. This plugin is simple to use, highly customizable, and helps you start building your audience before you even launch.
 * Version:           1.0.0
 * Author:            Tieku Asare
 * Author URI:        https://tiekuasare.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       onetkhay-coming-soon
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
define( 'ONETKHAY_COMING_SOON_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-onetkhay-coming-soon-activator.php
 */
function activate_onetkhay_coming_soon() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-onetkhay-coming-soon-activator.php';
	Onetkhay_Coming_Soon_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-onetkhay-coming-soon-deactivator.php
 */
function deactivate_onetkhay_coming_soon() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-onetkhay-coming-soon-deactivator.php';
	Onetkhay_Coming_Soon_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_onetkhay_coming_soon' );
register_deactivation_hook( __FILE__, 'deactivate_onetkhay_coming_soon' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-onetkhay-coming-soon.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_onetkhay_coming_soon() {

	$plugin = new Onetkhay_Coming_Soon();
	$plugin->run();

}
run_onetkhay_coming_soon();
