<?php
// Register Fancy Box Widget
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_fancy_box',
        'title'      => esc_html__( 'BR Fancy Box', 'builderrin' ),
        'icon'       => 'eicon-icon-box',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'pxl-tilt',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'builderrin' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'builderrin' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_fancy_box/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_fancy_box/img-layout/layout2.jpg'
                                ],
                            ],
                            'prefix_class' => 'pxl-fancybox-layout-'
                        )
                    )
                ),
                array(
                    'name'     => 'content_section',
                    'label'    => esc_html__( 'Content', 'builderrin' ),
                    'tab'      => 'content',
                    'controls' => array(
                        array(
                            'name'             => 'selected_icon',
                            'label'            => esc_html__( 'Icon', 'builderrin' ),
                            'type'             => 'icons',
                            'default'          => [
                                'library' => 'flaticon',
                                'value'   => 'flaticon-calling'  
                            ],
                            'condition' => [
                                'layout'    => ['1','2']                            
                            ],
                        ),
                        array(
                            'name'             => 'selected_img',
                            'label'            => esc_html__( 'Image', 'builderrin' ),
                            'type'             => 'media',
                            'default'          => '',
                            'condition' => [
                                'layout'    => ['7','5']                            
                            ],
                        ),
                        array(
                            'name'             => 'selected_img_2',
                            'label'            => esc_html__( 'Image 2', 'builderrin' ),
                            'type'             => 'media',
                            'default'          => '',
                            'condition' => [
                                'layout'    => ['7']                            
                            ],
                        ),
                        array(
                            'name'             => 'bg_img',
                            'label'            => esc_html__( 'Background Featured Image', 'builderrin' ),
                            'type'             => 'media',
                            'default'          => '',
                            'selectors' => [
                                '{{WRAPPER}} .layout-2 .parallax-inner' => 'background-image: url( {{URL}} );',
                            ],
                            'condition' => [
                                'layout'    => ['2']                            
                            ],
                        ),
                        array(
                            'name'     => 'sub_title',
                            'label'    => esc_html__('Sub Title', 'builderrin'),
                            'type'     => 'textarea',
                            'default'  => esc_html__('Sub Title', 'builderrin'),
                            'condition' => [
                                'layout'    => ['1','7','4','5']                            
                            ],
                        ),
                        array(
                            'name'     => 'title',
                            'label'    => esc_html__('Title', 'builderrin'),
                            'type'     => 'textarea',
                            'default'  => esc_html__('Your Title', 'builderrin')
                        ),
                        array(
                            'name'     => 'desc',
                            'label'    => esc_html__('Description', 'builderrin'),
                            'type'     => 'textarea',
                            'default'  => esc_html__('Mauris dignissim lacus purus, sed rhoncus risus facilisis eu. Phasellus ullamcorper', 'builderrin'),
                            'condition' => [
                                'layout'    => ['2','6']                            
                            ],
                        ),
                        array(
                            'name'     => 'extra_text_1',
                            'label'    => esc_html__('Extra Text 1', 'builderrin'),
                            'type'     => 'text',
                            'condition' => [
                                'layout'    => ['4']                            
                            ],
                        ),
                        array(
                            'name'     => 'extra_text_2',
                            'label'    => esc_html__('Extra Text 2', 'builderrin'),
                            'type'     => 'text',
                            'condition' => [
                                'layout'    => ['4']                            
                            ],
                        ),
                        array(
                            'name'        => 'hyper_link',
                            'label'       => esc_html__( 'Custom Link', 'builderrin' ),
                            'type'        => 'url',
                            'placeholder' => esc_html__( 'https://your-link.com', 'builderrin' ),
                            'default'     => [
                                'url'         => '#',
                                'is_external' => 'on'
                            ],
                            'condition' => [
                                'layout'    => ['7','2','5','6']                            
                            ] 
                        ),
                        array(
                            'name'     => 'link_text',
                            'label'    => esc_html__('Link Text', 'builderrin'),
                            'type'     => 'text',
                            'default'  => esc_html__('Get Service', 'builderrin'),
                            'condition' => [
                                'layout'      => ['2','5','6']  
                            ]
                        ),
                        array(
                            'name' => 'is_active',
                            'label' => esc_html__('Is Active?', 'builderrin' ),
                            'type'      => 'switcher',
                            'condition' => [
                                'layout'      => ['2']  
                            ]
                        ),
                    )
),
array(
    'name'     => 'style_section',
    'label'    => esc_html__( 'Style', 'builderrin' ),
    'tab'      => 'style',
    'controls' => array_merge(
        array(
            array(
                'name' => 'text_align',
                'label' => esc_html__( 'Alignment', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
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
                    '{{WRAPPER}} .pxl-fancybox-wrap' => 'justify-content: {{VALUE}};',
                    '{{WRAPPER}} .pxl-fancybox-wrap' => 'text-align: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'wg_max_width',
                'label' => esc_html__( 'Icon Max Width', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'control_type' => 'responsive',
                'size_units' => [ 'px', '%' ],
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
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-fancybox-wrap .pxl-fancy-icon' => 'max-width: {{SIZE}}{{UNIT}};max-height: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name'  => 'icon_size',
                'label' => esc_html__( 'Icon Size', 'builderrin' ),
                'type'  => 'slider',
                'range' => [
                    'px' => [
                        'min' => 15,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-fancybox-wrap.layout-1 .pxl-fancy-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'layout'    => ['1','2']                            
                ],
            ),
            array(
                'name' => 'icon_color',
                'label' => esc_html__('Icon Color', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-fancybox-wrap.layout-1 .pxl-fancy-icon .pxl-icon' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'layout'    => ['1','2']                            
                ],
            ),
            array(
                'name' => 'icon_color_dark',
                'label' => esc_html__('Icon Dark Color', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.dark-mode {{WRAPPER}} .pxl-fancybox-wrap.layout-1 .pxl-fancy-icon .pxl-icon' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'layout'    => ['1','2']                            
                ],
            ),
            array(
                'name' => 'icon_bg_color',
                'label' => esc_html__('Icon Background Color', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-fancybox-wrap.layout-1 .pxl-fancy-icon .pxl-icon, {{WRAPPER}} .pxl-fancybox-wrap.layout-1 .pxl-fancy-icon' => 'background-color: {{VALUE}};',
                ],
                'condition' => ['layout' => ['1','2']]
            ),
            array(
                'name' => 'darkmode_bg_color',
                'label' => esc_html__('Dark Background Icon Color', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.dark-mode {{WRAPPER}} .pxl-fancybox-wrap.layout-1 .pxl-fancy-icon .pxl-icon, .dark-mode {{WRAPPER}} .pxl-fancybox-wrap.layout-1 .pxl-fancy-icon' => 'background-color: {{VALUE}} !important;',
                ],
                'condition' => ['layout' => ['1','2']]                
            ),
            array(
                'name' => 'background_color',
                'label' => esc_html__('Background Color', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-fancybox-wrap .fancy-image .pxl-overlay.bg' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .pxl-fancybox-wrap.layout-6' => 'background-color: {{VALUE}};',
                ],
                'condition' => ['layout' => ['5','6']]
            ),
            array(
                'name' => 'box_background_color',
                'label' => esc_html__('Box
                   Background Color', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-fancybox-wrap.layout-2 .fancybox-inner' => 'background-color: {{VALUE}};',
                ],
                'condition' => ['layout' => '2']
            ),
            array(
                'name' => 'dark_box_background_color',
                'label' => esc_html__('Dark Box
                   Background Color', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.dark-mode {{WRAPPER}} .pxl-fancybox-wrap.layout-2 .fancybox-inner' => 'background-color: {{VALUE}};',
                ],
                'condition' => ['layout' => '2']
            ),
            array(
                'name' => 'sub_title_color',
                'label' => esc_html__('Sub Title Color', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-fancybox-wrap.layout-1 .sub-title' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'layout'    => ['1','7','4','5']                            
                ],
            ), 
            array(
                'name' => 'title_color',
                'label' => esc_html__('Title Color', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-fancybox-wrap.layout-1 .title' => 'color: {{VALUE}};',
                ],
            ), 
            array(
                'name' => 'sub_title_color_dark',
                'label' => esc_html__('Sub Title Dark Color', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.dark-mode {{WRAPPER}} .pxl-fancybox-wrap.layout-1 .sub-title' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'layout'    => ['1','7','4','5']                            
                ],
            ), 
            array(
                'name' => 'title_color_dark',
                'label' => esc_html__('Title Dark Color', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '.dark-mode {{WRAPPER}} .pxl-fancybox-wrap.layout-1 .title' => 'color: {{VALUE}};',
                ],
            ), 
            array(
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'builderrin' ),
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-fancybox-wrap.layout-1 .pxl-fancybox-content .title',
            ),
            array(
                'name' => 'desc_color',
                'label' => esc_html__('Description Color', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .desc' => 'color: {{VALUE}};',
                ],
                'condition' => ['layout' => ['2','6']]
            ), 
            array(
                'name' => 'extra_text_color',
                'label' => esc_html__('Extra Text Color', 'builderrin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .extra-text' => 'color: {{VALUE}};',
                ],
                'condition' => ['layout' => ['4']]
            ), 
        )
)
),
array(
    'name'     => 'animation_section',
    'label'    => esc_html__( 'Animation', 'builderrin' ),
    'tab'      => 'style',
    'controls' => array_merge(
        builderrin_elementor_animation_opts([
            'name'   => 'img',
            'label' => esc_html__('Image', 'builderrin'),
            'condition' => ['layout' => '5']
        ]),
        builderrin_elementor_animation_opts([
            'name'   => 'title',
            'label' => esc_html__('Title', 'builderrin'),
        ]),
        builderrin_elementor_animation_opts([
            'name'   => 'sub_title',
            'label' => esc_html__('Sub Title', 'builderrin'),
            'condition' => [
                'layout'    => ['1','7','5']                            
            ],
        ]),
        builderrin_elementor_animation_opts([
            'name'   => 'desc',
            'label' => esc_html__('Description', 'builderrin'),
            'condition' => ['layout' => ['2','6']]
        ])
    )
),

)
)
),
builderrin_get_class_widget_path()
);