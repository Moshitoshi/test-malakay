<?php
/**
 * Template Name: Portfolio Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Malakay
 */

get_header();

$container   = get_theme_mod( 'malakay_container_type' );
$sidebar_pos = get_theme_mod( 'malakay_sidebar_position' );
?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">

    <div class="row mb-5">
    			<!-- this is the carousel’s header row -->
    			<div class="col-md-6">
    				<h1 class="entry-title pl-3">Progetti</h1>
    			</div>
    			<div class="col-md-6">
    				Filtri

						<?php

$taxonomy = 'category';
$terms = get_terms($taxonomy); // Get all terms of a taxonomy

if ( $terms && !is_wp_error( $terms ) ) :
?>
    <ul>
        <?php foreach ( $terms as $term ) { ?>
            <li><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></li>
        <?php } ?>
    </ul>
<?php endif;?>

    			</div>
    		</div>

    			<?php $args = array( 'post_type' => 'post'); ?>
    				<?php $the_query = new WP_Query( $args ); //Check the WP_Query docs to see how you can limit which posts to display ?>
    					<?php if ( $the_query->have_posts() ) : ?>
    						<div id="card-deck" class="card-columns item-gallery">
    							<?php while ( $the_query->have_posts() ) : $the_query->the_post();
    							$termsArray = get_the_terms( $post->ID, "category" );  //Get the terms for this particular item
    							$termsString = ""; //initialize the string that will contain the terms
    							foreach ( $termsArray as $term ) { // for each term
    							$termsString .= $term->slug.' '; //create a string that has all the slugs
    							  }
    							?>

    								  <!-- <div class="card-header">

    								  </div> -->
											<div class="card">
    									<a class="item<?php echo $termsString; ?>" id="titolo_<?php global $post; echo $post->post_name; ?>" href="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url('full');} ?>">
                        <img class="img-fluid card-img-top" src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url('full');} ?>"  alt="<?php print get_the_title(); ?>" title="<?php print get_post(get_post_thumbnail_id())->post_excerpt; ?>">
                        <!-- <h1 class="card-title progetto-title"><a id="titolo_<?php global $post; echo $post->post_name; ?>" href="<?php print get_permalink($post->ID) ?>"><?php print get_the_title(); ?></a></h1> -->
                      </a>
											</div>





    								<?php endwhile; ?>
    						</div>
    						<?php endif; ?>

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
