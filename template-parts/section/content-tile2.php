<?php
/**
 * Template part for displaying Timeline section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Malakay
 */

?>

<?php $i = 0; $loop = new WP_Query(array('post_type' => 'post','posts_per_page' => 4)); ?>
<section id="tile2">
		<div class="container">
				<h2 class="text-center">Tile2</h2>
<div class="row">
          <?php while ( $loop->have_posts() ) : $loop->the_post(); $i++; ?>
            <?php if ($i % 3 == 1) { ?> <div class="col-md-8"> <?php } else { ?> <div class="col-md-4"> <?php } ?>
                    <img class=" img-fluid" src="<?php the_post_thumbnail_url(''); ?>" alt="" style="height: 100%;">
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>

</section>
