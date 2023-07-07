<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_mailchimp',
        'title' => esc_html__('BR Mailchimp', 'builderrin'),
        'icon' => 'eicon-email-field',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'form_id',
                            'label' => esc_html__('Form ID', 'builderrin' ),
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => esc_html__('Default', 'builderrin' ),
                             
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name'  => 'max_width',
                            'label' => esc_html__( 'Max Width', 'builderrin' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 100,
                                    'max' => 1920,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp > div' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'min_width',
                            'label' => esc_html__( 'Min Width', 'builderrin' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 100,
                                    'max' => 1920,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp > div' => 'min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_align',
                            'label' => esc_html__('Content Alignment', 'builderrin' ),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Start', 'builderrin' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'builderrin' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'End', 'builderrin' ),
                                    'icon' => 'eicon-text-align-right',
                                ]
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);