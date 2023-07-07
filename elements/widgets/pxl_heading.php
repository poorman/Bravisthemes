<?php
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_heading',
        'title'      => esc_html__( 'BR Heading', 'builderrin' ),
        'icon'       => 'eicon-t-letter',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'pxl-splitText'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'subtitle_section',
                    'label' => esc_html__('Sub Title', 'builderrin' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'builderrin' ),
                            'type' => 'textarea',
                            'label_block' => true,
                        ),
                        array(
                            'name'      => 'sub_title_on_bottom',
                            'label'     => esc_html__('On Bottom', 'builderrin' ),
                            'type'      => 'switcher',
                            'default'   => 'false',
                        ),
                        array(
                            'name' => 'style_icon',
                            'label' => esc_html__('On Icon', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'officon' => 'Off',
                                'onicon' => 'On',
                            ],
                            'default' => 'officon',
                        ),
                        array(
                            'name' => 'style_icon_position',
                            'label' => esc_html__('Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Absolute',
                                'style2' => 'Top',
                            ],
                            'condition' => [ 'style_icon' => ['onicon','On']],
                            'default' => 'style1',
                        ),
                    ),
                ),
                array(
                    'name' => 'title_section',
                    'label' => esc_html__('Title', 'builderrin' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'builderrin' ),
                            'type' => 'textarea',
                            'default' => 'Fine Architect to Build',
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('Heading HTML Tag', 'builderrin' ),
                            'type' => 'select',
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                                'div' => 'div',
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h3',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Default',
                                'style2' => 'Line',
                                'style3' => 'Shadow',
                            ],
                            'default' => 'style1',
                        ),
                    ),
                ),
                
                array(
                    'name' => 'general_style_section',
                    'label' => esc_html__('General Style', 'builderrin' ),
                    'tab' => 'style',
                    'controls' => array(  
                        array(
                            'name' => 'text_align',
                            'label' => esc_html__('Alignment', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-heading-wrap' => 'justify-content: {{VALUE}};',
                                '{{WRAPPER}} .pxl-heading-inner' => 'text-align: {{VALUE}};',
                            ],
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
                                '{{WRAPPER}} .pxl-heading-inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),

                    ),
                ),
                array(
                    'name' => 'title_style_section',
                    'label' => esc_html__('Title Style', 'builderrin' ),
                    'tab' => 'style',
                    'controls' => array_merge(
                        array(  
                            array(
                                'name' => 'title_color',
                                'label' => esc_html__('Title Color', 'builderrin' ),
                                'type' => 'color',
                                'control_type' => 'responsive',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading-wrap .heading-title' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'darkmode_title_color',
                                'label' => esc_html__( 'Title Color (Dark Mode)', 'builderrin' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '.dark-mode {{WRAPPER}} .pxl-heading-wrap .heading-title' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'title_typography',
                                'label' => esc_html__('Title Typography', 'builderrin' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading-wrap .heading-title',
                            ),
                            array(
                                'name' => 'space_bottom',
                                'label' => esc_html__('Bottom Space (px)', 'builderrin' ),
                                'type' => 'slider',
                                'description' => esc_html__('Enter number.', 'builderrin' ),
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 500,
                                    ],
                                ],
                                'default'    => [
                                    'unit' => 'px'
                                ],
                                'control_type' => 'responsive',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading-wrap .heading-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'title_split_text_anm',
                                'label' => esc_html__('Split Text Animation', 'builderrin' ),
                                'type' => 'select',
                                'options' => [
                                    ''               => esc_html__( 'None', 'builderrin' ),
                                    'split-in-fade' => esc_html__( 'In Fade', 'builderrin' ),
                                    'split-in-right' => esc_html__( 'In Right', 'builderrin' ),
                                    'split-in-left'  => esc_html__( 'In Left', 'builderrin' ),
                                    'split-in-up'    => esc_html__( 'In Up', 'builderrin' ),
                                    'split-in-down'  => esc_html__( 'In Down', 'builderrin' ),
                                    'split-in-rotate'  => esc_html__( 'In Rotate', 'builderrin' ),
                                    'split-in-scale'  => esc_html__( 'In Scale', 'builderrin' ),
                                ],
                                'default' => '',
                            ),

                        ),
                        builderrin_elementor_animation_opts([
                            'name'   => 'title',
                            'label' => '',
                        ])
                    ),
),
array(
    'name' => 'subtitle_style_section',
    'label' => esc_html__('Sub Title Style', 'builderrin' ),
    'tab' => 'style',
    'controls' => array_merge(
        array(
            array(
                'name' => 'sub_title_color',
                'label' => esc_html__('Sub Title Color', 'builderrin' ),
                'type' => 'color',
                'control_type' => 'responsive',
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading-wrap .heading-subtitle' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ),
            array(
                'name' => 'darkmode_sub_title_color',
                'label' => esc_html__('Color (Dark Mode)', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.dark-mode {{WRAPPER}} .pxl-heading-wrap .heading-subtitle' => 'color: {{VALUE}};',
                    '.dark-mode {{WRAPPER}} .pxl-heading-wrap .heading-subtitle span:before' => 'background-color: {{VALUE}};',
                    '.dark-mode {{WRAPPER}} .pxl-heading-wrap .heading-subtitle span:after' => 'background-color: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'sub_title_typography',
                'label' => esc_html__('Sub Title Typography', 'builderrin' ),
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-heading-wrap .heading-subtitle',
            ),
            array(
                'name'  => 'sub_title_space',
                'label' => esc_html__( 'Bottom Space', 'builderrin' ),
                'type'  => 'slider',
                'control_type' => 'responsive',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading-wrap .heading-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name' => 'subtitle_split_text_anm',
                'label' => esc_html__('Split Text Animation', 'builderrin' ),
                'type' => 'select',
                'options' => [
                    ''               => esc_html__( 'None', 'builderrin' ),
                    'split-in-fade' => esc_html__( 'In Fade', 'builderrin' ),
                    'split-in-right' => esc_html__( 'In Right', 'builderrin' ),
                    'split-in-left'  => esc_html__( 'In Left', 'builderrin' ),
                    'split-in-up'    => esc_html__( 'In Up', 'builderrin' ),
                    'split-in-down'  => esc_html__( 'In Down', 'builderrin' ),
                    'split-in-rotate'  => esc_html__( 'In Rotate', 'builderrin' ),
                    'split-in-scale'  => esc_html__( 'In Scale', 'builderrin' ),
                ],
                'default' => '',
            ),
        ),
        builderrin_elementor_animation_opts([
            'name'   => 'sub_title',
            'label' => '',
        ])

    ),
),
array(
    'name' => 'border_style_section',
    'label' => esc_html__('Border', 'builderrin' ),
    'tab' => 'style',
    'controls' => array(  
        array(
            'name' => 'hd_border',
            'label' => esc_html__('Border', 'builderrin' ),
            'type' => 'select',
            'options'      => array(
                ''        => esc_html__( 'None', 'builderrin' ),
                'bd-left'    => esc_html__( 'Border Left', 'builderrin' ),
                'bd-right'   => esc_html__( 'Border Right', 'builderrin' )
            ),
            'prefix_class' => 'pxl-hd-' 
        ), 
        array(
            'name'  => 'bd_width',
            'label' => esc_html__( 'Border Width (px)', 'builderrin' ),
            'type'  => 'slider',
            'control_type' => 'responsive',
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}.pxl-hd-bd-left .elementor-widget-container:before, {{WRAPPER}}.pxl-hd-bd-right .elementor-widget-container:before' => 'width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}}.pxl-hd-bd-left .pxl-heading-wrap' => 'padding-left: calc({{SIZE}}{{UNIT}} + 20px);',
                '{{WRAPPER}}.pxl-hd-bd-right .pxl-heading-wrap' => 'padding-right: calc({{SIZE}}{{UNIT}} + 20px);',
            ],
        ),
        array(
            'name' => 'border_color',
            'label' => esc_html__('Border Color', 'builderrin' ),
            'type' => 'color',
            'selectors' => [
                '{{WRAPPER}}.pxl-hd-bd-left .elementor-widget-container:before, {{WRAPPER}}.pxl-hd-bd-right .elementor-widget-container:before' => 'background-color: {{VALUE}};',
            ],
        ),
    )
),  
),
),
),
builderrin_get_class_widget_path()
);