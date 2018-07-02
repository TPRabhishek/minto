/*
** Custom Ajax LoadMore Script
*/

jQuery.noConflict();

var siteUrl = 'http://localhost/indbiz';
var ajaxUrl = siteUrl+"/wp-admin/admin-ajax.php";

/** Success Story LoadMore Script **/
var page = 3; // What page we are on.
var ppp = 3; // Post per page	

    jQuery("#more_sstory").on("click",function($){ // When btn is pressed.
		var maxValue = jQuery(this).attr('maxsstory'); 
        jQuery("#more_sstory").attr("disabled",true); // Disable the button, temp.
        jQuery.post(ajaxUrl, {
            action:"more_sstory_ajax",
            offset: (page * ppp),
            ppp: ppp
        }).success(function(posts){

             jQuery(".ssNews-list ul").append(posts); // CHANGE THIS!
			 page++;
			 var total_post 	=	Math.floor(maxValue/ppp);   // 50 is total post
			 
				var extra_post  = Math.floor(maxValue%ppp); 
				
				if(extra_post > 0){
				  total_post = total_post +1;
				}
             if(page == total_post){
             	jQuery("#more_sstory").hide();
             }else{
             	jQuery("#more_sstory").attr("disabled",false);
             }
             
            
        });
		return false;
   });
   

/** News LoadMore Script **/
    var nPage = 2; // What page we are on.
    var nPp = 3; // Post per page

    jQuery("#more_gnNews").on("click",function($){ // When btn is pressed.
		var maxValue1 = jQuery(this).attr('maxnews');
        jQuery("#more_gnNews").attr("disabled",true); // Disable the button, temp.
        jQuery.post(ajaxUrl, {
            action:"more_gnNews_ajax",
            nOffset: (nPage * nPp),
            nPp: nPp
        }).success(function(nPosts){
			jQuery(".latNews-lists ul").append(nPosts); // CHANGE THIS!
            nPage++;
			var total_post1 	=	Math.floor(maxValue1/nPp);   // 50 is total post
			 
				var extra_post1  = Math.floor(maxValue1%nPp); 
				
				if(extra_post1 > 0){
				  total_post1 = total_post1 +1;
				}
				
             if(nPage == total_post1){
             	jQuery("#more_gnNews").attr("style", "display: none !important");
             }else{
             	jQuery("#more_gnNews").attr("disabled",false);
             }
        });
		return false;
   });
   

/** Publication Lists LoadMore Script **/
    var pbPage = 3; // What page we are on.
    var pbPp = 2; // Post per page

    jQuery("#pub_loadmore").on("click",function($){ // When btn is pressed.
		var maxValue2 = jQuery(this).attr('maxpubs');
        jQuery("#pub_loadmore").attr("disabled",true); // Disable the button, temp.
        jQuery.post(ajaxUrl, {
            action:"more_pub_ajax",
            pbOffset: (pbPage * pbPp),
            pbPp: pbPp
        }).success(function(pbPosts){
			jQuery(".publication_ii ul.publication_listing").append(pbPosts); // CHANGE THIS!
            pbPage++;
			var total_post2 	=	Math.floor(maxValue2/pbPp);   // 50 is total post
			 
				var extra_post2  = Math.floor(maxValue2%pbPp); 
				
				if(extra_post2 > 0){
				  total_post2 = total_post2 +1;
				}
				
             if(pbPage == total_post2){
             	jQuery("#pub_loadmore").attr("style", "display: none !important");
             }else{
             	jQuery("#pub_loadmore").attr("disabled",false);
             }
        });
		return false;
   });
   

/** In-Out Bound LoadMore Script **/
var iopage = 3; // What page we are on.
var ioppp = 4; // Post per page	

    jQuery("#more_ionews").on("click",function($){ // When btn is pressed.
		var maxValue3 = jQuery(this).attr('maxionews'); 
		var newsterm = jQuery(this).attr('newsterm');
        jQuery("#more_ionews").attr("disabled",true); // Disable the button, temp.
        jQuery.post(ajaxUrl, {
            action:"more_ionews_ajax",
            ioffset: (iopage * ioppp),
            ioppp: ioppp,
			newsTerm: newsterm,
        }).success(function(ioposts){

             jQuery(".inout-news").append(ioposts); // CHANGE THIS!
			 iopage++;
			 var total_post3 	=	Math.floor(maxValue3/ioppp);   // 50 is total post
			 
				var extra_post3  = Math.floor(maxValue3%ioppp); 
				
				if(extra_post3 > 0){
				  total_post3 = total_post3 +1;
				}
             if(page == total_post3){
             	jQuery("#more_ionews").hide();
             }else{
             	jQuery("#more_ionews").attr("disabled",false);
             }
             
            
        });
		return false;
   });
   
   
/** Investor Updates LoadMore Script **/
var iupage = 3; // What page we are on.
var iuppp = 3; // Post per page	

    jQuery("#more_intup").on("click",function($){ // When btn is pressed.
		var maxValue4 = jQuery(this).attr('maxintup'); 
        jQuery("#more_intup").attr("disabled",true); // Disable the button, temp.
        jQuery.post(ajaxUrl, {
            action:"more_intup_ajax",
            iuoffset: (iupage * iuppp),
            iuppp: iuppp,
        }).success(function(iuposts){

             jQuery(".inUpdate-list ul").append(iuposts); // CHANGE THIS!
			 iupage++;
			 var total_post4	=	Math.floor(maxValue4/iuppp);   // 50 is total post
			 
				var extra_post4  = Math.floor(maxValue4%iuppp); 
				
				if(extra_post4 > 0){
				  total_post4 = total_post4 +1;
				}
             if(iupage == total_post4){
             	jQuery("#more_intup").hide();
             }else{
             	jQuery("#more_intup").attr("disabled",false);
             }
             
            
        });
		return false;
   });
   
   
/** Opportunity News LoadMore Script **/
var oppage = 3; // What page we are on.
var opppp = 3; // Post per page	

    jQuery("#more_opnews").on("click",function($){ // When btn is pressed.
		var maxValue5 = jQuery(this).attr('maxopnews'); 
        jQuery("#more_opnews").attr("disabled",true); // Disable the button, temp.
        jQuery.post(ajaxUrl, {
            action:"more_opnews_ajax",
            opoffset: (oppage * opppp),
            opppp: opppp,
        }).success(function(opposts){

             jQuery(".opNews-list ul").append(opposts); // CHANGE THIS!
			 oppage++;
			 var total_post5	=	Math.floor(maxValue5/opppp);   // 50 is total post
			 
				var extra_post5  = Math.floor(maxValue5%opppp); 
				
				if(extra_post5 > 0){
				  total_post5 = total_post5 +1;
				}
             if(oppage == total_post5){
             	jQuery("#more_opnews").hide();
             }else{
             	jQuery("#more_opnews").attr("disabled",false);
             }
             
            
        });
		return false;
   });