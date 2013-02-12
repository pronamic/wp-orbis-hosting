<?php

function orbis_hosting_create_initial_post_types() {
	global $orbis_hosting_plugin;

	register_post_type(
		'orbis_hosting_group',
		array(
			'label'         => __( 'Hosting Group', 'orbis' ),
				'labels'        => array(
				'name'          => __( 'Hosting Groups', 'orbis' ),
				'singular_name' => __( 'Hosting Group', 'orbis' ),
				'add_new'       => _x( 'Add New', 'hosting_group', 'orbis' ),
				'add_new_item'  => __( 'Add New Hosting Group', 'orbis' )
			),
			'public'        => true,
			'menu_position' => 30,
			'menu_icon'     => plugins_url( 'images/hosting_group.png', $orbis_hosting_plugin->file ),
			'supports'      => array( 'title', 'comments' ),
			'has_archive'   => true,
			'rewrite'       => array( 'slug' => 'hostinggroep' )
		)
	);

	register_post_type(
		'orbis_domain_name',
		array(
			'label'         => __( 'Domain Names', 'orbis' ),
				'labels'        => array(
				'name'          => __( 'Domain Names', 'orbis' ),
				'singular_name' => __( 'Domain Name', 'orbis' ),
				'add_new'       => _x( 'Add New', 'domain_name', 'orbis' ),
				'add_new_item'  => __( 'Add New Domain Name', 'orbis' )
			),
			'public'        => true,
			'menu_position' => 30,
			'menu_icon'     => plugins_url( 'images/domain_name.png', $orbis_hosting_plugin->file ),
			'supports'      => array( 'title', 'comments' ),
			'has_archive'   => true,
			'rewrite'       => array( 'slug' => 'domeinnamen' )
		)
	);
}

add_action( 'init', 'orbis_hosting_create_initial_post_types', 0 ); // highest priority
