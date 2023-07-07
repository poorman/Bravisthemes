<?php
$default_settings = [
    'menu_list' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = pxl_get_element_id($settings);

?>
<?php if(isset($settings['menu_list']) && !empty($settings['menu_list']) && count($settings['menu_list'])): ?>
    <div class="pxl-grid pxl-menu-list">
        <div class="pxl-grid-inner row" data-gutter="15">
            <?php foreach ($settings['menu_list'] as $key => $value):
                $title = isset($value['title']) ? $value['title'] : '';
                $excerpt = isset($value['excerpt']) ? $value['excerpt'] : '';
                $price = isset($value['price']) ? $value['price'] : '';
                ?>
                <div class="menu-item">
                    <div class="pxl-item--inner">
                        <div class="wp-title">
                            <?php if(!empty($title)) { ?>
                                <h4 class="pxl--title">
                                    <?php echo pxl_print_html($title); ?>
                                </h4>
                            <?php } ?>
                            <span class="line-dotted"></span>
                            <?php if(!empty($price)) { ?>
                                <span class="pxl--price"><?php echo pxl_print_html($price); ?></span>
                            <?php } ?>
                        </div>
                        <?php if(!empty($excerpt)) { ?>
                            <div class="pxl--excerpt"><?php echo pxl_print_html($excerpt); ?></div>
                        <?php } ?>
                   </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
