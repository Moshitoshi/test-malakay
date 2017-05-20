<?php
/**
 * Template part for displaying Modal section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Malakay
 */

?>

<?php $loop = new WP_Query(array('post_type' => 'post','posts_per_page' => -1)); ?>


<section id="portfolio">
		<div class="container">
				<h2 class="text-center">Portfolio</h2>
				<hr class="star-primary">
				<div class="row">
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<div class="col-sm-4 portfolio-item">
								<div class="portfolio-link" href="#post-<?php the_ID(); ?>" data-toggle="modal">
										<div class="caption">
												<div class="caption-content">
														<i class="fa fa-search-plus fa-3x"></i>

												</div>
										</div>
										<img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="">
								</div>
						</div>
						<?php endwhile; wp_reset_postdata(); ?>
				</div>
		</div>
</section>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<div class="portfolio-modal modal fade" id="post-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
				<div class="modal-content">
						<div class="close-modal" data-dismiss="modal">
								<div class="lr">
										<div class="rl">
										</div>
								</div>
						</div>
						<div class="container">
								<div class="row">
										<div class="col-lg-8 offset-lg-2">
												<div class="modal-body">
														<h2><?php the_title(); ?></h2>
														<hr class="star-primary">
														<img class="img-fluid img-centered" src="img/portfolio/cabin.png" alt="">
														<p><?php the_content(); ?></p>

														<button class="btn btn-success" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
</div>
<?php endwhile; wp_reset_postdata(); ?>
