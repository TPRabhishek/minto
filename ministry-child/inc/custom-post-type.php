<?php

/*
	
@package Mea
	
	========================
		THEME CUSTOM POST TYPES
	========================
*/
/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'bt_flush_rewrite_rules' );

/* Flush your rewrite rules */
function bt_flush_rewrite_rules() {
     flush_rewrite_rules();
}

	
	
	
	


/* CONTACT CPT */
add_action( 'init', 'sui_custom_post_type' );
function sui_custom_post_type() {
	$labels = array(
		'name' 				=> 'Start up India',
		'singular_name' 	=> 'Start up India',
		'menu_name'			=> 'Start up India',
		'name_admin_bar'	=> 'Start up India'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'hierarchical'		=> false,
		'menu_position'		=> 26,
		'public'        => true,
		'has_archive'   => true,
		'menu_icon'			=> 'dashicons-email-alt',
		'supports'			=> array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' )
	);
	
	register_post_type( 'start-up-india', $args );
	
}


/* CONTACT CPT */
add_action( 'init', 'suifeatured_custom_post_type' );
function suifeatured_custom_post_type() {
	$labels = array(
		'name' 				=> 'Featured Start Up',
		'singular_name' 	=> 'Featured Start Up',
		'menu_name'			=> 'Featured Start Up',
		'name_admin_bar'	=> 'Featured Start Up'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'hierarchical'		=> false,
		'menu_position'		=> 26,
		'public'        => true,
		'has_archive'   => true,
		'menu_icon'			=> 'dashicons-email-alt',
		'supports'			=> array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' )
	);
	
	register_post_type( 'featured-start-up', $args );
	
}

 
/*
Country type News
*/
function post_type_country() {
  $labels = array(
    'name'               => _x( 'Countries', 'post type general name' ),
    'singular_name'      => _x( 'Countries', 'post type singular name' ),
    'add_new'            => _x( 'Add Country', 'news' ),
    'add_new_item'       => __( 'Add New Country' ),
    'edit_item'          => __( 'Edit Country' ),
    'new_item'           => __( 'New Country' ),
    'all_items'          => __( 'All Countries' ),
    'view_item'          => __( 'View Country' ),
    'search_items'       => __( 'Search Country' ),
    'not_found'          => __( 'No Country found' ),
    'not_found_in_trash' => __( 'No Country found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'All Countries'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our products and product specific data',
    'public'        => true,
    'menu_position' => 12,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'country-post', $args );
  
}
add_action( 'init', 'post_type_country' );


/*
  Trade Agreement Lists Post type
*/
function post_type_tda_agree() {
  $labels = array(
    'name'               => _x( 'Trade Agreement', 'post type general name' ),
    'singular_name'      => _x( 'Trade Agreement', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'tdc_project' ),
    'add_new_item'       => __( 'Add New Agreement' ),
    'edit_item'          => __( 'Edit Agreement' ),
    'new_item'           => __( 'New Agreement' ),
    'all_items'          => __( 'All Trade Agreement' ),
    'view_item'          => __( 'View Agreement' ),
    'search_items'       => __( 'Search Agreement' ),
    'not_found'          => __( 'No Agreement found' ),
    'not_found_in_trash' => __( 'No Agreement found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Trade Agreement'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our products and product specific data',
    'public'        => true,
    'menu_position' => 13,
    'supports'      => array( 'title', 'editor'),
    'has_archive'   => true,
  );
  register_post_type( 'tac-post', $args );
}
add_action( 'init', 'post_type_tda_agree' );



/*
  Mou's Signed Country Lists Post type
*/
function post_type_mou_country() {
  $labels = array(
    'name'               => _x( 'Mou Signed Countries', 'post type general name' ),
    'singular_name'      => _x( 'Mou Signed Countries', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'msc_project' ),
    'add_new_item'       => __( 'Add New Country' ),
    'edit_item'          => __( 'Edit Country' ),
    'new_item'           => __( 'New Country' ),
    'all_items'          => __( 'All Mou Signed Countries' ),
    'view_item'          => __( 'View Country' ),
    'search_items'       => __( 'Search Country' ),
    'not_found'          => __( 'No Country found' ),
    'not_found_in_trash' => __( 'No Country found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => "Mou's Signed Countries"
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our products and product specific data',
    'public'        => true,
    'menu_position' => 4,
    'supports'      => array( 'title', 'editor'),
    'has_archive'   => true,
  );
  register_post_type( 'msc-post', $args );
}
add_action( 'init', 'post_type_mou_country' );

/*
  Carousel Toggle Custom Post
*/
function carousel_toggle() {
  $labels = array(
    'name'               => _x( 'Carousel Toggle', 'post type general name' ),
    'singular_name'      => _x( 'Carousel Toggle', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Carousel Toggle' ),
    'add_new_item'       => __( 'Add New Carousel Toggle' ),
    'edit_item'          => __( 'Edit Carousel Toggle' ),
    'new_item'           => __( 'New Carousel Toggle' ),
    'all_items'          => __( 'All Carousel Toggle' ),
    'view_item'          => __( 'View Carousel Toggle' ),
    'search_items'       => __( 'Search Carousel Toggle' ),
    'not_found'          => __( 'No Carousel Toggle found' ),
    'not_found_in_trash' => __( 'No Carousel Toggle found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => "Carousel Toggles"
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our products and product specific data',
    'public'        => true,
    'menu_position' => 4,
    'supports'      => array( 'title'),
    'has_archive'   => true,
  );
  register_post_type( 'carousel-toggle-post', $args );
}
add_action( 'init', 'carousel_toggle' );