<?php
//add custom js and styles
/**
 * Proper way to enqueue scripts and styles.
 */

require get_stylesheet_directory() . '/inc/enqueue.php';
require get_stylesheet_directory() . '/inc/custom-post-type.php';


function wpdocs_theme_name_scripts() {
    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
//hide plugin 
function mu_hide_plugins_network( $plugins ) {
// let's hide akismet
if( in_array( 'wp-charts/wordpress_charts_js.php', array_keys( $plugins ) ) ) {
unset( $plugins['wp-charts/wordpress_charts_js.php'] );
}
/*if( in_array( 'ajax_loadmore/ajax_loadmore.php', array_keys( $plugins ) ) ) {
unset( $plugins['ajax_loadmore/ajax_loadmore.php'] );
}*/
if( in_array( 'rocket-lazy-load/rocket-lazy-load.php', array_keys( $plugins ) ) ) {
unset( $plugins['rocket-lazy-load/rocket-lazy-load.php'] );
}
return $plugins;
}
add_filter( 'all_plugins', 'mu_hide_plugins_network' );
// Add a SEO user role
function ministry_add_capabilities() {
$result = add_role( 'seo_role', __('Seo role' ),
array(
'read' => true, // true allows this capability
'edit_posts' => true, // Allows user to edit their own posts
'edit_pages' => true, // Allows user to edit pages
'edit_others_posts' => true, // Allows user to edit others posts not just their own
'create_posts' => true, // Allows user to create new posts
'manage_categories' => true, // Allows user to manage post categories
'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
));
}
add_action( 'init', 'ministry_add_capabilities' );
/** Remove Settings Menu Page from SEO Guy **/
function seo_guy_menu() {
    if(!current_user_can('administrator')){
        remove_menu_page('options-general.php');
    }
}
add_action('admin_menu', 'seo_guy_menu');
function my_nav_wrap() {
  // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
  
  // open the <ul>, set 'menu_class' and 'menu_id' values
  $wrap  = '<ul id="%1$s" class="%2$s">';
  
  // get nav items as configured in /wp-admin/
  $wrap .= '%3$s';
  
  // the static link 
  $wrap .= '<li><a href="#"><img src="'.get_stylesheet_directory_uri().'/img/iconSearch.png" class="imgWidth"></a></li>';
  
  // close the <ul>
  $wrap .= '</ul>';
  // return the result
  return $wrap;
}
function ministry_widgets_init() {
  register_sidebar( array(
    'name' =>__( 'Bottom Footer', 'ministry'),
    'id' => 'bottom_footer',
    'description' => __( 'Bottom Footer', 'ministry' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
  }
add_action( 'widgets_init', 'ministry_widgets_init' );
/*
Post type Event
*/
function post_type_event() {
  $labels = array(
    'name'               => _x( 'Events', 'post type general name' ),
    'singular_name'      => _x( 'Event', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'event' ),
    'add_new_item'       => __( 'Add New Event' ),
    'edit_item'          => __( 'Edit Event' ),
    'new_item'           => __( 'New Event' ),
    'all_items'          => __( 'All Events' ),
    'view_item'          => __( 'View Event' ),
    'search_items'       => __( 'Search Events' ),
    'not_found'          => __( 'No events found' ),
    'not_found_in_trash' => __( 'No events found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Events'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our products and product specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'event', $args );
  // Now register the taxonomy
  register_taxonomy('event-tax',array('event'), array(
    'hierarchical' => true,
    'labels' => 'Catogory',
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'event-tax' ),
  )); 
}
add_action( 'init', 'post_type_event' );

/*
Post type Publication
*/
function post_type_publication() {
  $labels = array(
    'name'               => _x( 'Publication', 'post type general name' ),
    'singular_name'      => _x( 'Publication', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'publication' ),
    'add_new_item'       => __( 'Add New Publication' ),
    'edit_item'          => __( 'Edit Publication' ),
    'new_item'           => __( 'New Publication' ),
    'all_items'          => __( 'All Publication' ),
    'view_item'          => __( 'View Publication' ),
    'search_items'       => __( 'Search Publication' ),
    'not_found'          => __( 'No Publication found' ),
    'not_found_in_trash' => __( 'No Publication found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Publication'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our products and product specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'publication_type', $args );
  // Now register the taxonomy
  register_taxonomy('publication-tax',array('publication_type'), array(
    'hierarchical' => true,
    'labels' => 'Catogory',
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'publication-tax' ),
  )); 
}
add_action( 'init', 'post_type_publication' );


// Shortcode to List Post based on Parameters
function ministryEvents( $atts ) {
    ob_start();
	$date_now1 = date('Y-m-d H:i:s');
    $atts = shortcode_atts(
    array(
        'post_type' => 'no foo',
        'bar' => 'default bar',
    ), $atts, 'ministry_event' );
    // Define query parameters based on attributes
    $options = array(
        'post_type' => $atts['post_type'],
        'posts_per_page' => 4,
		'order'				=> 'ASC',
		'orderby'			=> 'meta_value',
		'meta_key'			=> 'event_date',
		'meta_type'			=> 'DATE',
		'meta_query'	=> array(
			array(
				'key'	 	=> 'event_date',
				'compare' 	=> '>=',
				'type'		=> 'DATETIME',
				'value'	  	=> $date_now1,
			),
		),
    );
    $query = new WP_Query( $options );
    if ( $query->have_posts() ) { 
        $classes = array('bgyellowBox', 'bgyellowDarkBox', 'bgyellowBox', 'bgyellowDarkBox');
        while ( $query->have_posts() ) : 
            $query->the_post(); 
            $class = $classes[$i++ % 6]; 
?>
        <div class="col-sm-3 col-xs-12">
            <div class="<?php echo $class; ?>" style="cursor:pointer;" onclick="window.location.href='<?php the_permalink(); ?>'">
                <h3 class="eventh3">
                    <?php 
	   $dateVar = strtotime(get_field('event_date'));
	   $dateVarto = strtotime(get_field('event_date_to'));
	   if ($dateVarto != ''){
	   $to_event = '- '. date("M d ", $dateVarto);
	   }else{
	   $to_event = '';
	   }
	   echo date("M d ", $dateVar) .$to_event.'<span class="event-date">'.date("Y", $dateVar).'</span>'; 
					
					?>
                </h3>
                <span class="event-style-divider"></span> 
                <?php 
                    $trimtitle = get_the_title();
                    $shorttitle = wp_trim_words( $trimtitle, $num_words = 7, $more = '...' ); 
                ?>
                <h6>
                    <a href="<?php the_permalink(); ?>" style="color:#444344;">
                        <?php echo $shorttitle; ?>
                    </a>
                </h6>
            </div>
        </div>
        <?php endwhile;
        wp_reset_postdata();
        $myvariable = ob_get_clean();
        return $myvariable;
    }
}
add_shortcode( 'ministry_event', 'ministryEvents' );
// Shortcode to List Post based on Parameters
function ministryPosts( $atts ) {
  ob_start();
  $atts = shortcode_atts(
    array(
      'post_type' => 'no foo',
      'bar' => 'default bar',
      'post_per_page' =>'no_of_page',
      'category_slug' =>'category_slug',
    ), $atts, 'ministry_event' );
   //print_r($atts['post_type']);
  // Define query parameters based on attributes
   if(!empty($atts['category_slug'])){
    $options = array(
         'post_type' => $atts['post_type'],
         'posts_per_page' => $atts['post_per_page'],
         'tax_query' => array(
				'relation' => 'OR',
                      array(
                          'taxonomy' => 'category',   // taxonomy name
                          'field' => 'slug',           // term_id, slug or name
                          'terms' => $atts['category_slug'], // term id, term slug or term name
                      ),
				array(
                          'taxonomy' => 'news-tax',   // taxonomy name
                          'field' => 'slug',           // term_id, slug or name
                          'terms' => $atts['category_slug'], // term id, term slug or term name
                      )
                  )
         );
  }else{
   $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['post_per_page'],
   );
 }
   $query = new WP_Query( $options );
   if ( $query->have_posts() ) { 
    $classes = array('bgyellowBox', 'bgyellowDarkBox', 'bgyellowBox', 'bgyellowDarkBox');
    ?>
<?php $oddEvenCount = 0; while ( $query->have_posts() ) : $query->the_post(); $class = $classes[$i++ % 6]; $oddEvenClass = ($oddEvenCount % 2 == 0) ? "even" : "odd"; ?>
<div class="col-sm-3">
  <div class="shadow <?php echo $oddEvenClass; ?> news_block_custom">
    <div class="padAll bgWhite pB0">
    <?php $trimtitle = get_the_title();
      $shorttitle = wp_trim_words( $trimtitle, $num_words = 5, $more = '...' ); ?>
      <div class="whole-new-page-wapper"><a href="<?php the_permalink(); ?>"><h4>
        <?php echo $shorttitle; ?>
		<span class="mobile-date"> <?php echo date('M d, Y', strtotime(get_the_date())); ?> </span>
        </h4></a></div>
    </div>
    <div class="padAll padAll-mobile bgColorWhite pB10">
      <div class="date fW600">
        <?php echo date('M d, Y', strtotime(get_the_date())); ?>
      </div>
    </div>
    <div class="pic">
      <?php if ( has_post_thumbnail() ) {?>
      <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail(array(255,204));
          echo '</a>';
        } ?>
    </div>
  </div>
</div>
<?php $oddEvenCount++; endwhile;
          wp_reset_postdata();
   $myvariable = ob_get_clean();
   return $myvariable;
   }
}
add_shortcode( 'ministry_posts', 'ministryPosts' );
// Shortcode to post slider
function ministryPostSlider( $atts ) {
  ob_start();
  $atts = shortcode_atts(
    array(
      'post_type' => 'no foo',
      'bar' => 'default bar',
      'post_per_page' =>'no_of_page',
      'category_slug' =>'',
    ), $atts, 'ministry_event' );
   
   $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['post_per_page'],
		'tax_query' => array(
			array(
				'taxonomy' => 'news-tax',
				'field'    => 'slug',
				'terms'    => $atts['category_slug'],
				),
			),
   );
   $query = new WP_Query( $options );
   if ( $query->have_posts() ) { 
    ?>
    <div class="owl-carousel owl-theme custom-owl-style">
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <?php if ( has_post_thumbnail() ) {?>
      <?php $backgroundImg = get_the_post_thumbnail_url($query->ID,'full');
        } ?>
<div class="item" style="background: url('<?php echo $backgroundImg; ?>');">
  <div class="post_slider">
      <div class="post_slider_inner">
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </a>
        <a href="<?php the_permalink(); ?>" class="standard-button-class">Read More</a>
      </div>
  </div>
</div>
<?php endwhile; ?>
</div>
<?php
   wp_reset_postdata();
   $myvariable = ob_get_clean();
   return $myvariable;
   }
}
add_shortcode( 'ministry_postslider', 'ministryPostSlider' );


function latestSectorLists( $atts ) {
ob_start();
?>
<div class="sector-lists">
	<ul>
		<?php query_posts('post_type=sector-post&showposts=4');
			if(have_posts()):while(have_posts()):the_post();?>
			<li>
				<a href="<?php the_permalink();?>" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>)">
				<h3><?php the_title();?></h3>
				</a>
			</li>
			<?php endwhile; wp_reset_query(); endif;?>
	</ul>
</div>
<?php 
$myvariable = ob_get_clean();
   return $myvariable;
}
add_shortcode( 'latest_sector', 'latestSectorLists' );


/*// Shortcode to List Post based on Parameters
add_shortcode( 'blogs', 'post_list' );
function post_list( $atts ) {
 ob_start();
 // Define attributes and their defaults
 extract( shortcode_atts( array (
 'type' => 'event',
 'order' => 'DESC',
 'orderby' => 'title',
 'posts' => -1,
 'category' => 'uncategorized',
 ), $atts ) );
 
 // Define query parameters based on attributes
 $options = array(
 'post_type' => $type,
 'order' => $order,
 'orderby' => $orderby,
 'posts_per_page' => $posts,
 'category_name' => $category,
 );
 $query = new WP_Query( $options );
 if ( $query->have_posts() ) { ?>
 
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="row">
                
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <p class="news_update_date"><?php the_date('j / n / Y');?></p>
                    <h5 class="new_title_heading"><?php the_title();?></h5>
                    <div class="new_des"><?php the_excerpt();?></div>
                    <div class="read_more_btn">
                        <a href="<?php the_permalink();?>">read<br> more</a>
                    </div>
                </div>
            </div>
        </li>
        <?php endwhile;
        wp_reset_postdata();
 $myvariable = ob_get_clean();
 return $myvariable;
 }
}*/
/* Change Post to Article */
function change_post_menu_label() {
global $menu;
global $submenu;
$menu[5][0] = 'Story';
$submenu['edit.php'][5][0] = 'Story';
$submenu['edit.php'][10][0] = 'Add New';
$submenu['edit.php'][16][0] = 'Tags';
//echo '';
}
function change_post_object_label() {
global $wp_post_types;
$labels = &$wp_post_types['post']->labels;
$labels->name = 'Story';
$labels->singular_name = 'Story';
$labels->add_new = _x('Create', 'Story');
$labels->add_new_item = 'Add New Story';
$labels->edit_item = 'Edit Story';
$labels->new_item = 'New Story';
$labels->view_item = 'View Story';
$labels->search_items = 'Search Story';
$labels->not_found = 'No articles found';
$labels->not_found_in_trash = 'No Story found in trash.';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );
// end rename post function
// change howdy to hello in wordpress dashboard
add_filter('gettext', 'change_howdy', 10, 3);
function change_howdy($translated, $text, $domain) {
    if (!is_admin() || 'default' != $domain)
        return $translated;
    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Hello', $translated);
    return $translated;
}//end howdy to hello
//action for remove wp logo
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
  $wp_admin_bar->remove_node( 'wp-logo' );
}//end remove logo function
//remove menu for specific user role
function remove_menus(){
// get current login user's role
$roles = wp_get_current_user()->roles;
// test role
if( !in_array('author',$roles)){
return;
} 
//remove menu from site backend.
remove_menu_page( 'edit-comments.php' ); //Comments
remove_menu_page( 'tools.php' ); //Tools
remove_menu_page( 'vc-welcome' );
}
add_action( 'admin_menu', 'remove_menus' , 100 );
//end remove menu action
function twentyseventeen_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Blog Sidebar', 'twentyseventeen' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer 1', 'twentyseventeen' ),
    'id'            => 'sidebar-2',
    'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer 2', 'twentyseventeen' ),
    'id'            => 'sidebar-3',
    'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );
