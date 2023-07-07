<?php
$pt_supports = ['post'];
use Elementor\Controls_Manager;
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_product_grid',
        'title'      => esc_html__('Product Grid BR', 'builderrin' ),
        'icon'       => 'eicon-posts-grid',
        'categories' => array('pxltheme-core'),
        'scripts'    => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'builderrin' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'builderrin' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_product_grid/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_product_grid/img-layout/layout2.jpg'
                                ],
                            ],
                            'prefix_class' => 'pxl-product-grid-layout-'
                        )
                    )
                ),

                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'query_type',
                            'label'   => esc_html__( 'Select Query Type', 'builderrin' ),
                            'type'    => 'select',
                            'default' => 'recent_product',
                            'options' => [
                                'recent_product'   => esc_html__( 'Recent Products', 'builderrin' ),
                                'best_selling'     => esc_html__( 'Best Selling', 'builderrin' ),
                                'featured_product' => esc_html__( 'Featured Products', 'builderrin' ),
                                'top_rate'         => esc_html__( 'High Rate', 'builderrin' ),
                                'on_sale'          => esc_html__( 'On Sale', 'builderrin' ),
                                'recent_review'    => esc_html__( 'Recent Review', 'builderrin' ),
                                'deals'            => esc_html__( 'Product Deals', 'builderrin' ),
                                'separate'         => esc_html__( 'Product separate', 'builderrin' ),
                            ]
                        ),
                        array(
                            'name'     => 'taxonomies',
                            'label'    => esc_html__( 'Select Term of Product', 'builderrin' ),
                            'type'     => 'select2',
                            'multiple' => true,
                            'options'  => pxl_get_product_grid_term_options()
                        ),
                        array(
                            'name'     => 'product_ids',
                            'label'    => esc_html__( 'Products id (123,124,135...)', 'builderrin' ),
                            'type'     => 'text',
                            'default'  => '',
                            'condition' => array( 'query_type' => 'separate' )
                        ),
                        array(
                            'name'     => 'post_per_page',
                            'label'    => esc_html__( 'Post per page', 'builderrin' ),
                            'type'     => 'text',
                            'default'  => '12'
                        )
                    ),
                ),
                array(
                    'name' => 'general_section',
                    'label' => esc_html__('General Settings', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'img_size',
                                'label' => esc_html__('Image Size', 'builderrin' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                            ),
                            array(
                                'name'    => 'layout_mode',
                                'label'   => esc_html__( 'Layout Mode', 'builderrin' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'fitRows' => esc_html__( 'Basic Grid', 'builderrin' ),
                                    'masonry' => esc_html__( 'Masonry Grid', 'builderrin' ),
                                ],
                                'default'   => 'fitRows'
                            ),
                            array(
                                'name'    => 'filter',
                                'label'   => esc_html__('Term Filter', 'builderrin' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'false',
                                'options' => [
                                    'true'  => esc_html__('Enable', 'builderrin' ),
                                    'false' => esc_html__('Disable', 'builderrin' ),
                                ],
                            ),
                            array(
                                'name'      => 'filter_default_title',
                                'label'     => esc_html__('Filter Default Title', 'builderrin' ),
                                'type'      => \Elementor\Controls_Manager::TEXT,
                                'default'   => esc_html__('All', 'builderrin' ),
                                'condition' => [
                                    'filter' => 'true',
                                ],
                            ),
                            array(
                                'name' => 'filter_margin',
                                'label' => esc_html__('Filter Margin (px)', 'builderrin' ),
                                'type' => 'dimensions',
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-product-grid .grid-filter-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'condition' => [
                                    'filter' => 'true',
                                ],
                            ),
                            array(
                                'name' => 'filter_item_margin',
                                'label' => esc_html__('Filter Item Margin', 'builderrin' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%' ],
                                'default' => [
                                    'unit' => '%',
                                ],
                                'range' => [
                                    '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-grid .pxl-grid-filter .filter-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                                'condition' => [
                                    'filter' => 'true',
                                ],
                            ),
                            array(
                                'name' => 'show_cursor_text',
                                'label' => esc_html__('Show Cursor Text', 'builderrin'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'false',
                                'condition' => [
                                    'filter' => 'true',
                                ],
                            ),
                            array(
                                'name' => 'cursor_text',
                                'label' => esc_html__('Cursor Text', 'builderrin' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'placeholder' => esc_html__( '◄ ►', 'builderrin' ),
                                'condition' => [
                                    'filter' => 'true',
                                    'show_cursor_text' => 'true',
                                ],
                            ),
                            array(
                                'name'    => 'pagination_type',
                                'label'   => esc_html__('Pagination Type', 'builderrin' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'false',
                                'options' => [
                                    'pagination' => esc_html__('Pagination', 'builderrin' ),
                                    'loadmore'   => esc_html__('Loadmore', 'builderrin' ),
                                    'false'      => esc_html__('Disable', 'builderrin' ),
                                ],
                            ),
                            array(
                                'name'      => 'loadmore_text',
                                'label'     => esc_html__( 'Load More text', 'builderrin' ),
                                'type'      => \Elementor\Controls_Manager::TEXT,
                                'default'   => esc_html__('Load More','builderrin'),
                                'condition' => [
                                    'pagination_type' => 'loadmore'
                                ]
                            ),
                            array(
                                'name'         => 'pagination_alignment',
                                'label'        => esc_html__( 'Pagination Alignment', 'builderrin' ),
                                'type'         => 'choose',
                                'control_type' => 'responsive',
                                'options' => [
                                    'start' => [
                                        'title' => esc_html__( 'Start', 'builderrin' ),
                                        'icon'  => 'eicon-text-align-left',
                                    ],
                                    'center' => [
                                        'title' => esc_html__( 'Center', 'builderrin' ),
                                        'icon'  => 'eicon-text-align-center',
                                    ],
                                    'end' => [
                                        'title' => esc_html__( 'End', 'builderrin' ),
                                        'icon'  => 'eicon-text-align-right',
                                    ]
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-grid-pagination, {{WRAPPER}} .pxl-load-more' => 'justify-content: {{VALUE}};'
                                ],
                                'condition' => [
                                    'pagination_type!' => 'false'
                                ],
                            ),
                            array(
                                'name' => 'item_padding',
                                'label' => esc_html__('Item Padding', 'builderrin' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'default' => [
                                    'top' => '20',
                                    'right' => '20',
                                    'bottom' => '20',
                                    'left' => '20'
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-grid-inner' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-grid-inner .pxl-grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name'         => 'gap_extra',
                                'label'        => esc_html__( 'Item Gap Bottom', 'builderrin' ),
                                'description'  => esc_html__( 'Add extra space at bottom of each items','builderrin'),
                                'type'         => \Elementor\Controls_Manager::NUMBER,
                                'default'      => 0,
                                'control_type' => 'responsive',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-grid-inner .pxl-grid-item' => 'margin-bottom: {{VALUE}}px;',
                                ],
                            )
                        ),
                        builderrin_elementor_animation_opts([
                            'name'   => 'item',
                            'label' => esc_html__('Item', 'builderrin'),
                        ])
                    )
                ),
                array(
                    'name' => 'grid_section',
                    'label' => esc_html__('Grid Settings', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        builderrin_grid_column_settings()
                    ),
                ),
                array(
                    'name' => 'style_section',
                    'label' => esc_html__('Style', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'img_padding',
                            'label' => esc_html__('Image Padding', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-grid .woocommerce-product-inner .woocommerce-product-header .woocommerce-product-details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-grid .woocommerce-product-content .woocommerce-product--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_title_color',
                            'label' => esc_html__( 'Title Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-product-grid .woocommerce-product-content .woocommerce-product--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'hover_title_color',
                            'label' => esc_html__( 'Hover Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-grid .woocommerce-product-content .woocommerce-product--title a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_hover_title_color',
                            'label' => esc_html__( 'Hover Title Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-product-grid .woocommerce-product-content .woocommerce-product--title a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-product-grid .woocommerce-product-content .woocommerce-product--title',
                        ),
                        array(
                            'name' => 'title_margin',
                            'label' => esc_html__('Title Margin', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-grid .woocommerce-product-content .woocommerce-product--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-grid .woocommerce-product-inner:before' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color',
                            'label' => esc_html__('Border Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-product-grid .woocommerce-product-inner:before' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-grid .woocommerce-product-inner' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_bg_color',
                            'label' => esc_html__('Background Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-product-grid .woocommerce-product-inner' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                builderrin_widget_animation_settings()
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);