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
        'name' => 'pxl_menu',
        'title' => esc_html__('Nav Menu BR', 'builderrin'),
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
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary' => 'text-align: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li' => 'float: none;',
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
                            'name' => 'menu_style',
                            'label' => esc_html__('Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'menu-default',
                            'options' => [
                                'menu-default' => esc_html__('Default', 'builderrin' ),
                                'menu-style2' => esc_html__('Style 2', 'builderrin' ),
                            ],
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_active',
                            'label' => esc_html__('Color Active', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-parent > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_item > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.menu-item-has-children > a .caseicon-angle-arrow-down' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li a' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_color',
                            'label' => esc_html__('Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'darkmode_color_hover',
                            'label' => esc_html__('Color Hover (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_color_active',
                            'label' => esc_html__('Color Active (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-parent > a, .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_item > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_icon_color',
                            'label' => esc_html__('Icon Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.menu-item-has-children > a .caseicon-angle-arrow-down' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color',
                            'label' => esc_html__('Border Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li a' => 'border-color: {{VALUE}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'typography',
                            'label' => esc_html__('Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a',
                        ),
                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Spacer', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_sub_level',
                    'label' => esc_html__('Sub Level', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'hover_effects',
                            'label' => esc_html__('Hover Effects', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'menu-fade',
                            'options' => [
                                'menu-fade' => esc_html__('Fade', 'builderrin' ),
                                'menu-scale' => esc_html__('Scale', 'builderrin' ),
                                'menu-translate' => esc_html__('Translate Y', 'builderrin' ),
                            ],
                            'prefix_class' => 'nav-menu-effect '
                        ),
                        array(
                            'name' => 'sub_color',
                            'label' => esc_html__('Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu li.pxl-megamenu, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_color_hover',
                            'label' => esc_html__('Color Hover/Actvie', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li:hover > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_item > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-item > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_ancestor > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-ancestor > a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu li a:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_bg_color',
                            'label' => esc_html__('Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu:not(.pxl-mega-menu), {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .children' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_border_color',
                            'label' => esc_html__('Border Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .children' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_item_border_color',
                            'label' => esc_html__('Item Border Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu li:not(:last-child), {{WRAPPER}} .pxl-nav-menu.pxl-menu-primary .children li:not(:last-child)' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_sub_color',
                            'label' => esc_html__('Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu li.pxl-megamenu, .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li > a' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'darkmode_sub_color_hover',
                            'label' => esc_html__('Color Hover/Actvie (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li:hover > a, .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_item > a, .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-item > a, .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_ancestor > a, .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-ancestor > a' => 'color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu li a:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_sub_bg_color',
                            'label' => esc_html__('Background Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu:not(.pxl-mega-menu), .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .children' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_sub_border_color',
                            'label' => esc_html__('Border Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu, .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .children' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_sub_item_border_color',
                            'label' => esc_html__('Item Border Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu li:not(:last-child), .dark-mode {{WRAPPER}} .pxl-nav-menu.pxl-menu-primary .children li:not(:last-child)' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_typography',
                            'label' => esc_html__('Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu a, {{WRAPPER}} .pxl-heading .pxl-item--title',
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
                                '{{WRAPPER}} .pxl-menu-primary .sub-menu li + li' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);