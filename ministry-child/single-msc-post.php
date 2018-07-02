<?php
/**
 * Single
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

get_header();
$pageID = get_the_ID();
?>
<div class="featured-news trade-infoBg" style="background-image:url(<?php echo get_the_post_thumbnail_url('2571');?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="news_p_head"><?php echo get_the_title('2571');?></h2>
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
								<?php if($tsPage->ID == 2571){
									query_posts('post_type=msc-post&showposts=-1');?>
									<ul class="pGuide-list">
									<?php 
										if(have_posts()):while(have_posts()):the_post();?>
										<li <?php if($pageID == $post->ID){ echo 'class="active-list"';}?>><a href="<?php if($pageID == $post->ID){ echo 'javascript:void(0)';} else {echo get_permalink($post->ID);}?>"><?php the_title();?></a></li>
										<?php endwhile; wp_reset_query(); endif;?>
									</ul>
								<?php }?>
								</li>
								<?php }?>
							</ul>
						</div>
						<div class="tinfo-right">
						<div class="page-info cdetails">
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
							<?php endwhile;?>
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
