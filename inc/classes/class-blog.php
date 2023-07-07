<?php

if (!class_exists('Builderrin_Blog')) {
    class Builderrin_Blog
    {
        public function get_archive_meta() {
            global $post;
            if(!has_term( '', 'product_cat', $post->ID)) {
                $archive_date = builderrin()->get_theme_opt( 'archive_date', true );
                if($archive_date) : ?>
                    <ul class="pxl-item--meta-date">
                        <?php if($archive_date) : ?>
                            <li class="pxl-item--date-day"><?php echo get_the_date('d'); ?></li>
                            <li class="pxl-item--date-month"><?php echo get_the_date('M'); ?></li>
                        <?php endif; ?>                  
                    </ul>
                <?php endif;
            }
        }
        public function get_archive_metas_category(){
            $archive_category = builderrin()->get_theme_opt( 'archive_category', true );
            if($archive_category) : ?>
                <ul class="pxl-item--meta">
                    <?php if($archive_category) : ?>
                        <li class="item--category"><?php the_terms( get_the_ID(), 'category', '' ); ?></li>
                    <?php endif; ?>
                </ul>
            <?php endif;
        }
        public function get_excerpt(){
            $archive_excerpt_length = builderrin()->get_theme_opt('archive_excerpt_length', '50');
            $builderrin_the_excerpt = get_the_excerpt();
            if(!empty($builderrin_the_excerpt)) {
                echo wp_trim_words( $builderrin_the_excerpt, $archive_excerpt_length, $more = null );
            } else {
                echo wp_kses_post($this->get_excerpt_more( $archive_excerpt_length ));
            }
        }
        public function get_excerpt_more( $post = null ) {
            $archive_excerpt_length = builderrin()->get_theme_opt('archive_excerpt_length', '50');
            $post = get_post( $post );

            if ( empty( $post ) || 0 >= $archive_excerpt_length ) {
                return '';
            }

            if ( post_password_required( $post ) ) {
                return esc_html__( 'Post password required.', 'builderrin' );
            }

            $content = apply_filters( 'the_content', strip_shortcodes( $post->post_content ) );
            $content = str_replace( ']]>', ']]&gt;', $content );

            $excerpt_more = apply_filters( 'builderrin_excerpt_more', '&hellip;' );
            $excerpt      = wp_trim_words( $content, $archive_excerpt_length, $excerpt_more );

            return $excerpt;
        }
        public function get_post_metas(){
            $post_category = builderrin()->get_theme_opt( 'post_category', true );
            if($post_category) : ?>
                <ul class="pxl-item--meta">
                    <?php if($post_category) : ?>
                        <li class="item--category"><?php the_terms( get_the_ID(), 'category', '' ); ?></li>
                    <?php endif; ?>
                </ul>
            <?php endif;
        }

        public function get_post_metas_date(){
            $post_date = builderrin()->get_theme_opt( 'post_date', true );
            if($post_date) : ?>
                <ul class="pxl-item--meta-date">
                    <?php if($post_date) : ?>
                        <li class="pxl-item--date-day"><?php echo get_the_date('d'); ?></li>
                        <li class="pxl-item--date-month"><?php echo get_the_date('M'); ?></li>
                    <?php endif; ?>                  
                </ul>
            <?php endif; 
        }

        public function get_portfolio_metas(){
            $post_tag_portfolio = builderrin()->get_theme_opt( 'post_tag_portfolio', true );
            if($post_tag_portfolio) : ?>
                <ul class="pxl-item--meta-portfolio">
                    <?php if($post_tag_portfolio) : ?>
                        <li class="item--tag"><?php the_terms( get_the_ID(), 'portfolio-tag', '' ); ?></li>
                    <?php endif; ?>
                </ul>
            <?php endif;
        }
        public function builderrin_set_post_views( $postID ) {
            $countKey = 'post_views_count';
            $count    = get_post_meta( $postID, $countKey, true );
            if ( $count == '' ) {
                $count = 0;
                delete_post_meta( $postID, $countKey );
                add_post_meta( $postID, $countKey, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $countKey, $count );
            }
        }
        public function get_tagged_in( $before = '', $sep = '', $after = '' ) {
            $tags_list = get_the_tag_list( $before, $sep, $after );
            if ( $tags_list )
            {
                echo '<div class="pxl--tags">';
                printf('%2$s', '', $tags_list);
                echo '</div>';
            }
        }
        public function get_socials_share() {
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            $social_facebook = builderrin()->get_theme_opt( 'social_facebook', true );
            $social_twitter = builderrin()->get_theme_opt( 'social_twitter', true );
            $social_pinterest = builderrin()->get_theme_opt( 'social_pinterest', true );
            $social_linkedin = builderrin()->get_theme_opt( 'social_linkedin', true );
            ?>
            <div class="pxl--social">
                <p>Share:</p>
                <?php if($social_facebook) : ?>
                    <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'builderrin'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
                        <span><?php echo esc_attr__('Facebook', 'builderrin'); ?></span>
                    </a>
                <?php endif; ?>
                <?php if($social_twitter) : ?>
                    <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'builderrin'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20">
                        <span><?php echo esc_attr__('Twitter', 'builderrin'); ?></span>
                    </a>
                <?php endif; ?>
                <?php if($social_pinterest) : ?>
                    <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'builderrin'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20">
                        <span><?php echo esc_attr__('Pinterest', 'builderrin'); ?></span>
                    </a>
                <?php endif; ?>
                <?php if($social_linkedin) : ?>
                    <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'builderrin'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20">
                        <span><?php echo esc_attr__('LinkedIn', 'builderrin'); ?></span>
                    </a>
                <?php endif; ?>
            </div>
            <?php
        }
        public function get_socials_share_portfolio() {
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            ?>
            <div class="pxl--social">
                <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'builderrin'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
                <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'builderrin'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><i class="caseicon-twitter"></i></a>
                <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'builderrin'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>"><i class="caseicon-pinterest"></i></a>
                <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'builderrin'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="caseicon-linkedin"></i></a>
            </div>
            <?php
        }
        public function get_post_nav() {
            global $post;
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();

            if( !empty($next_post) || !empty($previous_post) ) {
                ?>
                <div class="pxl-post--navigation">
                    <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                        <a class="label--prev" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo esc_html__('PREVIOUS', 'builderrin'); ?></a>
                    <?php } else { ?>
                        <a class="label--prev"></a>
                    <?php } ?>
                    <div class="item--prev">
                        <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                            <h5 class="nav--title">
                                <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a>
                            </h5>
                        <?php } ?>
                    </div>
                    <span class="nav--line"></span>
                    <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                        <a class="label--next" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo esc_html__('NEXT', 'builderrin'); ?></a>
                    <?php } else { ?>
                        <a class="label--next"></a>
                    <?php } ?>
                    <div class="item--next">
                        <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                            <h5 class="nav--title">
                                <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                            </h5>
                        <?php } ?>
                    </div>
                </div>
            <?php }
        }
        public function get_post_service_nav() {
            global $post;
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );
            $service_nav_link = builderrin()->get_theme_opt( 'service_nav_link' );
            $service_nav_text = builderrin()->get_theme_opt( 'service_nav_text' );
            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();

            if( !empty($next_post) || !empty($previous_post) ) {
                ?>
                <div class="pxl-post--navigation">
                    <div class="pxl--item pxl--item-prev">
                        <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') {
                            $prev_img_id = get_post_thumbnail_id($previous_post->ID);
                            $prev_img_url = wp_get_attachment_image_src($prev_img_id, 'builderrin-thumb-xs');
                            ?>
                            <?php if(!empty($prev_img_id)) : ?>
                                <div class="pxl--img">
                                    <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><img src="<?php echo wp_kses_post($prev_img_url[0]); ?>" alt="<?php echo get_the_title( $previous_post->ID ); ?>" /></a>
                                </div>
                            <?php endif; ?>
                            <div class="pxl--holder">
                                <div class="pxl--meta">
                                    <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a>
                                </div>
                                <a class="pxl--label" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo esc_html__('Read More', 'builderrin'); ?><i class="far fa-long-arrow-right"></i></a>
                            </div>
                        <?php } ?>
                    </div>
                    <a class="pxl-show--all" href="<?php echo esc_url($service_nav_link); ?>" data-tip="<?php if(!empty($service_nav_text)) { echo pxl_print_html($service_nav_text); } else { echo pxl_print_html('Show All Services', 'builderrin');} ?>">
                        <svg class="svg-hover" width="31" height="31" viewBox="0 0 31 31">
                            <path class="cls-2" d="M3.1,0A3.1,3.1,0,1,1,0,3.1,3.1,3.1,0,0,1,3.1,0ZM15.5,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,15.5,0ZM27.9,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,27.9,0ZM3.1,12.4A3.1,3.1,0,1,1,0,15.5,3.1,3.1,0,0,1,3.1,12.4Zm12.4,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,15.5,12.4Zm12.4,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,27.9,12.4ZM3.1,24.8A3.1,3.1,0,1,1,0,27.9,3.1,3.1,0,0,1,3.1,24.8Zm12.4,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,15.5,24.8Zm12.4,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,27.9,24.8Z"/>
                        </svg>
                        <svg class="svg-main" width="25" height="25" viewBox="0 0 25 25">
                            <path class="cls-1" d="M2.5,0A2.5,2.5,0,1,1,0,2.5,2.5,2.5,0,0,1,2.5,0Zm10,0A2.5,2.5,0,1,1,10,2.5,2.5,2.5,0,0,1,12.5,0Zm10,0A2.5,2.5,0,1,1,20,2.5,2.5,2.5,0,0,1,22.5,0ZM2.5,10A2.5,2.5,0,1,1,0,12.5,2.5,2.5,0,0,1,2.5,10Zm10,0A2.5,2.5,0,1,1,10,12.5,2.5,2.5,0,0,1,12.5,10Zm10,0A2.5,2.5,0,1,1,20,12.5,2.5,2.5,0,0,1,22.5,10ZM2.5,20A2.5,2.5,0,1,1,0,22.5,2.5,2.5,0,0,1,2.5,20Zm10,0A2.5,2.5,0,1,1,10,22.5,2.5,2.5,0,0,1,12.5,20Zm10,0A2.5,2.5,0,1,1,20,22.5,2.5,2.5,0,0,1,22.5,20Z"/>
                        </svg>
                    </a>
                    <div class="pxl--item pxl--item-next">
                        <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') {
                            $next_img_id = get_post_thumbnail_id($next_post->ID);
                            $next_img_url = wp_get_attachment_image_src($next_img_id, 'builderrin-thumb-xs');
                            ?>
                            <div class="pxl--holder">
                                <div class="pxl--meta">
                                    <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                                </div>
                                <a class="pxl--label" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo esc_html__('Read More', 'builderrin'); ?><i class="far fa-long-arrow-right"></i></a>
                            </div>
                            <?php if(!empty($next_img_id)) : ?>
                                <div class="pxl--img">
                                    <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><img src="<?php echo wp_kses_post($next_img_url[0]); ?>" alt="<?php echo get_the_title( $next_post->ID ); ?>" /></a>
                                </div>
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                </div>
            <?php }
        }
        public function get_post_portfolio_nav() {
            global $post;
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );
            $portfolio_nav_text = builderrin()->get_theme_opt( 'portfolio_nav_text' );
            $portfolio_nav_link = builderrin()->get_theme_opt( 'portfolio_nav_link' );
            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();

            if( !empty($next_post) || !empty($previous_post) ) {
                ?>
                <div class="pxl-post--navigation">
                    <div class="pxl--item pxl--item-prev">
                        <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') {
                            $prev_img_id = get_post_thumbnail_id($previous_post->ID);
                            $prev_img_url = wp_get_attachment_image_src($prev_img_id, 'builderrin-thumb-xs');
                            ?>
                            <?php if(!empty($prev_img_id)) : ?>
                                <div class="pxl--img">
                                    <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><img src="<?php echo wp_kses_post($prev_img_url[0]); ?>" /></a>
                                </div>
                            <?php endif; ?>
                            <div class="pxl--holder">
                                <a class="pxl--label" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo esc_html__('PREVIOUS POST', 'builderrin'); ?></a>
                                <div class="pxl--meta">
                                    <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <a class="pxl-show--all" href="<?php echo esc_url($portfolio_nav_link); ?>" data-tip="<?php if(!empty($portfolio_nav_text)) { echo pxl_print_html($portfolio_nav_text); } else { echo pxl_print_html('Show All Projects', 'builderrin');} ?>">
                        <svg class="svg-hover" width="31" height="31" viewBox="0 0 31 31">
                            <path class="cls-2" d="M3.1,0A3.1,3.1,0,1,1,0,3.1,3.1,3.1,0,0,1,3.1,0ZM15.5,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,15.5,0ZM27.9,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,27.9,0ZM3.1,12.4A3.1,3.1,0,1,1,0,15.5,3.1,3.1,0,0,1,3.1,12.4Zm12.4,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,15.5,12.4Zm12.4,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,27.9,12.4ZM3.1,24.8A3.1,3.1,0,1,1,0,27.9,3.1,3.1,0,0,1,3.1,24.8Zm12.4,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,15.5,24.8Zm12.4,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,27.9,24.8Z"/>
                        </svg>
                        <svg class="svg-main" width="25" height="25" viewBox="0 0 25 25">
                            <path class="cls-1" d="M2.5,0A2.5,2.5,0,1,1,0,2.5,2.5,2.5,0,0,1,2.5,0Zm10,0A2.5,2.5,0,1,1,10,2.5,2.5,2.5,0,0,1,12.5,0Zm10,0A2.5,2.5,0,1,1,20,2.5,2.5,2.5,0,0,1,22.5,0ZM2.5,10A2.5,2.5,0,1,1,0,12.5,2.5,2.5,0,0,1,2.5,10Zm10,0A2.5,2.5,0,1,1,10,12.5,2.5,2.5,0,0,1,12.5,10Zm10,0A2.5,2.5,0,1,1,20,12.5,2.5,2.5,0,0,1,22.5,10ZM2.5,20A2.5,2.5,0,1,1,0,22.5,2.5,2.5,0,0,1,2.5,20Zm10,0A2.5,2.5,0,1,1,10,22.5,2.5,2.5,0,0,1,12.5,20Zm10,0A2.5,2.5,0,1,1,20,22.5,2.5,2.5,0,0,1,22.5,20Z"/>
                        </svg>
                    </a>
                    <div class="pxl--item pxl--item-next">
                        <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') {
                            $next_img_id = get_post_thumbnail_id($next_post->ID);
                            $next_img_url = wp_get_attachment_image_src($next_img_id, 'builderrin-thumb-xs');
                            ?>
                            <div class="pxl--holder">
                                <a class="pxl--label" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo esc_html__('NEXT POST', 'builderrin'); ?></a>
                                <div class="pxl--meta">
                                    <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                                </div>
                            </div>
                            <?php if(!empty($next_img_id)) : ?>
                                <div class="pxl--img">
                                    <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><img src="<?php echo wp_kses_post($next_img_url[0]); ?>" /></a>
                                </div>
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                </div>
            <?php }
        }
        public function get_related_post() {
            $post_related = builderrin()->get_theme_opt( 'post_related', false );
            $post_related_title = builderrin()->get_theme_opt( 'post_related_title' );
            $post_category = builderrin()->get_theme_opt( 'post_category', true );
            $post_date = builderrin()->get_theme_opt( 'post_date', true );
            $post_related_text = builderrin()->get_theme_opt( 'post_related_text' );
            $post_related_link = builderrin()->get_theme_opt( 'post_related_link' );
            $archive_excerpt_on = builderrin()->get_theme_opt('archive_excerpts', true);
            $post_related_excerpt_line = builderrin()->get_theme_opt('post_related_excerpt_line', '');

            $data_cursor_text = esc_html__('◄ ►', 'builderrin');

            if($post_related) {
                global $post;
                $current_id = $post->ID;
                $posttags = get_the_category($post->ID);
                $archive_excerpt = get_the_excerpt($post->ID);
                if (empty($posttags)) return;

                $tags = array();

                foreach ($posttags as $tag) {

                    $tags[] = $tag->term_id;
                }
                $post_number = '6';
                $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
                if (count($query_similar->posts) > 1) {
                    wp_enqueue_script( 'swiper' );
                    wp_enqueue_script( 'pxl-swiper' );
                    $opts = [
                        'slide_direction'               => 'horizontal',
                        'slide_percolumn'               => '1',
                        'slide_mode'                    => 'slide',
                        'slides_to_show'                => 2,
                        'slides_to_show_lg'             => 2,
                        'slides_to_show_md'             => 2,
                        'slides_to_show_sm'             => 2,
                        'slides_to_show_xs'             => 1,
                        'slides_to_scroll'              => 1,
                        'slides_gutter'                 => 30,
                        'arrow'                         => false,
                        'dots'                          => true,
                        'dots_style'                    => 'bullets'
                    ];
                    $data_settings = wp_json_encode($opts);
                    $dir           = is_rtl() ? 'rtl' : 'ltr';
                    ?>
                    <div class="pxl-related-post">
                        <div class="pxl-swiper-title">
                            <h2 class="item-title wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1.2s"><?php if(!empty($post_related_title)) { echo pxl_print_html($post_related_title); } else { echo pxl_print_html('Related posts', 'builderrin');} ?></h2>
                            <a class="btn btn-default wow fadeInUp" href="<?php echo esc_url($post_related_link); ?>" data-wow-delay="200ms" data-wow-duration="1.2s">
                                <span class="pxl-wobble" data-animation="pxl-xspin">
                                    <?php if(!empty($post_related_text)) { echo pxl_print_html($post_related_text); } else { echo pxl_print_html('Browse All', 'builderrin');} ?>
                                </span>
                            </a>
                        </div>
                        <div class="pxl-swiper-container pxl-mouse-wheel" data-settings="<?php echo esc_attr($data_settings) ?>" data-rtl="<?php echo esc_attr($dir) ?>">
                            <div class="pxl-related-post-inner wow fadeIn" data-wow-delay="300ms" data-wow-duration="1.2s">
                                <?php foreach ($query_similar->posts as $post):
                                    $thumbnail_url = '';
                                    if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'builderrin-thumb-related', false);
                                endif;
                                if ($post->ID !== $current_id) : ?>
                                    <div class="pxl-swiper-slide swiper-slide grid-item">
                                        <div class="pxl-grid-item-inner">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="pxl-item-featured" <?php echo 'data-cursor-text="'.esc_attr($data_cursor_text).'"'; ?>>
                                                    <a class="pxl-no-cursor" href="<?php the_permalink(); ?>">
                                                        <img alt="<?php the_title(); ?>" src="<?php echo esc_url($thumbnail_url[0]); ?>" />
                                                    </a>
                                                </div>
                                            <?php } ?>
                                            <div class="pxl-item-content">
                                                <?php if($post_category || $post_date) : ?>
                                                    <ul class="pxl-item--meta">
                                                        <?php if($post_category) : ?>
                                                            <li class="item--category"><?php the_terms( get_the_ID(), 'category', '' ); ?></li>
                                                        <?php endif; ?>
                                                        <?php if($post_date) : ?>
                                                            <li class="item--date"><?php echo get_the_date(); ?></li>
                                                        <?php endif; ?>
                                                    </ul>
                                                <?php endif; ?>
                                                <h4 class="pxl-item-title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                                <?php if($archive_excerpt_on && !empty($archive_excerpt)): ?>
                                                    <div class="pxl-item--excerpt <?php if(!empty($post_related_excerpt_line)) { echo esc_attr__( 'pxl-text-line', 'builderrin' ); } ?>" <?php if(!empty($post_related_excerpt_line)) { ?>style="-webkit-line-clamp: <?php echo esc_attr($post_related_excerpt_line); ?>"<?php } ?>>
                                                        <?php
                                                        builderrin()->blog->get_excerpt();
                                                        wp_link_pages( array(
                                                            'before'      => '<div class="page-links">',
                                                            'after'       => '</div>',
                                                            'link_before' => '<span>',
                                                            'link_after'  => '</span>',
                                                        ) );
                                                        ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
                    <a class="pxl-swiper-button btn btn-default wow fadeInUp" href="<?php echo esc_url($post_related_link); ?>" data-wow-delay="200ms" data-wow-duration="1.2s">
                        <span class="pxl-wobble" data-animation="pxl-xspin">
                            <?php if(!empty($post_related_text)) { echo pxl_print_html($post_related_text); } else { echo pxl_print_html('Browse All', 'builderrin');} ?>
                        </span>
                    </a>
                </div>
            <?php }
        }

        wp_reset_postdata();
    }
    public function get_related_portfolio() {
        global $post;
        $current_id = $post->ID;
        $posttags = get_the_category($post->ID);

        $tags = array();

        foreach ($posttags as $tag) {

            $tags[] = $tag->term_id;
        }
        $post_number = '6';
        $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'portfolio', 'post_status' => 'publish', 'category__in' => $tags));
        if (count($query_similar->posts) > 1) {
            wp_enqueue_script( 'swiper' );
            wp_enqueue_script( 'pxl-swiper' );
            $opts = [
                'slide_direction'               => 'horizontal',
                'slide_percolumn'               => '1',
                'slide_mode'                    => 'slide',
                'slides_to_show'                => 2,
                'slides_to_show_lg'             => 2,
                'slides_to_show_md'             => 2,
                'slides_to_show_sm'             => 2,
                'slides_to_show_xs'             => 1,
                'slides_to_scroll'              => 1,
                'slides_gutter'                 => 30,
                'arrow'                         => false,
                'dots'                          => true,
                'dots_style'                    => 'bullets'
            ];
            $data_settings = wp_json_encode($opts);
            $dir           = is_rtl() ? 'rtl' : 'ltr';
            ?>
            <div class="pxl-related-portfolio">
                <h2 class="pxl-swiper-title"><?php echo esc_html__('Related Projects', 'builderrin'); ?></h2>
                <div class="pxl-swiper-container pxl-mouse-wheel" data-settings="<?php echo esc_attr($data_settings) ?>" data-rtl="<?php echo esc_attr($dir) ?>">
                    <div class="pxl-related-post-inner">
                        <?php foreach ($query_similar->posts as $post):
                            $thumbnail_url = '';
                            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'builderrin-thumb-portfolio', false);
                        endif;
                        if ($post->ID !== $current_id) : ?>
                            <div class="pxl-swiper-slide swiper-slide grid-item">
                                <div class="pxl-grid-item-inner">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <div class="pxl-item-featured">
                                            <img alt="<?php the_title(); ?>" src="<?php echo esc_url($thumbnail_url[0]); ?>" />
                                        </div>
                                    <?php } ?>
                                    <div class="pxl-item--front">
                                        <div class="pxl-item-content">
                                            <h5 class="pxl-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            <span class="pxl-item-tags"><?php the_terms( $post->ID, 'portfolio-tag', '', ', ' ); ?></span>
                                        </div>
                                        <span class="pxl-item-icon pxl-related-front"><i class="fal fa-plus"></i></span>
                                    </div>
                                    <div class="pxl-item--bg bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url[0]); ?>);"></div>
                                    <div class="pxl-item--back">
                                        <div class="pxl-content-main">
                                            <h5 class="pxl-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            <span class="pxl-item-date"><?php echo get_the_date(); ?></span>
                                            <?php if (!empty($post->post_excerpt)) : ?>
                                                <div class="pxl-item--excerpt">
                                                    <?php echo wp_trim_words( $post->post_excerpt, 15, $more = null ); ?>
                                                </div>
                                            <?php endif; ?>
                                            <span class="pxl-item--author">
                                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
                                                <?php the_author_posts_link(); ?>
                                            </span>
                                        </div>
                                        <span class="pxl-item-icon pxl-related-back"><i class="fal fa-minus "></i></span>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                    endforeach; ?>
                </div>
            </div>
        </div>
    <?php }
    wp_reset_postdata();
}
}
}
