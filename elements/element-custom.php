<?php 
/* Page Setting */
add_action( 'elementor/documents/register_controls', 'builderrin_elementor_page_settings_controls');
function builderrin_elementor_page_settings_controls($document){
    $document->start_controls_section(
        'document_settings_pxl',
        [
            'label' => esc_html__( 'Builderrin Settings', 'builderrin' ),
            'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
        ]
    );
    $document->add_responsive_control(
        'pxl_page_content_width',
        [
            'label' => esc_html__( 'Content Width (px)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 320,
                    'max' => 1920
                ]
            ],
            'selectors' => [
                '.elementor-section.elementor-section-boxed > .elementor-container, {{WRAPPER}} .container, {{WRAPPER}} .container-xl' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $document->end_controls_section();
}

/* Section Params */
add_action( 'elementor/element/section/section_structure/after_section_end', 'builderrin_add_custom_section_controls' ); 

function builderrin_add_custom_section_controls( \Elementor\Element_Base $element) {

	$element->start_controls_section(
		'section_pxl',
		[
			'label' => esc_html__( 'Builderrin Settings', 'builderrin' ),
			'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);
    if ( get_post_type( get_the_ID()) === 'pxl-template' && get_post_meta( get_the_ID(), 'template_type', true ) === 'header') {

        $element->add_control(
            'pxl_header_type',
            [
                'label' => esc_html__( 'Header Type', 'builderrin' ),
                'type'  => \Elementor\Controls_Manager::SELECT,
                'hide_in_inner' => true,
                'options'      => array(
                    ''          => esc_html__( 'Select Type', 'builderrin' ),
                    'main-sticky'       => esc_html__( 'Header Main & Sticky', 'builderrin' ),
                    'sticky'      => esc_html__( 'Header Sticky', 'builderrin' ),
                    'transparent' => esc_html__( 'Header Transparent', 'builderrin' ),
                ),
                'default'      => '',
            ]
        );
    }
    if ( get_post_type( get_the_ID()) === 'pxl-template' && get_post_meta( get_the_ID(), 'template_type', true ) === 'header-mobile') {
        $element->add_control(
            'pxl_header_mobile_type',
            [
                'label' => esc_html__( 'Header Type', 'builderrin' ),
                'type'  => \Elementor\Controls_Manager::SELECT,
                'hide_in_inner' => true,
                'options'      => array(
                    ''          => esc_html__( 'Select Type', 'builderrin' ),
                    'main-sticky'       => esc_html__( 'Main & Sticky', 'builderrin' ),
                    'sticky'      => esc_html__( 'Sticky', 'builderrin' ),
                    'transparent' => esc_html__( 'Transparent', 'builderrin' ),
                ),
                'default'      => '',
            ]
        );

    }

    $element->add_responsive_control(
        'pxl_section_flex_direction',
        [
            'label' => esc_html__( 'Flex Direction', 'builderrin' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''    => esc_html__( 'None', 'builderrin' ),
                'row'   => esc_html__( 'Row', 'builderrin' ),
                'column'     => esc_html__( 'Column', 'builderrin' ),
            ),
            'default'      => '',
            'selectors' => array(
                '{{WRAPPER}} .elementor-container' => 'flex-direction: {{VALUE}}',
            ),
        ]
    );
    $element->add_control(
      'pxl_section_offset',
      [
       'label' => esc_html__( 'Section Offset', 'builderrin' ),
       'type'         => \Elementor\Controls_Manager::SELECT,
       'prefix_class' => 'pxl-section-offset-',
       'hide_in_inner' => true,
       'options'      => array(
        'none'    => esc_html__( 'None', 'builderrin' ),
        'left'   => esc_html__( 'Left', 'builderrin' ),
        'right'     => esc_html__( 'Right', 'builderrin' ),
    ),
       'default'      => 'none',
       'condition' => [
        'layout' => 'full_width'
    ]
]
);

    $element->add_control(
      'pxl_container_width',
      [
        'label' => esc_html__( 'Container Width', 'builderrin' ),
        'type'         => \Elementor\Controls_Manager::SELECT,
        'prefix_class' => 'pxl-container-width-',
        'hide_in_inner' => true,
        'options'      => array(
            'container-1200'    => esc_html__( '1200px', 'builderrin' )
        ),
        'default'      => 'container-1200',
        'condition' => [
            'layout' => 'full_width',
            'pxl_section_offset!' => 'none'
        ]        
    ]
);
    
    $element->add_responsive_control(
        'column_hori_align',
        [
            'label'   => esc_html__( 'Horizontal Align', 'builderrin' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                ''        => esc_html__( 'Default', 'builderrin' ),
                'flex-start'   => esc_html__( 'Start', 'builderrin' ),
                'center'  => esc_html__( 'Center', 'builderrin' ),
                'flex-end'     => esc_html__( 'End', 'builderrin' ),
                'space-around'  => esc_html__( 'Space Around', 'builderrin' ),
                'space-between' => esc_html__( 'Space Between', 'builderrin' )
            ),
            'selectors' => [
                '{{WRAPPER}} > div' => 'justify-content: {{VALUE}};',
            ],
            'default'      => '',       
        ]
    );
    
    $element->add_control(
        'pxl_parallax_bg_img',
        [
            'label' => esc_html__( 'Parallax Background Image', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'hide_in_inner' => true,
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-image: url( {{URL}} );',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_bg_position',
        [
            'label' => esc_html__( 'Background Position', 'builderrin' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'builderrin' ),
                'center center' => esc_html__( 'Center Center', 'builderrin' ),
                'center left'   => esc_html__( 'Center Left', 'builderrin' ),
                'center right'  => esc_html__( 'Center Right', 'builderrin' ),
                'top center'    => esc_html__( 'Top Center', 'builderrin' ),
                'top left'      => esc_html__( 'Top Left', 'builderrin' ),
                'top right'     => esc_html__( 'Top Right', 'builderrin' ),
                'bottom center' => esc_html__( 'Bottom Center', 'builderrin' ),
                'bottom left'   => esc_html__( 'Bottom Left', 'builderrin' ),
                'bottom right'  => esc_html__( 'Bottom Right', 'builderrin' ),
                'initial'       =>  esc_html__( 'Custom', 'builderrin' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-position: {{VALUE}};',
            ],
            'condition' => [
                'pxl_parallax_bg_img[url]!' => ''
            ]        
        ]
    );

    $element->add_responsive_control(
        'pxl_parallax_bg_pos_custom_x',
        [
            'label' => esc_html__( 'X Position', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-position: {{SIZE}}{{UNIT}} {{pxl_parallax_bg_pos_custom_y.SIZE}}{{pxl_parallax_bg_pos_custom_y.UNIT}}',
            ],
            'condition' => [
                'pxl_parallax_bg_position' => [ 'initial' ],
                'pxl_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_bg_pos_custom_y',
        [
            'label' => esc_html__( 'Y Position', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-position: {{pxl_parallax_bg_pos_custom_x.SIZE}}{{pxl_parallax_bg_pos_custom_x.UNIT}} {{SIZE}}{{UNIT}}',
            ],

            'condition' => [
                'pxl_parallax_bg_position' => [ 'initial' ],
                'pxl_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_bg_size',
        [
            'label' => esc_html__( 'Background Size', 'builderrin' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'builderrin' ),
                'auto' => esc_html__( 'Auto', 'builderrin' ),
                'cover'   => esc_html__( 'Cover', 'builderrin' ),
                'contain'  => esc_html__( 'Contain', 'builderrin' ),
                'initial'    => esc_html__( 'Custom', 'builderrin' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-size: {{VALUE}};',
            ],
            'condition' => [
                'pxl_parallax_bg_img[url]!' => ''
            ]        
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_bg_size_custom',
        [
            'label' => esc_html__( 'Background Width', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'size' => 100,
                'unit' => '%',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-size: {{SIZE}}{{UNIT}} auto',
            ],
            'condition' => [
                'pxl_parallax_bg_size' => [ 'initial' ],
                'pxl_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_control(
        'pxl_parallax_pos_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Position', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'builderrin' ),
            'label_on' => esc_html__( 'Custom', 'builderrin' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
    $element->add_responsive_control(
        'pxl_parallax_pos_left',
        [
            'label' => esc_html__( 'Left', 'builderrin' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'left: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_pos_top',
        [
            'label' => esc_html__( 'Top', 'builderrin' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'top: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    ); 
    $element->add_responsive_control(
        'pxl_parallax_pos_right',
        [
            'label' => esc_html__( 'Right', 'builderrin' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'right: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_pos_bottom',
        [
            'label' => esc_html__( 'Bottom', 'builderrin' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'bottom: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    ); 
    $element->end_popover();

    $element->add_control(
        'pxl_parallax_effect_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Effect', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'builderrin' ),
            'label_on' => esc_html__( 'Custom', 'builderrin' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
    $element->add_control(
        'pxl_parallax_bg_img_effect_x',
        [
            'label' => esc_html__( 'TranslateX', 'builderrin' ).' (-80)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_y',
        [
            'label' => esc_html__( 'TranslateY', 'builderrin' ).' (-80)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_z',
        [
            'label' => esc_html__( 'TranslateZ', 'builderrin' ).' (-80)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_rotate_x',
        [
            'label' => esc_html__( 'Rotate X', 'builderrin' ).' (30)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_rotate_y',
        [
            'label' => esc_html__( 'Rotate Y', 'builderrin' ).' (30)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_rotate_z',
        [
            'label' => esc_html__( 'Rotate Z', 'builderrin' ).' (30)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_scale_x',
        [
            'label' => esc_html__( 'Scale X', 'builderrin' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    ); 
    $element->add_control(
        'pxl_parallax_bg_img_effect_scale_y',
        [
            'label' => esc_html__( 'Scale Y', 'builderrin' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_scale_z',
        [
            'label' => esc_html__( 'Scale Z', 'builderrin' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_scale',
        [
            'label' => esc_html__( 'Scale', 'builderrin' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_from_scroll_custom',
        [
            'label' => esc_html__( 'Scroll From (px)', 'builderrin' ).' (350) from offset top',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->end_popover(); 
    $element->add_group_control(
        \Elementor\Group_Control_Css_Filter::get_type(),
        [
            'name'      => 'pxl_section_parallax_img_css_filter',
            'selector' => '{{WRAPPER}} .pxl-section-bg-parallax',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_section_parallax_opacity',
        [
            'label'      => esc_html__( 'Parallax Opacity (0 - 100)', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ '%' ],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ]
            ],
            'default'    => [
                'unit' => '%'
            ],
            'laptop_default' => [
                'unit' => '%',
            ],
            'tablet_extra_default' => [
                'unit' => '%',
            ],
            'tablet_default' => [
                'unit' => '%',
            ],
            'mobile_extra_default' => [
                'unit' => '%',
            ],
            'mobile_default' => [
                'unit' => '%',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'opacity: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_section_line_left',
        [
            'label' => esc_html__('Show Line Left', 'builderrin'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'builderrin' ),
            'label_off' => esc_html__( 'Hide', 'builderrin' ),
            'return_value' => 'yes',
            'default' => 'no',
            'separator' => 'before',
            'hide_in_inner' => true,
            'prefix_class' => 'pxl-section-line-left-'
        ]
    );
    $element->add_control(
        'pxl_section_line_left_color',
        [
            'label' => esc_html__('Line Left Color', 'builderrin'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '.pxl-section-line-left-yes .elementor-container:before' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'pxl_section_line_left' => 'yes',
            ],
        ]
    );
    $element->add_control(
        'pxl_section_line_right',
        [
            'label' => esc_html__('Show Line Right', 'builderrin'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'builderrin' ),
            'label_off' => esc_html__( 'Hide', 'builderrin' ),
            'return_value' => 'yes',
            'default' => 'no',
            'hide_in_inner' => true,
            'prefix_class' => 'pxl-section-line-right-'
        ]
    );
    $element->add_control(
        'pxl_section_line_right_color',
        [
            'label' => esc_html__('Line Right Color', 'builderrin'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '.pxl-section-line-right-yes .elementor-container:after' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'pxl_section_line_right' => 'yes',
            ],

        ]
    );

    $element->add_control(
        'pxl_section_static_position',
        [
            'label' => esc_html__('Static Position', 'builderrin'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'builderrin' ),
            'label_off' => esc_html__( 'No', 'builderrin' ),
            'return_value' => 'yes',
            'default' => 'no',
            'separator' => 'before',
            'prefix_class' => 'pxl-section-static-pos-'
        ]
    );
    $element->add_control(
        'pxl_section_overflow_hidden',
        [
            'label' => esc_html__('Overflow Hidden', 'builderrin'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'builderrin' ),
            'label_off' => esc_html__( 'No', 'builderrin' ),
            'return_value' => 'yes',
            'default' => 'no',
            'separator' => 'after',
            'prefix_class' => 'pxl-section-overflow-hidden-'
        ]
    );

    $element->add_control(
        'pxl_section_container_margin_left',
        [
            'label' => esc_html__('Container Margin Left', 'builderrin'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'hide_in_inner' => true,
            'selectors' => [
                '{{WRAPPER}} .elementor-container' => 'margin-left: {{SIZE}}{{UNIT}} !important;',
            ],
        ]
    );  
    $element->end_controls_section();
};

/* Columns Params*/
add_action( 'elementor/element/column/layout/after_section_end', 'builderrin_add_custom_columns_controls' ); 
function builderrin_add_custom_columns_controls( \Elementor\Element_Base $element) {
	$element->start_controls_section(
		'columns_pxl',
		[
			'label' => esc_html__( 'Builderrin Settings', 'builderrin' ),
			'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);
    $element->add_control(
        'col_offset',
        [
            'label'   => esc_html__( 'Column Offset', 'builderrin' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'           => esc_html__( 'No', 'builderrin' ),
                'left' => esc_html__( 'Left', 'builderrin' ),
                'right' => esc_html__( 'Right', 'builderrin' ),
            ),
            'default' => 'none',
            'prefix_class' => 'col-offset-'
        ]
    );
    $element->add_responsive_control(
      'pxl_col_auto',
      [
        'label'   => esc_html__( 'Element Auto Width', 'builderrin' ),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'options' => array(
            'default'           => esc_html__( 'Default', 'builderrin' ),
            'auto'   => esc_html__( 'Auto', 'builderrin' ),
            'grow'   => esc_html__( 'Grow', 'builderrin' ),
            'full'   => esc_html__( 'Full', 'builderrin' ),
        ),
        'control_type' => 'responsive',
        'label_block'  => true, 
        'default'      => 'default',
        'prefix_class' => 'pxl-column-element%s-'
    ]
);
    $element->add_control(
        'pxl_border_animated',
        [
            'label' => esc_html__('Border Animated', 'builderrin'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'builderrin' ),
            'label_off' => esc_html__( 'No', 'builderrin' ),
            'return_value' => 'yes',
            'default' => 'no',
            //'prefix_class' => 'pxl-border-anm-'
        ]
    ); 
    $element->add_control(
        'pxl_column_parallax',
        [
            'label' => esc_html__( 'Parallax Type', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                ''        => esc_html__( 'None', 'builderrin' ),
                'y'       => esc_html__( 'Transform Y', 'builderrin' ),
                'x'       => esc_html__( 'Transform X', 'builderrin' ),
                'z'       => esc_html__( 'Transform Z', 'builderrin' ),
                'rotateX' => esc_html__( 'RotateX', 'builderrin' ),
                'rotateY' => esc_html__( 'RotateY', 'builderrin' ),
                'rotateZ' => esc_html__( 'RotateZ', 'builderrin' ),
                'scaleX'  => esc_html__( 'ScaleX', 'builderrin' ),
                'scaleY'  => esc_html__( 'ScaleY', 'builderrin' ),
                'scaleZ'  => esc_html__( 'ScaleZ', 'builderrin' ),
                'scale'   => esc_html__( 'Scale', 'builderrin' ),
            ],
        ]
    ); 
    $element->add_control(
        'pxl_column_parallax_value',
        [
            'name' => 'parallax_value',
            'label' => esc_html__('Value', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'condition' => [ 'pxl_column_parallax!' => '']  
        ]
    ); 
    $element->add_responsive_control(
        'pxl_parallax_screen',
        [
            'label'   => esc_html__( 'Parallax In Screen', 'builderrin' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '',
            'options' => array(
                '' => esc_html__( 'Default', 'builderrin' ),
                'no'   => esc_html__( 'No', 'builderrin' ),
            ),
            'prefix_class' => 'pxl-parallax%s-',
            'condition' => [ 'pxl_column_parallax!' => '']  
        ]
    );
    $element->add_control(
        'pxl_parallax_col_bg_img',
        [
            'label' => esc_html__( 'Parallax Background Image', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            //'hide_in_inner' => true,
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-image: url( {{URL}} );',
            ],
            'separator' => 'before',
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_col_bg_position',
        [
            'label' => esc_html__( 'Background Position', 'builderrin' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            //'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'builderrin' ),
                'center center' => esc_html__( 'Center Center', 'builderrin' ),
                'center left'   => esc_html__( 'Center Left', 'builderrin' ),
                'center right'  => esc_html__( 'Center Right', 'builderrin' ),
                'top center'    => esc_html__( 'Top Center', 'builderrin' ),
                'top left'      => esc_html__( 'Top Left', 'builderrin' ),
                'top right'     => esc_html__( 'Top Right', 'builderrin' ),
                'bottom center' => esc_html__( 'Bottom Center', 'builderrin' ),
                'bottom left'   => esc_html__( 'Bottom Left', 'builderrin' ),
                'bottom right'  => esc_html__( 'Bottom Right', 'builderrin' ),
                'initial'       =>  esc_html__( 'Custom', 'builderrin' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-position: {{VALUE}};',
            ],
            'condition' => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ]        
        ]
    );

    $element->add_responsive_control(
        'pxl_parallax_col_bg_pos_custom_x',
        [
            'label' => esc_html__( 'X Position', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            //'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-position: {{SIZE}}{{UNIT}} {{pxl_parallax_col_bg_pos_custom_y.SIZE}}{{pxl_parallax_col_bg_pos_custom_y.UNIT}}',
            ],
            'condition' => [
                'pxl_parallax_col_bg_position' => [ 'initial' ],
                'pxl_parallax_col_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_col_bg_pos_custom_y',
        [
            'label' => esc_html__( 'Y Position', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            //'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-position: {{pxl_parallax_col_bg_pos_custom_x.SIZE}}{{pxl_parallax_col_bg_pos_custom_x.UNIT}} {{SIZE}}{{UNIT}}',
            ],

            'condition' => [
                'pxl_parallax_col_bg_position' => [ 'initial' ],
                'pxl_parallax_col_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_col_bg_size',
        [
            'label' => esc_html__( 'Background Size', 'builderrin' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            //'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'builderrin' ),
                'auto' => esc_html__( 'Auto', 'builderrin' ),
                'cover'   => esc_html__( 'Cover', 'builderrin' ),
                'contain'  => esc_html__( 'Contain', 'builderrin' ),
                'initial'    => esc_html__( 'Custom', 'builderrin' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-size: {{VALUE}};',
            ],
            'condition' => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ]        
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_col_bg_size_custom',
        [
            'label' => esc_html__( 'Background Width', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            //'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'size' => 100,
                'unit' => '%',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-size: {{SIZE}}{{UNIT}} auto',
            ],
            'condition' => [
                'pxl_parallax_col_bg_size' => [ 'initial' ],
                'pxl_parallax_col_bg_img[url]!' => '',
            ],
        ]
    );


    $element->add_control(
        'pxl_parallax_col_pos_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Position', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'builderrin' ),
            'label_on' => esc_html__( 'Custom', 'builderrin' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
    $element->add_responsive_control(
        'pxl_parallax_col_pos_left',
        [
            'label' => esc_html__( 'Left', 'builderrin' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'left: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_col_pos_top',
        [
            'label' => esc_html__( 'Top', 'builderrin' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'top: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    ); 
    $element->add_responsive_control(
        'pxl_parallax_col_pos_right',
        [
            'label' => esc_html__( 'Right', 'builderrin' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'right: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_col_pos_bottom',
        [
            'label' => esc_html__( 'Bottom', 'builderrin' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'bottom: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    ); 
    $element->end_popover();

    $element->add_control(
        'pxl_parallax_col_effect_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Effect', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'builderrin' ),
            'label_on' => esc_html__( 'Custom', 'builderrin' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
    $element->add_control(
        'pxl_parallax_col_bg_img_effect_x',
        [
            'label' => esc_html__( 'TranslateX', 'builderrin' ).' (-80)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_col_bg_img_effect_y',
        [
            'label' => esc_html__( 'TranslateY', 'builderrin' ).' (-80)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_col_bg_img_effect_z',
        [
            'label' => esc_html__( 'TranslateZ', 'builderrin' ).' (-80)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_col_bg_img_effect_rotate_x',
        [
            'label' => esc_html__( 'Rotate X', 'builderrin' ).' (30)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_col_bg_img_effect_rotate_y',
        [
            'label' => esc_html__( 'Rotate Y', 'builderrin' ).' (30)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_col_bg_img_effect_rotate_z',
        [
            'label' => esc_html__( 'Rotate Z', 'builderrin' ).' (30)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_col_bg_img_effect_scale_x',
        [
            'label' => esc_html__( 'Scale X', 'builderrin' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    ); 
    $element->add_control(
        'pxl_parallax_col_bg_img_effect_scale_y',
        [
            'label' => esc_html__( 'Scale Y', 'builderrin' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_col_bg_img_effect_scale_z',
        [
            'label' => esc_html__( 'Scale Z', 'builderrin' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_col_bg_img_effect_scale',
        [
            'label' => esc_html__( 'Scale', 'builderrin' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->end_popover(); 
    $element->add_control(
        'pxl_column_parallax_opacity',
        [
            'label'      => esc_html__( 'Parallax Opacity', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ '%' ],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ]
            ],
            'default'    => [
                'unit' => '%'
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'opacity: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_parallax_col_bg_img[url]!' => ''
            ] 
        ]
    );

    $element->add_control(
        'pxl_column_overflow_hidden',
        [
            'label' => esc_html__('Overflow Hidden', 'builderrin'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'builderrin' ),
            'label_off' => esc_html__( 'No', 'builderrin' ),
            'return_value' => 'yes',
            'default' => 'no',
            'separator' => 'after',
            'prefix_class' => 'pxl-column-overflow-hidden-'
        ]
    );
    $element->end_controls_section();
}

//widget add control
add_action('elementor/element/common/_section_style/after_section_end', 'builderrin_add_custom_common_controls');
function builderrin_add_custom_common_controls(\Elementor\Element_Base $element){
    $element->start_controls_section(
        'section_pxl_widget_el',
        [
            'label' => esc_html__( 'Carmelina Settings', 'builderrin' ),
            'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
        ]
    );
    $element->add_control(
        'pxl_widget_el_pos_popover_toggle',
        [
            'label' => esc_html__( 'Position', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'builderrin' ),
            'label_on' => esc_html__( 'Custom', 'builderrin' ),
            'return_value' => 'yes',
        ]
    );
    $element->start_popover();
    $element->add_responsive_control(
        'pxl_widget_el_position',
        [
            'label' => esc_html__( 'Position', 'builderrin' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'options'      => array(
                ''         => esc_html__( 'Default', 'builderrin' ),
                'absolute' => esc_html__( 'Absolute', 'builderrin' ),
                'relative' => esc_html__( 'Relative', 'builderrin' ),
                'fixed'    => esc_html__( 'Fixed', 'builderrin' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}}' => 'position: {{VALUE}};',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_widget_el_pos_left',
        [
            'label' => esc_html__( 'Left', 'builderrin' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}}' => 'left: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_widget_el_position!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_widget_el_pos_top',
        [
            'label' => esc_html__( 'Top', 'builderrin' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}}' => 'top: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_widget_el_position!' => ''
            ] 
        ]
    ); 
    $element->add_responsive_control(
        'pxl_widget_el_pos_right',
        [
            'label' => esc_html__( 'Right', 'builderrin' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}}' => 'right: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_widget_el_position!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_widget_el_pos_bottom',
        [
            'label' => esc_html__( 'Bottom', 'builderrin' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}}' => 'bottom: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_widget_el_position!' => ''
            ] 
        ]
    ); 
    $element->end_popover();

    $element->add_control(
        'pxl_widget_el_border_animated',
        [
            'label' => esc_html__('Border Animated', 'builderrin'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'builderrin' ),
            'label_off' => esc_html__( 'No', 'builderrin' ),
            'return_value' => 'yes',
            'prefix_class' => 'pxl-wg-bd-anm-', 
            'default' => 'no',
        ]
    );
    $element->add_control(
        'pxl_widget_el_move_effect',
        [
            'label' => esc_html__( 'Move Effect', 'builderrin' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'options'      => array(
                ''              => esc_html__( 'Default', 'builderrin' ),
                'move-from-left' => esc_html__( 'Move From Left', 'builderrin' ),
                'move-from-right' => esc_html__( 'Move From Right', 'builderrin' ),
            ),
            'default'      => '',
            'prefix_class' => 'pxl-wg-', 
        ]
    );
    $element->end_controls_section();
} 

add_action( 'elementor/element/after_add_attributes', 'builderrin_custom_el_attributes', 10, 1 );
function builderrin_custom_el_attributes($el){

    $settings = $el->get_settings();
    
    if( 'section' == $el->get_name() ) {
        if ( isset( $settings['pxl_header_type'] ) && !empty($settings['pxl_header_type'] ) ) {
            $el->add_render_attribute( '_wrapper', 'class', 'pxl-header-'.$settings['pxl_header_type']);
        }
        if ( isset( $settings['pxl_header_mobile_type'] ) && !empty($settings['pxl_header_mobile_type'] ) ) {
            $el->add_render_attribute( '_wrapper', 'class', 'pxl-header-mobile-'.$settings['pxl_header_mobile_type']);
        }
        if ( isset( $settings['pxl_section_border_animated'] ) && $settings['pxl_section_border_animated'] == 'yes'  ) {
            $el->add_render_attribute( '_wrapper', 'class', 'pxl-border-section-anm');
        }
        if ( isset( $settings['pxl_section_offset'] ) && $settings['pxl_section_offset'] !='none' ) {
            if( $settings['gap'] === 'no' )
                $el->add_render_attribute( '_wrapper', 'class', 'pxl-section-gap-no');
        }
    }
    if( 'column' == $el->get_name() ) {
        if ( isset( $settings['pxl_border_animated'] ) && $settings['pxl_border_animated'] == 'yes'  ) {
            $el->add_render_attribute( '_wrapper', 'class', 'pxl-border-column-anm');
        }
        if(!empty($settings['pxl_column_parallax']) && !empty($settings['pxl_column_parallax_value'])){
            $parallax_settings = json_encode([
                $settings['pxl_column_parallax'] => $settings['pxl_column_parallax_value']
            ]);
            $el->add_render_attribute( '_widget_wrapper', 'data-parallax', $parallax_settings );
        }
    }
    if( 'image' == $el->get_name() ) {
        if (strpos($settings['_css_classes'], 'parallax-') !== false) {
            $parl_arg = explode('--', $settings['_css_classes']); //parallax--y_50 , parallax--x_-50
            
            $parl_arg1 = explode('_', $parl_arg[1]);  

            $data_parallax = json_encode([
                $parl_arg1[0] => $parl_arg1[1]
            ]); 
            $el->add_render_attribute( '_wrapper', 'data-parallax', esc_attr($data_parallax));
        } 
    }

    $_animation = ! empty( $settings['_animation'] );
    $animation = ! empty( $settings['animation'] );
    $has_animation = $_animation && 'none' !== $settings['_animation'] || $animation && 'none' !== $settings['animation'];

    if ( $has_animation ) {
        $is_static_render_mode = \Elementor\Plugin::$instance->frontend->is_static_render_mode();

        if ( ! $is_static_render_mode ) {
            $el->add_render_attribute( '_wrapper', 'class', 'pxl-elementor-animate' );
        }
    }

}

add_filter( 'pxl_section_start_render', 'builderrin_custom_section_start_render', 10, 3 );
function builderrin_custom_section_start_render($html, $settings, $el){  
    if(!empty($settings['pxl_parallax_bg_img']['url'])){
        $effects = [];
        if(!empty($settings['pxl_parallax_bg_img_effect_x'])){
            $effects['x'] = (int)$settings['pxl_parallax_bg_img_effect_x'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_y'])){
            $effects['y'] = (int)$settings['pxl_parallax_bg_img_effect_y'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_z'])){
            $effects['z'] = (int)$settings['pxl_parallax_bg_img_effect_z'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_rotate_x'])){
            $effects['rotateX'] = (float)$settings['pxl_parallax_bg_img_effect_rotate_x'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_rotate_y'])){
            $effects['rotateY'] = (float)$settings['pxl_parallax_bg_img_effect_rotate_y'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_rotate_z'])){
            $effects['rotateZ'] = (float)$settings['pxl_parallax_bg_img_effect_rotate_z'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_scale'])){
            $effects['scale'] = (float)$settings['pxl_parallax_bg_img_effect_scale'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_scale_x'])){
            $effects['scaleX'] = (float)$settings['pxl_parallax_bg_img_effect_scale_x'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_scale_y'])){
            $effects['scaleY'] = (float)$settings['pxl_parallax_bg_img_effect_scale_y'];
        }
        if(!empty($settings['pxl_parallax_bg_from_scroll_custom'])){
            $effects['from-scroll-custom'] = (int)$settings['pxl_parallax_bg_from_scroll_custom'];
        }

        $data_parallax = json_encode($effects);
        $html .= '<div class="pxl-section-bg-parallax" data-parallax="'.esc_attr($data_parallax).'"></div>';
    }  
    if(!empty($settings['pxl_divider_top_img']['url'])){
        $html .= '<div class="pxl-section-divider-top-img"></div>';
    }
    if(!empty($settings['pxl_divider_bot_img']['url'])){
        $html .= '<div class="pxl-section-divider-bot-img"></div>';
    }

    if(!empty($settings['pxl_section_list_line']) && count($settings['pxl_section_list_line']) > 0){
        foreach ($settings['pxl_section_list_line'] as $v) {
            $html .= '<span class="pxl-section-line-item elementor-repeater-item-'.$v['_id'].'"></span>';
        }
    }  
    return $html;
}

add_filter( 'pxl-custom-column/before-render', 'builderrin_custom_column_before_render', 10, 3 );
function builderrin_custom_column_before_render($html, $settings, $el){  
    if(!empty($settings['pxl_parallax_col_bg_img']['url'])){
        $effects = [];
        if(!empty($settings['pxl_parallax_col_bg_img_effect_x'])){
            $effects['x'] = (int)$settings['pxl_parallax_col_bg_img_effect_x'];
        }
        if(!empty($settings['pxl_parallax_col_bg_img_effect_y'])){
            $effects['y'] = (int)$settings['pxl_parallax_col_bg_img_effect_y'];
        }
        if(!empty($settings['pxl_parallax_col_bg_img_effect_z'])){
            $effects['z'] = (int)$settings['pxl_parallax_col_bg_img_effect_z'];
        }
        if(!empty($settings['pxl_parallax_col_bg_img_effect_rotate_x'])){
            $effects['rotateX'] = (float)$settings['pxl_parallax_col_bg_img_effect_rotate_x'];
        }
        if(!empty($settings['pxl_parallax_col_bg_img_effect_rotate_y'])){
            $effects['rotateY'] = (float)$settings['pxl_parallax_col_bg_img_effect_rotate_y'];
        }
        if(!empty($settings['pxl_parallax_col_bg_img_effect_scale'])){
            $effects['scale'] = (float)$settings['pxl_parallax_col_bg_img_effect_scale'];
        }
        if(!empty($settings['pxl_parallax_col_bg_img_effect_scale_x'])){
            $effects['scaleX'] = (float)$settings['pxl_parallax_col_bg_img_effect_scale_x'];
        }
        if(!empty($settings['pxl_parallax_col_bg_img_effect_scale_y'])){
            $effects['scaleY'] = (float)$settings['pxl_parallax_col_bg_img_effect_scale_y'];
        }
        $data_parallax = json_encode($effects);
        $html .= '<div class="pxl-column-bg-parallax" data-parallax="'.esc_attr($data_parallax).'"></div>';
    } 
    if( isset($settings['pxl_border_animated']) && $settings['pxl_border_animated'] == 'yes' ){

        $breakpoints = ['laptop','tablet_extra','tablet','mobile_extra','mobile'];

        if( isset($settings['border_width'])){
            $unit = $settings['border_width']['unit'];
            $border_num = 0;

            $bt_width = $settings['border_width']['top'];
            $br_width = $settings['border_width']['right'];
            $bb_width = $settings['border_width']['bottom'];
            $bl_width = $settings['border_width']['left'];
            foreach ($breakpoints as $v) {
                if( isset($settings['border_width_'.$v]['top']) && (int)$settings['border_width_'.$v]['top'] > 0 )
                    $bt_width = $settings['border_width_'.$v]['top'];
                if( isset($settings['border_width_'.$v]['right']) && (int)$settings['border_width_'.$v]['right'] > 0 )
                    $br_width = $settings['border_width_'.$v]['right'];
                if( isset($settings['border_width_'.$v]['bottom']) && (int)$settings['border_width_'.$v]['bottom'] > 0 )
                    $bb_width = $settings['border_width_'.$v]['bottom'];
                if( isset($settings['border_width_'.$v]['left']) && (int)$settings['border_width_'.$v]['left'] > 0 )
                    $bl_width = $settings['border_width_'.$v]['left'];
            }

            $bd_top_style = 'style="--bd-width: '.$bt_width.$unit.' 0 0 0; border-style: '.$settings['border_border'].'; border-color: '.$settings['border_color'].';"';
            $bd_right_style = 'style="--bd-width: 0 '.$br_width.$unit.' 0 0; border-style: '.$settings['border_border'].'; border-color: '.$settings['border_color'].';"';
            $bd_bottom_style = 'style="--bd-width: 0 0 '.$bb_width.$unit.' 0; border-style: '.$settings['border_border'].'; border-color: '.$settings['border_color'].';"';
            $bd_left_style = 'style="--bd-width: 0 0 0 '.$bl_width.$unit.'; border-style: '.$settings['border_border'].'; border-color: '.$settings['border_color'].';"';


            $bd_top_w = $bd_right_w = $bd_bottom_w = $bd_left_w = '';

            if( isset($settings['border_width']['top'])){
                if( $settings['border_width']['top'] == '0' )
                    $bd_top_w.= ' bw-no';
                if( (int)$settings['border_width']['top'] > 0 )
                    $bd_top_w.= ' bw-yes';
            }
            if( isset($settings['border_width']['right'])){
                if( $settings['border_width']['right'] == '0' )
                    $bd_right_w.= ' bw-no';
                if( (int)$settings['border_width']['right'] > 0 )
                    $bd_right_w.= ' bw-yes';
            }
            if( isset($settings['border_width']['bottom'])){
                if( $settings['border_width']['bottom'] == '0' )
                    $bd_bottom_w.= ' bw-no';
                if( (int)$settings['border_width']['bottom'] > 0 )
                    $bd_bottom_w.= ' bw-yes';
            }
            if( isset($settings['border_width']['left'])){
                if( $settings['border_width']['left'] == '0' )
                    $bd_left_w.= ' bw-no';
                if( (int)$settings['border_width']['left'] > 0 )
                    $bd_left_w.= ' bw-yes';
            }    


            foreach ($breakpoints as $v) {

                if( isset($settings['border_width_'.$v]['top']) ){
                    if( $settings['border_width_'.$v]['top'] == '0' )
                        $bd_top_w.= ' bw-'.$v.'-no';
                    if( (int)$settings['border_width_'.$v]['top'] > 0 )
                        $bd_top_w.= ' bw-'.$v.'-yes';
                }

                if( isset($settings['border_width_'.$v]['right']) ){
                    if( $settings['border_width_'.$v]['right'] == '0' )
                        $bd_right_w.= ' bw-'.$v.'-no';
                    if( (int)$settings['border_width_'.$v]['right'] > 0 )
                        $bd_right_w.= ' bw-'.$v.'-yes';
                }


                if( isset($settings['border_width_'.$v]['bottom']) ){
                    if( $settings['border_width_'.$v]['bottom'] == '0' )
                        $bd_bottom_w.= ' bw-'.$v.'-no';
                    if( (int)$settings['border_width_'.$v]['bottom'] > 0 )
                        $bd_bottom_w.= ' bw-'.$v.'-yes';
                }

                if( isset($settings['border_width_'.$v]['left']) ){
                    if( $settings['border_width_'.$v]['left'] == '0' )
                        $bd_left_w.= ' bw-'.$v.'-no';
                    if( (int)$settings['border_width_'.$v]['left'] > 0 )
                        $bd_left_w.= ' bw-'.$v.'-yes';
                }

            }

            if( (int)$settings['border_width']['top'] > 0) $border_num++;
            if( (int)$settings['border_width']['right'] > 0) $border_num++;
            if( (int)$settings['border_width']['bottom'] > 0) $border_num++;
            if( (int)$settings['border_width']['left'] > 0) $border_num++;

            $html = '<div class="pxl-border-animated num-'.$border_num.'">
            <div class="pxl-border-anm bt w-100 '.$bd_top_w.'" '.$bd_top_style.'></div>
            <div class="pxl-border-anm br h-100 '.$bd_right_w.'" '.$bd_right_style.'></div>
            <div class="pxl-border-anm bb w-100 '.$bd_bottom_w.'" '.$bd_bottom_style.'></div>
            <div class="pxl-border-anm bl h-100 '.$bd_left_w.'" '.$bd_left_style.'></div>
            </div>';
        }
    }   
    return $html;
}

//widget render
add_action('elementor/widget/before_render_content','builderrin_custom_widget_el_before_render', 10, 1 );
function builderrin_custom_widget_el_before_render($el){  

}
add_filter('elementor/widget/render_content','builderrin_custom_widget_el_render_content', 10, 2 );
function builderrin_custom_widget_el_render_content($widget_content, $el){  
    $settings = $el->get_settings();
    if( isset($settings['pxl_widget_el_border_animated']) && $settings['pxl_widget_el_border_animated'] == 'yes' ){

        $breakpoints = ['laptop','tablet_extra','tablet','mobile_extra','mobile'];

        $unit = $settings['_border_width']['unit'];
        $border_num = 0;

        $bt_width = $settings['_border_width']['top'];
        $br_width = $settings['_border_width']['right'];
        $bb_width = $settings['_border_width']['bottom'];
        $bl_width = $settings['_border_width']['left'];
        foreach ($breakpoints as $v) {
            if( isset($settings['_border_width_'.$v]['top']) && (int)$settings['_border_width_'.$v]['top'] > 0 )
                $bt_width = $settings['_border_width_'.$v]['top'];
            if( isset($settings['_border_width_'.$v]['right']) && (int)$settings['_border_width_'.$v]['right'] > 0 )
                $br_width = $settings['_border_width_'.$v]['right'];
            if( isset($settings['_border_width_'.$v]['bottom']) && (int)$settings['_border_width_'.$v]['bottom'] > 0 )
                $bb_width = $settings['_border_width_'.$v]['bottom'];
            if( isset($settings['_border_width_'.$v]['left']) && (int)$settings['_border_width_'.$v]['left'] > 0 )
                $bl_width = $settings['_border_width_'.$v]['left'];
        }

        $bd_top_style = 'style="--bd-width: '.$bt_width.$unit.' 0 0 0; border-style: '.$settings['_border_border'].'; border-color: '.$settings['_border_color'].';"';
        $bd_right_style = 'style="--bd-width: 0 '.$br_width.$unit.' 0 0; border-style: '.$settings['_border_border'].'; border-color: '.$settings['_border_color'].';"';
        $bd_bottom_style = 'style="--bd-width: 0 0 '.$bb_width.$unit.' 0; border-style: '.$settings['_border_border'].'; border-color: '.$settings['_border_color'].';"';
        $bd_left_style = 'style="--bd-width: 0 0 0 '.$bl_width.$unit.'; border-style: '.$settings['_border_border'].'; border-color: '.$settings['_border_color'].';"';


        $bd_top_w = $bd_right_w = $bd_bottom_w = $bd_left_w = '';

        if( isset($settings['_border_width']['top'])){
            if( $settings['_border_width']['top'] == '0' )
                $bd_top_w.= ' bw-no';
            if( (int)$settings['_border_width']['top'] > 0 )
                $bd_top_w.= ' bw-yes';
        }
        if( isset($settings['_border_width']['right'])){
            if( $settings['_border_width']['right'] == '0' )
                $bd_right_w.= ' bw-no';
            if( (int)$settings['_border_width']['right'] > 0 )
                $bd_right_w.= ' bw-yes';
        }
        if( isset($settings['_border_width']['bottom'])){
            if( $settings['_border_width']['bottom'] == '0' )
                $bd_bottom_w.= ' bw-no';
            if( (int)$settings['_border_width']['bottom'] > 0 )
                $bd_bottom_w.= ' bw-yes';
        }
        if( isset($settings['_border_width']['left'])){
            if( $settings['_border_width']['left'] == '0' )
                $bd_left_w.= ' bw-no';
            if( (int)$settings['_border_width']['left'] > 0 )
                $bd_left_w.= ' bw-yes';
        }    


        foreach ($breakpoints as $v) {

            if( isset($settings['_border_width_'.$v]['top']) ){
                if( $settings['_border_width_'.$v]['top'] == '0' )
                    $bd_top_w.= ' bw-'.$v.'-no';
                if( (int)$settings['_border_width_'.$v]['top'] > 0 )
                    $bd_top_w.= ' bw-'.$v.'-yes';
            }

            if( isset($settings['_border_width_'.$v]['right']) ){
                if( $settings['_border_width_'.$v]['right'] == '0' )
                    $bd_right_w.= ' bw-'.$v.'-no';
                if( (int)$settings['_border_width_'.$v]['right'] > 0 )
                    $bd_right_w.= ' bw-'.$v.'-yes';
            }


            if( isset($settings['_border_width_'.$v]['bottom']) ){
                if( $settings['_border_width_'.$v]['bottom'] == '0' )
                    $bd_bottom_w.= ' bw-'.$v.'-no';
                if( (int)$settings['_border_width_'.$v]['bottom'] > 0 )
                    $bd_bottom_w.= ' bw-'.$v.'-yes';
            }

            if( isset($settings['_border_width_'.$v]['left']) ){
                if( $settings['_border_width_'.$v]['left'] == '0' )
                    $bd_left_w.= ' bw-'.$v.'-no';
                if( (int)$settings['_border_width_'.$v]['left'] > 0 )
                    $bd_left_w.= ' bw-'.$v.'-yes';
            }

        }

        if( (int)$settings['_border_width']['top'] > 0) $border_num++;
        if( (int)$settings['_border_width']['right'] > 0) $border_num++;
        if( (int)$settings['_border_width']['bottom'] > 0) $border_num++;
        if( (int)$settings['_border_width']['left'] > 0) $border_num++;

        $html = '<div class="pxl-border-animated num-'.$border_num.'">
        <div class="pxl-border-anm bt w-100 '.$bd_top_w.'" '.$bd_top_style.'></div>
        <div class="pxl-border-anm br h-100 '.$bd_right_w.'" '.$bd_right_style.'></div>
        <div class="pxl-border-anm bb w-100 '.$bd_bottom_w.'" '.$bd_bottom_style.'></div>
        <div class="pxl-border-anm bl h-100 '.$bd_left_w.'" '.$bd_left_style.'></div>
        </div>';
        return $html.$widget_content;
    }else{
        return $widget_content;
    }
}




