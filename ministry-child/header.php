<?php
/**
 * Header
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

?>
<?php
if ( is_front_page() || is_page(18) || is_page(20) || is_page(22) || is_page(24) || is_page(721) || is_page(26)) {
    $navclass = 'navbar-inverse bgNav text-right';
    $menuclass ='customMenu';
} elseif ( is_singular('news-post') || is_singular('post') || is_search() || is_singular('sector-post') || is_singular('sector-post')){
 $navclass = 'bgNavInner';
 $menuclass ='customMenuBlack';
 $brdcClass= 'head2-brd';
 $bodyClass= 'header2';
} else {
 /* $navclass = 'navbar-inverse bgNav text-right';
        $menuclass ='customMenu'; */
 $navclass = 'bgNavInner';
 $menuclass ='customMenuBlack';
 $bodyClass= 'header2';
 $brdcClass= 'head2-brd';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php vct_hook_after_head(); ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo get_template_directory_uri();?>/images/favicon.png" rel="shortcut icon" />
	
    <?php wp_head() ?>
     
    <style type="text/css">
            .navbar-brand img {
                width: 100%;
            }
    </style>
	
<script type="text/javascript">

!function(e,t,n,a,c,l,m,o,d,f,h,i){c[l]&&(d=e.createElement(t),d[n]=c[l],e[a]("head")[0].appendChild(d),e.documentElement.className+=" wf-cached"),function s(){for(d=e[a](t),f="",h=0;h<d.length;h++)i=d[h][n],i.match(m)&&(f+=i);f&&(c[l]="/**/"+f),setTimeout(s,o+=o)}()}(document,"style","innerHTML","getElementsByTagName",localStorage,"tk",/^@font|^\.tk-/,100);
</script>

<script src="https://use.typekit.net/zmy7edy.js"></script>

<script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>
<body <?php body_class($bodyClass); ?>>

<?php 
session_start();
  if(time() - $_SESSION['LAST_ACTIVITY'] > 1800) {
  ?>
<?php if ( is_front_page() ) { ?>
     <section class="loader-container" id="gone">
        <div class="loader-wrapper"></div>
        <p style="text-align:center;cursor:pointer;" id="skipintro">Skip Intro >></p>
        <img class="logo" src="<?php echo get_stylesheet_directory_uri();?>/images/inner-logo.png" alt="Economic Diplomacy Division" />
    </section> 

<?php } }
$_SESSION['LAST_ACTIVITY'] = time();
?>

<?php if ( vct_is_the_header_displayed() ) : ?>
    <?php vct_hook_before_header(); ?>
    <div class="breadCrumbs_style">
					    <?php 
				    //breadcrumbs['bread'] = array_push(get_field('hide_breadcrumbs'));
					$breadcrumbs = get_field('hide_breadcrumbs');
						
					if($breadcrumbs[0] !='Hide'){?><div class="customBrc <?php echo $brdcClass;?>">
					<?php if(function_exists('bcn_display'))
						{
							bcn_display();
						}?></div><?php }?>
					</div>
    <header id="header" class="bgNav">
        <nav class="navbar <?php echo $navclass; ?>">
            <div class="<?php echo esc_attr( vct_get_header_container_class() ); ?>">
                <div class="navbar-wrapper clearfix">
                    <div class="navbar-header">
                         <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <button type="button" class="navbar-toggle">
                                <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'visual-composer-starter' ) ?></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        <?php endif; ?>
                        <div class="navbar-brand">
                           
                            <?php //if(!(is_singular('post') || is_singular('news-post') || is_search()) || is_singular( 'sector-post' ) || is_singular( 'state-post' )){
						if ( is_front_page() || is_page(18) || is_page(20) || is_page(22) || is_page(24) || is_page(721) || is_page(26)) {
                            if ( has_custom_logo() ) :
                                $custom_logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
                            ?>
                                <a href="<?php echo esc_url( home_url() ); ?>"
                                   title="<?php bloginfo( 'name' ) ?>">
                                    <img src="<?php echo esc_url( $custom_logo[0] ) ?>" alt="<?php bloginfo( 'name' ) ?>">
                                </a>
                            <?php else : ?>
                                <a href="http://visualcomposer.io/?utm_campaign=vc-theme&amp;utm_source=vc-theme-front&amp;utm_medium=vc-theme-header" title="<?php esc_attr_e( 'Visual Composer Starter', 'visual-composer-starter' ) ?>">
                                    <img width="50" height="49" src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/vct-logo.svg" alt="<?php esc_attr_e( 'Visual Composer Starter', 'visual-composer-starter' ) ?>">
                                </a>
                            <?php endif; ?>
                            <?php }else{ ?>

                            <a href="<?php echo esc_url( home_url() ); ?>"
                                   title="<?php bloginfo( 'name' ) ?>">
                                    <img src="<?php echo get_stylesheet_directory_uri();?>/images/inner-logo.png" alt="<?php bloginfo( 'name' ) ?>">
                                </a>

                            <?php } ?>
                        </div>

                        
                    </div>
                    
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <div id="main-menu">
                            <div class="button-close"><span class="vct-icon-close"></span></div>
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu_class'     => 'nav navbar-nav marT38'.' '.$menuclass,
                                'container'      => '',
                            ) );
                            ?>
                            <div class="header-widgetised-area">
                            <?php if ( is_active_sidebar( 'menu' ) ) : ?>
                                <?php dynamic_sidebar( 'menu' ); ?>
                            <?php endif; ?>
                            </div>
                        </div><!--#main-menu-->
                    <?php endif;?>
                    <style>
                    
