<?php
/**
 * Template Name: Sectors
 */

get_header(); ?>
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
					
					<div class="sector-lists">
						<?php
						query_posts('post_type=sector-post&showposts=-1&order=asc&orderby=title');
						if(have_posts()):?>
						<ul>
						<?php 
							while(have_posts()):the_post();?>
							<li>
								<a href="<?php the_permalink();?>" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>)">
									<h3><?php the_title();?></h3>
								</a>
							</li>
						<?php endwhile; wp_reset_query(); ?>
						</ul>
					
					<?php endif;?>
					</div>
				</div><!--.<?php echo esc_html( vct_get_maincontent_block_class() ); ?>-->

			</div><!--.row-->
		</div><!--.content-wrapper-->
	</div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->
<?php get_footer();