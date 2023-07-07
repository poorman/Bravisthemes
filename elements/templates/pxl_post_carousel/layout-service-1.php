<?php
$html_id = pxl_get_element_id($settings);
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
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('service', [
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
$show_list = $widget->get_setting('show_list');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');
$text_line = $widget->get_setting('text_line');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');
$gradient_color = builderrin()->get_opt( 'gradient_color' );

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1',
    'slide_percolumnfill'           => '1',
    'slide_mode'                    => 'slide',
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'             => $col_xxl,
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
    'center'                         => $center,
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
    <div class="pxl-swiper-sliders pxl-service-carousel pxl-service-carousel1 pxl-parent-transition <?php if($center == 'true') { echo 'pxl--swiper-center'; } ?> <?php if($arrows == true) { echo 'pxl-arrows-active'; } ?>">
        <?php if(!empty($settings['title_text']) || !empty($settings['sub_title']) || ($arrows !== 'false') || ($pagination !== 'false') )  : ?>
        <div class="container-custom <?php echo esc_attr($settings['style_alignment']); ?>">
            <?php if(!empty($settings['title_text']) || !empty($settings['sub_title'])) : ?>
            <div class="wp-title">
                <?php if(!empty($settings['sub_title'])) : ?>
                    <div class="el--sub-title">
                        <?php echo pxl_print_html($settings['sub_title']); ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($settings['title_text'])) : ?>
                    <h2 class="el--title">
                        <?php echo pxl_print_html($settings['title_text']); ?>
                    </h2>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if($arrows !== 'false' || $pagination !== 'false'): ?>
            <div class="wp-arrow">
                <?php if($arrows !== 'false'): ?>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="far fa-long-arrow-alt-left"></i></div>
                <?php endif; ?>
                <?php if($pagination !== 'false'): ?>
                    <div class="pxl-swiper-dots"></div>
                <?php endif; ?>
                <?php if($arrows !== 'false'): ?>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="far fa-long-arrow-alt-right"></i></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
<div class="pxl-carousel-inner">
    <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
        <div class="pxl-swiper-wrapper">
            <?php
            $images_size = !empty($img_size) ? $img_size : '703x646';
            foreach ($posts as $post):
                $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
                $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
                $service_specification = get_post_meta($post->ID, 'service_specification', true);
                $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                ?>
                <div class="pxl-swiper-slide">
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
    <?php endforeach; ?>
</div>
</div>
<?php if($pagination !== 'false'): ?>
    <div class="pxl-swiper-dots"></div>
<?php endif; ?>
</div>
</div>
<?php endif; ?>