/*
                        .breadCrumbs_style{
                            background: none;
                            margin-top: 50px;
                        }
                        .navbar-fixed-top .breadCrumbs_style{
                            background: #fff;
                            margin-top: 22px;
                            display: block;
                            height: 27px;
                            padding: 0 5px;
                        }
*/
                    </style>
					
					
                </div><!--.navbar-wrapper-->
            </div><!--container-->
        </nav>

    
            <!-- <?php //if ( is_singular() ) : ?>
            <div class="header-image">
                <?php //visualcomposerstarter_header_featured_content(); ?>
            </div>
            <?php //endif; ?> -->
            
    </header>
<!--    <div class="container breadCrumbs_style" style="margin-top:120px;">-->
					    <?php 
				    //breadcrumbs['bread'] = array_push(get_field('hide_breadcrumbs'));
					//$breadcrumbs = get_field('hide_breadcrumbs');
						
					//if($breadcrumbs[0] !='Hide'){?>
					<div class="customBrc <?php// echo $brdcClass;?>">
					<?php //if(function_exists('bcn_display'))
						//{bcn_display();}?>
						</div>
						<?php //}?>
<!--					</div>-->
    <?php
    if (  is_front_page() ) {?>
    <!--- Full Page Image Background Carousel Header -->
    <section id="myCarousel" class="carousel slide">
        <!-- Indicators -->
       <!--  <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol> -->

        <!-- Wrapper for Slides -->
        <!-- <div class="carousel-inner"> -->
            <!-- <div class="item active"> -->
                <!-- Set the first background image using inline CSS below. -->
               <!--  <div class="fill" style="background-image:url(<?php echo get_stylesheet_directory_uri();?>/images/home_banner.jpg);"></div>
                <div class="carousel-caption">
                                             <h2><span>India and the<br>
                        wider World</span> <br/>
                                                A World of Opportunities<br>
                        as doors open</h2>
                </div>
            </div>
            <div class="item"> -->
                <!-- Set the second background image using inline CSS below. -->
                <!-- <div class="fill" style="background-image:url(<?php echo get_stylesheet_directory_uri();?>/images/home_banner.jpg);"></div>
                <div class="carousel-caption">
                     <h2><span>India and the<br>
wider World</span> <br/>
                        A World of Opportunities<br>
as doors open</h2>
                </div>
            </div>
            <div class="item"> -->
                <!-- Set the third background image using inline CSS below. -->
              <!--   <div class="fill" style="background-image:url(<?php echo get_stylesheet_directory_uri();?>/images/home_banner.jpg);"></div>
                <div class="carousel-caption">
                     <h2><span>India and the<br>
wider World</span> <br/>
                        A World of Opportunities<br>
as doors open</h2>
                </div>
            </div>-->
        <!-- </div>  -->
        
        
         <?php echo do_shortcode('[rev_slider alias="portfolio-homepage-v2"]');?>
        
    <div class="btnPart">
   
            <?php 
        $postid = 4094; 
       if ( get_field('box_one_hide_or_show', $postid) == true ) { 

                $style = 'display:none';

                } else { 

                $style = '';

            } ?>
        <div class="spotlight" style="<?php echo $style; ?>">
      
                    <div class="flag_section">
                        <img class="flag_img img_1" src="<?php 
          $postid = 4094;                                                              
    the_field('box_one_image', $postid); ?>">
                        <!-- <img class="flag_img img_2" src="<?php //echo get_stylesheet_directory_uri();?>/images/switzerland.jpg" -->
                        <span class="spot_text">SPOTLIGHT</span>
                    </div>
                   
                    <div class="countries"><a href="<?php 
          $postid = 4094;                                                              
    the_field('box_one_url', $postid); ?>">
                        <span class="country">  <?php 
          $postid = 4094;                                                              
    the_field('box_one_spotlight_title', $postid); ?></span></a>
                    </div>
                </div><!--spotlight-->
                
        <div class="invertBtn"><?php 
          $postid = 4094;                                                              
    the_field('box_two_title', $postid); ?> <img src="<?php echo get_stylesheet_directory_uri();?>/images/iconArrow.png"  style="vertical-align:middle">
                <div class="small_content"><a href="<?php $postid = 4094;  the_field('box_two_url', $postid); ?>">
					<?php 
          $postid = 4094;                                                              
    the_field('box_two_content', $postid); ?></a></div></div>
                 
		<div class="tradeBtn"><?php 
          $postid = 4094;                                                              
    the_field('box_three_title', $postid); ?>  <img src="<?php echo get_stylesheet_directory_uri();?>/images/iconArrow.png"  style="vertical-align:middle"><div class="small_content"><a href="<?php $postid = 4094;  the_field('box_three_url', $postid); ?>"><?php 
          $postid = 4094;                                                              
    the_field('box_three_content', $postid); ?></a></div></div>
               </div>
                </div><!--btnpart-->
       
     
    </section><?php }else if(is_page_template( 'static-template.php' )){?>
<!--- Full Page Image Background Carousel Header -->
    <section id="myCarousel" class="">
        <!-- Indicators -->
       <!--  <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol> -->

        <!-- Wrapper for Slides -->
        <?php //echo do_shortcode('[rev_slider alias="rev"]');?>
       
    </section>

        <?php }else{}
		$_SESSION['LAST_ACTIVITY'] = time();
		?>
    <?php vct_hook_after_header(); ?>
<?php endif;