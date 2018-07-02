<?php

/** 

* Footer1 

* * @package WordPress 

* @subpackage Visual Composer Starter 

* @since Visual Composer Starter 1.0 

*/

global $wpdb;
$submitMsg = '';
$evFormSMsg = '';
if(isset($_POST['email_id']) && !empty($_POST['email_id'])){
$emailId = $_POST['email_id'];

$results = count($wpdb->get_results( "SELECT id FROM `mea_footer_emails` WHERE `email_id` = '".$emailId."'" )); 

if($results >=1){
	$submitMsg = 'This Email ID Already exist!';
} else {
$wpdb->insert('mea_footer_emails', array(
    'email_id' => $emailId,
));
$submitMsg = 'Your Email ID is successfully subscribed!';
}
?>
<script type="text/javascript">
  jQuery(document).ready(function(){
	  jQuery('html, body').animate({
        scrollTop: jQuery("form#emailSubscribe").offset().top
    }, 2000);
  });
</script>
<?php }


if(isset($_POST['event_email']) && !empty($_POST['event_email'])){
$emailId1 = $_POST['event_email'];

$results1 = count($wpdb->get_results( "SELECT id FROM `mea_event_emails` WHERE `email_id` = '".$emailId1."'" )); 

if($results1 >=1){?>
		<script type="text/javascript">
		  jQuery(document).ready(function(){
			  jQuery('#evFormSMsg').text('This Email ID Already exist!');
			  jQuery('html, body').animate({
				scrollTop: jQuery("form#eventEmails").offset().top - 200
			}, 2000);
		  });
		</script>
	<?php 
} else {
$wpdb->insert('mea_event_emails', array(
    'email_id' => $emailId1,
));
?>
		<script type="text/javascript">
		  jQuery(document).ready(function(){
			  jQuery('#evFormSMsg').text('Your Email ID is successfully subscribed!');
			  jQuery('html, body').animate({
				scrollTop: jQuery("form#eventEmails").offset().top - 200
			}, 2000);
		  });
		</script>
	<?php 
}
}?>

<style type="text/css">
	.bgHalfWhite li {
    list-style: none;
    margin-left: 0px !important;
}
.bgHalfWhite ul{
    padding: 0px !important;
}
</style>


<?php wp_footer(); ?> 
<script>
var map = AmCharts.makeChart( "internationalworldmap", {

  "type": "map",
  "theme": "light",
  "projection": "miller",

  "dataProvider": {
    "map": "worldLow",
    "getAreasFromMap": true,
	  areas: [
            <?php
            $country_links = get_post_meta(get_the_ID(), 'repeatable_fields', true); 
                            if( !empty( $country_links ) ){
                                foreach( $country_links as $country_link ){
                                    ?>
            {
                id: "<?php echo $country_link['select'] ;?>",
                url: "<?php echo home_url().'/country-post/'.$country_link['url'] ;?>",
                description: " <?php echo $country_link['name'] ;?>",
                urlTarget:"_self"
			},
            <?php }} ; ?>
            
		],
		
  },
  "areasSettings": {
    "autoZoom": false,
    "selectedColor": "#CC0000"
  },
  "smallMap": {},
  "export": {
    "enabled": true,
    "position": "bottom-right"
  }
} );
	
</script>
<script>
    /**Map Country Urls**/

var map = AmCharts.makeChart( "chartdiv", {

  "type": "map",
  "theme": "light",
  "projection": "miller",

  "dataProvider": {
    "map": "worldIndiaLow",
    "getAreasFromMap": true,
		areas: [
            <?php
             $post= 2053;

            if(have_rows('websites_details', $post->ID)): while(have_rows('websites_details', $post->ID)): the_row(); ?>
            {
			  id: "<?php the_sub_field('select_country'); ?>",
			  url: "<?php the_sub_field('site_url'); ?>",
			  urlTarget:"_blank"
			},
		<?php endwhile; endif; ?>
        ],
  },
  "areasSettings": {
    "autoZoom": false,
    "selectedColor": "#CC0000"
  },
  "smallMap": {},
  "export": {
    "enabled": true,
    "position": "bottom-right"
  }
} );
</script>

