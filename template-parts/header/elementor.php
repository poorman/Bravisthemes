<?php
$logo_m = builderrin()->get_theme_opt( 'logo_m', ['url' => get_template_directory_uri().'/assets/img/logo-light.png', 'id' => '' ] );
$logo_m_dark = builderrin()->get_theme_opt( 'logo_m_dark', ['url' => get_template_directory_uri().'/assets/img/logo-dark.png', 'id' => '' ] );
$p_menu = builderrin()->get_page_opt('p_menu');
$sticky_scroll = builderrin()->get_theme_opt('sticky_scroll');
$header_layout = builderrin()->get_opt('header_layout');
$post_header = get_post($header_layout);
$header_type = get_post_meta( $post_header->ID, 'header_type', true );

?>
<header id="pxl-header-elementor" class="is-sticky">
	<?php if(isset($args['header_layout']) && $args['header_layout'] > 0) : ?>
		<div class="pxl-header-elementor-main <?php echo esc_attr($header_type); ?>">
		    <div class="pxl-header-content">
		        <div class="row">
		        	<div class="col-12">
			            <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $args['header_layout']); ?>
	                </div>
		        </div>
		    </div>
		</div>
	<?php endif; ?>
	<?php if(isset($args['header_layout_sticky']) && $args['header_layout_sticky'] > 0) : ?>
		<div class="pxl-header-elementor-sticky <?php echo esc_attr($sticky_scroll); ?>">
		    <div class="container">
		        <div class="row">
                    <div class="col-12">
    		            <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $args['header_layout_sticky']); ?>
                    </div>
		        </div>
		    </div>
		</div>
	<?php endif; ?>
    <?php if(isset($args['header_mobile_layout']) && $args['header_mobile_layout'] > 0) :
        $post_header_mobile = get_post($args['header_mobile_layout']);
        $header_mobile_type = get_post_meta( $post_header_mobile->ID, 'header_type', true );
        ?>
        <div class="pxl-header-elementor-mobile <?php echo esc_attr($header_mobile_type); ?>">
            <div class="pxl-header-content">
                <div class="row">
                    <div class="col-12">
                        <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $args['header_mobile_layout']); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div id="pxl-header-mobile">
            <div id="pxl-header-main" class="pxl-header-main">
                <div class="container">
                    <div class="row">
                        <div class="pxl-header-branding">
                            <?php
                                if ($logo_m['url'] && $logo_m_dark['url']) {
                                    printf(
                                        '<a href="%1$s" title="%2$s" rel="home">
                                            <img src="%3$s" alt="%2$s" class="logo-light"/>
                                            <img src="%4$s" alt="%2$s" class="logo-dark"/>
                                        </a>',
                                        esc_url( home_url( '/' ) ),
                                        esc_attr( get_bloginfo( 'name' ) ),
                                        esc_url( $logo_m['url'] ),
                                        esc_url( $logo_m_dark['url'] )
                                    );
                                }
                            ?>
                        </div>
                        <div class="pxl-header-menu" data-lenis-prevent>
                            <div class="pxl-header-menu-scroll">
                                <div class="pxl-menu-close pxl-hide-xl pxl-close"></div>
                                <div class="pxl-logo-mobile pxl-hide-xl">
                                    <?php
                                        if ($logo_m['url'] && $logo_m_dark['url']) {
                                            printf(
                                                '<a href="%1$s" title="%2$s" rel="home">
                                                    <img src="%3$s" alt="%2$s" class="logo-light"/>
                                                    <img src="%4$s" alt="%2$s" class="logo-dark"/>
                                                </a>',
                                                esc_url( home_url( '/' ) ),
                                                esc_attr( get_bloginfo( 'name' ) ),
                                                esc_url( $logo_m['url'] ),
                                                esc_url( $logo_m_dark['url'] )
                                            );
                                        }
                                    ?>
                                </div>
                                <?php builderrin_header_mobile_search_form(); ?>
                                <nav class="pxl-header-nav">
                                    <?php
                                        if ( has_nav_menu( 'primary' ) )
                                        {
                                            $attr_menu = array(
                                                'theme_location' => 'primary',
                                                'container'  => '',
                                                'menu_id'    => '',
                                                'menu_class' => 'pxl-menu-primary clearfix',
                                                'link_before'     => '<span>',
                                                'link_after'      => '</span>',
                                                'walker'         => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
                                            );
                                            if(isset($p_menu) && !empty($p_menu)) {
                                                $attr_menu['menu'] = $p_menu;
                                            }
                                            wp_nav_menu( $attr_menu );
                                        } else { ?>
                                            <ul class="pxl-menu-primary">
                                                <?php wp_list_pages( array(
                                                    'depth'        => 0,
                                                    'show_date'    => '',
                                                    'date_format'  => get_option( 'date_format' ),
                                                    'child_of'     => 0,
                                                    'exclude'      => '',
                                                    'title_li'     => '',
                                                    'echo'         => 1,
                                                    'authors'      => '',
                                                    'sort_column'  => 'menu_order, post_title',
                                                    'link_before'  => '',
                                                    'link_after'   => '',
                                                    'item_spacing' => 'preserve',
                                                    'walker'       => '',
                                                ) ); ?>
                                            </ul>
                                        <?php }
                                    ?>
                                </nav>
                            </div>
                        </div>
                        <div class="pxl-header-menu-backdrop"></div>
                    </div>
                </div>
                <div id="pxl-nav-mobile" class="pxl-nav-mobile pxl-transtion">
                    <div class="pxl-nav-mobile-button"><span></span><span></span><span></span></div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</header>