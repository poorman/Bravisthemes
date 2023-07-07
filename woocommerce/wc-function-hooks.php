<?php
/* Remove result count & product ordering & item product category..... */
function builderrin_cwoocommerce_remove_function() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0 );
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_sharing', 50 );
}
add_action( 'init', 'builderrin_cwoocommerce_remove_function' );

/* Product Category */
if(builderrin()->get_theme_opt('product_related', '1') === '0' ) {
	remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products', 20);
}

/* Product Category */
add_action( 'woocommerce_before_shop_loop', 'builderrin_woocommerce_nav_top', 2 );
function builderrin_woocommerce_nav_top() {
	$shop_layout = (isset($_GET['shop-layout'])) ? trim($_GET['shop-layout']) : builderrin()->get_theme_opt( '   ', 'grid' );
	?>
	<div class="woocommerce-topbar">
		<div class="woocommerce-archive-layout">
			<?php if($shop_layout == 'list') { ?>
				<span class="archive-layout layout-grid"></span>
				<span class="archive-layout layout-grid1"></span>
				<span class="archive-layout layout-list active"></span>
			<?php } else if ($shop_layout == 'grid'){ ?>
				<span class="archive-layout layout-grid active"></span>
				<span class="archive-layout layout-grid1"></span>
				<span class="archive-layout layout-list"></span>
			<?php } else { ?>
				<span class="archive-layout layout-grid1 active"></span>
				<span class="archive-layout layout-grid"></span>
				<span class="archive-layout layout-list"></span>
			<?php } ?>
		</div>
		<div class="woocommerce-result-count">
			<?php woocommerce_result_count(); ?>
		</div>
		<div class="woocommerce-topbar-ordering">
			<?php woocommerce_catalog_ordering(); ?>
		</div>
	</div>
<?php }

