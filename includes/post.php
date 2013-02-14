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
			'supports'      => array( 'title', 'editor', 'comments' ),
			'has_archive'   => true,
			'rewrite'       => array( 'slug' => _x( 'hosting-groups', 'slug', 'orbis_hosting' ) ) 
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

function orbis_hosting_p2p_init() {
	p2p_register_connection_type( array(
		'name'        => 'orbis_hosting_groups_to_domain_names',
		'from'        => 'orbis_hosting_group',
		'to'          => 'orbis_domain_name',
		'cardinality' => 'one-to-many'
	) );
}

add_action( 'p2p_init', 'orbis_hosting_p2p_init' );

/**
 * Hosting group content
*/
function orbis_hosting_the_content( $content ) {
	if ( get_post_type() == 'orbis_hosting_group' ) {
		$id = get_the_ID();

		$domain_names = get_posts( array(
			'connected_type'  => 'orbis_hosting_groups_to_domain_names',
			'connected_items' => get_queried_object(),
			'nopaging'        => true
		) );

		if ( ! empty( $domain_names ) ) {
			$str  = '';
			
			$str .= '<ul>';
			
			foreach ( $domain_names as $domain_name ) {
				$str .= '<li>';
				$str .= sprintf(
					'<a href="%s">%s</a>',
					get_permalink( $domain_name ),
					get_the_title( $domain_name )
				);
				$str .= '</li>';
			}
			
			$str .= '</ul>';
			
			$content .= $str;
		}
	}

	return $content;
}

add_filter( 'the_content', 'orbis_hosting_the_content' );
