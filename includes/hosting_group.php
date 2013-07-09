<?php

/**
 * Add person meta boxes
 */
function orbis_hosting_group_add_meta_boxes() {
    add_meta_box( 
        'orbis_hosting_group_details',
        __( 'Hosting Group Details', 'orbis' ),
        'orbis_hosting_group_details_meta_box',
        'orbis_hosting_group' ,
        'normal' ,
        'high'
    );
}

add_action( 'add_meta_boxes', 'orbis_hosting_group_add_meta_boxes' );

/**
 * Peron details meta box
 * 
 * @param array $post
 */
function orbis_hosting_group_details_meta_box( $post ) {
	global $orbis_hosting_plugin;
	
	$orbis_hosting_plugin->plugin_include( '/admin/meta-box-hosting-group-details.php' );
}

/**
 * Save hosting group details
 */
function orbis_save_hosting_group_details( $post_id, $post ) {
	// Doing autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
		return;
	}

	// Verify nonce
	$nonce = filter_input( INPUT_POST, 'orbis_hosting_group_details_meta_box_nonce', FILTER_SANITIZE_STRING );
	if( ! wp_verify_nonce( $nonce, 'orbis_save_hosting_group_details' ) ) {
		return;
	}

	// Check permissions
	if ( ! ( $post->post_type == 'orbis_hosting_group' && current_user_can( 'edit_post', $post_id ) ) ) {
		return;
	}

	// OK
	$definition = array(
		'_orbis_hosting_group_ip_address'        => FILTER_VALIDATE_IP,
		'_orbis_hosting_group_hostname'          => FILTER_SANITIZE_STRING,
		'_orbis_hosting_group_hostname_provider' => FILTER_SANITIZE_STRING
	);

	$data = filter_input_array( INPUT_POST, $definition );

	foreach ( $data as $key => $value ) {
		if ( empty( $value ) ) {
			delete_post_meta( $post_id, $key );
		} else {
			update_post_meta( $post_id, $key, $value );
		}
	}
}

add_action( 'save_post', 'orbis_save_hosting_group_details', 10, 2 );

/**
 * Hosting group edit columns
 */
function orbis_hosting_group_edit_columns( $columns ) {
	return array(
        'cb'                                    => '<input type="checkbox" />', 
        'title'                                 => __( 'Title', 'orbis_hosting' ),
		'orbis_hosting_group_ip_address'        => __( 'IP address', 'orbis_hosting' ),
		'orbis_hosting_group_hostname'          => __( 'Hostname', 'orbis_hosting' ),
		'orbis_hosting_group_hostname_provider' => __( 'Hostname Provider', 'orbis_hosting' ),
		'author'                                => __( 'Author', 'orbis_hosting' ),
		'comments'                              => __( 'Comments', 'orbis_hosting' ), 
        'date'                                  => __( 'Date', 'orbis_hosting' ),
	);
}

add_filter( 'manage_edit-orbis_hosting_group_columns' , 'orbis_hosting_group_edit_columns' );

/**
 * Company column
 * 
 * @param string $column
 */
function orbis_hosting_group_column( $column, $post_id ) {
	switch ( $column ) {
		case 'orbis_hosting_group_ip_address':
			echo get_post_meta( $post_id, '_orbis_hosting_group_ip_address', true );

			break;
		case 'orbis_hosting_group_hostname':
			echo get_post_meta( $post_id, '_orbis_hosting_group_hostname', true );

			break;
		case 'orbis_hosting_group_hostname_provider':
			echo get_post_meta( $post_id, '_orbis_hosting_group_hostname_provider', true );

			break;
	}
}

add_action( 'manage_posts_custom_column' , 'orbis_hosting_group_column', 10, 2 );

