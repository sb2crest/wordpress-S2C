<?php
defined( 'ABSPATH' ) or die();


$layout    = kiraz_option( 'header__titlebar' );
$alignment = kiraz_option( 'header__titlebar__align' );

$current_post = get_queried_object();

if ($current_post instanceof WP_Post) {
	/**
	 * Override layout and alignment settings for the specific entry
	 */
	$_layout = get_field( 'titlebarLayout', $current_post->ID );
	$_alignment = get_field( 'titlebarAlign', $current_post->ID );
}

if ( isset( $_layout ) && $_layout != 'default' ) {
	$layout = $_layout;
}

if ( isset( $_alignment ) && $_alignment != 'default' ) {
	$alignment = $_alignment;
}

if ( ( is_front_page() && kiraz_option( 'header__titlebar__home' ) == 'off' ) || $layout == 'none' ) {
	return;
}

$classes = array(
	"content-header",
	"content-header-{$alignment}"
);

if ( is_singular() ) {
	$featured_background_types = (array) kiraz_option( 'header__titlebar__backgroundFeatured' );
	$current_post_type         = kiraz_current_post_type();


	if ( in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail( $current_post->ID ) ) {
		$classes[] = 'content-header-featured';
	}
}

?>

<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
	<div class="lines">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</div>
	<div class="content-header-inner wrap">
		<div class="page-title-wrap">
		    <?php if ( is_single( $post ) && $post->post_type == 'nproject' ): ?>
				<?php if ( $client_image_id = get_field( 'projectClientLogo', get_post() ) ): ?>
					<div class="project-client-info"><?php
							$image = kiraz_get_image_resized( array(
								'image_id' => $client_image_id,
								'size'     => 'full'
							) );

							echo wp_kses_post( $image['thumbnail'] );
						?></div>
				<?php endif ?>
			<?php endif ?>

			<?php if ( in_array( $layout, array( 'both', 'title' ) ) ): ?>
				<?php if ( is_single( $post ) && $post->post_type == 'post' ): ?>
					<div class="post-categories">
						<?php the_category( _x( ' ', 'Used between list items, there is a space after the comma.', 'kiraz' ) ) ?>
					</div>
				<?php endif; ?>

				<div class="page-title">
					<?php kiraz_header_page_title() ?>
				</div>

				<?php if ( is_single( $post ) && $post->post_type == 'post' ): ?>
					<?php if ( kiraz_option( 'blog__single__postMeta' ) == 'on' ): ?>
						<div class="post-meta-single">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 45 ); ?>
							<p>
								<span><?php esc_html_e( 'Posted by', 'kiraz' ) ?></span>
								<span class="post-name"><?php the_author_posts_link() ?></span>
							</p>
							<p>
								<span><?php esc_html_e( 'on', 'kiraz' ) ?></span>
								<span><?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ) ?></span>
							</p>
						</div>
				<?php endif ?>

				<?php wp_reset_postdata() ?>
			<?php endif ?>

		<?php endif ?>
		</div>

		<?php if ( function_exists( 'bcn_display' ) && in_array( $layout, array( 'both', 'breadcrumbs' ) ) ): ?>
			<div class="breadcrumbs">
				<div class="breadcrumbs-inner">
					<?php bcn_display() ?>
				</div>
			</div>
		<?php endif ?>
	</div>

	<?php if ( is_single( $post ) && $post->post_type == 'post' ): ?>
		<?php if ( kiraz_option( 'blog__single__postNav' ) == 'on' ): ?>
			<?php get_template_part( 'tmpl/post/content-navigator' ) ?>
		<?php endif ?>
	<?php endif ?>

	<?php if ( is_single( $post ) && $post->post_type == 'nproject' ): ?>
		<?php if ( kiraz_option( 'project__pagination' ) == 'on' ): ?>
			<?php get_template_part( 'tmpl/post/content-navigator' ) ?>
		<?php endif ?>
	<?php endif ?>

	<?php if ( kiraz_option( 'header__titlebar__scrolldown' ) == 'on' ): ?>
		<div  class="down-arrow">
			<a href="javascript:;">
				<span><?php esc_html_e( 'Scroll Down', 'kiraz' ) ?></span>
			</a>
		</div>
	<?php endif ?>
</div>
