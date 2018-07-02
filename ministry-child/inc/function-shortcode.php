<?php
/*

======================================================================
SHORTCODE FOR EVENT HIGHLIGHTER
======================================================================

*/
function highlightevent() { 
    ob_start(); 
     
    $args= array(
        'post_type'=> 'event',
        'post_per_page'=> 3,
        'meta_key' => '_event_highlight_value_key',
        'meta_value' => 1
        
    );
        $query = new WP_Query($args); 
            while( $query->have_posts() ):$query->the_post(); 
            $data .= '<h6><a href="'.esc_url(get_permalink()).'" class="event-date-link">'; 
                
            $data .= get_the_title();
            $data .= '<span class="event-date-span">['.get_the_date().']</span>';
           $data .= '</a></h6>';  
            $data .='<style>
                .event-date-link, a.event-date-link:hover {
                font-size: 14px;
                color: #000000;
                }
                span.event-date-span {
                display: block;
                font-size: 11px;
                }
            </style>';
        endwhile; wp_reset_postdata(); 
   
    return $data; 
 } 
add_shortcode('highlightevents','highlightevent');

/*

======================================================================
EXCHANGE RATE HOME PAGE
======================================================================

*/
function exchange_rate() { 
   // ob_start(); 
     
    
             //$post= 2244;
               
            if(have_rows('exchange_rate', 2244)): while(have_rows('exchange_rate', 2244)): the_row();
                 
               
      $data .='<div class="txt atrament-web-font">';
      $data .= get_sub_field('foreign_currency');
    $data .='- INR <span class="orange_rate">';
    $data .= get_sub_field('indian_currency');
    $data .='<span class="count"></span></span></div>';
    //$data .= apply_filters('the_content', get_sub_field('foreign_currency'));
   
    endwhile; endif; 
    return $data; 
 } 
add_shortcode('exchangerate','exchange_rate');

/*

======================================================================
SHORTCODE FOR EVENT ALERT
======================================================================

*/
function Eventalert() { 
    ob_start(); 
     
    $args= array(
        'post_type'=> 'event',
        'post_per_page'=> 3,
        'meta_key' => '_event_alert_value_key',
        'meta_value' => 1
        
    );
        $query = new WP_Query($args); 
            while( $query->have_posts() ):$query->the_post(); 
            $data .= '<marquee><a href="'.esc_url(get_permalink()).'" class="event-date-link">'; 
                
            $data .= get_the_title();
            $data .= '<span class="event-date-span">['.get_the_date().']</span>';
            $data .= '</a></marquee>'; 
            $data .='<style>
                .event-date-link, a.event-date-link:hover {
                font-size: 14px;
                color: #000000;
                }
                span.event-date-span {
                display: block;
                font-size: 11px;
                }
            </style>';
        endwhile; wp_reset_postdata(); 
   
    return $data; 
 } 
add_shortcode('alertevents','Eventalert');

/*

======================================================================
SHORTCODE FOR START UP INDIA HIGHLIGHTER
======================================================================

*/
function highlightstartupindia($atts) { 
    ob_start(); 
     

    $date_now1 = date('Y-m-d H:i:s');
    $atts = shortcode_atts(
    array(
        'post_type' => 'start-up-india',
        'bar' => 'default bar',
    ), $atts, 'highlightsui' );
    // Define query parameters based on attributes
    $options = array(
        'post_type' => $atts['post_type'],
        'posts_per_page' => 4,
		'order'				=> 'ASC',
		//'orderby'			=> 'meta_value',
		'meta_key'			=> 'event_date',
		//'meta_type'			=> 'DATE',
//		'meta_query'	=> array(
//			array(
//				'key'	 	=> 'event_date',
//				'compare' 	=> '>=',
//				'type'		=> 'DATETIME',
//				'value'	  	=> $date_now1,
//			),
//		),
    );
     			
					
        $query = new WP_Query($options); 
            while( $query->have_posts() ):$query->the_post(); 
    $dateVar = strtotime(get_field('event_date'));
	   $dateVarto = strtotime(get_field('event_date_to'));
    
	   if ($dateVarto != ''){
	   $to_event = '- '. date("M d ", $dateVarto);
	   }else{
	   $to_event = '';
	   }
            $data .= '<h6><a href="'.esc_url(get_permalink()).'" class="sui-date-link">'; 
                
            $data .= get_the_title();
           // $data .= '<span class="event-date-span">['.get_the_date().']</span>';
            $data .= '</a><span class="eventspan"> '; 
           $data .= date("M d ", $dateVar) .$to_event.date("Y", $dateVar) ;
            
            $data .='</span></h6>';
            $data .='<style>
                
            </style>';
        endwhile; wp_reset_postdata(); 
   
    return $data; 
 } 
