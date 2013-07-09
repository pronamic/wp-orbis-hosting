<?php

$hosting_groups_query = p2p_type( 'orbis_hosting_groups_to_domain_names' )->set_direction( 'to' )->get_connected( get_the_ID() );

while ( $hosting_groups_query->have_posts() ) : $hosting_groups_query->the_post(); ?>

	<div class="panel">
		<header>
			<h3><?php _e( 'Hosting Group', 'orbis_hosting' ); ?></h3>
		</header>

		<div class="content">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</div>
	</div>
 
 <?php endwhile; ?>