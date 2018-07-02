<?php
/**
 * Template Name: Dashboard
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

get_header(); ?>

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
<!-- filter navigation STARTS------>
<div id="filterdashboard" class="portfolio-filter container-fluid clearfix">
            <ul id="filters">
                <li class="col-md-3">
                   <div class="maroon">
                       <a href="#gdp" id="gdp" data-filter=".gdp" class="current">GROSS DOMESTIC PRODUCT</a>
                   </div>
                </li>
                <li class="col-md-3">
                   <div class="red">
                        <a href="#fdi" id="fdi" data-filter=".fdi">FOREIGN DIRECT INVESTMENT</a>
                   </div>
                </li>
                <li class="col-md-3">
                   <div class="darkorange">
                        <a href="#ranking" id="ranking" data-filter=".ranking">RANKING</a>
                   </div>
                </li>
                <li class="col-md-3">
                    <div class="lightorange">
                        <a href="#indicators" id="indicators" data-filter=".indicators">OTHER INDICATORS</a>
                    </div>
                </li>
            </ul>
        </div>
   <!-- filter navigation ENDS------> 
	<!-- Dashboard Masonry STARTS--------->
		<div class="grid custom-container">
        
					 <div class="col-xs-12 col-md-3 div-mb gdp">
                      <div class="masonry-content1 greyBox1 gdpcustombg">
                            <h3 class="h3style">india gdp </h3>
                            <p class="masonry-para">Driven by digitisation, favourable demographics, globalisation and structural reforms</p>
                      </div>
                    </div>
			
                    <div class="col-xs-12 col-md-3 div-mb gdp">
                      <div class="masonry-content1 greyBox1">
                            <h3 class="h3style">gdp growth rate</h3>
                         <div id="gdpgrowth"></div>
                         
                      </div>
                    </div>
                    
                    <div class="col-xs-12 col-md-3 div-mb gdp">
                       <div class="masonry-content1 greyBox1">
                           <h3 class="h3style">Size of the economy</h3>
						   <p>Trillion US$</p>
                           <div id="economygrowth"></div>
                           
                       </div>
                    </div>
                    
                    <div class="col-xs-12 col-md-3 div-mb gdp">
                      <div class="masonry-content1 greyBox1">
                           <h3 class="h3style">Sectoral contribution to GDP</h3>
                           <div id="gdppie"></div>
                          
                       </div>
                    </div>
                    
                    <div class="col-xs-12 col-md-3 div-mb gdp">
                      <div class="masonry-content1 greyBox1">
                           <h3 class="h3style">Gross Fiscal Deficit</h3>
						                <p>Billion US$</p>
                           <div id="gdpfiscal"></div>
                          
                       </div>
                    </div>
                    
                    
                    
                    <div class="col-xs-12 col-md-3 div-mb gdp">
                      <div class="masonry-content1 greyBox1 gdpcustombg2">
                            <h3 class="h3style">India's Total Export 2017-2018</h3>
						  <p style="color: #fff;">Apr - Feb, Billion US$</p>
                            <h2 class="percentage-style">273.7</h2>
                      </div>
                    </div>
                    
                    <div class="col-xs-12 col-md-3 div-mb gdp">
                      <div class="masonry-content1 greyBox1 gdpcustombg3">
                            <h3 class="h3style">India's Total Import 2017-2018</h3>
						  <p style="color: #fff;">Apr - Feb, Billion US$</p>
                            <h2 class="percentage-style"> 417</h2>
                            
                      </div>
                    </div>
                    
                    <div class="col-xs-12 col-md-3 div-mb gdp">
                      <div class="masonry-content1 greyBox1">
                           <h3 class="h3style">Top 5 Countries of Import</h3>
						  <p>Apr-Oct, Billions US$</p>
                           <div id="topimportcountries"></div>
                           <ul class="signdetailed">
							  <li><i class="fa fa-square orange-sign"></i>2016</li>
							   <li><i class="fa fa-square yellow-sign"></i>2017</li>
						  </ul>
						 
                       </div>
                    </div>
                    
                    <div class="col-xs-12 col-md-3 div-mb gdp">
                      <div class="masonry-content1 greyBox1">
                           <h3 class="h3style">Top 5 Countries of Export</h3>
						  <p>Apr-Oct, Billions US$</p>
                           <div id="topexportcountries"></div>
                          <ul class="signdetailed">
							  <li><i class="fa fa-square orange-sign"></i>2016</li>
							   <li><i class="fa fa-square yellow-sign"></i>2017</li>
						  </ul>
						  <p class="masonry-para"></p>
                       </div>
                    </div>
                                        
                    
                    
                    
<!-------------------------------------------------
===================================================                   
             fdi starts 
===================================================
-------------------------------------------------->
			<div class="col-xs-12 col-md-3 div-mb fdi">
                      <div class="masonry-content1 greyBox1 gdpcustombg3">
                            <h3 class="h3style">India foreign direct investment </h3>
                            <p class="masonry-para">A favourable destination for global capital</p>
                      </div>
                    </div>
			
               <div class="col-xs-12 col-md-3 div-mb fdi">
                      <div class="masonry-content1 greyBox1">
                           <h3 class="h3style">FDI Equity inflows 2017</h3>
						   <p>April – Dec, 2017 ; Billion US$</p>
                           <div id="fdiequityinflows"></div>
                          
                       </div>
                    </div>
                    
                    <div class="col-xs-12 col-md-3 div-mb fdi">
                      <div class="masonry-content1 greyBox1">
                           <h3 class="h3style">Sector-wise FDI Equity Inflows</h3>
						   <p>April – Dec, 2017 ; Billion US$</p>
                           <div id="fdihighestinflows"></div>
                       </div>
                    </div>
                     <div class="col-xs-12 col-md-3 div-mb fdi">
                      <div class="masonry-content1 greyBox1">
                           <h3 class="h3style">Top investing countries</h3>
						   <p>April – Dec, 2017 ; Billion US$</p>
                           <div id="fdicumulativeinflows"></div>
                          
                       </div>
                    </div>
                    
                    
                    
                    <div class="col-xs-12 col-md-3 div-mb fdi">
                      <div class="masonry-content1 greyBox1 gdpcustombg">
                            <h3 class="h3style">State-wise FDI Equity Inflows 2017-18</h3>
                            <p style="color: #fff !important;">Billion US$</p>
                            <ul>
                                <li>Maharashtra</li>
                                <li>Delhi (NCR)</li>
                                <li>Karnataka</li>
                                <li>Tamil Nadu</li>
                                <li>Gujarat</li>
                            </ul>
                      </div>
                    </div>
                    
<!-------------------------------------------------
===================================================                   
            ranking starts 
===================================================
-------------------------------------------------->
                 <div class="col-xs-12 col-md-3 div-mb ranking">
                      <div class="masonry-content1 greyBox1 gdpcustombg2">
                            <h3 class="h3style">ranking</h3>
                            <p class="masonry-para">Recognition at different global platforms</p>
						 
                      </div>
                    </div>  
                   
                    
                <div class="col-xs-12 col-md-3 div-mb ranking">
                  <div class="masonry-content1 greyBox1">
                        <h3 class="h3style">CREDIT RATING</h3>
                        <div class="div-left1">
                          <h6>Moody's</h6>
                           <h3 class="title-bold">Baa3</h3>
                           <span>(Positive)</span>
                        </div>
                       <div class="div-left2 text-left">
                           <h6>S&amp;P</h6>
                           <h3 class="title-bold">BBB-</h3>
                           <span>(Stable)</span>
                       </div>
                       <div class="div-left1">
                          <h6>Fitch</h6>
                           <h3 class="title-bold">BBB</h3>
                           <span>(Stable)</span>
                        </div>
                  </div>
                </div>
                    
                <div class="col-xs-12 col-md-3 div-mb ranking">
                      <div class="masonry-content1 greyBox1 gdpcustombg">
                           <h3 class="h3style">Ease of doing business ranking </h3>
                            <h2 class="percentage-style"> 100</h2>
					                  <p class="masonry-para">World Bank Data 2017</p>
                            <h2 class="percentage-style"> 130</h2>
                            <p class="masonry-para">World Bank Data 2016</p>
                       </div>
                    </div>
                
                <div class="col-xs-12 col-md-3 div-mb ranking">
                      <div class="masonry-content1 greyBox1 gdpcustombg1">
                            <h3 class="h3style">Getting Credit</h3>
            						    <h2 class="percentage-style">44</h2>
              						  <p class="masonry-para">World Bank Data 2016</p>
                            <h2 class="percentage-style">29</h2>
                            <p class="masonry-para">World Bank Data 2017</p>
                       </div>
                    </div>
                    
                 <div class="col-xs-12 col-md-3 div-mb ranking">
                      <div class="masonry-content1 greyBox1 gdpcustombg2">
                           <h3 class="h3style">Paying Taxes</h3>
						  <h2 class="percentage-style"> 119</h2>
						  <p class="masonry-para">World Bank Data 2017</p>
              <h2 class="percentage-style"> 172</h2>
              <p class="masonry-para">World Bank Data 2016</p>
                       </div>
                    </div>
                
                <!-- <div class="col-xs-12 col-md-3 div-mb ranking">
                      <div class="masonry-content1 greyBox1 gdpcustombg3">
                           <h3 class="h3style">Protecting Minority Investors </h3>
						  <h2 class="percentage-style"> 13</h2>
						  <p class="masonry-para">World Bank Data 2016</p>
                         
                       </div>
                    </div>  -->       
<!-------------------------------------------------
===================================================                   
            indicators starts 
===================================================
-------------------------------------------------->
			<div class="col-xs-12 col-md-3 div-mb indicators">
                      <div class="masonry-content1 greyBox1 gdpcustombg1">
                            <h3 class="h3style">other indicators</h3>
                            <p class="masonry-para">Other factors that boost the economy</p>
						 
                      </div>
                    </div>
			
                <div class="col-xs-12 col-md-3 div-mb indicators">
                      <div class="masonry-content1 greyBox1">
                            <h3 class="h3style">EXCHANGE RATE</h3>
                            <ul>
                               <?php
             
               
            if(have_rows('exchange_rate')): while(have_rows('exchange_rate')): the_row();
                 
                ?>
                                <li><?php the_sub_field('foreign_currency'); ?> - INR<span><?php the_sub_field('indian_currency'); ?></span></li>
<!--
                                <li>&pound;1 - INR<span>86.16</span></li>
                                <li>&euro;1 - INR<span>77.14</span></li>
-->
                                <?php endwhile; endif; ?>
                            </ul>
                      </div>
                    </div>  
                    
                     <div class="col-xs-12 col-md-3 div-mb indicators">
                      <div class="masonry-content1 greyBox1">
                           <h3 class="h3style">Average age in 2030 </h3>
                           <div id="averageage"></div>
                          
                       </div>
                    </div> 
                    
                     <div class="col-xs-12 col-md-3 div-mb indicators">
                      <div class="masonry-content1 greyBox1 gdpcustombg2">
                           <h3 class="h3style">  Population 2016 </h3>
						  <h2 class="percentage-style"> 1.324</h2>
						  <p class="masonry-para">Billion</p>
                          
                       </div>
                    </div>           
                    <div class="col-xs-12 col-md-3 div-mb indicators">
                      <div class="masonry-content1 greyBox1">
                           <h3 class="h3style">Labour force surplus/deficit by 2020</h3>
                           <div class="txt" style="font-size: 14px; text-align: center;">(in Million)</div>
                           <div id="labourSurplus" style="height: 300px;"></div>
                          
                       </div>
                    </div> 
                </div>
<div class="container dashboardAll portfolio-filter1">
	<div id="filterdashboard" class="portfolio-filter container-fluid clearfix">
            <ul id="filters">
                <li class="">
                    <div class="">
                        <a href="#" class="standard-button-class" id="allDashboard" data-filter="*">view all</a>&nbsp; &nbsp; &nbsp;
            						<a href="<?php echo site_url(); ?>/export_pdf/export.php" onclick="removeday()" class="custom-pdf standard-button-class" id="downloadPdf">Export As PDF
                          <!-- <img src="<?php // echo site_url(); ?>/wp-content/uploads/2017/09/001-pdf-1.png" /> -->
                        </a>
                    </div>
                </li>
            </ul>
		
        </div>
	
</div>
  <script>
   function removeday(){
 	window.location.assign("<?php echo site_url(); ?>/export_pdf/export.php")
	}
  </script>
	<!-- Dashboard Masonry ENDS------------>

	<div class="clearfix"></div>
<?php get_footer();
?>

