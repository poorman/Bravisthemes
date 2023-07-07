<?php
$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
$pxl_menus = array(
    '' => esc_html__('Default', 'builderrin')
);
if ( is_array( $menus ) && ! empty( $menus ) ) {
    foreach ( $menus as $value ) {
        if ( is_object( $value ) && isset( $value->name, $value->slug ) ) {
            $pxl_menus[ $value->slug ] = $value->name;
        }
    }
} else {
    $pxl_menus = '';
}
pxl_add_custom_widget(
    array(
        'name' => 'pxl_menu_hidden',
        'title' => esc_html__('Menu Hidden BR', 'builderrin'),
        'icon' => 'eicon-nav-menu',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'menu',
                            'label' => esc_html__('Select Menu', 'builderrin'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => $pxl_menus,
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
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
                                '{{WRAPPER}} .pxl-nav-hidden .pxl-menu-hidden' => 'text-align: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-hidden .pxl-menu-hidden > li' => 'float: none;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_first_level',
                    'label' => esc_html__('First Level', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-hidden .pxl-menu-hidden > li > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-hidden .pxl-menu-hidden > li > a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_active',
                            'label' => esc_html__('Color Active', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-hidden .pxl-menu-hidden > li.current-menu-parent > a, {{WRAPPER}} .pxl-nav-hidden .pxl-menu-hidden > li.current_page_item > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'typography',
                            'label' => esc_html__('Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-hidden .pxl-menu-hidden > li > a',
                        ),
                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Spacer', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-hidden .pxl-menu-hidden > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_style',
                            'label' => esc_html__('Icon Position', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon-middle' => 'Midtle',
                                'icon-top' => 'Top',
                            ],
                            'default' => 'icon-middle',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_sub_level',
                    'label' => esc_html__('Sub Level', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'sub_color',
                            'label' => esc_html__('Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-hidden li.pxl-megamenu, {{WRAPPER}} .pxl-nav-hidden .pxl-menu-hidden li .sub-menu li > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_color_hover',
                            'label' => esc_html__('Color Hover/Actvie', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-hidden .pxl-menu-hidden li .sub-menu li:hover > a, {{WRAPPER}} .pxl-nav-hidden .pxl-menu-hidden li .sub-menu li.current_page_item > a, {{WRAPPER}} .pxl-nav-hidden .pxl-menu-hidden li .sub-menu li.current-menu-item > a, {{WRAPPER}} .pxl-nav-hidden .pxl-menu-hidden li .sub-menu li.current_page_ancestor > a, {{WRAPPER}} .pxl-nav-hidden .pxl-menu-hidden li .sub-menu li.current-menu-ancestor > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_typography',
                            'label' => esc_html__('Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-hidden .pxl-menu-hidden li .sub-menu a, {{WRAPPER}} .pxl-heading .pxl-item--title',
                        ),
                        array(
                            'name' => 'sub_item_space',
                            'label' => esc_html__('Item Spacer', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-menu-hidden .sub-menu li + li' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);