<?php

add_action( 'pxl_post_metabox_register', 'builderrin_page_options_register' );
function builderrin_page_options_register( $metabox ) {

	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'builderrin' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Post Header', 'builderrin' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						builderrin_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'post_title' => [
					'title'  => esc_html__( 'Post Title', 'builderrin' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						builderrin_post_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'post_settings' => [
					'title'  => esc_html__( 'Post Settings', 'builderrin' ),
					'icon'   => 'el el-refresh',
					'fields' => array_merge(
						builderrin_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						array(
							array(
								'id'       => 'post_title_on',
								'title'    => esc_html__('Title', 'builderrin'),
								'subtitle' => esc_html__('Show Title on single post.', 'builderrin'),
								'type'     => 'switch',
								'default'  => true
							),
						),
						array(
							array(
								'id'       => 'post_feature_image_on',
								'title'    => esc_html__('Feature Image', 'builderrin'),
								'subtitle' => esc_html__('Show feature image on single post.', 'builderrin'),
								'type'     => 'switch',
								'default'  => true,
							),
						),
						array(
							array(
								'id'           => 'align_content_post',
								'type'         => 'button_set',
								'title'        => esc_html__( 'Align Content', 'builderrin' ),
								'options'      => array(
									'content-left'  => esc_html__(' Left (Default)', 'builderrin'),
									'content-center' => esc_html__('Center', 'builderrin'),
									'content-right'  => esc_html__('Right', 'builderrin')
								),
								'default'      => 'content-left',
								'force_output' => true
							),
						),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'builderrin' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						),
					)
				],
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Settings', 'builderrin' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'builderrin' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'disable_header',
								'title'    => esc_html__('Disable', 'builderrin'),
								'type'     => 'switch',
								'default'  => '0',
							),
						),
						builderrin_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'builderrin' ),
								'options'  => builderrin_get_nav_menu_slug(),
								'default' => '',
							),
						)
					)

				],
				'header_mobile' => [
					'title'  => esc_html__( 'Header Mobile', 'builderrin' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						builderrin_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'pm_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'builderrin' ),
								'options'  => builderrin_get_nav_menu_slug(),
								'default' => '-1',
							),
						)
					)
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'builderrin' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						builderrin_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'builderrin' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						builderrin_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'builderrin' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
							array(
								'id'           => 'loading_page',
								'type'         => 'button_set',
								'title'        => esc_html__( 'Loading', 'builderrin' ),
								'options'      => array(
									'-1'  => esc_html__( 'Inherit', 'builderrin' ),
									'bd' => esc_html__( 'Builder', 'builderrin' ),
								),
								'default'      => '-1',
							),
							array(
								'id'    => 'loader_style',
								'type'  => 'select',
								'title' => esc_html__('Loader Style', 'builderrin'),
								'options' => [
									'style-1'           => esc_html__('Style1', 'builderrin'),
									'style-2'          => esc_html__('style2', 'builderrin'),
								],
								'default' => 'style-1',
								'indent' => true,
								'required' => array( 0 => 'loading_page', 1 => 'equals', 2 => 'bd' ),
							),
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'builderrin' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'disable_footer',
								'title'    => esc_html__('Disable', 'builderrin'),
								'type'     => 'switch',
								'default'  => '0',
							),
						),
						builderrin_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'builderrin' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id'          => 'primary_color',
								'type'        => 'color',
								'title'       => esc_html__('Primary Color', 'builderrin'),
								'transparent' => false,
								'default'     => ''
							),
						)
					)
				]
			]
		],
		'portfolio' => [
			'opt_name'            => 'pxl_portfolio_options',
			'display_name'        => esc_html__( 'Portfolio Options', 'builderrin' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'portfolio_header' => [
					'title'  => esc_html__( 'General', 'builderrin' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						builderrin_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						builderrin_post_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'post_feature_portfolio_image_on',
								'title'    => esc_html__('Feature Image', 'builderrin'),
								'subtitle' => esc_html__('Show feature image on single post.', 'builderrin'),
								'type'     => 'switch',
								'default'  => true,
							),
						),
						array(
							array(
								'id'       => 'post_title_portfolio_on',
								'title'    => esc_html__('Title', 'builderrin'),
								'subtitle' => esc_html__('Show Title on portfolio post.', 'builderrin'),
								'type'     => 'switch',
								'default'  => true
							),
						),
						array(
							array(
								'id'=> 'portfolio_video_link',
								'type' => 'text',
								'title' => esc_html__('Video Link', 'builderrin'),
								'validate' => 'url',
								'default' => '',
							),
							array(
								'id'       => 'portfolio_icon_font',
								'type'     => 'pxl_iconpicker',
								'title'    => esc_html__('Icon Font', 'builderrin'),
							),								
						)
					)
				],
				'portfolio_content' => [
					'title'  => esc_html__( 'Content', 'builderrin' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						builderrin_sidebar_pos_opts(['prefix' => 'portfolio_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'builderrin' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
					)
				],
				'portfolio_footer' => [
					'title'  => esc_html__( 'Footer', 'builderrin' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						builderrin_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Settings', 'builderrin' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'builderrin' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'post_feature_service_image_on',
								'title'    => esc_html__('Feature Image', 'builderrin'),
								'subtitle' => esc_html__('Show feature image on single post.', 'builderrin'),
								'type'     => 'switch',
								'default'  => true,
							),
						),
						array(
							array(
								'id'       => 'post_title_service_on',
								'title'    => esc_html__('Title', 'builderrin'),
								'subtitle' => esc_html__('Show Title on Service Post.', 'builderrin'),
								'type'     => 'switch',
								'default'  => true
							),
						),
						array(
							array(
								'id'=> 'service_external_link',
								'type' => 'text',
								'title' => esc_html__('External Link', 'builderrin'),
								'validate' => 'url',
								'default' => '',
							),
							array(
								'id'=> 'service_excerpt',
								'type' => 'textarea',
								'title' => esc_html__('Excerpt', 'builderrin'),
								'validate' => 'html_custom',
								'default' => '',
							),
							array(
								'id'=> 'service_specification',
								'type' => 'multi_text',
								'title' => esc_html__('Content List', 'builderrin'),
								'validate' => 'html_custom',
								'default' => '',
							),
							array(
								'id'       => 'service_icon_type',
								'type'     => 'button_set',
								'title'    => esc_html__('Icon Type', 'builderrin'),
								'options'  => array(
									'icon'  => esc_html__('Icon', 'builderrin'),
									'image'  => esc_html__('Image', 'builderrin'),
								),
								'default'  => 'icon'
							),
							array(
								'id'       => 'service_icon_font',
								'type'     => 'pxl_iconpicker',
								'title'    => esc_html__('Icon', 'builderrin'),
								'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
								'force_output' => true
							),
							array(
								'id'       => 'service_icon_img',
								'type'     => 'media',
								'title'    => esc_html__('Icon Image', 'builderrin'),
								'default' => '',
								'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
								'force_output' => true
							),
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'builderrin' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
					)
				],
				'header_service' => [
					'title'  => esc_html__( 'Header', 'builderrin' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'disable_header',
								'title'    => esc_html__('Disable', 'builderrin'),
								'type'     => 'switch',
								'default'  => '0',
							),
						),
						builderrin_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'builderrin' ),
								'options'  => builderrin_get_nav_menu_slug(),
								'default' => '',
							),
						)
					)

				],
				'service_footer' => [
					'title'  => esc_html__( 'Footer', 'builderrin' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						builderrin_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'builderrin' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						builderrin_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
			]
		],
		'product' => [
			'opt_name'            => 'pxl_product_options',
			'display_name'        => esc_html__( 'Product Settings', 'builderrin' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'builderrin' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'=> 'unit_price',
								'type' => 'text',
								'title' => esc_html__('Unit Price', 'builderrin'),
								'subtitle' => esc_html__('Product price by weight.', 'builderrin'),
								'validate' => 'html_custom',
								'default' => '',
							),
							array(
								'id'=> 'additional_information',
								'type' => 'text',
								'title' => esc_html__('Additional information', 'builderrin'),
								'subtitle' => esc_html__('Product price by weight.', 'builderrin'),
								'validate' => 'html_custom',
								'default' => '',
							),
							array(
								'id'       => 'badge_new',
								'title'    => esc_html__('Show New Badge', 'builderrin'),
								'subtitle' => esc_html__('Show a new badge for item.', 'builderrin'),
								'type'     => 'switch',
								'default'  => '0',
							),
							array(
								'id'    => 'product_page_style',
								'type'  => 'select',
								'title' => esc_html__('Product Page Style', 'builderrin'),
								'options' => [
									'style1'       	   => esc_html__('Style 1', 'builderrin'),
									'style2'       	   => esc_html__('Style 2', 'builderrin'),
								],
								'default' => 'style1',
							),
						)
					)
				],
				'product_info' => [
					'title'  => esc_html__( 'Product Info', 'builderrin' ),
					'icon'   => 'el el-shopping-cart',
					'fields' => array_merge(
						array(
							array(
								'id'=> 'product_tab_title',
								'type' => 'text',
								'title' => esc_html__('Tab Title', 'builderrin'),
								'placeholder' => esc_html__('Product Details', 'builderrin' ),
								'validate' => 'html_custom',
								'default' => '',
							),
							array(
								'id'       => 'feature_tab_on',
								'title'    => esc_html__('Show Additional Information Tab', 'builderrin'),
								'subtitle' => esc_html__('Show a additional information tab on the product page.', 'builderrin'),
								'type'     => 'switch',
								'default'  => '0',
							),
							array(
								'id'=> 'product_specification_title',
								'type' => 'text',
								'title' => esc_html__('Additional Tab Title', 'builderrin'),
								'placeholder' => esc_html__('Vendor Info', 'builderrin' ),
								'validate' => 'html_custom',
								'default' => '',
								'required' => array( 0 => 'feature_tab_on', 1 => 'equals', 2 => '1' ),
							),
							array(
								'id'=> 'product_specification_content',
								'type' => 'textarea',
								'title' => esc_html__('Tab Content', 'builderrin'),
								'validate' => 'html_custom',
								'default' => '',
								'required' => array( 0 => 'feature_tab_on', 1 => 'equals', 2 => '1' ),
							),
							array(
								'id'=> 'product_specification',
								'type' => 'multi_text',
								'title' => esc_html__('Tab Content List', 'builderrin'),
								'validate' => 'html_custom',
								'default' => '',
								'required' => array( 0 => 'feature_tab_on', 1 => 'equals', 2 => '1' ),
							),
							array(
								'id'=> 'product_info_1',
								'type' => 'text',
								'title' => esc_html__('Product Info Delivery 1', 'builderrin'),
								'validate' => 'html_custom',
								'default' => '',
							),
							array(
								'id'=> 'product_info_2',
								'type' => 'text',
								'title' => esc_html__('Product Info Delivery 2', 'builderrin'),
								'validate' => 'html_custom',
								'default' => '',
							),
							array(
								'id'=> 'product_info_3',
								'type' => 'text',
								'title' => esc_html__('Product Info Delivery 3', 'builderrin'),
								'validate' => 'html_custom',
								'default' => '',
							),
							array(
								'id'=> 'product_info_4',
								'type' => 'text',
								'title' => esc_html__('Product Info Delivery 4', 'builderrin'),
								'validate' => 'html_custom',
								'default' => '',
							),
						)
					)
				],
				'header_product' => [
					'title'  => esc_html__( 'Header', 'builderrin' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'disable_header',
								'title'    => esc_html__('Disable', 'builderrin'),
								'type'     => 'switch',
								'default'  => '0',
							),
						),
						builderrin_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'builderrin' ),
								'options'  => builderrin_get_nav_menu_slug(),
								'default' => '',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'builderrin' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						builderrin_page_title_shop_opts([
							'default'         => true,
							'default_value'   => 'df'
						])
					)
				],
			]
		],
		'pxl-template' => [ //post_type
		'opt_name'            => 'pxl_hidden_template_options',
		'display_name'        => esc_html__( 'Template Settings', 'builderrin' ),
		'show_options_object' => false,
		'context'  => 'advanced',
		'priority' => 'default',
		'sections'  => [
			'header' => [
				'title'  => esc_html__( 'General', 'builderrin' ),
				'icon'   => 'el-icon-website',
				'fields' => array(
					array(
						'id'    => 'template_type',
						'type'  => 'select',
						'title' => esc_html__('Type', 'builderrin'),
						'options' => [
							'df'       	   => esc_html__('Select Type', 'builderrin'),
							'header'       => esc_html__('Header', 'builderrin'),
							'footer'       => esc_html__('Footer', 'builderrin'),
							'mega-menu'    => esc_html__('Mega Menu', 'builderrin'),
							'page-title'   => esc_html__('Page Title', 'builderrin'),
							'tab' => esc_html__('Tab', 'builderrin'),
							'hidden-panel' => esc_html__('Hidden Panel', 'builderrin'),
							'wgaboutauthor' => esc_html__('Widget Sidebar', 'builderrin'),
							'shop' => esc_html__('Shop', 'builderrin'),
							'slider' => esc_html__('Slider', 'builderrin'),
						],
						'default' => 'df',
					),
					array(
						'id'    => 'header_type',
						'type'  => 'button_set',
						'title' => esc_html__('Header Type', 'builderrin'),
						'options' => [
							'px-header--default'       	   => esc_html__('Default', 'builderrin'),
							'px-header--transparent'       => esc_html__('Transparent', 'builderrin'),
						],
						'default' => 'px-header--default',
						'indent' => true,
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
					),
					array(
						'id'       => 'template_position',
						'type'     => 'select',
						'title'    => esc_html__('Display Position', 'builderrin'),
						'options'  => [
							'left'   => esc_html__('Left Position', 'builderrin'),
							'top'    => esc_html__('Top Position', 'builderrin'),
							'center' => esc_html__('Center Position (popup)', 'builderrin'),
							'right'  => esc_html__('Right Position', 'builderrin'),
							'full'   => esc_html__('Full Screen', 'builderrin'),
						],
						'default'  => 'left',
						'required' => [ 'template_type', '=', 'hidden-panel']
					),
				),

			],
		]
	],
];

$metabox->add_meta_data( $panels );
}
