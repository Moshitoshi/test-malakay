<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package WordPress
 * @subpackage Malakay
 * @since 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

/**
 * Checks to see if we're on the homepage or not.
 */
function malakay_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}
