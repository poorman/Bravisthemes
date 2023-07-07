<?php
/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets.
 *
 * @package Bravisthemes
 * @since Builderrin 1.0
 */
if( !defined('THEME_DEV_MODE_ELEMENTS') && is_user_logged_in()){
    define('THEME_DEV_MODE_ELEMENTS', true);
}
require_once get_template_directory() . '/inc/classes/class-main.php';

if ( is_admin() ){
	require_once get_template_directory() . '/inc/admin/admin-init.php';
}
/**
 * Theme Require
*/
builderrin()->require_folder('inc');
builderrin()->require_folder('inc/classes');
builderrin()->require_folder('inc/theme-options');
builderrin()->require_folder('template-parts/widgets');
if(class_exists('Woocommerce')){
    builderrin()->require_folder('woocommerce');
}

