<?php
defined( 'ABSPATH' ) or die();

$contact_info         = kiraz_option( 'header__info__text' );

?>

<?php if ( is_active_sidebar( 'off-canvas-left' ) ): ?>
	<div id="off-canvas-left" class="off-canvas off-canvas-left">
		<div class="off-canvas-wrap wrap">
			<a href="javascript:;" data-target="off-canvas-left" class="off-canvas-toggle">
				<span></span>
			</a>
			<?php dynamic_sidebar( 'off-canvas-left' ) ?>
		</div>
	</div>
<?php endif ?>


	<div id="off-canvas-right" class="off-canvas sliding-menu">
		<div class="off-canvas-wrap">
			<a href="javascript:;" data-target="off-canvas-right" class="off-canvas-toggle">
				<span></span>
			</a>
			<?php if ( ! empty( $contact_info ) ): ?>
				<div class="header-info-text">
					<?php echo do_shortcode( $contact_info ) ?>
				</div>
			<?php endif ?>
			<?php
				wp_nav_menu(array(
					'theme_location'  => 'sliding',
					'container'       => false,
					'menu_class'      => 'menu menu-sliding',
					'fallback_cb'     => false,
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0
			  	));
			?>
			<?php kiraz_social_icons( array( 'location' => 'top' ) ) ?>
		</div>
	</div>