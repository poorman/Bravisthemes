<?php
$templates = builderrin_get_templates_option('tab', []) ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_tabs',
        'title' => esc_html__( 'Tabs BR', 'builderrin' ),
        'icon' => 'eicon-tabs',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'builderrin-tabs'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__( 'Tabs', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'tab_active',
                            'label' => esc_html__( 'Active Tab', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'tabs',
                            'label' => esc_html__( 'Content', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__( 'Title', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'notification',
                                    'label' => esc_html__( 'Notification', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'content_type',
                                    'label' => esc_html__('Content Type', 'builderrin'),
                                    'type' => 'select',
                                    'options' => [
                                        'df' => esc_html__( 'Default', 'builderrin' ),
                                        'template' => esc_html__( 'From Template Builder', 'builderrin' )
                                    ],
                                    'default' => 'df' 
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__( 'Content', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                                    'condition' => ['content_type' => 'df'] 
                                ),
                                array(
                                    'name' => 'content_template',
                                    'label' => esc_html__('Select Templates', 'builderrin'),
                                    'type' => 'select',
                                    'options' => $templates,
                                    'default' => 'df',
                                    'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                                    'condition' => ['content_type' => 'template'] 
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style',
                    'label' => esc_html__( 'Style', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style-button-set' => 'Button Set',
                                'style-button-radio' => 'Button Radio',
                                'style-line-top' => 'Line Top',
                            ],
                            'default' => 'style-default',
                        ),
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
                                '{{WRAPPER}} .pxl-tabs--title' => 'text-align: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => 'style-default'
                            ]
                        ),
                        array(
                            'name' => 'dost_active_color',
                            'label' => esc_html__('Dosted Active Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs1.style-button-radio .pxl-tabs--title .pxl-item--tab-title.active::after' => 'background-color: {{VALUE}} !important; background-image: none;',
                                '{{WRAPPER}} .pxl-tabs1.style-button-radio .pxl-tabs--title .pxl-item--tab-title.active::before' => 'background-color: {{VALUE}} !important; background-image: none;',
                            ],
                        ),
                        array(
                            'name' => 'wrapper_min_height',
                            'label' => esc_html__('Wrapper Min Height', 'builderrin' ),
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
                                '{{WRAPPER}} .pxl-tabs1 .pxl-tabs--content' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'tab_effect',
                            'label' => esc_html__('Effect', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'tab-effect-slide' => 'Slide',
                                'tab-effect-fade' => 'Fade',
                            ],
                            'default' => 'tab-effect-slide',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .pxl-item--tab-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_active_color',
                            'label' => esc_html__('Title Active Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .pxl-item--tab-title.active' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-tabs .pxl-item--tab-title:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-tabs .pxl-item--tab-title',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Content Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .pxl-item--content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography',
                            'label' => esc_html__('Content Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-tabs .pxl-item--content',
                        ),
                    ),
                ),
                builderrin_widget_animation_settings(),
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);