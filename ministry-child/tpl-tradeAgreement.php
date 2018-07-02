<?php
/**
 * Template Name: Trade Agreements
 */

get_header();
// Start the loop.

$stsID = $_GET['stsID'];
$acID = $_GET['acID'];
$curPID = get_the_ID();?>

<?php if ( have_posts() ):
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
						<ul class="sub-menu country-tabs">
							<li <?php if(!isset($stsID) && $curPID != 3454){ echo 'class="active-sdetails"';}?>><a href="<?php if(isset($stsID) || $curPID == 3454){ echo get_permalink($acID);} else {echo 'javascript:void(0)';}?>">Country Profile</a></li>
							<?php  if(have_rows('country_tabs_title_content', $acID)){
								$k=1; while(have_rows('country_tabs_title_content', $acID)):the_row();?>
							<li <?php if($stsID == $k){ echo 'class="active-sdetails"';}?>><a href="<?php if($stsID == $k){ echo 'javascript:void(0)';} else {echo get_permalink($acID).'?stsID='.$k;}?>"><?php the_sub_field('tab_title');?></a></li>
							<?php $k++; endwhile; }?>
							<li <?php if(!isset($stsID) && $curPID == 3454){ echo 'class="active-sdetails"';}?>><a href="<?php if(isset($stsID) || $curPID != 3454){ echo get_permalink(3454);} else {echo 'javascript:void(0)';}?>">Agreements</a>
								<?php $args = array(
								   'post_type' => 'tac-post',
								   'posts_per_page' => -1,
								   'order'				=> 'ASC',
									'orderby'			=> 'title',
									'meta_key'			=> 'select_country_for_document',
								    'meta_query'	=> array(
										array(
											'key'	 	=> 'select_country_for_document',
											'compare' 	=> 'LIKE',
											'value'	  	=> $acID,
										),
									),
								   );
								   $query = new WP_Query( $args );
									if ( $query->have_posts() ) {?>
									<ul class="tac-list">
									<?php while( $query->have_posts() ) : $query->the_post();?>
										<li><a href="<?php echo get_permalink().'?acID='.$acID;?>"><?php the_title();?></a></li>
									<?php endwhile; wp_reset_query();?>
									</ul>
								<?php } else {?>
									<ul class="tac-list">
										<li>No Agreements For This Country</li>
									</ul>
								<?php }?>
							</li>
						</ul>
					</div>
					<div class="sdetails-right">
						<div class="sector-info" id="introduction">
							<h5 class="sec-title"><?php the_title();?></h5>
							<?php while ( have_posts() ) :the_post();
							the_content();
							endwhile; wp_reset_query();?>
						</div>
					</div>
				</div><!--.main-content-->
				
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
?>