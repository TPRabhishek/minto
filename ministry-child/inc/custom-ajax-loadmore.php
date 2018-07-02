<?php

/**Success Story Load More AJAX Code**/
function more_sstory_ajax(){
    $offset = $_POST["offset"];
    $ppp = $_POST["ppp"];
    header("Content-Type: text/html");
	
    $args12 = array(
        'post_type' => 'news-post',
        'posts_per_page' => $ppp,
        'post_status' => 'publish',
       // 'paged' =>'2',
        'offset' => $offset,
		'tax_query' => array(
								array(
									'taxonomy' => 'news-tax',
									'field'    => 'term_id',
									'terms'    => 128,
									),
									),
    );

     $loop21 = new WP_Query($args12);
    while ($loop21->have_posts()) { $loop21->the_post();  ?>
	   <li>
			<div class="ssNews-data"><a href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a></div>
			<span class="ssNews-img"><a href="<?php the_permalink();?>"><?php if(has_post_thumbnail()){the_post_thumbnail(array(260*245));}?></a></span>
		</li>
    <?php } exit;
}

add_action('wp_ajax_nopriv_more_sstory_ajax', 'more_sstory_ajax'); 
add_action('wp_ajax_more_sstory_ajax', 'more_sstory_ajax');


/**Generic News  Load More AJAX Code**/
function more_gnNews_ajax(){
    $nOffset = $_POST["nOffset"];
    $nPp = $_POST["nPp"];
    header("Content-Type: text/html");
	
    $args22 = array(
		'post_type' => 'news-post',
			'posts_per_page' => $nPp,
			'offset' => $nOffset,
			'tax_query' => array(
				array(
					'taxonomy' => 'news-tax',
					'field'    => 'term_id',
					'terms'    => 149,
				),
		),							
    );

     $loop22 = new WP_Query($args22);
    while ($loop22->have_posts()) { $loop22->the_post();  ?>
	   <li>
			<h3><a href="<?php the_permalink();?>"><?php echo substr(get_the_title(), 0,32).'...';?></a></h3>
			<div class="news-desc"><?php echo substr(get_post($post->ID)->post_content, 0,100).'...';?></div>
			<span class="learnMore"><a href="<?php the_permalink();?>">Learn More</a></span>
		</li>
    <?php } exit;
}

add_action('wp_ajax_nopriv_more_gnNews_ajax', 'more_gnNews_ajax'); 
add_action('wp_ajax_more_gnNews_ajax', 'more_gnNews_ajax');

/**Publication Lists Load More AJAX Code**/
function more_pub_ajax(){
    $pbOffset = $_POST["pbOffset"];
    $pbPp = $_POST["pbPp"];
    header("Content-Type: text/html");
		
	$args23 = array(
        'post_type' => 'publication_type',
        'posts_per_page' => $pbPp,
        'post_status' => 'publish',
        'offset' => $pbOffset,
    );

     $loop23 = new WP_Query($args23);
    while ($loop23->have_posts()) { $loop23->the_post();  ?>
	   <li><?php $pdfID = pippin_get_image_id(get_field('doc_pdf_file'));?>
          <div class="publication_ii_left">
			<?php if ( has_post_thumbnail() ) { ?>
                <?php the_post_thumbnail('thumbnail'); ?>
          <?php }
          else{ ?>
				<?php echo wp_get_attachment_image ( $pdfID, 'full' );?>
          <?php } ?>
         </div>
          <div class="publication_ii_right">
            <h4><?php echo get_the_title(); ?></h4>
            <p><?php the_excerpt(); ?></p>
            <?php 
              $args_term = array(
                  //default to current post
                  'post' => 0,
                  'before' => '',
                  //this is the default
                  'sep' => ' ',
                  'after' => '',
                  //this is the default
                  'template' => '<span class="hidden">%s:</span> %l'
              );
              $terms = get_the_taxonomies( $post->ID, $args_term);
            ?>
          </div>
		  <?php if(get_field('doc_pdf_file') !=''){?>
          <div class="publication_ii_new">
            <table border="0">
              <tr>
                <td><a href="javascript: w=window.open('<?php echo get_field('doc_pdf_file');?>'); w.print(); w.close();"><img src="<?php bloginfo('url');?>/wp-content/uploads/2017/09/002-printer-1.png" alt="print"/></a></td>
                <td><a target="_blank" href="<?php echo get_field('doc_pdf_file');?>"><img src="<?php bloginfo('url');?>/wp-content/uploads/2017/09/001-pdf-1.png" alt="print"/></a></td>
              </tr>
            </table>
          </div>
		  <?php }?>
        </li>
    <?php } exit;
}

