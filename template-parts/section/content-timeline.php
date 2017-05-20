<?php
/**
 * Template part for displaying Timeline section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Malakay
 */

?>

<?php $loop = new WP_Query(array('post_type' => 'post','posts_per_page' => -1)); ?>

<div class="row">
    <div class="col-lg-12">
        <ul class="timeline">
          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <li>
                <div class="timeline-image">
                    <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2009-2011</h4>
                        <h4 class="subheading">Our Humble Beginnings</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                    </div>
                </div>
            </li>





            <li class="timeline-inverted">
                <div class="timeline-image">
                    <img class="img-circle img-responsive" src="img/about/2.jpg" alt="">
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>March 2011</h4>
                        <h4 class="subheading">An Agency is Born</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                    </div>
                </div>
            </li>
<?php endwhile; wp_reset_postdata(); ?>
