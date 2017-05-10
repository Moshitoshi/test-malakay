<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Malakay
 */

 $the_theme = wp_get_theme();
 $container = get_theme_mod( 'malakay_container_type' );
 ?>
 <div class="wrapper" id="wrapper-footer">
 	<div class="<?php echo esc_html( $container ); ?>">
 		<div class="row">
 			<div class="col-md-12">
 				<footer class="site-footer" id="colophon">
					<div class="col-md-8">
					  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'malakay' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'malakay' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'malakay' ), 'malakay', '<a href="https://automattic.com/" rel="designer">Tuvino&Moshi</a>' ); ?>
				</div><!-- .site-info -->

			</footer><!-- #colophon -->
		</div><!--col end -->

				</div><!-- row end -->

			</div><!-- container end -->

		</div><!-- wrapper end -->

		</div><!-- #page -->

		<?php wp_footer(); ?>

		</body>

		</html>
