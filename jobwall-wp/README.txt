=== Jobwall WP ===
Contributors: Peter Schuller <ps@pzzz.de>
Tags: jobwall
Requires at least: 4.7.2
Tested up to: 4.7.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provides a Wordpress integrated Admin UI and backend for a jobwall.

== Description ==

Provides a Wordpress integrated Admin UI and backend for a (https://github.com/pioniergarage/jobwall/ jobwall).
It offers basic CRUD operations to add and display jobs in the wordpress admin UI and integrates
in the Wordpress JSON API for public reading access.

== Installation ==
1. Upload `jobwall-wp` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= At which URL will the public JSON be available? =

From your wordpress base URL it is at `./wp-json/wpjobwall/v1/job`.

== Changelog ==

= 0.1 =
* Initial release.