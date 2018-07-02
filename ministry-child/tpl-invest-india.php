<?php
/**
 * Template Name: Invest In India
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
						
						<div class="invest-pub heading_india">
						<h2 style="text-align: center;">PUBLICATIONS</h2>
						<div class="ipub-lists">
							<ul id="ipubCarousel" class="owl-carousel owl-theme">
							<?php $args = array(
													'post_type' => 'publication_type',
													'posts_per_page' => -1,
													'tax_query' => array(
														array(
															'taxonomy' => 'publication-tax',
															'field'    => 'term_id',
															'terms'    => '125',
														),
													),
												);
									$inpubList = query_posts($args);
							if(have_posts()):while(have_posts()):the_post();?>
								<li>
									<div class="ipub-data">
										<h5><?php the_title();?></h5>
										<span class="ipub-desc"><?php 
										$pubContent = get_post($post->ID);?>
										<p><?php echo substr($pubContent->post_content, 0, 60);?></p></span>
									</div>
									<?php if(get_field('doc_pdf_file') !=''){?>
									<div class="ipub-files">
										<a class="file-print" href="javascript: w=window.open('<?php echo get_field('doc_pdf_file');?>'); w.print(); w.close();"></a>
										<a class="pdf-file" target="blank" href="<?php echo get_field('doc_pdf_file');?>"></a>
									</div>
									<?php }?>
								</li>
							<?php endwhile; wp_reset_query(); endif;?>
							</ul>
							</div>
						</div>
					</div><!--.main-content-->
				</div><!--.<?php echo esc_html( vct_get_maincontent_block_class() ); ?>-->
			</div><!--.row-->
		</div><!--.content-wrapper-->
	</div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->
<?php get_footer();
