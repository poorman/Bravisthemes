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
$center = $widget->get_setting('center', 'false');

$img_size = $widget->get_setting('img_size', 'full');
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
<?php if(isset($settings['team']) && !empty($settings['team']) && count($settings['team'])): ?>
<div class="pxl-swiper-sliders pxl-team pxl-team-carousel1 pxl-parent-transition <?php if($pagination !== 'false') { echo pxl_print_html('slide-swiper-dots', 'builderrin'); } ?> <?php echo esc_attr($settings['style']); ?> <?php if($center == 'true') { echo 'pxl--swiper-center'; } ?>">
    <div class="pxl-carousel-inner">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
            <div class="pxl-swiper-wrapper">
                <?php foreach ($settings['team'] as $key => $value):
                    $title = isset($value['title']) ? $value['title'] : '';
                    $position = isset($value['position']) ? $value['position'] : '';
                    $image = isset($value['image']) ? $value['image'] : '';
                    $social = isset($value['social']) ? $value['social'] : '';
                    $link = isset($value['link']) ? $value['link'] : '';
                    $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
                    if ( ! empty( $link['url'] ) ) {
                        $widget->add_render_attribute( $link_key, 'href', $link['url'] );

                        if ( $link['is_external'] ) {
                            $widget->add_render_attribute( $link_key, 'target', '_blank' );
                        }

                        if ( $link['nofollow'] ) {
                            $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                        }
                    }
                    $link_attributes = $widget->get_render_attribute_string( $link_key );
                    ?>
                    <div class="pxl-swiper-slide">
                        <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                            <?php if(!empty($image['id'])) {
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $image['id'],
                                    'thumb_size' => $img_size,
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];
                                ?>
                                <div class="pxl-item--image">
                                    <?php if ( ! empty( $link['url'] ) ): ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php endif; ?>
                                    <?php if ( ! empty( $link['url'] ) ): ?></a><?php endif; ?>
                                    <?php if(!empty($social)): ?>
                                        <div class="pxl-item--social">
                                            <?php $team_social = json_decode($social, true);
                                            foreach ($team_social as $value): ?>
                                                <a href="<?php echo esc_url($value['url']); ?>" target="_blank">
                                                    <span></span>
                                                    <i class="<?php echo esc_attr($value['icon']); ?>"></i>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php echo wp_kses_post($thumbnail); ?>
                                    <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                                </div>
                            <?php } ?>
                            <div class="plx-item--holder">
                                <div class="pxl-item--meta pxl-transtion">
                                    <h4 class="pxl-item--title el-empty pxl-transtion"><?php echo pxl_print_html($title); ?></h4>
                                    <div class="pxl-item--position el-empty pxl-transtion"><?php echo pxl_print_html($position); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php if($pagination !== 'false'): ?>
        <div class="pxl-swiper-dots"></div>
    <?php endif; ?>
    <?php if($arrows !== 'false') : ?>
        <div class="container-custom">
            <div class="wp-arrow">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev <?php echo esc_attr($cursor_arrow_cls.'-prev') ?>"></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next <?php echo esc_attr($cursor_arrow_cls.'-next') ?>"></div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php endif; ?>