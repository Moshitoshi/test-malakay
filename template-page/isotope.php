<?php
/**
 * Template Name: Isotope Page
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
    				<ul id="filters" class="filters float-right">
    					<li class="filters-all"><a href="#" data-filter="*" class="selected">Tutto</a></li>
    					<?php
                                      $terms = get_terms("category"); // get all categories, but you can use any taxonomy
                                      $count = count($terms); //How many are they?
                                      if ( $count > 0 ){  //If there are more than 0 terms
                                        foreach ( $terms as $term ) {  //for each term:
                                          echo "<li class='".$term->slug."'><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
                                          //create a list item with the current term slug for sorting, and name for label
                                        }
                                      }
                                  ?>
    				</ul>
    			</div>
    		</div>
    		<div class="row">
    			<?php $args = array( 'post_type' => 'post'); ?>
    				<?php $the_query = new WP_Query( $args ); //Check the WP_Query docs to see how you can limit which posts to display ?>
    					<?php if ( $the_query->have_posts() ) : ?>
    						<div id="isotope-list" class="col-md-12 popup-gallery">
    							<?php while ( $the_query->have_posts() ) : $the_query->the_post();
    							$termsArray = get_the_terms( $post->ID, "category" );  //Get the terms for this particular item
    							$termsString = ""; //initialize the string that will contain the terms
    							foreach ( $termsArray as $term ) { // for each term
    							$termsString .= $term->slug.' '; //create a string that has all the slugs
    							  }
    							?>

    								  <!-- <div class="card-header">

    								  </div> -->
    									<a class="item <?php echo $termsString; ?>" id="titolo_<?php global $post; echo $post->post_name; ?>" href="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url('medium');} ?>">
                        <img class="img-fluid" src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url('medium');} ?>" title="culo" alt="Card image cap">
                        <!-- <h1 class="card-title progetto-title"><a id="titolo_<?php global $post; echo $post->post_name; ?>" href="<?php print get_permalink($post->ID) ?>"><?php print get_the_title(); ?></a></h1> -->
                      </a>





    								<?php endwhile; ?>
    						</div>
    						<?php endif; ?>
    		</div>

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
