<?php
defined( 'ABSPATH' ) or die();

add_action( 'after_setup_theme', 'kiraz_woocommerce_supports' );
add_action( 'woocommerce_before_shop_loop_item_title', 'kiraz_woocommerce_template_loop_product_thumbnail', 10 );

// A filter that return an empty array
// to prevent woocommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_filter( 'loop_shop_per_page', 'kiraz_woocommerce_products_per_page' );
//add_filter( 'woocommerce_show_page_title', '__return_false' );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/**
 * Change the breadcrumb separator
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' <span></span> ';
	return $defaults;
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'kiraz_woocommerce_cart_fragments' );

function kiraz_woocommerce_cart_fragments ( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
		<a class="shopping-cart-count" href="<?php echo esc_url( wc_get_cart_url() ) ?>">
			<span class="icon-cart-count">
				<i class="iconlab-basket-simple-1"></i>
				
				<?php if ( WC()->cart->cart_contents_count > 0 ): ?>
					<span class="shopping-cart-items-count"><span><?php echo esc_html( WC()->cart->cart_contents_count ) ?></span></span>
				<?php else: ?>
					<span class="shopping-cart-items-count no-items"></span>
				<?php endif ?>
			</span>

			<span class="cart-total"><?php echo WC()->cart->get_cart_total(); ?></span>
		</a>
	<?php

	$fragments['a.shopping-cart-count'] = ob_get_clean();
	return $fragments;
}


function kiraz_woocommerce_supports() {
	add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

/**
 * Register custom image sizes for WooCommerce
 */
if ( ! function_exists( 'kiraz_woocommerce_thumbnail_size' ) ) {
	function kiraz_woocommerce_thumbnail_size( $args ) {
		$sizes = kiraz_get_image_sizes();
		$size  = kiraz_option( 'product__thumbnailSize' );
		$crop  = kiraz_option( 'product__thumbnailSizeCrop' ) == 'crop';

		if ( preg_match( '/^([0-9]+)x([0-9]+)$/', $size, $matches ) ) {
			return array(
				'width'  => $matches[1],
				'height' => $matches[2],
				'crop'   => $crop
			);
		}
		elseif ( isset( $sizes[ $size ] ) ) {
			return array_merge( $sizes[ $size ], array(
				'crop' => $crop
			) );
		}

		return $args;
	}
}
add_filter( 'woocommerce_get_image_size_shop_thumbnail', 'kiraz_woocommerce_thumbnail_size' );


if ( ! function_exists( 'kiraz_woocommerce_catalog_size' ) ) {
	function kiraz_woocommerce_catalog_size( $args ) {
		$sizes = kiraz_get_image_sizes();
		$size  = kiraz_option( 'shop__productImageSize' );
		$crop  = kiraz_option( 'shop__productImageSizeCrop' ) == 'crop';

		if ( preg_match( '/^([0-9]+)x([0-9]+)$/', $size, $matches ) ) {
			return array(
				'width'  => $matches[1],
				'height' => $matches[2],
				'crop'   => $crop
			);
		}
		elseif ( isset( $sizes[ $size ] ) ) {
			return array_merge( $sizes[ $size ], array(
				'crop' => $crop
			) );
		}

		return $args;
	}
}
add_filter( 'woocommerce_get_image_size_shop_catalog', 'kiraz_woocommerce_catalog_size' );


if ( ! function_exists( 'kiraz_woocommerce_single_size' ) ) {
	function kiraz_woocommerce_single_size( $args ) {
		$sizes = kiraz_get_image_sizes();
		$size  = kiraz_option( 'product__imageSize' );
		$crop  = kiraz_option( 'product__imageSizeCrop' ) == 'crop';

		if ( preg_match( '/^([0-9]+)x([0-9]+)$/', $size, $matches ) ) {
			$args = array(
				'width'  => $matches[1],
				'height' => $matches[2],
				'crop'   => $crop
			);
		}
		elseif ( isset( $sizes[ $size ] ) ) {
			$args = array_merge( $sizes[ $size ], array(
				'crop' => $crop
			) );
		}

		return $args;
	}
}
add_filter( 'woocommerce_get_image_size_shop_single', 'kiraz_woocommerce_single_size' );

function kiraz_woocommerce_body_class( $classes ) {
	return $classes;
}

function kiraz_woocommerce_sidebar() {
	return is_shop() || is_product_taxonomy()
		? kiraz_option( 'shop__sidebar' )
		: kiraz_option( 'product__sidebar' );
}

function kiraz_woocommerce_sidebar_position() {
	return is_shop() || is_product_taxonomy()
		? kiraz_option( 'shop__sidebarPosition' )
		: kiraz_option( 'product__sidebarPosition' );
}

function kiraz_woocommerce_products_per_page() {
	return abs( (int) kiraz_option( 'shop__paginate' ) );
}

function kiraz_woocommerce_template_loop_product_thumbnail() {
	global $post;

	if ( has_post_thumbnail() ) {
		$props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
		$images = kiraz_get_image_resized( array(
			'image_id' => get_post_thumbnail_id(),
			'size'     => kiraz_option( 'shop__productImageSize' ),
			'crop'     => kiraz_option( 'shop__productImageSizeCrop' ),
			'atts'     => array(
				'title'	 => $props['title'],
				'alt'    => $props['alt'],
			)
		) );

		echo kiraz_cleanup( $images['thumbnail'] );
	} elseif ( wc_placeholder_img_src() ) {
		echo wc_placeholder_img( $image_size );
	}
}