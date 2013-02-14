<?php

function orbis_hosting_create_initial_post_types() {
	global $orbis_hosting_plugin;

	register_post_type(
		'orbis_hosting_group',
		array(
			'label'         => __( 'Hosting Group', 'orbis_hosting' ),
				'labels'        => array(
				'name'          => __( 'Hosting Groups', 'orbis_hosting' ),
				'singular_name' => __( 'Hosting Group', 'orbis_hosting' ),
				'add_new'       => _x( 'Add New', 'hosting_group', 'orbis_hosting' ),
				'add_new_item'  => __( 'Add New Hosting Group', 'orbis_hosting' )
			),
			'public'        => true,
			'menu_position' => 30,
			'menu_icon'     => $orbis_hosting_plugin->plugin_url( 'admin/images/hosting_group.png' ),
			'supports'      => array( 'title', 'comments' ),
			'has_archive'   => true,
			'rewrite'       => array( 'slug' => 'hostinggroep' )
		)
	);

	register_post_type(
		'orbis_domain_name',
		array(
			'label'         => __( 'Domain Names', 'orbis_hosting' ),
				'labels'        => array(
				'name'          => __( 'Domain Names', 'orbis_hosting' ),
				'singular_name' => __( 'Domain Name', 'orbis_hosting' ),
				'add_new'       => _x( 'Add New', 'domain_name', 'orbis_hosting' ),
				'add_new_item'  => __( 'Add New Domain Name', 'orbis_hosting' )
			),
			'public'        => true,
			'menu_position' => 30,
			'menu_icon'     => $orbis_hosting_plugin->plugin_url( 'admin/images/domain_name.png' ),
			'supports'      => array( 'title', 'comments' ),
			'has_archive'   => true,
			'rewrite'       => array( 'slug' => 'domeinnamen' )
		)
	);
}

add_action( 'init', 'orbis_hosting_create_initial_post_types', 0 ); // highest priority
