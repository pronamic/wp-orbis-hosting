<?php

class Orbis_Hosting_Plugin extends Orbis_Plugin {
	public function __construct( $file ) {
		parent::__construct( $file );

		$this->plugin_include( 'includes/post.php' );
	}

	public function init() {
		$this->load_textdomain( 'orbis_hosting', '/langauges/' );
	}
}
