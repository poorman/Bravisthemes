<div class="pxl-search-box layout1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
	<?php if ( ! empty( $settings['title_text'] ) ) { ?>
        <h3 class="pxl-item--title">
            <?php echo pxl_print_html($settings['title_text']); ?>
        </h3>
    <?php } ?>
	<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
		<div class="searchform-wrap">
	        <input type="text" placeholder="<?php if(!empty($settings['placeholder_text'])) { echo esc_attr_e($settings['placeholder_text'], 'builderrin'); } else { echo esc_attr_e('Search something …', 'builderrin'); } ?>" name="s" class="search-field" />
	    	<button type="submit" class="search-submit"></button>
	    </div>
	</form>
</div>