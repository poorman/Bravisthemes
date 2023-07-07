<?php
$custom_icon = $widget->get_setting('custom_icon');
$widget->add_render_attribute( 'wrapper', 'class', 'pxl-button' );
$widget->add_render_attribute( 'button', 'class', 'btn '.$settings['btn_style'].' '.$settings['pxl_animate'] );
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
} ?>
<div <?php pxl_print_html($widget->get_render_attribute_string( 'wrapper' )); ?>>
    <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?> data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
        <span class="pxl--btn-text <?php if($settings['button_effect'] != '') { echo 'pxl-wobble'; } ?>" data-animation="<?php echo esc_attr($settings['button_effect']); ?>">
            <?php if(!empty($settings['text'])) {
                $btn_text = $settings['text'];
            } else {
                $btn_text = pxl_print_html('Click Here', 'builderrin');
            }
            $chars = str_split($btn_text);
            foreach ($chars as $value) {
                if ($value == " ") {
                    $value = "&nbsp;";
                }
                echo '<span>'.$value.'</span>';
            }
            ?>
        </span>
        <?php if ($settings['btn_style'] == 'btn-style2') : ?>
            <span class="top-bottom"></span>
            <span class="left-right"></span>
        <?php endif; ?>
    </a>
</div>