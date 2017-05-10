<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing form for listing jobs.
 *
 * @link       https://github.com/pioniergarage/jobwall-wp/
 * @since      0.1.0
 *
 * @package    jobwall_wp
 * @subpackage jobwall_wp/admin/partials
 */
?>

<div class="wrap">
	<h1>SETTINGS</h1>

	<form method="post">
		<table class="wp-list-table widefat fixed striped posts">
			<thead>
				<tr>
					<th scope="col" id="title"
						class="manage-column column-title column-primary sortable desc"
						colspan="2"><span>Titel</span></th>
				</tr>
			</thead>
			<tbody id="the-list">
				<?php
					global $wpdb;
					$result = $wpdb->get_results ( 'SELECT id, title FROM ' . $wpdb->prefix . 'jobwall_wp' );
					if (is_array ( $result )) {
						foreach ( ( array ) $result as $job ) {
							echo '<tr id="post-1" class="format-standard hentry category-allgemein">
						 <td class="title column-title has-row-actions column-primary">'. $job->{'title'} . '</td>
						 <td><button name="delete" class ="delete" value="' . $job->{'id'} . '" type="submit">Delete</button></td></tr>';
						}
					}
				?>
			</tbody>
		</table>
	</form>
</div>