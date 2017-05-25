<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Malakay
 */

get_header();

$container   = get_theme_mod( 'malakay_container_type' );
$sidebar_pos = get_theme_mod( 'malakay_sidebar_position' );
?>

<?php //get_template_part( 'template-parts/header/header', 'image' ); ?>
<?php //get_template_part( 'template-parts/header/header', 'video' ); ?>
<?php get_template_part( 'template-parts/header/header', 'carousel' ); ?>

<div class="wrapper" id="wrapper-index">


<?php //get_template_part( 'template-parts/section/content', 'modal' ); ?>
<?php //get_template_part( 'template-parts/section/content', 'timeline' ); ?>
<?php get_template_part( 'template-parts/section/content', 'post-tile' ); ?>
<?php //get_template_part( 'template-parts/section/content', 'modal-m' ); ?>


	<div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>
<main class="site-main" id="main">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</div><!-- #primary -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>
</main><!-- #main -->
	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
