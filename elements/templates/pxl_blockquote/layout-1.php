<?php
$editor_title = $widget->get_settings_for_display( 'title' );
$editor_title = $widget->parse_text_editor( $editor_title );
?>
<div class="pxl-blockquote">
	<div class="pxl-blockquote--inner">
		<<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--content <?php if($settings['pxl_animate'] !== 'wow letter') { echo esc_attr($settings['pxl_animate']); } ?> <?php echo esc_attr($settings['title_custom_font_family']); ?> <?php echo esc_attr($settings['style']) ;?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
			<?php if(!empty($editor_title)) {
				if($settings['pxl_animate'] == 'wow letter') {
					$arr_str = explode(' ', $editor_title); ?>
					<span class="pxl-item--text">
			            <?php foreach ($arr_str as $index => $value) {
			                $arr_str[$index] = '<span class="pxl-text--slide"><span class="'.$settings['pxl_animate'].'">' . $value . '</span></span>';
			            }
			            $str = implode(' ', $arr_str);
			            echo wp_kses_post($str); ?>
			        </span>
				<?php } else {
					echo wp_kses_post($editor_title);
				}
			} ?>
		</<?php echo esc_attr($settings['title_tag']); ?>>
		<?php if(!empty($settings['author'])) : ?>
			<div class="pxl-item--author <?php echo esc_attr($settings['pxl_animate_sub']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_sub']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration_sub']); ?>s"><span><?php echo esc_attr($settings['author']); ?></span></div>
		<?php endif; ?>
	</div>
</div>