// add searchbox to menu
/*add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);
function add_search_box_to_menu( $items, $args ) {
    if( $args->theme_location == 'primary' )
        return $items.get_search_form();
    return $items;
}*/
//for india sector pages
// Shortcode to List Post based on Parameters
function ministrysectorsindia( $atts ) {
  ob_start();
  $atts = shortcode_atts(
    array(
      'post_type' => 'no foo',
      'bar' => 'default bar',
      'category_slug' => ''
    ), $atts, 'ministry_event' );
  // Define query parameters based on attributes
  if($atts['post_type'] != 'post'){
    $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => 4,
   'tax_query' => array(
                array(
                    'taxonomy' => 'india-tax',   // taxonomy name
                    'field' => 'slug',           // term_id, slug or name
                    'terms' => $atts['category_slug'], // term id, term slug or term name
                )
            )
   );
  }else{
   $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => 4,
   'category_slug' => $atts['category_slug'],
   );
 }
   $query = new WP_Query( $options );
   if ( $query->have_posts() ) { 
    $classes = array('bgpinkBox', 'bgpurpleBox', 'bgblueBox', 'bgskyblueBox');
    ?>
<?php while ( $query->have_posts() ) : $query->the_post(); $class = $classes[$i++ % 6]; ?>
<div class="col-sm-3 col-xs-6">
  <div class="sectors">
  <div class="thumbnail_sectors">
   <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail('medium', array('class' => 'img-responsive'));
  }?>
  </div>
    <h6><a href="<?php the_permalink(); ?>" style="color:#444344;">
      <?php the_title(); ?>
      </a></h6>
    <p>
      <?php //$dateVar = strtotime(the_date('', '', '', false)); echo date("F d, ", $dateVar).'<span class="event-date">'.date("Y", $dateVar).'</span>'; ?>
    </p>
  </div>
