<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage Malakay
 * @since 1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses malakay_header_style()
 */
function malakay_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'malakay_custom_header_args', array(
		'default-image'      => get_parent_theme_file_uri( '/assets/images/header.jpg' ),
		'width'              => 2000,
		'height'             => 600,
		'flex-height'        => true,
		'video'              => true,
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/images/header.jpg',
			'thumbnail_url' => '%s/assets/images/header.jpg',
			'description'   => __( 'Default Header Image', 'malakay' ),
		),
	) );
}
add_action( 'after_setup_theme', 'malakay_custom_header_setup' );

/**
 * Customize video play/pause button in the custom header.
 */
// function malakay_video_controls( $settings ) {
// 	$settings['l10n']['play'] = '<span class="screen-reader-text">' . __( 'Play background video', 'malakay' ) . '</span>' . malakay_get_svg( array( 'icon' => 'play' ) );
// 	$settings['l10n']['pause'] = '<span class="screen-reader-text">' . __( 'Pause background video', 'malakay' ) . '</span>' . malakay_get_svg( array( 'icon' => 'pause' ) );
// 	return $settings;
// }
// add_filter( 'header_video_settings', 'malakay_video_controls' );
