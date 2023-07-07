<?php
$html_id = pxl_get_element_id($settings);
$query_type = $widget->get_setting('query_type', 'recent_product');
$post_per_page = $widget->get_setting('post_per_page', 8);
$product_ids = $widget->get_setting('product_ids', '');
$categories = $widget->get_setting('taxonomies', '');
$param_args=[];

$loop = builderrin_woocommerce_query($query_type,$post_per_page,$product_ids,$categories,$param_args);
extract($loop);

$layout               = $widget->get_setting('layout', '1');
$filter_default_title = $widget->get_setting('filter_default_title', 'All');
$filter               = $widget->get_setting('filter', 'false');
$pagination_type      = $widget->get_setting('pagination_type', 'false');
$layout_mode          = $widget->get_setting('layout_mode', 'fitRows');

$item_animation          = $widget->get_setting('item_animation', '') ;
$item_animation_duration = $widget->get_setting('item_animation_duration', 'normal');
$item_animation_delay    = $widget->get_setting('item_animation_delay', '150');

$img_size = $widget->get_setting('img_size');
$show_cursor_text = $widget->get_setting('show_cursor_text');
$cursor_text = $widget->get_setting('cursor_text');

$data_cursor_text = '';
if(!empty($cursor_text)) {
    $data_cursor_text = $cursor_text;
} else {
    $data_cursor_text = esc_html__('◄ ►', 'builderrin');
}

$load_more = array(
    'layout'             => $layout,
    'query_type'         => $query_type,
    'product_ids'        => $product_ids,
    'categories'         => $categories,
    'param_args'         => $param_args,
    'startPage'          => $paged,
    'maxPages'           => $max,
    'total'              => $total,
    'limit'              => $post_per_page,
    'nextLink'           => $next_link,
    'layout_mode'         => $layout_mode,
    'filter'              => $filter,
    'item_animation'          => $item_animation ,
    'item_animation_duration' => $item_animation_duration,
    'item_animation_delay'    => $item_animation_delay,
    'col_xs'                  => $widget->get_setting('col_xs', '1'),
    'col_sm'                  => $widget->get_setting('col_sm', '2'),
    'col_md'                  => $widget->get_setting('col_md', '2'),
    'col_lg'                  => $widget->get_setting('col_lg', '3'),
    'col_xl'                  => $widget->get_setting('col_xl', '4'),
    'col_xxl'                 => $widget->get_setting('col_xxl', '4')
);

$widget->add_render_attribute( 'wrapper', [
    'id'               => $html_id,
    'class'            => trim('pxl-grid woocommerce pxl-product-grid layout-'.$layout),
    'data-layout'      =>  $layout_mode,
    'data-start-page'  => $paged,
    'data-max-pages'   => $max,
    'data-total'       => $total,
    'data-perpage'     => $post_per_page,
    'data-next-link'   => $next_link
]);

if(is_admin())
    $grid_class = 'pxl-grid-inner pxl-grid-masonry-adm row relative';
else
    $grid_class = 'pxl-grid-inner pxl-grid-masonry row relative';

$widget->add_render_attribute( 'grid', 'class', $grid_class);

if( $total <= 0){
    echo '<div class="pxl-no-post-grid">'.esc_html__( 'No Post Found', 'builderrin' ). '</div>';
    return;
}

$col_xxl = 'col-xxl-'.str_replace('.', '',12 / floatval( $settings['col_xxl']));
$col_xl  = 'col-xl-'.str_replace('.', '',12 / floatval( $settings['col_xl']));
$col_lg  = 'col-lg-'.str_replace('.', '',12 / floatval( $settings['col_lg']));
$col_md  = 'col-md-'.str_replace('.', '',12 / floatval( $settings['col_md']));
$col_sm  = 'col-sm-'.str_replace('.', '',12 / floatval( $settings['col_sm']));
$col_xs  = 'col-'.str_replace('.', '',12 / floatval( $settings['col_xs']));

$item_class = trim(implode(' ', ['pxl-grid-item', $col_xxl, $col_xl, $col_lg, $col_md, $col_sm, $col_xs]));

$data_animation = [];
$animate_cls = '';
$data_settings = '';
if ( !empty( $item_animation ) ) {
    $animate_cls = ' pxl-animate pxl-invisible animated-'.$item_animation_duration;
    $data_animation['animation'] = $item_animation;
    $data_animation['animation_delay'] = $item_animation_delay;
}