add_shortcode('highlightsui','highlightstartupindia');


/*

======================================================================
SHORTCODE FOR EVENT HIGHLIGHTER
======================================================================

*/
function highlightke_func($atts) { 
    ob_start(); 
     

    $date_now1 = date('Y-m-d H:i:s');
    $keyeve = get_field('key_events');
    
    $atts = shortcode_atts(
    array(
        'post_type' => 'event',
        'bar' => 'default bar',
    ), $atts, 'highlightke' );
    // Define query parameters based on attributes
    $options = array(
        'post_type' => $atts['post_type'],
        'posts_per_page' => 4,
		'order'				=> 'ASC',
		'orderby'			=> 'meta_value',
		'meta_key'			=> 'key_events',
		//'meta_type'			=> 'DATE',
		'meta_query'	=> array(
			array(
				'key'	 	=> 'key_events',
				'compare' 	=> '==',
				//'type'		=> 'DATETIME',
				'value'	  	=> 1
			),
		),
    );		
		
            
        			
        $query = new WP_Query($options); 
    //if(get_field('key_events')=='keyEvent'){
            while( $query->have_posts() ):$query->the_post(); 
    $dateVar = strtotime(get_field('event_date'));
	   $dateVarto = strtotime(get_field('event_date_to'));
    
	   if ($dateVarto != ''){
	   $to_event = '- '. date("M d ", $dateVarto);
	   }else{
	   $to_event = '';
	   }
            $data .= '<h6><a href="'.esc_url(get_permalink()).'" class="sui-date-link">'; 
                
            $data .= get_the_title();
            //$data .= get_field('key_events').kkkkkkkkk;
           // $data .= '<span class="event-date-span">['.get_the_date().']</span>';
            $data .= '</a><span class="eventspan"> '; 
           $data .= date("M d ", $dateVar) .$to_event.date("Y", $dateVar) ;
            
            $data .='</span></h6>';
            $data .='<style>
                
            </style>';
        endwhile; wp_reset_postdata(); 
   //}
    return $data; 
    
 } 
add_shortcode('highlightke','highlightke_func');


/*

======================================================================
SHORTCODE FOR HOME START UP INDIA LATEST POST LINKED
======================================================================

*/
function startupindialatestpost() { 
    ob_start(); 
     
    $args= array(
        'post_type'=> 'start-up-india',
        'post_per_page'=> 1
        
    );
        $query = new WP_Query($args); 
            while( $query->have_posts() ):$query->the_post(); 
            $data ='<a href="'.esc_url(get_permalink()).'"><p>Startup Hub</p></a>';   
           
        endwhile; wp_reset_postdata(); 
   
    return $data; 
 } 
add_shortcode('suilatestpost','startupindialatestpost');

/*

======================================================================
FEATURED START UP SLIDER
======================================================================

*/
function featuredstartupslider( ) {
ob_start();
   $args= array(
        'post_type'=> 'featured-start-up',
        'post_per_page'=> -1
        
    );
        $query = new WP_Query($args); ?>
		<ul id="featStartup" class="featured-startup owl-carousel owl-theme">
           <?php while( $query->have_posts() ):$query->the_post(); ?>
               
           <li>
			 <span class="featS-img"><?php if(has_post_thumbnail()){the_post_thumbnail();}?></span>
			 <div class="featS-desc">
				 <div class="featS-inner">
					<h3 class="feat-titile"><?php the_title();?></h3>
					<div class="fdesc"><?php the_content();?></div>
				 </div>
			 </div>
		   </li>
        <?php endwhile; wp_reset_postdata(); 
   
    $myvariable = ob_get_clean();
   return $myvariable; 
}
add_shortcode( 'featuredstartup', 'featuredstartupslider' );




