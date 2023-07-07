<?php
/**
 * Template part for displaying default header layout
 */

$logo_m = builderrin()->get_theme_opt( 'logo_m', ['url' => get_template_directory_uri().'/assets/img/logo-light.png', 'id' => '' ] );
$logo_m_dark = builderrin()->get_theme_opt( 'logo_m_dark', ['url' => get_template_directory_uri().'/assets/img/logo-dark.png', 'id' => '' ] );
$p_menu = builderrin()->get_page_opt('p_menu');
?>
<header id="pxl-header-default">
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
                                } else {
                                    printf(
                                        '<ul class="pxl-menu-primary primary-menu-not-set"><li><a href="%1$s">%2$s</a></li></ul>',
                                        esc_url( admin_url( 'nav-menus.php' ) ),
                                        esc_html__( 'Create New Menu', 'builderrin' )
                                    );
                                }
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
</header>
