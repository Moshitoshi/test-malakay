<?php
/*
Costum Post Type: Magazine
*/

// register custom post type to work with
function progetti_create_post_type() {
	// set up labels
	$labels = array(
 		'name' => 'Progetti',
    	'singular_name' => 'Progetto',
    	'add_new' => 'Aggiungi Nuova Progetto',
    	'add_new_item' => 'Aggiungi Nuova Progetto',
    	'edit_item' => 'Modifica Progetto',
    	'new_item' => 'Nuova Progetto',
    	'all_items' => 'Tutti i Progetti',
    	'view_item' => 'Guarda Progetto',
    	'search_items' => 'Cerca Progetto',
    	'not_found' =>  'Nessuna Progetto Trovata',
    	'not_found_in_trash' => 'Nessuna Progetto trovata nel cestino',
    	'parent_item_colon' => '',
    	'menu_name' => 'Progetti',
    );
    //register post type
	register_post_type( 'progetti', array(
		'labels' => $labels,
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'progetti' ),
        'menu_icon' => 'dashicons-book-alt',
		)
	);
}

function create_genere() {

register_taxonomy('genere', 'progetti', array(
   'hierarchical' => true /*visualizza come le categorie*/, 'label' => 'Genere',
    'show_admin_column' => true,
   'query_var' => true, 'rewrite' => true));
}
add_action('init', 'create_genere', 0);



add_action( 'init', 'progetti_create_post_type' );




function slide_create_post_type() {
	// set up labels
	$labels = array(
 		'name' => 'Slide',
    	'singular_name' => 'Slide',
    	'add_new' => 'Aggiungi Nuova Slide',
    	'add_new_item' => 'Aggiungi Nuova Slide',
    	'edit_item' => 'Modifica Slide',
    	'new_item' => 'Nuova Slide',
    	'all_items' => 'Tutti le Slide',
    	'view_item' => 'Guarda Slide',
    	'search_items' => 'Cerca Slide',
    	'not_found' =>  'Nessuna Slide Trovata',
    	'not_found_in_trash' => 'Nessuna Slide trovata nel cestino',
    	'parent_item_colon' => '',
    	'menu_name' => 'Slide',
    );
    //register post type
	register_post_type( 'slide', array(
		'labels' => $labels,
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'slide' ),
        'menu_icon' => 'dashicons-slides',
		)
	);
}

add_action( 'init', 'slide_create_post_type' );



/*
Categoria: Post/Ioespongo - Slider
*/

add_action( 'init', 'in_evidenza', 0 );

//create two taxonomies, genres and tags for the post type "tag"
function in_evidenza() {
  // Add new taxonomy, hierarchical (like category)
  $labels = array(
   		'name'              => _x( 'Post In Evidenza', 'taxonomy general name', 'synergicato' ),
		'singular_name'     => _x( 'Post In Evidenza', 'taxonomy singular name', 'synergicato' ),
		'search_items'      => __( 'Cerca Post In Evidenza', 'synergicato' ),
		'all_items'         => __( 'Tutte i Post In Evidenza', 'synergicato' ),
		'parent_item_colon' => __( 'Sotto Post In Evidenza:', 'synergicato' ),
		'edit_item'         => __( 'Modifica Post In Evidenza', 'synergicato' ),
		'update_item'       => __( 'Aggiorna Post In Evidenza', 'synergicato' ),
		'add_new_item'      => __( 'Aggiungi Post In Evidenza', 'synergicato' ),
		'new_item_name'     => __( 'Nuovo Post In Evidenzar', 'synergicato' ),
		'menu_name'         => __( 'Post In Evidenza', 'synergicato' ),
  );

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite' => array( 'slug' => 'in_evidenza' ),
	);

	register_taxonomy( 'in_evidenza', array( 'post', 'progetti' ), $args );
}


?>
