<?php
/**
 * Template Name: International Trade
 */

get_header();
 $pageID = get_the_ID();
$ppPageId = wp_get_post_parent_id( $post_ID );?>
<div class="featured-news trade-infoBg" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="news_p_head"><?php the_title();?></h2>
					</div>	
				</div>
			</div>
		</div>
	<div class="<?php echo esc_attr( vct_get_content_container_class() ); ?>">
		<div class="content-wrapper trade">
			<div class="row">
				<div class="<?php echo esc_attr( vct_get_maincontent_block_class() ); ?>">
					<div class="main-content trade-info hasSidebar">
						<div class="tinfo-left">
							<?php $args = array(
								'sort_order' => 'desc',
								'sort_column' => 'post_date',
								'hierarchical' => 0,
								'exclude' => '',
								'include' => '',
								'meta_key' => '',
								'meta_value' => '',
								'authors' => '',
								'child_of' => 22,
								'parent' => 22,
								'exclude_tree' => '',
								'number' => '',
								'offset' => 0,
								'post_type' => 'page',
								'post_status' => 'publish'
							); 
							$tsPages = get_pages($args); 
							?>
							
							<ul class="sub-pages">
								<?php foreach($tsPages as $tsPage){ ?>
								<li <?php if($pageID == $tsPage->ID){ echo 'class="active-tsPage"';}?>>
								<a href="<?php if($pageID == $tsPage->ID){ echo 'javascript:void(0)';} else {echo get_permalink($tsPage->ID);}?>"><?php echo $tsPage->post_title;?></a>
								<?php 
									if($tsPage->ID == 1978 && $pageID == 1978){
										$args3 = query_posts('post_type=tac-post&showposts=-1');
										if(count($args3) !=''){?>
									<ul class="pGuide-list">
									<?php 
										if(have_posts()):while(have_posts()):the_post();?>
										<li <?php if($pageID == $post->ID){ echo 'class="active-list"';}?>><a href="<?php if($pageID == $post->ID){ echo 'javascript:void(0)';} else {echo get_permalink($post->ID);}?>"><?php the_title();?></a></li>
										<?php endwhile; wp_reset_query(); endif;?>
									</ul>
									
										<?php } } 
									else if($tsPage->ID == 2571 && $pageID == 2571){
										$args4 = query_posts('post_type=msc-post&showposts=-1');
										if(count($args4) !=''){?>
									<ul class="pGuide-list">
									<?php 
										if(have_posts()):while(have_posts()):the_post();?>
										<li <?php if($pageID == $post->ID){ echo 'class="active-list"';}?>><a href="<?php if($pageID == $post->ID){ echo 'javascript:void(0)';} else {echo get_permalink($post->ID);}?>"><?php the_title();?></a></li>
										<?php endwhile; wp_reset_query();endif;?>
									</ul>
										<?php }} else {
									$args5 = array(
									'sort_order' => 'desc',
									'sort_column' => 'post_date',
									'hierarchical' => 0,
									'exclude' => '',
									'include' => '',
									'meta_key' => '',
									'meta_value' => '',
									'authors' => '',
									'child_of' => $tsPage->ID,
									'parent' => $tsPage->ID,
									'exclude_tree' => '',
									'number' => '',
									'offset' => 0,
									'post_type' => 'page',
									'post_status' => 'publish'
								); 
								$tsSubPages = get_pages($args5);
								
								
								
								if(count($tsSubPages) != '' && $tsPage->ID == $pageID || $tsPage->ID == $ppPageId && $tsPage->ID){?>
									<ul class="pGuide-list">
									<?php 
										foreach($tsSubPages as $tsSubPage){?>
										<li <?php if($pageID == $tsSubPage->ID){ echo 'class="active-list"';}?>><a href="<?php if($pageID == $tsSubPage->ID){ echo 'javascript:void(0)';} else {echo get_permalink($tsSubPage->ID);}?>"><?php echo $tsSubPage->post_title;?></a></li>
										<?php  }?>
									</ul>
								<?php } }?>
								</li>
								<?php }?>
							</ul>
						</div>
						<div class="tinfo-right">
						<div class="page-info">
							<h5 class="sec-title"><?php the_title();?></h5>
							<?php if(have_posts()):while(have_posts()):the_post();
								the_content();
								endwhile; wp_reset_query(); endif;?>
						</div>
						</div>	
						
					<div class="worldMap-sec">
						<div class="dropDown-sec">
							<form>
								<label>Select individual country</label>
								<select id="countrypage">
								
									<option value="">Select</option>
                                   <?php
								  $args= array(
                                            'post_type'=> 'country-post',
                                            'orderby'=> 'title',
                                            //'meta_key'=>'repeatable_fields',
                                            'order' => 'ASC',
									  		'posts_per_page'=> -1
                                        );
                                    $query = new WP_Query($args); 
                                    while( $query->have_posts() ):$query->the_post(); ?>
                                    <option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
									
                                        <?php endwhile; wp_reset_postdata(); ?>
								</select>

							</form>
						</div>
					</div>
						<div class="country-map">
							<div id="internationalworldmap"></div>
						</div>
						<?php if(have_rows('youtube_ids_lists')){ ?>
				<div class="secYt-videos">
				<?php function get_youtube_title($ref) {
							$json = file_get_contents('http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $ref . '&format=json'); //get JSON video details
							$details = json_decode($json, true); //parse the JSON into an array
							return $details['title']; //return the video title
							}?>
						<div class="tradeAgree-videos sector-videos">
						<h2 class="heading_trade_half">Videos</h2>
							<ul id="videoSlider2" class="owl-carousel">
							<?php while(have_rows('youtube_ids_lists')):the_row();
								$videoID = get_sub_field('video_id');?>
								<li><a target="_blank" href="https://www.youtube.com/watch?v=<?php echo $videoID;?>"><img src="http://img.youtube.com/vi/<?php echo $videoID;?>/0.jpg"></a>
								<p><?php echo get_youtube_title($videoID);?></p></li>
							<?php endwhile;?>
							</ul>
						</div>
					</div>
				<?php }?>
						
						
						
					</div><!--.main-content-->
				</div><!--.<?php echo esc_html( vct_get_maincontent_block_class() ); ?>-->
			</div><!--.row-->
		</div><!--.content-wrapper-->
	</div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->

 <script>
    jQuery(function(){
      // bind change event to select
     jQuery('#countrypage').on('change', function () {
          var url = jQuery(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>


<?php get_footer();


