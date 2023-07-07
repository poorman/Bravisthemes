<?php
$html_id = pxl_get_element_id($settings);
$tax = array();
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
extract(pxl_get_posts_of_grid(
    'post',
    ['source' => $source, 'orderby' => $orderby, 'order' => $order, 'limit' => $limit, 'post_ids' => $post_ids],
    ['category']
));
$filter_default_title = $widget->get_setting('filter_default_title', 'All');
if($settings['col_xl'] == '5') {
    $col_xl = 'pxl5';
} else {
    $col_xl = 12 / intval($widget->get_setting('col_xl', 4));
}
$col_lg = 12 / intval($widget->get_setting('col_lg', 4));
$col_md = 12 / intval($widget->get_setting('col_md', 3));
$col_sm = 12 / intval($widget->get_setting('col_sm', 2));
$col_xs = 12 / intval($widget->get_setting('col_xs', 1));
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";

$grid_class = '';
$grid_class = 'pxl-grid-inner pxl-grid-masonry row';

$filter = $widget->get_setting('filter', 'false');
$filter_alignment = $widget->get_setting('filter_alignment', 'center');
$pagination_type = $widget->get_setting('pagination_type', 'pagination');
$loadmore_style = $widget->get_setting('loadmore_style');

$layout_mode = $widget->get_setting('layout_mode', 'fitRows');
$post_box_align = $widget->get_setting('post_box_align', 'center');
$post_type = $widget->get_setting('post_type','post');
$layout = $widget->get_setting('layout_'.$post_type, 'post-1');

$show_author = $widget->get_setting('show_author');
$show_date = $widget->get_setting('show_date');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');
$text_line = $widget->get_setting('text_line');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');
$img_size = $widget->get_setting('img_size');
$grid_masonry = $widget->get_setting('grid_masonry');
$pxl_animate = $widget->get_setting('pxl_animate');
$show_cursor_text = $widget->get_setting('show_cursor_text');
$cursor_text = $widget->get_setting('cursor_text');

$data_cursor_text = '';
if(!empty($cursor_text)) {
    $data_cursor_text = $cursor_text;
} else {
    $data_cursor_text = esc_html__('◄ ►', 'builderrin');
}

$load_more = array(
    'post_type'       => $post_type,
    'layout'          => $layout,
    'layout_mode'     => $layout_mode,
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
    'col_xl'          => $col_xl,
    'col_lg'          => $col_lg,
    'col_md'          => $col_md,
    'col_sm'          => $col_sm,
    'col_xs'          => $col_xs,
    'pagination_type' => $pagination_type,
    'show_author'   => $show_author,
    'show_date'       => $show_date,
    'show_excerpt'    => $show_excerpt,
    'num_words'       => $num_words,
    'text_line'       => $text_line,
    'show_button'     => $show_button,
    'button_text'     => $button_text,
    'img_size'        => $img_size,
    'grid_masonry'    => $grid_masonry,
    'pxl_animate'     => $pxl_animate,
);
?>

<div id="<?php echo esc_attr($html_id) ?>" class="pxl-grid pxl-blog-grid pxl-blog-grid-layout1 pxl-parent-transition <?php echo esc_attr($settings['style']); ?>" data-layout="<?php echo esc_attr($layout_mode); ?>" data-start-page="<?php echo esc_attr($paged); ?>" data-max-pages="<?php echo esc_attr($max); ?>" data-total="<?php echo esc_attr($total); ?>" data-perpage="<?php echo esc_attr($limit); ?>" data-next-link="<?php echo esc_attr($next_link); ?>">
    <?php if ($select_post_by == 'term_selected' && $filter == "true"): ?>
        <div class="pxl-grid-filter pxl-filter-drag <?php if($show_cursor_text == 'true') { echo 'pxl-no-cursor'; } ?>" <?php if($show_cursor_text == 'true') { echo 'data-cursor-text="'.esc_attr($data_cursor_text).'"'; } ?>>
            <span class="filter-item active pxl-transtion" data-filter="*"><?php echo esc_html($filter_default_title); ?></span>
            <?php foreach ($categories as $category): ?>
                <?php $category_arr = explode('|', $category); ?>
                <?php $tax[] = $category_arr[1]; ?>
                <?php $term = get_term_by('slug',$category_arr[0], $category_arr[1]); ?>

                <span class="filter-item pxl-transtion" data-filter="<?php echo esc_attr('.' . $term->slug); ?>">
                    <?php echo esc_html($term->name); ?>
                </span>
            <?php endforeach; ?>
        </div>
        <span class="filter-line"></span>
    <?php endif; ?>

    <div class="<?php echo esc_attr($grid_class); ?>" data-gutter="15">
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php $load_more['tax'] = $tax; builderrin_get_post_grid($posts, $load_more); ?>
    </div>
    <?php

    if ($pagination_type == 'pagination') { ?>
        <div class="pxl-grid-pagination" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>" data-query="<?php echo esc_attr(json_encode($args)); ?>">
            <?php builderrin()->page->get_pagination($query, true); ?>
        </div>
    <?php } ?>
    <?php if (!empty($next_link) && $pagination_type == 'loadmore') { ?>
        <div class="pxl-load-more <?php echo esc_attr($loadmore_style); ?>" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>">
            <span class="btn pxl-btn-effect1">
                <?php echo esc_html__('Load More', 'builderrin') ?>
                <span class="pxl-load-icon"><i class="pxl-aw-spinner-third"></i></span>
            </span>
        </div>
    <?php } ?>
</div>