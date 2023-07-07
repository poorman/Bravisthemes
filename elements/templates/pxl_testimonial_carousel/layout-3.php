<?php
$html_id = pxl_get_element_id($settings);
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
$arrows_style = $widget->get_setting('arrows_style','style1');
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
if(isset($settings['testimonial3']) && !empty($settings['testimonial3']) && count($settings['testimonial3'])): ?>
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel3 pxl-parent-transition pxl-swiper-arrow-show <?php if($arrows == 'true') { echo esc_attr__( 'pxl-show-arrow', 'builderrin' ); } ?>" data-view-auto="<?php echo esc_attr($col_xl); ?>" data-cursor="-hidden">
        <div class="pxl-swiper-thumbs " data-vertial='true'>
            <div class="swiper-wrapper">
                <?php foreach ($settings['testimonial3'] as $key => $value_top):
                    $small_image = isset($value_top['small_image3']) ? $value_top['small_image3'] : '';
                    $img_size = isset($settings['img_size']) ? $settings['img_size'] : '';
                    $image_size = !empty($img_size) ? $img_size : 'full';
                    ?>
                    <div class="swiper-slide">
                        <?php if(!empty($small_image['id'])) {
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $small_image['id'],
                                'thumb_size' => $image_size,
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail'];?>
                            <?php echo wp_kses_post($thumbnail);?>
                        <?php } ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial3'] as $key => $value):
                        $small_image = isset($value['small_image3']) ? $value['small_image3'] : '';
                        $title3 = isset($value['title3']) ? $value['title3'] : '';
                        $image = isset($value['image3']) ? $value['image3'] : '';
                        $author3 = isset($value['author3']) ? $value['author3'] : '';
                        $position3 = isset($value['position3']) ? $value['position3'] : '';
                        $icon = isset($value['icon3']) ? $value['icon3'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
                                <?php if(!empty($title3)) : ?>
                                    <h3 class="pxl-item--title el-empty"><?php echo pxl_print_html($title3); ?></h3>
                                <?php endif; ?>
                                <div class="pxl-item--holder">
                                    <div class="pxl-item-content">
                                        <?php if(!empty($image['id'])) {
                                            $img = pxl_get_image_by_size( array(
                                                'attach_id'  => $image['id'],
                                                'thumb_size' => 'full',
                                                'class' => 'no-lazyload',
                                            ));
                                            $thumbnail = $img['thumbnail'];
                                            ?>
                                            <div class="pxl-author--image"><?php echo wp_kses_post($thumbnail); ?></div>
                                        <?php } ?>
                                        <div class="pxl-content-inner">
                                            <?php if(!empty($author3)) : ?>
                                                <h6 class="pxl-item--author el-empty <?php echo esc_attr($settings['pxl_animate_author']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_author']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration_author']); ?>s"><?php echo pxl_print_html($author3); ?></h6>
                                            <?php endif; ?>
                                            <?php if(!empty($position3)) : ?>
                                                <h6 class="pxl-item--position el-empty <?php echo esc_attr($settings['pxl_animate_position']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_position']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration_position']); ?>s"><?php echo pxl_print_html($position3); ?></h6>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if(!empty($icon['value'])) : ?>
                                        <div class="pxl-item--icon pxl-transtion"><?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?></div>
                                    <?php endif; ?>
                                </div>
                           </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if($pagination !== 'false'): ?>
                <div class="pxl-swiper-dots"></div>
            <?php endif; ?>
            <?php if($arrows == 'true'): ?>
                <div class="wp-arrow">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="far fa-arrow-left"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="far fa-arrow-right"></i></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
