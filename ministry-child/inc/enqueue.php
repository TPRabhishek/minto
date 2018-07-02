<?php


/*
	
@package ministry-child
	
	
*/


/*
	
	========================
		FRONT-END ENQUEUE FUNCTIONS
	========================
*/
function sunset_load_scripts(){
     
	
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/css/custom-style.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'innerstylesheet', get_stylesheet_directory_uri() . '/css/innerstylesheet.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'imidiate-style', get_stylesheet_directory_uri() . '/css/imidiate-style.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'custom-responsive', get_stylesheet_directory_uri() . '/css/custom-responsive.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'owl-carousel-min', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'mea-dashboard-custom', get_stylesheet_directory_uri() . '/css/mea-dashboard-custom.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'animate', get_stylesheet_directory_uri() . '/css/animate.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'global-common-do-not-touch', get_stylesheet_directory_uri() . '/css/global-common-do-not-touch.css', array(), '3.3.6', 'all' );
	wp_enqueue_style( 'mea-style', get_stylesheet_directory_uri() . '/css/mea-style.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i' );
	wp_enqueue_style( 'mea-responsive', get_stylesheet_directory_uri() . '/css/mea-responsive.css', array(), '3.3.6', 'all' );
	
    

        
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery' , get_stylesheet_directory_uri() . '/js/jquery.js', false, '1.11.3', true );
	wp_enqueue_script( 'jquery' );
	/* wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true ); */
    wp_enqueue_script( 'scroll-top', get_stylesheet_directory_uri() . '/js/scroll-top.js', array('jquery'), ' ', true );
	wp_enqueue_script( 'owl-carousel', get_stylesheet_directory_uri() . '/js/owl.carousel.js', array('jquery'), ' ', true );
    wp_enqueue_script( 'mea-custom', get_stylesheet_directory_uri() . '/js/mea-custom.js', array('jquery'), ' ', true );
	wp_enqueue_script( 'isotop', get_stylesheet_directory_uri() . '/js/amchartsjs/js/isotope.pkgd.min.js', array('jquery'), ' ', true );
	wp_enqueue_script( 'ammap', get_stylesheet_directory_uri() . '/js/amchartsjs/js/ammap.js', array('jquery'), ' ', true );
	wp_enqueue_script( 'amcharts', get_stylesheet_directory_uri() . '/js/amchartsjs/js/amcharts.js', array('jquery'), ' ', true );

	wp_enqueue_script( 'serial', get_stylesheet_directory_uri() . '/js/amchartsjs/js/serial.js', array('jquery'), ' ', true );
	wp_enqueue_script( 'pie', get_stylesheet_directory_uri() . '/js/amchartsjs/js/pie.js', array('jquery'), ' ', true );
	
		wp_enqueue_script( 'worldLow', get_stylesheet_directory_uri() . '/js/amchartsjs/js/worldLow.js', array('jquery'), ' ', true );
	wp_enqueue_script( 'scriptamchart', get_stylesheet_directory_uri() . '/js/amchartsjs/js/scriptamchart.js', array('jquery'), ' ', true );
	wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/amchartsjs/js/custom.js', array('jquery'), ' ', true );
}
add_action( 'wp_enqueue_scripts', 'sunset_load_scripts' );





/*
	
	=========================================
		BACKEND ENQUEUE FUNCTIONS
	=========================================
*/


function wpdocs_selectively_enqueue_admin_script( $hook ) {
    if ( 'post.php' != $hook ) {
        return;
    }
    wp_enqueue_script( 'admin-js', get_stylesheet_directory_uri() . '/js/admin-js/admin-js.js', array(), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'wpdocs_selectively_enqueue_admin_script' );



