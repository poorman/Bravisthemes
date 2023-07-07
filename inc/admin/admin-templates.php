<?php

if( !defined( 'ABSPATH' ) )
	exit;

class Builderrin_Admin_Templates extends Builderrin_Base{

	public function __construct() {
		$this->add_action( 'admin_menu', 'register_page', 20 );
	}

	public function register_page() {
		add_submenu_page(
			'pxlart',
		    esc_html__( 'Templates', 'builderrin' ),
		    esc_html__( 'Templates', 'builderrin' ),
		    'manage_options',
		    'edit.php?post_type=pxl-template',
		    false
		);
	}
}
new Builderrin_Admin_Templates;
