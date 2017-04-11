<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/pioniergarage/jobwall-wp/
 * @since      0.1.0
 *
 * @package    jobwall_wp
 * @subpackage jobwall_wp/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      0.1.0
 * @package    jobwall_wp
 * @subpackage jobwall_wp/includes
 * @author     Peter Schuller <ps@pzzz.de>
 */
class jobwall_wp_Activator {

	/**
	 * Activator for database table.
	 *
	 * During activation a custom database table is created or updated.
	 * Currently no other setup functionality is necessary.
	 *
	 * @since    0.1.0
	 */
	public static function activate() {
		jobwall_wp_Activator::jobwall_db_install();
	}

	private static function jobwall_db_install() {
		global $wpdb;

		$table_name = $wpdb->prefix . 'jobwall_wp';

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
		id INT(9) NOT NULL AUTO_INCREMENT,
		title VARCHAR(256) NOT NULL,
		created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		shortDescription TEXT NULL,
		companyName VARCHAR(256) NOT NULL,
		companyLogoUrl VARCHAR(256) NULL,
		locationCityName VARCHAR(256) NOT NULL,
		locationZipCode INT(5) NOT NULL,
		locationStreetWithStreetnumber VARCHAR(256) NULL,
		isStartup BOOLEAN NOT NULL DEFAULT FALSE,
		jobType VARCHAR(256) NOT NULL,
		linkToJobPage VARCHAR(256) NOT NULL,
		PRIMARY KEY (id)
		) $charset_collate;";

		if ( ! function_exists('dbDelta') ) {
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		}
		dbDelta( $sql );

		add_option( 'jobwall_wp_db_version', "0.1.0" );
	}
}
