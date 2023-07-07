<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

$opt_name = builderrin()->get_option_name();
$version = builderrin()->get_version();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => '', //$theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $version,
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu', //class_exists('Pxltheme_Core') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'builderrin'),
    'page_title'           => esc_html__('Theme Options', 'builderrin'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => 80,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'pxlart', //class_exists('Builderrin_Admin_Page') ? 'case' : '',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'pxlart-theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'builderrin'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'builderrin'),
            'default'  => '',
            'url'      => false
        ),
        array(
            'id'       => 'site_loader',
            'type'     => 'switch',
            'title'    => esc_html__('Loader', 'builderrin'),
            'default'  => false
        ),
        array(
            'id'    => 'loader_style',
            'type'  => 'select',
            'title' => esc_html__('Loader Style', 'builderrin'),
            'options' => [
                'style-1'           => esc_html__('Style1', 'builderrin'),
                'style-2'          => esc_html__('style2', 'builderrin'),
            ],
            'default' => 'style-1',
            'indent' => true,
            'required' => array( 0 => 'site_loader', 1 => 'equals', 2 => true ),
        ),
        array(
            'id'       => 'enable_cursor',
            'type'     => 'button_set',
            'title'    => esc_html__('Enable Cursor', 'builderrin'),
            'options'  => [
                '1'  => esc_html__('Yes','builderrin'),
                '0'  => esc_html__('No','builderrin'),
            ],
            'default'  => '0',
        ),
        array(
            'id'       => 'hide_cursor_follower',
            'type'     => 'switch',
            'title'    => esc_html__('Hide Outer Follower circle cursor', 'builderrin'),
            'default'  => false,
        ), 
        array(
            'id'       => 'smooth_scroll',
            'type'     => 'switch',
            'title'    => esc_html__('Smooth Scroll', 'builderrin'),
            'default'  => false
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('API Key', 'builderrin'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'api_key',
            'type'    => 'text',
            'title'   => esc_html__('Google Map API Key', 'builderrin'),
            'default' => '',
        ),
    )
));

/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'builderrin'),
    'icon'   => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'       => 'button_light_dark_on',
            'type'     => 'switch',
            'title'    => esc_html__('Button Switch Light/Dark', 'builderrin'),
            'default'  => false,
        ),
        array(
            'id'       => 'light_dark_switch',
            'type'     => 'button_set',
            'title'    => esc_html__('Color Mode', 'builderrin'),
            'options'  => array(
                'pxl-light-mode' => esc_html__('Light Layous', 'builderrin'),
                'pxl-dark-mode'  => esc_html__('Dark Layous', 'builderrin'),
            ),
            'default'  => 'pxl-light-mode',
        ),
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'builderrin'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'builderrin'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'third_color',
            'type'        => 'color',
            'title'       => esc_html__('Third Color', 'builderrin'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'fourth_color',
            'type'        => 'color',
            'title'       => esc_html__('Fourth Color', 'builderrin'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'fifth_color',
            'type'        => 'color',
            'title'       => esc_html__('Fifth Color', 'builderrin'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'sixth_color',
            'type'        => 'color',
            'title'       => esc_html__('Sixth Color', 'builderrin'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'seventh_color',
            'type'        => 'color',
            'title'       => esc_html__('Seventh Color', 'builderrin'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'eighth_color',
            'type'        => 'color',
            'title'       => esc_html__('Eighth Color', 'builderrin'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'nine_color',
            'type'        => 'color',
            'title'       => esc_html__('Nine Color', 'builderrin'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'builderrin'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'  => ''
            ),
            'output'  => array('a')
        ),
    )
));


/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'builderrin'),
    'icon'   => 'el el-indent-left',
    'fields' => array_merge(
        builderrin_header_opts(),
        array(
            array(
                'id'       => 'sticky_scroll',
                'type'     => 'button_set',
                'title'    => esc_html__('Sticky Scroll', 'builderrin'),
                'options'  => array(
                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'builderrin'),
                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'builderrin'),
                ),
                'default'  => 'pxl-sticky-stb',
            ),
        )
    )
));


