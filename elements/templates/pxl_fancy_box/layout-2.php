<?php

$widget->add_render_attribute( 'fancybox-wrap', 'class', ['pxl-fancybox-wrap', 'layout-'.$settings['layout']]);

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
// desc
$widget->add_render_attribute( 'desc', 'class', 'desc');
if ( $settings['title_animation'] ) {
    $widget->add_render_attribute( 'desc', 'class', 'pxl-animate pxl-invisible animated-'.$settings['desc_animation_duration']);
    $widget->add_render_attribute( 'desc', 'data-settings', 
        json_encode([
            'animation'      => $settings['desc_animation'],
            'animation_delay' => $settings['desc_animation_delay']
        ])
    );
}

if(!empty($settings['hyper_link']['url'])){
    $widget->add_render_attribute( 'custom_link', 'href', $settings['hyper_link']['url'] );

    if ( $settings['hyper_link']['is_external'] ) {
        $widget->add_render_attribute( 'custom_link', 'target', '_blank' );
    }

    if ( $settings['hyper_link']['nofollow'] ) {
        $widget->add_render_attribute( 'custom_link', 'rel', 'nofollow' );
    }
}

$link_attributes = $widget->get_render_attribute_string( 'custom_link' );
$link_text = $widget->get_setting( 'link_text', esc_html__( 'Get Service','builderrin' ) );
$is_active = $widget->get_setting( 'is_active', 'false' );
if($is_active == 'true')
    $widget->add_render_attribute( 'fancybox-wrap', 'class', 'active' );
?>

<div <?php pxl_print_html($widget->get_render_attribute_string('fancybox-wrap'));?>>
    <div class="fancybox-inner pxl-parallax-background relative">
        <?php if ( $link_attributes ) echo '<a '. $link_attributes .'>'; ?>
        <div class="fancy-featured">
            <?php if(! empty( $settings['selected_icon']['value'] )): ?>
                <div class="pxl-fancy-icon relative tilt-hover">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' );?>
                </div>
            <?php endif; ?>
        </div>
        <?php if ( $link_attributes ) echo '</a>'; ?> 
        <div class="pxl-fancybox-content">
            <?php if(!empty($widget->get_setting('desc'))): ?>
                <div <?php pxl_print_html($widget->get_render_attribute_string( 'desc' )); ?>>
                    <?php pxl_print_html( nl2br($widget->get_setting('desc'))); ?>
                </div>
            <?php endif; ?>
            <?php if(!empty($widget->get_setting('title'))): ?>
                <div <?php pxl_print_html($widget->get_render_attribute_string( 'heading' )); ?>>
                    <?php if ( $link_attributes ) echo '<a '. $link_attributes .'>'; ?>
                    <?php pxl_print_html( nl2br($widget->get_setting('title'))); ?>
                    <?php if ( $link_attributes ) echo '</a>'; ?> 
                </div>
            <?php endif; ?>
            <?php if ( $link_attributes ) echo '<a class="pxl-btn" '. $link_attributes .'><i class="far fa-long-arrow-alt-right"></i>'.$link_text.'</a>'; ?>
            <div class="parallax-inner pxl-absoluted"></div>
        </div> 
    </div>  
</div>




