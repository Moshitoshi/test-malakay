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


	<div class="button_container" id="toggle">
	  <span class="top"></span>
	  <span class="middle"></span>
	  <span class="bottom"></span>
	</div>

<div class="overlay" id="overlay">
		<nav class=" overlay-menu " id="navigation">

 				<!-- The WordPress Menu goes here -->

							<?php
									wp_nav_menu( array(
											'theme_location' => 'bootstrapmenu',
											'depth' => 2,
											'container' => false,
											'menu_class' => 'nav',
											'fallback_cb' => 'wp_page_menu',
											//Process nav menu using our custom nav walker
											'walker' => new wp_bootstrap_navwalker())
									);
									?>
						</div><!-- .container -->
					</nav><!-- .site-navigation -->
						</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
