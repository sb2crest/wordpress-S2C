<?php
defined( 'ABSPATH' ) or die();

$featured_background_types = (array) kiraz_option( 'header__titlebar__backgroundFeatured' );
$current_post_type         = kiraz_current_post_type();
$show_featured_image       = ! in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail();
?>

<article id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
	<div class="post-thumbnail"><?php the_post_thumbnail( 'post-thumbnail' ) ?></div>
	<div class="post-content" itemprop="text">
		<?php the_content() ?>

		<?php
		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'kiraz' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
		) );
		?>
	</div>
	<?php if ( kiraz_option( 'blog__single__postTags' ) == 'on' ): ?>
		<div class="post-tags"><?php the_tags( '', ' ' ); ?></div>
	<?php endif ?>

	<?php if ( kiraz_option( 'blog__single__postAuthor' ) == 'on' ): ?>
		<?php get_template_part( 'tmpl/post/content-author' ) ?>
	<?php endif ?>

	<?php kiraz_comments_list() ?>
</article>
<!-- /#post-<?php echo get_the_ID() ?> -->