<?php
// Register Logo Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_logo',
        'title' => esc_html__('Logo BR', 'builderrin' ),
        'icon' => 'eicon-image',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'logo',
                            'label' => esc_html__('Logo 1', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'logo_dark',
                            'label' => esc_html__('Logo 2', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'logo_link',
                            'label' => esc_html__('Link', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'logo_align',
                            'label' => esc_html__('Alignment', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__('Left', 'builderrin' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'builderrin' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'builderrin' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-logo' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'logo_height',
                            'label' => esc_html__('Height', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'builderrin' ),
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-logo img' => 'max-height: {{SIZE}}{{UNIT}};',
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