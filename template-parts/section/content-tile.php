<?php
/**
 * Template part for displaying Timeline section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Malakay
 */

?>

<section id="tile">

	<div class="container">
	<div class="row">
		<?php $i=1; echo '<div class="col-md-8">'; if (have_posts()) : ?>
           <?php while (have_posts()) : the_post(); if($i==2) echo '</div><div class="col-md-4">';?>
								 <img class="img-fluid" src="<?php the_post_thumbnail_url('full'); ?>" alt="">
           <?php $i++; endwhile; ?>
 <?php endif; ?>




</div>
</div>
</section>
