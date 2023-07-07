<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
get_template_part( 'inc/admin/libs/tgmpa/class-tgm-plugin-activation' );

add_action( 'tgmpa_register', 'builderrin_register_required_plugins' );
function builderrin_register_required_plugins() {
    include( locate_template( 'inc/admin/demo-data/demo-config.php' ) );
    $pxl_server_info = apply_filters( 'pxl_server_info', ['plugin_url' => 'https://api.bravisthemes.com/plugins/'] ) ;
    $default_path = $pxl_server_info['plugin_url'];
    $images = get_template_directory_uri() . '/inc/admin/assets/img/plugins';
    $plugins = array(
        array(
            'name'               => esc_html__('Redux Framework', 'builderrin'),
            'slug'               => 'redux-framework',
            'required'           => true,
            'logo'        => $images . '/redux.png',
            'description' => esc_html__( 'Build theme options and post, page options for WordPress Theme.', 'builderrin' ),
        ),

        array(
            'name'               => esc_html__('Elementor', 'builderrin'),
            'slug'               => 'elementor',
            'required'           => true,
            'logo'        => $images . '/elementor.png',
            'description' => esc_html__( 'Introducing a WordPress website builder, with no limits of design. A website builder that delivers high-end page designs.', 'builderrin' ),
        ),

        array(
            'name'               => esc_html__('Bravis Addons', 'builderrin'),
            'slug'               => 'bravis-addons',
            'source'             => 'bravis-addons.zip',
            'required'           => true,
            'logo'        => $images . '/bravis-logo.png',
            'description' => esc_html__( 'Main process and Powerful Elements Plugin, exclusively for Builderrin WordPress Theme.', 'builderrin' ),
        ),

        array(
            'name'               => esc_html__('Revolution Slider', 'builderrin'),
            'slug'               => 'revslider',
            'source'             => 'revslider.zip',
            'required'           => true,
            'logo'        => $images . '/rev-slider.png',
            'description' => esc_html__( 'Revolution Slider helps beginner-and mid-level designers WOW their clients with pro-level visuals. You’ll be able to create anything you can imagine.', 'builderrin' )
        ),

        array(
            'name'               => esc_html__('Contact Form 7', 'builderrin'),
            'slug'               => 'contact-form-7',
            'required'           => true,
            'logo'        => $images . '/contact-f7.png',
            'description' => esc_html__( 'Contact Form 7 can manage multiple contact forms, you can customize the form and the mail contents flexibly with simple markup', 'builderrin' ),

        ),

        array(
            'name'               => esc_html__('WooCommerce', 'builderrin'),
            'slug'               => "woocommerce",
            'required'           => true,
            'logo'        => $images . '/woo.png',
            'description' => esc_html__( 'WooCommerce is the world’s most popular open-source eCommerce solution.', 'builderrin' ),
        ),
        array(
            'name'               => esc_html__('WPC AJAX Add to Cart', 'builderrin'),
            'slug'               => "wpc-ajax-add-to-cart",
            'required'           => true,
            'logo'        => $images . '/woo-ajax-add-to-cart.png',
            'description' => esc_html__( 'WPC AJAX Add to Cart for WooCommerce is a highly effective plugin for helping online stores cut down the site’s loading time.', 'builderrin' ),
        ),

        array(
            'name'               => esc_html__('Variation Swatches for WooCommerce', 'builderrin'),
            'slug'               => "woo-variation-swatches",
            'required'           => true,
            'logo'        => $images . '/woo-variation-swatches.gif',
            'description' => esc_html__( 'Variation Swatches is easy to use WooCommerce product variation swatches plugin.', 'builderrin' ),
        ),

        array(
            'name'               => esc_html__('Wishlist for WooCommerce', 'builderrin'),
            'slug'               => "woo-smart-wishlist",
            'required'           => false,
            'logo'        => $images . '/woo-smart-wishlist.png',
            'description' => esc_html__( 'WPC Smart Wishlist is a simple but powerful tool that can help your customer save products for buying later.', 'builderrin' ),
        ),

        array(
            'name'               => esc_html__('Smart Quick View for WooCommerce', 'builderrin'),
            'slug'               => "woo-smart-quick-view",
            'required'           => false,
            'logo'        => $images . '/woo-smart-quickview.png',
            'description' => esc_html__( 'WPC Smart Quick View allows users to get a quick look of products without opening the product page.', 'builderrin' ),
        ),

        array(
            'name'               => esc_html__('Compare for WooCommerce', 'builderrin'),
            'slug'               => "woo-smart-compare",
            'required'           => false,
            'logo'        => $images . '/woo-smart-compare.png',
            'description' => esc_html__( 'WPC Smart Compare is an extension of WooCommerce plugin that allows your users to compare some products of your shop.', 'builderrin' ),
        ),

    );


    $config = array(
        'default_path' => $default_path,           // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'is_automatic' => true,
    );

    tgmpa( $plugins, $config );

}