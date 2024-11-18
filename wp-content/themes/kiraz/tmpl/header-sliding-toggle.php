<?php
defined( 'ABSPATH' ) or die();

$sliding_menuLable      = kiraz_option( 'sliding__menuLable' );

?>

<?php // if ( has_nav_menu( 'sliding' ) ): ?>
	<a href="javascript:;" data-target="off-canvas-right" class="off-canvas-toggle">
		<span><?php echo kiraz_cleanup( $sliding_menuLable ) ?></span>
	</a>
<?php // endif; ?>