</div>
<?php endwhile;
          wp_reset_postdata();
   $myvariable = ob_get_clean();
   return $myvariable;
   }
}
add_shortcode( 'ministry_sectors', 'ministrysectorsindia' );
// Search custom post type
function newsSearchForm( $atts ) {
  ob_start(); ?>
  
    <form class="search" action="<?php echo home_url( '/' ); ?>">
    <input type="search" name="s" placeholder="Filter by type">
    <!-- <input type="button" value=""> -->
    <button class="fa fa-search"></button>
  </form>
<?php $myvariable = ob_get_clean();
   return $myvariable;
   
}
add_shortcode( 'news_search_form', 'newsSearchForm' );
// invest post type shortcode
function investPostCategory( $atts ) {
  ob_start();
  $atts = shortcode_atts(
    array(
      'post_type' => 'no foo',
      'bar' => 'default bar',
      'category_slug' => '',
      'no_of_blocks' => 6,
      'block_col_sm_class' => 'col-sm-4'
    ), $atts, 'ministry_event' );
  // Define query parameters based on attributes
   $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_blocks'],
   'tax_query' => array(
				array(
				'taxonomy' => 'news-tax',
				'field'    => 'slug',
				'terms'    => $atts['category_slug'],
				),
			),
   );
   $query = new WP_Query( $options );
   if ( $query->have_posts() ) { 
    $classes = array('bgpinkBox', 'bgpurpleBox', 'bgblueBox', 'bgskyblueBox');
    ?>
    <!-- <ul> -->
<?php while ( $query->have_posts() ) : $query->the_post(); $class = $classes[$i++ % 6]; ?>
  <!-- <li> -->
<div class="<?php echo $atts['block_col_sm_class'] ?>">
  <div class="sectors">
    <h5>
      <?php the_title(); ?>
      </h5>
    <div class="date_category">
     <span class="date"><?php the_field('news_subtitle');?></span>
    </div>
	<a class="iupdate-link" href="<?php the_permalink();?>"></a>
  </div>
</div>
<!-- </li> -->
<?php endwhile;
// echo '</ul>';
  wp_reset_postdata();
   $myvariable = ob_get_clean();
   return $myvariable;
   }
}
add_shortcode( 'invest_category', 'investPostCategory' );

