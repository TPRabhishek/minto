

<?php get_header(); ?>



  <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

  <div class="<?php echo esc_attr( vct_get_content_container_class() ); ?>">

    <div class="content-wrapper marT13p">

      <div class="row">

        <div class="<?php echo esc_attr( vct_get_maincontent_block_class() ); ?>">

          <div class="main-content">

            <div class="entry-content archive">

              <?php

                the_archive_title( '<h1>', '</h1>' );

                the_archive_description( '<p>', '</p>' );

              ?>

            </div><!--.entry-content-->

            <div class="event">

            <div class="section-3">

            <div class="wpb_text_column wpb_content_element  event-list">

            <div class="archive wpb_wrapper">

              <?php if ( have_posts() ) : ?>

                <div id="blog_page_posts" style="color: #fff;">



                <?php $classes = array('bgpinkBox', 'bgpurpleBox', 'bgblueBox', 'bgskyblueBox');

                // Start the loop.

                while ( have_posts() ) : the_post();

                $class = $classes[$i++ % 6];



                  /*

                   * Include the Post-Format-specific template for the content.

                   * If you want to override this in a child theme, then include a file

                   * called content-___.php (where ___ is the Post Format name) and that will be used instead.

                   */

                  //get_template_part( 'template-parts/content', get_post_format() );

                  ?>

                  <div class="<?php echo $class; ?> event-item ">

                  <div class="event-date">

                    <?php $dateVar = strtotime(the_date('', '', '', false)); 

                      echo '<div class="event-day">'.date("M d ", $dateVar).'</div>'.'<div class="event-year">'.date("Y", $dateVar).'</div>';

                    ?>

                  </div>

                  <div class="event-content">

                    <h6 class="event-title">

                    <a href="<?php the_permalink(); ?>" style="color:#444344;"><?php the_title(); ?></a>

                    </h6>

                    <div class="event-discription">

                    <?php the_excerpt(); ?>

                    <?php

                    $gid = get_the_ID();

                    $args = array("type" => "india_type");

                    $categories = get_categories($args);

                    // print_r($categories);

                    ?>

                    <!-- <a class="event-cat">Round Table</a> -->

                    ?>

                    </div>

                      

                  </div>



                  </div>





                <?php  // End the loop.

                endwhile;



                ?>

                <div class="pagination">

                  <h2 class="screen-reader-text"><?php esc_html__( 'Post navigation', 'visual-composer-starter' ); ?></h2>

                  <div class="nav-links archive-navigation">

                    <?php

                    // Previous/next page navigation.

                    the_posts_pagination( array(

                      'screen_reader_text' => '',

                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'visual-composer-starter' ) . '</span>',

                    ) );

                    ?>

                  </div><!--.nav-links archive-navigation-->

                </div><!--.pagination-->

              <?php



              // If no content, include the "No posts found" template.

              else :

                get_template_part( 'template-parts/content', 'none' );



              ?>

              </div>

              <?php



              endif;



              ?>



            </div><!--.archive-->

            </div><!--.archive-->

            </div><!--.archive-->

            </div><!--.archive-->

          </div><!--.main-content-->

        </div><!--.<?php echo esc_html( vct_get_maincontent_block_class() ); ?>-->



        <?php if ( vct_get_sidebar_class() ) : ?>

          <?php get_sidebar(); ?>

        <?php endif; ?>



      </div><!--.row-->

    </div><!--.content-wrapper-->

  </div><!--.<?php echo esc_html( vct_get_content_container_class() ); ?>-->

<?php get_footer();