<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_menu_list',
        'title' => esc_html__('Menu Restaurant BR', 'builderrin'),
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_menu_list/img-layout/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'menu_list',
                            'label' => esc_html__('Menu List', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'excerpt',
                                    'label' => esc_html__('Excerpt', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'price',
                                    'label' => esc_html__('Price', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                        array(
                            'name' => 'active_section',
                            'label' => esc_html__('Active section', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_settings',
                    'label' => esc_html__('Grid', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
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
                    ),
                ),
                array(
                    'name' => 'tab_el_title',
                    'label' => esc_html__('Filter Style', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
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
                        array(
                            'name' => 'filter_typography',
                            'label' => esc_html__('Filter Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .grid-filter-wrap .filter-item',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Title Style', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner .wp-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-item--inner .wp-title',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_excerpt_style',
                    'label' => esc_html__('Excerpt Style', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'exerpt_color',
                            'label' => esc_html__('Excerpt Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner .pxl--excerpt' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'exerpt_typography',
                            'label' => esc_html__('Exerpt Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-item--inner .pxl--excerpt',
                        ),
                    ),
                )
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);