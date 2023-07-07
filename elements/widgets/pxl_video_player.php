<?php
// Register Video Player Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_video_player',
        'title' => esc_html__('Video Player BR', 'builderrin' ),
        'icon' => 'eicon-play',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'video_link',
                            'label' => esc_html__('Link', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'image_type',
                            'label' => esc_html__('Image Type', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'none' => 'None',
                                'img' => 'Image',
                                'bg' => 'Background',
                            ],
                            'default' => 'none',
                            'condition' => [
                                'btn_video_style' => ['style1', 'style2'],
                            ],
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Image', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'image_type' => ['img', 'bg'],
                            ],
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'img_width',
                            'label' => esc_html__( 'Image Width', 'builderrin' ),
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
                                'image_type' => 'img',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--holder img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'img_height',
                            'label' => esc_html__( 'Image Height', 'builderrin' ),
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
                                'image_type' => 'img',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--holder img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_height',
                            'label' => esc_html__('Image Height', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'builderrin' ),
                            'condition' => [
                                'image_type' => 'bg',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--image' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_video_style',
                            'label' => esc_html__('Button Video Style', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                                'style3' => 'Style 3',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'btn_video_position',
                            'label' => esc_html__('Button Video Position', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'p-center' => 'Center',
                                'p-top-left' => 'Top Left',
                                'p-top-right' => 'Top Right',
                                'p-bottom-left' => 'Bottom Left',
                                'p-bottom-right' => 'Bottom Right',
                            ],
                            'default' => 'p-center',
                            'condition' => [
                                'image_type' => ['img','bg'],
                            ],
                        ),
                        array(
                            'name' => 'top_position',
                            'label' => esc_html__('Top Position', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'size' => 0,
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
                                '{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-left, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-right' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_video_position' => ['p-top-left', 'p-top-right'],
                            ],
                        ),
                        array(
                            'name' => 'right_position',
                            'label' => esc_html__('Right Position', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'size' => 0,
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
                                '{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-right, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-right' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_video_position' => ['p-top-right', 'p-bottom-right'],
                            ],
                        ),
                        array(
                            'name' => 'bottom_position',
                            'label' => esc_html__('Bottom Position', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'size' => 0,
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
                                '{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-left, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-right' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_video_position' => ['p-bottom-left', 'p-bottom-right'],
                            ],
                        ),
                        array(
                            'name' => 'left_position',
                            'label' => esc_html__('Left Position', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'size' => 0,
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
                                '{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-left, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-left' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_video_position' => ['p-top-left', 'p-bottom-left'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_content',
                    'label' => esc_html__('Content', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_title_color',
                            'label' => esc_html__('Title Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-video-player .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'builderrin' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-video-player .pxl-item--title',
                        ),
                        array(
                            'name' => 'title_width',
                            'label' => esc_html__('Title Max Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-item--title' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_margin',
                            'label' => esc_html__('Title Margin (px)', 'builderrin' ),
                            'type' => 'dimensions',
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-item--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .btn-video' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_icon_color',
                            'label' => esc_html__('Icon Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-video-player .btn-video i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'  => 'icon_size',
                            'label' => esc_html__('Icon Size (px)', 'builderrin' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .btn-video i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_width',
                            'label' => esc_html__('Icon Width (px)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .btn-video' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_particle',
                    'label' => esc_html__('Particle', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'show_particle',
                            'label' => esc_html__('Show Particle', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'particle_bottom_position',
                            'label' => esc_html__('Particle Bottom Position', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
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
                                '{{WRAPPER}} .pxl-circle--shapes' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'particle_right_position',
                            'label' => esc_html__('Particle Right Position', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
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
                                '{{WRAPPER}} .pxl-circle--shapes' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'width_particle',
                            'label' => esc_html__('Particle Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ '%', 'px' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle--shapes' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'height_particle',
                            'label' => esc_html__('Particle Height', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ '%', 'px' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle--shapes' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'particle_color',
                            'label' => esc_html__('Particle Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle--shapes' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_particle_color',
                            'label' => esc_html__('Particle Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-circle--shapes' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'  => 'particle_size',
                            'label' => esc_html__( 'Particle Size (px)', 'builderrin' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle--shapes' => 'border-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_box',
                    'label' => esc_html__('Box', 'builderrin'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'bg_position',
                            'label' => esc_html__( 'Background Position', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'responsive' => true,
                            'options' => [
                                '' => esc_html__( 'Default', 'builderrin' ),
                                'center center' => esc_html__( 'Center Center', 'builderrin' ),
                                'center left' => esc_html__( 'Center Left', 'builderrin' ),
                                'center right' => esc_html__( 'Center Right', 'builderrin' ),
                                'top center' => esc_html__( 'Top Center', 'builderrin' ),
                                'top left' => esc_html__( 'Top Left', 'builderrin' ),
                                'top right' => esc_html__( 'Top Right', 'builderrin' ),
                                'bottom center' => esc_html__( 'Bottom Center', 'builderrin' ),
                                'bottom left' => esc_html__( 'Bottom Left', 'builderrin' ),
                                'bottom right' => esc_html__( 'Bottom Right', 'builderrin' ),
                                'initial' => esc_html__( 'Custom', 'builderrin' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--image' => 'background-position: {{VALUE}};',
                            ],
                            'condition' => [
                                'image_type' => 'bg',
                            ],
                        ),
                        array(
                            'name' => 'bg_position_xpos',
                            'label' => esc_html__( 'X Position', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'responsive' => true,
                            'size_units' => [ 'px', 'em', '%', 'vw' ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 0,
                            ],
                            'tablet_default' => [
                                'unit' => 'px',
                                'size' => 0,
                            ],
                            'mobile_default' => [
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
                                '{{WRAPPER}} .pxl-video--image' => 'background-position: {{SIZE}}{{UNIT}} {{bg_position_ypos.SIZE}}{{bg_position_ypos.UNIT}}',
                            ],
                            'condition' => [
                                'image_type' => 'bg',
                                'bg_position' => [ 'initial' ],
                            ],
                            'required' => true,
                        ),
                        array(
                            'name' => 'bg_position_ypos',
                            'label' => esc_html__( 'Y Position', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'responsive' => true,
                            'size_units' => [ 'px', 'em', '%', 'vw' ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 0,
                            ],
                            'tablet_default' => [
                                'unit' => 'px',
                                'size' => 0,
                            ],
                            'mobile_default' => [
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
                                '{{WRAPPER}} .pxl-video--image' => 'background-position: {{bg_position_xpos.SIZE}}{{bg_position_xpos.UNIT}} {{SIZE}}{{UNIT}}',
                            ],
                            'condition' => [
                                'image_type' => 'bg',
                                'bg_position' => [ 'initial' ],
                            ],
                            'required' => true,
                        ),
                        array(
                            'name' => 'bg_attachment',
                            'label' => esc_html__( 'Background Attachment', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__( 'Default', 'builderrin' ),
                                'scroll' => esc_html__( 'Scroll', 'builderrin' ),
                                'fixed' => esc_html__( 'Fixed', 'builderrin' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--image' => 'background-attachment: {{VALUE}};',
                            ],
                            'condition' => [
                                'image_type' => 'bg',
                            ],
                        ),
                        array(
                            'name' => 'bg_attachment_alert',
                            'type' => \Elementor\Controls_Manager::RAW_HTML,
                            'content_classes' => 'elementor-control-field-description',
                            'raw' => esc_html__( 'Note: Attachment Fixed works only on desktop.', 'builderrin' ),
                            'separator' => 'none',
                            'condition' => [
                                'image_type' => 'bg',
                                'bg_attachment' => 'fixed',
                            ],
                        ),
                        array(
                            'name' => 'bg_repeat',
                            'label' => esc_html__( 'Background Repeat', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'responsive' => true,
                            'options' => [
                                '' => esc_html__( 'Default', 'builderrin' ),
                                'no-repeat' => esc_html__( 'No-repeat', 'builderrin' ),
                                'repeat' => esc_html__( 'Repeat', 'builderrin' ),
                                'repeat-x' => esc_html__( 'Repeat-x', 'builderrin' ),
                                'repeat-y' => esc_html__( 'Repeat-y', 'builderrin' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--image' => 'background-repeat: {{VALUE}};',
                            ],
                            'condition' => [
                                'image_type' => 'bg',
                            ],
                        ),
                        array(
                            'name' => 'bg_size',
                            'label' => esc_html__( 'Background Size', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'responsive' => true,
                            'options' => [
                                '' => esc_html__( 'Default', 'builderrin' ),
                                'auto' => esc_html__( 'Auto', 'builderrin' ),
                                'cover' => esc_html__( 'Cover', 'builderrin' ),
                                'contain' => esc_html__( 'Contain', 'builderrin' ),
                                'initial' => esc_html__( 'Custom', 'builderrin' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--image' => 'background-size: {{VALUE}};',
                            ],
                            'condition' => [
                                'image_type' => 'bg',
                            ],
                        ),
                        array(
                            'name' => 'bg_width',
                            'label' => esc_html__( 'Background Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'responsive' => true,
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
                            'required' => true,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--image' => 'background-size: {{SIZE}}{{UNIT}} auto',
                            ],
                            'condition' => [
                                'image_type' => 'bg',
                                'bg_size' => [ 'initial' ],
                            ],
                        ),
                        array(
                            'name' => 'box_bgcolor',
                            'label' => esc_html__('Background Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .btn-video' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_box_bgcolor',
                            'label' => esc_html__('Background Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-video-player .btn-video' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Border Radius', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--holder' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'overlay_color',
                            'label' => esc_html__('Overlay Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--holder:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'  => 'overlay-opacity',
                            'label' => esc_html__( 'Overlay Opacity', 'builderrin' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 9,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--holder:before' => 'opacity: 0.{{SIZE}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'darkmode_overlay_color',
                            'label' => esc_html__('Overlay Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-video-player .pxl-video--holder:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'  => 'darkmode_overlay-opacity',
                            'label' => esc_html__( 'Overlay Opacity (Dark Mode)', 'builderrin' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 9,
                                ],
                            ],
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-video-player .pxl-video--holder:before' => 'opacity: 0.{{SIZE}};',
                            ],
                        ),
                        array(
                            'name' => 'object_fit',
                            'label' => esc_html__( 'Size', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'Default', 'builderrin' ),
                                'none' => esc_html__( 'None', 'builderrin' ),
                                'cover' => esc_html__( 'Cover', 'builderrin' ),
                                'contain' => esc_html__( 'Contain', 'builderrin' ),
                                'fill' => esc_html__( 'Fill', 'builderrin' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--holder img' => 'object-fit: {{VALUE}};',
                            ],
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'border_type',
                            'label' => esc_html__( 'Border Type', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'builderrin' ),
                                'solid' => esc_html__( 'Solid', 'builderrin' ),
                                'double' => esc_html__( 'Double', 'builderrin' ),
                                'dotted' => esc_html__( 'Dotted', 'builderrin' ),
                                'dashed' => esc_html__( 'Dashed', 'builderrin' ),
                                'groove' => esc_html__( 'Groove', 'builderrin' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--holder img' => 'border-style: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--holder img' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--holder img' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color',
                            'label' => esc_html__( 'Border Color (Dark Mode)', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-video--holder img' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'border_type!' => '',
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