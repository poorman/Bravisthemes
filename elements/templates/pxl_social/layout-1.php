<?php
if(isset($settings['link']) && !empty($settings['link']) && count($settings['link'])): ?>
    <ul class="pxl-social <?php echo esc_attr( $settings['display_style'].' '.$settings['pxl_animate'] ); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php
            foreach ($settings['link'] as $key => $link):
                $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                if ( ! empty( $link['link']['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $link['link']['url'] );

                    if ( $link['link']['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $link['link']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key );
                ?>
                <li>
                    <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                        <span><?php echo pxl_print_html($link['text']); ?></span>
                    </a>
                </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
