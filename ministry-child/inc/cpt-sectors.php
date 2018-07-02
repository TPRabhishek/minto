<?php 
/*
Post type News
*/
function post_type_sector() {
  $labels = array(
    'name'               => _x( 'Sectors', 'post type general name' ),
    'singular_name'      => _x( 'Sectors', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'news' ),
    'add_new_item'       => __( 'Add New Sector' ),
    'edit_item'          => __( 'Edit Sector' ),
    'new_item'           => __( 'New Sector' ),
    'all_items'          => __( 'All Sectors' ),
    'view_item'          => __( 'View Sector' ),
    'search_items'       => __( 'Search Sector' ),
    'not_found'          => __( 'No sector found' ),
    'not_found_in_trash' => __( 'No sector found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'All Sectors'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our products and product specific data',
    'public'        => true,
    'menu_position' => 4,
    'supports'      => array( 'title', 'editor', 'thumbnail'),
    'has_archive'   => true,
  );
  register_post_type( 'sector-post', $args );
}
add_action( 'init', 'post_type_sector' );