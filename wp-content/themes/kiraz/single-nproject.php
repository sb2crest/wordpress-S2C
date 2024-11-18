<?php
defined( 'ABSPATH' ) or die();

$featured_background_types = (array) kiraz_option( 'header__titlebar__backgroundFeatured' );
$current_post_type         = kiraz_current_post_type();
$show_featured_image       = ! in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail();

add_filter( 'kiraz_sidebar_id', 'kiraz_single_project_sidebar' );
add_filter( 'kiraz_sidebar_position', 'kiraz_single_project_sidebar_position' );
?>
	<?php get_header() ?>
		<?php if ( have_posts() ): the_post(); ?>

			<article <?php post_class( 'project' ) ?>>
				<div class="project-content">
					<?php the_content() ?>
				</div>

				<?php if ( kiraz_option( 'project__tags' ) == 'on' ): ?>
					<div class="project-footer wrap project-tags"><?php echo get_the_term_list( get_the_ID(), 'nproject-tag' ) ?></div>
				<?php endif ?>
			</article>

			<?php if ( kiraz_option( 'project__related' ) == 'on' ): ?>
				<?php get_template_part( 'tmpl/project/related' ) ?>
			<?php endif ?>
			
		<?php endif ?>
	<?php get_footer() ?>