add_filter( 'woocommerce_after_shop_loop_item', 'builderrin_woocommerce_product' );
function builderrin_woocommerce_product() {
	global $product;
	$unit_price = get_post_meta($product->get_id(),'unit_price', true);
	$product_style = builderrin()->get_theme_opt( 'product_style', 'style-1' );
	?>
	<div class="woocommerce-product-inner">
		<div class="woocommerce-product-header">
			<a class="woocommerce-product-details" href="<?php the_permalink(); ?>">
				<?php woocommerce_template_loop_product_thumbnail(); ?>
			</a>
			<div class="woocommerce-product-meta">
				<?php if (class_exists('WPCleverWoosq')) { ?>
					<div class="woocommerce-btn-item woocommerce-quick-view">
						<?php echo do_shortcode('[woosq id="'.esc_attr( $product->get_id() ).'"]'); ?>
					</div>
				<?php } ?>
				<?php if (class_exists('WPCleverWoosc')) { ?>
					<div class="woocommerce-btn-item woocommerce-compare">
						<?php echo do_shortcode('[woosc id="'.esc_attr( $product->get_id() ).'"]'); ?>
					</div>
				<?php } ?>
				<?php if (class_exists('WPCleverWoosw')) { ?>
					<div class="woocommerce-btn-item woocommerce-wishlist">
						<?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
					</div>
				<?php } ?>
				<div class="woocommerce-btn-item woocommerce-add-to--cart">
					<?php if ( ! $product->managing_stock() && ! $product->is_in_stock() ) { ?>
					<?php } else { ?>
						<?php woocommerce_template_loop_add_to_cart(); ?>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="woocommerce-product-content <?php echo esc_attr($product_style); ?>">
			<?php if ($product_style == 'style-1') :?>
				<div class="woocommerce-product--meta">
					<?php 
					global $post;
					$terms = get_the_terms( $post->ID, 'product_cat' );
					foreach ($terms as $term) {
						$product_cat_id = $term->term_id;
						break;
					}
					?>
					<?php echo sprintf(wc_get_product_category_list( $product->get_id(), ', ', '<span class="woocommerce-product--category">' . _n( '', 'Categories:', count( $product->get_category_ids() ), 'builderrin' ) . ' ', '</span>' )); ?>
					<h5 class="woocommerce-product--title">
						<a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
					</h5>
					<div class="woocommerce-product--price">
						<?php woocommerce_template_loop_price(); ?>
						<div class="woocommerce-product-rating">
							<?php woocommerce_template_loop_rating(); ?>
						</div>
						<?php if(!empty($unit_price)) : ?>
							<span class="unit-price"><?php echo esc_html($unit_price); ?></span>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ($product_style == 'style-2') : ?>
				<div class="woocommerce-product--meta">
					<?php 
					global $post;
					$terms = get_the_terms( $post->ID, 'product_cat' );
					foreach ($terms as $term) {
						$product_cat_id = $term->term_id;
						break;
					}
					?>
					<div class="woocommerce-product--container">
						<h5 class="woocommerce-product--title">
							<a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
						</h5>
						<div class="woocommerce-product--price">
							<?php woocommerce_template_loop_price(); ?>
							<?php if(!empty($unit_price)) : ?>
								<span class="unit-price"><?php echo esc_html($unit_price); ?></span>
							<?php endif; ?>
						</div>						
					</div>
					<?php echo sprintf(wc_get_product_category_list( $product->get_id(), ', ', '<span class="woocommerce-product--category">' . _n( '', 'Categories:', count( $product->get_category_ids() ), 'builderrin' ) . ' ', '</span>' )); ?>
				</div>
			<?php endif; ?>
			<?php if ($product_style == 'style-3') : ?>
				<div class="woocommerce-product--meta">
					<h5 class="woocommerce-product--title">
						<a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
					</h5>
					<div class="woocommerce-product--price">
						<?php woocommerce_template_loop_price(); ?>
						<?php if(!empty($unit_price)) : ?>
							<span class="unit-price"><?php echo esc_html($unit_price); ?></span>
						<?php endif; ?>
					</div>						
				</div>
			<?php endif; ?>		
			<?php if ($product_style == 'style-4') : ?>
				<div class="woocommerce-product--meta">
					<h5 class="woocommerce-product--title">
						<a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
					</h5>
					<div class="woocommerce-product--price">
						<?php woocommerce_template_loop_price(); ?>
						<div class="woocommerce-product-rating">
							<?php woocommerce_template_loop_rating(); ?>
						</div>
						<?php if(!empty($unit_price)) : ?>
							<span class="unit-price"><?php echo esc_html($unit_price); ?></span>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php }

/* Rename Additional information tabs */
add_filter( 'woocommerce_product_tabs', 'builderrin_woo_rename_tabs');
function builderrin_woo_rename_tabs( $tabs ) {
	$tabs['additional_information']['title'] = esc_html__( 'Additional information', 'builderrin' );
	return $tabs;
}
add_filter( 'woocommerce_product_description_heading', '__return_null' );
add_filter( 'woocommerce_product_additional_information_heading', '__return_null' );
/* Add the custom Tabs Specification */
function builderrin_custom_product_tab_specification( $tabs ) {
	$feature_tab_on = builderrin()->get_page_opt( 'feature_tab_on' );
	$product_specification_title = builderrin()->get_page_opt( 'product_specification_title' );
	$tab_title = '';
	if(!empty($product_specification_title)) {
		$tab_title = $product_specification_title;
	} else {
		$tab_title = esc_html__( 'Vendor Info', 'builderrin' );
	}
	if($feature_tab_on == '1') {
		$tabs['tab-product-feature'] = array(
			'title'    => $tab_title,
			'priority' => 25,
			'callback' => 'builderrin_custom_tab_content_specification',
		);
		return $tabs;
	} else {
		return $tabs;
	}
}
add_filter( 'woocommerce_product_tabs', 'builderrin_custom_product_tab_specification');

/* Function that displays output for the Tab Specification. */
function builderrin_custom_tab_content_specification( $slug, $tab ) {
	$product_specification_content = builderrin()->get_page_opt( 'product_specification_content' );
	$product_specification = builderrin()->get_page_opt( 'product_specification' ); ?>
	<div class="tab-content-wrap">
		<div class="tab-product-feature-list">
			<?php if (!empty($product_specification_content)) : ?>
				<p><?php echo esc_html( $product_specification_content ); ?></p>
			<?php endif; ?>
			<?php if (!empty($product_specification)) :
				$result = count($product_specification); ?>
				<ul class="tab-list">
					<?php for($i=0; $i<$result; $i+=1) { ?>
						<li>
							<?php echo isset($product_specification[$i])?esc_html( $product_specification[$i] ):''; ?>
						</li>
					<?php } ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
<?php }

/* Removes the "shop" title on the main shop page */
function builderrin_hide_page_title()
{
	return false;
}
add_filter('woocommerce_show_page_title', 'builderrin_hide_page_title');

/* Replace text Onsale */
add_filter('woocommerce_sale_flash', 'builderrin_custom_sale_text', 10, 3);
function builderrin_custom_sale_text($text, $post, $_product)
{
	return '<span class="onsale">' . esc_html__( 'Sale', 'builderrin' ) . '</span>';
}

/* Custom products badge */
function woocommerce_template_loop_product_link_open() {
	global $product;
	$badge_new = get_post_meta($product->get_id(), 'badge_new', '1');
	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

	echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
	if($badge_new == '1') {
		echo '<span class="isnew">'. esc_html__('New', 'builderrin') .'</span>';
	}
}

add_action( 'woocommerce_product_additional_information', 'bbloomer_add_content_additional_information_tab', 1 );
function bbloomer_add_content_additional_information_tab( $product ) {
	$additional_information = builderrin()->get_page_opt( 'additional_information' );	
	echo '<p>'. esc_html($additional_information) .'</p>';
}

/* Custom products layout on archive page */
add_filter( 'loop_shop_columns', 'builderrin_loop_shop_columns', 20 );
function builderrin_loop_shop_columns() {
	$columns = isset($_GET['col']) ? sanitize_text_field($_GET['col']) : builderrin()->get_theme_opt('products_columns', 4);
	return $columns;
}

/* Show product per page */
function builderrin_loop_shop_per_page(){
	$product_per_page = builderrin()->get_opt('product_per_page',12);

	if(isset($_REQUEST['loop_shop_per_page']) && !empty($_REQUEST['loop_shop_per_page'])) {
		return $_REQUEST['loop_shop_per_page'];
	} else {
		return $product_per_page;
	}
}
add_filter( 'loop_shop_per_page', 'builderrin_loop_shop_per_page' );

/* Change Related Products Title */
add_filter('woocommerce_product_related_products_heading', function(){return false;});
function woocommerce_product_loop_start( $echo = true ) {
	global $product;
	$product_title = builderrin()->get_theme_opt( 'product_related_title' );
	if(!empty($product_title)) {
		$product_title = $product_title;
	} else {
		$product_title = esc_html__( 'Popular Products', 'builderrin' );
	}
	ob_start();
	wc_set_loop_prop( 'loop', 0 );
	wc_get_template( 'loop/loop-start.php' );
	$loop_start = apply_filters( 'woocommerce_product_loop_start', ob_get_clean() );
	if ( $echo ) {
		if (wc_get_loop_prop('name') == 'related') {
			echo '<div class="pxl-related--inner">';
			echo '<h2 class="pxl-related--title wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1.2s">'.$product_title.'</h2>';
			echo '</div>';
		}
		echo builderrin_html($loop_start);
	} else {
		return $loop_start;
	}
}

/**
 * Modify image width theme support.
 */
add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size) {
	$size['width'] = 250;
	$size['height'] = 250;
	$size['crop'] = 1;
	return $size;
});

