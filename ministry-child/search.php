<?php
/**
 * Search
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

get_header(); ?>
	<div class="<?php echo esc_attr( vct_get_content_container_class() ); ?>">
		<div class="content-wrapper m_t_16vw">
			<div class="row">
				<div class="<?php echo esc_attr( vct_get_maincontent_block_class() ); ?>">
					<div class="main-content">
						<div class="search-results-header">
							<h4 class="search_head "><span class="blue_theme upper"><?php
								/* translators: %s: search query string */
								printf( esc_html__( 'Search Results for: %s', 'visual-composer-starter' ), '</span><strong><span class="dark_gray">' . esc_html( get_search_query() ) . '</span></strong>' ); ?></h4>
						</div>
						<div class="archive">
							<?php 
							//$args['post_type'] = array('post','event','trade_type','invest_type','india_type');
 							  // it is always better to use WP_Query but not here
							  //query_posts( $args );

							if ( have_posts() ) : ?>

								<?php
								// Start the loop.
								while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									//get_template_part( 'template-parts/content', get_post_format() ); ?>
									<div class="search_wrap row">
										<div class="post_thumbnail col-sm-4 col-md-3">
										<?php if ( has_post_thumbnail() ) { ?>
										    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										        <?php the_post_thumbnail('thumbnail'); ?>
										    </a>
										<?php }
										else{ ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										        <img src="<?php echo site_url();?>/wp-content/uploads/2017/08/no_thumbnail.jpg">
										    </a>
										<?php } ?>
										</div>
										<div class="content_wrap col-sm-8 col-md-9">
										<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
										<p class="content_entry">
										<?php 
										$the_content = get_the_content();
				                    	$shortcode_tags = array('VC_COLUMN_INNTER');
										$values = array_values( $shortcode_tags );
										$exclude_codes  = implode( '|', $values );
										$the_content = preg_replace("/<img[^>]+\>/i", " ", $the_content);
										$the_content = preg_replace( "~(?:\[/?)(?!(?:$exclude_codes))[^/\]]+/?\]~s", '', $the_content );
										echo substr($the_content,0,200);
										?>
										</p>
										<div class="category">
											<?php 
											$args_term = array(
											    //default to current post
											    'post' => 0,
											    'before' => '',
											    //this is the default
											    'sep' => ' ',
											    'after' => '',
											    //this is the default
											    'template' => '%s: %l'
											);
											$terms = get_the_taxonomies( $post->ID, $args_term);
											if($terms['india-tax']){
												echo $terms['india-tax'];
											}elseif($terms['event-tax']){
												echo $terms['event-tax'];
											}elseif($terms['trade-tax']){
												echo $terms['trade-tax'];
											}elseif($terms['invest-tax']){
												echo $terms['invest-tax'];
											}elseif($terms['publication-tax']){
									            echo $terms['publication-tax'];
									        }else{
												echo $terms['category'];
											}
											?>
										</div>
										</div>
									</div>

								<?php	// End the loop.
								endwhile;

								?>
								
							<?php
							// If no content, include the "No posts found" template.
							else :
								get_template_part( 'template-parts/content', 'none' );
							endif;
							?>
						</div><!--.archive-->
						<?php
							global $wp_query; // you can remove this line if everything works for you
							// don't display the button if there are not enough posts
							if (  $wp_query->max_num_pages > 1 )
								//echo '<div class="text_center v_space_6vw"><div class="mea_loadmore custom_btns">View More</div></div>'; // you can use <a> as well
						?>
						<div class="searchFormpage search_page_form">
						<form role="search" method="get" class="search-form" action="" style="display: block;">
								<label class="relative">
									<input type="search" class="search-field" placeholder="Search again …" value="" name="s">
								<button type="submit" class="search-submit fa fa-search dark_gray"></button>
								<!--<span class="screen-reader-text"></span>-->
								</label>
						</form>
						</div>
					</div><!--.main-content-->
				</div><!--.<?php vct_get_maincontent_block_class(); ?>-->

				<?php if ( vct_get_sidebar_class() ) : ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>

			</div><!--.row-->
		</div><!--.content-wrapper-->
	</div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->
<?php get_footer();
