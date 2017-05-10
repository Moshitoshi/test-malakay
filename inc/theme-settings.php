<?php
/**
 * Check and setup theme's default settings
 *
 * @package malakay
 *
 */
function setup_theme_default_settings() {

	// check if settings are set, if not set defaults.
	// Caution: DO NOT check existence using === always check with == .
	// Latest blog posts style.
	$malakay_posts_index_style = get_theme_mod( 'malakay_posts_index_style' );
	if ( '' == $malakay_posts_index_style ) {
		set_theme_mod( 'malakay_posts_index_style', 'default' );
	}

	// Sidebar position.
	$malakay_sidebar_position = get_theme_mod( 'malakay_sidebar_position' );
	if ( '' == $malakay_sidebar_position ) {
		set_theme_mod( 'malakay_sidebar_position', 'right' );
	}

	// Container width.
	$malakay_container_type = get_theme_mod( 'malakay_container_type' );
	if ( '' == $malakay_container_type ) {
		set_theme_mod( 'malakay_container_type', 'container' );
	}
}
