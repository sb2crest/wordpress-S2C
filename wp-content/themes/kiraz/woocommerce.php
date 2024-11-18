<?php
defined( 'ABSPATH' ) or die();

add_filter( 'kiraz_body_class', 'kiraz_woocommerce_body_class' );
add_filter( 'kiraz_sidebar_id', 'kiraz_woocommerce_sidebar' );
add_filter( 'kiraz_sidebar_position', 'kiraz_woocommerce_sidebar_position' );

add_action( 'woocommerce_before_main_content', 'kiraz_product_category', 100 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_archive_description', 'woocommerce_breadcrumb', 15 );
add_action( 'woocommerce_before_single_product', 'woocommerce_breadcrumb', 15 );
//remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

?>

<?php get_header() ?>
	<?php if ( kiraz_option( 'shop__archive__category' ) === 'on' ): ?>
		<div class="hidden-categories"></div>
    <?php endif ?>

    <?php do_action( 'woocommerce_before_main_content' );?>

	<div class="main-products">
		<?php 
		function kiraz_product_category( $args = array() ) {
			$woocommerce_category_id = get_queried_object_id();
			$args = array(
				'parent' => $woocommerce_category_id
			);
			$terms = get_terms( 'product_cat', $args );
			if ( $terms ) {
				echo '<ul class="woocommerce-categories">';
				foreach ( $terms as $term ) {
					echo '<li class="woocommerce-product-category-page">';
					echo '<a href="' .  esc_url( get_term_link( $term ) ) . '" class="' . $term->slug . '">';
					echo '<span class="title">' . $term->name . '</span>';
					woocommerce_subcategory_thumbnail( $term );
					echo '</a>';
					echo '</li>';
				}
				echo '</ul>';
			}
		}
		?>

		<?php if ( is_shop() || is_product_category() ): ?>
			<?php if ( is_active_sidebar( 'woocommerce-content-top' ) ): ?>
				<div class="woocommerce-content-top">
					<a href="javascript:;" data-target="off-canvas-top" class="off-canvas-toggle">
						<span><?php esc_html_e( 'Filter', 'kiraz' ) ?></span>
					</a>
					<div id="off-canvas-top" class="off-canvas off-canvas-top woocommerce-content-top-wrap">
						<?php dynamic_sidebar( 'woocommerce-content-top' ) ?>
					</div>
				</div>
			<?php endif ?>
		<?php endif ?>

		<?php woocommerce_content() ?>
	</div>
<?php get_footer() ?>
