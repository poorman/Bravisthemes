<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_particle',
        'title' => esc_html__('BR Particle', 'builderrin' ),
        'icon' => 'eicon-barcode',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'builderrin-particle',
            'builderrin-parallax',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'images',
                            'label' => esc_html__('Images', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'particle',
                                    'label' => esc_html__( 'Particle', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'type_position',
                                    'label' => esc_html__('Position', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'top-left' => 'Top Left',
                                        'top-right' => 'Top Right',
                                        'bottom-left' => 'Bottom Left',
                                        'bottom-right' => 'Bottom Right',
                                    ],
                                    'default' => 'top-left',
                                ),
                                array(
                                    'name' => 'top_position',
                                    'label' => esc_html__('Top Position', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'control_type' => 'responsive',
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'selectors' => [
                                        'body:not(.elementor-editor-active) {{WRAPPER}} .pxl-particle {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
                                    ],
                                    'condition' => [
                                        'type_position' => ['top-left', 'top-right'],
                                    ],
                                ),
                                array(
                                    'name' => 'left_position',
                                    'label' => esc_html__('Left Position', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'control_type' => 'responsive',
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'selectors' => [
                                        'body:not(.elementor-editor-active) {{WRAPPER}} .pxl-particle {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
                                    ],
                                    'condition' => [
                                        'type_position' => ['top-left','bottom-left'],
                                    ],
                                ),
                                array(
                                    'name' => 'bottom_position',
                                    'label' => esc_html__('Bottom Position', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'control_type' => 'responsive',
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'selectors' => [
                                        'body:not(.elementor-editor-active) {{WRAPPER}} .pxl-particle {{CURRENT_ITEM}}' => 'bottom: {{SIZE}}{{UNIT}};',
                                    ],
                                    'condition' => [
                                        'type_position' => ['bottom-right','bottom-left'],
                                    ],
                                ),
                                array(
                                    'name' => 'right_position',
                                    'label' => esc_html__('Right Position', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'control_type' => 'responsive',
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'selectors' => [
                                        'body:not(.elementor-editor-active) {{WRAPPER}} .pxl-particle {{CURRENT_ITEM}}' => 'right: {{SIZE}}{{UNIT}};',
                                    ],
                                    'condition' => [
                                        'type_position' => ['top-right', 'bottom-right'],
                                    ],
                                ),
                                array(
                                    'name' => 'width_particle',
                                    'label' => esc_html__('Width', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'control_type' => 'responsive',
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
                                        'body:not(.elementor-editor-active) {{WRAPPER}} .pxl-particle {{CURRENT_ITEM}}' => 'width: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'height_particle',
                                    'label' => esc_html__('Height', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'control_type' => 'responsive',
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
                                        'body:not(.elementor-editor-active) {{WRAPPER}} .pxl-particle {{CURRENT_ITEM}}' => 'height: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'particle_radius',
                                    'label' => esc_html__('Border Radius', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%' ],
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'selectors' => [
                                        'body:not(.elementor-editor-active) {{WRAPPER}} .pxl-particle {{CURRENT_ITEM}} img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'particle_effect',
                                    'label' => esc_html__('Effect', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '',
                                    'options' => [
                                        '' => 'None',
                                        'move-parallax' => 'Parallax',
                                        'slide-bottom-to-top' => 'Slide Bottom To Top',
                                        'slide-top-to-bottom' => 'Slide Top To Bottom',
                                        'slide-left-to-right' => 'Slide Left To Right',
                                        'slide-right-to-left' => 'Slide Right To Left',
                                        'zoomInOut' => 'Zoom In Out',
                                        'rotated-circle' => 'Rotated Circle',
                                        'slide-effect1' => 'Effect 1',
                                        'slide-effect2' => 'Effect 2',
                                    ],
                                ),
                                array(
                                    'name' => 'transform_hover',
                                    'label' => esc_html__('Transform Hover', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '',
                                    'options' => [
                                        '' => 'None',
                                        'move-to-left' => 'Move To Left',
                                        'move-to-right' => 'Move To Right',
                                    ],
                                ),
                                array(
                                    'name' => 'parallax_move',
                                    'label' => esc_html__('Parallax Move', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'condition' => [
                                        'particle_effect' => 'move-parallax',
                                    ],
                                    'default' => '90',
                                ),
                                array(
                                    'name' => 'pxl_animate',
                                    'label' => esc_html__('Animate', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => builderrin_widget_animate(),
                                    'default' => '',
                                ),
                                array(
                                    'name' => 'pxl_animate_delay',
                                    'label' => esc_html__('Animate Delay', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => '0',
                                    'description' => 'Enter number. Default 0ms',
                                ),
                                array(
                                    'name' => 'z-index',
                                    'label' => esc_html__('Z-Index', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::NUMBER,
                                    'control_type' => 'responsive',
                                    'selectors' => [
                                        'body:not(.elementor-editor-active) {{WRAPPER}} .pxl-particle {{CURRENT_ITEM}}' => 'z-index: {{VALUE}};',
                                    ],
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);