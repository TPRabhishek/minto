<?php
/**
 * Single
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

get_header();?>

<div class="featured-news sector-bg" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="news_p_head">Start Up India</h2>
					</div>	
				</div>
			</div>
		</div>
<?php 
// Start the loop.
if( have_posts() ) :
?>
<div class="<?php echo esc_attr( vct_get_content_container_class() ); ?>">
	<div class="content-wrapper marT90">
		<div class="row">
			<div class="col-md-12">
				<div class="main-content evData-page">
					<div class="evdetail-left">
						
					</div>
					<div class="evdetail-right">
						<div class="event-content">
						<h5 class="sec-title"><?php the_title();?></h5>
							<?php while ( have_posts() ) :the_post();
							the_content();
						endwhile; wp_reset_query();?>
						</div>
						<span class="load-more"><a class="showLink" href="#"></a></span>
					</div>
				</div><!--.main-content-->
			</div>
		</div><!--.row-->
	</div><!--.content-wrapper-->
</div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->
<?php /*if ( comments_open() || get_comments_number() ) {
	comments_template();
}*/
// End of the loop.
endif;
get_footer();
