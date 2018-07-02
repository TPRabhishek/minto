<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */
?>
<?php if ( vct_is_the_title_displayed() ) : ?>
<!-- <h1 class="entry-title"><?php the_title(); ?></h1>
<?php endif; ?>
<div class="entry-content">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php //the_content( '', true ); ?>
		<?php
			/*wp_link_pages(
				array(
					'before' => '<div class="nav-links post-inner-navigation">',
					'after' => '</div>',
					'link_before' => '<span>',
					'link_after' => '</span>',
				)
			);*/
		?>
	</article>
	<?php //visualcomposerstarter_entry_tags(); ?>
</div><!-entry-content--> 
<div class="row article_content">
<?php  $id=get_the_ID(); ?>
         <div class="col-md-12 mainHeadingBox">
            <h1 class="mainHeading"><?php echo the_title(); ?></h1>
			 <h3><?php echo get_field('news_subtitle');?></h3> 
            <p class="mainPara"><?php echo the_field('subtitle',$id); ?></p>
            <p class="mainDate"><?php echo the_date(); ?></p>
          
         </div>
      </div>
      
      <div class="row topmainBox table_box">
      	<div>
      		<?php  $sub_heading_1 = get_field('sub_heading_1', $id);
		      		$sub_heading_2 = get_field('sub_heading_2', $id);
		      		$sub_heading_3 = get_field('sub_heading_3', $id);
		      		$sub_heading_4 = get_field('sub_heading_4', $id);
      		?>	
      	</div>
      	<?php
           if(!empty($sub_heading_1)){?>
           	<div class="col-sm-3 borderPinkBlue col-xs-6"><?php echo $sub_heading_1; ?></div>
         <?php   }else{}
           if (!empty($sub_heading_2)) {?>
           	<div class="col-sm-3 borderDarkBlue col-xs-6"><?php echo $sub_heading_2; ?></div>
          <?php  }else{}
           if (!empty($sub_heading_3)) {?>
           	<div class="col-sm-3 borderDarkBlue col-xs-6"><?php echo $sub_heading_3; ?></div>
           <?php }else{}
           if (!empty($sub_heading_4)) {?>
           	<div class="col-sm-3 borderlightBlue col-xs-6"><?php echo $sub_heading_4; ?>
        </div>
          <?php  }else{}
      	 ?>
       <div class="col-sm-3 borderPinkBlue col-xs-6">India has one of the most liberal FDI regimes in the world
        </div>
        <div class="col-sm-3 borderDarkBlue col-xs-6">The Economic Survey pegs India’s growth at a healthy 7.1%
        </div>
         <div class="col-sm-3 borderBlue col-xs-6">India is the sixth largest manufacturer in the world, as per UNIDO
        </div>
         <div class="col-sm-3 borderlightBlue col-xs-6">India is the world’s third largest startup ecosystem
        </div>

      </div>
      
      <div class="row post_img_div">
         <div class="col-md-12 divRelative">
         <?php 
         if ( has_post_thumbnail() ) {
        the_post_thumbnail('full', array('class' => 'img-responsive'));
}
else {
    echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
        . '/images/brigeImg.png" class="img-responsive" />';
}
         ?>
         <!-- <img src="img/brigeImg.png" class="img-responsive zIndex"> -->
         <div class="divAbsolute">
         <?php $value = get_field( "video_for_slider", $post->ID ); 

            if(!empty($value)){ ?>

                <iframe width="700" height="400"
                src="<?php echo $value; ?>">
                </iframe>  

          <?php 

            }else{ ?>

               <!--  <img src="<?php echo $feat_image; ?>" alt="<?php the_title(); ?>" /> -->

          <?php

             }

          ?>
           <?php echo the_content();?>
           
           <div class="linkBox">
             <div class="socailLink"> <a href="#"> <img src="<?php echo get_stylesheet_directory_uri();?>/images/iconShareSocail.png" ></a>
             <div class="share_links">
             
              <a class="icon icon-facebook icon-replacement" href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a class="icon icon-twitter icon-replacement" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo get_permalink(); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a class="icon icon-google-plus icon-replacement" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
              <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=&summary=&source="><i class="fa fa-linkedin" aria-hidden="true"></i></a>
             </div>
             </div>
           <?php $posttags = get_the_tags();
			  if ($posttags) {
			    $array = [];
			    foreach($posttags as $tag) {
			      $array[] = '<a href="/tag/' . $tag->slug . '/">' . $tag->name . '</a>';
			    }
			    echo $content .= 'Tags: ' . implode(' ', $array);
			  }?> 
           </div>
           <?php $orig_post = $post;
global $post;
$categories = get_the_category($post->ID);
if ($categories) {
$category_ids = array();
foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

$args=array(
'category__in' => $category_ids,
'post__not_in' => array($post->ID),
'posts_per_page'=> 2, // Number of related posts that will be shown.
'caller_get_posts'=>1
);

$my_query = new wp_query( $args );
if( $my_query->have_posts() ) {
echo '<div id="related_posts"><h1>Related Posts</h1> <div class="clear"></div> <ul>';
while( $my_query->have_posts() ) {
$my_query->the_post();?>

<li><div class="relatedthumb"><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php //the_post_thumbnail('thumbnail'); ?></a></div>
<div class="relatedcontent">
<h3><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a><span class="date-content"><?php the_time('M j, Y') ?></span></h3>

</div>
</li>
<?php
}
echo '</ul></div>';
}
}
$post = $orig_post;
wp_reset_query(); ?>

            </div>
         </div>
      </div>
