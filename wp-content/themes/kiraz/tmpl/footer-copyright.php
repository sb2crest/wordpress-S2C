<?php
defined( 'ABSPATH' ) or die();

$footer__copyright__content  = kiraz_option( 'footer__copyright__content' );
$classes = array( 'footer-copyright' );

if ( kiraz_option( 'footer__copyright__full' ) == 'on' ) {
	$classes[] = 'footer-copyright-full';
}
?>

<?php if ( kiraz_option( 'footer__copyright' ) == 'on' ): ?>
	<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
		<div class="footer-copyright-inner wrap">
			<div class="copyright-bar">
				<?php if ( kiraz_option( 'global__misc__gotop' ) == 'on' ): ?>
					<div class="go-to-top">
						<a href="javascript:;"><span><?php echo esc_html__( 'Go to Top', 'kiraz' ) ?></span></a>
					</div>
				<?php endif ?>
				<div class="copyright-content">
					<?php echo do_shortcode( $footer__copyright__content ) ?>
				</div>
				<?php kiraz_social_icons( array( 'location' => 'footer' ) ) ?>
			</div>
		</div>
	</div>
	<?php endif ?>