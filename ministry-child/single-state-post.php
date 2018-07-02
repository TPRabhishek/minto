<?php
/**
 * Single
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

get_header();
// Start the loop.

$stsID = $_GET['stsID'];
if ( have_posts() ):
?>
<div class="featured-news sector-bg" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>);">
			<div class="container">
			
				<div class="row">
					<div class="col-md-12">
						<h2 class="news_p_head"><?php the_title();?></h2>
					</div>	
				</div>
			</div>
		</div>
<div class="<?php echo esc_attr( vct_get_content_container_class() ); ?>">
	<div class="content-wrapper marT90">
		<div class="row">
			<div class="col-md-12">
				<div class="main-content sector-details hasSidebar">
					<div class="sdetails-left">
						<ul class="sub-menu">
							<li <?php if(!isset($stsID)){ echo 'class="active-sdetails"';}?>><a href="<?php if(isset($stsID)){ the_permalink();} else {echo 'javascript:void(0)';}?>">Introduction</a></li>
							<?php  if(have_rows('state_subtitle_content')){
								$k=1; while(have_rows('state_subtitle_content')):the_row();?>
							<li <?php if($stsID == $k){ echo 'class="active-sdetails"';}?>><a href="<?php if($stsID == $k){ echo 'javascript:void(0)';} else {echo get_permalink().'?stsID='.$k;}?>"><?php the_sub_field('sub_title');?></a></li>
							<?php $k++; endwhile; }?>
						</ul>
					</div>
					<div class="sdetails-right">
						<?php if(!isset($stsID)){?>
						<div class="sector-info state-info" id="introduction">
							<div class="sinfo-list">
								<ul>
								<?php if(get_field('chief_minister_name') !=''){?>
									<li><h6>Chief minister : </h6> <p><?php the_field('chief_minister_name');?></p></li>
								<?php }?>
								<?php if(get_field('governor_name') !=''){?>
									<li><h6>Governor : </h6> <p><?php the_field('governor_name');?></p></li>
								<?php }?>
								<?php if(get_field('capital') !=''){?>
									<li><h6>Capital : </h6> <p><?php the_field('capital');?></p></li>
								<?php }?>
								<?php if(get_field('largest_city') !=''){?>
									<li><h6>Largest city : </h6> <p><?php the_field('largest_city');?></p></li>
								<?php }?>
								<?php if(get_field('state_area') !=''){?>
									<li><h6>Area : </h6> <p><?php the_field('state_area');?></p></li>
								<?php }?>
								</ul>
								<?php
 								$state_pic_listing = get_post_meta( get_the_ID(), '_listing_image_id', true );
								 $state_pic = wp_get_attachment_image_src( $state_pic_listing, 'full' );
								echo	'<img src="'.$state_pic[0].'" />';
								?>
							</div>
							<?php while ( have_posts() ) :the_post();
							the_content();
							endwhile; wp_reset_query();?>
						</div>
						<?php } else {?>
							<div class="sector-info state-info">
								<?php if(have_rows('state_subtitle_content')){ $m=1;
								while(have_rows('state_subtitle_content')):the_row();
								if($stsID == $m){?>
								<h5 class="sec-title"><?php the_sub_field('sub_title');?></h5>
								<div class="sub-content"><p><?php the_sub_field('sub_content');?></p></div>
								<?php } $m++; endwhile; }?>
							</div>
						<?php }?>
					</div>
				</div><!--.main-content-->
				
				<?php if(have_rows(state_galleries)){ ?>
				<div class="sector-gallery">
				<h2 class="secTitle">Photos</h2>
				<div class="photoLists-slider">
					<div id="photoSlider2" class="photo-slider owl-carousel" data-slider-id="1">
					<?php while(have_rows('state_galleries')):the_row();?>
						<div><a href="<?php the_sub_field('gallery_image');?>" data-lightbox="example-1"><img src="<?php the_sub_field('gallery_image');?>" alt="<?php the_sub_field('gallery_image_title');?>" /></a>
							<div class="active-text">
							<h3><?php the_sub_field('gallery_image_title');?></h3>
							<p><?php the_sub_field('gallery_image_description');?></p>
							</div>
						</div>
					<?php endwhile; ?>
					</div>

					<div class="owl-thumbs" data-slider-id="1">
					<?php $j=0; while(have_rows('state_galleries')):the_row();?>
						<button class="owl-thumb-item"><img src="<?php the_sub_field('gallery_image');?>" alt="<?php the_sub_field('gallery_image_title');?>" /></button>
					<?php $j++; endwhile; ?>
					</div>
					
					</div>
				</div>
				<?php }?>
				
				<?php if(have_rows('state_youtube_video_id')){ ?>
				<div class="secYt-videos">
				<?php function get_youtube_title($ref) {
							$json = file_get_contents('http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $ref . '&format=json'); //get JSON video details
							$details = json_decode($json, true); //parse the JSON into an array
							return $details['title']; //return the video title
							}?>
						<div class="tradeAgree-videos sector-videos">
						<h2 class="heading_trade_half">Videos</h2>
							<ul id="videoSlider2" class="owl-carousel">
							<?php while(have_rows('state_youtube_video_id')):the_row();
								$videoID = get_sub_field('video_id');?>
								<li><a target="_blank" href="https://www.youtube.com/watch?v=<?php echo $videoID;?>"><img src="http://img.youtube.com/vi/<?php echo $videoID;?>/0.jpg"></a>
								<p><?php echo get_youtube_title($videoID);?></p></li>
							<?php endwhile;?>
							</ul>
						</div>
					</div>
				<?php }?>
				
				<?php 
				$postSlug = get_post_field( 'post_name', get_the_ID() );
				$args = array(
					'post_type' => 'news-post',
					'posts_per_page' => 5,
						'tax_query' => array(
							array(
								'taxonomy' => 'news_tag',
								'field'    => 'slug',
								'terms'    => $postSlug,
								),
							),
							);
					$taFaqList = query_posts($args);
					if(have_posts()):?>
				<div class="secNews-lists">
				<h2 class="secTitle">News</h2>
					<ul>
					<?php while(have_posts()):the_post();?>
					<li>
						<div class="secNews-details">
						<span class="secNews-desc">
							<?php $content_news = get_post($post->ID);
								  $content_news1 = $content_news->post_content;?>
								<a href="<?php the_permalink();?>"><h5><?php echo substr($content_news1, 0, 50);?>[...]</h5></a></span>
						<span class="secNews-date"><h4><?php 
							$newsDate = get_the_date();
							echo date('M d, Y', strtotime($newsDate));?></h4></span>
							<?php if(has_post_thumbnail()){?>
							<span class="secNews-img"><a href="<?php the_permalink();?>"><img width="255" height="204" src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php the_title();?>" /></a></span>
							<?php }?>
						</div>
					</li>
					<?php endwhile; wp_reset_query();?>
					</ul>
					
					<span class="view-all"><a href="<?php echo get_permalink('24');?>">View all</a></span>
				</div>
				<?php endif;?>
			</div>
		</div><!--.row-->
	</div><!--.content-wrapper-->
</div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->
<?php /*if ( comments_open() || get_comments_number() ) {
	comments_template();
}*/
// End of the loop.
endif;
get_footer();
