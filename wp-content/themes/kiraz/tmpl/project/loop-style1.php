<?php
defined( 'ABSPATH' ) or die();

$options          = array( 'itemSelector' => '.project' );
$meta_information = (array)kiraz_option( 'projects__meta' );
?>

	<?php if ( have_posts() ): ?>
		<?php get_template_part( 'tmpl/project/filter' ) ?>

		<div class="content-inner" data-grid="<?php echo esc_attr( json_encode( $options ) ) ?>" data-columns="<?php echo esc_attr( kiraz_option( 'projects__gridColumns' ) ) ?>">
			<?php while ( have_posts() ): the_post(); ?>

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
							<div class="project-category">
								<?php echo get_the_term_list( get_the_ID(), 'nproject-category' ) ?>
							</div>
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

		<?php kiraz_pagination() ?>
	<?php else: ?>
		<!-- Show empty message -->
	<?php endif ?>
