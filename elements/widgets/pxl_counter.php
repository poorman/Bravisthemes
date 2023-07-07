<?php
//Register Counter Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_counter',
        'title' => esc_html__('Counter BR', 'builderrin'),
        'icon' => 'eicon-counter-circle',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',
            'pxl-counter',
            'builderrin-counter',
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
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_counter/img-layout/layout1.jpg'
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
                            'name' => 'title',
                            'label' => esc_html__('Title', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'starting_number',
                            'label' => esc_html__('Starting Number', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                        ),
                        array(
                            'name' => 'ending_number',
                            'label' => esc_html__('Ending Number', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                        ),
                        array(
                            'name' => 'prefix',
                            'label' => esc_html__('Number Prefix', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'suffix',
                            'label' => esc_html__('Number Suffix', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'thousand_separator_char',
                            'label' => esc_html__('Number Separator', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'Default',
                                '.' => 'Dot',
                                ' ' => 'Space',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
                            ],
                            'default' => 'icon',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => 'icon',
                            ],
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Icon Image', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'description' => esc_html__('Select image icon.', 'builderrin'),
                            'condition' => [
                                'icon_type' => 'image',
                            ],
                        ),
                        array(
                            'name' => 'counter_style',
                            'label' => esc_html__('Counter Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'box_width',
                            'label' => esc_html__( 'Box Max Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ '%', 'px' ],
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter' => 'max-width: {{SIZE}}{{UNIT}};',
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
                            '{{WRAPPER}} .pxl--item-inner' => 'justify-content: {{VALUE}};',
                        ],
                    ),
                    ),
),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'builderrin' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'layout' => '1',
    ],
    'controls' => array(
        array(
            'name' => 'title_color',
            'label' => esc_html__('Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--item-title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'darkmode_title_color',
            'label' => esc_html__('Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-counter .pxl--item-title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl--item-title',
        ),
        array(
            'name' => 'title_width',
            'label' => esc_html__( 'Title Max Width', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ '%', 'px' ],
            'default' => [
                'unit' => '%',
            ],
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--item-title' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_number',
    'label' => esc_html__('Number', 'builderrin' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'text_color',
            'label' => esc_html__('Text Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--counter-prefix,
                {{WRAPPER}} .pxl-counter .pxl--counter-value,
                {{WRAPPER}} .pxl-counter .pxl--counter-suffix' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'darkmode_text_color',
            'label' => esc_html__('Text Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-counter .pxl--counter-prefix,
                .dark-mode {{WRAPPER}} .pxl-counter .pxl--counter-value,
                .dark-mode {{WRAPPER}} .pxl-counter .pxl--counter-suffix' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'text_hover_color',
            'label' => esc_html__('Text Hover Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter:hover .pxl--counter-prefix,
                {{WRAPPER}} .pxl-counter:hover .pxl--counter-value,
                {{WRAPPER}} .pxl-counter:hover .pxl--counter-suffix' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'darkmode_text_hover_color',
            'label' => esc_html__('Text Hover Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-counter:hover .pxl--counter-prefix,
                .dark-mode {{WRAPPER}} .pxl-counter:hover .pxl--counter-value,
                .dark-mode {{WRAPPER}} .pxl-counter:hover .pxl--counter-suffix' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'prefix_typography',
            'label' => esc_html__('Prefix Typography', 'builderrin' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-prefix',
        ),
        array(
            'name' => 'number_typography',
            'label' => esc_html__('Number Typography', 'builderrin' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-value',
        ),
        array(
            'name' => 'suffix_typography',
            'label' => esc_html__('Suffix Typography', 'builderrin' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-suffix',
            'condition' => [
                'counter_style' => 'style1',
            ],
        ),
        array(
            'name' => 'suffix_typography2',
            'label' => esc_html__('Suffix Typography', 'builderrin' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-value:after',
            'condition' => [
                'counter_style' => 'style2',
            ],
        ),
        array(
            'name' => 'number_min_width',
            'label' => esc_html__( 'Number Min Width', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
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
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--counter-value' => 'min-width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'number_padding',
            'label' => esc_html__('Number Padding', 'builderrin' ),
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
                '{{WRAPPER}} .pxl-counter .pxl--counter-number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'duration',
            'label' => esc_html__('Animation Duration', 'builderrin'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 2000,
            'min' => 100,
            'step' => 100,
        ),
    ),
),
array(
    'name' => 'section_style_box',
    'label' => esc_html__('Box', 'builderrin' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'bg_color',
            'label' => esc_html__('Background Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--item-inner' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'darkmode_bg_color',
            'label' => esc_html__('Background Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-counter .pxl--item-inner' => 'background-color: {{VALUE}};',
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
                '{{WRAPPER}} .pxl-counter .pxl--item-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .pxl-counter .pxl--item-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .pxl-counter .pxl--item-inner' => 'border-style: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'border_width',
            'label' => esc_html__( 'Border Width', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--item-inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'border_type!' => '',
            ],
            'responsive' => true,
        ),
        array(
            'name' => 'border_color',
            'label' => esc_html__( 'Border Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--item-inner' => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'border_type!' => '',
            ],
        ),
        array(
            'name' => 'darkmode_border_color',
            'label' => esc_html__('Border Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-counter .pxl--item-inner' => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'border_type!' => '',
            ],
        ),
        array(
            'name' => 'box_position',
            'label' => esc_html__('Position', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'control_type' => 'responsive',
            'options' => [
                '' => esc_html__( 'Default', 'builderrin' ),
                'relative' => esc_html__( 'Relative', 'builderrin' ),
                'absolute' => esc_html__( 'Absolute', 'builderrin' ),
            ],
            'default' => '',
            'separator' => 'before',
            'selectors' => [
                '{{WRAPPER}}' => 'position: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'box_horizontal_orientation',
            'label' => esc_html__('Horizontal Orientation', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'control_type' => 'responsive',
            'options' => [
                'start' => [
                    'title' => esc_html__( 'Left', 'builderrin' ),
                    'icon' => 'eicon-h-align-left',
                ],
                'end' => [
                    'title' => esc_html__( 'Right', 'builderrin' ),
                    'icon' => 'eicon-h-align-right',
                ],
            ],
            'toggle' => false,
            'default' => 'start',
            'render_type' => 'ui',
            'condition' => [
                'box_position!' => '',
            ],
        ),
        array(
            'name' => 'box_offset_x',
            'label' => esc_html__('Offset X', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'range' => [
                'px' => [
                    'min' => -1000,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => -200,
                    'max' => 200,
                ],
                'vw' => [
                    'min' => -200,
                    'max' => 200,
                ],
                'vh' => [
                    'min' => -200,
                    'max' => 200,
                ],
            ],
            'default' => [
                'size' => '0',
            ],
            'size_units' => [ 'px', '%', 'vw', 'vh' ],
            'selectors' => [
                '{{WRAPPER}}' => 'left: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'box_horizontal_orientation' => 'start',
                'box_position!' => '',
            ],
        ),
        array(
            'name' => 'box_offset_x_end',
            'label' => esc_html__('Offset X', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'range' => [
                'px' => [
                    'min' => -1000,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => -200,
                    'max' => 200,
                ],
                'vw' => [
                    'min' => -200,
                    'max' => 200,
                ],
                'vh' => [
                    'min' => -200,
                    'max' => 200,
                ],
            ],
            'default' => [
                'size' => '0',
            ],
            'size_units' => [ 'px', '%', 'vw', 'vh' ],
            'selectors' => [
                '{{WRAPPER}}' => 'right: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'box_horizontal_orientation' => 'end',
                'box_position!' => '',
            ],
        ),
        array(
            'name' => 'box_vertical_orientation',
            'label' => esc_html__('Vertical Orientation', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'control_type' => 'responsive',
            'options' => [
                'start' => [
                    'title' => esc_html__( 'Top', 'builderrin' ),
                    'icon' => 'eicon-v-align-top',
                ],
                'end' => [
                    'title' => esc_html__( 'Bottom', 'builderrin' ),
                    'icon' => 'eicon-v-align-bottom',
                ],
            ],
            'toggle' => false,
            'default' => 'start',
            'render_type' => 'ui',
            'condition' => [
                'box_position!' => '',
            ],
        ),
        array(
            'name' => 'box_offset_y',
            'label' => esc_html__('Offset Y', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'range' => [
                'px' => [
                    'min' => -1000,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => -200,
                    'max' => 200,
                ],
                'vw' => [
                    'min' => -200,
                    'max' => 200,
                ],
                'vh' => [
                    'min' => -200,
                    'max' => 200,
                ],
            ],
            'default' => [
                'size' => '0',
            ],
            'size_units' => [ 'px', '%', 'vw', 'vh' ],
            'selectors' => [
                '{{WRAPPER}}' => 'top: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'box_vertical_orientation' => 'start',
                'box_position!' => '',
            ],
        ),
        array(
            'name' => 'box_offset_y_end',
            'label' => esc_html__('Offset Y', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'range' => [
                'px' => [
                    'min' => -1000,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => -200,
                    'max' => 200,
                ],
                'vw' => [
                    'min' => -200,
                    'max' => 200,
                ],
                'vh' => [
                    'min' => -200,
                    'max' => 200,
                ],
            ],
            'default' => [
                'size' => '0',
            ],
            'size_units' => [ 'px', '%', 'vw', 'vh' ],
            'selectors' => [
                '{{WRAPPER}}' => 'bottom: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'box_vertical_orientation' => 'end',
                'box_position!' => '',
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