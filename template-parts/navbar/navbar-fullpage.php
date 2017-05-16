<?php
/**
 * Displays navbar fullpage
 *
 * @package WordPress
 * @subpackage Malakay
 * @since 1.0
 * @version 1.0
 */

?>
<header id="masthead" class="site-header" role="banner">
<div class="fullpage-button" id="toggle">
	<span class="top"></span>
	<span class="middle"></span>
	<span class="bottom"></span>
</div>

<div class="fullpage-overlay" id="overlay">
	<nav class="overlay-menu d-flex" id="navigation">
			<!-- The WordPress Menu goes here -->
						<?php
								wp_nav_menu( array(
										'theme_location' 	=> 'primary-menu',
										'depth' 					=> 2,
										'container' 			=> false,
										'menu_class' 			=> 'nav',
										'items_wrap'			=> '<ul id="%1$s" class="navbar-nav d-flex justify-content-center mr-auto text-center %2$s">%3$s</ul>',
										'fallback_cb' 		=> '__return_false',
										//Process nav menu using our custom nav walker
										'walker' 					=> new wp_bootstrap_navwalker())
								);
								?>
					</div><!-- .container -->
				</nav><!-- .site-navigation -->
					</div>
</header><!-- #masthead -->
