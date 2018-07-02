<?php
/**
 * Template Name: Opportunities&Success Story&Investor Updates
 */

get_header(); 
$pageID = get_the_ID();?>
	<div class="<?php echo esc_attr( vct_get_content_container_class() ); ?>">
		<div class="content-wrapper trade">
			<div class="row">
				<div class="<?php echo esc_attr( vct_get_maincontent_block_class() ); ?>">
					<div class="main-content">
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'page' );
						endwhile; // End the loop.
						?>
					</div><!--.main-content-->
					<?php if($pageID == 2092){?>
					<div class="opNews-list">
						<ul>
						<?php 
						$allOpList = array(
							'post_type' => 'news-post',
							'posts_per_page' => -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'news-tax',
									'field'    => 'term_id',
									'terms'    => '126',
									),
									),
								);
							$allOpLists = new WP_Query();
								$allOpLists->query($allOpList);
						
						$args = array(
							'post_type' => 'news-post',
							'posts_per_page' => 9,
							'tax_query' => array(
								array(
									'taxonomy' => 'news-tax',
									'field'    => 'term_id',
									'terms'    => '126',
									),
									),
								);
							$opNewsList = query_posts($args);
							if(have_posts()):while(have_posts()):the_post();
						?>
							<li>
								<span class="opNews-img"><?php if(has_post_thumbnail()){the_post_thumbnail(array(260*250));}?></span>
								<div class="opNews-details">
									<h3><?php echo substr(get_the_title(), 0, 27).'...';?></h3>
									<?php $opNewsDesc = get_post($post->ID)->post_content;?>
									<p><?php echo substr($opNewsDesc, 0, 100).'...';?></p>
									<a class="learnMore" href="<?php the_permalink();?>">Learn More</a>
								</div>
							</li>
						<?php endwhile; wp_reset_query(); endif;?>
						</ul>
						<?php if($allOpLists->post_count > 9){?><span class="load-more"><a id="more_opnews"  href="#" maxopnews="<?php echo $allOpLists->post_count;?>"></a></span><?php }?>
					</div>
					<?php } else if($pageID == 2109){?>
						<div class="inUpdate-list">
							<ul>
							<?php 
							$intUpList = array(
							'post_type' => 'news-post',
							'posts_per_page' => -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'news-tax',
									'field'    => 'term_id',
									'terms'    => '127',
									),
									),
								);
							$intUpLists = new WP_Query();
								$intUpLists->query($intUpList);
							
							$args = array(
							'post_type' => 'news-post',
							'posts_per_page' => 9,
							'tax_query' => array(
								array(
									'taxonomy' => 'news-tax',
									'field'    => 'term_id',
									'terms'    => '127',
									),
									),
								);
							$opNewsList = query_posts($args);
							if(have_posts()):while(have_posts()):the_post();
							?>
								<li>
									<h5><?php the_title();?></h5>
									<span class="months"><?php the_field('news_subtitle');?></span>
									<a class="iupdate-link" href="<?php the_permalink();?>"></a>
								</li>
							<?php endwhile; wp_reset_query(); endif;?>
							</ul>
							<?php if($intUpLists->post_count > 9){?><span class="load-more"><a id="more_intup"  href="#" maxintup="<?php echo $intUpLists->post_count;?>"></a></span><?php }?>
						</div>
					<?php } else if($pageID == 2118){?>
						<div class="ssNews-list">
							<ul>
							<?php 
							
								
							$args = array(
							'post_type' => 'news-post',
                               'post_status'=>'publish', 
							'posts_per_page' => 9,
							'tax_query' => array(
								array(
									'taxonomy' => 'news-tax',
									'field'    => 'term_id',
									'terms'    => '128',
									),
									),
								);
							$opNewsList = new WP_query($args);
							if($opNewsList->have_posts()):while($opNewsList->have_posts()):$opNewsList->the_post();
							?>
								<li>
									<div class="ssNews-data"><a href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a></div>
									<span class="ssNews-img"><a href="<?php the_permalink();?>"><?php if(has_post_thumbnail()){the_post_thumbnail(array(260*245));}?></a></span>
								</li>
							<?php endwhile; wp_reset_query();  endif;?>
							</ul>
							<?php 
    $sStoryList = array(
							'post_type' => 'news-post',
                            'post_status'=>'publish', 
							'posts_per_page' => -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'news-tax',
									'field'    => 'term_id',
									'terms'    => '128',
									),
									),
								);
							$sStoryLists = new WP_Query();
								$sStoryLists->query($sStoryList);
                            
                        if($sStoryLists->post_count > 9){?><span class="load-more"><a id="more_sstory"  href="#" maxsstory="<?php echo $sStoryLists->post_count;?>"></a></span><?php }?>
						</div>
					<?php }?>
				</div><!--.<?php echo esc_html( vct_get_maincontent_block_class() ); ?>-->

				<?php if ( vct_get_sidebar_class() ) : ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>

			</div><!--.row-->
		</div><!--.content-wrapper-->
	</div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->
<?php get_footer();