<div class="pxl-contact-info pxl-contact-info1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
    <div class="pxl-item--inner">
        <?php if ( $settings['show_icon'] == 'true' && !empty($settings['pxl_icon']['value']) ) : ?>
            <span class="pxl-item--icon">
                <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
            </span>
        <?php endif; ?>
        <div class="pxl-item--container">
            <?php if ( !empty($settings['title']) ) : ?>
                <span class="pxl-item--title"><?php echo pxl_print_html($settings['title']); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $settings['item_link']['url'] ) ) :
                $widget->add_render_attribute( 'item_link', 'href', $settings['item_link']['url'] );
                if ( $settings['item_link']['is_external'] ) {
                    $widget->add_render_attribute( 'item_link', 'target', '_blank' );
                }
                if ( $settings['item_link']['nofollow'] ) {
                    $widget->add_render_attribute( 'item_link', 'rel', 'nofollow' );
                } ?>
                <div class="pxl-item--description" <?php pxl_print_html($widget->get_render_attribute_string( 'item_link' )); ?>>
                    <?php echo pxl_print_html($settings['desc']); ?>
                </div>
            <?php else : ?>
                <div class="pxl-item--description">
                    <?php echo pxl_print_html($settings['desc']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>