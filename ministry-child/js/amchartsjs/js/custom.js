jQuery(document).ready(function(){
    var hash = window.location.hash;
	var withoutHash = window.location.href;
	var hashID = "." + window.location.hash.substring(1);

	jQuery('#filters > li > div > a').removeClass('current');
	//jQuery('.tab-content > .tab-pane').removeClass('current');
	jQuery('#filters > li > div > a[href^="'+hash+'"]').addClass('current');
	//jQuery('.tab-content > '+hash+'').addClass('current');
	if(hash){ 
		jQuery('html,body').animate({scrollTop: 100}, 1000);
	}
    if(hash=='#soi'){ 
		jQuery('html,body').animate({scrollTop: 800}, 1000);
	}

	var $container = jQuery('.grid');
    $container.isotope({
        filter: hashID,
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
        
       
    });
 

    jQuery('.portfolio-filter > ul > li > div > a').on('click', function(){
        jQuery('.portfolio-filter > ul > li > div > a.current').removeClass('current');
        jQuery(this).addClass('current');
 		jQuery('html,body').animate({scrollTop: 100}, 1000);
        var selector = jQuery(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 2000,
                easing: 'linear',
                queue: false
            }
         });
         return false;
    }); 
	
	
	
	
	
    
});

jQuery(window).load(function() {

var $container1 = jQuery('.grid1');
    $container1.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
        
       
    });
var $container = jQuery('.grid');
    $container.isotope({
        filter: hashID,
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
        
       
    });


});

	jQuery( window ).resize(function() {

var $container1 = jQuery('.grid1');
    $container1.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
        
       
    });



});

jQuery(window).load(function(){
//alert(111);
    var $container = jQuery('.portfolioContainer');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
 
    jQuery('.portfolioFilter > ul > li > div > a').click(function(){
//alert(111);
        jQuery('.portfolioFilter > ul > li > div > a.current').removeClass('current');
        jQuery(this).addClass('current');
 
        var selector = jQuery(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
         return false;
    }); 
});

