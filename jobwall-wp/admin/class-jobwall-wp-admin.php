<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/pioniergarage/jobwall-wp/
 * @since      0.1.0
 *
 * @package    jobwall_wp
 * @subpackage jobwall_wp/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and the admin menu integration
 * providing pages for simple CRUD functionality of Jobs.
 *
 * @package    jobwall_wp
 * @subpackage jobwall_wp/admin
 * @author Peter Schuller <ps@pzzz.de>
 */
class jobwall_wp_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $plugin    The ID of this plugin.
	 */
	private $plugin;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.0
	 * @param      string    $plugin       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin, $version ) {

		$this->plugin = $plugin;
		$this->version = $version;

	}

	/**
	 * Adds the pages to the Wordpress admin area.
	 * 
	 * @since    0.1.0
	 */
	public function add_menu() {
		add_menu_page('Jobwall', 'Jobwall', 'manage_options', 'jobwall-wp-admin', array('jobwall_wp_Admin', 'menu_manage_jobwall'), '', 10);
		add_submenu_page( 'jobwall-wp-admin', 'Add Job', 'Add Job', 'manage_options', 'jobwall-wp-admin-add', array('jobwall_wp_Admin', 'menu_manage_jobwall_add'));
	}

	/**
	 * Creates the main settings page that gives an overview of all currently added jobs.
	 * 
	 * @since    0.1.0
	 */
	public function menu_manage_jobwall() {
		echo '<h1>SETTINGS</h1>';
	}

	/**
	 * Creates the subpage for adding a job.
	 * 
	 * Depending on the request type, this function either displays the page
	 * or adds the job, subsequently showing a success of failure page.
	 * 
	 * @since    0.1.0
	 */
	public function menu_manage_jobwall_add() {
		if (isset($_POST['jobwall_job_title'])) {
			if (jobwall_wp_Admin::add_job()) {
				require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/jobwall-wp-admin-added.php';
			} else {
				require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/jobwall-wp-admin-addfail.php';
			}
		} else {
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/jobwall-wp-admin-add.php';
		}
	}

	/**
	 * Handles adding a job to the database.
	 * 
	 * @since    0.1.0
	 * @return boolean
	 */
	private function add_job() {
		$title = $_POST['jobwall_job_title'];
		$shortDescription = $_POST['jobwall_job_shortDescription'];
		$companyName = $_POST['jobwall_job_companyName'];
		$companyLogoUrl = $_POST['jobwall_job_companyLogoUrl'];
		$locationCityName = $_POST['jobwall_job_locationCityName'];
		$locationZipCode = $_POST['jobwall_job_locationZipCode'];
		$locationStreetWithStreetnumber = $_POST['jobwall_job_locationStreetWithStreetnumber'];
		$isStartup = $_POST['jobwall_job_isStartup'];
		$jobType = $_POST['jobwall_job_jobType'];
		$linkToJobPage = $_POST['jobwall_job_linkToJobPage'];
		//TODO: better input checks
		if (null == $title || null == $companyName || null == $locationCityName
				|| null == $locationZipCode || null == $jobType
				|| null == $linkToJobPage) {
			return false;
		}
		if ("on" == $isStartup) {
			$isStartup = true;
		} else {
			$isStartup = false;
		}

		global $wpdb;
		$table_name = $wpdb->prefix . 'jobwall_wp';
		$wpdb->query(
            $wpdb->prepare(
                "INSERT INTO $table_name (title, shortDescription,
            		companyName, companyLogoUrl, locationCityName,
            		locationZipCode, locationStreetWithStreetnumber,
            		isStartup, jobType, linkToJobPage)
                VALUES (%s, %s, %s, %s, %s, %d, %s, %d, %s, %s)",
                $title,
                $shortDescription,
           		$companyName,
           		$companyLogoUrl,
           		$locationCityName,
           		$locationZipCode,
           		$locationStreetWithStreetnumber,
           		$isStartup,
           		$jobType,
           		$linkToJobPage
            )
        );

		//TODO: Better error handling
		$wpdb->print_error();
		return true;
	}
}