add_action('wp_ajax_nopriv_more_pub_ajax', 'more_pub_ajax'); 
add_action('wp_ajax_more_pub_ajax', 'more_pub_ajax');


/**In-Out Bound Load More AJAX Code**/
function more_ionews_ajax(){
    $ioffset = $_POST["ioffset"];
    $ioppp = $_POST["ioppp"];
    $newsterm = $_POST["newsTerm"];
    header("Content-Type: text/html");
	
    $args12 = array(
        'post_type' => 'news-post',
        'posts_per_page' => $ioppp,
        'offset' => $ioffset,
		'tax_query' => array(
									array(
										'taxonomy' => 'news-tax',
										'field'    => 'term_id',
										'terms'    => $newsterm,
										),
									),
    );

     $loop21 = new WP_Query($args12);
    while ($loop21->have_posts()) { $loop21->the_post();  ?>
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
    <?php } exit;
}

add_action('wp_ajax_nopriv_more_ionews_ajax', 'more_ionews_ajax'); 
add_action('wp_ajax_more_ionews_ajax', 'more_ionews_ajax');


/**Investor Updates Load More AJAX Code**/
function more_intup_ajax(){
    $iuoffset = $_POST["iuoffset"];
    $iuppp = $_POST["iuppp"];
    header("Content-Type: text/html");
	
    $args13 = array(
        'post_type' => 'news-post',
        'posts_per_page' => $iuppp,
        'offset' => $iuoffset,
		'tax_query' => array(
									array(
										'taxonomy' => 'news-tax',
										'field'    => 'term_id',
										'terms'    => 127,
										),
									),
    );

     $loop22 = new WP_Query($args13);
    while ($loop22->have_posts()) { $loop22->the_post();  ?>
	   <li>
			<h5><?php the_title();?></h5>
			<span class="months"><?php the_field('news_subtitle');?></span>
			<a class="iupdate-link" href="<?php the_permalink();?>"></a>
		</li>
    <?php } exit;
}

add_action('wp_ajax_nopriv_more_intup_ajax', 'more_intup_ajax'); 
add_action('wp_ajax_more_intup_ajax', 'more_intup_ajax');


/**Opportunity News Load More AJAX Code**/
function more_opnews_ajax(){
    $opoffset = $_POST["opoffset"];
    $opppp = $_POST["opppp"];
    header("Content-Type: text/html");
	
    $args14 = array(
        'post_type' => 'news-post',
        'posts_per_page' => $opppp,
        'offset' => $opoffset,
		'tax_query' => array(
									array(
										'taxonomy' => 'news-tax',
										'field'    => 'term_id',
										'terms'    => 126,
										),
									),
    );

     $loop23 = new WP_Query($args14);
    while ($loop23->have_posts()) { $loop23->the_post();  ?>
	   <li>
			<span class="opNews-img"><?php if(has_post_thumbnail()){the_post_thumbnail(array(260*250));}?></span>
			<div class="opNews-details">
				<h3><?php echo substr(get_the_title(), 0, 27).'...';?></h3>
				<?php $opNewsDesc = get_post($post->ID)->post_content;?>
				<p><?php echo substr($opNewsDesc, 0, 100).'...';?></p>
				<a class="learnMore" href="<?php the_permalink();?>">Learn More</a>
			</div>
		</li>
    <?php } exit;
}

add_action('wp_ajax_nopriv_more_opnews_ajax', 'more_opnews_ajax'); 
add_action('wp_ajax_more_opnews_ajax', 'more_opnews_ajax');