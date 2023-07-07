<?php
$default_settings = [
    'title' => '',
    'list' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
?>
<?php if(isset($list) && !empty($list) && count($list)): ?>
    <div class="pxl-list <?php echo esc_attr($list_style); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
        <?php if(!empty($title)): ?>
            <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty">
            <?php echo pxl_print_html($settings['title']); ?>
            </<?php echo esc_attr($settings['title_tag']); ?>>
        <?php endif ;?>
        <div class="pxl-item--list">
            <?php
            foreach ($list as $key => $value):
                $link = isset($value['link']) ? $value['link'] : '';
                $link_key = $widget->get_repeater_setting_key( 'content', 'value', $key );
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
                <div class="pxl-list--content">
                    <?php if (!empty( $value['link']['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                        <span><?php echo pxl_print_html($value['content']); ?></span>
                    <?php if (!empty( $value['link']['url'] ) ) { ?></a><?php } ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>