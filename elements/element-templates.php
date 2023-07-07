<?php
if(!function_exists('builderrin_get_post_grid')){
    function builderrin_get_post_grid($posts = [], $settings = []){
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
            builderrin_get_post_grid_layout1($posts, $settings);
            break;

            case 'portfolio-1':
            builderrin_get_portfolio_grid_layout1($posts, $settings);
            break;

            case 'service-1':
            builderrin_get_service_grid_layout1($posts, $settings);
            break;
            case 'service-2':
            builderrin_get_service_grid_layout2($posts, $settings);
            break;

            default:
            return false;
            break;
        }
    }
}

// Start Post Grid
//--------------------------------------------------
function builderrin_get_post_grid_layout1($posts = [], $settings = []){
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '800x584';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = $grid_masonry[$key]['col_lg_m'];
                $col_md_m = $grid_masonry[$key]['col_md_m'];
                $col_sm_m = $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }
            $author = get_user_by('id', $post->post_author); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                    <div class="item--featured">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        <?php if($show_date == 'true' ) : ?>
                            <ul class="pxl-item--meta-date">
                                <li class="pxl-item--date-day"><?php echo get_the_date('d'); ?></li>
                                <li class="pxl-item--date-month"><?php echo get_the_date('M'); ?></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="item--holder">
                    <?php if ($show_author == 'true') : ?>
                        <div class="pxl-item--author">
                            <i class="fal fa-user-circle"></i>
                            <?php the_author_meta( 'display_name'); ?>
                        </div>
                    <?php endif; ?>
                    <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                    <?php if ($show_excerpt == 'true' && !empty($post->post_excerpt)) : ?>
                        <div class="item--excerpt <?php if(!empty($text_line)) { echo esc_attr__( 'pxl-text-line', 'builderrin' ); } ?>" <?php if(!empty($text_line)) { ?>style="-webkit-line-clamp: <?php echo esc_attr($text_line); ?>"<?php } ?>>
                            <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if($show_button == 'true') : ?>
                        <a class="pxl-button" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                            <span class="pxl--btn-text">
                                <i class="far fa-arrow-right"></i>
                                <?php if(!empty($settings['btn_text'])) {
                                    echo pxl_print_html($settings['btn_text']);
                                } else {
                                    echo pxl_print_html('read article', 'builderrin');
                                } ?>
                            </span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}
// End Post Grid
//--------------------------------------------------

// Start Portfolio Grid
//--------------------------------------------------
function builderrin_get_portfolio_grid_layout1($posts = [], $settings = []){
    extract($settings);
    $post_social_portfoli_share = builderrin()->get_page_opt( 'post_social_portfoli_share', false );

    $images_size = !empty($img_size) ? $img_size : '810x1077';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = $grid_masonry[$key]['col_lg_m'];
                $col_md_m = $grid_masonry[$key]['col_md_m'];
                $col_sm_m = $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner pxl-grid-item-inner <?php echo esc_attr($pxl_animate); ?>" <?php $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>style="background-image: url(<?php echo esc_url($thumbnail_url[0]); ?>);" data-wow-duration="1.2s">
                    <div class="team_social">
                        <div class="share"><i class="flaticon flaticon-share"></i></div>
                        <div class="pxl-item-share">
                            <?php builderrin()->blog->get_socials_share_portfolio(); ?>
                        </div>                                         
                    </div>
                    <div class="pxl-item-content">
                        <span class="pxl-item-tags"><?php the_terms( $post->ID, 'portfolio-address', '', ', ' ); ?></span>
                        <h5 class="pxl-item-title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                    </div>   
                </div>
            </div>
            <?php
        endforeach;
    endif;
}

// End Portfolio Grid

