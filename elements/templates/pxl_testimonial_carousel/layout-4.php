<?php
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
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite','false');
$speed = $widget->get_setting('speed', '500');
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
if(isset($settings['testimonial4']) && !empty($settings['testimonial4']) && count($settings['testimonial4'])): ?>
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel4 pxl-swiper-arrow-show <?php if($arrows == 'true') { echo esc_attr__( 'pxl-show-arrow', 'builderrin' ); } ?>" data-view-auto="<?php echo esc_attr($col_xl); ?>" data-cursor="-hidden">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial4'] as $key => $value):
                        $show_star = isset($value['show_star4']) ? $value['show_star4'] : '';
                        $star = isset($value['star4']) ? $value['star4'] : '';
                        $show_icon = isset($value['show_icon4']) ? $value['show_icon4'] : '';
                        $image = isset($value['image4']) ? $value['image4'] : '';
                        $icon = isset($value['icon4']) ? $value['icon4'] : '';
                        $title = isset($value['title4']) ? $value['title4'] : '';
                        $desc = isset($value['desc4']) ? $value['desc4'] : '';
                        $author = isset($value['author4']) ? $value['author4'] : '';
                        $position = isset($value['position4']) ? $value['position4'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner pxl-draw-svg pxl-transtion <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
                                <div class="pxl-author">
                                    <?php if(!empty($image['id'])) {
                                        $img = pxl_get_image_by_size( array(
                                            'attach_id'  => $image['id'],
                                            'thumb_size' => '75x75',
                                            'class' => 'no-lazyload',
                                        ));
                                        $thumbnail = $img['thumbnail'];
                                        ?>
                                        <div class="pxl-author--image">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                            <?php if( $show_icon == 'true' && !empty($icon['value']) ) : ?>
                                                <div class="pxl-item--icon">
                                                    <?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                                                    <?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <?php if( $show_star == 'true' ) : ?>
                                    <span class="pxl-item--star <?php echo esc_attr($star); ?>">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                <?php endif; ?>
                                <?php if(!empty($title)) : ?>
                                    <h6 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h6>
                                <?php endif; ?>
                                <?php if(!empty($desc)) : ?>
                                    <div class="pxl-item--desc el-empty <?php echo esc_attr($settings['pxl_animate_description']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_description']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration_description']); ?>s"><?php echo pxl_print_html($desc); ?></div>
                                <?php endif; ?>
                                <?php if(!empty($author) || !empty($position)) : ?>
                                <div class="pxl-item-content">
                                    <?php if(!empty($author)) : ?>
                                        <div class="pxl-item--author el-empty <?php echo esc_attr($settings['pxl_animate_author']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_author']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration_author']); ?>s"><?php echo pxl_print_html($author); ?></div>
                                    <?php endif; ?>
                                    <?php if(!empty($position)) : ?>
                                        <div class="pxl-item--position el-empty <?php echo esc_attr($settings['pxl_animate_position']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_position']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration_position']); ?>s"><?php echo pxl_print_html($position); ?></div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php if($pagination !== 'false'): ?>
            <div class="pxl-swiper-dots"></div>
        <?php endif; ?>
        <?php if($arrows == 'true'): ?>
            <div class="wp-arrow" data-cursor="-hidden">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="far fa-arrow-left"></i></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="far fa-arrow-right"></i></div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
