<?php 
/*
Post type News
*/
function post_type_moudoc() {
  $labels = array(
    'name'               => _x( 'MOU Documents', 'post type general name' , 'moudoc_mgt' ),
    'singular_name'      => _x( 'MOU Document', 'post type singular name' , 'moudoc_mgt' ),
    'add_new'            => _x( 'Add MOU Doc', 'moudoc' , 'moudoc_mgt' ),
    'add_new_item'       => __( 'Add New MOU Doc' , 'moudoc_mgt' ),
    'edit_item'          => __( 'Edit MOU Doc' , 'moudoc_mgt' ),
    'new_item'           => __( 'New MOU Doc' , 'moudoc_mgt' ),
    'all_items'          => __( 'All MOU Documents' , 'moudoc_mgt' ),
    'view_item'          => __( 'View MOU Doc' , 'moudoc_mgt' ),
    'search_items'       => __( 'Search MOU Doc' , 'moudoc_mgt' ),
    'not_found'          => __( 'No MOU Doc found' , 'moudoc_mgt' ),
    'not_found_in_trash' => __( 'No MOU Doc found in the Trash' , 'moudoc_mgt' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'MOU Documents'
  );
  $args = array(
    'labels'        => $labels,
    'description'        => __( 'Description.', 'moudoc_mgt' ),

        'public'             => true,
		'menu_position' 	 => 3,
        'publicly_queryable' => true,

        'show_ui'            => true,

        'show_in_menu'       => true,

        'query_var'          => true,

        'rewrite'            => array( 'slug' => 'mou-doc' ),

        'capability_type'    => 'post',

        'has_archive'        => true,

        'hierarchical'       => false,

        'menu_position'      => null,

        'supports'           => array( 'title' )
  );
  register_post_type( 'mou-doc', $args );
	register_taxonomy('mou-tax',array('mou-doc'), array(
    'hierarchical' => true,
    'label' => 'Add Country',
    'show_ui' => true,
		'add_new_item' => 'Add New Country',
	'singular_name' => 'Add Country', 
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'mou-tax' ),
  )); 
  
  // Now register the tag
  register_taxonomy('mou_tag',array('news-post'), array(
    'hierarchical' => false, 
    'label' => 'Add Country', 
	'show_ui' => true,
	'show_admin_column' => true,
	  'add_new_item' => 'Add New Country',
    'singular_name' => 'Add Country', 
    'rewrite' => true, 
    'query_var' => true,
	'rewrite' => array( 'slug' => 'mou_tag' ),
    ));
}
add_action( 'init', 'post_type_moudoc' );