// Opportunities Catogory shortcode
function oppCategoryPosts( $atts ) {
  ob_start();
?>
  <div class="opNews-list">
	<ul>
	<?php 
	$args22 = array(
		'post_type' => 'news-post',
		'posts_per_page' => 3,
		'tax_query' => array(
			array(
				'taxonomy' => 'news-tax',
				'field'    => 'term_id',
				'terms'    => '126',
				),
				),
			);
		$opNewsList = query_posts($args22);
		if(have_posts()):while(have_posts()):the_post();
		?>
		<li>
			<span class="opNews-img"><?php if(has_post_thumbnail()){the_post_thumbnail(array(260*250));}?></span>
			<div class="opNews-details">
				<h3><?php echo wp_trim_words(get_the_title(), 6);?></h3>
				<?php $opNewsDesc = get_post($post->ID)->post_content;?>
				<p><?php echo substr(get_field('news_subtitle'), 0, 60).'...';?></p>
				<p><?php //echo wp_trim_words(get_field('news_subtitle'), 10);?></p>
				<a class="learnMore" href="<?php the_permalink();?>">Learn More</a>
				</div>
		</li>
		<?php endwhile; wp_reset_query(); endif;?>
		</ul>
	</div>
<?php 
   $myvariable = ob_get_clean();
   return $myvariable;
}
add_shortcode( 'opp_category_posts', 'oppCategoryPosts' );

