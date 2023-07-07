<?php
/**
 * @package Bravisthemes
 */
$back_totop_on = builderrin()->get_theme_opt('back_totop_on', false);
$button_light_dark_on = builderrin()->get_theme_opt('button_light_dark_on', false);
?>
</div><!-- #main -->

<?php if( class_exists( 'WooCommerce' ) ) :
	if( is_shop() ) { builderrin()->shop->getShop(); }
	if( is_product() ) { builderrin()->shop->getProduct(); }
endif; ?>
<?php builderrin()->footer->getFooter(); ?>
<?php do_action( 'pxl_anchor_target') ?>

<?php if ($back_totop_on) : ?>
	<a class="pxl-scroll-top" href="#">
		<svg class="pxl-progress-circle" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
	</a>
<?php endif; ?>

<?php if ($button_light_dark_on) : ?>
	<div class="pxl-switch-button">
		<input class="pxl-check-status dark-light" type="checkbox" role="switch" id="dark-light" name="dark-light"/>
		<label for="dark-light"></label>
	</div>
<?php endif; ?>

</div><!-- #wapper -->
<?php wp_footer(); ?>
</body>
</html>