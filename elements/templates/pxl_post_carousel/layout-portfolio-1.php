<?php
$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_'.$settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('portfolio', [
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
$center = $widget->get_setting('center', 'false');

$img_size = $widget->get_setting('img_size');
$show_category = $widget->get_setting('show_category');
$show_cursor_text = $widget->get_setting('show_cursor_text');
$cursor_text = $widget->get_setting('cursor_text');

$data_cursor_text = '';
if(!empty($cursor_text)) {
    $data_cursor_text = $cursor_text;
} else {
    $data_cursor_text = esc_html__('◄ ►', 'builderrin');
}

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1',
    'slide_percolumnfill'           => '1',
    'slide_mode'                    => 'slide',
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'            => $col_xxl,
    'slides_to_show_lg'             => $col_lg,
    'slides_to_show_md'             => $col_md,
    'slides_to_show_sm'             => $col_sm,
    'slides_to_show_xs'             => $col_xs,
    'slides_to_scroll'              => $slides_to_scroll,
    'slides_gutter'                 => 30,
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed,
    'center'                        => $center
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
    <div class="pxl-swiper-sliders pxl-portfolio-carousel pxl-portfolio-carousel1 <?php if($center == 'true') { echo 'pxl--swiper-center'; } ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    $image_size = !empty($img_size) ? $img_size : '704x924';
                    foreach ($posts as $post):
                        $img_id       = get_post_thumbnail_id( $post->ID );
                        if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                            $img          = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $image_size
                            ) );
                        $thumbnail = $img['thumbnail'];
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner pxl-grid-item-inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                                <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                                $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false); ?>
                                <div class="pxl-item--image">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </div>
                            <?php endif; ?>
                            <div class="team_social">
                                <a class="share"><i class="flaticon flaticon-share"></i></a>
                                <div class="pxl-item-share">
                                    <?php builderrin()->blog->get_socials_share_portfolio(); ?>
                                </div>                                         
                            </div>
                            <div class="pxl-item-content">
                                <span class="pxl-item-tags"><?php the_terms( $post->ID, 'portfolio-address', '', ', ' ); ?></span>                                        
                                <h4 class="pxl-item--title">
                                    <a class="pxl-wobble" data-animation="pxl-xspin" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                        <?php $chars = str_split(get_the_title($post->ID));
                                        foreach ($chars as $value) {
                                            if ($value == " ") {
                                                $value = "&nbsp;";
                                            }
                                            echo '<span>'.$value.'</span>';
                                        } ?>
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php if($arrows !== 'false'): ?>
        <div class="wp-arrow" data-cursor="-hidden">
            <div class="divider"></div>
            <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="pxl-aw-angle-left"></i></div>
            <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="pxl-aw-angle-right"></i></div>
            <div class="divider"></div>
        </div>
    <?php endif; ?>
    <?php if($pagination !== 'false'): ?>
        <div class="pxl-swiper-dots"></div>
    <?php endif; ?>
</div>
</div>
<?php endif; ?>