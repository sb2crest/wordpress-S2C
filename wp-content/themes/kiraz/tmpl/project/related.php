<?php

/**
 * Prevent direct access to this file
 */
defined( 'ABSPATH' ) or die();

$options          = array( 'itemSelector' => '.project' );
$meta_information = (array)kiraz_option( 'projects__meta' );

/**
 * Ignore render related box when it's disabled
 */
if ( ! is_singular( 'nproject' ) ) {
	return;
}

// Query args
$args = array(
	'post_type'      => 'nproject',
	'posts_per_page' => kiraz_option( 'project__related__count', 4 ),
	'post__not_in'   => array( get_the_ID() )
);

$related_item_type = kiraz_option( 'project__related__type' );

// Filter by tags
if ( 'tag' == $related_item_type ) {
	if ( ! ( $terms = get_the_terms( get_the_ID(), nProjects::TYPE_TAG ) ) )
		return;

	$args['tax_query'] = array(
		'taxonomy' => nProjects::TYPE_TAG,
		'field'    => 'term_id',
		'terms'    => wp_list_pluck( $terms, 'term_id' )
	);
}
// Filter by categories
elseif ( 'category' == $related_item_type ) {
	if ( ! ( $terms = get_the_terms( get_the_ID(), nProjects::TYPE_CATEGORY ) ) )
		return;

	$args['tax_query'] = array(
		'taxonomy' => nProjects::TYPE_CATEGORY,
		'field'    => 'term_id',
		'terms'    => wp_list_pluck( $terms, 'term_id' )
	);
}
// Show random items
elseif ( 'random' == $related_item_type ) {
	$args['orderby'] = 'rand';
}
// Show latest items
elseif ( 'recent' == $related_item_type ) {
	$args['order'] = 'DESC';
	$args['orderby'] = 'date';
}

// Create the query instance
$query = new WP_Query( $args );
$widget_title = kiraz_option( 'project__related__title' );

if ( $query->have_posts() ): ?>

	<div class="projects-related wrap projects-style1">
		<?php if ( ! empty( $widget_title ) ): ?>
			<h3 class="projects-related-title">
				<?php echo esc_html( $widget_title ) ?>
			</h3>
		<?php endif ?>

		<div class="projects-related-wrap" data-grid="<?php echo esc_attr( json_encode( $options ) ) ?>" data-columns="<?php echo esc_attr( kiraz_option( 'projects__related__gridColumns' ) ) ?>">
			<?php while ( $query->have_posts() ): $query->the_post(); ?>

				<article <?php post_class( 'project' ) ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
					<div class="project-inner">
						<figure class="project-thumbnail">
							<a href="<?php the_permalink() ?>">
								<span class="client-thumb"><?php if ( $client_image_id = get_field( 'projectClientLogo', get_post() ) ): ?>
										<?php
											$image = kiraz_get_image_resized( array(
												'image_id' => $client_image_id,
												'size'     => 'full'
											) );

											echo wp_kses_post( $image['thumbnail'] );
										?>		
									<?php endif ?></span>
								<?php
									$image = kiraz_get_image_resized( array(
										'post_id' => get_the_ID(),
										'size'    => kiraz_option( 'projects__imagesize' ),
										'crop'    => kiraz_option( 'projects__imagesizeCrop' ) == true
									) );

									echo kiraz_cleanup( $image['thumbnail'] );
								?>
							</a>
						</figure>

						<div class="project-info">
							<div class="project-info-inner">
								<h2 class="project-title" itemprop="name headline">
									<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
								</h2>
								<?php if ( kiraz_option( 'projects__excerpt' ) == 'on' ): ?>
									<div class="project-summary">
										<?php the_excerpt() ?>
									</div>
								<?php endif ?>
							</div>
						</div>
					</div>
				</article>

			<?php endwhile ?>
		</div>
	</div>

<?php endif ?>
