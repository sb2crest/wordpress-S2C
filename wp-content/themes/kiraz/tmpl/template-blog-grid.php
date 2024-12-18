<?php

/**
 * Prevent direct access to this file
 */
defined( 'ABSPATH' ) or die();

/**
 * Template Name: Blog Grid
 */
add_filter( 'kiraz_sidebar_id', 'kiraz_blog_sidebar' );
add_filter( 'kiraz_sidebar_position', 'kiraz_blog_sidebar_position' );
add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'blog-grid' ) );
} );
?>
	
	<?php get_header() ?>
		<?php
			query_posts( array(
				'post_type'      => 'post',
				'paged'          => max( 1, get_query_var( 'paged' ) )
			) );
		?>

		<?php get_template_part( 'tmpl/post/loop-grid', kiraz_option( 'blog__archive__style' ) ) ?>
		
		<?php wp_reset_postdata(); ?>
		<?php wp_reset_query(); ?>

	<?php get_footer(); ?>
