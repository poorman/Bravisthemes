<?php
$editor_content = $widget->get_settings_for_display( 'text_ed' );
$editor_content = $widget->parse_text_editor( $editor_content );
?>
<div class="pxl-text-editor <?php echo esc_attr( $settings['pxl_animate'] ); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
	<div class="pxl-item--inner <?php if(($settings['show_divider'] == 'true')) { echo pxl_print_html('pxl-divider', 'builderrin'); } ?> <?php echo esc_attr( $settings['text_custom_font_family'] ); ?>">
		<?php echo wp_kses_post($editor_content); ?>
	</div>
</div>