?>
<?php if ($posts->found_posts > 0): ?>
    <div <?php pxl_print_html($widget->get_render_attribute_string( 'wrapper' )) ?>>
        <div class="pxl-grid-overlay"></div>
        <?php if ($filter == "true" && !empty($categories) ): ?>
            <div class="grid-filter-wrap pxl-grid-filter pxl-filter-drag <?php if($show_cursor_text == 'true') { echo 'pxl-no-cursor'; } ?>" <?php if($show_cursor_text == 'true') { echo 'data-cursor-text="'.esc_attr($data_cursor_text).'"'; } ?>>
                <span class="filter-item active pxl-transtion" data-filter="*"><?php echo esc_html($filter_default_title); ?></span>
                <?php foreach ($categories as $category): ?>
                    <?php $term = get_term_by('slug',$category, 'product_cat'); ?>
                    <span class="filter-item pxl-transtion" data-filter="<?php echo esc_attr('.' . $term->slug); ?>"><?php echo esc_html($term->name); ?></span>
                <?php endforeach; ?>
            </div>
            <span class="filter-line"></span>
        <?php endif; ?>

        <div <?php pxl_print_html($widget->get_render_attribute_string('grid')); ?>>
            <?php
                $d = 0;
                while ($posts->have_posts()) {
                    $posts->the_post();
                    global $product;
                    $d++;
                    $term_list = array();
                    $term_of_post = wp_get_post_terms($product->get_ID(), 'product_cat');
                    $unit_price = get_post_meta($product->get_id(), 'unit_price');
                    foreach ($term_of_post as $term) {
                        $term_list[] = $term->slug;
                    }
                    $filter_class = implode(' ', $term_list);

                    if ( !empty( $data_animation ) ) {
                        $data_animation['animation_delay'] = ((float)$item_animation_delay * $d);
                        $data_animations = json_encode($data_animation);
                        $data_settings = 'data-settings="'.esc_attr($data_animations).'"';
                    }

                    ?>
                    <div class="<?php echo trim(implode(' ', [$item_class, $filter_class, $animate_cls])); ?>" <?php pxl_print_html($data_settings); ?>>
                        <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
                            <div class="woocommerce-product-inner">
                                <?php
                                $image_size = !empty($img_size) ? $img_size : '250x250';
                                $img_id     = get_post_thumbnail_id( $product->get_ID() );
                                if (has_post_thumbnail($product->get_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($product->get_ID()), false)):
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $img_id,
                                        'thumb_size' => $image_size
                                    ) );
                                $thumbnail = $img['thumbnail'];
                                ?>
                                <div class="woocommerce-product-header">
                                    <a class="woocommerce-product-details" href="<?php echo esc_url(get_permalink( $product->get_ID() )); ?>">
                                        <?php if ($product->is_on_sale()):?><span class="product-onsale"><?php echo pxl_print_html('SALE', 'builderrin'); ?></span><?php endif; ?>
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </a>
                                    <div class="woocommerce-product-meta">
                                        <?php if (class_exists('WPCleverWoosw')) { ?>
                                            <div class="woocommerce-btn-item woocommerce-wishlist">
                                                <?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="woocommerce-btn-item woocommerce-add-to--cart">
                                            <?php
                                            echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button ajax_add_to_cart %s product_type_%s"></a>',
                                                    esc_url( $product->add_to_cart_url() ),
                                                    esc_attr( $product->get_id() ),
                                                    esc_attr( $product->get_sku() ),
                                                    $product->is_purchasable() ? 'add_to_cart_button' : '',
                                                    esc_attr( $product->get_type() ),
                                                ),
                                                $product );
                                            ?>
                                        </div>
                                        <?php if (class_exists('WPCleverWoosq')) { ?>
                                            <div class="woocommerce-btn-item woocommerce-quick-view">
                                                <?php echo do_shortcode('[woosq id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="woocommerce-product-content">
                                    <h5 class="woocommerce-product--title">
                                        <a href="<?php echo esc_url(get_permalink( $product->get_ID() )); ?>"><?php echo esc_attr(get_the_title($product->get_ID())); ?></a>
                                    </h5>
                                    <?php if(!empty($unit_price)) : ?>
                                        <div class="unit-price"><?php print implode(", ", $unit_price); ?></div>
                                    <?php endif; ?>
                                    <div class="woocommerce-product-rating">
                                        <?php woocommerce_template_loop_rating(); ?>
                                    </div>
                                    <div class="woocommerce-product--price">
                                        <span class="price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }

                if($layout_mode == 'masonry')
                    echo '<div class="grid-sizer '.$item_class.'"></div>';
            ?>
            <?php wp_reset_postdata(); ?>
        </div>

        <?php if ($pagination_type == 'pagination') { ?>
            <div class="pxl-grid-pagination pagin-product d-flex" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>" data-query="<?php echo esc_attr(json_encode($args)); ?>">
                <?php builderrin()->page->get_pagination($query, true); ?>
            </div>
        <?php } ?>
        <?php if (!empty($next_link) && $pagination_type == 'loadmore'):
            ?>
            <div class="pxl-load-more product" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>" data-loading-text="<?php echo esc_attr__('Loading', 'builderrin') ?>" data-loadmore-text="<?php echo esc_html($settings['loadmore_text']); ?>">
                <span class="pxl-btn btn-product-grid-loadmore right">
                    <span class="btn-text"><?php echo esc_html($settings['loadmore_text']); ?></span>
                    <span class="pxl-btn-icon pxli-spinner"></span>
                </span>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>