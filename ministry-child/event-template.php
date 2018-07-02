<?php
/**
 * Template Name: Event
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

get_header(); 
?>

<style type="text/css">
	.bgHalfWhite .investFooter {
	    background-color: #f1784d;
	}
	.bgHalfWhite .tradeFooter {
	    background-color: #f4984b;
	}
</style>
    
	<div class="<?php echo esc_attr( vct_get_content_container_class() ); ?>">
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
				</div><!--.<?php echo esc_html( vct_get_maincontent_block_class() ); ?>-->

				<?php if ( vct_get_sidebar_class() ) : ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>

			</div><!--.row-->
	</div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->
<?php get_footer();
?>
<script>
	function archive_load_more_posts(e) {
    var t = parseInt(e) + 4
    jQuery.ajax({
        type: "POST",
        url: ajaxurl,
        data: {
            action: "archive_load_more_posts",
            post_num: t
        },
        success: function(res) {
			console.log(res);
			//var htmldata= '<div class="event-item wpb_animate_when_almost_visible wpb_fadeInLeft fadeInLeft wpb_start_animation animated"><div class="event-date"><div class="event-day">'.date("F d, ", $dateVar).'</div><div class="event-year">'.date("Y", $dateVar).'</div></div><div class="event-content"><h6 class="event-title"><a href="'.$thelink.'" style="color:#444344;">'.the_title().'</a></h6><div class="event-discription">'.$thecontent.'<a class="event-cat">Round Table</a></div></div></div>'
            jQuery("#blog_page_posts").html(res);
			//jQuery(".more-button button").attr("onclick", "archive_load_more_posts('" + t + "');")
        }
    })
}
</script>
