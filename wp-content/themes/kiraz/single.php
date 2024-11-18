<?php
defined( 'ABSPATH' ) or die();

add_filter( 'kiraz_sidebar_id', 'kiraz_single_sidebar' );
add_filter( 'kiraz_sidebar_position', 'kiraz_single_sidebar_position' );
?>

<?php if ( have_posts() ): the_post(); ?>

	<?php get_header() ?>
		<!-- The main content -->
		<?php get_template_part( 'tmpl/post/content', 'single' ) ?>
		<?php kiraz_related_posts() ?>
	<?php get_footer() ?>

<?php endif ?>	
