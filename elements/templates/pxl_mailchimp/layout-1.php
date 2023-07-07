<?php 
if(class_exists('MC4WP_Container')) : 
	?>
	<div class="pxl-mailchimp d-flex <?php echo esc_attr($settings['style']); ?>">
		<div class="col">
		<?php 
		if(!empty( $settings['form_id']))
			echo do_shortcode('[mc4wp_form id="'.(int)$settings['form_id'].'"]'); 
		else
			echo do_shortcode('[mc4wp_form]'); 
		?>
		</div>
	</div>
<?php endif; ?>
