<?php
/**
 * Filters hook for the theme
 *
 * @package Bravisthemes
 */

add_filter( 'pxl_server_info', 'builderrin_add_server_info');
function builderrin_add_server_info($infos){
	$infos = [
		'api_url' => 'https://api.bravisthemes.com/',
		'docs_url' => 'https://doc.bravisthemes.com/builderrin/',
		'plugin_url' => 'https://api.bravisthemes.com/plugins/',
		'demo_url' => 'https://demo.bravisthemes.com/builderrin/',
		'support_url' => 'mailto:bravisthemes.com@gmail.com',
		'help_url' => 'https://doc.bravisthemes.com/',
		'email_support' => '',
		'video_url' => '#'
	];

	return $infos;
}

/* Custom Classs - Body */
function builderrin_body_classes( $classes ) {

	if (class_exists('ReduxFramework')) {
		$classes[] = ' pxl-redux-page';
	}

	$footer_fixed = builderrin()->get_theme_opt('footer_fixed');
	if(isset($footer_fixed) && $footer_fixed) {
		$classes[] = ' pxl-footer-fixed';
	}

	$smooth_scroll = builderrin()->get_theme_opt('smooth_scroll');
	if($smooth_scroll) {
		$classes[] = ' pxl-smooth-scroll';
	}

	$light_dark_switch = builderrin()->get_theme_opt('light_dark_switch');
	if($light_dark_switch == 'pxl-dark-mode') {
		$classes[] = ' dark-mode';
	}

	return $classes;
}
add_filter( 'body_class', 'builderrin_body_classes' );

/* Post Type Support Elementor*/
add_filter( 'pxl_add_cpt_support', 'builderrin_add_cpt_support' );
function builderrin_add_cpt_support($cpt_support) {
	$cpt_support[] = 'service';
	$cpt_support[] = 'pxl-slider';
	return $cpt_support;
}

add_filter( 'pxl_support_default_cpt', 'builderrin_support_default_cpt' );
function builderrin_support_default_cpt($postypes){
	return $postypes; // pxl-template
}

add_filter( 'pxl_extra_post_types', 'builderrin_add_posttype' );
function builderrin_add_posttype( $postypes ) {
	$postypes['portfolio'] = array(
		'status' => true,
		'item_name'  => 'Portfolio',
		'items_name' => 'Portfolio',
		'args'       => array(
			'rewrite'             => array(
				'slug'       => 'portfolio',
			),
		),
	);
	$postypes['service'] = array(
		'status' => true,
		'item_name'  => 'Service',
		'items_name' => 'Service',
		'args'       => array(
			'rewrite'             => array(
				'slug'       => 'service',
			),
			'publish_posts' => false,
		),
	);

	$postypes['pxl-slider'] = [
		'status'     => true,
		'item_name'  => esc_html__('Slider Builder', 'builderrin'),
		'items_name' => esc_html__('Slider Builder', 'builderrin'),
		'args'       => array(
			'supports'           => array(
				'title',
				'editor',
			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_in_nav_menus'   => false
		),
		'labels'     => array()
	];
	return $postypes;
}

add_filter( 'pxl_extra_taxonomies', 'builderrin_add_tax' );
function builderrin_add_tax( $taxonomies ) {
	$taxonomies['portfolio-category'] = array(
		'status'     => true,
		'post_type'  => array( 'portfolio' ),
		'taxonomy'   => 'Portfolio Categories',
		'taxonomies' => 'Portfolio Categories',
		'args'       => array(
			'rewrite'             => array(
				'slug'       => 'portfolio-category'
			),
		),
		'labels'     => array()
	);
	$taxonomies['portfolio-address'] = array(
		'status'     => true,
		'post_type'  => array( 'portfolio' ),
		'taxonomy'   => 'Portfolio Address',
		'taxonomies' => 'Portfolio Address',
		'args'       => array(
			'rewrite'             => array(
				'slug'       => 'portfolio-address'
			),
		),
		'labels'     => array()
	);
	$taxonomies['portfolio-tag'] = array(
		'status'     => true,
		'post_type'  => array( 'portfolio' ),
		'taxonomy'   => 'Portfolio Tags',
		'taxonomies' => 'Portfolio Tags',
		'args'       => array(
			'rewrite'             => array(
				'slug'       => 'portfolio-tag'
			),
		),
		'labels'     => array()
	);

	$taxonomies['service-category'] = array(
		'status'     => true,
		'post_type'  => array( 'service' ),
		'taxonomy'   => 'Service Categories',
		'taxonomies' => 'Service Categories',
		'args'       => array(
			'rewrite'             => array(
				'slug'       => 'service-category'
			),
		),
		'labels'     => array()
	);
	$taxonomies['service-tag'] = array(
		'status'     => true,
		'post_type'  => array( 'service' ),
		'taxonomy'   => 'Service Tags',
		'taxonomies' => 'Service Tags',
		'args'       => array(
			'rewrite'             => array(
				'slug'       => 'service-tag'
			),
		),
		'labels'     => array()
	);

	return $taxonomies;
}

add_action( 'pxl_taxonomy_meta_register', 'builderrin_taxonomy_service' );
function builderrin_taxonomy_service( $taxonomy ) {
	$service_category = array(
		'opt_name'     => 'service-category',
		'display_name' => esc_html__( 'Settings', 'builderrin' ),
	);

	if ( ! $taxonomy->isset_args( 'service-category' ) ) {
		$taxonomy->set_args( 'service-category', $service_category );
	}

	$taxonomy->add_section( 'service-category', array(
		'title'  => '',
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'service_icon',
				'type'     => 'pxl_iconpicker',
				'title'    => esc_html__( 'Icon', 'builderrin' ),
			),
			array(
				'id'      => 'fix_val',
				'type'    => 'select',
				'title'   => esc_html__('fix value', 'builderrin'),
				'options' => [
					'' => 'default',
					'fix' => 'fix',
				],
				'class' => 'redux-field-hidden',
				'default' => ''  
			),
		)
	));
}

