<?php
// Register Google Maps Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_google_map',
        'title' => esc_html__( 'BR Google Maps', 'builderrin' ),
        'icon' => 'eicon-google-maps',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-map-api',
            'pxl-map',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__( 'Source Settings', 'builderrin' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'address',
                            'label' => esc_html__( 'Address', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => 'New York, United States',
                        ),
                        array(
                            'name' => 'coordinate',
                            'label' => esc_html__( 'Coordinate', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '40.6976684,-74.2605501',
                        ),
                        array(
                            'name' => 'markercoordinate',
                            'label' => esc_html__( 'Marker Coordinate', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => esc_html__('Enter marker coordinate of Map, format input (latitude, longitude)', 'builderrin'),
                            'default' => '40.6976684,-74.2605501',
                        ),
                        array(
                            'name' => 'markericon',
                            'label' => esc_html__( 'Marker Icon', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'description' => esc_html__('Select image icon for marker', 'builderrin')
                        ),
                        array(
                            'name' => 'type',
                            'label' => esc_html__( 'Map Type', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'ROADMAP' => 'ROADMAP',
                                'HYBRID' => 'HYBRID',
                                'SATELLITE' => 'SATELLITE',
                                'TERRAIN' => 'TERRAIN'
                            ],
                            'default' => 'ROADMAP',
                            'description' => esc_html__('Select the map type.', 'builderrin')
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__( 'Style Template', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'light-monochrome' => 'Light Monochrome',
                                'blue-water' => 'Blue water',
                                'midnight-commander' => 'Midnight Commander',
                                'paper' => 'Paper',
                                'red-hues' => 'Red Hues',
                                'hot-pink' => 'Hot Pink',
                                'custom' => 'Custom',
                            ],
                            'default' => '',
                            'description' => esc_html__('Select the map template.', 'builderrin')
                        ),
                        array(
                            'name' => 'content',
                            'label' => esc_html__( 'Custom Template', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::CODE,
                            'language' => 'json',
                            'description' => esc_html__('Get template from snazzymaps.com', 'builderrin'),
                            'condition' => [
                                'style' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'zoom',
                            'label' => esc_html__( 'Zoom', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => 13,
                            'description' => esc_html__('Set max width for info window', 'builderrin')
                        ),
                        array(
                            'name' => 'width',
                            'label' => esc_html__( 'Width', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => 'auto',
                            'description' => esc_html__('Width of map without pixel, default is auto', 'builderrin')
                        ),
                        array(
                            'name' => 'height',
                            'label' => esc_html__( 'Height', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '350px',
                            'description' => esc_html__('Height of map without pixel, default is 350px', 'builderrin')
                        ),
                        array(
                            'name' => 'scrollwheel',
                            'label' => esc_html__( 'Scroll Wheel', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'description' => esc_html__('Height of map without pixel, default is 350px', 'builderrin')
                        ),
                        array(
                            'name' => 'pancontrol',
                            'label' => esc_html__( 'Pan Control', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'description' => esc_html__('Height of map without pixel, default is 350px', 'builderrin')
                        ),
                        array(
                            'name' => 'zoomcontrol',
                            'label' => esc_html__( 'Zoom Control', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'description' => esc_html__('Height of map without pixel, default is 350px', 'builderrin')
                        ),
                        array(
                            'name' => 'scalecontrol',
                            'label' => esc_html__( 'Scale Control', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'description' => esc_html__('Height of map without pixel, default is 350px', 'builderrin')
                        ),
                        array(
                            'name' => 'maptypecontrol',
                            'label' => esc_html__( 'Map Type Control', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'description' => esc_html__('Height of map without pixel, default is 350px', 'builderrin')
                        ),
                        array(
                            'name' => 'streetviewcontrol',
                            'label' => esc_html__( 'Street View Control', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'description' => esc_html__('Height of map without pixel, default is 350px', 'builderrin')
                        ),
                        array(
                            'name' => 'overviewmapcontrol',
                            'label' => esc_html__( 'Over View Map Control', 'builderrin' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'description' => esc_html__('Height of map without pixel, default is 350px', 'builderrin')
                        ),
                    ),
                ),
            ),
        ),
    ),
    builderrin_get_class_widget_path()
);