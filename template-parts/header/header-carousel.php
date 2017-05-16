<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Malakay
 * @since 1.0
 * @version 1.0
 */

?>
<section class="">
  <!-- Begin Carousel-->

  			<?php
  			$args = array(
  				'post_type' => 'post'
  			);
  			$the_query = new WP_Query ( $args );
  			?>


  			<div id="carouselExampleIndicators" class="hero carousel slide" data-ride="carousel">
  				<!-- Indicators -->
  				<ol class="carousel-indicators">
  					<!-- the Loop -->
  					<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
  						<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $the_query->current_post; ?>" class="<?php if ( $the_query->current_post == 0 ) : ?>active<?php endif; ?>"></li>
  					<?php endwhile; endif; ?>
  				</ol>
  				<!-- rewind loop back to zero without losing data-->
  				<?php rewind_posts(); ?>
  				<!-- Wrapper for slides -->
  				<div class="carousel-inner" role="listbox">

  					<?php if ( have_posts() ) : while ( $the_query->have_posts() ) :
  						$the_query->the_post(); ?>

  						<div class="carousel-item <?php if ( $the_query->current_post == 0 ) : ?>active<?php endif; ?>">
                <div class="header-hero-carousel">
        					<div class="custom-header">
                    <img class="d-block img-fluid" src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url('header-carousel-thumb');} ?>" alt="Malakay">
        					</div><!-- .custom-header -->
        				</div>
                    <section class="hero__content homepage-hero__content">
                        <div class="container text-inverse">
                            <h1 class="hero__title"><?php the_title(); ?></h1>
                            <div class="hero__subtitle">
                              <p>Header Carousel</p>
                            </div>
                        </div>
                    </section>

  						</div>

  					<?php endwhile;
  					endif; ?>

  				</div>
  				<!-- Controls -->
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
          </a>

  			</div>
  <!--			End Image Carousel-->

</section>
