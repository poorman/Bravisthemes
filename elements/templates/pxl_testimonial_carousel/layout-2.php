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
if(isset($settings['testimonial2']) && !empty($settings['testimonial2']) && count($settings['testimonial2'])): ?>
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel2 pxl-parent-transition pxl-swiper-arrow-show <?php if($arrows == 'true') { echo esc_attr__( 'pxl-show-arrow', 'builderrin' ); } ?>" data-view-auto="<?php echo esc_attr($col_xl); ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial2'] as $key => $value):
                        $style = isset($value['style']) ? $value['style'] : '';
                        $show_star = isset($value['show_star']) ? $value['show_star'] : '';
                        $star = isset($value['star']) ? $value['star'] : '';
                        $show_icon = isset($value['show_icon']) ? $value['show_icon'] : '';
                        $icon = isset($value['icon2']) ? $value['icon2'] : '';
                        $title2 = isset($value['title2']) ? $value['title2'] : '';
                        $desc2 = isset($value['desc2']) ? $value['desc2'] : '';
                        $image = isset($value['image2']) ? $value['image2'] : '';
                        $img_size = isset($settings['img_size']) ? $settings['img_size'] : '';
                        $image_size = !empty($img_size) ? $img_size : 'full';
                        $author2 = isset($value['author2']) ? $value['author2'] : '';
                        $position2 = isset($value['position2']) ? $value['position2'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner pxl-transtion <?php echo esc_attr($style); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
                                <?php if( $show_star == 'true' ) : ?>
                                    <span class="pxl-item--star--title">Rating :</span>
                                    <span class="pxl-item--star <?php echo esc_attr($star); ?>">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <i aria-hidden="true" class="flaticon flaticon-quotes"></i>
                                <?php endif; ?>
                                <?php if(!empty($title2)) : ?>
                                    <h6 class="pxl-item--title el-empty"><?php echo pxl_print_html($title2); ?></h6>
                                <?php endif; ?>
                                <?php if(!empty($desc2)) : ?>
                                    <?php if( $show_icon == 'true' && !empty($icon['value']) ) : ?>
                                        <div class="pxl-item--holder">
                                            <div class="pxl-item--icon"><?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?></div>
                                        <?php endif; ?>
                                        <div class="pxl-item--desc el-empty <?php echo esc_attr($settings['pxl_animate_description']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_description']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration_description']); ?>s"><?php echo pxl_print_html($desc2); ?></div>
                                        <?php if( $show_icon == 'true' ) { ?>
                                        </div>
                                    <?php } ?>
                                <?php endif; ?>
                                <?php if( $show_icon == 'true' && !empty($icon['value']) ) : ?>
                                    <div class="pxl-item--holder">
                                        <div class="pxl-item--icon pxl-opacity"><?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?></div>
                                    <?php endif; ?>
                                    <div class="pxl-item-content">
                                        <?php if(!empty($image['id'])) {
                                            $img = pxl_get_image_by_size( array(
                                                'attach_id'  => $image['id'],
                                                'thumb_size' => $image_size,
                                                'class' => 'no-lazyload',
                                            ));
                                            $thumbnail = $img['thumbnail'];
                                            ?>
                                            <div class="pxl-author--image"><?php echo wp_kses_post($thumbnail); ?></div>
                                        <?php } ?>
                                        <div class="pxl-content-inner">
                                            <?php if(!empty($author2)) : ?>
                                                <div class="pxl-item--author el-empty <?php echo esc_attr($settings['pxl_animate_author']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_author']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration_author']); ?>s"><?php echo pxl_print_html($author2); ?></div>
                                            <?php endif; ?>
                                            <?php if(!empty($position2)) : ?>
                                                <div class="pxl-item--position el-empty <?php echo esc_attr($settings['pxl_animate_position']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_position']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration_position']); ?>s"><?php echo pxl_print_html($position2); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if( $show_icon == 'true' ) { ?>
                                    </div>
                                <?php } ?>
                                <div class="pxl-item-svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="82" height="85" viewBox="0 0 82 85" fill="none">
                                        <rect width="82" height="85" transform="matrix(-1 0 0 1 82 0)" fill="url(#pattern0)"/>
                                        <defs>
                                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_919_1441" transform="matrix(0.00202458 0 0 0.00195312 -0.0182927 0)"/>
                                            </pattern>
                                            <image id="image0_919_1441" width="512" height="512" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAYAAAD0eNT6AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAF7GlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDUgNzkuMTYzNDk5LCAyMDE4LzA4LzEzLTE2OjQwOjIyICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOSAoV2luZG93cykiIHhtcDpDcmVhdGVEYXRlPSIyMDIyLTA4LTIxVDIyOjEzOjAxLTA3OjAwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAyMi0wOC0yMVQyMjoxNDoyMS0wNzowMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAyMi0wOC0yMVQyMjoxNDoyMS0wNzowMCIgZGM6Zm9ybWF0PSJpbWFnZS9wbmciIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpjYWQ1YmI1Zi0yNmRiLWFiNDMtYmY5MC0xNWM4ZWIwOWEyZGIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MWFlZmJjMGYtZjk0Yi02ZTQ5LTkxMjItZjg3MTY3MWY3ODkyIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6MWFlZmJjMGYtZjk0Yi02ZTQ5LTkxMjItZjg3MTY3MWY3ODkyIj4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDoxYWVmYmMwZi1mOTRiLTZlNDktOTEyMi1mODcxNjcxZjc4OTIiIHN0RXZ0OndoZW49IjIwMjItMDgtMjFUMjI6MTM6MDEtMDc6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE5IChXaW5kb3dzKSIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6Y2FkNWJiNWYtMjZkYi1hYjQzLWJmOTAtMTVjOGViMDlhMmRiIiBzdEV2dDp3aGVuPSIyMDIyLTA4LTIxVDIyOjE0OjIxLTA3OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOSAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+oIV+TwAAC6dJREFUeJzt3L+L3Hkdx/H3xj2Id8nBSCQWKiI2hkREC8urRFJYHIpgZaVwaOc/YquFhVZiOLsUgoV/gIXcj1I4xUKbwZwJ4sWMRSx1d70w85nd5+PRfqd4JfNl9vmd7373ZLfbDQDQcm31AADg8AQAAAQJAAAIEgAAECQAACBIAABAkAAAgCABAABBAgAAggQAAAQJAAAIEgAAECQAACBIAABAkAAAgCABAABBAgAAggQAAAQJAAAIEgAAECQAACBIAABAkAAAgCABAABBAgAAggQAAAQJ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"/>
                                        </defs>
                                    </svg>
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
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev <?php echo esc_attr($cursor_arrow_cls.'-prev') ?>"></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next <?php echo esc_attr($cursor_arrow_cls.'-next') ?>"></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