Redux::setSection($opt_name, array(
    'title'      => esc_html__('Header Mobile', 'builderrin'),
    'icon'       => 'el el-indent-left',
    'fields'     => array_merge(
        builderrin_header_mobile_opts()
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mobile', 'builderrin'),
    'icon'       => 'el el-picture',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'logo_m',
            'type'     => 'media',
            'title'    => esc_html__('Logo Light', 'builderrin'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/img/logo-light.png'
            ),
            'url'      => false
        ),
        array(
            'id'       => 'logo_m_dark',
            'type'     => 'media',
            'title'    => esc_html__('Logo Dark', 'builderrin'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/img/logo-dark.png'
            ),
            'url'      => false
        ),
        array(
            'id'       => 'logo_height',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Height', 'builderrin'),
            'width'    => false,
            'unit'     => 'px',
            'output'    => array('#pxl-header-default .pxl-header-branding img, .pxl-logo-mobile img'),
        ),
        array(
            'id'       => 'search_mobile',
            'type'     => 'switch',
            'title'    => esc_html__('Search Form', 'builderrin'),
            'default'  => true
        )
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'builderrin'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array_merge(
        builderrin_page_title_opts()
    )
));


/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'builderrin'),
    'icon'   => 'el el-website',
    'fields' => array_merge(
        builderrin_footer_opts(),
        array(
            array(
                'id'       => 'back_totop_on',
                'type'     => 'switch',
                'title'    => esc_html__('Button Back to Top', 'builderrin'),
                'default'  => false,
            ),
            array(
                'id'       => 'footer_fixed',
                'type'     => 'switch',
                'title'    => esc_html__('Footer Fixed', 'builderrin'),
                'default'  => false,
            )
        )
    )

));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Archive', 'builderrin'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array_merge(
        builderrin_sidebar_pos_opts([ 'prefix' => 'blog_']),
        array(
            array(
                'id'       => 'archive_category',
                'title'    => esc_html__('Category', 'builderrin'),
                'subtitle' => esc_html__('Display the Category for each blog post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_date',
                'title'    => esc_html__('Date', 'builderrin'),
                'subtitle' => esc_html__('Display the Date for each blog post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_excerpts',
                'title'    => esc_html__('Excerpt', 'builderrin'),
                'subtitle' => esc_html__('Show Excerpt for blog post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'      => 'archive_excerpt_length',
                'type'    => 'text',
                'title'   => esc_html__('Excerpt Length', 'builderrin'),
                'default' => '',
                'subtitle' => esc_html__('Default: 50', 'builderrin'),
                'required' => array( 0 => 'archive_excerpts', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'      => 'archive_readmore_text',
                'type'    => 'text',
                'title'   => esc_html__('Button Text', 'builderrin'),
                'default' => '',
                'subtitle' => esc_html__('Default: Read more', 'builderrin'),
                'required' => array( 0 => 'archive_excerpts', 1 => 'equals', 2 => '1' ),
            )
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'builderrin'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array_merge(
        builderrin_sidebar_pos_opts([ 'prefix' => 'post_']),
        array(
            array(
                'id'       => 'post_title',
                'title'    => esc_html__('Title', 'builderrin'),
                'subtitle' => esc_html__('Show Title on single post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_category',
                'title'    => esc_html__('Category', 'builderrin'),
                'subtitle' => esc_html__('Display the Category for blog post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_date',
                'title'    => esc_html__('Date', 'builderrin'),
                'subtitle' => esc_html__('Display the Date for blog post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_author_box_info',
                'title'    => esc_html__('Author Box Info', 'builderrin'),
                'subtitle' => esc_html__('Show author box info for blog post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_author_position',
                'type'     => 'text',
                'title'    => esc_html__('Position For User', 'builderrin'),
                'subtitle' => esc_html__('Show the position of the author, who posted the article.', 'builderrin'),
                'default'  => '',
                'required' => array( 0 => 'post_author_box_info', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'post_navigation',
                'title'    => esc_html__('Navigation', 'builderrin'),
                'subtitle' => esc_html__('Display the Navigation for blog post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'post_tag',
                'title'    => esc_html__('Tags', 'builderrin'),
                'subtitle' => esc_html__('Display the Tag for blog post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id' => 'social_section',
                'title' => esc_html__('Social', 'builderrin'),
                'type'  => 'section',
                'indent' => true,
            ),
            array(
                'id'       => 'post_social_share',
                'title'    => esc_html__('Social', 'builderrin'),
                'subtitle' => esc_html__('Display the Social Share for blog post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'social_facebook',
                'title'    => esc_html__('Facebook', 'builderrin'),
                'type'     => 'switch',
                'default'  => false,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_twitter',
                'title'    => esc_html__('Twitter', 'builderrin'),
                'type'     => 'switch',
                'default'  => false,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_pinterest',
                'title'    => esc_html__('Pinterest', 'builderrin'),
                'type'     => 'switch',
                'default'  => false,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_linkedin',
                'title'    => esc_html__('LinkedIn', 'builderrin'),
                'type'     => 'switch',
                'default'  => false,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id' => 'post_related_on',
                'title' => esc_html__('Post Related', 'builderrin'),
                'type'  => 'section',
                'indent' => true,
            ),
            array(
                'id'       => 'post_related',
                'title'    => esc_html__('Post Related', 'builderrin'),
                'subtitle' => esc_html__('Show Post Related for blog post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => false
            ),
            array(
                'id'       => 'post_related_title',
                'type'     => 'text',
                'title'    => esc_html__('Related Title Text', 'builderrin'),
                'placeholder' => esc_html__('Related posts', 'builderrin' ),
                'required' => array( 0 => 'post_related', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'post_related_text',
                'type'     => 'text',
                'title'    => esc_html__('Related Button Text', 'builderrin'),
                'placeholder' => esc_html__('Browse All', 'builderrin' ),
                'required' => array( 0 => 'post_related', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'post_related_link',
                'type'     => 'text',
                'title'    => esc_html__('Related Button Link', 'builderrin'),
                'default'  => '#',
                'required' => array( 0 => 'post_related', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'      => 'post_related_excerpt_line',
                'type'    => 'text',
                'title'   => esc_html__('Excerpt Line', 'builderrin'),
                'default' => '',
                'required' => array( 0 => 'post_related', 1 => 'equals', 2 => '1' ),
            ),
        )
)
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Service', 'builderrin'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array_merge(
        array(
            array(
                'id'       => 'post_title_service_on',
                'title'    => esc_html__('Title', 'builderrin'),
                'subtitle' => esc_html__('Show Title on service post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'service_navigation',
                'title'    => esc_html__('Navigation', 'builderrin'),
                'subtitle' => esc_html__('Display the Navigation for service post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'service_nav_link',
                'type'     => 'text',
                'title'    => esc_html__('Navigation Button Link', 'builderrin'),
                'subtitle' => esc_html__('Enter navigation middle button link.', 'builderrin'),
                'default'  => '#',
                'required' => array( 0 => 'service_navigation', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'service_nav_text',
                'type'     => 'text',
                'title'    => esc_html__('Text caption', 'builderrin'),
                'subtitle' => esc_html__('Text caption middle button link on hover.', 'builderrin'),
                'placeholder' => esc_html__('Show All Services', 'builderrin' ),
                'required' => array( 0 => 'service_navigation', 1 => 'equals', 2 => '1' ),
            ),
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Portfolio', 'builderrin'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array_merge(
        array(
            array(
                'id'       => 'post_title_portfolio_on',
                'title'    => esc_html__('Title', 'builderrin'),
                'subtitle' => esc_html__('Show Title on portfolio post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_tag_portfolio',
                'title'    => esc_html__('Tags', 'builderrin'),
                'subtitle' => esc_html__('Display the Tag for blog post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'portfolio_navigation',
                'title'    => esc_html__('Navigation', 'builderrin'),
                'subtitle' => esc_html__('Display the Navigation for portfolio post.', 'builderrin'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'portfolio_nav_link',
                'type'     => 'text',
                'title'    => esc_html__('Navigation Button Link', 'builderrin'),
                'subtitle' => esc_html__('Enter navigation middle button link.', 'builderrin'),
                'default'  => '#',
                'required' => array( 0 => 'portfolio_navigation', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'portfolio_nav_text',
                'type'     => 'text',
                'title'    => esc_html__('Text caption', 'builderrin'),
                'subtitle' => esc_html__('Text caption middle button link on hover.', 'builderrin'),
                'placeholder' => esc_html__('Show All Projects', 'builderrin' ),
                'required' => array( 0 => 'portfolio_navigation', 1 => 'equals', 2 => '1' ),
            ),         
        )
    )
));

/*--------------------------------------------------------------
# Woocommerce
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Woocommerce', 'builderrin'),
        'icon'  => 'el el-shopping-cart',
        'fields'     => array_merge(
            builderrin_sidebar_pos_opts([ 'prefix' => 'shop_']),
            array(
                array(
                    'id'    => 'product_style',
                    'type'  => 'select',
                    'title' => esc_html__('Product Style', 'builderrin'),
                    'options' => [
                        'style-1'              => esc_html__('Style 1', 'builderrin'), 
                        'style-2'              => esc_html__('Style 2', 'builderrin'), 
                        'style-3'              => esc_html__('Style 3', 'builderrin'), 
                        'style-4'              => esc_html__('Style 4', 'builderrin'), 
                    ],
                    'default' => 'style-1',
                ),
                array(
                    'title'         => esc_html__('Products displayed per row', 'builderrin'),
                    'id'            => 'products_columns',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show per row', 'builderrin'),
                    'default'       => 3,
                    'min'           => 2,
                    'step'          => 1,
                    'max'           => 6,
                    'display_value' => 'text'
                ),
                array(
                    'id'       => 'shop_layout',
                    'type'     => 'button_set',
                    'title'    => esc_html('Layout', 'builderrin'),
                    'options'  => array(
                        'grid'  => esc_html('Grid Three', 'builderrin'),
                        'list'  => esc_html('List', 'builderrin'),
                        'grid1'  => esc_html('Grid Two', 'builderrin'),
                    ),
                    'default'  => 'grid'
                ),
                array(
                    'title'         => esc_html__('Products displayed per page', 'builderrin'),
                    'id'            => 'product_per_page',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show', 'builderrin'),
                    'default'       => 9,
                    'min'           => 3,
                    'step'          => 1,
                    'max'           => 50,
                    'display_value' => 'text'
                ),
            ),
            builderrin_shop_opts()
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Single Product', 'builderrin'),
        'icon'       => 'el el-shopping-cart',
        'subsection' => true,
        'fields'     => array_merge(
            builderrin_sidebar_pos_opts([ 'prefix' => 'product_']),
            array(
                array(
                    'id'       => 'product_title',
                    'type'     => 'switch',
                    'title'    => esc_html__('Product Title', 'builderrin'),
                    'default'  => true
                ),
                array(
                    'id'       => 'product_social_share',
                    'type'     => 'switch',
                    'title'    => esc_html__('Social Share', 'builderrin'),
                    'default'  => false
                ),
                array(
                    'id'       => 'product_variation_style',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Product Variation Style', 'builderrin'),
                    'subtitle' => esc_html__('Dropdown or selected list', 'builderrin'),
                    'options' => array(
                        'dropdown'  => esc_html__('Dropdown', 'builderrin'),
                        'list' => esc_html__('List', 'builderrin')
                    ),
                    'default' => 'dropdown'
                ),
                array(
                    'id'       => 'product_related',
                    'title'    => esc_html__('Product Related', 'builderrin'),
                    'subtitle' => esc_html__('Show/Hide related product', 'builderrin'),
                    'type'     => 'switch',
                    'default'  => '1',
                ),
                array(
                    'id'      => 'product_related_title',
                    'type'    => 'text',
                    'title'   => esc_html__('Related Title', 'builderrin'),
                    'default' => '',
                    'placeholder' => esc_html__('Popular Products', 'builderrin'),
                    'required' => array( 0 => 'product_related', 1 => 'equals', 2 => '1' ),
                ),
            ),
            builderrin_shop_single_opts()
        )
    ));
}
/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'builderrin'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'          => 'font_body',
            'type'        => 'typography',
            'title'       => esc_html__('Body', 'builderrin'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'output'      => array('body'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 1', 'builderrin'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            // 'output'      => array('h1'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 2', 'builderrin'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            // 'output'      => array('h2'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 3', 'builderrin'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            // 'output'      => array('h3'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 4', 'builderrin'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            // 'output'      => array('h4'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 5', 'builderrin'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            // 'output'      => array('h5'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 6', 'builderrin'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            // 'output'      => array('h6'),
            'units'       => 'px',
        ),
    )
));