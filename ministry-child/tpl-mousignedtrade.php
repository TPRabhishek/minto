<?php
/**
 * Template Name: MOU's Signed Trade
 */

get_header(); ?>
<?php	$pageID = get_the_ID();?>
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
					<div class="main-content trade-info">
						<div class="tinfo-left">
							<?php $args = array(
								'sort_order' => 'desc',
								'sort_column' => 'post_date',
								'hierarchical' => 1,
								'exclude' => '',
								'include' => '',
								'meta_key' => '',
								'meta_value' => '',
								'authors' => '',
								'child_of' => 22,
								'parent' => -1,
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
								<?php if(have_rows('guide_lists',$tsPage->ID)){?>
									<ul class="pGuide-list">
									<?php $i=0;
										while(have_rows('guide_lists',$tsPage->ID)):the_row();?>
										<li><a href="<?php echo get_permalink('1999').'?ppId='.$pageID.'&listID='.$i;?>"><?php the_sub_field('guide_title',$tsPage->ID);?></a></li>
								<?php $i++; endwhile;?>
									</ul>
								<?php }?>
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
						
						<?php if($pageID != '1978'){
							if(have_rows('guide_lists',get_the_ID())){?>
						
						<?php }}?>
						</div>	
						
						<?php if($pageID == '1978'){
							function get_youtube_title($ref) {
							$json = file_get_contents('http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $ref . '&format=json'); //get JSON video details
							$details = json_decode($json, true); //parse the JSON into an array
							return $details['title']; //return the video title
							}?>
						<div class="tradeAgree-videos">
						<h2 class="heading_trade_half">Videos</h2>
							<ul>
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
					</div><!--.main-content-->
				</div><!--.<?php echo esc_html( vct_get_maincontent_block_class() ); ?>-->
			</div><!--.row-->
		</div><!--.content-wrapper-->
	</div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->
<?php get_footer();
