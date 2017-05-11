<?php
/**
 * Synergicato enqueue scripts
 *
 * @package synergicato
 */

/**
 * Enqueue scripts and styles.
 */

 function malakay_scripts() {
 	wp_enqueue_style( 'malakay-style', get_stylesheet_uri() );
 	wp_enqueue_style( 'malakay-styles', get_stylesheet_directory_uri() . '/sass/malakay.min.css', array(), '0.0.0' );
  wp_enqueue_style( 'navbarfullpage', get_stylesheet_directory_uri() . '/sass/navbarfullpage.min.css', array(), '0.0.0' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap-scripts', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.0.0', true );
  wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array(), '1.1.0', true );
  wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '3.0.4', true );
  wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'isotope'), '1.0.0', true );
 	wp_enqueue_script( 'malakay-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
 	wp_enqueue_script( 'malakay-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
 		wp_enqueue_script( 'comment-reply' );
 	}
 }
 add_action( 'wp_enqueue_scripts', 'malakay_scripts' );

function google_fonts() {
	$query_args = array(
		'family' => 'Roboto:200,200i,300,300i,400,400i,900,900i|Nunito:900',
		'subset' => 'latin,latin-ext',
	);
	wp_register_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
            }

add_action('wp_enqueue_scripts', 'google_fonts');




// Load Font Awesome
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
function enqueue_font_awesome() {

	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );

}

add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video', 'image' ) );
