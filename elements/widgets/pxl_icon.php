<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon',
        'title' => esc_html__('Icons BR', 'builderrin'),
        'icon' => 'eicon-alert',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'icons',
                            'label' => esc_html__('Icons', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'icon_type',
                                    'label' => esc_html__('Type', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'icon' => esc_html__( 'Icon', 'builderrin' ),
                                        'image' => esc_html__( 'Image', 'builderrin' ),
                                    ],
                                    'default' => 'icon',
                                ),
                                array(
                                    'name' => 'icon_image',
                                    'label' => esc_html__( 'Image', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'condition' => [
                                        'icon_type' => 'image',
                                    ],
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'condition' => [
                                        'icon_type' => 'icon',
                                    ],
                                ),
                                array(
                                    'name' => 'icon_link',
                                    'label' => esc_html__('Link', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'color_item',
                                    'label' => esc_html__( 'Color', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'default' => '',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-icon1 {{CURRENT_ITEM}}' => 'background-color: {{VALUE}};',
                                    ],
                                ),
                            ),
                        ),
                        array(
                          'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-icon1' => 'text-align: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => esc_html__('Style 1', 'builderrin' ),
                                'style-2' => esc_html__('Style 2', 'builderrin' ),
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__( 'Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__( 'Icon Color Hover', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-icon1 a:hover i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_color_hover',
                            'label' => esc_html__('Background Color Hover', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a:hover' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Font Size (px)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_space',
                            'label' => esc_html__('Spacer', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'margin: 0 {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_darkmode',
                    'label' => esc_html__('Dark Mode', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'darkmode_color',
                            'label' => esc_html__( 'Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-icon1 i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_color_hover',
                            'label' => esc_html__( 'Icon Color Hover', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-icon1 a:hover' => 'color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-icon1 a:hover i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_bg_color',
                            'label' => esc_html__('Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-icon1 a' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_bg_color_hover',
                            'label' => esc_html__('Background Color Hover', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-icon1 a:hover' => 'background-color: {{VALUE}};',
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