<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the successful adding of a job.
 *
 * @link       https://github.com/pioniergarage/jobwall-wp/
 * @since      0.1.0
 *
 * @package    jobwall_wp
 * @subpackage jobwall_wp/admin/partials
 */
?>

<div class="wrap">
	<h1>Successfully added Job!</h1>

	<form method="post">
    <?php submit_button('Add further Job...'); ?>
	</form>
</div>