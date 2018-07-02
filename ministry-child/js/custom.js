jQuery(document).ready(function($) {
	
jQuery('#menu-item-243,.close_btn').click(function(e){
	jQuery('form.search-form#pop_up_search').fadeToggle();
	jQuery('form.search-form#pop_up_search input[type=search]').focus();
	e.preventDefault();
});

jQuery('#ipubCarousel').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    dots: false,
    responsive:{
        0:{
            items:1
        },
        480:{
            items:2
        },
		600:{
            items:3
        }
    }
});

jQuery('#videoSlider').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    dots: false,
    responsive:{
        0:{
            items:1
        },
        480:{
            items:2
        }
    }
});


jQuery('#otbNews').owlCarousel({
    margin: 0,
    responsiveClass: true,
    smartSpeed: 500,
    dots: false,
    loop: true,
	nav: true,
    responsive: {
        0: {
            items: 1,
        },
        500: {
            items: 1,
        },
        768: {
            items: 1,
        }
    } 
});

jQuery('#photoSlider2').owlCarousel({
    thumbs: true,
    thumbsPrerendered: true,
	margin: 0,
    responsiveClass: true,
	thumbContainerClass: 'owl-thumbs',
	thumbItemClass: 'owl-thumb-item',
    smartSpeed: 500,
    dots: false,
    loop: true,
	nav: true,
    responsive: {
        0: {
            items: 1,
        },
        500: {
            items: 1,
        },
        768: {
            items: 1,
        }
    }
  });

  jQuery('#videoSlider2').owlCarousel({
    loop: $('.owl-carousel .item').size() > 3 ? true:false,
    nav:true,
	margin:20,
    dots: false,
    responsive:{
        0:{
            items:1
        },
        767:{
            items:4
        }
    }
});


jQuery('#featStartup').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    items: 1,
});

jQuery('body.single-state-post ul#menu-main-menu li#menu-item-28').addClass('current-page-ancestor');
jQuery('body.single-sector-post ul#menu-main-menu li#menu-item-28').addClass('current-page-ancestor');
jQuery('body.single-news-post ul#menu-main-menu li#menu-item-31').addClass('current-page-ancestor');
jQuery('body.single-country-post ul#menu-main-menu li#menu-item-30').addClass('current-page-ancestor');

jQuery('div.linkBox .socailLink > a').click(function(){
	return false;
});
});

jQuery(window).load(function(){
	hfixFunc();
	postFull();
//	jQuery('.count').each(function () {
//	   jQuery(this).prop('Counter',0).animate({
//	        Counter: jQuery(this).text()
//	    }, {
//	        duration: 4000,
//	        easing: 'swing',
//	        step: function (now) {
//	            jQuery(this).text(Math.ceil(now));
//	        }
//	    });
//	});
//    

var bannerHeight = jQuery('body .featured-news').height();
if ( jQuery('body').find('.main-content').hasClass('hasSidebar') ) { 
			jQuery('body,html').animate({
				scrollTop: bannerHeight-20
			}, 800);
			return false;
	};    
});

//    on scroll
jQuery(document).ready(function() {
var section = jQuery('#start_counter');
    jQuery(document).bind('scroll', function(ev) {
        var scrollOffset = jQuery(document).scrollTop();
       var containerOffset = section.offset().top - window.innerHeight;
		

        if (scrollOffset > containerOffset) {
            startCounter();
            // unbind event not to load scrolsl again
            jQuery(document).unbind('scroll');
        }
    });


jQuery('a.showLink').click(function(){
	jQuery(this).removeClass('show');
	jQuery(this).addClass('hide');
	jQuery('.show-hide').slideDown('slow');
	setTimeout(function(){
		jQuery('a.hideLink').addClass('show');
	}, 500);
	return false;
});
jQuery('a.hideLink').click(function(){
	jQuery(this).removeClass('show');
	jQuery(this).addClass('hide');
	jQuery('.show-hide').slideUp('slow');
	setTimeout(function(){
		jQuery('a.showLink').addClass('show');
	}, 500);
	return false;
});

});

//        counter function
   function startCounter(){
     jQuery('.count').each(function () {
	   jQuery(this).prop('Counter',0).animate({
	        Counter: jQuery(this).text()
	    }, {
	        duration: 4000,
	        easing: 'swing',
	        step: function (now) {
	            jQuery(this).text(Math.ceil(now));
	        }
	    });
	});  
   }     
  
    
//    on scroll end
        
jQuery(window).resize(function(){
	setTimeout(function(){
		hfixFunc();
	},100);
	postFull();
});
function hfixFunc(){
	if (jQuery(window).width()>767) {
		var hFix = 0;
		//jQuery('.gray_small.greyBox').each(function(){
			//jQuery(this).css('min-height','auto');
			//if (jQuery(this).outerHeight()>hFix) {
			//	hFix = jQuery(this).outerHeight();
			//}
		//});
		//jQuery('.gray_small.greyBox').each(function(){
			//jQuery(this).css('min-height',hFix);
		//});
		setTimeout(function(){
			hFix = hFix * 2;
			hFix = hFix +20;
			jQuery('.greyBox.gray_big').each(function(){
				jQuery(this).css('min-height',hFix);
			});
		},100);
		var hFix2 = 0;
		jQuery('.news_section .padAll.bgWhite').each(function(){
			jQuery(this).css('min-height','auto');
			if (jQuery(this).outerHeight()>hFix2) {
				hFix2 = jQuery(this).outerHeight();
			}
		});
		jQuery('.news_section .padAll.bgWhite').each(function(){
			jQuery(this).css('min-height',hFix2);
		});
	}
	else{
		var hFix = 0;
		jQuery('.productBox .vc_col-sm-3').each(function(){
			jQuery(this).find('.gray_small.greyBox').each(function(){
				if (jQuery(this).outerHeight()>hFix) {
					hFix = jQuery(this).outerHeight();
				}
			});
			jQuery(this).find('.gray_small.greyBox').each(function(){
				jQuery(this).css('min-height',hFix);
			});
			hFix = 0;
		});
		jQuery('.news_section .padAll.bgWhite').each(function(){
			jQuery(this).css('min-height','auto');
		});
		jQuery('.greyBox.gray_big').css('min-height','auto');
	}
}
function postFull(){
	// post image div width set
	jQuery('.post_img_div').width(jQuery(window).width());
}