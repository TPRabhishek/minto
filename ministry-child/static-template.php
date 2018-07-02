<?php
/**
 * Template Name: Static page
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

get_header(); ?>

    
	<div class="<?php echo esc_attr( vct_get_content_container_class() ); ?>">
		<div class="content-wrapper trade staticpage-style">
			<div class="row">
				<div class="<?php echo esc_attr( vct_get_maincontent_block_class() ); ?>">
					<div class="main-content">
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();
						if(is_page('site-map')){?>
						<style type="text/css">
							.sitemap-list li a {
									    color: #000;
									}
						</style>
							<h3>Pages</h3>  
							    <ul class="sitemap-list"><?php wp_list_pages("title_li=" ); ?></ul>  
							<h3>Feeds</h3>  
							    <ul class="sitemap-list">  
							        <li><a title="Full content" href="feed:<?php bloginfo('rss2_url'); ?>">Main RSS</a></li>  
							        <li><a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comment Feed</a></li>  
							    </ul>  
							<h3>Categories</h3>  
							    <ul class="sitemap-list"><?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?></ul>  
							<h3>All Blog Posts:</h3>  
							    <ul class="sitemap-list"><?php $archive_query = new WP_Query('showposts=1000&cat=-8');  
							            while ($archive_query->have_posts()) : $archive_query->the_post(); ?>  
							                <li>  
							                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>  
							                 (<?php comments_number('0', '1', '%'); ?>)  
							                </li>  
							            <?php endwhile; ?>  
							    </ul>  
							   
							<h3>Archives</h3>  
							    <ul class="sitemap-list">  
							        <?php wp_get_archives('type=monthly&show_post_count=true'); ?>  
							    </ul>  
				<?php		}else{
                           get_template_part( 'template-parts/content', 'page' );
						}
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
