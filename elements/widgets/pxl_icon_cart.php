<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_cart',
        'title' => esc_html__('Shop Cart BR', 'builderrin' ),
        'icon' => 'eicon-cart-medium',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Source Settings', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'placeholder' => esc_html__('Cart', 'builderrin' ),
                        ),
                        array(
                            'name' => 'value_text',
                            'label' => esc_html__('Value Text', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'placeholder' => esc_html__('Item', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-cart-sidebar-button' => 'text-align: {{VALUE}}',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Content', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Icon Font Size', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 200,
                                ],
                                'vw' => [
                                    'min' => 0,
                                    'max' => 200,
                                ],
                                'vh' => [
                                    'min' => 0,
                                    'max' => 200,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'text_typography',
                            'label' => esc_html__( 'Text Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-cart-text',
                        ),
                        array(
                            'name' => 'text_margin',
                            'label' => esc_html__('Text Margin (px)', 'builderrin' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'value_typography',
                            'label' => esc_html__( 'Value Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-cart-counters',
                        ),
                        array(
                            'name' => 'value_margin',
                            'label' => esc_html__('Value Margin (px)', 'builderrin' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-counters' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'btn_height',
                            'label' => esc_html__('Button Height (px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-cart-sidebar-button' => 'line-height: {{SIZE}}{{UNIT}};',
                            ],
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
                                '{{WRAPPER}} .pxl-cart-sidebar-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'         => 'btn_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'builderrin' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-cart-sidebar-button'
                        ),
                        array(
                            'name' => 'btn_padding',
                            'label' => esc_html__('Padding', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button, .dark-mode {{WRAPPER}} .pxl-cart-sidebar-button i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button:before' => 'border-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-cart-sidebar-button .top-bottom:before, {{WRAPPER}} .pxl-cart-sidebar-button .top-bottom:after, {{WRAPPER}} .pxl-cart-sidebar-button .left-right:before, {{WRAPPER}} .pxl-cart-sidebar-button .left-right:after' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_color',
                            'label' => esc_html__('Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-cart-sidebar-button, .dark-mode {{WRAPPER}} .pxl-cart-sidebar-button i' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'darkmode_btn_bg_color',
                            'label' => esc_html__('Background Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-cart-sidebar-button' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color',
                            'label' => esc_html__('Border Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-cart-sidebar-button:before' => 'border-color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-cart-sidebar-button .top-bottom:before, .dark-mode {{WRAPPER}} .pxl-cart-sidebar-button .top-bottom:after, .dark-mode {{WRAPPER}} .pxl-cart-sidebar-button .left-right:before, .dark-mode {{WRAPPER}} .pxl-cart-sidebar-button .left-right:after' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);