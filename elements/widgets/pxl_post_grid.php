<?php
$pt_supports = ['post','portfolio','service'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_grid',
        'title' => esc_html__('Post Grid BR', 'builderrin' ),
        'icon' => 'eicon-posts-grid',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'tab_layout',
                    'label'    => esc_html__( 'Layout', 'builderrin' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'builderrin' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => builderrin_get_post_type_options($pt_supports),
                                'default'  => 'post'
                            )
                        ),
                        builderrin_get_post_grid_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'tab_source',
                    'label' => esc_html__('Source', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'select_post_by',
                                'label'    => esc_html__( 'Select posts by', 'builderrin' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => [
                                    'term_selected' => esc_html__( 'Terms selected', 'builderrin' ),
                                    'post_selected' => esc_html__( 'Posts selected ', 'builderrin' ),
                                ],
                                'default'  => 'term_selected'
                            )
                        ),
                        builderrin_get_grid_term_by_posttype($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        builderrin_get_grid_ids_by_posttype($pt_supports, ['custom_condition' => ['select_post_by' => 'post_selected']]),
                        array(
                            array(
                                'name' => 'orderby',
                                'label' => esc_html__('Order By', 'builderrin' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date' => esc_html__('Date', 'builderrin' ),
                                    'ID' => esc_html__('ID', 'builderrin' ),
                                    'author' => esc_html__('Author', 'builderrin' ),
                                    'title' => esc_html__('Title', 'builderrin' ),
                                    'rand' => esc_html__('Random', 'builderrin' ),
                                ],
                            ),
                            array(
                                'name' => 'order',
                                'label' => esc_html__('Sort Order', 'builderrin' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__('Descending', 'builderrin' ),
                                    'asc' => esc_html__('Ascending', 'builderrin' ),
                                ],
                            ),
                            array(
                                'name' => 'limit',
                                'label' => esc_html__('Total items', 'builderrin' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'tab_grid',
                    'label' => esc_html__('Grid', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Case Animate', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => builderrin_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'filter',
                            'label' => esc_html__('Filter on Masonry', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true' => esc_html__('Enable', 'builderrin' ),
                                'false' => esc_html__('Disable', 'builderrin' ),
                            ],
                            'condition' => [
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                            'name' => 'filter_default_title',
                            'label' => esc_html__('Filter Default Title', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Show All', 'builderrin' ),
                            'condition' => [
                                'filter' => 'true',
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                          'name' => 'filter_alignment',
                          'label' => esc_html__( 'Filter Alignment', 'builderrin' ),
                          'type' => \Elementor\Controls_Manager::CHOOSE,
                          'control_type' => 'responsive',
                          'options' => [
                            'left' => [
                                'title' => esc_html__( 'Left', 'builderrin' ),
                                'icon' => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__( 'Center', 'builderrin' ),
                                'icon' => 'eicon-text-align-center',
                            ],
                            'right' => [
                                'title' => esc_html__( 'Right', 'builderrin' ),
                                'icon' => 'eicon-text-align-right',
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-grid .pxl-grid-filter' => 'justify-content: {{VALUE}};',
                        ],
                        'condition' => [
                            'filter' => 'true',
                            'select_post_by' => 'term_selected',
                        ],
                    ),
                        array(
                            'name' => 'filter_margin1',
                            'label' => esc_html__('Filter Margin (px)', 'builderrin' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-grid-filter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'filter' => 'true',
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                            'name' => 'filter_margin',
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
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                            'name' => 'max_height',
                            'label' => esc_html__('Image Height', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'builderrin' ),
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-grid-inner .pxl-item--inner' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                            'condition' => [
                                'post_type' => ['portfolio'],
                            ],
                        ),
                        array(
                            'name' => 'show_cursor_text',
                            'label' => esc_html__('Show Cursor Text', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'filter', 'operator' => '==', 'value' => 'true'],
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'cursor_text',
                            'label' => esc_html__('Cursor Text', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( '◄ ►', 'builderrin' ),
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'filter', 'operator' => '==', 'value' => 'true'],
                                            ['name' => 'show_cursor_text', 'operator' => '==', 'value' => 'true'],
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'pagination' => esc_html__('Pagination', 'builderrin' ),
                                'loadmore' => esc_html__('Loadmore', 'builderrin' ),
                                'false' => esc_html__('Disable', 'builderrin' ),
                            ],
                        ),
                        array(
                            'name' => 'pagination_style',
                            'label' => esc_html__('Pagination Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-pagination-style1',
                            'options' => [
                                'pxl-pagination-style1' => 'Style 1',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'pagination_type', 'operator' => '==', 'value' => 'pagination'],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'loadmore_style',
                            'label' => esc_html__('Loadmore Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-loadmore-style1',
                            'options' => [
                                'pxl-loadmore-style1' => 'Style 1',
                                'pxl-loadmore-style2' => 'Style 2',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'pagination_type', 'operator' => '==', 'value' => 'loadmore'],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'loadmore_text',
                            'label' => esc_html__('Loadmore Text', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Read More', 'builderrin' ),
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'pagination_type', 'operator' => '==', 'value' => 'loadmore'],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'color: {{VALUE}};',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'pagination_type', 'operator' => '==', 'value' => 'loadmore'],
                                        ]
                                    ],
                                ],
                            ]
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
                                        '5' => '5',
                                        '6' => '6',
                                        '7' => '7',
                                        '8' => '8',
                                        '12' => '12',
                                    ],
                                ),
                                array(
                                    'name' => 'col_sm_m',
                                    'label' => esc_html__('Columns SM Devices', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '2',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '5' => '5',
                                        '6' => '6',
                                        '7' => '7',
                                        '8' => '8',
                                        '12' => '12',
                                    ],
                                ),
                                array(
                                    'name' => 'col_md_m',
                                    'label' => esc_html__('Columns MD Devices', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '5' => '5',
                                        '6' => '6',
                                        '7' => '7',
                                        '8' => '8',
                                        '12' => '12',
                                    ],
                                ),
                                array(
                                    'name' => 'col_lg_m',
                                    'label' => esc_html__('Columns LG Devices', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '4',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '5' => '5',
                                        '6' => '6',
                                        '7' => '7',
                                        '8' => '8',
                                        '12' => '12',
                                    ],
                                ),
                                array(
                                    'name' => 'col_xl_m',
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
                                        '7' => '7',
                                        '8' => '8',
                                        '12' => '12',
                                    ],
                                ),
                                array(
                                    'name' => 'img_size_m',
                                    'label' => esc_html__( 'Image Size', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).', 'builderrin' ),
                                ),
                            ),
),
),
),
array(
    'name' => 'tab_display',
    'label' => esc_html__('Display', 'builderrin' ),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array(
        array(
            'name' => 'show_author',
            'label' => esc_html__('Show Author', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'style', 'operator' => '==', 'value' => 'style2'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_date',
            'label' => esc_html__('Show Date', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_excerpt',
            'label' => esc_html__('Show Excerpt', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'num_words',
            'label' => esc_html__('Number of Words', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 25,
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2']],
                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'text_line',
            'label' => esc_html__('Text Excerpt Line', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'separator' => 'after',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2']],
                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_button',
            'label' => esc_html__('Show Button Readmore', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'button_text',
            'label' => esc_html__('Button Text', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => esc_html__('Read More', 'builderrin' ),
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2']],
                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['service-1','service-2']],
                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                        ]
                    ]
                ],
            ]
        ),
    ),
),
array(
    'name' => 'tab_style_general',
    'label' => esc_html__('General', 'builderrin' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
          'name' => 'post_box_align',
          'label' => esc_html__( 'Box Alignment', 'builderrin' ),
          'type' => \Elementor\Controls_Manager::CHOOSE,
          'control_type' => 'responsive',
          'default' => 'left',
          'options' => [
            'left' => [
                'title' => esc_html__( 'Left', 'builderrin' ),
                'icon' => 'eicon-text-align-left',
            ],
            'center' => [
                'title' => esc_html__( 'Center', 'builderrin' ),
                'icon' => 'eicon-text-align-center',
            ],
            'right' => [
                'title' => esc_html__( 'Right', 'builderrin' ),
                'icon' => 'eicon-text-align-right',
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .pxl-blog-grid .pxl-item--inner ' => 'text-align: {{VALUE}};',
        ],
        'condition' => [
            'post_type' => ['post'],
            'layout_post' => ['post-1'],
        ],
    ),
        array(
            'name' => 'style',
            'label' => esc_html__('Style', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style1' => 'Style 1',
                'style2' => 'Style 2',
            ],
            'default' => 'style1',
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
            ],
        ),
    ),
),
array(
    'name' => 'tab_style_title',
    'label' => esc_html__('Content', 'builderrin' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'img_margin',
            'label' => esc_html__('Image Margin (px)', 'builderrin' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .item--featured' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
            ],
        ),
        array(
            'name' => 'list_bottom_spacer',
            'label' => esc_html__('List Bottom Spacer (Px)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--inner .pxl-item--meta-date' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
            ],
        ),
        array(
            'name' => 'post_title_color',
            'label' => esc_html__('Title Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--inner .item--title a' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
            ],
        ),
        array(
            'name' => 'post_title_color_hover',
            'label' => esc_html__('Hover Title Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--inner .item--title a:hover' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
            ],
        ),
        array(
            'name' => 'darkmode_post_title_color',
            'label' => esc_html__('Title Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.darkmode {{WRAPPER}} .pxl-grid .pxl-item--inner .item--title a' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
            ],
        ),
        array(
            'name' => 'darkmode_post_title_color_hover',
            'label' => esc_html__('Hover Title Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.darkmode {{WRAPPER}} .pxl-grid .pxl-item--inner .item--title a:hover' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
            ],
        ),
        array(
            'name' => 'post_title_typography',
            'label' => esc_html__('Title Typography', 'builderrin' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-grid .pxl-item--inner .item--title',
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
            ],
        ),
        array(
            'name' => 'post_title_max_width',
            'label' => esc_html__( 'Title Max Width', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%' ],
            'default' => [
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--inner .item--title' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'post_title_bottom_spacer',
            'label' => esc_html__('Title Bottom Spacer (px)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--inner .item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
            ],
        ),
        array(
            'name' => 'post_excerpt_color',
            'label' => esc_html__('Excerpt Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--inner .item--excerpt' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
            ],
        ),
        array(
            'name' => 'darkmode_post_excerpt_color',
            'label' => esc_html__('Excerpt Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.darkmode {{WRAPPER}} .pxl-grid .pxl-item--inner .item--excerpt' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
            ],
        ),
        array(
            'name' => 'post_excerpt_typography',
            'label' => esc_html__('Excerpt Typography', 'builderrin' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-grid .pxl-item--inner .item--excerpt',
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
            ],
        ),
        array(
            'name' => 'post_excerpt_bottom_spacer',
            'label' => esc_html__('Excerpt Bottom Spacer (px)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--inner .item--excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
            ],
        ),
        array(
            'name' => 'bg_overlay_color',
            'label' => esc_html__('Background Overlay Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--inner .item--featured:after' => 'background: linear-gradient(to bottom, transparent 0%, {{VALUE}} 150%);',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
                'style' => ['style2'],
            ],
        ),
        array(
            'name' => 'bg_overlay_height',
            'label' => esc_html__('Background Overlay Height', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%' ],
            'default' => [
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--inner .item--featured:after' => 'height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
                'style' => ['style2'],
            ],
        ),
    ),
),
),
),
),
builderrin_get_class_widget_path()
);