/*

======================================================================
MOU'S DOCUMENT SHORTCODE CATEGORIZED BY COUNTRY
======================================================================

*/
function moudocbycountry($atts ) {
	 ob_start();
  $atts = shortcode_atts(
    array(
      'post_type' => 'no foo',
      'bar' => 'default bar',
      'post_per_page' =>'no_of_page',
      'category_slug' =>'',
    ), $atts, 'moubycountryname' );
   
   $options = array(
   'post_type' => $atts['post_type'],
   'posts_per_page' => $atts['post_per_page'],
		'tax_query' => array(
			array(
				'taxonomy' => 'mou-tax',
				'field'    => 'slug',
				'terms'    => $atts['category_slug'],
				),
			),
   );
   $query = new WP_Query( $options );
  ?> 
<div class="mousignedtrade-lists">
	<ul>
		
		<?php 
	if($query->have_posts()):while($query->have_posts()):$query->the_post();?>
		<li>
			<div class="mou-data">
				<h5><?php the_title();?></h5>
				<span class="months"><?php echo get_field('month_duration');?></span>
			</div>
			<?php if(get_field('doc_pdf') !=''){?>
			<div class="mou-files">
				<a class="file-print" href="javascript: w=window.open('<?php echo get_field('doc_pdf');?>'); w.print(); w.close();"></a>
				<a class="pdf-file" target="blank" href="<?php echo get_field('doc_pdf');?>"></a>
			</div>
			<?php }?>
		</li>
		<?php endwhile; wp_reset_query(); endif;?>
	</ul>
							
							<span class="load-more"><a href="#"></a></span>
						</div>

<?php
}
add_shortcode( 'moudoc_by_country', 'moudocbycountry' );


/*

======================================================================
PAST EVENTS
======================================================================

*/
function pastevent_func( $atts ) {
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
			'compare' 	=> '<=',
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
			'compare' 	=> '<=',
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
			'compare' 	=> '<=',
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
			'compare' 	=> '<=',
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
			'compare' 	=> '<=',
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
			'compare' 	=> '<=',
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
			'compare' 	=> '<=',
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
			'compare' 	=> '<=',
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
			'compare' 	=> '<=',
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
			'compare' 	=> '<=',
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
			'compare' 	=> '<=',
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
			'compare' 	=> '<=',
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
			'compare' 	=> '<=',
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
			'compare' 	=> '<=',
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
			'compare' 	=> '<=',
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
<h2>Past Events</h2>
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
                    </a>
                </p>
            </div>
</a>
        </div>
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
add_shortcode( 'pastevent', 'pastevent_func' );

/*

======================================================================
CREATE MAIL LIST MENU
======================================================================

*/

add_action( 'admin_menu', 'allmails' );
function allmails() {
	add_menu_page( 'Mail List', 'Mail List', 'manage_options', 'my-mails', 'allmails_list' );
}
function allmails_list() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap" style="background:#ffffff;padding:15px;overflow:hidden">';
   
	 global $wpdb;
$retrieve_data = $wpdb->get_results( "SELECT * FROM `mea_event_emails` ORDER BY created_at DESC" );
    $retrieve_data1 = $wpdb->get_results( "SELECT * FROM `mea_footer_emails` ORDER BY created_at DESC" );
?>
<div style="width:40%; float:left;">
<h3>Event Alerts Mails</h3>
<ul>
<?php
foreach ($retrieve_data as $retrieved_data){ ?>
<li><?php echo $retrieved_data->email_id;?></li>
<?php 
}
?>
</ul>
            </div>
            <div style="width:40%; float:left;">
            <h3>Stay Connected Mails</h3>
<ul>
<?php
foreach ($retrieve_data1 as $retrieved_data1){ ?>
<li><?php echo $retrieved_data1->email_id;?></li>
<?php 
}
?>
</ul>
            </div>
<?php
	echo '</div>';
}
