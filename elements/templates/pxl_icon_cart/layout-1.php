<?php if ( class_exists( 'Woocommerce' ) ) {
	if(!empty($settings['value_text'])) {
		$value_text = ' '.$settings['value_text'];
	} else {
		$value_text = ' Item';
	} ?>
	<div class="pxl-cart-sidebar-button pxl-anchor side-panel pxl-transtion" data-target=".pxl-side-cart" data-cursor="-hidden">
		<?php if(!empty($settings['pxl_icon']['value'])) {
            \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
	    } else { ?>
	    	<i class="pxl-aw-basket-shopping"></i>
	    <?php } ?>
	    <span class="pxl-cart-text">
	    	<?php if(!empty($settings['btn_text'])) {
	    		echo esc_attr($settings['btn_text']);
	    	} else {
	    		echo esc_attr('Cart', 'builderrin');
	    	} ?>
	    </span>
        <span data-tip="<?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'builderrin' ), WC()->cart->cart_contents_count ); ?>" class="pxl-cart-counters"><?php echo esc_attr('('.WC()->cart->cart_contents_count.$value_text.')'); ?></span>
        <span class="top-bottom"></span>
        <span class="left-right"></span>
	</div>
<?php }
add_action( 'pxl_anchor_target', 'builderrin_hook_anchor_cart'); ?>