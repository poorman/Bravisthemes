<?php
$html_id = pxl_get_element_id($settings);
$tax = array();
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
extract(pxl_get_posts_of_grid(
    'service',
    ['source' => $source, 'orderby' => $orderby, 'order' => $order, 'limit' => $limit, 'post_ids' => $post_ids],
    ['service-category']
));

$post_type = $widget->get_setting('post_type', 'service');
$layout = $widget->get_setting('layout_'.$post_type, 'service-1');
$load_more = array(
    'post_type'       => $post_type,
    'layout'          => $layout,
    'startPage'       => $paged,
    'maxPages'        => $max,
    'total'           => $total,
    'perpage'         => $limit,
    'nextLink'        => $next_link,
    'source'          => $source,
    'orderby'         => $orderby,
    'order'           => $order,
    'limit'           => $limit,
    'post_ids'        => $post_ids,
    'html_id'    => $html_id,
);
?>

<div id="<?php echo esc_attr($html_id) ?>" class="pxl-service-detail1">
    <?php 
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            ?>
            <a class="service-title" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                    <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                <?php endif; ?>
                <?php if($service_icon_type == 'image' && !empty($service_icon_img)) :
                    $icon_img = pxl_get_image_by_size( array(
                        'attach_id'  => $service_icon_img['id'],
                        'thumb_size' => 'full',
                    ));
                    $icon_thumbnail = $icon_img['thumbnail'];
                    ?>
                    <?php echo wp_kses_post($icon_thumbnail); ?>
                <?php endif; ?>
                <span>
                    <?php echo esc_attr(get_the_title($post->ID)); ?>                    
                </span>
            </a>
        <?php endforeach;
    endif; ?>
</div>