add_filter('woocommerce_get_image_size_thumbnail', function ($size) {
	$size['width'] = 270;
	$size['height'] = 323;
	$size['crop'] = 1;
	return $size;
});

add_filter('woocommerce_get_image_size_single', function ($size) {
	$size['width'] = 800;
	$size['height'] = 800;
	$size['crop'] = 1;
	return $size;
});

/* Product Single: Summary */
add_action( 'woocommerce_before_single_product_summary', 'builderrin_woocommerce_single_summer_start', 0 );
function builderrin_woocommerce_single_summer_start() {
	$product_page_style = builderrin()->get_page_opt( 'product_page_style','style1' );
	?>
	<?php echo '<div class="woocommerce-summary-wrap row '.esc_attr( $product_page_style ).'">'; ?>
<?php }
add_action( 'woocommerce_after_single_product_summary', 'builderrin_woocommerce_single_summer_end', 5 );
function builderrin_woocommerce_single_summer_end() { ?>
	<?php echo '</div></div>'; ?>
<?php }


add_action( 'woocommerce_single_product_summary', 'builderrin_woocommerce_sg_product_title', 5 );
function builderrin_woocommerce_sg_product_title() {
	global $product;
	$product_title = builderrin()->get_opt( 'product_title', true );
	if($product_title ) : ?>
		<div class="woocommerce-sg-product-title">
			<?php woocommerce_template_single_title(); ?>
		</div>
	<?php endif; }

	add_action( 'woocommerce_single_product_summary', 'builderrin_woocommerce_sg_product_excerpt', 10 );
	function builderrin_woocommerce_sg_product_excerpt() {
		global $product;
		?>
		<div class="woocommerce-sg-product-excerpt">
			<?php woocommerce_template_single_excerpt(); ?>
		</div>
	<?php }

	add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_echo_qty_front_add_cart' );

	function bbloomer_echo_qty_front_add_cart() {
		echo '<span class="qty-suff">quantity</span>'; 
	}

	add_action( 'woocommerce_single_product_summary', 'builderrin_woocommerce_sg_product_rating', 6 );
	function builderrin_woocommerce_sg_product_rating() { global $product; ?>
		<div class="woocommerce-sg-product-rating">
			<?php woocommerce_template_single_rating(); ?>
		</div>
	<?php }

	add_action( 'woocommerce_single_product_summary', 'builderrin_woocommerce_sg_product_price', 8 );
	function builderrin_woocommerce_sg_product_price() { ?>
		<div class="woocommerce-sg-product-price">
			<?php woocommerce_template_single_price(); ?>
		</div>
	<?php }

	add_action( 'woocommerce_single_product_summary', 'builderrin_woocommerce_sg_product_meta', 30 );
	function builderrin_woocommerce_sg_product_meta() {
		global $product;
		?>
		<div class="wooc-product-meta">
			<?php if (class_exists('WPCleverWoosw')) { ?>
				<?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
			<?php } ?>
			<?php if (class_exists('WPCleverWoosc')) { ?>
				<?php echo do_shortcode('[woosc id="'.esc_attr( $product->get_id() ).'"]'); ?>
			<?php } ?>
		</div>
	<?php }

	add_action( 'woocommerce_single_product_summary', 'builderrin_woocommerce_delivery_info', 35 );
	function builderrin_woocommerce_delivery_info() {
		global $product;
		$product_info_1 = builderrin()->get_page_opt( 'product_info_1' );
		$product_info_2 = builderrin()->get_page_opt( 'product_info_2' );
		$product_info_3 = builderrin()->get_page_opt( 'product_info_3' );
		$product_info_4 = builderrin()->get_page_opt( 'product_info_4' );
		if(!empty($product_info_1) || !empty($product_info_2) || !empty($product_info_3) || !empty($product_info_4)) {
			echo '<div class="woocommerce-product-info-delivery">';
			if(!empty($product_info_1)) {
				echo '<div class="product-info-delivery">';
				echo '<i class="pxl-aw-square-check"></i>';
				echo builderrin_html($product_info_1);
				echo '</div>';
			}
			if(!empty($product_info_2)) {
				echo '<div class="product-info-delivery">';
				echo '<i class="pxl-aw-leaf"></i>';
				echo builderrin_html($product_info_2);
				echo '</div>';
			}
			if(!empty($product_info_3)) {
				echo '<div class="product-info-delivery">';
				echo '<i class="pxl-aw-box"></i>';
				echo builderrin_html($product_info_3);
				echo '</div>';
			}
			if(!empty($product_info_4)) {
				echo '<div class="product-info-delivery">';
				echo '<i class="pxl-aw-truck-fast"></i>';
				echo builderrin_html($product_info_4);
				echo '</div>';
			}
			echo '</div>';
		}
	}

	add_action('woocommerce_single_product_summary','builderrin_single_product_meta_before', 40);
	function builderrin_single_product_meta_before() {
		global $product;
		echo '<div class="woocommerce-product-info-meta product_meta">';
		echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'builderrin' ) . ' ', '</span>' );
		if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
			<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'builderrin' ); ?> <span class="sku"><?php echo builderrin_html($product->get_sku()); ?></span></span>
	<?php endif;
	echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'builderrin' ) . ' ', '</span>' );
}

