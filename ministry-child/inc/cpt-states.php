<?php 
/*
Post type News
*/
function post_type_states() {
  $labels = array(
    'name'               => _x( 'States', 'post type general name' ),
    'singular_name'      => _x( 'States', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'news' ),
    'add_new_item'       => __( 'Add New State' ),
    'edit_item'          => __( 'Edit State' ),
    'new_item'           => __( 'New State' ),
    'all_items'          => __( 'All State' ),
    'view_item'          => __( 'View State' ),
    'search_items'       => __( 'Search State' ),
    'not_found'          => __( 'No state found' ),
    'not_found_in_trash' => __( 'No state found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'All States of India'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our products and product specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail'),
    'has_archive'   => true,
  );
  register_post_type( 'state-post', $args );
}
add_action( 'init', 'post_type_states' );