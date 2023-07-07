<?php

$widget->add_render_attribute( 'wrap-heading', 'class', 'pxl-heading-wrap d-flex');
 
$widget->add_render_attribute( 'large-title', 'class', 'heading-title');
if(!empty($settings['title_split_text_anm'])){
    $widget->add_render_attribute( 'large-title', 'class', 'pxl-split-text '.$settings['title_split_text_anm']);
}

if ( $settings['title_animation'] ) {
    $widget->add_render_attribute( 'large-title', 'class', 'pxl-animate pxl-invisible animated-'.$settings['title_animation_duration']);
    $widget->add_render_attribute( 'large-title', 'data-settings', 
        json_encode([
            'animation'      => $settings['title_animation'],
            'animation_delay' => !empty($settings['title_animation_delay']) ? $settings['title_animation_delay'] : 300
        ])
    );
}
$widget->add_render_attribute( 'sub-title', 'class', 'heading-subtitle');
if(!empty($settings['subtitle_split_text_anm'])){
    $widget->add_render_attribute( 'sub-title', 'class', 'pxl-split-text '.$settings['subtitle_split_text_anm']);
}

if ( $settings['sub_title_animation'] ) {
    $widget->add_render_attribute( 'sub-title', 'class', 'pxl-animate pxl-invisible animated-'.$settings['sub_title_animation_duration']);
    $widget->add_render_attribute( 'sub-title', 'data-settings', 
        json_encode([
            'animation'      => $settings['sub_title_animation'],
            'animation_delay' => !empty($settings['sub_title_animation_delay']) ? $settings['sub_title_animation_delay'] : 300
        ])
    );
}

$text_align = $widget->get_settings( 'text_align', '' );
$sub_title_on_bottom = $widget->get_settings( 'sub_title_on_bottom', 'false' );
?>
<div <?php pxl_print_html($widget->get_render_attribute_string( 'wrap-heading' )); ?>>
    <div class="pxl-heading-inner <?php echo esc_attr($settings['style']) ?> <?php echo esc_attr($text_align) ?> ">
        <?php if(!empty($settings['sub_title']) && $sub_title_on_bottom =='false'): ?>
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'sub-title' )); ?>>
                <span class="<?php echo esc_attr($settings['style_icon']) ?> <?php echo esc_attr($settings['style_icon_position']) ?>"><?php pxl_print_html(nl2br($settings['sub_title'])); ?></span>
            </div>
        <?php endif; ?>
        <<?php echo esc_attr($settings['title_tag']); ?> <?php pxl_print_html($widget->get_render_attribute_string( 'large-title' )); ?>>
            <?php echo wp_kses_post(nl2br($settings['title'])); ?>
        </<?php echo esc_attr($settings['title_tag']); ?>>
        <?php if(!empty($settings['sub_title']) && $sub_title_on_bottom =='true'): ?>
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'sub-title' )); ?>>
                <span class="<?php echo esc_attr($settings['style_icon']) ?>"><?php pxl_print_html(nl2br($settings['sub_title'])); ?></span>
            </div>
        <?php endif; ?>
    </div>
</div>

