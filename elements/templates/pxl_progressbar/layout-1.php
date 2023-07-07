<?php
$default_settings = [
    'title' => '',
    'progressbar_list' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
?>
<?php
if(isset($progressbar_list) && !empty($progressbar_list) && count($progressbar_list)): ?>
    <div class="pxl-progressbar pxl-progressbar-1 <?php echo esc_attr($settings['style']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($progressbar_list as $key => $value):
            $progress_bar_key = $widget->get_repeater_setting_key( 'progress_bar', 'value', $key );
            $widget->add_render_attribute( $progress_bar_key, [
                'class' => 'pxl--progressbar',
                'role' => 'progressbar',
                'data-valuetransitiongoal' => $value['percent']['size'],
            ] ); ?>
            <div class="pxl--item">
                <div class="pxl--meta">
                    <?php if ( !empty( $value['title'] ) ) { ?>
                        <span class="pxl--title"><?php echo pxl_print_html($value['title']); ?></span>
                    <?php } ?>
                </div>
                <div class="pxl--holder">
                    <div <?php pxl_print_html($widget->get_render_attribute_string( $progress_bar_key )); ?>>
                        <div class="pxl--percentage pxl--counter-value" data-duration="2000" data-to-value="<?php echo pxl_print_html($value['percent']['size']); ?>">0</div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>