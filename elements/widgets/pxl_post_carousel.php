<?php
$pt_supports = ['post','portfolio','service'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_carousel',
        'title' => esc_html__('Post Carousel BR', 'builderrin' ),
        'icon' => 'eicon-posts-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'builderrin' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'builderrin' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => builderrin_get_post_type_options($pt_supports),
                                'default'  => 'post'
                            )
                        ),
                        builderrin_get_post_carousel_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'title_section',
                    'label' => esc_html__('El Title', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title_text',
                            'label' => esc_html__('El Title', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'placeholder' => esc_html__('Enter your El title', 'builderrin' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'el_title_color',
                            'label' => esc_html__('Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel1 .container-custom .el--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'el_title_typography',
                            'label' => esc_html__('Title Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel1 .container-custom .el--title',
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('El Sub Title', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Enter your Sub title', 'builderrin' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'style_alignment',
                            'label' => esc_html__('El Alignment', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'alignment-left' => esc_html__( 'Left(Default)', 'builderrin' ),
                                'alignment-center' => esc_html__( 'Center', 'builderrin' ),
                                'alignment-right' => esc_html__( 'Right', 'builderrin' ),
                            ],
                            'default' => 'alignment-left',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_source',
                    'label' => esc_html__('Source', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'select_post_by',
                                'label'    => esc_html__( 'Select posts by', 'builderrin' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => [
                                    'term_selected' => esc_html__( 'Terms selected', 'builderrin' ),
                                    'post_selected' => esc_html__( 'Posts selected ', 'builderrin' ),
                                ],
                                'default'  => 'term_selected'
                            )
                        ),
                        builderrin_get_grid_term_by_posttype($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        builderrin_get_grid_ids_by_posttype($pt_supports, ['custom_condition' => ['select_post_by' => 'post_selected']]),
                        array(
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
                                'default' => '6',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_carousel',
                    'label' => esc_html__('Carousel', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Builderrin Animate', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => builderrin_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns XXL Devices', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'inherit',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'inherit' => 'Inherit',
                            ],
                        ),

                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'item_child_odd_padding',
                            'label' => esc_html__('Item Child (odd) Padding', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'top' => '15',
                                'right' => '15',
                                'bottom' => '15',
                                'left' => '15'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide:nth-child(odd)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'item_child_even_padding',
                            'label' => esc_html__('Item Child (even) Padding', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'top' => '15',
                                'right' => '15',
                                'bottom' => '15',
                                'left' => '15'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide:nth-child(even)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'item_prev_next_padding',
                            'label' => esc_html__('Item (Prev/Next) Padding', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'top' => '15',
                                'right' => '15',
                                'bottom' => '15',
                                'left' => '15'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide.swiper-slide-prev, {{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide.swiper-slide-next' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'post_type' => ['portfolio'],
                                'layout_portfolio' => ['portfolio-1'],
                                'center' => 'true'
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'item_visible_padding',
                            'label' => esc_html__('Item (visible) Padding', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'top' => '15',
                                'right' => '15',
                                'bottom' => '15',
                                'left' => '15'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide:not(.swiper-slide-prev, .swiper-slide-next, .swiper-slide-active)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'post_type' => ['portfolio'],
                                'layout_portfolio' => ['portfolio-1'],
                                'center' => 'true'
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'item_padding',
                            'label' => esc_html__('Item Padding', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'top' => '15',
                                'right' => '15',
                                'bottom' => '15',
                                'left' => '15'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-container' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'change_active_padding',
                            'label' => esc_html__('Change Item Active Padding', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'item_active_padding',
                            'label' => esc_html__('Item Active Padding', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'top' => '15',
                                'right' => '15',
                                'bottom' => '15',
                                'left' => '15'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide.swiper-slide-active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                            'condition' => [
                                'change_active_padding' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'progressbar',
                            'options' => [
                                'progressbar' => 'Progressbar',
                                'bullets' => 'Bullets',
                                'fraction' => 'Fraction',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'pagination_margin',
                            'label' => esc_html__('Pagination Margin (px)', 'builderrin' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'progressbar_max_width',
                            'label' => esc_html__( 'Progressbar Max Width', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-swiper-dots.pxl-swiper-pagination-progressbar' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'progressbar',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'progressbar_color',
                            'label' => esc_html__('Progressbar Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-dots.pxl-swiper-pagination-progressbar' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'progressbar',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'progressbar_fill_color',
                            'label' => esc_html__('Progressbar Fill Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-dots.pxl-swiper-pagination-progressbar .swiper-pagination-progressbar-fill' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'progressbar',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'darkmode_progressbar_color',
                            'label' => esc_html__('Progressbar Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-swiper-dots.pxl-swiper-pagination-progressbar' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'progressbar',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'darkmode_progressbar_fill_color',
                            'label' => esc_html__('Progressbar Fill Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-swiper-dots.pxl-swiper-pagination-progressbar .swiper-pagination-progressbar-fill' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'progressbar',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'bullets_color',
                            'label' => esc_html__('Bullets Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-dots .pxl-swiper-pagination-bullet:before' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-swiper-dots .pxl-swiper-pagination-bullet:after' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'bullets',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'active_bullets_color',
                            'label' => esc_html__('Bullets Color Active', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-dots .swiper-pagination-bullet-active:before' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-swiper-dots .swiper-pagination-bullet-active:after' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'bullets',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'darkmode_bullets_color',
                            'label' => esc_html__('Bullets Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-swiper-dots .pxl-swiper-pagination-bullet:before' => 'background-color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-swiper-dots .pxl-swiper-pagination-bullet:after' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'bullets',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'darkmode_active_bullets_color',
                            'label' => esc_html__('Bullets Color Active (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-swiper-dots .swiper-pagination-bullet-active:before' => 'background-color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-swiper-dots .swiper-pagination-bullet-active:after' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'bullets',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'center',
                            'label' => esc_html__('Center', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Speed', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                        array(
                            'name' => 'vertical_scroll',
                            'label' => esc_html__('Vertical Scroll', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-3']]
                                        ]
                                    ]
                                ],
                            ]
                        ),
                    ),
),
array(
    'name' => 'section_display',
    'label' => esc_html__('Display', 'builderrin' ),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array(
        array(
            'name' => 'img_size',
            'label' => esc_html__('Image Size', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
        ),
        array(
            'name' => 'img_active_height',
            'label' => esc_html__( 'Image (Active) Height', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'description' => esc_html__( 'Enter number.', 'builderrin' ),
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
            'condition' => [
                'post_type' => ['portfolio'],
                'layout_portfolio' => ['portfolio-1'],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide.swiper-slide-active .pxl-item--image img' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'img_prev_next_height',
            'label' => esc_html__( 'Image (Prev, Next) Height', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'description' => esc_html__( 'Enter number.', 'builderrin' ),
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
            'condition' => [
                'post_type' => ['portfolio'],
                'layout_portfolio' => ['portfolio-1'],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide.swiper-slide-prev .pxl-item--image img, {{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide.swiper-slide-next .pxl-item--image img' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'img_visible_height',
            'label' => esc_html__( 'Image (visible) Height', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'description' => esc_html__( 'Enter number.', 'builderrin' ),
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
            'condition' => [
                'post_type' => ['portfolio'],
                'layout_portfolio' => ['portfolio-1'],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide:not(.swiper-slide-prev, .swiper-slide-next, .swiper-slide-active) .pxl-item--image img' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'show_author',
            'label' => esc_html__('Show Author', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],                                            
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-2']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_category',
            'label' => esc_html__('Show Category', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_date',
            'label' => esc_html__('Show Date', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_list',
            'label' => esc_html__('Show List Item', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'condition' => [
                'post_type' => ['service'],
                'layout_service' => ['service-1','service-2','service-4'],
            ],
        ),
        array(
            'name' => 'show_excerpt',
            'label' => esc_html__('Show Excerpt', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-4']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'num_words',
            'label' => esc_html__('Number of Words', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 25,
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                            ['name' => 'show_excerpt', 'operator' => 'in', 'value' => ['true']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-4']],
                            ['name' => 'show_excerpt', 'operator' => 'in', 'value' => ['true']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'text_line',
            'label' => esc_html__('Text Excerpt Line', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'separator' => 'after',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                            ['name' => 'show_excerpt', 'operator' => 'in', 'value' => ['true']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-4']],
                            ['name' => 'show_excerpt', 'operator' => 'in', 'value' => ['true']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_button',
            'label' => esc_html__('Show Button Readmore', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-4']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'button_text',
            'label' => esc_html__('Button Readmore Text', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true'],
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-4']],
                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true'],
                        ]
                    ],
                ],
            ]
        ),
    ),
),
array(
    'name' => 'tab_style_general',
    'label' => esc_html__('General', 'builderrin' ),
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
            'justify' => [
                'title' => esc_html__( 'Justified', 'builderrin' ),
                'icon' => 'eicon-text-align-justify',
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .pxl-swiper-sliders' => 'text-align: {{VALUE}};',
        ],
    ),
        array(
            'name' => 'post_title_color',
            'label' => esc_html__('Title Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-sliders .pxl-item--title a' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post','service'],
            ],
        ),
        array(
            'name' => 'post_title_color_hover',
            'label' => esc_html__('Title Color Hover', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-sliders .pxl-item--title a:hover' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post','service'],
            ],
        ),
        array(
            'name' => 'darkmode_post_title_color',
            'label' => esc_html__('Title Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-swiper-sliders .pxl-item--title a' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post','service'],
            ],
        ),
        array(
            'name' => 'darkmode_post_title_color_hover',
            'label' => esc_html__('Title Color Hover (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-swiper-sliders .pxl-item--title a:hover' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post','service'],
            ],
        ),
        array(
            'name' => 'post_title_typography',
            'label' => esc_html__('Title Typography', 'builderrin' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-swiper-sliders .pxl-item--title',
        ),
        array(
            'name' => 'title_margin',
            'label' => esc_html__('Title Margin', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-sliders .pxl-item--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
            'separator' => 'after',
        ),
        array(
            'name' => 'post_excerpt_color',
            'label' => esc_html__('Excerpt Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-post-carousel .item--excerpt' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post'],
            ],
        ),
        array(
            'name' => 'darkmode_post_excerpt_color',
            'label' => esc_html__('Excerpt Color (Dark Mode)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-post-carousel .item--excerpt' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post'],
            ],
        ),
        array(
            'name' => 'excerpt_margin',
            'label' => esc_html__('Excerpt Margin', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-post-carousel .item--excerpt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
            'separator' => 'after',
            'condition' => [
                'post_type' => ['post'],
            ],
        ),
        array(
            'name' => 'box_background_color',
            'label' => esc_html__('Box
               Background Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel1 .pxl-item--holder' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['service'],
            ],
        ),
        array(
            'name' => 'dark_box_background_color',
            'label' => esc_html__('Dark Box
               Background Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '.dark-mode {{WRAPPER}} .pxl-service-carousel1 .pxl-item--holder' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['service'],
            ],
        ),
    ),
),
builderrin_cursor_opts()

),
),
),
builderrin_get_class_widget_path()
);