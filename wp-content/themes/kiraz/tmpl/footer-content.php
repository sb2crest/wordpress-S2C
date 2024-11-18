<?php
defined( 'ABSPATH' ) or die();

$classes = array( 'content-bottom-widgets' );

if ( kiraz_option( 'contentBottom__widgets__full' ) == 'on' ) {
	$classes[] = 'content-bottom-full';
}

$layout = kiraz_option( 'contentBottom__widgets__layout' );
$columns = $layout['columns'];
$columnsLayout = $layout['layout'][$columns];
?>

	<?php if ( kiraz_option( 'contentBottom__widgets' ) == 'on' ): ?>
		<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
			<div class="content-bottom-inner wrap">
				<div class="content-bottom-aside-wrap">
					<?php foreach( range( 0, $columns - 1 ) as $index ): ?>
					<aside data-width="<?php echo esc_attr( $columnsLayout[$index] ) ?>"><?php dynamic_sidebar( sprintf( 'content-bottom-%d', $index + 1 ) ) ?></aside>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	<?php endif ?>