// Start Service Grid
//--------------------------------------------------
function builderrin_get_service_grid_layout1($posts = [], $settings = []){
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '703x646';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = $grid_masonry[$key]['col_lg_m'];
                $col_md_m = $grid_masonry[$key]['col_md_m'];
                $col_sm_m = $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            $gradient_color = builderrin()->get_opt( 'gradient_color' );
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner pxl-not-active <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="pxl-item--holder">    
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        if($img_id) {
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $images_size,
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail'];
                        } else {
                            $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                        }
                        ?>  
                        <?php echo wp_kses_post($thumbnail); ?>
                    <?php endif; ?>  
                    <?php 
                    $categories = get_categories(array( 'taxonomy' => 'service-category' ));
                    $post_categories = get_the_terms( $post->ID, 'service-category' );
                    if ( ! empty( $post_categories ) && ! is_wp_error( $post_categories ) ) {
                        $categories_name = wp_list_pluck( $post_categories, 'name' );                            
                        $categories_id = wp_list_pluck( $post_categories, 'term_id' );                                                                                 
                    }
                    $category_link = get_category_link(implode("','",$categories_id));
                    ?>                
                    <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                        <div class="icon_img">
                            <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                        </div>
                    <?php endif; ?>
                    <?php if($service_icon_type == 'image' && !empty($service_icon_img)) :
                        $icon_img = pxl_get_image_by_size( array(
                            'attach_id'  => $service_icon_img['id'],
                            'thumb_size' => 'full',
                        ));
                        $icon_thumbnail = $icon_img['thumbnail'];
                        ?>
                        <div class="pxl-item--icon">
                            <?php echo wp_kses_post($icon_thumbnail); ?>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-item--content">
                      <a class="service-title" href="<?php echo esc_html($category_link); ?>">
                          <?php echo esc_html(implode("','",$categories_name)); ?>
                      </a>
                      <?php if($show_excerpt == 'true' && !empty($service_excerpt)): ?>
                        <div class="pxl-item--description">
                            <?php echo wp_trim_words( $service_excerpt, $num_words, $more = null ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if($show_button == 'true') : ?>
                        <a class="pxl-button" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                            <span>
                                <?php if(!empty($settings['btn_text'])) {
                                    echo pxl_print_html($settings['btn_text']);
                                } else {
                                    echo pxl_print_html('Read More', 'builderrin');
                                } ?>
                                <i class="far fa-long-arrow-alt-right" aria-hidden="true"></i>
                            </span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
endforeach;
endif;
}
function builderrin_get_service_grid_layout2($posts = [], $settings = []){
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '800x499';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = $grid_masonry[$key]['col_lg_m'];
                $col_md_m = $grid_masonry[$key]['col_md_m'];
                $col_sm_m = $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            $gradient_color = builderrin()->get_opt( 'gradient_color' );
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner pxl-not-active <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                    $img_id = get_post_thumbnail_id($post->ID);
                    if($img_id) {
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size,
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                    } else {
                        $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                    }
                    ?>
                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?>
                    <?php 
                    $categories = get_categories(array( 'taxonomy' => 'service-category' ));
                    $post_categories = get_the_terms( $post->ID, 'service-category' );
                    if ( ! empty( $post_categories ) && ! is_wp_error( $post_categories ) ) {
                        $categories_name = wp_list_pluck( $post_categories, 'name' );                            
                        $categories_id = wp_list_pluck( $post_categories, 'term_id' );                                                                                 
                    }
                    $gallery_icon = get_term_meta(implode("','",$categories_id), 'service_icon', true ); 
                    $category_link = get_category_link(implode("','",$categories_id));
                    ?>
                    <div class="pxl-item--icon">
                      <i class="<?php echo esc_attr($gallery_icon); ?>"></i>                        
                  </div>
              </a>
          <?php endif; ?>
          <div class="pxl-item--holder">
            <div class="pxl-item--content">
                <h5 class="pxl-item--title">
                    <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                </h5>
                <?php if($show_excerpt == 'true' && !empty($service_excerpt)): ?>
                    <div class="pxl-item--description">
                        <?php echo wp_trim_words( $service_excerpt, $num_words, $more = null ); ?>
                    </div>
                <?php endif; ?>
                <?php if($show_button == 'true') : ?>
                    <a class="pxl-button" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                        <span class="pxl--btn-text">
                            <i class="far fa-arrow-right"></i>
                            <?php if(!empty($settings['btn_text'])) {
                                echo pxl_print_html($settings['btn_text']);
                            } else {
                                echo pxl_print_html('GET SERVICES', 'builderrin');
                            } ?>
                        </span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
endforeach;
endif;
}
// End Service Grid
//--------------------------------------------------

add_action( 'wp_ajax_builderrin_get_pagination_html', 'builderrin_get_pagination_html' );
add_action( 'wp_ajax_nopriv_builderrin_get_pagination_html', 'builderrin_get_pagination_html' );
function builderrin_get_pagination_html(){
    try{
        if(!isset($_POST['query_vars'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'builderrin'));
        }
        $query = new WP_Query($_POST['query_vars']);
        ob_start();
        builderrin()->page->get_pagination( $query,  true );
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'builderrin'),
                'data' => array(
                    'html' => $html,
                    'query_vars' => $_POST['query_vars'],
                    'post' => $query->have_posts()
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

add_action( 'wp_ajax_builderrin_load_more_product_grid', 'builderrin_load_more_product_grid' );
add_action( 'wp_ajax_nopriv_builderrin_load_more_product_grid', 'builderrin_load_more_product_grid' );
function builderrin_load_more_product_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'builderrin'));
        }
        $settings = $_POST['settings'];
        set_query_var('paged', $settings['paged']);
        $query_type         = isset($settings['query_type']) ? $settings['query_type'] : 'recent_product';
        $post_per_page      = isset($settings['limit']) ? $settings['limit'] : 8;
        $product_ids        = isset($settings['product_ids']) ? $settings['product_ids'] : '';
        $categories         = isset($settings['categories']) ? $settings['categories'] : '';
        $param_args         = isset($settings['param_args']) ? $settings['param_args'] : [];

        $col_xxl = isset($settings['col_xxl']) ? 'col-xxl-'.str_replace('.', '',12 / floatval($settings['col_xxl'])) : '';
        $col_xl = isset($settings['col_xl']) ? 'col-xl-'.str_replace('.', '',12 / floatval( $settings['col_xl'])) : '';
        $col_lg = isset($settings['col_lg']) ? 'col-lg-'.str_replace('.', '',12 / floatval( $settings['col_lg'])) : '';
        $col_md = isset($settings['col_md']) ? 'col-md-'.str_replace('.', '',12 / floatval( $settings['col_md'])) : '';
        $col_sm = isset($settings['col_sm']) ? 'col-sm-'.str_replace('.', '',12 / floatval( $settings['col_sm'])) : '';
        $col_xs = isset($settings['col_xs']) ? 'col-'.str_replace('.', '',12 / floatval( $settings['col_xs'])) : '';

        $item_class = trim(implode(' ', ['pxl-grid-item', $col_xxl, $col_xl, $col_lg, $col_md, $col_sm, $col_xs]));

        $loop = builderrin_woocommerce_query($query_type,$post_per_page,$product_ids,$categories,$param_args);
        extract($loop);

        $data_animation = [];
        $animate_cls = '';
        $data_settings = '';
        if ( !empty( $settings['item_animation'] ) ) {
            $animate_cls = ' pxl-animate pxl-invisible animated-'.$settings['item_animation_duration'];
            $data_animation['animation'] = $settings['item_animation'];
            $data_animation['animation_delay'] = $settings['item_animation_delay'];
        }
        if($posts->have_posts()){
            ob_start();
            $d = 0;
            while ($posts->have_posts()) {
                $posts->the_post();
                global $product;
                $d++;
                $term_list = array();
                $term_of_post = wp_get_post_terms($product->get_ID(), 'product_cat');
                foreach ($term_of_post as $term) {
                    $term_list[] = $term->slug;
                }
                $filter_class = implode(' ', $term_list);

                if ( !empty( $data_animation ) ) {
                    $data_animation['animation_delay'] = ((float)$settings['item_animation_delay'] * $d);
                    $data_animations = json_encode($data_animation);
                    $data_settings = 'data-settings="'.esc_attr($data_animations).'"';
                }

                ?>
                <div class="<?php echo trim(implode(' ', [$item_class, $filter_class, $animate_cls])); ?>" <?php pxl_print_html($data_settings); ?>>
                    <?php
                    do_action( 'woocommerce_before_shop_loop_item' );
                    do_action( 'woocommerce_before_shop_loop_item_title' );
                    do_action( 'woocommerce_shop_loop_item_title' );
                    do_action( 'woocommerce_after_shop_loop_item_title' );
                    do_action( 'woocommerce_after_shop_loop_item' );
                    ?>
                </div>
                <?php
            }
            if($settings['layout_mode'] == 'masonry')
                echo '<div class="grid-sizer '.$item_class.'"></div>';
            $html = ob_get_clean();
            wp_send_json(
                array(
                    'status' => true,
                    'message' => esc_html__('Load Post Grid Successfully!', 'builderrin'),
                    'data' => array(
                        'html'  => $html,
                        'paged' => $settings['paged'],
                        'posts' => $posts,
                        'max' => $max,
                    ),
                )
            );
        }else{
            wp_send_json(
                array(
                    'status' => false,
                    'message' => esc_html__('Load Post Grid No More!', 'builderrin')
                )
            );
        }
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

add_action( 'wp_ajax_builderrin_load_more_post_grid', 'builderrin_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_builderrin_load_more_post_grid', 'builderrin_load_more_post_grid' );
function builderrin_load_more_post_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'builderrin'));
        }
        $settings = $_POST['settings'];
        set_query_var('paged', $settings['paged']);
        extract(pxl_get_posts_of_grid($settings['post_type'], [
            'source' => isset($settings['source'])?$settings['source']:'',
            'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
            'order' => isset($settings['order'])?$settings['order']:'desc',
            'limit' => isset($settings['limit'])?$settings['limit']:'6',
            'post_ids' => isset($settings['post_ids'])?$settings['post_ids']:[],
        ]));
        ob_start();

        builderrin_get_post_grid($posts, $settings);
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'builderrin'),
                'data' => array(
                    'html' => $html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}