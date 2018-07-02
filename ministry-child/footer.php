<?php

/** 

* Footer 

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
<div class=""> 

	<footer class="bgHalfWhite"> 

	 	<div class="container">

          
          <div class="col-sm-3 col-xs-6">
<div class="investFooter">
<h5>Invest</h5>
<!-- <a href="#">Invest in India</a><a href="#"> Buy in India</a><a href="#">Study in India</a><a href="#">Consulate Websites</a> -->
<?php dynamic_sidebar('footer 1');?>

</div>
</div>
<div class="col-sm-3 col-xs-6">
<div class="tradeFooter">
<h5>Trade</h5>
<!-- <a href="#">For Exporters</a><a href="#"> Tourism</a><a href="#">Education</a> -->
<?php dynamic_sidebar('footer 2');?>

</div>
</div>
<div class="col-sm-6 col-xs-12 mobile_spacing_0">
<div class="stayConnectFooter">
<div class="socialIcon"><div class="socialIcon">
<a target="_blank" href="https://www.facebook.com/MEAIndBiz/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<a target="_blank" href="https://twitter.com/MEAIndbiz"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<a target="_blank" href="https://www.youtube.com/channel/UCUwbPOjxohsaGd0_43hVzZA/videos"><i class="fa fa-play" aria-hidden="true"></i></a>
<a target="_blank" href="https://www.instagram.com/MEAIndBiz/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
</div></div>
<div class="row tabeld_footer">
<div class="col-sm-6 padR0 col-xs-6">
<div class="bgWhiteFooter subscribe-text">
<h6>Stay<br/>
Connected</h6>
<form id="emailSubscribe" method="POST">
<input type="email" name="email_id" placeholder="Enter Email Id to Subscribe" required/>
<input type="submit" value="Submit" class="customBtn standard-button-class" />
</form>
<div id="submitMsg"><?php echo $submitMsg;?></div>
</div>
</div>
<div class="col-sm-6 padL0 col-xs-6" style="background-image: url('<?php bloginfo('url');?>/wp-content/uploads/2017/08/footerImage-1.jpg');"></div>
</div>
</div>
</div>

        </div> 

	 	<div class="container">

          <?php //dynamic_sidebar('footer 2');?>
<div class="col-md-3 footerLinks col-xs-6 mobile_clear">
<h6>News</h6>
<!-- <a href="#">Publications</a> <a href="#">Press Releases</a> <a href="#">Videos</a> <a href="#">News</a> -->
<?php dynamic_sidebar('Footer NEWS');?>
</div>
<div class="col-md-3 footerLinks col-xs-6">
<h6>Events</h6>
<!-- <a href="#">Outbound and Inbound Visits</a> <a href="#">Business Missions</a> <a href="#">Events</a> <a href="#">Job Opportunities</a>
 --><?php dynamic_sidebar('Footer EVENTS');?>
</div>
<div class="col-md-3 footerLinks col-xs-6">
<h6>Contact</h6>
<!-- <a href="#">Indian &amp; International Offices</a> <a href="#">Queries</a> <a href="#">Feedback</a> <a href="#">Job Opportunities</a> -->
<?php dynamic_sidebar('Footer Contact');?>

</div>
<div class="col-md-3 footerLinks col-xs-6">
<h6>About</h6>
<!-- <a href="#">The Ministry</a> <a href="#">Executive Staff</a> <a href="#">Services</a> -->
<?php dynamic_sidebar('Footer About');?>

</div>



        </div>
<div class="full-width-footer">
    <div class="container bottom">

        <?php //dynamic_sidebar('bottom_footer');?>
    
        <div class="col-md-12 policyLinkFooter"><span>© Content Owned by Ministry of External Affairs, Government of India.</span>
    
            <?php dynamic_sidebar('bottom_footer');?>
    
        </div>

    </div>
</div>
        

	</footer>

</div>

<?php wp_footer(); ?> 
<script>
var map = AmCharts.makeChart( "internationalworldmap", {

  "type": "map",
  "theme": "light",
    "hideCredits":true,
  "projection": "miller",
    //"clickMapObject":"false",
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
                description: "<?php //echo $country_link['name'] ;?>",
                urlTarget:"_self"
			},
            <?php }} ; ?>
            
		],
		
  },
  "areasSettings": {
    "autoZoom": false,
    "selectedColor": "#CC0000",
    "color": "#2699FB",
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
"hideCredits":true,
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
<script>
    /**Map State Urls**/

