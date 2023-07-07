<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );
$templates = builderrin_get_templates_option('slider', []) ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_slider',
        'title' => esc_html__('BR Slider', 'builderrin'),
        'icon' => 'eicon-slider-device',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'slides',
                            'label' => esc_html__('Slides', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'slide_template',
                                    'label' => esc_html__('Select Template', 'builderrin'),
                                    'type' => 'select',
                                    'options' => $templates,
                                    'default' => 'df',
                                    'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                                ),
                                array(
                                    'name' => 'bg_color',
                                    'label' => esc_html__('Background Color', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-element-slider {{CURRENT_ITEM}}' => 'background-color: {{VALUE}};',
                                    ],
                                ),
                                array(
                                    'name' => 'bg_image',
                                    'label' => esc_html__('Background Image', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name'         => 'slide_effect',
                                    'label'        => esc_html__('Transition', 'builderrin'),
                                    'type'         => 'select',
                                    'options'      => [
                                        'slide'     => esc_html__('Slide', 'builderrin'),
                                        'fade'      => esc_html__('Fade','builderrin'),
                                        'cube'      => esc_html__('Cube','builderrin'),
                                        'coverflow' => esc_html__('Coverflow','builderrin'),
                                        'flip'      => esc_html__('Flip','builderrin'),
                                        'creative'  => esc_html__('Creative','builderrin'),
                                        'cards'     => esc_html__('Cards','builderrin'),
                                    ], 
                                    'default'      => 'slide', 
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'section_settings_carousel',
                    'label' => esc_html__('Settings', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
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
                        array(
                            'name' => 'drap',
                            'label' => esc_html__('Show Scroll Drap', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                    ),
                ),
            ),
),
),
builderrin_get_class_widget_path()
);