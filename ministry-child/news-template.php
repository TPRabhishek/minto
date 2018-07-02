<?php
/**
 * Template Name: News
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

get_header(); 
$serState = $_GET['state-filter'];
$serSector = $_GET['sector-filter'];
$serText = $_GET['search-text'];?>

<style type="text/css">
	.bgHalfWhite .investFooter {
	    background-color: #7750df;
	}
	.bgHalfWhite .tradeFooter {
	    background-color: #ad50df;
	}
</style>
    <?php 
	$args = array(
		'post_type' => 'news-post',
		//'posts_per_page' => 1,
		//'meta_query' => array(
			//array(
			//'key'     => 'featured_news',
				//'value'   => 'featured',
				//'compare' => 'LIKE',
				//),
			//),
		);
		$featured_query = new WP_Query($args);
		//while($featured_query->have_posts()):$featured_query->the_post();?>
		<div class="featured-news" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>);">
			
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="news_p_head"><?php the_title();?></h2>
					</div>	
				</div>
			</div>
		</div>
		<?php// endwhile; wp_reset_query();?>
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="news_filter">
						<h3>Search News</h3>
						<p>Search for news  on India's economic diplomacy</p>
						<form class="nSearch-form">
							<span class="search-field"><input type="text" name="search-text" id="searchText" placeholder="Search" value="<?php echo $serText;?>" /><button type="submit" class="search-submit"></button></span>
							<span class="search-field">
							<select name="state-filter" id="stateFilter" onchange="this.form.submit()">
								<option value="">Filter by State</option>
								<?php query_posts('post_type=state-post&showposts=-1&orderby=title&order=ASC');
									if(have_posts()):while(have_posts()):the_post();?>
									<option value="<?php echo get_post($post->ID)->post_name;?>" <?php if($serState == get_post($post->ID)->post_name){echo 'selected';}?>><?php the_title();?></option>
								<?php endwhile; wp_reset_query(); endif;?>
							</select>
							</span>
							<span class="search-field">
							<select name="sector-filter" id="sectorFilter" onchange="this.form.submit()">
								<option value="">Filter by Sector</option>
								<?php query_posts('post_type=sector-post&showposts=-1&orderby=title&order=ASC');
									if(have_posts()):while(have_posts()):the_post();?>
									<option value="<?php echo get_post($post->ID)->post_name;?>" <?php if($serSector == get_post($post->ID)->post_name){echo 'selected';}?>><?php the_title();?></option>
								<?php endwhile; wp_reset_query(); endif;?>
							</select>
							</span>
						</form>
					</div>
					
				</div>
			</div>
		</div>
		
	<div class="<?php echo esc_attr( vct_get_content_container_class() ); ?>">
		<div class="content-wrapper news">
			<div class="row">
				<div class="<?php echo esc_attr( vct_get_maincontent_block_class() ); ?>">
					<div class="main-content">
						<div class="latNews-lists">
							<div class="heading_india"><h2 style="text-align: center;">ECONOMIC NEWS</h2></div>
							
							<?php
							if($serState !='' && $serSector == '' && $serText == ''){
								$options4 = array(
							'post_type' => 'news-post',
							'posts_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => 'news_tag',
										'field'    => 'slug',
										'terms'    => $serState,
										),
									),
									);
							} else if($serState =='' && $serSector != '' && $serText == ''){
								$options4 = array(
							'post_type' => 'news-post',
							'posts_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => 'news_tag',
										'field'    => 'slug',
										'terms'    => $serSector,
										),
									),
									);
							} else if($serState !='' && $serSector != '' && $serText == ''){
								$options4 = array(
							'post_type' => 'news-post',
							'posts_per_page' => -1,
								'tax_query' => array(
								'relation' => 'AND',
									array(
										'taxonomy' => 'news_tag',
										'field'    => 'slug',
										'terms'    => $serState,
										),
									array(
										'taxonomy' => 'news_tag',
										'field'    => 'slug',
										'terms'    => $serSector,
										),
									),
									);
							} else if($serState =='' && $serSector == '' && $serText != ''){
								$options4 = array(
							'post_type' => 'news-post',
							's' => $serText,
							'posts_per_page' => -1,
									);
							} else if($serState =='' && $serSector != '' && $serText != ''){
								$options4 = array(
							'post_type' => 'news-post',
							's' => $serText,
							'posts_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => 'news_tag',
										'field'    => 'slug',
										'terms'    => $serSector,
										),
									),
									);
							} else if($serState !='' && $serSector == '' && $serText != ''){
								$options4 = array(
							'post_type' => 'news-post',
							's' => $serText,
							'posts_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => 'news_tag',
										'field'    => 'slug',
										'terms'    => $serState,
										),
									),
									);
							} else if($serState !='' && $serSector != '' && $serText != ''){
								$options4 = array(
							'post_type' => 'news-post',
							's' => $serText,
							'posts_per_page' => -1,
								'tax_query' => array(
								'relation' => 'AND',
									array(
										'taxonomy' => 'news_tag',
										'field'    => 'slug',
										'terms'    => $serState,
										),
									array(
										'taxonomy' => 'news_tag',
										'field'    => 'slug',
										'terms'    => $serSector,
										),
									),
									);
							} else {
							
							$options4 = array(
							'post_type' => 'news-post',
							'posts_per_page' => 6,
								'tax_query' => array(
									array(
										'taxonomy' => 'news-tax',
										'field'    => 'term_id',
										'terms'    => 149,
										),
									),
									);
							}
							$query4 = new WP_Query( $options4 );
								if($query4->have_posts()){?>
								<ul>
								<?php while($query4->have_posts()):$query4->the_post();?>
								
								<li>
									<h3><a href="<?php the_permalink();?>"><?php echo wp_trim_words(get_the_title(),6) ;?></a></h3>
									<div class="news-desc"><?php echo substr(get_post($post->ID)->post_content, 0,100).'...';?></div>
									<span class="learnMore"><a href="<?php the_permalink();?>">Learn More</a></span>
								</li>
							<?php endwhile;	wp_reset_query();?>
							</ul>
							<?php } else{ ?>
								<div class="blank-search">
								<h3>No News found.</h3> 
								<a class="go-back standard-button-class" href="<?php echo get_permalink(get_the_ID());?>">Go Back</a>
								</div>
							<?php }?>
							<?php 
							$options3 = array(
									'post_type' => 'news-post',
									'posts_per_page' => -1,
									'post_status' => 'publish',
										'tax_query' => array(
											array(
												'taxonomy' => 'news-tax',
												'field'    => 'term_id',
												'terms'    => 149,
												),
											),
											);
							$gnLists = new WP_Query($options3);
							?>
							<?php if(!isset($serText) || !isset($serState) || !isset($serSector) && $gnLists->post_count > 6){?><div class="btnBox "><a id="more_gnNews" href="#" class="customBtn standard-button-class" maxnews="<?php echo $gnLists->post_count;?>">View More</a></div><?php }?>
							
						</div>
						
						<?php 
						if(!isset($serText) || !isset($serState) || !isset($serSector)){?>
						<div class="inbNews-sec news_national">
						<div class="heading_india"><h2 style="text-align: center;">TOP READS</h2></div>
							<?php 
							$options = array(
							'post_type' => 'news-post',
							'posts_per_page' => 4,
								'tax_query' => array(
									array(
										'taxonomy' => 'news-tax',
										'field'    => 'term_id',
										'terms'    => 111,
										),
									),
									);
							$query = new WP_Query( $options );
							   if ( $query->have_posts() ) { 
								$classes = array('bgyellowBox', 'bgyellowDarkBox', 'bgyellowBox', 'bgyellowDarkBox');
								?>
							<?php $oddEvenCount = 0; while ( $query->have_posts() ) : $query->the_post(); $class = $classes[$i++ % 6]; $oddEvenClass = ($oddEvenCount % 2 == 0) ? "even" : "odd"; ?>
							<div class="col-sm-3 inbound-news">
							  <div class="shadow <?php echo $oddEvenClass; ?> news_block_custom">
								<div class="padAll bgWhite pB0">
								<?php $trimtitle = get_the_title();
								  $shorttitle = wp_trim_words( $trimtitle, $num_words = 6, $more = '[...]' ); ?>
								  <div class="whole-new-page-wapper"><h4><a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
									<span class="mobile-date"> <?php echo get_the_date(); ?> </span>
									</a></h4></div>
								</div>
								<div class="padAll padAll-mobile bgColorWhite pB10">
								  <div class="date fW600">
									<?php echo get_the_date(); ?>
								  </div>
								</div>
								<div class="pic">
								  <?php if ( has_post_thumbnail() ) {?>
								  <a href="<?php the_permalink(); ?>">
								  <?php the_post_thumbnail(array(255,204));
									  echo '</a>';
									} ?>
								</div>
							  </div>
							</div>
							   <?php $oddEvenCount++; endwhile; wp_reset_postdata(); }?>
							<div class="btnBox "><a href="<?php echo get_permalink(2194);?>" class="customBtn standard-button-class">View More</a></div>
						</div>
						<div class="otbNews-sec">
							<div class="heading_india"><h2 style="text-align: center;">TRENDING STORIES</h2></div>
							<ul id="otbNews" class="owl-carousel owl-theme">
							<?php 
							$args = array(
							'post_type' => 'news-post',
							'posts_per_page' => 10,
								'tax_query' => array(
									array(
										'taxonomy' => 'news-tax',
										'field'    => 'term_id',
										'terms'    => 112,
										),
									),
									);
								$otNewsList = query_posts($args);
								if(have_posts()):while(have_posts()):the_post();?>
								<li>
									<div class="otNews-left">
										<div class="otNews-desc"><?php the_title();?></div>
										<span class="readMore"><a href="<?php the_permalink();?>">Read More</a></span>
									</div>
									<div class="otNews-right">
										<?php if(get_field('video_url') !=''){?>
										<iframe src="<?php the_field('video_url');?>" frameborder="0" allowfullscreen></iframe>
										<?php } else { if(has_post_thumbnail()){the_post_thumbnail('full');}}?>
									</div>
								</li>
								<?php endwhile; wp_reset_query(); endif;?>
							</ul>
							
							<div class="btnBox "><a href="<?php echo get_permalink(2196);?>" class="customBtn standard-button-class">View More</a></div>
						</div>
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'page' );
						endwhile; // End the loop.
						
						}?>
					</div><!--.main-content-->
				</div><!--.<?php echo esc_html( vct_get_maincontent_block_class() ); ?>-->

				<?php if ( vct_get_sidebar_class() ) : ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>

			</div><!--.row-->
		</div><!--.content-wrapper-->
	</div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->
	
	
<?php get_footer();?>

<script type="text/javascript">

    

</script>