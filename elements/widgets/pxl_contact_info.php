<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_contact_info',
        'title' => esc_html__('Contact Info BR', 'builderrin' ),
        'icon' => 'eicon-info-circle-o',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_contact_info/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_contact_info/img-layout/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_contact_info/img-layout/layout3.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['1', '2'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'show_icon',
                            'label' => esc_html__('Show Icon', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'show_icon' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
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
                            'name' => 'item_link',
                            'label' => esc_html__('Item Link', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_layout3',
                    'label' => esc_html__('Content', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['3'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'number',
                            'label' => esc_html__('Number', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'rows' => 10,
                            'show_label' => false,
                        ),
                        array(
                            'name' => 'title3',
                            'label' => esc_html__('Title', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'rows' => 10,
                            'show_label' => false,
                        ),
                        array(
                            'name' => 'desc3',
                            'label' => esc_html__('Description', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 10,
                            'show_label' => false,
                        ),
                        array(
                            'name' => 'item_link3',
                            'label' => esc_html__('Item Link', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'box_width',
                            'label' => esc_html__('Max Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ]
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info .pxl-item--icon i' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                            ],
                        ),
                        array(
                            'name' => 'bg_icon_color',
                            'label' => esc_html__('Background Icon Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info .pxl-item--icon i' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Icon Font Size (px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-contact-info .pxl-item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-contact-info .pxl-item--icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info .pxl-item--title' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-contact-info .pxl-item--title span' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-contact-info .pxl-item--title',
                        ),
                        array(
                            'name' => 'title_margin',
                            'label' => esc_html__('Title Margin (px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-contact-info .pxl-item--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'list_item_spacer',
                            'label' => esc_html__('List Item Spacer', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-contact-info .pxl-item--list:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Description Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info .pxl-item--description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 't_width',
                            'label' => esc_html__('Max Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info .pxl-item--description' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                        array(
                            'name' => 'desc_color_hover',
                            'label' => esc_html__('Description Color Hover', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info .pxl-item--description:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Description Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-contact-info .pxl-item--description',
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info .pxl-item--inner' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info .pxl-item--inner' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'hover_bg_color',
                            'label' => esc_html__( 'Hover Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info .pxl-item--inner:hover' => 'background-color: {{VALUE}};',
                            ],
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
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'name' => 'darkmode_icon_color',
            'label' => esc_html__('Icon Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-contact-info .pxl-item--icon i' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
            ],
        ),
        array(
            'name' => 'darkmode_bg_icon_color',
            'label' => esc_html__('Background Icon Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-contact-info .pxl-item--icon i' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'darkmode_title_color',
            'label' => esc_html__('Title Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-contact-info .pxl-item--title' => 'color: {{VALUE}};',
                '.dark-mode {{WRAPPER}} .pxl-contact-info .pxl-item--title span' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
            ],
        ),
        array(
            'name' => 'darkmode_desc_color',
            'label' => esc_html__('Description Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-contact-info .pxl-item--description' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'darkmode_desc_color_hover',
            'label' => esc_html__('Description Color Hover', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-contact-info .pxl-item--description:hover' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'darkmode_bg_color',
            'label' => esc_html__('Background Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-contact-info .pxl-item--inner' => 'background-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'darkmode_hover_bg_color',
            'label' => esc_html__( 'Hover Background Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-contact-info .pxl-item--inner:hover' => 'background-color: {{VALUE}};',
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