// Success Story Catogory shortcode
function sstoryCategoryPosts( $atts ) {
  ob_start();
?>
  <div class="ssNews-list">
	<ul>
	<?php 
		$args23 = array(
		'post_type' => 'news-post',
		'posts_per_page' => 3,
			'tax_query' => array(
				array(
					'taxonomy' => 'news-tax',
					'field'    => 'term_id',
					'terms'    => '128',
					),
					),
				);
				$opNewsList = query_posts($args23);
				if(have_posts()):while(have_posts()):the_post();
		?>
		<li>
			<div class="ssNews-data"><a href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a></div>
			<span class="ssNews-img"><a href="<?php the_permalink();?>"><?php if(has_post_thumbnail()){the_post_thumbnail(array(260*245));}?></a></span>
		</li>
		<?php endwhile; wp_reset_query(); endif;?>
		</ul>
	</div>
<?php 
   $myvariable = ob_get_clean();
   return $myvariable;
}
add_shortcode( 'sstory_category_posts', 'sstoryCategoryPosts' );
/* Event Veiwmore */
function ministryEventViewmore( $atts ) {
  ob_start();
  $cat = $_GET['cat'];
  $searchText = $_GET['search-event'];
  $searchState = $_GET['state-filter'];
  $searchSector = $_GET['sector-filter'];
  $date_now = date('Y-m-d H:i:s');
  $atts = shortcode_atts(
    array(
      'post_type' => 'no foo',
      'bar' => 'default bar',
    'no_of_post' => 5,
    'no_of_grid' => 5,
    ), $atts, 'ministry_event' );
  // Define query parameters based on attributes
  if(isset($cat) && $cat != '' && !isset($searchState) && !isset($searchSector) && !isset($searchText)){
	 $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
	),
	'tax_query' => array(
        array(
            'taxonomy' => 'event-tax',
            'field' => 'slug',
            'terms' => $cat,
        ),
    ),
   );
	
	} else if(!isset($cat) && $searchState=='' && $searchSector=='' && $searchText !=''){
   $options = array(
   'post_type' => $atts['post_type'],
   's' => $searchText,
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
	),
   );
	} else if(isset($cat) && $searchState=='' && $searchSector=='' && $searchText !=''){
   $options = array(
   'post_type' => $atts['post_type'],
   's' => $searchText,
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
	),
	'tax_query' => array(
        array(
            'taxonomy' => 'event-tax',
            'field' => 'slug',
            'terms' => $cat,
        ),
    ),
   );
	} else if(!isset($cat) && $searchState !='' && $searchSector =='' && $searchText ==''){
   $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		'relation' => 'AND',
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
		array(
			'key'	 	=> 'select_state',
			'value'	  	=> '"' . $searchState . '"',
			'compare' 	=> 'LIKE',
		),
	),
	
   );
	} else if(isset($cat) && $searchState !='' && $searchSector =='' && $searchText ==''){
   $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		'relation' => 'AND',
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
		array(
			'key'	 	=> 'select_state',
			'value'	  	=> '"' . $searchState . '"',
			'compare' 	=> 'LIKE',
		),
	),
	'tax_query' => array(
        array(
            'taxonomy' => 'event-tax',
            'field' => 'slug',
            'terms' => $cat,
        ),
    ),
   );
	} else if(!isset($cat) && $searchState !='' && $searchSector =='' && $searchText !=''){
   $options = array(
   'post_type' => $atts['post_type'],
   's' => $searchText,
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		'relation' => 'AND',
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
		array(
			'key'	 	=> 'select_state',
			'value'	  	=> '"' . $searchState . '"',
			'compare' 	=> 'LIKE',
		),
	),
   );
	} else if(isset($cat) && $searchState !='' && $searchSector =='' && $searchText !=''){
   $options = array(
   'post_type' => $atts['post_type'],
   's' => $searchText,
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		'relation' => 'AND',
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
		array(
			'key'	 	=> 'select_state',
			'value'	  	=> '"' . $searchState . '"',
			'compare' 	=> 'LIKE',
		),
	),
	'tax_query' => array(
        array(
            'taxonomy' => 'event-tax',
            'field' => 'slug',
            'terms' => $cat,
        ),
    ),
   );
	} else if(!isset($cat) && $searchState =='' && $searchSector !='' && $searchText ==''){
   $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		'relation' => 'AND',
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
		array(
			'key'	 	=> 'select_sector',
			'value'	  	=> '"' . $searchSector . '"',
			'compare' 	=> 'LIKE',
		),
	)
   );
	} else if(isset($cat) && $searchState =='' && $searchSector !='' && $searchText ==''){
   $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		'relation' => 'AND',
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
		array(
			'key'	 	=> 'select_sector',
			'value'	  	=> '"' . $searchSector . '"',
			'compare' 	=> 'LIKE',
		),
	),
	'tax_query' => array(
        array(
            'taxonomy' => 'event-tax',
            'field' => 'slug',
            'terms' => $cat,
        ),
    ),
   );
	} else if(!isset($cat) && $searchState =='' && $searchSector !='' && $searchText !=''){
   $options = array(
   'post_type' => $atts['post_type'],
   's' => $searchText,
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		'relation' => 'AND',
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
		array(
			'key'	 	=> 'select_sector',
			'value'	  	=> '"' . $searchSector . '"',
			'compare' 	=> 'LIKE',
		),
	)
   );
	} else if(isset($cat) && $searchState =='' && $searchSector !='' && $searchText !=''){
   $options = array(
   'post_type' => $atts['post_type'],
   's' => $searchText,
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		'relation' => 'AND',
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
		array(
			'key'	 	=> 'select_sector',
			'value'	  	=> '"' . $searchSector . '"',
			'compare' 	=> 'LIKE',
		),
	),
	'tax_query' => array(
        array(
            'taxonomy' => 'event-tax',
            'field' => 'slug',
            'terms' => $cat,
        ),
    ),
   );
	} else if(!isset($cat) && $searchState !='' && $searchSector !='' && $searchText ==''){
   $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		'relation' => 'AND',
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
		array(
			'key'	 	=> 'select_state',
			'value'	  	=> '"' . $searchState . '"',
			'compare' 	=> 'LIKE',
		),
		array(
			'key'	 	=> 'select_sector',
			'value'	  	=> '"' . $searchSector . '"',
			'compare' 	=> 'LIKE',
		),
	)
   );
	} else if(!isset($cat) && $searchState !='' && $searchSector !='' && $searchText !=''){
   $options = array(
   'post_type' => $atts['post_type'],
   's' => $searchText,
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		'relation' => 'AND',
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
		array(
			'key'	 	=> 'select_state',
			'value'	  	=> '"' . $searchState . '"',
			'compare' 	=> 'LIKE',
		),
		array(
			'key'	 	=> 'select_sector',
			'value'	  	=> '"' . $searchSector . '"',
			'compare' 	=> 'LIKE',
		),
	)
   );
	} else if(isset($cat) && $searchState !='' && $searchSector !='' && $searchText !=''){
   $options = array(
   'post_type' => $atts['post_type'],
   's' => $searchText,
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		'relation' => 'AND',
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
		array(
			'key'	 	=> 'select_state',
			'value'	  	=> '"' . $searchState . '"',
			'compare' 	=> 'LIKE',
		),
		array(
			'key'	 	=> 'select_sector',
			'value'	  	=> '"' . $searchSector . '"',
			'compare' 	=> 'LIKE',
		),
	),
	'tax_query' => array(
        array(
            'taxonomy' => 'event-tax',
            'field' => 'slug',
            'terms' => $cat,
        ),
    ),
   );
	} else if(isset($cat) && $searchState !='' && $searchSector !='' && $searchText ==''){
   $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		'relation' => 'AND',
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
		array(
			'key'	 	=> 'select_state',
			'value'	  	=> '"' . $searchState . '"',
			'compare' 	=> 'LIKE',
		),
		array(
			'key'	 	=> 'select_sector',
			'value'	  	=> '"' . $searchSector . '"',
			'compare' 	=> 'LIKE',
		),
	),
	'tax_query' => array(
        array(
            'taxonomy' => 'event-tax',
            'field' => 'slug',
            'terms' => $cat,
        ),
    ),
   );
	}
	else {
   $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date',
	'meta_type'			=> 'DATE',
   'meta_query'	=> array(
		array(
			'key'	 	=> 'event_date',
			'compare' 	=> '>=',
			'type'		=> 'DATETIME',
			'value'	  	=> $date_now,
		),
	),
   );
        
    
	}
   
   $class="col-xs-12";
   if($atts['no_of_grid']==1){
  $class="col-xs-12";   
   }else if($atts['no_of_grid']==2){
     $class="col-xs-12 col-md-6";
   }else if($atts['no_of_grid']==3){
     $class="col-xs-12 col-md-4";
   }else if($atts['no_of_grid']==4){
     $class="col-xs-12 col-md-3";
   }
   $query = new WP_Query( $options );
   if ( $query->have_posts() ) { 
    $classes = array('bgyellowBox', 'bgyellowDarkBox', 'bgyellowBox', 'bgyellowDarkBox', 'bgyellowBox', 'bgyellowDarkBox');
    ?>
<div class="event_listing">
<h2>Upcoming Events</h2>
<?php while ( $query->have_posts() ) : $query->the_post(); $class = $classes[$i++ % 6]; ?>
<div class="col-sm-4 col-xs-6">
<a href="<?php the_permalink(); ?>" style="color:#444344;">
            <div class="<?php echo $class; ?>" style="cursor:pointer;" onclick="window.location.href='<?php the_permalink(); ?>'">
                <h3 class="eventh3">
                    <?php 
	   $dateVar = strtotime(get_field('event_date'));
	   $dateVarto = strtotime(get_field('event_date_to'));
	   if ($dateVarto != ''){
	   $to_event = '- '. date("M d ", $dateVarto);
	   }else{
	   $to_event = '';
	   }
	   echo date("M d ", $dateVar) .$to_event.'<span class="event-date">'.date("Y", $dateVar).'</span>'; 
					
					?>
                    
                </h3>
				
				
                <span class="event-style-divider"></span> 
                <?php 
                    $trimtitle = get_the_title();
                    $shorttitle = wp_trim_words( $trimtitle, $num_words = 7, $more = '...' ); 
                ?>
                <p>
                    
                        <?php echo $shorttitle; ?>
                   
                </p>
            </div>
			 
        </div>
		</a>
<?php endwhile; ?>
</div>
<?php
    wp_reset_postdata();
   $myvariable = ob_get_clean();
   return $myvariable;
   } else {?>
   <div class="blank-search">
   <h3>No Events found.</h3> 
	<a class="go-back standard-button-class" href="<?php echo get_permalink(get_the_ID());?>">Go Back</a>
	</div>
   <?php }
    
    
}
add_shortcode( 'ministry_event_viewmore', 'ministryEventViewmore' );
/*
 * Archive Ajax Load More Posts Function  
 */
function archive_load_more_posts() {
  $post_numbers='';
    if(isset($_POST['post_num'])) {
        $post_numbers = $_POST['post_num'];
    } 
  $res=array();
  $events = get_posts(array('post_type' => 'event', 'posts_per_page' => $post_numbers)); 
  foreach ($events as $event) {
    echo '<div class="event-item wpb_animate_when_almost_visible wpb_fadeInLeft fadeInLeft wpb_start_animation animated"><div class="event-date"><div class="event-day">'.date("F d, ", strtotime($event->post_date)).'</div><div class="event-year">'.date("Y", strtotime($event->post_date)).'</div></div><div class="event-content"><h6 class="event-title"><a href="'.$event->guid.'" style="color:#444344;">'.$event->post_title.'</a></h6><div class="event-discription"><p>'.$event->post_content.'</p><a class="event-cat">Round Table</a></div></div></div>';
  }
}
add_action( 'wp_ajax_archive_load_more_posts', 'archive_load_more_posts' );
add_action( 'wp_ajax_nopriv_archive_load_more_posts', 'archive_load_more_posts' );
function mea_my_load_more_scripts() {
 
  global $wp_query; 
 
  // In most cases it is already included on the page and this line can be removed
  wp_enqueue_script('jquery');
 
  // register our main script but do not enqueue it yet
  wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery') );
 
  // now the most interesting part
  // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
  // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
  wp_localize_script( 'my_loadmore', 'mea_loadmore_params', array(
    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
    'posts' => serialize( $wp_query->query_vars ), // everything about your loop is here
    'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
    'max_page' => $wp_query->max_num_pages
  ) );
 
  wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'mea_my_load_more_scripts' );
