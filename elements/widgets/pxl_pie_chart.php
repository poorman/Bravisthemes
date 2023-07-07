<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pie_chart',
        'title' => esc_html__('Piechart BR', 'builderrin' ),
        'icon' => 'eicon-counter-circle',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'easy-pie-chart-lib',
            'builderrin-piecharts',
        ),
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_pie_chart/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_pie_chart/img-layout/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_piecharts',
                    'label' => esc_html__('Piecharts', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Icon Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Percent Text',
                                'style2' => 'Icon',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'style' => 'style2',
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'description',
                            'label' => esc_html__('Description', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'percentage_value',
                            'label' => esc_html__('Percentage Value', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 1,
                            'max' => 100,
                            'step' => 1,
                            'default' => 50,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Normal Piecharts', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'value_typography',
                            'label' => esc_html__('Value Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-piechart .item--value span',
                            'condition' => [
                                'style' => 'style1',
                            ],
                        ),
                        array(
                            'name'  => 'icon_size',
                            'label' => esc_html__( 'Icon Size (px)', 'builderrin' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 15,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-piechart .item--value i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style' => 'style2',
                            ],
                        ),
                        array(
                            'name' => 'chart_size',
                            'label' => esc_html__('Chart Size', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 120,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1170,
                                ],
                            ],
                        ),
                        array(
                            'name' => 'chart_border_width',
                            'label' => esc_html__('Chart Border Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 8,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1170,
                                ],
                            ],
                        ),
                        array(
                            'name' => 'bar_color',
                            'label' => esc_html__('Bar Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'track_color',
                            'label' => esc_html__('Track Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-piechart .item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-piechart .item--title',
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Description Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-piechart .item--description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Description Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-piechart .item--description',
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-piechart' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_hover',
                    'label' => esc_html__('Hover Piecharts', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'bg_color_hover',
                            'label' => esc_html__('Hover Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-piechart:hover' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_color_hover',
                            'label' => esc_html__('Hover Border Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-piechart:before' => 'border-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                builderrin_widget_animation_settings(),
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);