add_filter( 'pxl_theme_builder_post_types', 'builderrin_theme_builder_post_type' );
function builderrin_theme_builder_post_type($postypes){
	//default are header, footer, mega-menu
	$postypes[] = 'pxl-slider';
	return $postypes;
}

add_filter( 'pxl_theme_builder_layout_ids', 'builderrin_theme_builder_layout_id' );
function builderrin_theme_builder_layout_id($layout_ids){
	//default [],
	$header_layout        = (int)builderrin()->get_opt('header_layout');
	$header_sticky_layout = (int)builderrin()->get_opt('header_sticky_layout');
	$footer_layout        = (int)builderrin()->get_opt('footer_layout');
	$ptitle_layout        = (int)builderrin()->get_opt('ptitle_layout');
	$shop_layout  		  = (int)builderrin()->get_opt('shop_layout');
	$shop_single_layout   = (int)builderrin()->get_opt('shop_single_layout');
	if( $header_layout > 0)
		$layout_ids[] = $header_layout;
	if( $header_sticky_layout > 0)
		$layout_ids[] = $header_sticky_layout;
	if( $footer_layout > 0)
		$layout_ids[] = $footer_layout;
	if( $ptitle_layout > 0)
		$layout_ids[] = $ptitle_layout;
	if( $shop_layout > 0)
		$layout_ids[] = $shop_layout;
	if( $shop_single_layout > 0)
		$layout_ids[] = $shop_single_layout;

	return $layout_ids;
}

add_filter( 'pxl_wg_get_source_id_builder', 'builderrin_wg_get_source_builder' );
function builderrin_wg_get_source_builder($wg_datas){
	$wg_datas['tabs'] = ['control_name' => 'tabs', 'source_name' => 'content_template'];
	return $wg_datas;
}

add_filter( 'pxl_template_type_support', 'builderrin_template_type_support' );
function builderrin_template_type_support($type){
	//default ['header','footer','mega-menu']
	$extra_type = [
		'page-title'   => esc_html__('Page Title', 'builderrin'),
		'hidden-panel' => esc_html__('Hidden Panel', 'builderrin'),
		'tab'          => esc_html__('Tab', 'builderrin'),
	];
	$template_type = array_merge($type,$extra_type);
	return $template_type;
}


add_filter( 'get_the_archive_title', 'builderrin_archive_title_remove_label' );
function builderrin_archive_title_remove_label( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}

// add_filter( 'comment_reply_link', 'builderrin_comment_reply_link' );
// function builderrin_comment_reply_link( $content ) {
// 	$extra_classes = 'pxl-btn-line';
// 	return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
// }

add_filter( 'pxl_enable_megamenu', 'builderrin_enable_megamenu' );
function builderrin_enable_megamenu() {
	return true;
}
add_filter( 'pxl_enable_onepage', 'builderrin_enable_onepage' );
function builderrin_enable_onepage() {
	return true;
}

add_filter( 'pxl_support_awesome_pro', 'builderrin_support_awesome_pro' );
function builderrin_support_awesome_pro() {
	return true;
}

add_filter( 'redux_pxl_iconpicker_field/get_icons', 'builderrin_add_icons_to_pxl_iconpicker_field' );
function builderrin_add_icons_to_pxl_iconpicker_field($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}


add_filter("pxl_mega_menu/get_icons", "builderrin_add_icons_to_megamenu");
function builderrin_add_icons_to_megamenu($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}


/**
 * Move comment field to bottom
 */
add_filter( 'comment_form_fields', 'builderrin_comment_field_to_bottom' );
function builderrin_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}


/* ------Disable Lazy loading---- */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

/**
 * User custom fields.
 */
