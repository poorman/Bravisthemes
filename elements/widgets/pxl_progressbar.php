<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_progressbar',
        'title' => esc_html__('Progress Bar BR', 'builderrin' ),
        'icon' => 'eicon-skill-bar',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'progressbar',
            'builderrin-progressbar',
            'jquery-numerator',
            'builderrin-counter',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__( 'Content', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'progressbar_list',
                            'label' => esc_html__( 'Progress Bar Lists', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__( 'Title', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'percent',
                                    'label' => esc_html__( 'Percentage', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'default' => [
                                        'size' => 50,
                                        'unit' => '%',
                                    ],
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                            ],
                            'default' => 'style1',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style',
                    'label' => esc_html__('Style', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
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
                                '{{WRAPPER}} .pxl-progressbar' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'typography',
                            'label' => esc_html__( 'Title Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-progressbar .pxl--title',
                        ),
                        array(
                            'name' => 'percent_color',
                            'label' => esc_html__( 'Percentage Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--percentage' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'percent_bg_color',
                            'label' => esc_html__( 'Percentage Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--percentage' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-progressbar .pxl--percentage:before' => 'border-top-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bar_color',
                            'label' => esc_html__( 'Bar Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--progressbar' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bar_color_holder',
                            'label' => esc_html__( 'Bar Color Holder', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--item' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_spacing',
                            'label' => esc_html__('Item Space', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-progressbar .pxl--item + .pxl--item' => 'margin-top: {{SIZE}}{{UNIT}};',
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