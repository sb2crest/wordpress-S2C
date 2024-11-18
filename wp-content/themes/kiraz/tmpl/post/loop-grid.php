<?php
defined( 'ABSPATH' ) or die();
?>


<?php if ( have_posts() ): ?>
	<div class="content-inner" data-grid-normal data-columns="<?php echo esc_attr( kiraz_option( 'blog__archive__columns' ) ) ?>" role="main" itemprop="mainContentOfPage">
		<?php while ( have_posts() ): the_post(); ?>
			<?php get_template_part( 'tmpl/post/content', 'alt' ) ?>
		<?php endwhile ?>
	</div>

	<?php kiraz_pagination() ?>
	<?php else: ?>
		<?php get_template_part( 'tmpl/post/content-none' ) ?>
	<?php endif ?>