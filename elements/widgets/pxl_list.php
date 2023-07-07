<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_list',
        'title' => esc_html__('Lists BR', 'builderrin' ),
        'icon' => 'eicon-editor-list-ul',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__( 'Content', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'list_style',
                            'label' => esc_html__('List Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style1',
                                'style2' => 'Style2',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Enter your title', 'builderrin' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'list',
                            'label' => esc_html__('List', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Item Link', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ content }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style',
                    'label' => esc_html__('Style', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_title_color',
                            'label' => esc_html__( 'Title Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-list .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-list .pxl-item--title',
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
                            'default' => 'h3',
                        ),
                        array(
                            'name' => 'title_spacing',
                            'label' => esc_html__('Title Space (px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-list .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Content Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-list--content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_content_color',
                            'label' => esc_html__('Content Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-list .pxl-list--content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography',
                            'label' => esc_html__('Content Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-list .pxl-list--content',
                        ),
                        array(
                            'name' => 'link_color',
                            'label' => esc_html__('Link Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-list--content a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_color_hover',
                            'label' => esc_html__( 'Hover Link Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-list--content a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_link_color',
                            'label' => esc_html__('Link Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-list .pxl-list--content a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_link_color_hover',
                            'label' => esc_html__('Hover Link Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-list .pxl-list--content a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_spacing',
                            'label' => esc_html__('Item Space (px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-item--list .pxl-list--content + .pxl-list--content' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-list--content:before' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'list_style' => ['style1'],
                            ],
                        ),
                        array(
                            'name' => 'darkmode_icon_color',
                            'label' => esc_html__('Icon Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-list .pxl-list--content:before' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'list_style' => ['style1'],
                            ],
                        ),
                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__('Icon Size (px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-list .pxl-list--content:before' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'list_style' => ['style1'],
                            ],
                        ),

                        array(
                            'name' => 'icon_color2',
                            'label' => esc_html__('Icon Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-list--content:before' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'list_style' => ['style2'],
                            ],
                        ),
                        array(
                            'name' => 'icon_bg_color',
                            'label' => esc_html__('Icon Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-list--content:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'list_style' => ['style2'],
                            ],
                        ),
                        array(
                            'name' => 'darkmode_icon_color2',
                            'label' => esc_html__('Icon Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-list .pxl-list--content:before' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'list_style' => ['style2'],
                            ],
                        ),
                        array(
                            'name' => 'darkmode_icon_bg_color2',
                            'label' => esc_html__('Icon Background Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-list .pxl-list--content:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'list_style' => ['style2'],
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
                                '{{WRAPPER}} .pxl-list .pxl-list--content:before' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'list_style' => ['style2'],
                            ],
                        ),
                        array(
                            'name' => 'icon_size2',
                            'label' => esc_html__('Icon Size (px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-list .pxl-list--content:before' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'list_style' => ['style2'],
                            ],
                        ),
                        array(
                            'name' => 'icon_space',
                            'label' => esc_html__('Icon Space Right (px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-list .pxl-list--content:before' => 'margin-right: {{SIZE}}{{UNIT}};',
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