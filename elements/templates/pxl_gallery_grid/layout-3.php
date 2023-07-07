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
<?php if(isset($settings['gallery_classes']) && !empty($settings['gallery_classes']) && count($settings['gallery_classes'])): ?>
    <div class="pxl-grid pxl-gallery-grid pxl-gallery-grid3" data-layout="<?php echo esc_attr($layout_mode); ?>">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <?php foreach ($settings['gallery_classes'] as $key => $value):
                $i_class = $item_class;
                $image_size = $img_size;
    			$image = isset($value['image']) ? $value['image'] : '';
                $title = isset($value['title']) ? $value['title'] : '';
                $sub_title = isset($value['sub_title']) ? $value['sub_title'] : '';
                $excerpt = isset($value['excerpt']) ? $value['excerpt'] : '';
                $category = isset($value['category']) ? $value['category'] : '';
                $c_l = explode(',',$category);
                $filter_class_a = array();
                foreach ( $c_l as $c_c ) {
                    $filter_class_a[] = str_replace(' ','-',trim(strtolower($c_c)));
                }
                $filter_class = implode(' ',$filter_class_a);
                $filter_class_result = preg_replace('#[&]*#', '', $filter_class);

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
                    <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
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
                            </div>
                        <?php } ?>
                        <div class="pxl-item--holder">
                            <div class="pxl-holder-inner">
                                <?php if(!empty($title)) { ?>
                                    <h4 class="pxl-item--title">
                                        <?php echo pxl_print_html($title); ?>
                                    </h4>
                                <?php } ?>
                                <?php if(!empty($sub_title)) { ?>
                                    <div class="pxl-item--subtitle"><?php echo pxl_print_html($sub_title); ?></div>
                                <?php } ?>
                                <?php if(!empty($excerpt)) { ?>
                                    <div class="pxl-item--excerpt"><?php echo pxl_print_html($excerpt); ?></div>
                                <?php } ?>
                            </div>
                        </div>
                   </div>
                </div>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>