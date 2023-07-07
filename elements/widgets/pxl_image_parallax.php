<?php
pxl_add_custom_widget(
    [
        'name' => 'pxl_image_parallax',
        'title' => esc_html__('BR Image Parallax', 'builderrin' ),
        'icon' => 'eicon-image',
        'categories' => ['pxltheme-core'],
        'params' => [
            'sections' => [
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'builderrin' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Layout', 'builderrin' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_image_parallax/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_image_parallax/img-layout/layout2.png'
                                ]
                            ],
                            'prefix_class' => 'pxl-img-layout-'
                        ),
                    )
                ),
                [
                    'name'     => 'content_section',
                    'label'    => esc_html__( 'Image', 'builderrin' ),
                    'tab'      => 'content',
                    'controls' => [
                        [
                            'name' => 'image',
                            'label' => esc_html__( 'Choose Image', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'dynamic' => [
                                'active' => true,
                            ],
                            'default' => [
                                'url' => \Elementor\Utils::get_placeholder_image_src()
                            ],
                        ],
                        [
                            'name' => 'image',
                            'label' => esc_html__( 'Image Size', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default' => 'full',  
                        ],
                        [
                            'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
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
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                            ],
                        ],
                        [
                            'name' => 'link_to',
                            'label' => esc_html__( 'Link', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'none',
                            'options' => [
                                'none' => esc_html__( 'None', 'builderrin' ),
                                'file' => esc_html__( 'Media File', 'builderrin' ),
                                'custom' => esc_html__( 'Custom URL', 'builderrin' ),
                            ],
                        ],
                        [
                            'name' => 'link',
                            'label' => esc_html__( 'Link', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'dynamic' => [
                                'active' => true,
                            ],
                            'placeholder' => esc_html__( 'https://your-link.com', 'builderrin' ),
                            'condition' => [
                                'link_to' => 'custom',
                            ],
                            'show_label' => false,
                        ],
                        [
                            'name' => 'open_lightbox',
                            'label' => esc_html__( 'Lightbox', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'default',
                            'options' => [
                                'default' => esc_html__( 'Default', 'builderrin' ),
                                'yes' => esc_html__( 'Yes', 'builderrin' ),
                                'no' => esc_html__( 'No', 'builderrin' ),
                            ],
                            'condition' => [
                                'link_to' => 'file',
                            ],
                        ],
                        [
                            'name' => 'experience_title',
                            'label' => esc_html__( 'Experience Title', 'builderrin' ),                            
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                            'condition' => [
                                'layout' => '2',
                            ],
                        ],
                        [
                            'name' => 'experience_subtitle',
                            'label' => esc_html__( 'Experience Sub Title', 'builderrin' ),                            
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                            'condition' => [
                                'layout' => '2',
                            ],
                        ],
                        [
                            'name' => 'shape',
                            'label' => esc_html__( 'Choose Shape', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => '2',
                            ],
                        ],
                    ],
                ],  
                [
                    'name' => 'parallax_section',
                    'label' => esc_html__('Parallax Settings', 'builderrin' ),
                    'tab'      => 'content',
                    'controls' => [
                        [
                            'name' => 'pxl_parallax',
                            'label' => esc_html__( 'Parallax Type', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ''        => esc_html__( 'None', 'builderrin' ),
                                'x'       => esc_html__( 'Transform X', 'builderrin' ),
                                'y'       => esc_html__( 'Transform Y', 'builderrin' ),
                                'z'       => esc_html__( 'Transform Z', 'builderrin' ),
                                'rotateX' => esc_html__( 'RotateX', 'builderrin' ),
                                'rotateY' => esc_html__( 'RotateY', 'builderrin' ),
                                'rotateZ' => esc_html__( 'RotateZ', 'builderrin' ),
                                'scaleX'  => esc_html__( 'ScaleX', 'builderrin' ),
                                'scaleY'  => esc_html__( 'ScaleY', 'builderrin' ),
                                'scaleZ'  => esc_html__( 'ScaleZ', 'builderrin' ),
                                'scale'   => esc_html__( 'Scale', 'builderrin' ),
                            ],
                        ],
                        [
                            'name' => 'parallax_value',
                            'label' => esc_html__('Value', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                            'condition' => [ 'pxl_parallax!' => '']  
                        ],
                        [
                            'name' => 'pxl_parallax_screen',
                            'label'   => esc_html__( 'Parallax In Screen', 'builderrin' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',
                            'default' => '',
                            'options' => array(
                                '' => esc_html__( 'Default', 'builderrin' ),
                                'no'   => esc_html__( 'No', 'builderrin' ),
                            ),
                            'prefix_class' => 'pxl-parallax%s-',
                            'condition' => [ 'pxl_parallax!' => '']  
                        ]
                    ]
                ],
                [
                    'name'     => 'bg_parallax_section',
                    'label'    => esc_html__('Background Parallax', 'builderrin' ),
                    'tab'      => 'content',
                    'controls' => [
                        [
                            'name'    => 'pxl_bg_parallax',
                            'label'   => esc_html__( 'Background Parallax Type', 'builderrin' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ''                  => esc_html__( 'None', 'builderrin' ),
                                'basic'             => esc_html__( 'Basic', 'builderrin' ),
                                'rotate'            => esc_html__( 'Rotate', 'builderrin' ),
                                'mouse-move'        => esc_html__( 'Mouse Move', 'builderrin' ),
                                'mouse-move-rotate' => esc_html__( 'Mouse Move Rotate', 'builderrin' ),
                            ],
                        ],
                        [
                            'name' => 'bg_parallax_width',
                            'label' => esc_html__('Background Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'tablet_default' => [
                                'unit' => '%',
                            ],
                            'mobile_default' => [
                                'unit' => '%',
                            ],
                            'size_units' => [ '%', 'px', 'vw' ],
                            'range' => [
                                '%' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 1,
                                    'max' => 1920,
                                ],
                                'vw' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-wg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [ 'pxl_bg_parallax!' => '']  
                        ],
                        [
                            'name' => 'bg_parallax_height',
                            'label' => esc_html__('Background Height', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                            ],
                            'tablet_default' => [
                                'unit' => 'px',
                            ],
                            'mobile_default' => [
                                'unit' => 'px',
                            ],
                            'size_units' => [ 'px', 'vh' ],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                                'vh' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-wg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [ 'pxl_bg_parallax!' => '']  
                        ],
                    ]
                ],
                [
                    'name'     => 'style_section',
                    'label'    => esc_html__( 'Style', 'builderrin' ),
                    'tab'      => 'style',
                    'controls' => [
                        [
                            'name'        => 'width',
                            'label' => esc_html__( 'Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'tablet_default' => [
                                'unit' => '%',
                            ],
                            'mobile_default' => [
                                'unit' => '%',
                            ],
                            'size_units' => [ '%', 'px', 'vw' ],
                            'range' => [
                                '%' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                                'vw' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-wg>img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ],
                        [
                            'name'        => 'space',
                            'label' => esc_html__( 'Max Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'tablet_default' => [
                                'unit' => '%',
                            ],
                            'mobile_default' => [
                                'unit' => '%',
                            ],
                            'size_units' => [ '%', 'px', 'vw' ],
                            'range' => [
                                '%' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                                'vw' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-wg>img' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ],
                        [
                            'name'        => 'height',
                            'label' => esc_html__( 'Height', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                            ],
                            'tablet_default' => [
                                'unit' => 'px',
                            ],
                            'mobile_default' => [
                                'unit' => 'px',
                            ],
                            'size_units' => [ 'px', 'vh' ],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                                'vh' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-wg>img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ],
                        [
                            'name'        => 'object-fit',
                            'label' => esc_html__( 'Object Fit', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',
                            'condition' => [
                                'height[size]!' => '',
                            ],
                            'options' => [
                                '' => esc_html__( 'Default', 'builderrin' ),
                                'fill' => esc_html__( 'Fill', 'builderrin' ),
                                'cover' => esc_html__( 'Cover', 'builderrin' ),
                                'contain' => esc_html__( 'Contain', 'builderrin' ),
                            ],
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-wg>img' => 'object-fit: {{VALUE}};',
                            ],
                        ],
                        [
                            'name'        => 'separator_panel_style',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                            'style' => 'thick',
                        ],
                        [
                            'name' => 'image_effects',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'normal',
                                    'label' => esc_html__('Normal', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TAB,
                                    'controls' => [
                                        [
                                            'name'        => 'opacity',
                                            'label' => esc_html__( 'Opacity', 'builderrin' ),
                                            'type' => \Elementor\Controls_Manager::SLIDER,
                                            'range' => [
                                                'px' => [
                                                    'max' => 1,
                                                    'min' => 0.10,
                                                    'step' => 0.01,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-image-wg>img' => 'opacity: {{SIZE}};',
                                            ],
                                        ],
                                        [
                                            'name' => 'css_filters',
                                            'label' => esc_html__('CSS Filters', 'builderrin' ),
                                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-image-wg>img',
                                        ],       
                                    ],
                                ],
                                [
                                    'name' => 'hover',
                                    'label' => esc_html__('Hover', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TAB,
                                    'controls' => [
                                        [
                                            'name'        => 'opacity_hover',
                                            'label' => esc_html__( 'Opacity Hover', 'builderrin' ),
                                            'type' => \Elementor\Controls_Manager::SLIDER,
                                            'range' => [
                                                'px' => [
                                                    'max' => 1,
                                                    'min' => 0.10,
                                                    'step' => 0.01,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}}:hover .pxl-image-wg>img' => 'opacity: {{SIZE}};',
                                            ],
                                        ],
                                        [
                                            'name' => 'css_filters_hover',
                                            'label' => esc_html__('CSS Filters Hover', 'builderrin' ),
                                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}}:hover .pxl-image-wg>img',
                                        ],  
                                        [
                                            'name' => 'background_hover_transition',
                                            'label' => esc_html__( 'Transition Duration', 'builderrin' ),
                                            'type' => \Elementor\Controls_Manager::SLIDER,
                                            'range' => [
                                                'px' => [
                                                    'max' => 3,
                                                    'step' => 0.1,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-image-wg>img' => 'transition-duration: {{SIZE}}s',
                                            ],
                                        ],
                                        [
                                            'name' => 'hover_animation',
                                            'label' => esc_html__( 'Hover Animation', 'builderrin' ),
                                            'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
                                        ]     
                                    ]
                                ]
                            ],

                        ], 
                        [
                            'name' => 'image_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-image-wg>img, {{WRAPPER}} .pxl-bg-parallax',
                            'separator' => 'before',
                        ],
                        [
                            'name'         => 'image_border_radius',
                            'label'        => esc_html__( 'Border Radius', 'builderrin' ),
                            'type'         => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'   => [ 'px', '%' ],
                            'selectors'    => [
                                '{{WRAPPER}} .pxl-image-wg>img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-bg-parallax' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ],
                        [
                            'name'         => 'image_box_shadow',
                            'label'        => esc_html__( 'Box Shadow', 'builderrin' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'exclude' => [
                                'box_shadow_position',
                            ],
                            'selector' => '{{WRAPPER}} .pxl-image-wg>img',
                        ]   
                    ],
                ],  
                [
                    'name' => 'custom_style_section',
                    'label' => esc_html__('Custom Style', 'builderrin' ),
                    'tab'      => 'style',
                    'controls' => [
                        [
                            'name' => 'custom_style',
                            'label' => esc_html__( 'Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ''           => esc_html__( 'None', 'builderrin' ),
                                'pxl-image-effect1' => esc_html__('Zigzag', 'builderrin' ),
                                'pxl-image-tilt' => esc_html__('Tilt', 'builderrin' ),
                                'slide-top-to-bottom' => esc_html__('Slide Top To Bottom ', 'builderrin' ),
                                'pxl-image-effect2' => esc_html__('Slide Bottom To Top ', 'builderrin' ),
                                'slide-right-to-left' => esc_html__('Slide Right To Left ', 'builderrin' ),
                                'slide-left-to-right' => esc_html__('Slide Left To Right ', 'builderrin' ),
                                'skew-in' => esc_html__( 'Skew In', 'builderrin' ),
                            ],
                        ],
                        [
                            'name' => 'bg_color',
                            'label' => esc_html__('Background color', 'builderrin'),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-wg.bg-halp:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [ 'custom_style' => 'bg-halp']  
                        ],
                    ]
                ],
                builderrin_widget_animation_settings(),    
            ], 
        ],
    ],
    builderrin_get_class_widget_path()
);