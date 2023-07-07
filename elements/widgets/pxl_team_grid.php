<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_team_grid',
        'title' => esc_html__('Team Grid BR', 'builderrin'),
        'icon' => 'eicon-person',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid'
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_team_grid/img-layout/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => '1'
                    ],
                    'controls' => array(
                        array(
                            'name' => 'team',
                            'label' => esc_html__('Team', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Name', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'social',
                                    'label' => esc_html__( 'Social', 'builderrin' ),
                                    'type' => 'pxl_icons',
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
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Pxl Animate', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => builderrin_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'limit',
                            'label' => esc_html__('Total items', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => '6',
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
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'builderrin' ),
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
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
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
                        ),
                    ),
),
array(
    'name' => 'section_style',
    'label' => esc_html__('Style', 'builderrin' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'style',
            'label' => esc_html__('Hover Image Effect', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style-circle' => 'Circle',
                'style-overlay' => 'Overlay',
                'none' => 'None',
            ],
            'default' => 'style-circle',
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'builderrin' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-team-grid .pxl-item--title',
        ),
        array(
            'name' => 'pos_color',
            'label' => esc_html__('Position Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--position' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'pos_typography',
            'label' => esc_html__('Position Typography', 'builderrin' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-team-grid .pxl-item--position',
        ),
        array(
            'name' => 'box_color',
            'label' => esc_html__('Box Background Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-item--meta:before' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'box_min_width',
            'label' => esc_html__('Box Min Width', 'builderrin' ),
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
                '{{WRAPPER}} .pxl-team-grid .pxl-item--meta' => 'min-width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name'  => 'icon_size',
            'label' => esc_html__( 'Icon Size (px)', 'builderrin' ),
            'type'  => 'slider',
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--social a' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Icon Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--social a i' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'icon_color_hover',
            'label' => esc_html__('Icon Color Hover', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--social a:hover i' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'icon_background_color',
            'label' => esc_html__('Icon Background Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--social a' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'icon_background_color_hover',
            'label' => esc_html__('Icon Background Color Hover', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--social a span:before' => 'background-color: {{VALUE}};',
            ],
        ),
    ),
),
),
),
),
builderrin_get_class_widget_path()
);