<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );
pxl_add_custom_widget(
    array(
        'name' => 'pxl_team_carousel',
        'title' => esc_html__('Team Carousel BR', 'builderrin'),
        'icon' => 'eicon-person',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper'
        ),
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_team_carousel/img-layout/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'team',
                            'label' => esc_html__('Content', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => '1',
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Name', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'social',
                                    'label' => esc_html__( 'Social', 'builderrin' ),
                                    'type' => 'pxl_icons',
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
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
                                '{{WRAPPER}} .pxl-team .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team .pxl-item--title',
                        ),
                        array(
                            'name' => 'position_color',
                            'label' => esc_html__('Position Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'position_typography',
                            'label' => esc_html__('Position Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team .pxl-item--position',
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Box Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--meta:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_min_width',
                            'label' => esc_html__('Box Min Width', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-team .pxl-item--meta' => 'min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'icon_size',
                            'label' => esc_html__( 'Icon Size (px)', 'builderrin' ),
                            'type'  => 'slider',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--social a' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--social a i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_background_color',
                            'label' => esc_html__('Icon Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--social a' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_hover',
                    'label' => esc_html__('Style Hover', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Hover Image Effect', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-circle' => 'Circle',
                                'style-overlay' => 'Overlay',
                                'none' => 'None',
                            ],
                            'default' => 'style-overlay',
                        ),
                        array(
                            'name' => 'title_color_hv',
                            'label' => esc_html__('Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--inner:hover .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'position_color_hv',
                            'label' => esc_html__('Position Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--inner:hover .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__('Icon Color Hover', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--social a:hover i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_background_color_hover',
                            'label' => esc_html__('Icon Background Color Hover', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--social a span:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_carousel_settings',
                    'label' => esc_html__('Carousel Settings', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
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
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'builderrin' ),
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
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
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
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'fraction' => 'Fraction',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
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
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                    ),
                ),
                builderrin_widget_animation_settings(),
                builderrin_cursor_opts()                
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);