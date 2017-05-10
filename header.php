<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Malakay
 */
$container = get_theme_mod( 'malakay_container_type' );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'malakay' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary site-navigation" id="navigation">
			<?php if ( 'container' == $container ) : ?>
					<div class="<?php echo esc_html( $container ); ?>">
						<?php endif; ?>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
						 <!-- Your site title as branding in the menu -->
 					<?php if ( ! has_custom_logo() ) { ?>

 						<?php if ( is_front_page() && is_home() ) : ?>

 							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

 						<?php else : ?>

 							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>

 						<?php endif; ?>


 					<?php } else {
 						the_custom_logo();
 					} ?><!-- end custom logo -->

 				<!-- The WordPress Menu goes here -->
						<div class="collapse navbar-collapse" id="navbarNavDropdown">
							<?php wp_nav_menu(
								array(
									'theme_location'  => 'primary',
									'container' 			=> false,
									'container_id'    => 'navbarNavDropdown',
									'menu_class'      => '',
									'fallback_cb'			=> '__return_false',
									'items_wrap'			=> '<ul id="%1$s" class="navbar-nav mr-auto mt-2 mt-lg-0 %2$s">%3$s</ul>',
									'depth'						=> 2,
									'menu_id'         => 'main-menu',
									'walker'          => new WP_Bootstrap_Navwalker(),
									)
								); ?>
 						</div>
							<?php if ( 'container' == $container ) : ?>
						</div><!-- .container -->
						<?php endif; ?>
					</nav><!-- .site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