function mea_loadmore_ajax_handler(){
 
  // prepare our arguments for the query
  $args = unserialize( stripslashes( $_POST['query'] ) );
  $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
  $args['post_status'] = 'publish';
  $args['post_type'] = array('post','event','trade_type','invest_type','india_type','publication_type');
 
  // it is always better to use WP_Query but not here
  query_posts( $args );
 
  if( have_posts() ) :
 
    // run the loop
    while( have_posts() ): the_post();
 
      // look into your theme code how the posts are inserted, but you can use your own HTML of course
      // do you remember? - my example is adapted for Twenty Seventeen theme
      //get_template_part( 'template-parts/post/content', get_post_format() );
      // for the test purposes comment the line above and uncomment the below one
      // the_title(); ?>
      <div class="search_wrap row">
      <div class="post_thumbnail col-sm-4 col-md-3">
      <?php if ( has_post_thumbnail() ) { ?>
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail('thumbnail'); ?>
          </a>
      <?php }
      else{ ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <img src="<?php echo site_url();?>/wp-content/uploads/2017/08/no_thumbnail.jpg">
          </a>
      <?php } ?>
      </div>
      <div class="content_wrap col-sm-8 col-md-9">
      <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
      <p class="content_entry">
      <?php 
        $the_content = get_the_content();
              $shortcode_tags = array('VC_COLUMN_INNTER');
        $values = array_values( $shortcode_tags );
        $exclude_codes  = implode( '|', $values );
        $the_content = preg_replace("/<img[^>]+\>/i", " ", $the_content);         
        $the_content = preg_replace( "~(?:\[/?)(?!(?:$exclude_codes))[^/\]]+/?\]~s", '', $the_content );
        echo substr($the_content,0,200);
      ?>
      </p>
      <div class="category">
        <?php 
              $args_term = array(
                  //default to current post
                  'post' => 0,
                  'before' => '',
                  //this is the default
                  'sep' => ' ',
                  'after' => '',
                  //this is the default
                  'template' => '%s: %l'
              );
              $terms = get_the_taxonomies( $post->ID, $args_term);
              if($terms['india-tax']){
                echo $terms['india-tax'];
              }elseif($terms['event-tax']){
                echo $terms['event-tax'];
              }elseif($terms['trade-tax']){
                echo $terms['trade-tax'];
              }elseif($terms['invest-tax']){
                echo $terms['invest-tax'];
              }elseif($terms['publication-tax']){
                echo $terms['publication-tax'];
              }else{
                echo $terms['category'];
              }
            ?>
      </div>
      </div>
    </div>
 
 
  <?php  endwhile;
 
  endif;
  die; // here we exit the script and even no wp_reset_query() required!
}
 

// retrieves the attachment ID from the file URL
function pippin_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}
 
 
add_action('wp_ajax_loadmore', 'mea_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'mea_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
/* Publication posts listing */
add_shortcode('publication_list', 'publicationList');
function publicationList($atts){
  ob_start();
  $pubSerText = $_GET['search-text'];
  $pubSerState = $_GET['state-filter'];
  $pubSerSector = $_GET['sector-filter'];
								
  $atts = shortcode_atts(
    array(
    'post_type' => 'no post',
    'bar' => 'default bar',
    'no_of_post' => 6,
    'no_of_grid' => 3,
    ), $atts, 'publication_list' );
  // Define query parameters based on attributes
  if($pubSerState !='' && $pubSerSector =='' && $pubSerText ==''){
	 $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'DESC',
   'meta_query'	=> array(
	   array(
				'key'	 	=> 'select_state_for_publication',
				'value'	  	=> '"' . $pubSerState . '"',
				'compare' 	=> 'LIKE',
			),
   ),
  );
	} else if($pubSerState =='' && $pubSerSector !='' && $pubSerText ==''){
	 $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'DESC',
	   'meta_query'	=> array(
	   array(
				'key'	 	=> 'select_sector_for_publication',
				'value'	  	=> '"' . $pubSerSector . '"',
				'compare' 	=> 'LIKE',
			),
   ),
  );
	
	} else if($pubSerState !='' && $pubSerSector !='' && $pubSerText ==''){
	 $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'DESC',
	   'meta_query'	=> array(
	   'relation' => 'AND',
	   array(
				'key'	 	=> 'select_state_for_publication',
				'value'	  	=> '"' . $pubSerState . '"',
				'compare' 	=> 'LIKE',
			),
		array(
				'key'	 	=> 'select_sector_for_publication',
				'value'	  	=> '"' . $pubSerSector . '"',
				'compare' 	=> 'LIKE',
			),
   ),
  );
	
	} else if($pubSerState =='' && $pubSerSector !='' && $pubSerText !=''){
	 $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'DESC',
   's' => $pubSerText,
	   'meta_query'	=> array(
	   array(
				'key'	 	=> 'select_sector_for_publication',
				'value'	  	=> '"' . $pubSerSector . '"',
				'compare' 	=> 'LIKE',
			),
   ),
  );
	
	}  else if($pubSerState !='' && $pubSerSector =='' && $pubSerText !=''){
	 $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'DESC',
   's' => $pubSerText,
	   'meta_query'	=> array(
	   array(
				'key'	 	=> 'select_state_for_publication',
				'value'	  	=> '"' . $pubSerState . '"',
				'compare' 	=> 'LIKE',
			),
   ),
  );
	
	} else if($pubSerState !='' && $pubSerSector !='' && $pubSerText !=''){
	 $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'DESC',
   's' => $pubSerText,
	   'meta_query'	=> array(
	   'relation' => 'AND',
	   array(
				'key'	 	=> 'select_state_for_publication',
				'value'	  	=> '"' . $pubSerState . '"',
				'compare' 	=> 'LIKE',
			),
		 array(
				'key'	 	=> 'select_sector_for_publication',
				'value'	  	=> '"' . $pubSerSector . '"',
				'compare' 	=> 'LIKE',
			),
   ),
  );
	
	} else if($pubSerState =='' && $pubSerSector =='' && $pubSerText !=''){
	 $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   'order'				=> 'DESC',
   's' => $pubSerText,
  );
	
	} else{
   $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['no_of_post'],
   );
   
