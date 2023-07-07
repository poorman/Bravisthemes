<?php
/**
 * Actions Hook for the theme
 *
 * @package Bravisthemes
 */
add_action('after_setup_theme', 'builderrin_setup');
function builderrin_setup(){

    //Set the content width in pixels, based on the theme's design and stylesheet.
    $GLOBALS['content_width'] = apply_filters( 'builderrin_content_width', 1200 );

    // Make theme available for translation.
    load_theme_textdomain( 'builderrin', get_template_directory() . '/languages' );

    // Custom Header
    add_theme_support( 'custom-header' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 1170, 710 );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'builderrin' ),
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for core custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Post formats
    add_theme_support( 'post-formats', array (
        '',
    ) );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    add_image_size( 'builderrin-thumb-small', 100, 100, true );
    add_image_size( 'builderrin-thumb-xs', 170, 120, true );
    add_image_size( 'builderrin-thumb-portfolio', 770, 976, true );
    add_image_size( 'builderrin-thumb-related', 810, 969, true );
    add_image_size( 'builderrin-thumb-medium', 1200, 822, true );
    add_image_size( 'builderrin-thumb-lager', 1170, 617, true );

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    remove_theme_support('widgets-block-editor');

}

/**
 * Register Widgets Position.
 */
add_action( 'widgets_init', 'builderrin_widgets_position' );
function builderrin_widgets_position() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'builderrin' ),
		'id'            => 'sidebar-blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	if (class_exists('ReduxFramework')) {
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'builderrin' ),
			'id'            => 'sidebar-page',
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		) );
	}  

    if (class_exists('ReduxFramework')) {
        register_sidebar( array(
            'name'          => esc_html__( 'Portfolio Sidebar', 'builderrin' ),
            'id'            => 'sidebar-portfolio',
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h2 class="widget-title"><span>',
            'after_title'   => '</span></h2>',
        ) );
    }

    if (class_exists('ReduxFramework')) {
        register_sidebar( array(
            'name'          => esc_html__( 'Service Sidebar', 'builderrin' ),
            'id'            => 'sidebar-service',
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h2 class="widget-title"><span>',
            'after_title'   => '</span></h2>',
        ) );
    }

    if (class_exists('ReduxFramework')) {
        register_sidebar( array(
            'name'          => esc_html__( 'Page Service Sidebar', 'builderrin' ),
            'id'            => 'sidebar-services',
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h2 class="widget-title"><span>',
            'after_title'   => '</span></h2>',
        ) );
    }

    if ( class_exists( 'Woocommerce' ) ) {
      register_sidebar( array(
       'name'          => esc_html__( 'Shop Sidebar', 'builderrin' ),
       'id'            => 'sidebar-shop',
       'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
       'after_widget'  => '</div></section>',
       'before_title'  => '<h2 class="widget-title"><span>',
       'after_title'   => '</span></h2>',
   ) );
  }
}

/**
 * Enqueue Styles Scripts : Front-End
 */
