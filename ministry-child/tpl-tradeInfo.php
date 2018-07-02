<?php
/**
 * Template Name: Trade Information
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
								endwhile; wp_reset_query(); endif;
								
								if($pageID == 1978){
								query_posts('post_type=tac-post&showposts=-1');
								if(have_posts()):?>
								<div class="country-lists">
									<ul>
										<?php while(have_posts()):the_post();?>
												<li>
													<?php if(get_field('country_flag') !=''){?><span class="cflag"><img src="<?php the_field('country_flag');?>" alt="<?php the_title();?>" /></span><?php }?>
													<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
												</li>
										<?php endwhile; wp_reset_query();?>
									</ul>
								</div>
								<?php endif; } ?>
						</div>
						
						<?php 
							$args6 = array(
									'sort_order' => 'desc',
									'sort_column' => 'post_date',
									'hierarchical' => 0,
									'exclude' => '',
									'include' => '',
									'meta_key' => '',
									'meta_value' => '',
									'authors' => '',
									'child_of' => $pageID,
									'parent' => $pageID,
									'exclude_tree' => '',
									'number' => '',
									'offset' => 0,
									'post_type' => 'page',
									'post_status' => 'publish'
								); 
								$gudSPages = get_pages($args6);
						
						if(count($gudSPages) !=''){?>
						<div class="step-lists gdEx-lists">
						<h5 class="sec-title">Step by step guide</h5>
							<ul>
								<?php foreach($gudSPages as $gudSPage){?>
										<li><a class="overlay" href="<?php echo get_permalink($gudSPage->ID);?>"></a>
										<h4 style="background-image:url(<?php echo get_field('guide_icon', $gudSPage->ID);?>);"><?php echo get_the_title($gudSPage->ID);?></h4>
											<div class="step-desc"><?php echo get_field('guide_listing_box_content',$gudSPage->ID);?></div>
										</li>
								<?php }?>
							</ul>
						</div>
						<?php } ?>
						
						
							<?php if(isset($ppPageId) && $ppPageId !=''){$childOf = $ppPageId;} else {$childOf = $pageID;}
								$args8 = array(
											'sort_order' => 'asc',
											'sort_column' => 'post_date',
											'hierarchical' => 1,
											'exclude' => '',
											'include' => '',
											'meta_key' => '',
											'meta_value' => '',
											'authors' => '',
											'child_of' => $childOf,
											'parent' => -1,
											'exclude_tree' => '',
											'number' => '',
											'offset' => 0,
											'post_type' => 'page',
											'post_status' => 'publish'
										); 
										$tradeguides = get_pages($args8);?>
						<?php
							 if($pageID == '2007'){?>
						
							<?php } ?>
							
						
						
							
						</div>	
						
						
						
						
						<?php if($pageID == '1978'){
							function get_youtube_title($ref) {
							$json = file_get_contents('http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $ref . '&format=json'); //get JSON video details
							$details = json_decode($json, true); //parse the JSON into an array
							return $details['title']; //return the video title
							}?>
						<div class="tradeAgree-videos">
						<h2 class="heading_trade_half">Videos</h2>
							<ul id="videoSlider2" class="owl-carousel">
								<li><a target="_blank" href="https://www.youtube.com/watch?v=XwJ3Pnl2oOs"><img src="http://img.youtube.com/vi/XwJ3Pnl2oOs/0.jpg"></a>
								<p><?php echo get_youtube_title('XwJ3Pnl2oOs');?></p></li>
								<li><a target="_blank" href="https://www.youtube.com/watch?v=XwJ3Pnl2oOs"><img src="http://img.youtube.com/vi/XwJ3Pnl2oOs/0.jpg"></a>
								<p><?php echo get_youtube_title('XwJ3Pnl2oOs');?></p></li>
								<li><a target="_blank" href="https://www.youtube.com/watch?v=XwJ3Pnl2oOs"><img src="http://img.youtube.com/vi/XwJ3Pnl2oOs/0.jpg"></a>
								<p><?php echo get_youtube_title('XwJ3Pnl2oOs');?></p></li>
								<li><a target="_blank" href="https://www.youtube.com/watch?v=XwJ3Pnl2oOs"><img src="http://img.youtube.com/vi/XwJ3Pnl2oOs/0.jpg"></a>
								<p><?php echo get_youtube_title('XwJ3Pnl2oOs');?></p></li>
							</ul>
						</div>
						<?php }?>
						
						<?php if($pageID ==2053){?>
							<div class="country-map"><div id="chartdiv" style="width:100%;height:500px;"></div></div>
						<?php }?>
						
					</div><!--.main-content-->
				</div><!--.<?php echo esc_html( vct_get_maincontent_block_class() ); ?>-->
			</div><!--.row-->
		</div><!--.content-wrapper-->
	</div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->
<?php get_footer();
