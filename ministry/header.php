<?php
/**
 * Header
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php vct_hook_after_head(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head() ?>
</head>
<body <?php body_class(); ?>>
<?php if ( vct_is_the_header_displayed() ) : ?>
	<?php vct_hook_before_header(); ?>
	<header id="header">
		<nav class="navbar">
			<div class="<?php echo esc_attr( vct_get_header_container_class() ); ?>">
				<div class="navbar-wrapper clearfix">
					<div class="navbar-header">
						<div class="navbar-brand">
							<?php
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

						</div>

						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<button type="button" class="navbar-toggle">
								<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'visual-composer-starter' ) ?></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						<?php endif; ?>
					</div>
					<?php if ( has_nav_menu( 'primary' ) ) : ?>
						<div id="main-menu">
							<div class="button-close"><span class="vct-icon-close"></span></div>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_class'     => 'nav navbar-nav',
								'container'      => '',
							) );
							?>
							<div class="header-widgetised-area">
							<?php if ( is_active_sidebar( 'menu' ) ) : ?>
								<?php dynamic_sidebar( 'menu' ); ?>
							<?php endif; ?>
							</div>
						</div><!--#main-menu-->
					<?php endif; ?>
				</div><!--.navbar-wrapper-->
			</div><!--.container-->
		</nav>
			<?php if ( is_singular() ) : ?>
			<div class="header-image">
				<?php visualcomposerstarter_header_featured_content(); ?>
			</div>
			<?php endif; ?>
	</header>
	<?php vct_hook_after_header(); ?>
<?php endif;

