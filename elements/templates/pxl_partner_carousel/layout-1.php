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
$img_size = '';
if(!empty($settings['img_size'])) {
    $img_size = $settings['img_size'];
} else {
    $img_size = 'full';
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
$vertical_scroll = $widget->get_setting('vertical_scroll','false');
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
if(isset($settings['partner']) && !empty($settings['partner']) && count($settings['partner'])): ?>
    <div class="pxl-swiper-sliders pxl-partner-carousel pxl-partner-carousel1 pxl-swiper-arrow-show <?php echo esc_attr($settings['box_type']); ?> <?php if($vertical_scroll == 'true') { echo 'pxl-carousel-mousewheel'; } ?>" data-arrow="<?php echo esc_attr($arrows); ?>">
        <div class="pxl-carousel-inner <?php if($vertical_scroll == 'true') { echo 'pxl-ov-hidden'; } ?>">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['partner'] as $key => $value):
                        $image = isset($value['image']) ? $value['image'] : '';
                        $image_dark = isset($value['darkmode_image']) ? $value['darkmode_image'] : '';
                        $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                        if ( ! empty( $value['link']['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $value['link']['url'] );

                            if ( $value['link']['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }

                            if ( $value['link']['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                        }
                        $link_attributes = $widget->get_render_attribute_string( $link_key );
                        ?>
                        <div class="pxl-swiper-slide <?php if($show_cursor_text == 'true') { echo 'pxl-no-cursor'; } ?>" <?php if($show_cursor_text == 'true') { echo 'data-cursor-text="'.esc_attr($data_cursor_text).'"'; } ?>>
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
                                <?php if(!empty($image['id'])) {
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => $img_size,
                                        'class' => 'image-light no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail'];?>
                                    <div class="pxl-item--image">
                                        <?php if ( ! empty( $value['link']['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                            <?php echo wp_kses_post($thumbnail); ?>
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        <?php if ( ! empty( $value['link']['url'] ) ) { ?></a><?php } ?>
                                    </div>
                                <?php } ?>
                                <?php if(!empty($image_dark['id'])) {
                                    $img_dark = pxl_get_image_by_size( array(
                                        'attach_id'  => $image_dark['id'],
                                        'thumb_size' => $img_size,
                                        'class' => 'image-dark no-lazyload',
                                    ));
                                    $thumbnail_dark = $img_dark['thumbnail'];?>
                                    <div class="pxl-item--image">
                                        <?php if ( ! empty( $value['link']['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                            <?php echo wp_kses_post($thumbnail_dark); ?>
                                            <?php echo wp_kses_post($thumbnail_dark); ?>
                                        <?php if ( ! empty( $value['link']['url'] ) ) { ?></a><?php } ?>
                                    </div>
                                <?php } ?>
                           </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if($arrows !== 'false'): ?>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="icomoon icon-arrow-forward-ne1 rtl-icon"></i></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="icomoon icon-arrow-back-left- rtl-icon"></i></div>
            <?php endif; ?>
            <?php if($pagination !== 'false'): ?>
                <div class="pxl-swiper-dots"></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
