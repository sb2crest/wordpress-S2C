<?php
defined( 'ABSPATH' ) or die();

$header_nav_extras      = kiraz_option( 'header__extras' );
$sliding_sidebarLable   = kiraz_option( 'sliding__sidebarLable' );

$header_classes         = array( 'site-header-sticky' );
$header_classes[]       = sprintf( 'header-%s', kiraz_option( 'header__sticky__style' ) );

if ( kiraz_option( 'header__sticky__width' ) === 'on' ) {
	$header_classes[] = 'header-full';
}

if ( kiraz_option( 'header__sticky__shadow' ) === 'on' ) {
	$header_classes[] = 'header-shadow';
}

?>

<div id="site-header-sticky" class=" <?php echo esc_attr( join( ' ', $header_classes ) ) ?>">
	<div class="site-header-inner wrap">
		<?php if ( is_active_sidebar( 'off-canvas-left' ) ): ?>
			<a href="javascript:;" data-target="off-canvas-left" class="off-canvas-toggle">
				<span><?php echo kiraz_cleanup( $sliding_sidebarLable ) ?></span>
			</a>
		<?php endif; ?>

		<div class="wrap-brand">
			<div class="header-brand">
				<a href="<?php echo esc_attr( home_url() ) ?>" class="brand">
					<?php kiraz_logo( kiraz_option( 'header__sticky__logo' ) ) ?>
				</a>
			</div>
			
			<nav class="navigator" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
				<?php if ( has_nav_menu( 'primary' ) ): ?>
					<?php
						wp_nav_menu(array(
							'theme_location'  => 'primary',
							'container'       => false,
							'menu_class'      => 'menu menu-primary',
							'fallback_cb'     => 'kiraz_page_menu',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0
					  	));
					?>
				<?php endif ?>
			</nav>
		</div>

		<?php if ( ! empty( $header_nav_extras ) ): ?>
			<ul class="navigator menu-extras">
				<?php foreach ( $header_nav_extras as $type ): ?>
					<?php get_template_part( 'tmpl/header-icon', $type ); ?>
				<?php endforeach ?>
			</ul>
		<?php endif ?>

		<?php kiraz_social_icons( array( 'location' => 'sticky' ) ) ?>

		<?php if ( has_nav_menu( 'sliding' ) ): ?>
			<?php get_template_part( 'tmpl/header-sliding-toggle' ) ?>
		<?php endif ?>
	</div>
	<!-- /.site-header-inner -->
</div>
	<!-- /.site-header -->