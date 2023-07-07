<?php
/**
* The Builderrin_Admin_Import class
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

class Builderrin_Admin_Import extends Builderrin_Admin_Page {

	public function __construct() {

		$this->id = 'pxlart-import-demos';
		$this->page_title = esc_html__( 'Import Demos', 'builderrin' );
		$this->menu_title = esc_html__( 'Import Demos', 'builderrin' );
		$this->parent = 'pxlart';
		//$this->position = '10';

		parent::__construct();
	}

	public function display() {
		include_once( get_template_directory() . '/inc/admin/views/admin-demos.php' );
	}


	public function save() {

	}
}
new Builderrin_Admin_Import;