<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_gallery_grid',
        'title' => esc_html__('Case Study Grid BR', 'builderrin'),
        'icon' => 'eicon-gallery-grid',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'builderrin' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_gallery_grid/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_gallery_grid/img-layout/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_gallery_grid/img-layout/layout3.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'title_section',
                    'label' => esc_html__('El Title', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => '1',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'title_text',
                            'label' => esc_html__('El Title', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Enter your El title', 'builderrin' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('El Sub Title', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'gallery',
                            'label' => esc_html__('Portfolio', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'condition' => [
                                'layout' => '1',
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'sub_title',
                                    'label' => esc_html__('Sub Title', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'category',
                                    'label' => esc_html__('Category', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'description' => esc_html__( 'Category 1, Category 2 ...', 'builderrin' ),
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                        array(
                            'name' => 'gallery_showcase',
                            'label' => esc_html__('Gallery Showcase', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'condition' => [
                                'layout' => '2',
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image Feature', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'text_button',
                                    'label' => esc_html__('Text Button', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'category',
                                    'label' => esc_html__('Category', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'description' => esc_html__( 'Category 1, Category 2 ...', 'builderrin' ),
                                ),
                                array(
                                    'name' => 'active',
                                    'label' => esc_html__('Coming Soon', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'item-nomarl' => 'No',
                                        'is-active' => 'Yes',
                                    ],
                                    'default' => 'item-nomarl',
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                        array(
                            'name' => 'gallery_classes',
                            'label' => esc_html__('Classes', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'condition' => [
                                'layout' => '3',
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'sub_title',
                                    'label' => esc_html__('Sub Title', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'excerpt',
                                    'label' => esc_html__('Excerpt', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'category',
                                    'label' => esc_html__('Category', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'description' => esc_html__( 'Category 1, Category 2 ...', 'builderrin' ),
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_settings',
                    'label' => esc_html__('Grid', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'layout_mode',
                            'label' => esc_html__('Layout Mode', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'fitRows',
                            'options' => [
                                'fitRows' => esc_html__('Fit Rows(Default)', 'builderrin' ),
                                'masonry' => esc_html__('Masonry', 'builderrin' ),
                            ],
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '4',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '4',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).', 'builderrin' ),
                        ),
                        array(
                            'name' => 'grid_masonry',
                            'label' => esc_html__('Grid Masonry', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'col_xs_m',
                                    'label' => esc_html__('Columns XS Devices', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '1',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_sm_m',
                                    'label' => esc_html__('Columns SM Devices', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '2',
                                    'options' => [
                                        '1' => '1',
                                        '1.5' => '2/3',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_md_m',
                                    'label' => esc_html__('Columns MD Devices', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '1.5' => '2/3',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_lg_m',
                                    'label' => esc_html__('Columns LG Devices', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '4',
                                    'options' => [
                                        '1' => '1',
                                        '1.5' => '2/3',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_xl_m',
                                    'label' => esc_html__('Columns XL Devices', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '4',
                                    'options' => [
                                        '1' => '1',
                                        '1.5' => '2/3',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'img_size_m',
                                    'label' => esc_html__('Image Size', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).', 'builderrin' ),
                                ),
                            ),
                            'condition' => [
                                'layout_mode' => 'masonry',
                            ],
                        ),
                        array(
                            'name' => 'item_padding',
                            'label' => esc_html__('Item Padding', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'top' => '15',
                                'right' => '15',
                                'bottom' => '15',
                                'left' => '15'
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
                        ),
                        
                        array(
                            'name' => 'filter',
                            'label' => esc_html__('Filter by categories', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true' => esc_html__('Enable', 'builderrin' ),
                                'false' => esc_html__('Disable', 'builderrin' ),
                            ],
                        ),
                        array(
                            'name' => 'filter_default_title',
                            'label' => esc_html__('Default Title', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('All', 'builderrin' ),
                            'condition' => [
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'filter_alignment',
                            'label' => esc_html__('Alignment', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'center',
                            'options' => [
                                'center' => esc_html__('Center', 'builderrin' ),
                                'left' => esc_html__('Left', 'builderrin' ),
                                'right' => esc_html__('Right', 'builderrin' ),
                            ],
                            'condition' => [
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Pxl Animate', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => builderrin_widget_animate(),
                            'default' => '',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_el_title',
                    'label' => esc_html__('El Style', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'el_title_color',
                            'label' => esc_html__('Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-gallery .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'el_title_typography',
                            'label' => esc_html__('Title Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-gallery .pxl-item--title',
                        ),
                        array(
                            'name' => 'el_sub_title_color',
                            'label' => esc_html__('Sub Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-gallery .pxl-gallery--category' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'category_el_sub_title',
                            'label' => esc_html__('Sub Title Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-gallery .pxl-item--category',
                        ),
                        array(
                            'name' => 'filter_color',
                            'label' => esc_html__('Filter Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .grid-filter-wrap .filter-item' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'filter_active_color',
                            'label' => esc_html__('Filter Active Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .grid-filter-wrap .filter-item.active' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-item--title',
                        ),
                        array(
                            'name' => 'pos_color',
                            'label' => esc_html__('Sub Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--subtitle' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '3'],
                            ],
                        ),
                        array(
                            'name' => 'pos_typography',
                            'label' => esc_html__('Sub Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-item--subtitle',
                            'condition' => [
                                'layout' => ['1', '3'],
                            ],
                        ),
                        array(
                            'name' => 'excerpt_color',
                            'label' => esc_html__('Excerpt Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--subtitle' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => '3',
                            ],
                        ),
                        array(
                            'name' => 'excerpt_typography',
                            'label' => esc_html__('Excerpt Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-item--subtitle',
                            'condition' => [
                                'layout' => '3',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);