add_action( 'wp_enqueue_scripts', 'builderrin_scripts' );
function builderrin_scripts() {
    $enable_cursor = builderrin()->get_opt('enable_cursor', '0');

    /* Popup Libs */
    wp_enqueue_style( 'twentytwenty', get_template_directory_uri() . '/assets/css/twentytwenty.css', array(), '1.0.0' );
    wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css', array(), '1.0.0' );
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/libs/magnific-popup.css', array(), '1.1.0');
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/libs/magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
    wp_enqueue_style('wow-animate', get_template_directory_uri() . '/assets/css/libs/animate.min.css', array(), '1.1.0');
    wp_enqueue_script( 'wow-animate', get_template_directory_uri() . '/assets/js/libs/wow.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/libs/nice-select.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'slick-lib', get_template_directory_uri() . '/assets/js/libs/slick.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'progressbar', get_template_directory_uri() . '/assets/js/libs/progressbar.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'easy-pie-chart-lib', get_template_directory_uri() . '/assets/js/libs/easy-pie-chart.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_style('custom-scrollbars', get_template_directory_uri() . '/assets/css/libs/overlayscrollbars.css', array(), '1.1.0');
    wp_enqueue_script( 'overlayscrollbars', get_template_directory_uri() . '/assets/js/libs/overlayscrollbars.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'tween-max', get_template_directory_uri() . '/assets/js/libs/tweenmax.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'scroll-magic', get_template_directory_uri() . '/assets/js/libs/scrollmagic.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'animation-gsap', get_template_directory_uri() . '/assets/js/libs/animation-gsap.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'particles-animate', get_template_directory_uri() . '/assets/js/libs/particles.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'gsap', get_template_directory_uri() . '/assets/js/libs/gsap.min.js', array( 'jquery' ), '3.5.0', true );
    wp_enqueue_script( 'jquery-ui-slider' );

    /* Parallax Image */
    wp_register_script( 'tilt', get_template_directory_uri() . '/assets/js/libs/tilt.min.js', array( 'jquery' ), '1.0.0', true );

    /* Parallax Libs */
    wp_register_script( 'stellar-parallax', get_template_directory_uri() . '/assets/js/libs/stellar-parallax.min.js', array( 'jquery' ), '0.6.2', true );
    if( $enable_cursor == '1')
        wp_enqueue_script( 'builderrin-cursor', get_template_directory_uri() . '/assets/js/libs/cursor.js', array( 'jquery' ), builderrin()->get_version(), true );
    wp_register_script( 'stellar-parallax', get_template_directory_uri() . '/assets/js/libs/stellar-parallax.min.js', array( 'jquery' ), '0.6.2', true );

    /* Icons Lib - CSS */
    wp_enqueue_style('icomoon', get_template_directory_uri() . '/assets/fonts/icomoon/css/icomoon.css');
    wp_enqueue_style('pxl-awesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/awesome.css');
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css');

    // Image Before After
    wp_register_script( 'event-move', get_template_directory_uri() . '/assets/js/libs/event.move.js', array( 'jquery' ), '1.0.0', true );
    wp_register_script( 'twentytwenty', get_template_directory_uri() . '/assets/js/libs/twentytwenty.js', array( 'jquery' ), '1.0.0', true );
    wp_register_script( 'pxl-twentytwenty', get_template_directory_uri() . '/elements/widgets/js/pxl-twentytwenty.js', array( 'jquery' ), '1.0.0', true );

    $builderrin_version = wp_get_theme( get_template() );
    wp_enqueue_style( 'pxl-caseicon', get_template_directory_uri() . '/assets/css/caseicon.css', array(), $builderrin_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-grid', get_template_directory_uri() . '/assets/css/grid.css', array(), $builderrin_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-style', get_template_directory_uri() . '/assets/css/style.css', array(), $builderrin_version->get( 'Version' ) );
    wp_add_inline_style( 'pxl-style', builderrin_inline_styles() );
    wp_enqueue_style( 'pxl-base', get_template_directory_uri() . '/style.css', array(), $builderrin_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-google-fonts', builderrin_fonts_url(), array(), null );
    wp_enqueue_script( 'pxl-main', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), $builderrin_version->get( 'Version' ), true );
    wp_enqueue_script( 'pxl-woocommerce', get_template_directory_uri() . '/woocommerce/woocommerce.js', array( 'jquery' ), $builderrin_version->get( 'Version' ), true );
    wp_localize_script( 'pxl-main', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    do_action( 'builderrin_scripts');
}

/**
 * Enqueue Styles Scripts : Back-End
 */
add_action('admin_enqueue_scripts', 'builderrin_admin_style');
function builderrin_admin_style() {
    $theme = wp_get_theme( get_template() );
    wp_enqueue_style( 'builderrin-admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), $theme->get( 'Version' ) );
    wp_enqueue_style('icomoon', get_template_directory_uri() . '/assets/fonts/icomoon/css/icomoon.css');
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css');
}

add_action( 'elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style( 'admin-icomoon', get_template_directory_uri() . '/assets/fonts/icomoon/css/icomoon.css');
    wp_enqueue_style( 'admin-flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css');
    wp_enqueue_style( 'builderrin-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
} );

/* Favicon */
add_action('wp_head', 'builderrin_site_favicon');
function builderrin_site_favicon(){
    $favicon = builderrin()->get_theme_opt( 'favicon' );
    if(!empty($favicon['url']))
        echo '<link rel="icon" type="image/png" href="'.esc_url($favicon['url']).'"/>';
}

add_action( 'pxl_anchor_target', 'builderrin_cursor_render');
function builderrin_cursor_render(){  

    $enable_cursor          = builderrin()->get_opt('enable_cursor', '0');
    $hide_cursor_follower   = builderrin()->get_theme_opt('hide_cursor_follower', '0');
    $none_follower = $hide_cursor_follower == '1' ? 'none-follower' : 'has-follower' ;
    if($enable_cursor == '0') return;
    ?>
    <div class="pxl-cursor pos-fix <?php echo esc_attr($none_follower) ?>"></div>
    <?php if($hide_cursor_follower != '1'): ?>
        <div class="pxl-cursor-follower pos-fix"></div>
    <?php endif; ?>
    <div class="pxl-cursor-arrow-prev pos-fix <?php echo esc_attr($none_follower) ?>"><span class="icon flaticon flaticon-right-chevron rotate-180"></span><span class="text"><?php echo esc_html__( 'Prev', 'builderrin' ) ?></span></div>
    <div class="pxl-cursor-arrow-next pos-fix <?php echo esc_attr($none_follower) ?>"><span class="text"><?php echo esc_html__( 'Next', 'builderrin' ) ?></span><span class="icon flaticon flaticon-right-chevron"></span></div>
    <div class="pxl-cursor-drag pos-fix <?php echo esc_attr($none_follower) ?>">
        <span class="pxl-overlay"></span>
        <span class="icon icon-left flaticon fal fa-chevron-right rotate-180"></span>
        <span class="text"><?php echo esc_html__( 'Drag', 'builderrin' ) ?></span>
        <span class="icon icon-right flaticon fal fa-chevron-right"></span>
    </div>
    <div class="pxl-cursor-map pos-fix <?php echo esc_attr($none_follower) ?>"><?php echo esc_html__( 'Map', 'builderrin' ) ?></div>
    <div class="pxl-cursor-text pos-fix <?php echo esc_attr($none_follower) ?>"></div>
    <div class="pxl-cursor-icon pos-fix <?php echo esc_attr($none_follower) ?>"></div>
    <?php 
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
add_action( 'wp_head', 'builderrin_pingback_header' );
function builderrin_pingback_header() {
    if ( is_singular() && pings_open() )
    {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}

add_action( 'elementor/preview/enqueue_styles', 'builderrin_add_editor_preview_style' );
function builderrin_add_editor_preview_style() {
    wp_add_inline_style( 'editor-preview', builderrin_editor_preview_inline_styles() );
}
function builderrin_editor_preview_inline_styles(){
    $theme_colors = builderrin_configs('theme_colors');
    ob_start();
    echo '.elementor-edit-area-active{';
    foreach ($theme_colors as $color => $value) {
        printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
    }
    echo '}';
    return ob_get_clean();
}

add_action( 'pxl_anchor_target', 'builderrin_hook_anchor_templates_hidden_panel');
function builderrin_hook_anchor_templates_hidden_panel(){

    $hidden_templates = builderrin_get_templates_slug('hidden-panel');
    if(empty($hidden_templates)) return;

    foreach ($hidden_templates as $slug => $values){
        $args = [
            'slug' => $slug,
            'post_id' => $values['post_id'],
            'position' => !empty($values['position']) ? $values['position'] : 'custom-pos'
        ];
        if( did_action('pxl_anchor_target_hidden_panel_'.$values['post_id']) <= 0){
            //can be assign from here: do_action( 'pxl_anchor_target_hidden_panel_'.$slug);
            do_action( 'pxl_anchor_target_hidden_panel_'.$values['post_id'], $args );
        }
    }
}

function builderrin_hook_anchor_hidden_panel($args){
    ?>
    <div class="pxl-overlay-drop"></div>
    <div class="pxl-hidden-template pxl-hidden-template-<?php echo esc_attr($args['post_id'])?> pos-<?php echo esc_attr($args['position']) ?>">
        <div class="pxl-hidden-template-wrap">
            <div class="pxl-panel-header">
                <div class="panel-header-inner">
                    <span class="pxl-close pxl-close-drop" title="<?php echo esc_attr__( 'Close', 'builderrin' ) ?>"></span>
                </div>
            </div>
            <div class="pxl-panel-content" data-lenis-prevent>
             <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$args['post_id']); ?>
         </div>
     </div>
 </div>
 <?php
}

function builderrin_hook_anchor_custom(){
    return;
}

/* Search Popup */
if(!function_exists('builderrin_hook_anchor_search')){
    function builderrin_hook_anchor_search(){ ?>
        <div id="pxl-search-popup">
            <div class="pxl-item--overlay"></div>
            <div class="pxl-item--conent">
                <div class="pxl-item--close pxl-close"></div>
                <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                    <input type="text" placeholder="<?php esc_attr_e('Type Your Search Words...', 'builderrin'); ?>" name="s" class="search-field" />
                    <button type="submit" class="search-submit rm-style-default"><i class="caseicon-search"></i></button>
                    <div class="pxl--search-divider"></div>
                </form>
            </div>
        </div>
    <?php }
}
/* Cart Sidebar */
if(!function_exists('builderrin_hook_anchor_cart')){
    function builderrin_hook_anchor_cart(){ ?>
        <div class="pxl-overlay-drop"></div>
        <div class="pxl-hidden-template pxl-side-cart pos-right">
            <div class="pxl-hidden-template-wrap">
                <div class="pxl-panel-header">
                    <div class="panel-header-inner">
                        <span class="pxl-title h3"><?php echo esc_html__( 'Cart', 'builderrin' ) ?><span class="widget_cart_counter">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'builderrin' ), WC()->cart->cart_contents_count ); ?>)</span></span>
                        <span class="pxl-close pxl-close-drop" title="<?php echo esc_attr__( 'Close', 'builderrin' ) ?>"></span>
                    </div>
                </div>
                <div class="pxl-panel-content widget_shopping_cart" data-lenis-prevent>
                    <div class="widget_shopping_cart_content">
                        <?php woocommerce_mini_cart(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}
