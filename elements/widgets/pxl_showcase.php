<?php
// Register Video Player Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_showcase',
        'title' => esc_html__('Showcase BR', 'builderrin' ),
        'icon' => 'eicon-image',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_showcase/img-layout/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Content', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Image', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'darkmode_image',
                            'label' => esc_html__('Image (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'btn_text1',
                            'label' => esc_html__('Button Text 1', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'link1',
                            'label' => esc_html__('Link 1', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'builderrin' ),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'btn_text2',
                            'label' => esc_html__('Button Text 2', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'link2',
                            'label' => esc_html__('Link 2', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'builderrin' ),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'description' => 'Create highlight text width shortcode: [highlight text="Text Demo"]',
                        ),
                        array(
                            'name' => 'title_link',
                            'label' => esc_html__('Title Link', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'builderrin' ),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'notification',
                            'label' => esc_html__('Show Notification', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'notification_label',
                            'label' => esc_html__('Notification Text', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'notification' => 'true',
                            ],
                        ),
                        array(
                            'name'         => 'active',
                            'label'        => esc_html__( 'Active', 'builderrin' ),
                            'type'         => 'choose',
                            'control_type' => 'responsive',
                            'options' => [
                                'active' => [
                                    'title' => esc_html__( 'Active', 'builderrin' ),
                                    'icon' => 'eicon-plus',
                                ],
                                'inactive' => [
                                    'title' => esc_html__( 'Inactive', 'builderrin' ),
                                    'icon' => 'eicon-editor-close',
                                ],
                            ],
                            'default' => 'active',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap' => 'justify-content: {{VALUE}};',
                            ],
                            'prefix_class' => 'pxl-showcase-'
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'scroll_effect',
                            'label' => esc_html__('Scroll Effect', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__( 'Image Size', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).', 'builderrin' ),
                        ),
                        array(
                            'name' => 'img_height',
                            'label' => esc_html__( 'Image Height (px)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .item--image' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'img_margin',
                            'label' => esc_html__('Image Margin (px)', 'builderrin' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .pxl-item--image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'button_color',
                            'label' => esc_html__('Button Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .item--link' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_button_color',
                            'label' => esc_html__('Button Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-showcase .item--link' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_bg_color',
                            'label' => esc_html__('Button Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .item--link' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_button_bg_color',
                            'label' => esc_html__( 'Button Background Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-showcase .item--link' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_typography',
                            'label' => esc_html__('Button Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .item--link',
                        ),
                        array(
                            'name' => 'button_min_width',
                            'label' => esc_html__('Button Min Width (px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-showcase .item--link' => 'min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'button_space',
                            'label' => esc_html__('Button Space (px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-showcase .item--link + .item--link' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'noti_color',
                            'label' => esc_html__('Notification Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .notification' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'notification' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_noti_color',
                            'label' => esc_html__('Notification Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-showcase .notification' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'notification' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'noti_bg_color',
                            'label' => esc_html__('Notification Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .notification' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'notification' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_noti_bg_color',
                            'label' => esc_html__( 'Notification Background Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-showcase .notification' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'notification' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'noti_typography',
                            'label' => esc_html__('Notification Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .notification',
                            'condition' => [
                                'notification' => 'true',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_title_color',
                            'label' => esc_html__( 'Title Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-showcase .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_color',
                            'label' => esc_html__( 'Link Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .pxl-item--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_link_color',
                            'label' => esc_html__( 'Link Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-showcase .pxl-item--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'hover_title_color',
                            'label' => esc_html__( 'Hover Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .pxl-item--title a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_hover_title_color',
                            'label' => esc_html__( 'Hover Title Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-showcase .pxl-item--title a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .pxl-item--title',
                        ),
                    ),
                ),
                builderrin_widget_animation_settings()
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);