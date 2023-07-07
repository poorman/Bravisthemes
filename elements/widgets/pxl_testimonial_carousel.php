<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

pxl_add_custom_widget(
    array(
        'name' => 'pxl_testimonial_carousel',
        'title' => esc_html__('Testimonial Carousel BR', 'builderrin'),
        'icon' => 'eicon-testimonial',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
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
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_testimonial_carousel/img-layout/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_testimonial_carousel/img-layout/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_testimonial_carousel/img-layout/layout4.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'testimonial',
                            'label' => esc_html__('Testimonial', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['1']
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'icon',
                                    'label' => esc_html__('Icon', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                ),
                                array(
                                    'name' => 'sub_text',
                                    'label' => esc_html__('Sub Title', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__('Description', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                            ),
                            'title_field' => '{{{ position }}}',
                        ),
                        array(
                            'name' => 'testimonial2',
                            'label' => esc_html__('Testimonial', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['2']
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'style',
                                    'label' => esc_html__('Style', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'style1' => 'Style 1',
                                        'style2' => 'Style 2',
                                    ],
                                    'default' => 'style1',
                                ),
                                array(
                                    'name' => 'show_star',
                                    'label' => esc_html__('Show Star', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SWITCHER,
                                    'default' => 'true',
                                ),
                                array(
                                    'name' => 'star',
                                    'label' => esc_html__('Star', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'one-star'   => '1 Star',
                                        'two-star'   => '2 Star',
                                        'three-star' => '3 Star',
                                        'four-star'  => '4 Star',
                                        'five-star'  => '5 Star',
                                    ],
                                    'default' => 'five-star',
                                ),
                                array(
                                    'name' => 'title2',
                                    'label' => esc_html__('Title', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'condition' => [
                                        'style' => 'style1',
                                    ],
                                ),
                                array(
                                    'name' => 'desc2',
                                    'label' => esc_html__('Description', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'image2',
                                    'label' => esc_html__( 'Image', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'author2',
                                    'label' => esc_html__('Author', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'position2',
                                    'label' => esc_html__('Position', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                            ),
                            'title_field' => '{{{ desc2 }}}',
                        ),
                        array(
                            'name' => 'testimonial3',
                            'label' => esc_html__('Testimonial', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['3']
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'small_image3',
                                    'label' => esc_html__( 'Image', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title3',
                                    'label' => esc_html__('Title', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                    'rows' => 10,
                                ),
                                array(
                                    'name' => 'image3',
                                    'label' => esc_html__( 'Author Image', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'author3',
                                    'label' => esc_html__('Author Name', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'position3',
                                    'label' => esc_html__('Position', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'icon3',
                                    'label' => esc_html__('Icon', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                ),
                            ),
                            'title_field' => '{{{ author3 }}}',
                        ),
                        array(
                            'name' => 'testimonial4',
                            'label' => esc_html__('Testimonial', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['4']
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'show_icon4',
                                    'label' => esc_html__('Show Icon', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SWITCHER,
                                    'default' => 'true',
                                ),
                                array(
                                    'name' => 'icon4',
                                    'label' => esc_html__('Icon', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'condition' => [
                                        'show_icon4' => 'true',
                                    ],
                                ),
                                array(
                                    'name' => 'show_star4',
                                    'label' => esc_html__('Show Star', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SWITCHER,
                                    'default' => 'true'
                                ),
                                array(
                                    'name' => 'star4',
                                    'label' => esc_html__('Star', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'one-star'   => '1 Star',
                                        'two-star'   => '2 Star',
                                        'three-star' => '3 Star',
                                        'four-star'  => '4 Star',
                                        'five-star'  => '5 Star',
                                    ],
                                    'default' => 'five-star',
                                ),
                                array(
                                    'name' => 'title4',
                                    'label' => esc_html__('Title', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'desc4',
                                    'label' => esc_html__('Description', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'image4',
                                    'label' => esc_html__( 'Image', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'author4',
                                    'label' => esc_html__('Author', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'position4',
                                    'label' => esc_html__('Position', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                            ),
                            'title_field' => '{{{ desc4 }}}',
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
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'builderrin' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'text-align: {{VALUE}};',
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
                            'name'  => 'icon_size',
                            'label' => esc_html__( 'Icon Size (px)', 'builderrin' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon svg' => 'width: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '3', '4']
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon svg' => 'stroke: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '3', '4']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_icon_color',
                            'label' => esc_html__('Icon Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon i' => 'color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon svg' => 'stroke: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '3', '4']
                            ],
                        ),
                        array(
                            'name' => 'icon_margin',
                            'label' => esc_html__('Icon Margin (px)', 'builderrin' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => 'px',
                            ],
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                            'condition' => [
                                'layout' => ['1', '3', '4']
                            ],
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                            'condition' => [
                                'layout' => ['2', '3']
                            ],
                        ),
                        array(
                            'name' => 'title_rating_color',
                            'label' => esc_html__('Rating Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--star--title' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['2']
                            ],
                        ),
                        array(
                            'name' => 'sub_title_color',
                            'label' => esc_html__('Sub Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--subtitle' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_sub_title_color',
                            'label' => esc_html__('Sub Title Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--subtitle' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1']
                            ],
                        ),
                        array(
                            'name' => 'sub_title_typography',
                            'label' => esc_html__('Sub Title Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--subtitle',
                            'condition' => [
                                'layout' => ['1']
                            ],
                        ),
                        array(
                            'name' => 'sub_title_max_width',
                            'label' => esc_html__( 'Sub Title Max Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => 'px',
                            ],
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--subtitle' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['1']
                            ],
                        ),
                        array(
                            'name' => 'sub_title_margin',
                            'label' => esc_html__('Sub Title Margin', 'builderrin' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => 'px',
                            ],
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                            'condition' => [
                                'layout' => ['1']
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['2', '3']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_title_color',
                            'label' => esc_html__('Title Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['2', '3']
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title',
                            'condition' => [
                                'layout' => ['2', '3']
                            ],
                        ),
                        array(
                            'name' => 'title_max_width',
                            'label' => esc_html__( 'Title Max Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => 'px',
                            ],
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['2', '3']
                            ],
                        ),
                        array(
                            'name' => 'title_margin',
                            'label' => esc_html__('Title Margin', 'builderrin' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => 'px',
                            ],
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                            'condition' => [
                                'layout' => ['2', '3']
                            ],
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Description Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_desc_color',
                            'label' => esc_html__('Description Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Description Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc',
                        ),
                        array(
                            'name' => 'desc_max_width',
                            'label' => esc_html__( 'Description Max Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => 'px',
                            ],
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_margin',
                            'label' => esc_html__('Description Margin', 'builderrin' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => 'px',
                            ],
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'pxl_animate_description',
                            'label' => esc_html__( 'Description Animate', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => builderrin_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay_description',
                            'label' => esc_html__('Description Animate Delay', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => esc_html__( 'Enter number. Default 0ms', 'builderrin' ),
                        ),
                        array(
                            'name' => 'pxl_animate_duration_description',
                            'label' => esc_html__('Description Animation Duration', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 0,
                            'step' => 0.1,
                            'default' => 1.2,
                            'description' => 'Default 1.2s',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'author_color',
                            'label' => esc_html__('Author Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--author' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_author_color',
                            'label' => esc_html__('Author Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--author' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'author_typography',
                            'label' => esc_html__('Author Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--author',
                        ),
                        array(
                            'name' => 'author_margin',
                            'label' => esc_html__('Author Margin', 'builderrin' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => 'px',
                            ],
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--author' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'pxl_animate_author',
                            'label' => esc_html__( 'Author Animate', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => builderrin_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay_author',
                            'label' => esc_html__('Author Animate Delay', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => esc_html__( 'Enter number. Default 0ms', 'builderrin' ),
                        ),
                        array(
                            'name' => 'pxl_animate_duration_author',
                            'label' => esc_html__('Author Animation Duration', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 0,
                            'step' => 0.1,
                            'default' => 1.2,
                            'description' => 'Default 1.2s',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'position_color',
                            'label' => esc_html__('Position Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_position_color',
                            'label' => esc_html__('Position Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'position_typography',
                            'label' => esc_html__('Position Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position',
                        ),
                        array(
                            'name' => 'position_margin',
                            'label' => esc_html__('Position Margin', 'builderrin' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => 'px',
                            ],
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'pxl_animate_position',
                            'label' => esc_html__( 'Position Animate', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => builderrin_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay_position',
                            'label' => esc_html__('Position Animate Delay', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => esc_html__( 'Enter number. Default 0ms', 'builderrin' ),
                        ),
                        array(
                            'name' => 'pxl_animate_duration_position',
                            'label' => esc_html__('Position Animation Duration', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 0,
                            'step' => 0.1,
                            'default' => 1.2,
                            'description' => 'Default 1.2s',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__( 'Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_bg_color',
                            'label' => esc_html__( 'Background Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'hover_bg_color',
                            'label' => esc_html__( 'Hover Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_hover_bg_color',
                            'label' => esc_html__( 'Hover Background Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'bg_color3',
                            'label' => esc_html__( 'Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-swiper-container' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['3']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_bg_color3',
                            'label' => esc_html__( 'Background Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-swiper-container' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['3']
                            ],
                        ),
                        array(
                            'name' => 'border_type',
                            'label' => esc_html__( 'Border Type', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'builderrin' ),
                                'solid' => esc_html__( 'Solid', 'builderrin' ),
                                'double' => esc_html__( 'Double', 'builderrin' ),
                                'dotted' => esc_html__( 'Dotted', 'builderrin' ),
                                'dashed' => esc_html__( 'Dashed', 'builderrin' ),
                                'groove' => esc_html__( 'Groove', 'builderrin' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-style: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Border Radius', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color',
                            'label' => esc_html__('Border Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'border_color3',
                            'label' => esc_html__('Border Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel3:hover .pxl-swiper-container:before' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['3']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color3',
                            'label' => esc_html__('Border Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel3:hover .pxl-swiper-container:before' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['3']
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'box_padding',
                            'label' => esc_html__('Box Padding', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => 'px',
                            ],
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'carousel_margin',
                            'label' => esc_html__('Carousel Margin', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-carousel-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_settings_carousel',
                    'label' => esc_html__('Settings', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                'auto' => 'Auto',
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
                            'default' => '1',
                            'options' => [
                                'auto' => 'Auto',
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
                            'default' => '1',
                            'options' => [
                                'auto' => 'Auto',
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
                            'default' => '1',
                            'options' => [
                                'auto' => 'Auto',
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
                            'default' => '1',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns XXL Devices', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'inherit',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'inherit' => 'Inherit',
                            ],
                        ),
                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
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
                                'top' => '15',
                                'right' => '15',
                                'bottom' => '15',
                                'left' => '15'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-container' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'arrows_style',
                            'label' => esc_html__('Arrows Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                                'style3' => 'Style 3',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'arrows' => 'true',
                                'layout' => ['1', '2']
                            ]
                        ),
                        array(
                            'name' => 'arrows_margin',
                            'label' => esc_html__('Arrows Margin', 'builderrin' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => 'px',
                            ],
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
                            'selectors' => [
                                '{{WRAPPER}} .wp-arrow' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                            'condition' => [
                                'arrows' => 'true'
                            ]
                        ),
                        array(
                            'name'         => 'arrows_align',
                            'label'        => esc_html__( 'Arrows Alignment', 'builderrin' ),
                            'type'         => 'choose',
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
                                '{{WRAPPER}} .wp-arrow' => 'justify-content: {{VALUE}};',
                            ],
                            'condition' => [
                                'arrows' => 'true',
                                'arrows_style' => 'style1'
                            ]
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'fraction' => 'Fraction',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'bullets_color',
                            'label' => esc_html__('Bullets Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-dots .pxl-swiper-pagination-bullet:before' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-swiper-dots .pxl-swiper-pagination-bullet:after' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'bullets',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'active_bullets_color',
                            'label' => esc_html__('Bullets Color Active', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-dots .swiper-pagination-bullet-active:before' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-swiper-dots .swiper-pagination-bullet-active:after' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'bullets',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Speed', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                    ),
                ),
                builderrin_widget_animation_settings(),
                builderrin_cursor_opts()
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);