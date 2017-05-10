<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Malakay
 */

if ( ! function_exists( 'malakay_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function malakay_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'malakay' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'malakay' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'malakay_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function malakay_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'malakay' ) );
		if ( $categories_list && malakay_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'malakay' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'malakay' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'malakay' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'malakay' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'malakay' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function malakay_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'malakay_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'malakay_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so malakay_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so malakay_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in malakay_categorized_blog.
 */
function malakay_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'malakay_categories' );
}
add_action( 'edit_category', 'malakay_category_transient_flusher' );
add_action( 'save_post',     'malakay_category_transient_flusher' );

/**
 * Costumize wp-gallery
 */

 add_filter('post_gallery', 'my_post_gallery', 10, 2);
 function my_post_gallery($output, $attr) {
     global $post;

     if (isset($attr['orderby'])) {
         $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
         if (!$attr['orderby'])
             unset($attr['orderby']);
     }

     extract(shortcode_atts(array(
         'order' => 'ASC',
         'orderby' => 'menu_order ID',
         'id' => $post->ID,
         'itemtag' => 'dl',
         'icontag' => 'dt',
         'captiontag' => 'dd',
         'columns' => 3,
         'size' => 'thumbnail',
         'include' => '',
         'exclude' => ''
     ), $attr));

     $id = intval($id);
     if ('RAND' == $order) $orderby = 'none';

     if (!empty($include)) {
         $include = preg_replace('/[^0-9,]+/', '', $include);
         $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

         $attachments = array();
         foreach ($_attachments as $key => $val) {
             $attachments[$val->ID] = $_attachments[$key];
         }
     }

     if (empty($attachments)) return '';

     // Here's your actual output, you may customize it to your need
     $output = "<div class=\"card-deck popup-gallery\">\n";

     // Now you loop through each attachment
     foreach ($attachments as $id => $attachment) {
         // Fetch the thumbnail (or full image, it's up to you)
 //      $img = wp_get_attachment_image_src($id, 'medium');
 //      $img = wp_get_attachment_image_src($id, 'my-custom-image-size');
         $img = wp_get_attachment_image_src($id, 'full');

         $output .= "<a href=\"{$img[0]}\" width=\"{$img[1]}\" height=\"5rem\" title=\"" . wptexturize($attachment->post_excerpt) . "\" description=\"description\" alt=\"alt\" />\n";
         $output .= "<img class=\"img-thumbnail\" src=\"{$img[0]}\" style=\"width: auto; max-height: 14rem;\" width=\"{$img[1]}\" height=\"{$img[2]}\" title=\"" . wptexturize($attachment->post_title) . "\" alt=\"" . wptexturize($attachment->post_excerpt) . "\"  description=\"description\"/>\n";
         $output .= "</a>\n";

     }

     $output .= "</div>\n";

     return $output;
 }

 /**
* Add title back to images
*/
function pexeto_add_title_to_attachment( $markup, $id ){
	$att = get_post( $id );
	return str_replace('<a ', '<a title="'.$att->post_title.'" ', $markup);
}
add_filter('wp_get_attachment_link', 'pexeto_add_title_to_attachment', 10, 5);
