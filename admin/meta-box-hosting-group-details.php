<?php

global $post;

$ip_address        = get_post_meta( $post->ID, '_orbis_hosting_group_ip_address', true );
$hostname          = get_post_meta( $post->ID, '_orbis_hosting_group_hostname', true );
$hostname_provider = get_post_meta( $post->ID, '_orbis_hosting_group_hostname_provider', true );

wp_nonce_field( 'orbis_save_hosting_group_details', 'orbis_hosting_group_details_meta_box_nonce' );

?>
<table class="form-table">
	<tbody>
		<tr>
			<th scope="row">
				<label for="orbis_hosting_group_ip_address"><?php _e( 'IP address', 'orbis_hosting' ); ?></label>
			</th>
			<td>
				<input id="orbis_hosting_group_ip_address" name="_orbis_hosting_group_ip_address" value="<?php echo esc_attr( $ip_address ); ?>" type="text" />
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="orbis_hosting_group_hostname"><?php _e( 'Hostname', 'orbis_hosting' ); ?></label>
			</th>
			<td>
				<input id="orbis_hosting_group_hostname" name="_orbis_hosting_group_hostname" value="<?php echo esc_attr( $hostname ); ?>" type="text" />
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="orbis_hosting_group_hostname_provider"><?php _e( 'Hostname Provider', 'orbis_hosting' ); ?></label>
			</th>
			<td>
				<input id="orbis_hosting_group_hostname_provider" name="_orbis_hosting_group_hostname_provider" value="<?php echo esc_attr( $hostname_provider ); ?>" type="text" />
			</td>
		</tr>
	</tbody>
</table>