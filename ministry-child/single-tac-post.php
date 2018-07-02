<?php
/**
 * Single
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

get_header();
$stsID = $_GET['stsID'];
$acID = $_GET['acID'];
$curPID = get_the_ID();
?>
<div class="featured-news trade-infoBg" style="background-image:url(<?php echo get_the_post_thumbnail_url('1978');?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="news_p_head"><?php echo get_the_title('1978');?></h2>
					</div>	
				</div>
			</div>
		</div>
<div class="<?php echo esc_attr( vct_get_content_container_class() ); ?>">
		<div class="content-wrapper trade">
			<div class="row">
				<div class="<?php echo esc_attr( vct_get_maincontent_block_class() ); ?>">
					<div class="main-content sector-details hasSidebar">
						<div class="sdetails-left">
						<ul class="sub-menu country-tabs">
							<li><a href="<?php echo get_permalink($acID);?>">Country Profile</a></li>
							<?php  if(have_rows('country_tabs_title_content', $acID)){
								$k=1; while(have_rows('country_tabs_title_content', $acID)):the_row();?>
							<li <?php if($stsID == $k){ echo 'class="active-sdetails"';}?>><a href="<?php if($stsID == $k){ echo 'javascript:void(0)';} else {echo get_permalink($acID).'?stsID='.$k;}?>"><?php the_sub_field('tab_title');?></a></li>
							<?php $k++; endwhile; wp_reset_query(); }?>
							<li <?php if(!isset($stsID) && $curPID == 3454){ echo 'class="active-sdetails"';}?>><a href="<?php if(isset($stsID) || $curPID != 3454){ echo get_permalink(3454).'?acID='.$acID;} else {echo 'javascript:void(0)';}?>">Agreements</a>
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
									if ( $query->have_posts() ) :?>
									<ul class="tac-list">
									<?php while( $query->have_posts() ) : $query->the_post();?>
										<li <?php if(!isset($stsID) && $curPID == $post->ID){ echo 'class="active-sdetails"';}?>><a href="<?php if(!isset($stsID) && $curPID == $post->ID){echo 'javascript:void(0)';}else { echo get_permalink(get_the_ID()).'?acID='.$acID;}?>"><?php the_title();?></a></li>
									<?php endwhile; wp_reset_query();?>
									</ul>
								<?php endif;?>
							</li>
						</ul>
					</div>
						<div class="sdetails-right">
						<div class="sector-info">
							<h5 class="sec-title"><?php the_title();?></h5>
							<?php if(have_posts()):while(have_posts()):the_post();
								the_content();
								endwhile; wp_reset_query(); endif;?>
						</div>
							
							<?php if(have_rows('pdf_lists')){?>
							<div class="mouDoc-lists cpdf-lists">
							<ul>
							<?php while(have_rows('pdf_lists')):the_row();?>
								<li>
									<div class="mou-data">
										<h5><?php the_sub_field('pdf_title');?></h5>
										<span class="months"><?php the_sub_field('month_duration');?></span>
									</div>
									<?php if(get_sub_field('pdf_file') !=''){?>
									<div class="mou-files">
										<a class="file-print" href="javascript: w=window.open('<?php echo get_sub_field('pdf_file');?>'); w.print(); w.close();"></a>
										<a class="pdf-file" target="blank" href="<?php echo get_sub_field('pdf_file');?>"></a>
									</div>
									<?php }?>
								</li>
							<?php endwhile; wp_reset_query();?>
							</ul>
							
							<span class="load-more"><a href="#"></a></span>
							</div>
							<?php }?>
						</div>
					</div><!--.main-content-->
				</div><!--.<?php echo esc_html( vct_get_maincontent_block_class() ); ?>-->
			</div><!--.row-->
		</div><!--.content-wrapper-->
	</div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->
<?php
get_footer();
