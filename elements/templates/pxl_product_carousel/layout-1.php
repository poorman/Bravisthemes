<?php
$html_id = pxl_get_element_id($settings);
$source = $widget->get_setting('source', '');
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 4);
$post_ids = $widget->get_setting('post_ids', '');
extract(pxl_get_posts_of_grid('product', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows','false');
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');

$img_size = $widget->get_setting('img_size');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1',
    'slide_mode'                    => 'slide',
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'             => $col_xxl,
    'slides_to_show_lg'             => $col_lg,
    'slides_to_show_md'             => $col_md,
    'slides_to_show_sm'             => $col_sm,
    'slides_to_show_xs'             => $col_xs,
    'slides_to_scroll'              => $slides_to_scroll,
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,

    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed
];
$cursor_arrow = $widget->get_setting('cursor_arrow','false');   
$cursor_drag = $widget->get_setting('cursor_drag','false');   
$cursor_arrow_cls = $cursor_arrow == 'true' ? 'cursor-arrow' : 'none-cursor';
$cursor_drag_cls = $cursor_drag == 'true' ? 'cursor-drag' : 'none-drag';

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container ' .$cursor_drag_cls.'-area',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); 
?>

<?php if (is_array($posts)): ?>
    <div id="<?php echo esc_attr($html_id) ?>" class="pxl-swiper-sliders pxl-product-carousel pxl-product-carousel1 woocommerce" data-arrow="<?php echo esc_attr($arrows); ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    foreach ($posts as $post):
                        if(class_exists('Woocommerce')) {
                            global $product;
                            $product = wc_get_product( $post->ID );
                            $unit_price = get_post_meta($product->get_id(), 'unit_price'); ?>
                            <div class="pxl-swiper-slide">
                                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
                                    <div class="woocommerce-product-inner">
                                        <?php
                                        $image_size = !empty($img_size) ? $img_size : '250x250';
                                        $img_id     = get_post_thumbnail_id( $post->ID );
                                        if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                                            $img = pxl_get_image_by_size( array(
                                                'attach_id'  => $img_id,
                                                'thumb_size' => $image_size
                                            ) );
                                        $thumbnail = $img['thumbnail'];
                                        ?>
                                        <div class="woocommerce-product-header">
                                            <a class="woocommerce-product-details" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                                <?php if ($product->is_on_sale()):?><span class="product-onsale"><?php echo pxl_print_html('SALE', 'builderrin'); ?></span><?php endif; ?>
                                                <?php echo wp_kses_post($thumbnail); ?>
                                            </a>
                                            <div class="woocommerce-product-meta">
                                                <?php if (class_exists('WPCleverWoosw')) { ?>
                                                    <div class="woocommerce-btn-item woocommerce-wishlist">
                                                        <?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                                    </div>
                                                <?php } ?>
                                                <?php if (class_exists('WPCleverWoosq')) { ?>
                                                    <div class="woocommerce-btn-item woocommerce-quick-view">
                                                        <?php echo do_shortcode('[woosq id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                                    </div>
                                                <?php } ?>
                                                <?php if (class_exists('WPCleverWoosc')) { ?>
                                                    <div class="woocommerce-btn-item woocommerce-compare">
                                                        <?php echo do_shortcode('[woosc id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="woocommerce-product-content">
                                        <h5 class="woocommerce-product--title">
                                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
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
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php if($arrows !== 'false'): ?>
            <div class="wp-arrow" data-cursor="-hidden">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="far fa-arrow-left"></i></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="far fa-arrow-right"></i></div>
            </div>
        <?php endif; ?>
        <?php if($pagination !== 'false'): ?>
            <div class="pxl-swiper-dots"></div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>