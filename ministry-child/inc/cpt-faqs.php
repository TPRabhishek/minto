<?php 
/*
Post type Trade Information
*/
function post_type_faqs() {
  $labels = array(
    'name'               => _x( 'FAQS', 'post type general name' ),
    'singular_name'      => _x( 'FAQS', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'tradeInfo' ),
    'add_new_item'       => __( 'Add New FAQ' ),
    'edit_item'          => __( 'Edit FAQ' ),
    'new_item'           => __( 'New FAQ' ),
    'all_items'          => __( 'All FAQS' ),
    'view_item'          => __( 'View FAQ' ),
    'search_items'       => __( 'Search FAQ' ),
    'not_found'          => __( 'No FAQ found' ),
    'not_found_in_trash' => __( 'No FAQ found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'FAQS'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our products and product specific data',
    'public'        => true,
    'menu_position' => 4,
    'supports'      => array( 'title', 'editor'),
    'has_archive'   => true,
  );
  register_post_type( 'faq-post', $args );
  // Now register the taxonomy
  register_taxonomy('faq-tax',array('faq-post'), array(
    'hierarchical' => true,
    'labels' => 'FAQS Category',
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'faq-tax' ),
  )); 
}
add_action( 'init', 'post_type_faqs' );