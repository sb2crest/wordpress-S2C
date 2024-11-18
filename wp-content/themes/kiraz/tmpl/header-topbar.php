<?php
defined( 'ABSPATH' ) or die();

$topbar_text  = kiraz_option( 'header__topbar__text' );

?>

	<div id="site-topbar" class="site-topbar">
		<div class="site-topbar-inner wrap">
			<?php if ( ! empty( $topbar_text ) ): ?>
				<div class="topbar-text">
					<?php echo do_shortcode( $topbar_text ) ?>
				</div>
				<!-- /.topbar-text -->
			<?php endif ?>

			<?php if ( has_nav_menu( 'top' ) ): ?>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'top',
						'menu_class'     => 'menu menu-top',
						'container'       => false,
						'fallback_cb'     => false,
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0
				  	));
				?>
			<?php endif ?>

			<?php kiraz_social_icons( array( 'location' => 'top' ) ) ?>
		</div>
	</div>