add_action( 'show_user_profile', 'builderrin_user_fields' );
add_action( 'edit_user_profile', 'builderrin_user_fields' );
function builderrin_user_fields($user){

	$user_facebook = get_user_meta($user->ID, 'user_facebook', true);
	$user_whatsapp = get_user_meta($user->ID, 'user_whatsapp', true);
	$user_twitter = get_user_meta($user->ID, 'user_twitter', true);
	$user_linkedin = get_user_meta($user->ID, 'user_linkedin', true);
	$user_skype = get_user_meta($user->ID, 'user_skype', true);
	$user_youtube = get_user_meta($user->ID, 'user_youtube', true);
	$user_vimeo = get_user_meta($user->ID, 'user_vimeo', true);
	$user_tumblr = get_user_meta($user->ID, 'user_tumblr', true);
	$user_pinterest = get_user_meta($user->ID, 'user_pinterest', true);
	$user_instagram = get_user_meta($user->ID, 'user_instagram', true);
	$user_yelp = get_user_meta($user->ID, 'user_yelp', true);

	?>
	<h3><?php esc_html_e('Social', 'builderrin'); ?></h3>
	<table class="form-table">
		<tr>
			<th><label for="user_facebook"><?php esc_html_e('Facebook', 'builderrin'); ?></label></th>
			<td>
				<input id="user_facebook" name="user_facebook" type="text" value="<?php echo esc_attr(isset($user_facebook) ? $user_facebook : ''); ?>" />
			</td>
		</tr>
		<tr>
			<th><label for="user_twitter"><?php esc_html_e('Twitter', 'builderrin'); ?></label></th>
			<td>
				<input id="user_twitter" name="user_twitter" type="text" value="<?php echo esc_attr(isset($user_twitter) ? $user_twitter : ''); ?>" />
			</td>
		</tr>
		<tr>
			<th><label for="user_whatsapp"><?php esc_html_e('Whatsapp', 'builderrin'); ?></label></th>
			<td>
				<input id="user_whatsapp" name="user_whatsapp" type="text" value="<?php echo esc_attr(isset($user_whatsapp) ? $user_whatsapp : ''); ?>" />
			</td>
		</tr>
		<tr>
			<th><label for="user_linkedin"><?php esc_html_e('Linkedin', 'builderrin'); ?></label></th>
			<td>
				<input id="user_linkedin" name="user_linkedin" type="text" value="<?php echo esc_attr(isset($user_linkedin) ? $user_linkedin : ''); ?>" />
			</td>
		</tr>
		<tr>
			<th><label for="user_skype"><?php esc_html_e('Skype', 'builderrin'); ?></label></th>
			<td>
				<input id="user_skype" name="user_skype" type="text" value="<?php echo esc_attr(isset($user_skype) ? $user_skype : ''); ?>" />
			</td>
		</tr>
		<tr>
			<th><label for="user_youtube"><?php esc_html_e('Youtube', 'builderrin'); ?></label></th>
			<td>
				<input id="user_youtube" name="user_youtube" type="text" value="<?php echo esc_attr(isset($user_youtube) ? $user_youtube : ''); ?>" />
			</td>
		</tr>
		<tr>
			<th><label for="user_vimeo"><?php esc_html_e('Vimeo', 'builderrin'); ?></label></th>
			<td>
				<input id="user_vimeo" name="user_vimeo" type="text" value="<?php echo esc_attr(isset($user_vimeo) ? $user_vimeo : ''); ?>" />
			</td>
		</tr>
		<tr>
			<th><label for="user_tumblr"><?php esc_html_e('Tumblr', 'builderrin'); ?></label></th>
			<td>
				<input id="user_tumblr" name="user_tumblr" type="text" value="<?php echo esc_attr(isset($user_tumblr) ? $user_tumblr : ''); ?>" />
			</td>
		</tr>
		<tr>
			<th><label for="user_pinterest"><?php esc_html_e('Pinterest', 'builderrin'); ?></label></th>
			<td>
				<input id="user_pinterest" name="user_pinterest" type="text" value="<?php echo esc_attr(isset($user_pinterest) ? $user_pinterest : ''); ?>" />
			</td>
		</tr>
		<tr>
			<th><label for="user_instagram"><?php esc_html_e('Instagram', 'builderrin'); ?></label></th>
			<td>
				<input id="user_instagram" name="user_instagram" type="text" value="<?php echo esc_attr(isset($user_instagram) ? $user_instagram : ''); ?>" />
			</td>
		</tr>
		<tr>
			<th><label for="user_yelp"><?php esc_html_e('Yelp', 'builderrin'); ?></label></th>
			<td>
				<input id="user_yelp" name="user_yelp" type="text" value="<?php echo esc_attr(isset($user_yelp) ? $user_yelp : ''); ?>" />
			</td>
		</tr>
	</table>
	<?php
}
