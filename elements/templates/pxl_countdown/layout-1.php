<?php
$month = esc_html__('Month', 'builderrin');
$months = esc_html__('Months', 'builderrin');
$day = $widget->get_setting('day','Day');
$days = $widget->get_setting('day','Days');
$hour = $widget->get_setting('hour','Hour');
$hours = $widget->get_setting('hour','Hours');
$minute = $widget->get_setting('minute','Minute');
$minutes = $widget->get_setting('minute','Minutes');
$second = $widget->get_setting('second','Second');
$seconds = $widget->get_setting('second','Seconds');
?>
<div class="pxl-countdown-wrap">
	<div class="pxl-countdown pxl-countdown-layout1 <?php echo esc_attr( $settings['show_svg'].' '.$settings['pxl_animate'] ); ?>"
		data-month="<?php echo esc_attr($month) ?>"
		data-months="<?php echo esc_attr($months) ?>"
		data-day="<?php echo esc_attr($day) ?>"
		data-days="<?php echo esc_attr($days) ?>"
		data-hour="<?php echo esc_attr($hour) ?>"
		data-hours="<?php echo esc_attr($hours) ?>"
		data-minute="<?php echo esc_attr($minute) ?>"
		data-minutes="<?php echo esc_attr($minutes) ?>"
		data-second="<?php echo esc_attr($second) ?>"
		data-seconds="<?php echo esc_attr($seconds) ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
		<div class="pxl-countdown-inner" data-count-down="<?php echo esc_attr($settings['date']);?>"></div>
	</div>
</div>