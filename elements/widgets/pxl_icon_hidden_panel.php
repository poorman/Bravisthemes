<?php
$templates_df = ['0' => esc_html__('None', 'builderrin')];
$templates = $templates_df + builderrin_get_templates_option('hidden-panel') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_hidden_panel',
        'title' => esc_html__('Hidden Panel BR', 'builderrin' ),
        'icon' => 'eicon-menu-bar',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_template',
                            'label' => esc_html__('Select Template', 'builderrin'),
                            'type' => 'select',
                            'options' => $templates,
                            'default' => 'df',
                            'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line, {{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);