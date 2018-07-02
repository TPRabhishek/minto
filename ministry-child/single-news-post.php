<?php
/**
 * Single
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

get_header(); 
$newsID = get_the_ID();
$post_categories = get_the_terms($newsID, 'news_tag');
while ( have_posts() ) :
	the_post();
?>
<div class="content-wrapper marT90">
	<div class="container">
		<div class="row article_content">
			<?php  $id=get_the_ID(); ?>
			<div class="col-md-12 mainHeadingBox">
				<h1 class="mainHeading"><?php echo the_title(); ?></h1>
				<h3><?php echo get_field('news_subtitle');?></h3> 
				<p class="mainPara"><?php echo the_field('subtitle',$id); ?></p>
				<p class="mainDate"><?php echo the_date(); ?></p>
			</div>
		</div>  
	<div class="row topmainBox table_box">
		<?php  $sub_heading_1 = get_field('sub_heading_1', $id);
			$sub_heading_2 = get_field('sub_heading_2', $id);
			$sub_heading_3 = get_field('sub_heading_3', $id);
			$sub_heading_4 = get_field('sub_heading_4', $id);
		?>	
		<?php   if(!empty($sub_heading_1)){?>
		<div class="col-sm-3 borderPinkBlue col-xs-6"><?php echo $sub_heading_1; ?></div>
		<?php   }
		 if (!empty($sub_heading_2)) {?>
		<div class="col-sm-3 borderDarkBlue col-xs-6"><?php echo $sub_heading_2; ?></div>
		 <?php  }
		if (!empty($sub_heading_3)) {?>
		<div class="col-sm-3 borderDarkBlue col-xs-6"><?php echo $sub_heading_3; ?></div>
		<?php }else{}
		if (!empty($sub_heading_4)) {?>
		<div class="col-sm-3 borderlightBlue col-xs-6"><?php echo $sub_heading_4; ?></div>
		<?php  }?>
	</div>
	</div>				  
	
	<div class="row post_img_div">
									 <div class="col-md-12 divRelative">
									 <?php 
									 if ( has_post_thumbnail() ) {
									the_post_thumbnail('full', array('class' => 'img-responsive'));
							}
							else {
								echo '<img src="' . get_bloginfo( 'stylesheet_directory' ). '/images/brigeImg.png" class="img-responsive" />';
							}?>
									 <div class="divAbsolute">
									 <?php $value = get_field( "video_for_slider", $post->ID ); 

										if(!empty($value)){ ?>

											<iframe width="700" height="400"
											src="<?php echo $value; ?>">
											</iframe>  

									  <?php } the_content();?>
									  
									<div class="tag-lists"> 
									  <?php $posttags = get_the_terms(get_the_ID(), 'news_tag');;
										  if ($posttags) {
											//$array = [];
											foreach($posttags as $tag) {
											  $array[] = '<a href="'.get_tag_link($tag->term_id).'">' . $tag->name . '</a>';
											}
											echo $content .= implode(' ', $array);
										  }?> 
									</div>
									</div>
									
									 <div class="linkBox">
										 <div class="socailLink"> <a href="#"> <img src="<?php echo get_stylesheet_directory_uri();?>/images/iconShareSocail.png" ></a>
										 <div class="share_links">
										 
										  <a class="icon icon-facebook icon-replacement" href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
										  <a class="icon icon-twitter icon-replacement" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo get_permalink(); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
										  <a class="icon icon-google-plus icon-replacement" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
											 <a class="icon icon-linkedin icon-replacement" href="https://www.linkedin.com/cws/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
										 </div>
										 </div>
									   </div>
									   
									   <div class="related-post">
										<div class="relPost-inner">
										<?php $relatedTag = get_field('select_multiple_tags');?>
										<h3>Related Articles</h3>
										<?php $k =1;
										$args = array(
										'post_type' => 'news-post',
										'posts_per_page' => 3,
										'post__not_in' => array($newsID),
											'tax_query' => array(
												array(
													'taxonomy' => 'news_tag',
													'field'    => 'term_id',
													'terms'    => $relatedTag,
													),
												),
												);
											$otNewsList = query_posts($args);
											if(have_posts()):while(have_posts()):the_post();?>
										
										<div class="box <?php if($k%2 == 0){ echo 'bottom-green'; } else if($k%3==0){ echo 'bottom-green-dark';} else {echo 'bottom-blue';}?>">

										<a href="<?php the_permalink();?>"><?php echo substr(get_the_title($post->ID), 0, 50);?></a>
										<ul>
											<li><?php echo date('M d, Y', strtotime(get_the_date()))?> | <?php $posttags1 = get_the_terms($post->ID, 'news_tag');;
												//$array1 = [];
												$j =1;
												if ($posttags1) {
													foreach($posttags1 as $tag1) {
														if($j <=2 ){
														$array1[] = '<a href="'.get_tag_link($tag1->term_id).'">' . $tag1->name . '</a>';
														}
													$j++; }
													echo $content1 .= implode(', ', $array1);
											unset($content1); }?></li>
										</ul>
										</div>
										<?php $k++; endwhile; wp_reset_query(); endif;?>
										</div>
										</div>
									   
									 </div>
									 
									
								  </div>
		 		
	</div><!--.content-wrapper-->
<?php endwhile;
get_footer();
