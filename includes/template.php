<?php

function orbis_domain_name_hosting_group_details() {
	if ( is_singular( 'orbis_domain_name' ) ) {
		global $orbis_hosting_plugin;

		$orbis_hosting_plugin->plugin_include( 'templates/domain-name-hosting-group-details.php' );
	}
}

add_action( 'orbis_after_side_content', 'orbis_domain_name_hosting_group_details' );
