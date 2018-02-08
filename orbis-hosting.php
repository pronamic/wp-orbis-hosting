<?php
/*
Plugin Name: Orbis Hosting
Plugin URI: http://orbiswp.com/
Description:

Version: 0.1
Requires at least: 3.5

Author: Pronamic
Author URI: http://pronamic.eu/

Text Domain: orbis
Domain Path: /languages/

License: GPL

GitHub URI: https://github.com/pronamic/wp-orbis-hosting
*/

function orbis_hosting_bootstrap() {
	include 'classes/orbis-hosting-plugin.php';

	global $orbis_hosting_plugin;

	$orbis_hosting_plugin = new Orbis_Hosting_Plugin( __FILE__ );
}

add_action( 'orbis_bootstrap', 'orbis_hosting_bootstrap' );
