<?php

$hosting_groups_query = p2p_type( 'orbis_hosting_groups_to_domain_names' )->set_direction( 'to' )->get_connected( get_the_ID() );

while ( $hosting_groups_query->have_posts() ) : $hosting_groups_query->the_post(); ?>

	<div class="card">
		<div class="card-body">
			<h3 class="card-title"><?php esc_html_e( 'Hosting Group', 'orbis_hosting' ); ?></h3>

			<div class="content">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</div>
		</div>
		
	</div>
 
	<?php endwhile; ?>
