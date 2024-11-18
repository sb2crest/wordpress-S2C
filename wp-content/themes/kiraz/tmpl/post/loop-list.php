<?php
defined( 'ABSPATH' ) or die();
?>
	
	<?php if ( have_posts() ): ?>
		<?php while ( have_posts() ): the_post(); ?>
			<article id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
				<div class="post-meta-data">
					<div class="post-author">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 110 ); ?>
						<span><?php esc_html_e( 'by', 'kiraz' ); ?></span>
						<span><?php the_author_posts_link() ?></span>
					</div>

					<div class="post-date">
						<span class="post-day"><?php echo esc_html( get_the_date( 'd' ) ) ?></span>
						<span class="post-month"><?php echo esc_html( get_the_date( 'M' ) ) ?></span>
					    <span class="post-year"><?php echo esc_html( get_the_date( 'Y' ) ) ?></span>
					</div>
				</div>

				<div class="post-wrap">
					<header class="post-header">
						<?php get_template_part( 'tmpl/post/content-title' ) ?>
						<?php if ( kiraz_option( 'blog__archive__postMeta' ) == 'on' ): ?>
							<div class="post-categories">
								<?php the_category( _x( ', ', 'Used between list items, there is a space after the comma.', 'kiraz' ) ) ?>
							</div>
						<?php endif ?>
					</header>

					<?php get_template_part( 'tmpl/post/content-featured', get_post_format() ) ?>

					<div class="post-content">
						<?php
						kiraz_the_content( false );
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'kiraz' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
						?>
					</div>

					<?php if ( kiraz_option( 'blog__archive__readmore' ) === 'on' ): ?>
						<?php get_template_part( 'tmpl/post/content-readmore' ) ?>
					<?php endif ?>
				</div>
			</article>
		<?php endwhile ?>
	<?php else: ?>
		<?php get_template_part( 'tmpl/post/content-none' ) ?>
	<?php endif ?>
	
	<?php kiraz_pagination() ?>	