<?php
// Register Icon Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_box',
        'title' => esc_html__('Icon Box BR', 'builderrin' ),
        'icon' => 'eicon-icon-box',
        'categories' => array('pxltheme-core'),
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_icon_box/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_icon_box/img-layout/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
                            ],
                            'default' => 'icon',
                            'condition' => [
                                'layout' => ['1','2'],
                            ],
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => 'icon',
                                'layout' => ['1','2'],
                            ],
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Icon Image', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'icon_type' => 'image',
                                'layout' => ['1','2'],
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout' => ['1','2'],
                            ],
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 10,
                            'show_label' => false,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'wg_max_width',
                            'label' => esc_html__( 'Widget Max Width', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-icon-box' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
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
                            '{{WRAPPER}} .pxl-icon-box' => 'text-align: {{VALUE}};',
                            '{{WRAPPER}} .pxl-icon-box .pxl-item--content' => 'justify-content: {{VALUE}};',
                        ],
                    ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                            'condition' => [
                                'icon_type' => 'image',
                                'layout' => ['1','2'],
                            ],
                        ),
                    ),
),
array(
    'name' => 'section_style_icon',
    'label' => esc_html__('Style', 'builderrin'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'layout' => ['1','2'],
    ],
    'controls' => array(
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Icon Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon i' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),
        array(
            'name' => 'darkmode_icon_color',
            'label' => esc_html__('Icon Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-icon-box .pxl-item--icon i' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),
        array(
            'name' => 'icon_font_size',
            'label' => esc_html__('Icon Font Size', 'builderrin' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),
        array(
            'name' => 'img_max_height',
            'label' => esc_html__('Image Max Height', 'builderrin' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon img' => 'max-height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'image',
            ],
        ),
        array(
            'name' => 'icon_margin',
            'label' => esc_html__('Icon Margin (px)', 'builderrin' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'darkmode_title_color',
            'label' => esc_html__('Title Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-icon-box .pxl-item--title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'builderrin' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-icon-box .pxl-item--title',
        ),
        array(
            'name' => 'title_max_width',
            'label' => esc_html__( 'Title Max Width', 'builderrin' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--title' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'title_margin',
            'label' => esc_html__('Title Margin (px)', 'builderrin' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),
        array(
            'name' => 'desc_color',
            'label' => esc_html__('Description Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--description' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'darkmode_description_color',
            'label' => esc_html__( 'Description Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-icon-box .pxl-item--description' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Description Typography', 'builderrin' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-icon-box .pxl-item--description',
        ),
        array(
            'name' => 'desc_max_width',
            'label' => esc_html__( 'Description Max Width', 'builderrin' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--description' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'des_margin',
            'label' => esc_html__('Description Margin (px)', 'builderrin' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'content_margin',
            'label' => esc_html__('Content Margin (px)', 'builderrin' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),
        array(
            'name' => 'bg_color',
            'label' => esc_html__('Background Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'darkmode_bg_color',
            'label' => esc_html__('Background Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-icon-box .pxl-item--inner' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'box_padding',
            'label' => esc_html__('Padding', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'control_type' => 'responsive',
            'default' => [
                'unit' => 'px',
            ],
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 300,
                ],
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'after',
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner' => 'border-style: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'border_width',
            'label' => esc_html__( 'Border Width', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'border_color',
            'label' => esc_html__('Border Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner' => 'border-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'darkmode_border_color',
            'label' => esc_html__('Border Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-icon-box .pxl-item--inner' => 'border-color: {{VALUE}};',
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