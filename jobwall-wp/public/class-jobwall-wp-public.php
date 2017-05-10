<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/pioniergarage/jobwall-wp/
 * @since      0.1.0
 *
 * @package    jobwall_wp
 * @subpackage jobwall_wp/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and the functions for the
 * JSON REST API.
 *
 * @package jobwall_wp
 * @subpackage jobwall_wp/public
 * @author Peter Schuller <ps@pzzz.de>
 */
class jobwall_wp_Public {
	
	/**
	 * The ID of this plugin.
	 *
	 * @since 0.1.0
	 * @access private
	 * @var string $plugin The ID of this plugin.
	 */
	private $plugin;
	
	/**
	 * The version of this plugin.
	 *
	 * @since 0.1.0
	 * @access private
	 * @var string $version The current version of this plugin.
	 */
	private $version;
	
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 0.1.0
	 * @param string $plugin
	 *        	The name of the plugin.
	 * @param string $version
	 *        	The version of this plugin.
	 */
	public function __construct($plugin, $version) {
		$this->plugin = $plugin;
		$this->version = $version;
	}
	
	/**
	 * Return all jobs that are currently in the database.
	 *
	 * @return unknown
	 */
	public function get_jobs() {
		global $wpdb;
		$result = $wpdb->get_results ( 'SELECT title, created, shortDescription, companyName, companyLogoUrl,
				locationCityName, locationZipCode, locationStreetWithStreetnumber, isStartup, jobType,
				linkToJobPage FROM ' . $wpdb->prefix . 'jobwall_wp' );
		return $result;
	}
}
