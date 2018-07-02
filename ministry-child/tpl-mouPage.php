<?php
/**
 * Template Name: MOU's Signed
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
						
						<div class="mouDoc-lists">
							<ul>
							<?php query_posts('post_type=mou-doc&showposts=12');
								if(have_posts()):while(have_posts()):the_post();?>
								<li>
									<div class="mou-data">
										<h5><?php the_title();?></h5>
										<span class="months"><?php echo get_field('month_duration');?></span>
									</div>
									<?php if(get_field('doc_pdf') !=''){?>
									<div class="mou-files">
										<a class="file-print" href="javascript: w=window.open('<?php echo get_field('doc_pdf');?>'); w.print(); w.close();"></a>
										<a class="pdf-file" target="blank" href="<?php echo get_field('doc_pdf');?>"></a>
									</div>
									<?php }?>
								</li>
							<?php endwhile; wp_reset_query(); endif;?>
							</ul>
							
							<span class="load-more"><a href="#"></a></span>
						</div>
					</div><!--.main-content-->
				</div><!--.<?php echo esc_html( vct_get_maincontent_block_class() ); ?>-->
			</div><!--.row-->
		</div><!--.content-wrapper-->
	</div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->
<?php get_footer();
