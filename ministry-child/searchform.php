<?php
/**
 * Search form template.
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

?>
<form role="search" method="get" class="search-form" id="pop_up_search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form_div">
	    <label>
		    <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'visual-composer-starter' ); ?></span>
	        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'visual-composer-starter' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	        <button type="submit" class="search-submit fa fa-search"></button>
	        <!--<span class="screen-reader-text"><?php //echo esc_html_x( 'Search', 'submit button', 'visual-composer-starter' ); ?></span>-->
        </label>
        <button class="fa fa-times close_btn" type="button"></button>
    </div>
</form>
