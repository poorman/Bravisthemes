<?php
$post_term_options = pxl_get_grid_term_options('post');
pxl_add_custom_widget(
    array(
        'name' => 'pxl_blog_list',
        'title' => esc_html__('Post List BR', 'builderrin' ),
        'icon' => 'eicon-posts-ticker',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_layout',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_blog_list/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'builderrin' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_blog_list/img-layout/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_source',
                    'label' => esc_html__('Source', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source',
                            'label' => esc_html__('Select Categories', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT2,
                            'multiple' => true,
                            'options' => $post_term_options,
                        ),
                        array(
                            'name' => 'orderby',
                            'label' => esc_html__('Order By', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'date',
                            'options' => [
                                'date' => esc_html__('Date', 'builderrin' ),
                                'ID' => esc_html__('ID', 'builderrin' ),
                                'author' => esc_html__('Author', 'builderrin' ),
                                'title' => esc_html__('Title', 'builderrin' ),
                                'rand' => esc_html__('Random', 'builderrin' ),
                            ],
                        ),
                        array(
                            'name' => 'order',
                            'label' => esc_html__('Sort Order', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'desc',
                            'options' => [
                                'desc' => esc_html__('Descending', 'builderrin' ),
                                'asc' => esc_html__('Ascending', 'builderrin' ),
                            ],
                        ),
                        array(
                            'name' => 'limit',
                            'label' => esc_html__('Total items', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => '4',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_display',
                    'label' => esc_html__('Display Options', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__( 'Image Size', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).', 'builderrin' ),
                        ),
                        array(
                            'name' => 'show_category',
                            'label' => esc_html__('Show Categories', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_date',
                            'label' => esc_html__('Show Date', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_title',
                            'label' => esc_html__('Show Title', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_excerpt',
                            'label' => esc_html__('Show Excerpt', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 25,
                            'condition' => [
                                'show_excerpt' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'text_line',
                            'label' => esc_html__('Text Excerpt Line', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'condition' => [
                                'show_excerpt' => 'true',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Read More', 'builderrin' ),
                            'condition' => [
                                'show_button' => 'true',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_title',
                    'label' => esc_html__('Style', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
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
                                '{{WRAPPER}} .pxl-blog-list' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'img_margin',
                            'label' => esc_html__('Image Margin (px)', 'builderrin' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-blog-list .pxl-item--image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_margin',
                            'label' => esc_html__('Content Margin (px)', 'builderrin' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-blog-list .pxl-item--body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-blog-list .item--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_title_color',
                            'label' => esc_html__( 'Title Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-blog-list .item--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-blog-list .item--title',
                        ),
                        array(
                            'name' => 'title_bottom_spacer',
                            'label' => esc_html__('Title Bottom Spacer (Px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-blog-list .item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
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
                                '{{WRAPPER}} .pxl-blog-list .item--title' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'excerpt_bottom_spacer',
                            'label' => esc_html__('Excerpt Bottom Spacer (Px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-blog-list .item--excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'button_top_spacer',
                            'label' => esc_html__('Button Top Spacer (Px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-blog-list .pxl-btn-line' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'list_bottom_spacer',
                            'label' => esc_html__('List Spacer (Px)', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-blog-list .pxl-grid-item + .pxl-grid-item' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-blog-list .pxl-grid-item:before' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color',
                            'label' => esc_html__('Border Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-blog-list .pxl-grid-item:before' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => '2',
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