//   $pubLists = new WP_Query();
//  $pubLists->query('post_type=publication_type&showposts=-1&post_status=publish');
	}
   $query = new WP_Query( $options );
   if ( $query->have_posts() ) {
    ?>
    <!-- <ul> -->
    <div class="publication_ii">
      <!-- <ul class="publication_listing"> -->
      <ul class="publication_listing">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <li><?php $pdfID = pippin_get_image_id(get_field('doc_pdf_file'));?>
          <div class="publication_ii_left">
			<?php if ( has_post_thumbnail() ) { ?>
                <?php the_post_thumbnail('thumbnail'); ?>
          <?php }
          else{ ?>
				<?php echo wp_get_attachment_image ( $pdfID, 'full' );?>
          <?php } ?>
         </div>
          <div class="publication_ii_right">
            <h4><?php echo get_the_title(); ?></h4>
            <p><?php the_excerpt(); ?></p>
            <?php 
              $args_term = array(
                  //default to current post
                  'post' => 0,
                  'before' => '',
                  //this is the default
                  'sep' => ' ',
                  'after' => '',
                  //this is the default
                  'template' => '<span class="hidden">%s:</span> %l'
              );
              $terms = get_the_taxonomies( $post->ID, $args_term);
            ?>
          </div>
		  <?php if(get_field('doc_pdf_file') !=''){?>
          <div class="publication_ii_new">
            <table border="0">
              <tr>
                <td><a href="javascript: w=window.open('<?php echo get_field('doc_pdf_file');?>'); w.print(); w.close();"><img src="<?php bloginfo('url');?>/wp-content/uploads/2017/09/002-printer-1.png" alt="print"/></a></td>
                <td><a target="_blank" href="<?php echo get_field('doc_pdf_file');?>"><img src="<?php bloginfo('url');?>/wp-content/uploads/2017/09/001-pdf-1.png" alt="print"/></a></td>
              </tr>
            </table>
          </div>
		  <?php }?>
        </li>
      <?php endwhile; ?>
      </ul>
    </div>
	<?php 
       $pubLists = new WP_Query();
  $pubLists->query('post_type=publication_type&showposts=-1&post_status=publish');
       if($pubLists->post_count > 3){?>
    <div class="publication_iii">
      <a id ="pub_loadmore" class="standard-button-class" href="#" maxpubs="<?php echo $pubLists->post_count;?>">View More</a>
    </div>
	<?php }?>
<?php
   wp_reset_postdata();} else {?>
	   <div class="blank-search">
			<h3>No Publications found.</h3> 
			<a class="go-back standard-button-class" href="<?php echo get_permalink(get_the_ID());?>">Go Back</a>
		</div>
   <?php }
   $myvariable = ob_get_clean();
   return $myvariable;
   
}
/* publication search form */
add_shortcode('publication_search_form','publicationSearchForm');
function publicationSearchForm(){ 
  ob_start(); 
  $actPubState = $_GET['state-filter'];
  $actPubSector = $_GET['sector-filter'];
  $actPubText = $_GET['search-text'];?>
  <div class="news_filter publication_i">
						<h3>Search Publication</h3>
						<p>Search for Publication on India's economic diplomacy</p>
						<form class="nSearch-form">
							<span class="search-field"><input type="text" name="search-text" id="searchText" placeholder="Search" value="<?php echo $actPubText;?>" />
									<button type="submit" class="search-submit"></button></span>
							<span class="search-field">
							<select name="state-filter" id="stateFilter" onchange="this.form.submit();">
								<option value="">Filter by State</option>
								<?php query_posts('post_type=state-post&showposts=-1&orderby=title&order=ASC');
									if(have_posts()):while(have_posts()):the_post();?>
									<option value="<?php echo get_the_ID();?>" <?php if($actPubState == get_the_ID()){echo 'selected';}?>><?php the_title();?></option>
									<?php endwhile; wp_reset_query(); endif;?>
							</select>
							</span>
							<span class="search-field">
							<select name="sector-filter" id="sectorFilter" onchange="this.form.submit();">
								<option value="">Filter by Sector</option>
								<?php query_posts('post_type=sector-post&showposts=-1&orderby=title&order=ASC');
									if(have_posts()):while(have_posts()):the_post();?>
									<option value="<?php echo get_post($post->ID)->post_name;?>" <?php if($actPubSector == get_the_ID()){echo 'selected';}?>><?php the_title();?></option>
								<?php endwhile; wp_reset_query(); endif;?>
							</select>
							</span>
						</form>
					</div>
<?php $myvariable = ob_get_clean();
   return $myvariable;
}
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


/**Include Custom Post Types**/
include 'inc/cpt-news.php';
include 'inc/cpt-mou-documents.php';
include 'inc/cpt-faqs.php';
include 'inc/cpt-sectors.php';
include 'inc/cpt-states.php';
include 'inc/custom-metabox.php';
include 'inc/function-shortcode.php';
include 'inc/custom-ajax-loadmore.php';


