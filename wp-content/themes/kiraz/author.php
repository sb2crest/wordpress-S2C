<?php
defined( 'ABSPATH' ) or die();

add_filter( 'kiraz_body_class', 'kiraz_blog_body_class' );
add_filter( 'kiraz_sidebar_id', 'kiraz_blog_sidebar' );
add_filter( 'kiraz_sidebar_position', 'kiraz_blog_sidebar_position' );
?>

<?php get_header() ?>
<?php if ( have_posts() ): ?>
	<?php get_template_part( 'tmpl/post/content-author' ) ?>
	<?php get_template_part( 'tmpl/post/loop', kiraz_option( 'blog__archive__style' ) ) ?>
	<?php else: ?>

		<?php get_template_part( 'tmpl/post/content', 'none' ) ?>
	<?php endif ?>
	<?php get_footer() ?>