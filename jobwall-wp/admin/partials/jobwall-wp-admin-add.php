<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing form for adding a job.
 *
 * @link       https://github.com/pioniergarage/jobwall-wp/
 * @since      0.1.0
 *
 * @package    jobwall_wp
 * @subpackage jobwall_wp/admin/partials
 */
?>

<div class="wrap">
	<h1>Add Job</h1>

	<form method="post">
		<table class="form-table">
			<tr valign="top">
				<th scope="row">Job title</th>
				<td><input type="text" name="jobwall_job_title" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">Short Description (Optional)</th>
				<td><input type="text" name="jobwall_job_shortDescription" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">Company Name</th>
				<td><input type="text" name="jobwall_job_companyName" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">Company Logo URL (Optional)</th>
				<td><input type="text" name="jobwall_job_companyLogoUrl" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">Location City Name</th>
				<td><input type="text" name="jobwall_job_locationCityName" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">Location ZIP Code</th>
				<td><input type="number" name="jobwall_job_locationZipCode" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">Location Street with Number (Optional)</th>
				<td><input type="text" name="jobwall_job_locationStreetWithStreetnumber" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">Is Startup?</th>
				<td><input type="checkbox" name="jobwall_job_isStartup" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">Job Type</th>
				<?php /** @see https://github.com/pioniergarage/jobwall/blob/master/src/app/job-list/job-list.service.ts */ ?>
				<td><select name="jobwall_job_jobType">
					<option>Werkstudentenstelle</option>
					<option>Praktikum</option>
					<option>Thesis</option>
					<option>Vollzeitstelle</option>
					<option>Teilzeitstelle</option>
					<option>Mitgründer</option>
				</select></td>
			</tr>
			<tr valign="top">
				<th scope="row">Link to Job Page</th>
				<td><input type="text" name="jobwall_job_linkToJobPage" /></td>
			</tr>
		</table>
    <?php submit_button('Add Job'); ?>
	</form>
</div>