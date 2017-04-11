<?php

/**
 * @link              https://github.com/pioniergarage/jobwall-wp/
 * @since             0.1.0
 * @package           jobwall_wp
 *
 * @wordpress-plugin
 * Plugin Name:       Jobwall WP
 * Plugin URI:        https://github.com/pioniergarage/jobwall-wp/
 * Description:       Provides a Wordpress integrated Admin UI and backend for a jobwall ( https://github.com/pioniergarage/jobwall/ ).
 * Version:           0.1.0
 * Author:            Pioniergarage e.V.
 * Author URI:        https://github.com/pioniergarage/jobwall-wp/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       jobwall-wp
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-jobwall-wp-activator.php
 */
function activate_jobwall_wp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-jobwall-wp-activator.php';
	jobwall_wp_Activator::activate();
}

register_activation_hook( __FILE__, 'activate_jobwall_wp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-jobwall-wp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_jobwall_wp() {

	$plugin = new jobwall_wp();
	$plugin->run();

}
run_jobwall_wp();