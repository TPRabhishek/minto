<?php
/**
 * Template Name: Inbound & Outbound Visit
 *
 */

get_header(); 

$pageId = get_the_ID();?>

<style type="text/css">
	.bgHalfWhite .investFooter {
	    background-color: #7750df;
	}
	.bgHalfWhite .tradeFooter {
	    background-color: #ad50df;
	}
</style>
    <?php $args = array(
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
						<h3 class="news_p_subhead"><?php //the_field('news_subtitle');?></h3>
						<h5 class="banner_date"><?php// echo get_the_date('M d, Y');?></h5>
					</div>	
				</div>
			</div>
		</div>
		<?php //endwhile; wp_reset_query();?>
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="news_filter">
						<h3>Search News</h3>
						<p>Search for news  on India's economic diplomacy</p>
						<form class="nSearch-form">
							<span class="search-field"><input type="text" name="search-text" id="searchText" placeholder="Search" /></span>
							<span class="search-field">
							<select name="state-filter" id="stateFilter">
								<option value="">Filter by State</option>
								<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
								<option value="Andhra Pradesh">Andhra Pradesh</option>
								<option value="Arunachal Pradesh">Arunachal Pradesh</option>
								<option value="Assam">Assam</option>
								<option value="Bihar">Bihar</option>
								<option value="Chandigarh">Chandigarh</option>
								<option value="Chhattisgarh">Chhattisgarh</option>
								<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
								<option value="Daman and Diu">Daman and Diu</option>
								<option value="Delhi">Delhi</option>
								<option value="Goa">Goa</option>
								<option value="Gujarat">Gujarat</option>
								<option value="Haryana">Haryana</option>
								<option value="Himachal Pradesh">Himachal Pradesh</option>
								<option value="Jammu and Kashmir">Jammu and Kashmir</option>
								<option value="Jharkhand">Jharkhand</option>
								<option value="Karnataka">Karnataka</option>
								<option value="Kerala">Kerala</option>
								<option value="Lakshadweep">Lakshadweep</option>
								<option value="Madhya Pradesh">Madhya Pradesh</option>
								<option value="Maharashtra">Maharashtra</option>
								<option value="Manipur">Manipur</option>
								<option value="Meghalaya">Meghalaya</option>
								<option value="Mizoram">Mizoram</option>
								<option value="Nagaland">Nagaland</option>
								<option value="Orissa">Orissa</option>
								<option value="Pondicherry">Pondicherry</option>
								<option value="Punjab">Punjab</option>
								<option value="Rajasthan">Rajasthan</option>
								<option value="Sikkim">Sikkim</option>
								<option value="Tamil Nadu">Tamil Nadu</option>
								<option value="Tripura">Tripura</option>
								<option value="Uttaranchal">Uttaranchal</option>
								<option value="Uttar Pradesh">Uttar Pradesh</option>
								<option value="West Bengal">West Bengal</option>
							</select>
							</span>
							<span class="search-field">
							<select name="sector-filter" id="sectorFilter">
								<option value="">Filter by Sector</option>
								<?php query_posts('post_type=sector-post&showposts=-1&orderby=title&order=ASC');
									if(have_posts()):while(have_posts()):the_post();?>
									<option value="<?php echo get_post($post->ID)->post_name;?>"><?php the_title();?></option>
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
						<div class="inbNews-sec news_national">
						<div class="heading_india"><h2 style="text-align: center;"><?php the_title();?></h2></div>
						<div class="inout-news">
							<?php 
							if($pageId==2194){ $terms = 111;} else if($pageId == 2196){$terms = 112;}
							
							$newsCatList = array(
							'post_type' => 'news-post',
							'posts_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => 'news-tax',
										'field'    => 'term_id',
										'terms'    => $terms,
										),
									),
								);
							$newsCatLists = new WP_Query();
								$newsCatLists->query($newsCatList);
								
							$options = array(
							'post_type' => 'news-post',
							'posts_per_page' => 12,
								'tax_query' => array(
									array(
										'taxonomy' => 'news-tax',
										'field'    => 'term_id',
										'terms'    => $terms,
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
								  $shorttitle = wp_trim_words( $trimtitle, $num_words = 5, $more = '[...]' ); ?>
								  <div class="whole-new-page-wapper"><h4><a href="<?php the_permalink(); ?>">
									<?php echo substr(get_the_title(), 0, 80); ?>
									<span class="mobile-date"> <?php echo get_the_date(); ?> </span>
									</a></h4></div>
								</div>
								<div class="padAll padAll-mobile bgColorWhite pB10">
								  <div class="date fW600">
									<?php echo get_the_date(); ?>
								  </div>
								</div>
								<div class="pic">
								  <?php 
								  if(get_field('video_url') !=''){
									  $url = get_field('video_url');
										preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
										$videoId = $matches[1];?>
									  <iframe src="https://www.youtube.com/embed/<?php echo $videoId ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen="" class="lazyloading" data-was-processed="true"></iframe>
								  <?php } else if( has_post_thumbnail() ) {?>
								  <a href="<?php the_permalink(); ?>">
								  <?php the_post_thumbnail(array(255,204));
									  echo '</a>';
									} ?>
								</div>
							  </div>
							</div>
							   <?php $oddEvenCount++; endwhile; wp_reset_postdata(); }?>
							</div> </div>
							<?php if($newsCatLists->post_count > 12){?><span class="load-more"><a id="more_ionews"  href="#" maxionews="<?php echo $newsCatLists->post_count;?>" newsterm = <?php echo $terms;?>></a></span><?php }?>
						
						
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'page' );
						endwhile; // End the loop.
						?>
					</div><!--.main-content-->
				</div><!--.<?php echo esc_html( vct_get_maincontent_block_class() ); ?>-->

				<?php if ( vct_get_sidebar_class() ) : ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>

			</div><!--.row-->
		</div><!--.content-wrapper-->
	</div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->
	
	
<?php get_footer();