<!-- jQuery -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

     <script>

    jQuery(window).load(function(){

        jQuery(".hameid-loader-overlay").fadeOut(500);

    });

</script> -->

<!-- Bootstrap Core JavaScript -->

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/lightbox.min.css" />

<script src="<?php echo get_stylesheet_directory_uri();?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/js/owl.carousel2.thumbs.js"></script>

<script src="<?php // echo get_stylesheet_directory_uri();?>/js/ammap.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/js/indiaLow.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/js/worldIndiaLow.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/js/light.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/js/lightbox.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/js/mapStateUrls.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/js/mapCountryUrls.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/js/custom-ajax-script.js" type="text/javascript"></script>

<!-- Script to Activate the Carousel -->

<script>
jQuery.noConflict();

jQuery('.carousel').carousel({

    interval: 5000 //changes the speed

})

// makes sure the whole site is loaded

</script>

<script src="https://use.typekit.net/zmy7edy.js"></script>



<script>try{Typekit.load({ async: true });}catch(e){}</script>

<script type="text/javascript">

  function searchDisplay(){

  jQuery(document).ready(function($){

    jQuery('.search-trigger').click(function(){

      jQuery(this).find('i').toggleClass('search-close','fa-search');

      jQuery('.search-dropdown').animate({

        height: 'toggle',

        opacity: 'toggle'

      });

    });

  });

}

</script>




<script>

  jQuery(document).ready(function() {

    jQuery('.owl-carousel').owlCarousel({

      loop: true,

      margin: 10,

      responsiveClass: true,

      responsive: {

        0: {

          items: 1,

          nav: true

        },

        600: {

          items: 3,

          nav: false

        },

        1000: {

          items: 2,

          nav: true,

          loop: true,

          margin: 0

        }

      }

    })

  });





  jQuery(function($){

  $('.mea_loadmore').click(function(){

 

    var button = $(this),

        data = {

      'action': 'loadmore',

      'query': mea_loadmore_params.posts, // that's how we get params from wp_localize_script() function

      'page' : mea_loadmore_params.current_page

    };

 

    $.ajax({

      url : mea_loadmore_params.ajaxurl, // AJAX handler

      data : data,

      type : 'POST',

      beforeSend : function ( xhr ) {

        button.text('Loading...'); // change the button text, you can also add a preloader image

      },

      success : function( data ){

        if( data ) { 

          button.text( 'More posts' ); // insert new posts

          $('.archive').append(data);

          mea_loadmore_params.current_page++;

 

          if ( mea_loadmore_params.current_page == mea_loadmore_params.max_page ) 

            button.remove(); // if last page, remove the button

        } else {

          button.remove(); // if no data, remove the button as well

        }

      }

    });

  });



});



jQuery(document).ready(function(){

  jQuery('#myDiv').delay(4000).fadeOut(500);

  fixFunc();

});

jQuery(window).scroll(function(){

  fixFunc();

});

function fixFunc(){

  if (jQuery(window).scrollTop()>0) {

    if (!jQuery('.navbar').hasClass('navbar-fixed-top')) {

      jQuery('.navbar').addClass('navbar-fixed-top');

    }

  }

  else{

    if (jQuery('.navbar').hasClass('navbar-fixed-top')) {

      jQuery('.navbar').removeClass('navbar-fixed-top');

    }

    

  }

}


jQuery(document).ready(function(){ 
	if(window.location.href=='http://indbiz-the-practice.in/staging/india/state-post/'){
		window.location.href = 'http://indbiz-the-practice.in/staging/state-post/';
	}
});
</script>

		
<style>

#topcontrol{z-index:999;}

</style>

<?php //get_search_form(); ?>

</body> 

</html>