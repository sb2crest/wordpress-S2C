<?php if ( class_exists( 'WC_Widget_Cart' ) ): ?>
	<li class="shopping-cart">
		<a class="toggleCart" href="javascript:void(0)"></a>
		<a class="shopping-cart-count" href="<?php echo esc_url( wc_get_cart_url() ) ?>">
			<i class="iconlab-basket-simple-1"></i>

			<?php if ( WC()->cart->cart_contents_count > 0 ): ?>
				<span class="shopping-cart-items-count"><span><?php echo esc_html( WC()->cart->cart_contents_count ) ?></span></span>
			<?php else: ?>
				<span class="shopping-cart-items-count no-items"></span>
			<?php endif ?>

			<span class="cart-total"><?php echo WC()->cart->get_cart_total(); ?></span>
		</a>
		<div class="sub-menu">
			<div class="cart-header">
				<h3><?php esc_html_e( 'Shopping Cart', 'kiraz' ) ?></h3>
				<a class="toggleCart" href="javascript:void(0)"><i class="iconlab-e-remove"></i></a>
			</div>
			<div class="widget_shopping_cart_content">
				<?php woocommerce_mini_cart() ?>
			</div>
		</div>
	</li>
<?php endif ?>