var map;
AmCharts.ready(function() {
map = new AmCharts.AmMap();
    map.balloon.color = "#000000";
	map.dragMap= false;
    map.hideCredits=true;
    var dataProvider = {
        mapVar: AmCharts.maps.indiaLow,
        getAreasFromMap:true,
			areas: [
                <?php
             $post= 18;
               
            if(have_rows('state_links_with_map', $post->ID)): while(have_rows('state_links_with_map', $post->ID)): the_row();
                 
                ?>
                {
			  id: "<?php the_sub_field('state_name'); ?>",
			  url: "<?php the_sub_field('state_url'); ?>"
			},
			<?php endwhile; endif; ?>
			],
	    };
	    map.dataProvider = dataProvider;
		    map.areasSettings = {
		        autoZoom: false,
				color: "#ffffff",
				outlineColor: "#797979",
				rollOverOutlineColor: "#797979",
				rollOverOutlineColor: "#000000",
			    rollOverColor: "#fb7bdf",
			    selectedColor: "#fb7bdf"
			    };

			    map.smallMap = new AmCharts.SmallMap();

			    map.write("mapdiv");

			});
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
<script>
(function() {
    // Global variables defined beloe
    var locales = ['<?php echo get_stylesheet_directory_uri();?>/images/preloader/image1.jpg', '<?php echo get_stylesheet_directory_uri();?>/images/preloader/image2.jpg', '<?php echo get_stylesheet_directory_uri();?>/images/preloader/image3.jpg', '<?php echo get_stylesheet_directory_uri();?>/images/preloader/image4.jpg', '<?php echo get_stylesheet_directory_uri();?>/images/preloader/image5.jpg', '<?php echo get_stylesheet_directory_uri();?>/images/preloader/image6.jpg', '<?php echo get_stylesheet_directory_uri();?>/images/preloader/image7.jpg', '<?php echo get_stylesheet_directory_uri();?>/images/preloader/image8.jpg', '<?php echo get_stylesheet_directory_uri();?>/images/preloader/image9.jpg', '<?php echo get_stylesheet_directory_uri();?>/images/preloader/image10.jpg', '<?php echo get_stylesheet_directory_uri();?>/images/preloader/image11.jpg', '<?php echo get_stylesheet_directory_uri();?>/images/preloader/image12.jpg'],
        steps = locales.length, // numbers of images to be included in animation
        animationDuration = 1000, // time in miliseconds
        redirectisOn = true, // set false to stop redirecting.
        redirectURL = '<?php //echo esc_url( home_url() ); ?>'

    /**
    * Redirect
    * @function redirectToLanding
    */
    function redirectToLanding() {
        if (redirectisOn) {
            window.location.href = redirectURL;
        }
    }
jQuery(".loader-wrapper, #skipintro").on('click', function(){
    
                window.location.replace("<?php echo esc_url( home_url() ); ?>");
            }); 
    /**
    * Animate images
    * @function animator
    */
    function animator() {
        var prev = 0,
            current = 0,
            images = document.querySelectorAll('.loaderimg');

        if (locales.length) {
            
            // show first item
            images[prev].className += ' active';
            current = prev + 1; // next image
                
            // animate rest of the items after desired sec interval
            var aniTimer = window.setInterval(function() {

                // hide previous image
                images[prev].className = 'loaderimg';
                // animate next images
                images[current].className += ' active';
                    
                // navigate after animation is done
                if (current == locales.length - 1) {
                    
                    clearInterval(aniTimer);
                   
                    document.getElementById("gone").className = "mystyle";
                    //redirectToLanding();
                }
                    
                prev = current;
                current = prev + 1;

            }, animationDuration);

        }
       
    };
 
    /**
    * Get random images from the locales list
    * @function init
    */
    function init() {
        var loadWrapper = document.querySelector('.loader-wrapper'),
            loaded = 0;

       // document.body.onclick = redirectToLanding;


        // iterate over filtered image array
        locales.forEach(function(item, index) {
            var img = new Image();
                img.src = item;
                img.setAttribute('class', 'loaderimg');

                img.onload = function() {
                    loadWrapper.appendChild(img);
                    loaded++;

                    // play
                    if (loaded === steps) {
                        window.setTimeout(function() {
                            animator();
                        }, 100);
                    }
                }
        });
    };

    // caller
    init();

})();

</script>
		
<style>

#topcontrol{z-index:999;}

</style>

<?php get_search_form(); ?>

</body> 

</html>