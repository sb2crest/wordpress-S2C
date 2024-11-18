<?php
defined( 'ABSPATH' ) or die();


add_filter( 'kiraz_body_class', 'kiraz_projects_body_class' );
add_filter( 'kiraz_sidebar_id', 'kiraz_projects_sidebar' );
add_filter( 'kiraz_sidebar_position', 'kiraz_projects_sidebar_position' );
?>

	<?php get_header() ?>
		<?php if ( have_posts() ): ?>
			<?php get_template_part( 'tmpl/project/loop', kiraz_option( 'projects__displayMode' ) ) ?>
		<?php else: ?>
			<div class="content">
				<?php get_template_part( 'tmpl/project/content', 'none' ) ?>
			</div>
		<?php endif ?>
	<?php get_footer(); ?>