/* Events search form */
function eventSearchForm(){ 
  ob_start(); 
  $actCat = $_GET['cat'];
  $actState = $_GET['state-filter'];
  $actSector = $_GET['sector-filter'];
  $actText = $_GET['search-event'];?>
  <div class="event_filter">
						<h3>Search Events</h3>
						<p>Search upcoming events that Indibz organizes and supports in India and globally.</p>
						<form class="eventS-form">
							<span class="search-field"><a href="<?php echo get_permalink('721');?>" class="sfield-tab <?php if($actCat == ''){ echo 'active';}?>">All events</a></span>
							<span class="search-field"><a href="<?php echo get_permalink('721');?>?cat=india-events" class="sfield-tab <?php if($actCat == 'india-events'){ echo 'active';}?>">India events</a></span>
							<span class="search-field"><a href="<?php echo get_permalink('721');?>?cat=international-events" class="sfield-tab <?php if($actCat == 'international-events'){ echo 'active';}?>">International events</a>
									<input type="hidden" name="cat" value="<?php if($actCat == 'india-events'){ echo 'india-events'; } else if($actCat == 'international-events'){ echo 'international-events';} else {echo '';}?>" /></span>
							<span class="search-field"><input type="text" name="search-event" id="searchEvent" placeholder="Search" value="<?php echo $actText;?>" /><button type="submit" class="search-submit"></button></span>
							<?php if($actCat != 'international-events'){?>
							<span class="search-field">
							<select name="state-filter" id="filterState" onchange="this.form.submit()">
								<option value="">Filter by State</option>
								<?php query_posts('post_type=state-post&showposts=-1&orderby=title&order=ASC');
									if(have_posts()):while(have_posts()):the_post();?>
									<option value="<?php echo get_the_ID();?>" <?php if($actState == get_the_ID()){echo 'selected';}?>><?php the_title();?></option>
								<?php endwhile; wp_reset_query(); endif;?>
							</select>
							</span>
							<?php }?>
							<span class="search-field">
							<select name="sector-filter" id="filterSector" onchange="this.form.submit()">
								<option value="">Filter by Sector</option>
								<?php query_posts('post_type=sector-post&showposts=-1&orderby=title&order=ASC');
									if(have_posts()):while(have_posts()):the_post();?>
									<option value="<?php echo get_the_ID();?>" <?php if($actSector == get_the_ID()){echo 'selected';}?>><?php the_title();?></option>
								<?php endwhile; wp_reset_query(); endif;?>
							</select>
							</span>
						</form>
					</div>
<?php $myvariable = ob_get_clean();
   return $myvariable;
} 
add_shortcode('event_search_form','eventSearchForm');


/* Events search form */
function keyEventsLists(){ 
  ob_start();?> 
 <ul class="keyEvent-lists"> 
 <?php $args1 = array(
		'post_type' => 'event',
		'posts_per_page' => 3,
		'meta_query' => array(
			array(
			'key'     => 'key_events',
				'value'   => 'keyEvent',
				'compare' => 'LIKE',
				),
			),
			);
			$keyEvents = new WP_Query($args1);
		while($keyEvents->have_posts()):$keyEvents->the_post();?>
		
		<li>
			<p><a href="#"><?php the_title();?></a></p>
		</li>
		<?php endwhile; wp_reset_query();?>
  </ul>
<?php $myvariable = ob_get_clean();
   return $myvariable;
} 
add_shortcode('key_events_list','keyEventsLists');
?>

<?php
/* Video Slider Shortcode */
function ytVideoSliders(){ 
ob_start(); ?>
<?php if(have_rows('video_gallery')){ ?>
<div class="yt-videos">
<div class="heading_invest">
<h2>Videos</h2>
</div>
<ul id="videoSlider" class="video-slider owl-carousel owl-theme">
<?php while(have_rows('video_gallery')):the_row();
	$videoID = get_sub_field('youtube_video_id');?>
 	<li><a href="https://www.youtube.com/watch?v=<?php echo $videoID;?>" target="_blank"><img src="http://img.youtube.com/vi/<?php echo $videoID;?>/0.jpg" alt="" /></a></li>
<?php endwhile;?>
</ul>
</div>
<?php }
$myvariable = ob_get_clean();
   return $myvariable;
} 
add_shortcode('yt_video_slider','ytVideoSliders');
?>

<?php

/* Photos Slider Shortcode */
function photoSliders(){ 
ob_start(); 
if(have_rows('image_galleries')){?>
<div class="photoLists-slider">
<div class="heading_invest">
<h2>Photos</h2>
</div>
<div id="photoSlider2" class="photo-slider owl-carousel" data-slider-id="1">
<?php while(have_rows('image_galleries')):the_row();?>
    <div><a href="<?php the_sub_field('upload_image');?>" data-lightbox="example-1"><img src="<?php the_sub_field('upload_image');?>" alt="<?php the_sub_field('image_title');?>" /></a>
		<div class="active-text">
		<h3><?php the_sub_field('image_title');?></h3>
		<p><?php the_sub_field('gallery_image_desc');?></p>
		</div>
	</div>
<?php endwhile; wp_reset_query();?>
</div>

<div class="owl-thumbs" data-slider-id="1">
<?php $j=0; while(have_rows('image_galleries')):the_row();?>
    <button class="owl-thumb-item"><img src="<?php the_sub_field('upload_image');?>" alt="<?php the_sub_field('image_title');?>" /></button>
<?php $j++; endwhile; wp_reset_query();?>
</div>

</div>
<?php }
$myvariable = ob_get_clean();
   return $myvariable;
} 
add_shortcode('photo_slider','photoSliders');

// Swiss Commpanies In India Catogory News Shortcode
function swissCompanyIndia( $atts ) {
  ob_start(); ?>


<div class="opNews-list">
	<ul>
		<?php 
		$args32 = array(
			'post_type' => 'news-post',
			'posts_per_page' => 3,
			'tax_query' => array(
				array(
					'taxonomy' => 'news-tax',
					'field'    => 'term_id',
					'terms'    => '136',
					),
				),
				);
				$opNewsList = query_posts($args32);
				if(have_posts()):while(have_posts()):the_post();
				?>
				<li>
					<span class="opNews-img"><?php if(has_post_thumbnail()){the_post_thumbnail(array(260*250));}?></span>
					<div class="opNews-details">
						<h3><?php the_title();?></h3>
						<?php $opNewsDesc = get_post($post->ID)->post_content;?>
						<p><?php echo substr($opNewsDesc, 0, 60);?></p>
						<a class="learnMore" href="<?php the_permalink();?>">Learn More</a>
						</div>
				</li>
				<?php endwhile; wp_reset_query(); endif;?>
		</ul>
</div>
<?php $myvariable = ob_get_clean();
   return $myvariable;
   
}
add_shortcode( 'swiss_company_india', 'swissCompanyIndia' );


// Events Mail Form Shortcode
function eventMailForm( $atts ) {
  ob_start(); ?>
<h3>EVENT UPDATES</h3>
<form id="eventEmails" method="POST"><input class="alertinput" name="event_email" required="" type="email" placeholder="Enter email to get Event Updates" />
<button class="btn alertbtn">submit</button></form>
<div id="evFormSMsg"><?php echo $evFormSMsg;?></div>
<?php $myvariable = ob_get_clean();
   return $myvariable;
   
}
add_shortcode( 'event_mail_form', 'eventMailForm' );
