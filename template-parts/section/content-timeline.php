<?php
/**
 * Template part for displaying Timeline section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Malakay
 */

?>

<?php $i = 0; $loop = new WP_Query(array('post_type' => 'post','posts_per_page' => -1)); ?>
<section id="timeline">
		<div class="container">
				<h2 class="text-center">Timeline</h2>
<div class="row">
    <div class="col-lg-12">
        <ul class="timeline">
          <?php while ( $loop->have_posts() ) : $loop->the_post(); $i++; ?>
            <?php if ($i % 2 != 0) { echo '<li>';} else { echo '<li class="timeline-inverted">';} ?>
                <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="">
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4><?php the_title(); ?></h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted"><?php the_content();?></p>
                    </div>
                </div>
            </li>
            <?php endwhile; wp_reset_postdata(); ?>
          </ul>
        </div>
      </div>
    </div>

</section>
