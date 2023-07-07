<?php

if (!class_exists('Builderrin_Page')) {

    class Builderrin_Page
    {
        public function get_site_loader(){

            $site_loader = builderrin()->get_theme_opt( 'site_loader', false );
            $loader_style = builderrin()->get_theme_opt( 'loader_style', 'style-flower' );

            $loading_page = builderrin()->get_page_opt( 'loading_page', '-1');
            $loading_type_page = builderrin()->get_page_opt( 'loader_style', 'style-flower');

            if($loading_page == 'bd') {
                $loader_style = $loading_type_page;
            }

            if($site_loader) { ?>
                <div id="pxl-loadding" class="pxl-loader <?php echo esc_attr($loader_style); ?>">                    
                    <?php switch ($loader_style) {
                        default: ?>                                                            
                        <div class="loader-wrap">
                            <div class="loader fadeout">
                                <div class="loader-inner"></div>
                            </div>
                        </div>                            
                        <?php break;
                    } ?>                    
                </div>
            <?php }
        }

        public function get_link_pages() {
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
        }

        public function get_page_title(){
            $pt_mode = builderrin()->get_opt('pt_mode');
            if( $pt_mode == 'none' ) return;
            $ptitle_layout = (int)builderrin()->get_opt('ptitle_layout');
            $titles = $this->get_title();
            if ($pt_mode == 'bd' && $ptitle_layout > 0 && class_exists('Pxltheme_Core') && is_callable( 'Elementor\Plugin::instance' )) {
                ?>
                <div id="pxl-page-title-elementor">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $ptitle_layout);?>
                </div>
                <?php
            } else {
                $ptitle_breadcrumb_on = builderrin()->get_opt( 'ptitle_breadcrumb_on', '1' );
                wp_enqueue_script('stellar-parallax'); ?>
                <div id="pxl-page-title-default">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <?php if($ptitle_breadcrumb_on == '1') : ?>
                                    <?php $this->get_breadcrumb(); ?>
                                <?php endif; ?>
                                <h1 class="pxl-page-title"><?php echo builderrin_html($titles['title']) ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="page-title-icons">
                        <div class="ptitle-particle ptitle-particle2"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/banner_right.png'); ?>" alt="ptitle-particle2" /></div>
                        <div class="ptitle-particle ptitle-particle1"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/banner_left.png'); ?>" alt="ptitle-particle1" /></div>
                    </div>
                </div>
            <?php }
        }

        public function get_page_title_shop(){
            $pt_mode = builderrin()->get_opt('pt_mode');
            if( $pt_mode == 'none' ) return;
            $ptitle_layout = (int)builderrin()->get_opt('ptitle_layout');
            if ($pt_mode == 'bd' && $ptitle_layout > 0 && class_exists('Pxltheme_Core') && is_callable( 'Elementor\Plugin::instance' )) {
                ?>
                <div id="pxl-page-title-elementor">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $ptitle_layout);?>
                </div>
                <?php
            } else {
                $ptitle_breadcrumb_on = builderrin()->get_opt( 'ptitle_breadcrumb_on', '1' );
                wp_enqueue_script('stellar-parallax'); ?>
                <div id="pxl-page-title-shop">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <?php if($ptitle_breadcrumb_on == '1') : ?>
                                    <?php $this->get_breadcrumb(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        }

        public function get_title() {
            $title = '';
            // Default titles
            if ( ! is_archive() ) {
                // Posts page view
                if ( is_home() ) {
                    // Only available if posts page is set.
                    if ( ! is_front_page() && $page_for_posts = get_option( 'page_for_posts' ) ) {
                        $title = get_post_meta( $page_for_posts, 'custom_title', true );
                        if ( empty( $title ) ) {
                            $title = get_the_title( $page_for_posts );
                        }
                    }
                    if ( is_front_page() ) {
                        $title = esc_html__( 'Blog', 'builderrin' );
                    }
                } // Single page view
                elseif ( is_page() ) {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                } elseif ( is_404() ) {
                    $title = esc_html__( '404', 'builderrin' );
                } elseif ( is_search() ) {
                    $title = esc_html__( 'Search results', 'builderrin' );
                } elseif ( is_singular('lp_course') ) {
                    $title = esc_html__( 'Course', 'builderrin' );
                } else {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                }
            } else {
                $title = get_the_archive_title();
                if( (class_exists( 'WooCommerce' ) && is_shop()) ) {
                    $title = get_post_meta( wc_get_page_id('shop'), 'custom_title', true );
                    if(!$title) {
                        $title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
                    }
                }
            }

            return array(
                'title' => $title,
            );
        }

        public function get_breadcrumb(){

            if ( ! class_exists( 'Builderrin_Breadcrumb' ) )
            {
                return;
            }

            $breadcrumb = new Builderrin_Breadcrumb();
            $entries = $breadcrumb->get_entries();

            if ( empty( $entries ) )
            {
                return;
            }

            ob_start();

            foreach ( $entries as $entry )
            {
                $entry = wp_parse_args( $entry, array(
                    'label' => '',
                    'url'   => ''
                ) );

                if ( empty( $entry['label'] ) )
                {
                    continue;
                }

                echo '<li>';

                if ( ! empty( $entry['url'] ) )
                {
                    printf(
                        '<a class="breadcrumb-entry" data-hover="%2$s" href="%1$s">%2$s</a>',
                        esc_url( $entry['url'] ),
                        esc_attr( $entry['label'] )
                    );
                }
                else
                {
                    printf( '<span class="breadcrumb-entry" >%s</span>', esc_html( $entry['label'] ) );
                }

                echo '</li>';
            }

            $output = ob_get_clean();

            if ( $output )
            {
                printf( '<ul class="pxl-breadcrumb">%s</ul>', wp_kses_post($output));
            }
        }

        public function get_pagination( $query = null, $ajax = false ){

            if($ajax){
                add_filter('paginate_links', 'builderrin_ajax_paginate_links');
            }

            $classes = array();

            if ( empty( $query ) )
            {
                $query = $GLOBALS['wp_query'];
            }

            if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
            {
                return;
            }

            $paged = $query->get( 'paged', '' );

            if ( ! $paged && is_front_page() && ! is_home() )
            {
                $paged = $query->get( 'page', '' );
            }

            $paged = $paged ? intval( $paged ) : 1;

            $pagenum_link = html_entity_decode( get_pagenum_link() );
            $query_args   = array();
            $url_parts    = explode( '?', $pagenum_link );

            if ( isset( $url_parts[1] ) )
            {
                wp_parse_str( $url_parts[1], $query_args );
            }

            $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
            $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
            $paginate_links_args = array(
                'base'     => $pagenum_link,
                'total'    => $query->max_num_pages,
                'current'  => $paged,
                'mid_size' => 1,
                'add_args' => array_map( 'urlencode', $query_args ),
                'prev_text' => __('', 'builderrin'),
                'next_text' => __('', 'builderrin'),
            );
            if($ajax){
                $paginate_links_args['format'] = '?page=%#%';
            }
            $links = paginate_links( $paginate_links_args );
            if ( $links ):
                ?>
                <nav class="pxl-pagination-wrap <?php echo esc_attr($ajax?'ajax':''); ?>">
                    <div class="pxl-pagination-links">
                        <?php
                        printf($links);
                        ?>
                    </div>
                </nav>
                <?php
            endif;
        }
    }
}
