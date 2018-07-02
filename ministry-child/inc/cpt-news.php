<?php 
/*
Post type News
*/
function post_type_news() {
  $labels = array(
    'name'               => _x( 'News', 'post type general name' ),
    'singular_name'      => _x( 'News', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'news' ),
    'add_new_item'       => __( 'Add New News' ),
    'edit_item'          => __( 'Edit News' ),
    'new_item'           => __( 'New News' ),
    'all_items'          => __( 'All News' ),
    'view_item'          => __( 'View News' ),
    'search_items'       => __( 'Search News' ),
    'not_found'          => __( 'No news found' ),
    'not_found_in_trash' => __( 'No news found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'News'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our products and product specific data',
    'public'        => true,
    'menu_position' => 2,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'news-post', $args );
  // Now register the taxonomy
  register_taxonomy('news-tax',array('news-post'), array(
    'hierarchical' => true,
    'label' => 'News Category',
    'show_ui' => true,
	'singular_name' => 'News Category', 
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'news-tax' ),
  )); 
  
  // Now register the tag
  register_taxonomy('news_tag',array('news-post'), array(
    'hierarchical' => false, 
    'label' => 'News Tags', 
	'show_ui' => true,
	'show_admin_column' => true,
    'singular_name' => 'News Tag', 
    'rewrite' => true, 
    'query_var' => true,
	'rewrite' => array( 'slug' => 'news_tag' ),
    ));

}
add_action( 'init', 'post_type_news' );