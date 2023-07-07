<?php
$default_settings = [
    'filter_alignment' => '',
    'layout_mode' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = pxl_get_element_id($settings);

$filter_default_title = $widget->get_setting('filter_default_title', 'All');
$filter = $widget->get_setting('filter', 'false');
$filter_alignment = $widget->get_setting('filter_alignment', 'center');
$grid_masonry = $widget->get_setting('grid_masonry');

$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');

$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";

$img_size = isset($img_size) ? $img_size : '1170x1170';

?>
<?php if(isset($settings['gallery_showcase']) && !empty($settings['gallery_showcase']) && count($settings['gallery_showcase'])): ?>
    <div class="pxl-grid pxl-gallery-grid pxl-gallery-grid2" data-layout="<?php echo esc_attr($layout_mode); ?>">
        <?php if($filter == 'true'): ?>
            <div class="grid-filter-wrap pxl-grid-filter <?php echo esc_attr( $filter_alignment); ?>">
                <span class="filter-item active" data-filter="*">All</span>
                <?php $cat_list = array();
                foreach ( $gallery_showcase as $item ) {
                    $g_category = isset($item['category']) ? $item['category'] : '';
                    $c_a = explode(',', $g_category);
                    foreach ( $c_a as $c){
                        $r_c = str_replace(' ', '-', strtolower(trim($c)));
                        $cat_list[$r_c] = $c;
                    }
                } ?>
                <?php foreach ($cat_list as $key => $value):
                    $key_result = preg_replace('#[&]*#', '', $key); ?>
                        <?php if(!empty($value)) : ?>
                            <span class="filter-item" data-filter="<?php echo esc_attr('.' . $key_result); ?>">
                                <?php echo esc_attr($value); ?>
                            </span>
                        <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <?php foreach ($settings['gallery_showcase'] as $key => $value):
                $i_class = $item_class;
                $image_size = $img_size;
    			$image = isset($value['image']) ? $value['image'] : '';
                $title = isset($value['title']) ? $value['title'] : '';
                $text_button = isset($value['text_button']) ? $value['text_button'] : '';
                $active = isset($value['active']) ? $value['active'] : '';
                $category = isset($value['category']) ? $value['category'] : '';
                $c_l = explode(',',$category);
                $filter_class_a = array();
                foreach ( $c_l as $c_c ) {
                    $filter_class_a[] = str_replace(' ','-',trim(strtolower($c_c)));
                }
                $filter_class = implode(' ',$filter_class_a);
                $filter_class_result = preg_replace('#[&]*#', '', $filter_class);

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

                if(isset($settings['grid_masonry']) && !empty($settings['grid_masonry'][$key]) && (count($settings['grid_masonry']) > 1)) {
                    $col_xl_m = 12 / $settings['grid_masonry'][$key]['col_xl_m'];
                    $col_lg_m = 12 / $settings['grid_masonry'][$key]['col_lg_m'];
                    $col_md_m = 12 / $settings['grid_masonry'][$key]['col_md_m'];
                    $col_sm_m = 12 / $settings['grid_masonry'][$key]['col_sm_m'];
                    $col_xs_m = 12 / $settings['grid_masonry'][$key]['col_xs_m'];
                    $i_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                    $img_size_m = $settings['grid_masonry'][$key]['img_size_m'];
                    if(!empty($img_size_m)) {
                        $image_size = $img_size_m;
                    }
                }

                ?>
                <div class="<?php echo esc_attr($i_class.' '.$filter_class_result); ?>">
                    <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr($value['active']); ?>">
                        <?php if(!empty($image['id'])) {
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $image['id'],
                                'thumb_size' => $image_size,
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail'];
                            ?>
                            <div class="pxl-item--image">
                                <?php echo wp_kses_post($thumbnail); ?>
                                <?php if ( ! empty( $text_button ) ) { ?>
                                    <?php if ( ! empty( $link['url'] ) ) { ?>
                                        <a class="button-showcase btn-link" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                            <?php echo pxl_print_html($text_button); ?>
                                        </a>
                                    <?php } else { ?>
                                        <span class="button-showcase btn-text"><?php echo pxl_print_html($text_button); ?></span>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if(!empty($title)) { ?>
                            <h4 class="pxl-item--title">
                                <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                    <span><?php echo pxl_print_html($title); ?></span>
                                <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                            </h4>
                        <?php } ?>
                   </div>
                </div>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>
