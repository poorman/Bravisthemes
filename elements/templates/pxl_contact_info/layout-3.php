<div class="pxl-contact-info pxl-contact-info3 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
    <div class="pxl-item--inner">
        <?php if ( !empty($settings['number']) ) : ?>
            <span class="pxl-item--number"><?php echo pxl_print_html($settings['number']); ?></span>
        <?php endif; ?>
        <div class="pxl-item--content">
            <?php if ( !empty($settings['title3']) ) : ?>
                <span class="pxl-item--title"><?php echo pxl_print_html($settings['title3']); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $settings['item_link3']['url'] ) ) : 
                $widget->add_render_attribute( 'item_link3', 'href', $settings['item_link3']['url'] );
                if ( $settings['item_link3']['is_external'] ) {
                    $widget->add_render_attribute( 'item_link3', 'target', '_blank' );
                }
                if ( $settings['item_link3']['nofollow'] ) {
                    $widget->add_render_attribute( 'item_link3', 'rel', 'nofollow' );
                } ?>
            ?>
            <a class="pxl-item--description" <?php pxl_print_html($widget->get_render_attribute_string( 'item_link3' )); ?>>
                <?php echo pxl_print_html($settings['desc3']); ?>
            </a>
        <?php else : ?>
            <div class="pxl-item--description">
                <?php echo pxl_print_html($settings['desc3']); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
</div>