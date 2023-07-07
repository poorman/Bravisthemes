<?php

/**
 * Swipper Lib
*/
if(!function_exists('builderrin_elements_scripts')){
    add_action( 'wp_enqueue_scripts', 'builderrin_elements_scripts');
    function builderrin_elements_scripts() {
        $theme = wp_get_theme( get_template() );
        wp_enqueue_script('builderrin-elementor', get_template_directory_uri() . '/elements/widgets/js/elementor.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_enqueue_script('builderrin-swiper-slider', get_template_directory_uri() . '/elements/widgets/js/pxl-swiper-slider.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('builderrin-particle', get_template_directory_uri() . '/elements/widgets/js/particle.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('builderrin-parallax', get_template_directory_uri() . '/elements/widgets/js/parallax.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('pxl-post-grid', get_template_directory_uri() . '/elements/widgets/js/grid.js', [ 'isotope', 'jquery' ], $theme->get( 'Version' ), true);
        wp_enqueue_script( 'pxl-scroll-trigger', get_template_directory_uri() . '/elements/widgets/js/scroll-trigger.js', array( 'jquery' ), '3.10.5', true );
        wp_enqueue_script( 'pxl-parallax-background', get_template_directory_uri() . '/elements/widgets/js/parallax-background.js', array( 'jquery' ), builderrin()->get_version(), true );
        wp_enqueue_script( 'pxl-parallax-scroll', get_template_directory_uri() . '/elements/widgets/js/parallax-scroll.js', array( 'jquery' ), builderrin()->get_version(), true );
        wp_localize_script('pxl-post-grid', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
        wp_register_script('pxl-swiper', get_template_directory_uri() . '/elements/widgets/js/carousel.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script( 'pxl-splitText', get_template_directory_uri() . '/elements/widgets/js/split-text.js', array( 'jquery' ), '3.6.1', true );
        wp_enqueue_script('pxl-elementor', get_template_directory_uri() . '/elements/widgets/js/pxl-elementor.js', ['jquery'], builderrin()->get_version(), true);
        wp_enqueue_script('builderrin-elementor-edit', get_template_directory_uri() . '/elements/widgets/js/pxl-elementor-edit.js', ['jquery'], builderrin()->get_version(), true);
        wp_register_script('builderrin-counter', get_template_directory_uri() . '/elements/widgets/js/counter.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('builderrin-accordion', get_template_directory_uri() . '/elements/widgets/js/accordion.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('builderrin-countdown', get_template_directory_uri() . '/elements/widgets/js/countdown.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('builderrin-tabs', get_template_directory_uri() . '/elements/widgets/js/tabs.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('builderrin-progressbar', get_template_directory_uri() . '/elements/widgets/js/progressbar.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('builderrin-piecharts', get_template_directory_uri() . '/elements/widgets/js/piecharts.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('builderrin-img-effects', get_template_directory_uri() . '/elements/widgets/js/image-effects.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        $pxl_api_key = builderrin()->get_theme_opt( 'api_key' );
        $api_js = "https://maps.googleapis.com/maps/api/js?sensor=false&key=".$pxl_api_key;
        wp_register_script('pxl-map-api', $api_js, [], date("Ymd"));
        wp_register_script('pxl-map', get_template_directory_uri() . '/elements/widgets/js/map.js', ['pxl-map-api', 'jquery'], $theme->get( 'Version' ), true);
    }
}

/**
 * Extra Elementor Icons
*/
if(!function_exists('builderrin_register_custom_icon_library')){
    add_filter('elementor/icons_manager/native', 'builderrin_register_custom_icon_library');
    function builderrin_register_custom_icon_library($tabs){
        $custom_tabs = [
            'pxl_icomoon' => [
                'name' => 'icomoon',
                'label' => esc_html__( 'Builderrin Icomoon', 'builderrin' ),
                'url' => false,
                'enqueue' => false,
                'prefix' => 'icon-',
                'displayPrefix' => 'icomoon',
                'labelIcon' => 'icon-folder',
                'ver' => '1.0.1',
                'fetchJson' => get_template_directory_uri() . '/assets/fonts/icomoon/pxl-icomoon.js',
                'native' => true,
            ],
            'pxl_icon1' => [
                'name' => 'flaticon',
                'label' => esc_html__( 'Builderrin Flaticon', 'builderrin' ),
                'url' => false,
                'enqueue' => false,
                'prefix' => 'flaticon-',
                'displayPrefix' => 'flaticon',
                'labelIcon' => 'flaticon-list',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/fonts/flaticon/pxl-icons.js',
                'native' => true,
            ],
        ];
        $tabs = array_merge($custom_tabs, $tabs);
        return $tabs;
    }
}

/**
 * Get class widget path
*/
if(!function_exists('builderrin_get_class_widget_path')){
    function builderrin_get_class_widget_path(){
        $upload_dir = wp_upload_dir();
        $cls_path = $upload_dir['basedir'].'/elementor-widget/';
        if(!is_dir($cls_path)) {
            wp_mkdir_p( $cls_path );
        }
        return $cls_path;
    }
}

/**
 * Get post type options
*/
function builderrin_get_post_type_options($pt_supports=[]){
    $post_types = get_post_types([
        'public'   => true,
    ], 'objects');
    $excluded_post_type = [
        'page',
        'attachment',
        'revision',
        'nav_menu_item',
        'custom_css',
        'customize_changeset',
        'oembed_cache',
        'e-landing-page',
        'header',
        'footer',
        'mega-menu',
        'product',
        'elementor_library'
    ];

    $result_some = [];
    $result_any = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $post_type) {
        if (!$post_type instanceof WP_Post_Type)
            continue;
        if (in_array($post_type->name, $excluded_post_type))
            continue;

        if(!empty($pt_supports) && in_array($post_type->name, $pt_supports)){
            $result_some[$post_type->name] = $post_type->labels->singular_name;
        }else{
            $result_any[$post_type->name] = $post_type->labels->singular_name;
        }
    }

    if(!empty($pt_supports))
        return $result_some;
    else
        return $result_any;
}

function builderrin_elementor_animation_opts($args = []){
    $args = wp_parse_args($args, [
        'name'   => '',
        'label'  => '',
        'condition'   => [],
    ]);

    return array(
        array(
            'name'      => $args['name'].'_animation',
            'label'     => $args['label'].' '.esc_html__( 'Motion Effect', 'builderrin' ),
            'type'      => \Elementor\Controls_Manager::ANIMATION,
            'condition'   => $args['condition'],
        ),
        array(
            'name'    => $args['name'].'_animation_duration',
            'label'   => $args['label'].' '.esc_html__( 'Animation Duration', 'builderrin' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => 'normal',
            'options' => [
                'slow'   => esc_html__( 'Slow', 'builderrin' ),
                'normal' => esc_html__( 'Normal', 'builderrin' ),
                'fast'   => esc_html__( 'Fast', 'builderrin' ),
            ],
            'condition'   => array_merge($args['condition'], [ $args['name'].'_animation!' => '' ]),

        ),
        array(
            'name'      => $args['name'].'_animation_delay',
            'label'     => $args['label'].' '.esc_html__( 'Animation Delay', 'builderrin' ),
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'min'       => 0,
            'step'      => 100,
            'condition'   => array_merge($args['condition'], [ $args['name'].'_animation!' => '' ]),
        )
    );
}


/**
 * Start Post Grid Functions
*/
function builderrin_get_post_grid_layout($pt_supports = []){
    $post_types  = builderrin_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        $result[] = array(
            'name'     => 'layout_'.$name,
            'label'    => sprintf(esc_html__( 'Select Templates of %s', 'builderrin' ), $label),
            'type'     => 'layoutcontrol',
            'default' => 'post-1',
            'options'  => builderrin_get_grid_layout_options($name),
            'prefix_class' => 'pxl-post-layout-',
            'condition' => [
                'post_type' => [$name]
            ]
        );
    }
    return $result;
}

function builderrin_get_grid_layout_options($posttype_name){
    $option_layouts = [];
    switch ($posttype_name) {
        case 'portfolio':
        $option_layouts = [
            'portfolio-1' => [
                'label' => esc_html__( 'Layout 1', 'builderrin' ),
                'image' => get_template_directory_uri() . '/elements/templates/pxl_post_grid/img-layout/portfolio-layout1.jpg'
            ],
        ];
        break;

        case 'service':
        $option_layouts = [
            'service-1' => [
                'label' => esc_html__( 'Layout 1', 'builderrin' ),
                'image' => get_template_directory_uri() . '/elements/templates/pxl_post_grid/img-layout/service-layout1.jpg'
            ],
            'service-2' => [
                'label' => esc_html__( 'Layout 2', 'builderrin' ),
                'image' => get_template_directory_uri() . '/elements/templates/pxl_post_grid/img-layout/service-layout2.jpg'
            ],
        ];
        break;

        case 'post':
        $option_layouts = [
            'post-1' => [
                'label' => esc_html__( 'Layout 1', 'builderrin' ),
                'image' => get_template_directory_uri() . '/elements/templates/pxl_post_grid/img-layout/post-layout1.jpg'
            ],
        ];
        break;
    }
    return $option_layouts;
}

function builderrin_get_grid_term_by_posttype($pt_supports = [], $args=[]){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types  = builderrin_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {

        $taxonomy = get_object_taxonomies($name, 'names');

        if($name == 'post') $taxonomy = ['category'];
        if($name == 'product') $taxonomy = ['product_cat'];

        $result[] = array(
            'name'     => 'source_'.$name,
            'label'    => sprintf(esc_html__( 'Select Term of %s', 'builderrin' ), $label),
            'type'     => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options'  => pxl_get_grid_term_options($name,$taxonomy),
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}

function builderrin_get_grid_ids_by_posttype($pt_supports = [], $args = []){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types = builderrin_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {

        $posts = builderrin_list_post($name, false);

        $result[] = array(
            'name' => 'source_' . $name . '_post_ids',
            'label' => sprintf(esc_html__('Select posts', 'builderrin'), $label),
            'type'     => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => $posts,
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}

/**
 * End Post Grid Functions
*/


/**
 * Start Post Carousel Functions
*/
function builderrin_get_post_carousel_layout($pt_supports = []){
    $post_types  = builderrin_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        $result[] = array(
            'name'     => 'layout_'.$name,
            'label'    => sprintf(esc_html__( 'Select Templates of %s', 'builderrin' ), $label),
            'type'     => 'layoutcontrol',
            'default' => 'post-1',
            'options'  => builderrin_get_carousel_layout_options($name),
            'prefix_class' => 'post-layout-',
            'condition' => [
                'post_type' => [$name]
            ]
        );
    }
    return $result;
}

function builderrin_get_carousel_layout_options($posttype_name){
    $option_layouts = [];
    switch ($posttype_name) {
        case 'portfolio':
        $option_layouts = [
            'portfolio-1' => [
                'label' => esc_html__( 'Layout 1', 'builderrin' ),
                'image' => get_template_directory_uri() . '/elements/templates/pxl_post_carousel/img-layout/portfolio-layout1.jpg'
            ],
        ];
        break;

        case 'service':
        $option_layouts = [
            'service-1' => [
                'label' => esc_html__( 'Layout 1', 'builderrin' ),
                'image' => get_template_directory_uri() . '/elements/templates/pxl_post_carousel/img-layout/service-layout1.jpg'
            ],
        ];
        break;

        case 'post':
        $option_layouts = [
            'post-1' => [
                'label' => esc_html__( 'Layout 1', 'builderrin' ),
                'image' => get_template_directory_uri() . '/elements/templates/pxl_post_carousel/img-layout/post-layout1.jpg'
            ],
            'post-2' => [
                'label' => esc_html__( 'Layout 2', 'builderrin' ),
                'image' => get_template_directory_uri() . '/elements/templates/pxl_post_carousel/img-layout/post-layout2.jpg'
            ],
        ];
        break;
    }
    return $option_layouts;
}

function builderrin_get_carousel_term_by_posttype($pt_supports = [], $args=[]){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types  = builderrin_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {

        $taxonomy = get_object_taxonomies($name, 'names');

        if($name == 'post') $taxonomy = ['category'];
        if($name == 'product') $taxonomy = ['product_cat'];

        $result[] = array(
            'name'     => 'source_'.$name,
            'label'    => sprintf(esc_html__( 'Select Term of %s', 'builderrin' ), $label),
            'type'     => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options'  => pxl_get_grid_term_options($name,$taxonomy),
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}
/**
 * End Post Carousel Functions
*/


/* Icon render */
function builderrin_elementor_icon_render( $settings, $args = []){
    $args = wp_parse_args($args, [
        'prefix'     => '',
        'id'         => 'selected_icon',
        'loop'       => false,
        'tag'        => 'div',
        'wrap_class' => '',
        'class'      => '',
        'style'      => '',
        'before'     => '',
        'after'      => '',
        'atts'       => [],
        'animate_data' => '',
        'default_icon'    => [
            'value'   => '',
            'library' => ''
        ],
        'echo' => true
    ]);
    if($args['loop']) {
        $icon = $args['id'];
    } else {
        $icon = $settings[$args['id']];
    }
    if(empty($icon['value'])) $icon = $args['default_icon'];
    if (empty($icon['value'])) return;

    if ( 'svg' === $icon['library'] ){
        $args['before'] = '<span class="'.$args['wrap_class'].' '.$args['class'].'" data-settings="'. esc_attr($args['animate_data']).'">';
        $args['after']  = '</span>';
    }
    ob_start();
    printf('%s', $args['before']);
    ?>
    <?php \Elementor\Icons_Manager::render_icon( $icon, array_merge(
        [
            'aria-hidden' => 'true',
            'class'       => trim(implode(' ', ['pxl-icon', $args['class'], $args['wrap_class']])),
            'style'       => $args['style']
        ],
        $args['atts']
    ), $args['tag']); ?>
    <?php
    printf('%s', $args['after']);

    if($args['echo']){
        echo ob_get_clean();
    } else {
        return ob_get_clean();
    }
}

/**
 * Animation List
*/

function builderrin_widget_animate() {
    $builderrin_animate = array(
        '' => 'None',
        'wow bounce' => 'bounce',
        'wow flash' => 'flash',
        'wow pulse' => 'pulse',
        'wow rubberBand' => 'rubberBand',
        'wow shake' => 'shake',
        'wow swing' => 'swing',
        'wow tada' => 'tada',
        'wow wobble' => 'wobble',
        'wow bounceIn' => 'bounceIn',
        'wow bounceInDown' => 'bounceInDown',
        'wow bounceInLeft' => 'bounceInLeft',
        'wow bounceInRight' => 'bounceInRight',
        'wow bounceInUp' => 'bounceInUp',
        'wow bounceOut' => 'bounceOut',
        'wow bounceOutDown' => 'bounceOutDown',
        'wow bounceOutLeft' => 'bounceOutLeft',
        'wow bounceOutRight' => 'bounceOutRight',
        'wow bounceOutUp' => 'bounceOutUp',
        'wow fadeIn' => 'fadeIn',
        'wow fadeInDown' => 'fadeInDown',
        'wow fadeInDownBig' => 'fadeInDownBig',
        'wow fadeInLeft' => 'fadeInLeft',
        'wow fadeInLeftBig' => 'fadeInLeftBig',
        'wow fadeInRight' => 'fadeInRight',
        'wow fadeInRightBig' => 'fadeInRightBig',
        'wow fadeInUp' => 'fadeInUp',
        'wow fadeInUpBig' => 'fadeInUpBig',
        'wow fadeOut' => 'fadeOut',
        'wow fadeOutDown' => 'fadeOutDown',
        'wow fadeOutDownBig' => 'fadeOutDownBig',
        'wow fadeOutLeft' => 'fadeOutLeft',
        'wow fadeOutLeftBig' => 'fadeOutLeftBig',
        'wow fadeOutRight' => 'fadeOutRight',
        'wow fadeOutRightBig' => 'fadeOutRightBig',
        'wow fadeOutUp' => 'fadeOutUp',
        'wow fadeOutUpBig' => 'fadeOutUpBig',
        'wow flip' => 'flip',
        'wow flipInX' => 'flipInX',
        'wow flipInY' => 'flipInY',
        'wow flipOutX' => 'flipOutX',
        'wow flipOutY' => 'flipOutY',
        'wow lightSpeedIn' => 'lightSpeedIn',
        'wow lightSpeedOut' => 'lightSpeedOut',
        'wow rotateIn' => 'rotateIn',
        'wow rotateInDownLeft' => 'rotateInDownLeft',
        'wow rotateInDownRight' => 'rotateInDownRight',
        'wow rotateInUpLeft' => 'rotateInUpLeft',
        'wow rotateInUpRight' => 'rotateInUpRight',
        'wow rotateOut' => 'rotateOut',
        'wow rotateOutDownLeft' => 'rotateOutDownLeft',
        'wow rotateOutDownRight' => 'rotateOutDownRight',
        'wow rotateOutUpLeft' => 'rotateOutUpLeft',
        'wow rotateOutUpRight' => 'rotateOutUpRight',
        'wow hinge' => 'hinge',
        'wow rollIn' => 'rollIn',
        'wow rollOut' => 'rollOut',
        'wow zoomIn' => 'zoomIn',
        'wow zoomInDown' => 'zoomInDown',
        'wow zoomInLeft' => 'zoomInLeft',
        'wow zoomInRight' => 'zoomInRight',
        'wow zoomInUp' => 'zoomInUp',
        'wow zoomOut' => 'zoomOut',
        'wow zoomOutDown' => 'zoomOutDown',
        'wow zoomOutLeft' => 'zoomOutLeft',
        'wow zoomOutRight' => 'zoomOutRight',
        'wow zoomOutUp' => 'zoomOutUp',
    );
    return $builderrin_animate;
}

function builderrin_widget_animate_v2() {
    $builderrin_animate_v2 = array(
        '' => 'None',
        'wow letter' => 'Letter',
        'wow bounce' => 'bounce',
        'wow flash' => 'flash',
        'wow pulse' => 'pulse',
        'wow rubberBand' => 'rubberBand',
        'wow shake' => 'shake',
        'wow swing' => 'swing',
        'wow tada' => 'tada',
        'wow wobble' => 'wobble',
        'wow bounceIn' => 'bounceIn',
        'wow bounceInDown' => 'bounceInDown',
        'wow bounceInLeft' => 'bounceInLeft',
        'wow bounceInRight' => 'bounceInRight',
        'wow bounceInUp' => 'bounceInUp',
        'wow bounceOut' => 'bounceOut',
        'wow bounceOutDown' => 'bounceOutDown',
        'wow bounceOutLeft' => 'bounceOutLeft',
        'wow bounceOutRight' => 'bounceOutRight',
        'wow bounceOutUp' => 'bounceOutUp',
        'wow fadeIn' => 'fadeIn',
        'wow fadeInDown' => 'fadeInDown',
        'wow fadeInDownBig' => 'fadeInDownBig',
        'wow fadeInLeft' => 'fadeInLeft',
        'wow fadeInLeftBig' => 'fadeInLeftBig',
        'wow fadeInRight' => 'fadeInRight',
        'wow fadeInRightBig' => 'fadeInRightBig',
        'wow fadeInUp' => 'fadeInUp',
        'wow fadeInUpBig' => 'fadeInUpBig',
        'wow fadeOut' => 'fadeOut',
        'wow fadeOutDown' => 'fadeOutDown',
        'wow fadeOutDownBig' => 'fadeOutDownBig',
        'wow fadeOutLeft' => 'fadeOutLeft',
        'wow fadeOutLeftBig' => 'fadeOutLeftBig',
        'wow fadeOutRight' => 'fadeOutRight',
        'wow fadeOutRightBig' => 'fadeOutRightBig',
        'wow fadeOutUp' => 'fadeOutUp',
        'wow fadeOutUpBig' => 'fadeOutUpBig',
        'wow flip' => 'flip',
        'wow flipInX' => 'flipInX',
        'wow flipInY' => 'flipInY',
        'wow flipOutX' => 'flipOutX',
        'wow flipOutY' => 'flipOutY',
        'wow lightSpeedIn' => 'lightSpeedIn',
        'wow lightSpeedOut' => 'lightSpeedOut',
        'wow rotateIn' => 'rotateIn',
        'wow rotateInDownLeft' => 'rotateInDownLeft',
        'wow rotateInDownRight' => 'rotateInDownRight',
        'wow rotateInUpLeft' => 'rotateInUpLeft',
        'wow rotateInUpRight' => 'rotateInUpRight',
        'wow rotateOut' => 'rotateOut',
        'wow rotateOutDownLeft' => 'rotateOutDownLeft',
        'wow rotateOutDownRight' => 'rotateOutDownRight',
        'wow rotateOutUpLeft' => 'rotateOutUpLeft',
        'wow rotateOutUpRight' => 'rotateOutUpRight',
        'wow hinge' => 'hinge',
        'wow rollIn' => 'rollIn',
        'wow rollOut' => 'rollOut',
        'wow zoomIn' => 'zoomIn',
        'wow zoomInDown' => 'zoomInDown',
        'wow zoomInLeft' => 'zoomInLeft',
        'wow zoomInRight' => 'zoomInRight',
        'wow zoomInUp' => 'zoomInUp',
        'wow zoomOut' => 'zoomOut',
        'wow zoomOutDown' => 'zoomOutDown',
        'wow zoomOutLeft' => 'zoomOutLeft',
        'wow zoomOutRight' => 'zoomOutRight',
        'wow zoomOutUp' => 'zoomOutUp',
    );
    return $builderrin_animate_v2;
}


/**
 * Pagram Animation
*/
if(!function_exists('builderrin_widget_animation_settings')){
    function builderrin_widget_animation_settings($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => []
        ]);
        return array(
            'name'      => 'section_animation',
            'label'     => esc_html__('Animation', 'builderrin'),
            'tab'       => $args['tab'],
            'condition' => $args['condition'],
            'controls'  => array_merge(
                array(
                    array(
                        'name' => 'pxl_animate',
                        'label' => esc_html__('Case Animate', 'builderrin' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'options' => builderrin_widget_animate(),
                        'default' => '',
                    ),
                    array(
                        'name' => 'pxl_animate_delay',
                        'label' => esc_html__('Animate Delay', 'builderrin' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '0',
                        'description' => 'Enter number. Default 0ms',
                    ),
                    array(
                        'name' => 'pxl_animate_duration',
                        'label' => esc_html__('Animation Duration', 'builderrin'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'step' => 0.1,
                        'default' => 1.2,
                        'description' => 'Default 1.2s',
                    ),
                )
            )
        );
    }
}

function builderrin_position_option($args = []){
    $start = is_rtl() ? esc_html__( 'Right', 'builderrin' ) : esc_html__( 'Left', 'builderrin' );
    $end = ! is_rtl() ? esc_html__( 'Right', 'builderrin' ) : esc_html__( 'Left', 'builderrin' );
    $args = wp_parse_args($args, [
        'prefix' => '',
        'selectors_class' => '',
        'condition' => []
    ]);
    $options = array(
        array(
            'name'        => $args['prefix'] .'position',
            'label' => ucfirst( str_replace('_', ' ', $args['prefix']) ).' '.esc_html__( 'Position', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'control_type' => 'responsive',
            'default' => '',
            'options' => [
                'relative' => esc_html__( 'Default', 'builderrin' ),
                'absolute' => esc_html__( 'Absolute', 'builderrin' ),
            ],
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'position: {{VALUE}}',
            ],
            'frontend_available' => true,
            'condition'   => $args['condition'],
        ),

        array(
            'name'        => $args['prefix'] .'pos_offset_left',
            'label' => esc_html__( 'Left', 'builderrin' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'left: {{VALUE}}',
            ],
            'condition'   => array_merge($args['condition'], [ $args['prefix'] .'position!' => '' ]),
        ),
        array(
            'name'        => $args['prefix'] .'pos_offset_right',
            'label' => esc_html__( 'Right', 'builderrin' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'right: {{VALUE}}',
            ],
            'condition'   => array_merge($args['condition'], [ $args['prefix'] .'position!' => '' ]),

        ),
        array(
            'name'        => $args['prefix'] .'pos_offset_top',
            'label' => esc_html__( 'Top', 'builderrin' ).' (50px) px,%,vh,auto',
            'type' => 'text',
            'default' => '',
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'top: {{VALUE}}',
            ],
            'condition'   => array_merge($args['condition'], [ $args['prefix'] .'position!' => '']),

        ),
        array(
            'name'        => $args['prefix'] .'pos_offset_bottom',
            'label' => esc_html__( 'Bottom', 'builderrin' ).' (50px) px,%,vh,auto',
            'type' => 'text',
            'default' => '',
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'bottom: {{VALUE}}',
            ],
            'condition'   => array_merge($args['condition'], [ $args['prefix'] .'position!' => '']),
        ),
        array(
            'name'        => $args['prefix'] .'z_index',
            'label' => ucfirst( str_replace('_', ' ', $args['prefix']) ).' '. esc_html__( 'Z-Index', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'z-index: {{VALUE}};',
            ],
            'condition'   => array_merge($args['condition'], [ $args['prefix'] .'position!' => '' ]),
        )
    );
    return $options;
}

function builderrin_transform_option($args = []){
    $transform_prefix_class = 'pxl-';
    $transform_return_value = 'transform';
    $args = wp_parse_args($args, [
        'prefix' => '',
        'selectors_class' => '',
        'condition' => []
    ]);
    $options = array(
        array(
            'name'        => $args['prefix'] .'transform_translate_popover',
            'label' => ucfirst( str_replace('_', ' ', $args['prefix']) ).' '. esc_html__( 'Transform', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'prefix_class' => $transform_prefix_class,
            'return_value' => $transform_return_value,
            'condition'   => $args['condition'],
        ),
        array(
            'name'        => $args['prefix'] .'pxl_start_popover',
            'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'Start Popover', 'builderrin' ),
            'type'        => 'pxl_start_popover',
            'condition'   => $args['condition'],
        ),
        array(
            'name'        => $args['prefix'] .'transform_translateX_effect',
            'label' => esc_html__( 'Offset X', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ '%', 'px' ],
            'range' => [
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'px' => [
                    'min' => -1000,
                    'max' => 1000,
                ],
            ],
            'control_type' => 'responsive',
            'condition' => [
                $args['prefix'] .'transform_translate_popover!' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => '--pxl-transform-translateX: {{SIZE}}{{UNIT}};',
            ],
            'frontend_available' => true,
        ),
        array(
            'name'        => $args['prefix'] .'_transform_translateY_effect',
            'label' => esc_html__( 'Offset Y', 'builderrin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ '%', 'px' ],
            'range' => [
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'px' => [
                    'min' => -1000,
                    'max' => 1000,
                ],
            ],
            'control_type' => 'responsive',
            'condition' => [
                $args['prefix'] .'transform_translate_popover!' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => '--pxl-transform-translateY: {{SIZE}}{{UNIT}};',
            ],
            'frontend_available' => true,
        ),
        array(
            'name'        => $args['prefix'] .'pxl_end_popover',
            'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'End Popover', 'builderrin' ),
            'type'        => 'pxl_end_popover',
            'condition'   => $args['condition'],
        ),
    );
    return $options;
}

function builderrin_cursor_opts(){
    $enable_cursor = builderrin()->get_opt('enable_cursor', '0');
    if($enable_cursor == '0') return;
    return array(
        'name' => 'carousel_setting_cursor',
        'label' => esc_html__('Cursor Settings', 'builderrin' ),
        'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
        'controls' =>  array( 
            array(
                'name' => 'cursor_arrow',
                'label' => esc_html__('Cursor Arrow', 'builderrin'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'condition' => ['arrows' => 'true']
            ),
            array(
                'name' => 'cursor_drag',
                'label' => esc_html__('Cursor Drag', 'builderrin'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
            )
            
        )
    );
}

function builderrin_grid_column_settings(){
    $options = [
        '12' => '12',
        '6'  => '6',
        '5'  => '5',
        '4'  => '4',
        '3'  => '3',
        '2'  => '2',
        '1'  => '1'
    ];
    return array(
        array(
            'name'    => 'col_xs',
            'label'   => esc_html__( 'Extra Small <= 575', 'builderrin' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => $options
        ),
        array(
            'name'    => 'col_sm',
            'label'   => esc_html__( 'Small <= 767', 'builderrin' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => $options
        ),
        array(
            'name'    => 'col_md',
            'label'   => esc_html__( 'Medium <= 991', 'builderrin' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => $options
        ),
        array(
            'name'    => 'col_lg',
            'label'   => esc_html__( 'Large <= 1199', 'builderrin' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => $options
        ),
        array(
            'name'    => 'col_xl',
            'label'   => esc_html__( 'XL Devices >= 1200', 'builderrin' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '4',
            'options' => $options
        ),
        array(
            'name'    => 'col_xxl',
            'label'   => esc_html__( 'XXL Devices >= 1400', 'builderrin' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '4',
            'options' => $options
        )
    );
}
function pxl_get_product_grid_term_options($args=[]){
    $product_categories = get_categories(array( 'taxonomy' => 'product_cat' ));
    $options = array();
    foreach($product_categories as $category){
        $options[$category->slug] = $category->name;
    }
    return $options;
}

function builderrin_parallax_effect_option($args = []){

    $args = wp_parse_args($args, [
        'prefix' => '',
        'condition' => []
    ]);
    $options = array(
        array(
            'name'         => $args['prefix'] .'parallax_effect_popover',
            'label'        => ucfirst( str_replace('_', ' ', $args['prefix']) ).' '. esc_html__( 'Parallax Effect', 'builderrin' ),
            'type'         => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off'    => esc_html__( 'Default', 'builderrin' ),
            'label_on'     => esc_html__( 'Custom', 'builderrin' ),
            'return_value' => 'yes',
            'condition'    => $args['condition'],
        ),
        array(
            'name'        => $args['prefix'] .'pxl_start_popover',
            'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'Start Popover', 'builderrin' ),
            'type'        => 'pxl_start_popover',
            'condition'   => $args['condition'],
        ),
        array(
            'name'      => $args['prefix'] .'parallax_effect_x',
            'label'     => esc_html__( 'TranslateX', 'builderrin' ).' (-80)', 
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'default'   => '',
            'condition' => $args['condition'],
        ),
        array(
            'name'      => $args['prefix'] .'parallax_effect_y',
            'label'     => esc_html__( 'TranslateY', 'builderrin' ).' (-80)', 
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'default'   => '',
            'condition' => $args['condition'],
        ),
        array(
            'name'      => $args['prefix'] .'parallax_effect_z',
            'label'     => esc_html__( 'TranslateZ', 'builderrin' ).' (-80)', 
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'default'   => '',
            'condition' => $args['condition'],
        ),
        array(
            'name'      => $args['prefix'] .'parallax_effect_rotate_x',
            'label'     => esc_html__( 'Rotate X', 'builderrin' ).' (30)', 
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'default'   => '',
            'condition' => $args['condition'],
        ),
        array(
            'name'      => $args['prefix'] .'parallax_effect_rotate_y',
            'label'     => esc_html__( 'Rotate Y', 'builderrin' ).' (30)', 
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'default'   => '',
            'condition' => $args['condition'],
        ),
        array(
            'name'      => $args['prefix'] .'parallax_effect_rotate_z',
            'label'     => esc_html__( 'Rotate Z', 'builderrin' ).' (30)', 
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'default'   => '',
            'condition' => $args['condition'],
        ),
        array(
            'name'      => $args['prefix'] .'parallax_effect_scale_x',
            'label'     => esc_html__( 'Scale X', 'builderrin' ).' (0.8)', 
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'default'   => '',
            'condition' => $args['condition'],
        ),
        array(
            'name'      => $args['prefix'] .'parallax_effect_scale_y',
            'label'     => esc_html__( 'Scale Y', 'builderrin' ).' (0.8)', 
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'default'   => '',
            'condition' => $args['condition'],
        ),
        array(
            'name'      => $args['prefix'] .'parallax_effect_scale_z',
            'label'     => esc_html__( 'Scale Z', 'builderrin' ).' (0.8)', 
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'default'   => '',
            'condition' => $args['condition'],
        ),
        array(
            'name'      => $args['prefix'] .'parallax_effect_scale',
            'label'     => esc_html__( 'Scale', 'builderrin' ).' (0.8)', 
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'default'   => '',
            'condition' => $args['condition'],
        ),
        array(
            'name'        => $args['prefix'] .'pxl_end_popover',
            'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'End Popover', 'builderrin' ),
            'type'        => 'pxl_end_popover',
            'condition'   => $args['condition'],
        ), 

    );
return $options;
}

function builderrin_get_parallax_effect($settings = []){
    $effects = [];
    if(!empty($settings['layer_parallax_effect_x'])){
        $effects['x'] = (int)$settings['layer_parallax_effect_x'];
    }
    if(!empty($settings['layer_parallax_effect_y'])){
        $effects['y'] = (int)$settings['layer_parallax_effect_y'];
    }
    if(!empty($settings['layer_parallax_effect_z'])){
        $effects['y'] = (int)$settings['layer_parallax_effect_z'];
    }
    if(!empty($settings['layer_parallax_effect_rotate_x'])){
        $effects['rotateX'] = (float)$settings['layer_parallax_effect_rotate_x'];
    }
    if(!empty($settings['layer_parallax_effect_rotate_y'])){
        $effects['rotateY'] = (float)$settings['layer_parallax_effect_rotate_y'];
    }
    if(!empty($settings['layer_parallax_effect_rotate_z'])){
        $effects['rotateY'] = (float)$settings['layer_parallax_effect_rotate_z'];
    }
    if(!empty($settings['layer_parallax_effect_scale_x'])){
        $effects['scaleX'] = (float)$settings['layer_parallax_effect_scale_x'];
    }
    if(!empty($settings['layer_parallax_effect_scale_y'])){
        $effects['scaleY'] = (float)$settings['layer_parallax_effect_scale_y'];
    }
    if(!empty($settings['layer_parallax_effect_scale_z'])){
        $effects['scaleZ'] = (float)$settings['layer_parallax_effect_scale_z'];
    }
    if(!empty($settings['layer_parallax_effect_scale'])){
        $effects['scale'] = (float)$settings['layer_parallax_effect_scale'];
    }

    return json_encode($effects);
}

function builderrin_get_img_link_url( $settings ) {
    if ( 'none' === $settings['link_to'] ) {
        return false;
    }

    if ( 'custom' === $settings['link_to'] ) {
        if ( empty( $settings['link']['url'] ) ) {
            return false;
        }

        return $settings['link'];
    }

    return [
        'url' => $settings['image']['url'],
    ];
}