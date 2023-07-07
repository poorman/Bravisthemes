<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pricing',
        'title' => esc_html__('Pricing BR', 'builderrin'),
        'icon' => 'eicon-settings',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_pricing/img-layout/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'price',
                            'label' => esc_html__('Price', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'pric_after',
                            'label' => esc_html__('Price After', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'pric_day',
                            'label' => esc_html__('Price Day', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'currency',
                            'label' => esc_html__('Currency unit', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'feature',
                            'label' => esc_html__('Feature', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'feature_text',
                                    'label' => esc_html__('Text', 'builderrin'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'active',
                                    'label' => esc_html__('Active', 'builderrin' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'non-active' => 'No',
                                        'is-active' => 'Yes',
                                    ],
                                    'default' => 'is-active',
                                ),
                            ),
                            'title_field' => '{{{ feature_text }}}',
                        ),
                        array(
                            'name' => 'feature_image',
                            'label' => esc_html__( 'Feature Image', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'box_active',
                            'label' => esc_html__('Active', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'no-active' => 'No',
                                'is-active' => 'Yes',
                            ],
                            'default' => 'no-active',
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'default' => 'Get started',
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
),
array(
    'name' => 'section_title_style',
    'label' => esc_html__('Title Style', 'builderrin' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--title, {{WRAPPER}} .pxl-pricing .pxl-item--title span' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'builderrin' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--title',
        ),
    ),
),

array(
    'name' => 'section_feature_style',
    'label' => esc_html__('List Infor Style', 'builderrin' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'feature_color',
            'label' => esc_html__('Feature Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--feature li' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'feature_typography',
            'label' => esc_html__('Feature Typography', 'builderrin' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--feature li',
        ),

    ),
),
array(
    'name' => 'section_price_style',
    'label' => esc_html__('Price Style', 'builderrin' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'price_color',
            'label' => esc_html__('Price Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--price' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'price_typography',
            'label' => esc_html__('Price Typography', 'builderrin' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--price',
        ),
    ),
),
array(
    'name' => 'section_popular_style',
    'label' => esc_html__('Feature Style', 'builderrin' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'popular_color',
            'label' => esc_html__('Popular Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--popular span' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'popular_bg_color',
            'label' => esc_html__('Popular Box Color', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--popular span' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'popular_typography',
            'label' => esc_html__('Popular Typography', 'builderrin' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--popular span',
        ),
    ),
),
builderrin_widget_animation_settings()
),
),
),
builderrin_get_class_widget_path()
);