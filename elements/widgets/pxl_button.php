<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button',
        'title' => esc_html__('Button BR', 'builderrin' ),
        'icon' => 'eicon-button',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click Here', 'builderrin'),
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left'    => [
                                    'title' => esc_html__('Left', 'builderrin' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'builderrin' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'builderrin' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__('Justified', 'builderrin' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                            'selectors'         => [
                                '{{WRAPPER}} .pxl-button' => 'text-align: {{VALUE}}',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button Normal', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'btn_style',
                            'label' => esc_html__('Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'btn-default' => esc_html__('Default', 'builderrin' ),
                                'btn-style2' => esc_html__('Style 2', 'builderrin' ),
                                'style-2' => esc_html__('Move', 'builderrin' ),
                                'style-3' => esc_html__('Smoke', 'builderrin' ),
                                'style-4' => esc_html__('Drive', 'builderrin' ),
                            ],
                            'default' => 'btn-default',
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__( 'Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-button .btn',
                        ),
                        array(
                            'name' => 'btn_border_radius',
                            'label' => esc_html__('Border Radius', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn, {{WRAPPER}} .pxl-button .btn:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'         => 'btn_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'builderrin' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-button .btn'
                        ),
                        array(
                            'name' => 'btn_padding',
                            'label' => esc_html__('Padding', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'btn_size',
                            'label' => esc_html__('Button Size (px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-button .btn' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_width',
                            'label' => esc_html__('Button Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                '100%' => [
                                    'title' => esc_html__('100%', 'builderrin' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                                'auto' => [
                                    'title' => esc_html__('Auto', 'builderrin' ),
                                    'icon' => 'eicon-h-align-stretch',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'width: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:after' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => ['btn_style' => 'btn-default'],
                        ),
                        array(
                            'name' => 'border_color2',
                            'label' => esc_html__('Border Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:before' => 'border-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn .top-bottom:before, {{WRAPPER}} .pxl-button .btn .top-bottom:after, {{WRAPPER}} .pxl-button .btn .left-right:before, {{WRAPPER}} .pxl-button .btn .left-right:after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => ['btn_style' => 'btn-style2'],
                        ),
                        array(
                            'name' => 'darkmode_color',
                            'label' => esc_html__('Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-button .btn' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'darkmode_btn_bg_color',
                            'label' => esc_html__('Background Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-button .btn' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color',
                            'label' => esc_html__('Border Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-button .btn:after' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => ['btn_style' => 'btn-default'],
                        ),
                        array(
                            'name' => 'darkmode_border_color2',
                            'label' => esc_html__('Border Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-button .btn:before' => 'border-color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-button .btn .top-bottom:before, .dark-mode {{WRAPPER}} .pxl-button .btn .top-bottom:after, .dark-mode {{WRAPPER}} .pxl-button .btn .left-right:before, .dark-mode {{WRAPPER}} .pxl-button .btn .left-right:after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => ['btn_style' => 'btn-style2'],
                        ),
                    ),
),
array(
    'name' => 'section_style_button_hover',
    'label' => esc_html__('Button Hover', 'builderrin' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'button_effect',
            'label' => esc_html__('Effect', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                '' => esc_html__('None', 'builderrin' ),
                'pxl-jump' => esc_html__('Jump', 'builderrin' ),
                'pxl-upscale' => esc_html__('Upscale', 'builderrin' ),
                'pxl-spin' => esc_html__('Spin', 'builderrin' ),
                'pxl-skew' => esc_html__('Skew', 'builderrin' ),
                'pxl-squash' => esc_html__('Squash', 'builderrin' ),
                'pxl-leap' => esc_html__('Leap', 'builderrin' ),
                'pxl-fade' => esc_html__('Fade', 'builderrin' ),
                'pxl-sheen' => esc_html__('Sheen', 'builderrin' ),
                'pxl-xspin' => esc_html__('Xspin', 'builderrin' ),
                'pxl-pop' => esc_html__('Pop', 'builderrin' ),
            ],
            'default' => '',
        ),
        array(
            'name' => 'color_hover',
            'label' => esc_html__('Color Hover', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-button .btn:hover' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'btn_bg_color_hover',
            'label' => esc_html__('Background Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-button .btn:hover' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'border_color_hover',
            'label' => esc_html__('Border Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-button .btn:hover:after' => 'border-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'darkmode_color_hover',
            'label' => esc_html__('Color Hover (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-button .btn:hover' => 'color: {{VALUE}};',
            ],
            'separator' => 'before',
        ),
        array(
            'name' => 'darkmode_btn_bg_color_hover',
            'label' => esc_html__('Background Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-button .btn:hover' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'darkmode_border_color_hover',
            'label' => esc_html__('Border Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-button .btn:hover:after' => 'border-color: {{VALUE}};',
            ],
        ),
        array(
            'name'         => 'btn_box_shadow_hover',
            'label' => esc_html__( 'Box Shadow', 'builderrin' ),
            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-button .btn:hover',
        ),
    ),
),
builderrin_widget_animation_settings()
),
),
),
builderrin_get_class_widget_path()
);