add_filter( 'woocommerce_single_product_image_gallery_classes', 'bbloomer_5_columns_product_gallery' );

function bbloomer_5_columns_product_gallery( $wrapper_classes ) {
   $columns = 3; // change this to 2, 3, 5, etc. Default is 4.
   $wrapper_classes[2] = 'woocommerce-product-gallery--columns-' . absint( $columns );
   return $wrapper_classes;
}

add_action('woocommerce_single_product_summary','builderrin_single_product_meta_after', 41);
function builderrin_single_product_meta_after() {
	global $product;
	echo '</div>';
}

add_action( 'woocommerce_single_product_summary', 'builderrin_woocommerce_sg_social_share', 50 );
function builderrin_woocommerce_sg_social_share() {
	$product_social_share = builderrin()->get_opt( 'product_social_share', false );
	if($product_social_share) : ?>
		<div class="woocommerce-social-share">
			<label><?php echo esc_html__('Share:', 'builderrin'); ?></label>
			<a class="fb-social" title="<?php echo esc_attr__('Facebook', 'builderrin'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
			<a class="tw-social" title="<?php echo esc_attr__('Twitter', 'builderrin'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
			<a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'builderrin'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="caseicon-linkedin"></i></a>
		</div>
	<?php endif; }


	/* Product Single: Gallery */
	add_action( 'woocommerce_before_single_product_summary', 'builderrin_woocommerce_single_gallery_start', 0 );
	function builderrin_woocommerce_single_gallery_start() {
		echo '<div class="woocommerce-gallery col-xl-6 col-lg-6 col-md-12" data-cursor="-hidden">';
	}

	add_action( 'woocommerce_before_single_product_summary', 'builderrin_woocommerce_single_gallery_end', 30 );
	function builderrin_woocommerce_single_gallery_end() {
		echo '</div><div class="col-xl-6 col-lg-6 col-md-12">';
	}

	/* Rating */
	function builderrin_rating($rating_html, $rating) {
		global $product;
		if($product) {
			$rating_count = $product->get_rating_count();
			if($rating_count == 0) {
				$rating_count = esc_html__( 'No', 'builderrin' );
			}
			$rating_html = '<div class="star-rating-wrap">';
			$rating_html .= '<div class="star-rating">';
			$rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"></span>';
			$rating_html .= '</div>';
			$rating_html .= '<div class="count-rating">('.$rating_count.')</div>';
			$rating_html .= '</div>';
		}
		return $rating_html;
	}
	add_filter( 'woocommerce_product_get_rating_html', 'builderrin_rating', 10, 2);

	/* Rating */
	function builderrin_woosc_rating($rating_html, $rating) {
		global $product;
		if($product) {
			$rating_count = $product->get_rating_count();
			if($rating_count == 0) {
				$rating_count = esc_html__( 'No', 'builderrin' );
			}
			$rating_html = '<div class="star-rating-wrap">';
			$rating_html .= '<div class="star-rating">';
			$rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"></span>';
			$rating_html .= '</div>';
			$rating_html .= '<div class="count-rating">('.$rating_count.')</div>';
			$rating_html .= '</div>';
		}
		return $rating_html;
	}
	add_filter( 'woosc_woocommerce_rating', 'builderrin_woosc_rating', 10, 2);

	/* Ajax update cart total number */

	add_filter( 'woocommerce_add_to_cart_fragments', 'builderrin_woocommerce_sidebar_cart_count_number' );
	function builderrin_woocommerce_sidebar_cart_count_number( $fragments ) {
		ob_start();
		?>
		<span class="pxl_cart_counter"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'builderrin' ), WC()->cart->cart_contents_count ); ?></span>
		<?php

		$fragments['.pxl_cart_counter'] = ob_get_clean();

		return $fragments;
	}

	add_filter( 'woocommerce_output_related_products_args', 'builderrin_related_products_args', 20 );
	function builderrin_related_products_args( $args ) {
		$args['posts_per_page'] = 4;
		$args['columns'] = 4;
		return $args;
	}

	/* Pagination Args */
	function builderrin_filter_woocommerce_pagination_args( $array ) {
		$array['end_size'] = 1;
		$array['mid_size'] = 1;
		return $array;
	};
	add_filter( 'woocommerce_pagination_args', 'builderrin_filter_woocommerce_pagination_args', 10, 1 );

	add_filter( 'woocommerce_checkout_before_order_review_heading', 'builderrin_checkout_before_order_review_heading', 10 );
	function builderrin_checkout_before_order_review_heading() {
		echo '<div class="pxl-checkout-order-review">';
	}
	add_filter( 'woocommerce_checkout_after_order_review', 'builderrin_checkout_after_order_review', 20 );
	function builderrin_checkout_after_order_review() {
		echo '</div>';
	}

	function builderrin_woocommerce_query($type='recent_product',$post_per_page=-1,$product_ids='',$categories='',$param_args=[]){
		global $wp_query;

		$product_visibility_term_ids = wc_get_product_visibility_term_ids();
		if(!empty($product_ids)){

			if (get_query_var('paged')) {
				$pxl_paged = get_query_var('paged');
			} elseif (get_query_var('page')) {
				$pxl_paged = get_query_var('page');
			} else {
				$pxl_paged = 1;
			}

			$pxl_query = new WP_Query(array(
				'post_type' => 'product',
				'post__in' => array_map('intval', explode(',', $product_ids)),
				'tax_query' => array(
					array(
						'taxonomy' => 'product_visibility',
						'field'    => 'term_taxonomy_id',
						'terms'    => is_search() ? $product_visibility_term_ids['exclude-from-search'] : $product_visibility_term_ids['exclude-from-catalog'],
						'operator' => 'NOT IN',
					)
				),
			));

			$posts = $pxl_query;

			$categories = [];
		}else{
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => $post_per_page,
				'post_status' => 'publish',
				'post_parent' => 0,
				'date_query' => array(
					array(
						'before' => date('Y-m-d H:i:s', current_time( 'timestamp' ))
					)
				),
				'tax_query' => array(
					array(
						'taxonomy' => 'product_visibility',
						'field'    => 'term_taxonomy_id',
						'terms'    => is_search() ? $product_visibility_term_ids['exclude-from-search'] : $product_visibility_term_ids['exclude-from-catalog'],
						'operator' => 'NOT IN',
					)
				),
			);

			if(!empty($categories)){

				$args['tax_query'][] = array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'operator' => 'IN',
					'terms' => $categories,
				);
			}

			if( !empty($param_args['pro_atts']) ){
				foreach ($param_args['pro_atts'] as $k => $v) {
					$args['tax_query'][] = array(
						'taxonomy' => $k,
						'field' => 'slug',
						'terms' => $v
					);
				}
			}

			$args['meta_query'] = array(
				'relation'    => 'AND'
			);

			if( !empty($param_args['min_price']) && !empty($param_args['max_price'])){
				$args['meta_query'][] =   array(
					'key'     => '_price',
					'value'   => array( $param_args['min_price'], $param_args['max_price'] ),
					'compare' => 'BETWEEN',
					'type'    => 'DECIMAL(10,' . wc_get_price_decimals() . ')',
				);
			}

			$args = builderrin_product_filter_type_args($type,$args);

			if (get_query_var('paged')){
				$pxl_paged = get_query_var('paged');
			}elseif(get_query_var('page')){
				$pxl_paged = get_query_var('page');
			}else{
				$pxl_paged = 1;
			}
			if($pxl_paged > 1){
				$args['paged'] = $pxl_paged;
			}

			$posts = $pxl_query = new WP_Query($args);

			if (empty($categories)) {
				$product_categories = get_categories(array( 'taxonomy' => 'product_cat' ));
				$categories = array();
				foreach($product_categories as $key => $category){
					$categories[] = $category->slug;
				}
			}
		}
		global $wp_query;
		$wp_query = $pxl_query;
		$pagination = get_the_posts_pagination(array(
			'screen_reader_text' => '',
			'mid_size' => 2,
			'prev_text' => esc_html__('Back', 'builderrin'),
			'next_text' => esc_html__('Next', 'builderrin'),
		));
		global $paged;
		$paged = $pxl_paged;


		wp_reset_query();
		return array(
			'posts' => $posts,
			'categories' => $categories,
			'query' => $pxl_query,
			'args' => $args,
			'paged' => $paged,
			'max' => $pxl_query->max_num_pages,
			'next_link' => next_posts($pxl_query->max_num_pages, false),
			'total' => $pxl_query->found_posts,
			'pagination' => $pagination
		);
	}

	function builderrin_product_filter_type_args($type,$args){
		switch ($type) {
			case 'best_selling':
			$args['meta_key']='total_sales';
			$args['orderby']='meta_value_num';
			$args['ignore_sticky_posts']   = 1;
			break;
			case 'featured_product':
			$args['ignore_sticky_posts'] = 1;
			$args['tax_query'][] = array(
				'taxonomy' => 'product_visibility',
				'field'    => 'term_taxonomy_id',
				'terms'    => $product_visibility_term_ids['featured'],
			);
			break;
			case 'top_rate':
			$args['meta_key']   ='_wc_average_rating';
			$args['orderby']    ='meta_value_num';
			$args['order']      ='DESC';
			break;
			case 'recent_product':
			$args['orderby']    = 'date';
			$args['order']      = 'DESC';
			break;
			case 'on_sale':
			$args['post__in'] = wc_get_product_ids_on_sale();
			break;
			case 'recent_review':
			if($post_per_page == -1) $_limit = 4;
			else $_limit = $post_per_page;
			global $wpdb;
			$query = $wpdb->prepare("SELECT c.comment_post_ID FROM {$wpdb->prefix}posts p, {$wpdb->prefix}comments c WHERE p.ID = c.comment_post_ID AND c.comment_approved > 0 AND p.post_type = 'product' AND p.post_status = 'publish' AND p.comment_count > 0 ORDER BY c.comment_date ASC LIMIT 0, %d", $_limit);
			$results = $wpdb->get_results($query, OBJECT);
			$_pids = array();
			foreach ($results as $re) {
				$_pids[] = $re->comment_post_ID;
			}

			$args['post__in'] = $_pids;
			break;
			case 'deals':
			$args['meta_query'][] = array(
				'key' => '_sale_price_dates_to',
				'value' => '0',
				'compare' => '>');
			$args['post__in'] = wc_get_product_ids_on_sale();
			break;
			case 'separate':
			if ( ! empty( $product_ids ) ) {
				$ids = array_map( 'trim', explode( ',', $product_ids ) );
				if ( 1 === count( $ids ) ) {
					$args['p'] = $ids[0];
				} else {
					$args['post__in'] = $ids;
				}
			}
			break;
		}
		return $args;
	}

	add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'builderrin_custom_variation_attribute_options_html', 10, 2 );
	function builderrin_custom_variation_attribute_options_html( $html, $args){
		global $wpdb, $product;
		$product_variation_style = isset($_GET['variation-style']) ? sanitize_text_field($_GET['variation-style']) : builderrin()->get_theme_opt('product_variation_style','dropdown');
		if($product_variation_style == 'dropdown') return $html;

		$options               = $args['options'];
		$product               = $args['product'];
		$attribute             = $args['attribute'];
		$name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
		$id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
		$class                 = $args['class'];
		$show_option_none      = (bool) $args['show_option_none'];
	$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : esc_html__( 'Choose an option', 'builderrin' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

	if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
		$attributes = $product->get_variation_attributes();
		$options    = $attributes[ $attribute ];
	}

	$custom_html  = '<ul id="pxl-variation-att-terms" class="pxl-variation-att-terms ' . esc_attr( $class ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '" data-id="'.esc_attr($id).'">';
	if ( ! empty( $options ) ) {
		if ( $product && taxonomy_exists( $attribute ) ) {

			$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );

			foreach ( $terms as $term ) {

				$term_slug = $term->slug;
				$variation_id = $wpdb->get_col(
					$wpdb->prepare(
						"
						SELECT      postmeta.post_id AS product_id
						FROM        ".$wpdb->prefix."postmeta AS postmeta
						LEFT JOIN  ".$wpdb->prefix."posts AS products
						ON ( products.ID = postmeta.post_id )
						WHERE       postmeta.meta_key LIKE 'attribute_%'
						AND postmeta.meta_value = '%s'
						AND products.post_parent = %d
						",
						$term_slug,
						$product->get_id()
					)
				);
				if(!empty($variation_id)){
					$parent = wp_get_post_parent_id( $variation_id[0] );

					$vari_price = '';
					if ( $parent > 0 ) {
						$_product = new WC_Product_Variation( $variation_id[0] );

						$vari_price = $_product->get_price_html();
					}
				}
				if ( in_array( $term->slug, $options, true )) {
					$custom_html .= '<li class="pxl-vari-item">';
					$custom_html .= '<a href="javascript:void(0)" onclick="return false;" aria-label="'. esc_html($term->name) .'" class="pro-variation-select custom-vari-enabled" data-value="'. esc_attr($term->slug) .'" ><span class="lbl">' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name, $term, $attribute, $product ) ) . '</span>';
					if(!empty($vari_price))
						$custom_html .= '<span class="price">'.$vari_price.'</span>';
					$custom_html .= '</a>';
					$custom_html .= '</li>';
				}
			}
		} else {
			foreach ( $options as $option ) {
				// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
				$selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
				$custom_html .= '<li>';
				$custom_html .= '<a href="javascript:void(0)" onclick="return false;" aria-label="'. esc_html($name) .'" class="pro-variation-select ' . $selected . '" data-value="'. esc_attr($option) .'" >' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option, null, $attribute, $product ) ) . '</a>';
				$custom_html .= '</li>';
			}
		}
	}

	$custom_html .= '</ul>';
	return $custom_html.$html;
}
