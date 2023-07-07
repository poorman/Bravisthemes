<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_accordion',
        'title' => esc_html__('Accordion BR', 'builderrin' ),
        'icon' => 'eicon-accordion',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'builderrin-accordion',
            'pxl-accordion',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                            'name' => 'active',
                            'label' => esc_html__('Active', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                            'default' => '1',
                        ),
                        array(
                            'name' => 'accordion',
                            'label' => esc_html__('Accordion', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__('Content', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                            'separator' => 'after',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color_active',
                            'label' => esc_html__('Color Active', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_title_color',
                            'label' => esc_html__('Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-accordion .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_title_color_active',
                            'label' => esc_html__('Color Active (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-item--title',
                        ),
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('HTML Tag', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
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
                            'default' => 'h6',
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl--item' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_bg_color',
                            'label' => esc_html__('Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-item--title' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_active_bg_color',
                            'label' => esc_html__('Active Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-item--title' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color',
                            'label' => esc_html__('Border Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-accordion .pxl--item' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_title_bg_color',
                            'label' => esc_html__('Background Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-accordion .pxl-item--title' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_title_active_bg_color',
                            'label' => esc_html__('Active Background Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-item--title' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_margin',
                            'label' => esc_html__('Margin', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-item--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'box_min_height',
                            'label' => esc_html__('Box Min Height (px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-accordion' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_content',
                    'label' => esc_html__('Content', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-item--content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_content_color',
                            'label' => esc_html__('Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-accordion .pxl-item--content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-item--content',
                        ),
                        array(
                            'name' => 'content_padding',
                            'label' => esc_html__('Padding', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-item--content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                builderrin_widget_animation_settings(),
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);