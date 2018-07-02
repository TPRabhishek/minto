<?php
/**
 * Template Name: International Network & Faqs & Indbiz Help
 */

get_header();
$pageID = get_the_ID();
$ppPageId = wp_get_post_parent_id( $post_ID );
$ppPageIdTop = wp_get_post_parent_id( $ppPageId );
?>
<div class="featured-news trade-infoBg" style="background-image:url(<?php if(isset($ppPageIdTop) && $ppPageIdTop !=''){echo get_the_post_thumbnail_url($ppPageId);} else {echo get_the_post_thumbnail_url();}?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="news_p_head uppercase"><?php if(isset($ppPageIdTop) && $ppPageIdTop !=''){ echo get_the_title($ppPageId);} else {the_title();}?></h2>
					</div>	
				</div>
			</div>
		</div>
	<div class="<?php echo esc_attr( vct_get_content_container_class() ); ?>">
		<div class="content-wrapper trade">
			<div class="row">
				<div class="<?php echo esc_attr( vct_get_maincontent_block_class() ); ?>">
					<div class="main-content intNetwork trade-info hasSidebar">
						<?php if(isset($ppPageIdTop) && $ppPageIdTop !=''){$childOf = $ppPageId;} else {$childOf = $pageID;}
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
										$gudSPages = get_pages($args8);?>
					
						<div class="intn-left">
							<ul class="sub-pages">
								<li class="<?php if($pageID == 2035){ echo 'active' ;}?>"><a href="<?php if($pageID == 2035){echo 'javascript:void(0)';} else { echo get_permalink('2035'); }?>">Buy From India</a></li>
								<li class="<?php if($pageID == 2291){ echo 'active' ;}?>"><a href="<?php if($pageID == 2291){echo 'javascript:void(0)';} else { echo get_permalink('2291'); }?>">Why Invest In India</a></li>
								<li class="<?php if($pageID == 2294 ){ echo 'active' ;}?>"><a href="<?php if($pageID == 2294 ){echo 'javascript:void(0)';} else { echo get_permalink('2294'); }?>">Guide to Investing</a>
									<?php if(count($gudSPages) !='' || $ppPageIdTop !=''){?>
									<ul class="pGuide-list">
									<?php
										foreach($gudSPages as $gudSPage){?>
										<li <?php if($pageID == $gudSPage->ID){ echo 'class="active"';}?>><a href="<?php if($pageID == $gudSPage->ID){ echo 'javascript:void(0)';} else {echo get_permalink($gudSPage->ID);}?>"><?php echo $gudSPage->post_title;?></a></li>
									<?php }?>
									</ul>
								<?php }?>
								</li>
								<li class="<?php if($pageID == 2357){ echo 'active' ;}?>"><a href="<?php if($pageID == 2357){echo 'javascript:void(0)';} else { echo get_permalink('2357'); }?>">Trade Agreements</a></li>
								<li class="<?php if($pageID == 2064){ echo 'active' ;}?>"><a href="<?php if($pageID == 2064){echo 'javascript:void(0)';} else { echo get_permalink('2064'); }?>">Faqs</a></li>								
							</ul>
						</div>
						<div class="intn-right tinfo-right">
						<?php
							if(have_posts()): while(have_posts()):the_post();
							$pageContent = get_post($pageID)->post_content;
						if(isset($pageContent) && $pageContent !=''){?>
						<div class="page-info">
							<?php 
								the_content();
								?>
						</div>
						<?php } endwhile; wp_reset_query(); endif;?>
						
						<?php if(have_rows('agreements_mous_documents', $pageID)){?>
						<div class="mousignedtrade-lists">
							<ul>
							<?php while(have_rows('agreements_mous_documents', $pageID)):the_row();?>
								<li>
									<div class="mou-data">
										<h5><?php the_sub_field('documents_title', $pageID);?></h5>
										<span class="months"><?php echo get_sub_field('month_duration', $pageID);?></span>
									</div>
									<?php if(get_sub_field('doc_pdf', $pageID) !=''){?>
									<div class="mou-files">
										<a class="file-print" href="javascript: w=window.open('<?php echo get_sub_field('doc_pdf', $pageID);?>'); w.print(); w.close();"></a>
										<a class="pdf-file" target="blank" href="<?php echo get_sub_field('doc_pdf', $pageID);?>"></a>
									</div>
									<?php }?>
								</li>
							<?php endwhile;?>
							</ul>
							
							<span class="load-more"><a href="#"></a></span>
						</div>
						<?php }?>
						
						<?php /*if($pageID == 2053){
							if(have_rows('websites_details')){?>
						<div class="int-sites">
						<h5 class="sec-title">International Websites</h5>
							<ul>
							<?php while(have_rows('websites_details')):the_row('websites_details');?>
								<li><a target="_blank" href="<?php the_sub_field('site_url');?>"><?php the_sub_field('site_name');?></a></li>
							<?php endwhile;?>
							</ul>
						</div>
						<?php } } */
						if($pageID == 2064){?>
							<div class="page-info taFaq-lists invest-faqs">
							<h5 class="sec-title">FAQs</h5>
							<ol>
							<?php $k=1;
							$args = array(
													'post_type' => 'faq-post',
													'posts_per_page' => -1,
													'tax_query' => array(
														array(
															'taxonomy' => 'faq-tax',
															'field'    => 'term_id',
															'terms'    => '123',
														),
													),
												);
									$taFaqList = query_posts($args);
							if(have_posts()):while(have_posts()):the_post();?>
								<li class="<?php if($k==1){echo 'active-faq';}?>"><p><strong><?php the_title();?></strong></p><a class="faq-toggle" href="#"></a>
									<div class="faq-desc"><?php the_content();?></div>
								</li>
								<?php $k++; endwhile; wp_reset_query(); endif;?>
							</ol>
						</div>
						<?php }?>
						
						<?php if(count($gudSPages) !='' && $ppPageIdTop == ''){?>
						<div class="step-lists">
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
							
						</div>
						
					</div><!--.main-content-->
				</div><!--.<?php echo esc_html( vct_get_maincontent_block_class() ); ?>-->
			</div><!--.row-->
		</div><!--.content-wrapper-->
	</div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->
	
<script>
jQuery(document).ready(function(){
	jQuery('.taFaq-lists ol li a.faq-toggle').click(function(e){
	jQuery(this).parent('li').siblings('li').removeClass('active-faq', 2000);
	jQuery(this).parent('li').toggleClass('active-faq', 2000);
	return false;
});
});
</script>
<?php get_footer();
