<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_social',
        'title' => esc_html__('Social Title BR', 'builderrin'),
        'icon' => 'eicon-editor-link',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_link',
                    'label' => esc_html__('Link', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
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
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'builderrin' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_color',
                            'label' => esc_html__('Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_color_hover',
                            'label' => esc_html__('Color Hover', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_typography',
                            'label' => esc_html__('Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-social a',
                        ),
                        array(
                            'name' => 'display_style',
                            'label' => esc_html__( 'Display Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'pxl-block' => esc_html__( 'Block', 'builderrin' ),
                                'pxl-inline-block' => esc_html__( 'Inline Block', 'builderrin' ),
                            ],
                            'default' => 'pxl-block',
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'bottom_spacer',
                            'label' => esc_html__( 'Bottom Spacer', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-social li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'display_style' => ['pxl-block']
                            ],
                        ),
                        array(
                            'name' => 'right_spacer',
                            'label' => esc_html__( 'Right Spacer', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-social li + li' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'display_style' => ['pxl-inline-block']
                            ],
                        ),
                        array(
                            'name' => 'divider_color',
                            'label' => esc_html__('Divider Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social a:after' => 'background-color: {{VALUE}};',
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