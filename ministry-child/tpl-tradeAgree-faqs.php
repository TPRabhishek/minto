<?php
/**
 * Template Name: Trade Agreement FAQS
 */

get_header();
$pageID = get_the_ID();?>
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
								
								</li>
								<?php }?>
							</ul>
						</div>
						<div class="tinfo-right">
						<div class="page-info taFaq-lists">
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
															'terms'    => '124',
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
