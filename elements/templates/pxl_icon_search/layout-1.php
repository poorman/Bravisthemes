<div class="pxl-search-popup-button">
	<?php if(!empty($settings['pxl_icon']['value'])) {
            \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
    } else { ?>
    	<i class="far fa-search"></i>
    <?php } ?>
</div>
<?php  add_action( 'pxl_anchor_target', 'builderrin_hook_anchor_search'); ?>