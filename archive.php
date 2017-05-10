<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Malakay
 */

get_header();

$container   = get_theme_mod( 'malakay_container_type' );
$sidebar_pos = get_theme_mod( 'malakay_sidebar_position' );
?>

<div class="wrapper" id="archive-wrapper">

<div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">

	<div class="row">

		<!-- Do the left sidebar check -->
		<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

		<main class="site-main" id="main">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
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

		</main><!-- #main -->
</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
