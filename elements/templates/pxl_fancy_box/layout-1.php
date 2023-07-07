<?php

$widget->add_render_attribute( 'fancybox-wrap', 'class', ['pxl-fancybox-wrap d-flex', 'layout-'.$settings['layout']]);

// Heading
$widget->add_render_attribute( 'heading', 'class', 'title pxl-heading');
if ( $settings['title_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'pxl-animate pxl-invisible animated-'.$settings['title_animation_duration']);
    $widget->add_render_attribute( 'heading', 'data-settings', 
        json_encode([
            'animation'      => $settings['title_animation'],
            'animation_delay' => $settings['title_animation_delay']
        ])
    );
}
// sub title
$widget->add_render_attribute( 'sub-heading', 'class', 'sub-title');
if ( $settings['title_animation'] ) {
    $widget->add_render_attribute( 'sub-heading', 'class', 'pxl-animate pxl-invisible animated-'.$settings['sub_title_animation_duration']);
    $widget->add_render_attribute( 'sub-heading', 'data-settings', 
        json_encode([
            'animation'      => $settings['sub_title_animation'],
            'animation_delay' => $settings['sub_title_animation_delay']
        ])
    );
}
 
?>
 
<div <?php pxl_print_html($widget->get_render_attribute_string('fancybox-wrap'));?>>
    <div class="fancybox-inner gx-15">
        <?php if(! empty( $settings['selected_icon']['value'] )): ?>
            <div class="pxl-fancy-icon col-auto pxl-transition">
                <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' );?>
            </div>
        <?php endif; ?>
        <div class="pxl-fancybox-content pxl-transition col">
            <?php if(!empty($widget->get_setting('sub_title'))): ?>
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'sub-heading' )); ?>><?php
                pxl_print_html($widget->get_setting('sub_title'));
            ?></div>
            <?php endif; ?>
            <?php if(!empty($widget->get_setting('title'))): ?>
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'heading' )); ?>>
                <?php pxl_print_html( nl2br($widget->get_setting('title'))); ?>
            </div>
            <?php endif; ?>
        </div> 
    </div>  
</div>
 



