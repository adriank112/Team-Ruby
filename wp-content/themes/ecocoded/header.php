<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecocoded
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="./esport-x-gaming/style.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#content"> <?php _e( 'Skip to content', 'ecocoded' ); ?></a>
	<div id="page" class="site <?php if ( get_theme_mod( 'hide_sidebar' ) == '1' ) : ?>hide-sidebar<?php endif; ?>">

		<header id="masthead" class="sheader site-header clearfix">
			<nav id="primary-site-navigation" class="primary-menu main-navigation clearfix">

				<a href="#" id="pull" class="smenu-hide toggle-mobile-menu menu-toggle" aria-controls="secondary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'ecocoded' ); ?></a>
				<div class="top-nav-wrapper">
					<div class="content-wrap">
						<div class="logo-container"> 

							<?php if ( has_custom_logo() ) : ?>
								<?php the_custom_logo(); ?>
								<?php else : ?>
									<a class="logofont" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
								<?php endif; ?>
  <div class="site-header__util">
  <?php if ( is_user_logged_in() ) : ?>
    <a href="<?php echo wp_logout_url(); ?>" class="btn btn-outline-light btn-sm btn--with-photo" style="background-color: #C70039;">
      <span class="site-header__avatar"><?php echo get_avatar( get_current_user_id(), 20 ); ?></span>
      <span class="btn__text">Log Out</span>
    </a>
  <?php else : ?>
    <a href="<?php echo wp_login_url(); ?>" class="btn btn-outline-light btn-sm push-right" style="background-color: #C70039;">Login</a>
    <a href="<?php echo esc_url( site_url( '/wp-signup.php' ) ); ?>" class="btn btn-outline-light btn-sm" style="background-color: #C70039;">Sign Up</a>
  <?php endif; ?>
</div>
							</div>
							<div class="center-main-menu"> 
								<?php
								wp_nav_menu( array(
									'theme_location'	=> 'menu-1',
									'menu_id'			=> 'primary-menu',
									'menu_class'		=> 'pmenu'
								) );
								?>
								
							</div>
						</div>
					</div>
				</nav>

				<div class="super-menu clearfix">
					<div class="super-menu-inner">
						

						<?php if ( has_custom_logo() ) : ?>
							<?php the_custom_logo(); ?>
							<?php else : ?>
								<a class="logofont" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							<?php endif; ?>
							<a href="#" id="pull" class="toggle-mobile-menu menu-toggle" aria-controls="secondary-menu" aria-expanded="false"></a>
						</div>
					</div>
					<div id="mobile-menu-overlay"></div>

					<!-- Header bg start-->
					<?php if ( is_front_page() ) : ?>
						<!-- Header img -->
						<?php if (get_theme_mod('header_img_text') || get_theme_mod('header_img_text_tagline') ) : ?>
						<div class="header-content-wrap-outer">
							<div class="header-content-wrap">
									<div class="bottom-header-title">
									    <img src="<?php echo get_theme_file_uri('logo_img.png');?>" class="img-res" alt="">
									</div>
								<!-- Button-->
								<?php if ( get_theme_mod( 'header_button_text') ) : ?>
									<div class="buttons-wrapper">
										<?php if (get_theme_mod('header_button_text') ) : ?>
											<a href="<?php echo esc_url(get_theme_mod('header_button_link')) ?>" class="header-button-solid"><?php echo wp_kses_post(get_theme_mod('header_button_text')) ?></a>
										<?php endif; ?>
										
									</div>
								<?php endif; ?>
								<!--Buttons -->
								
							</div>
							
						</div>
					<?php endif; ?>
				<?php endif; ?>
				<!-- Header bg start-->
			</header>


			<!-- Top widgets start -->
			<div class="content-wrap">
				<!-- Upper widgets -->
				<div class="header-widgets-wrapper">
					<?php if ( is_active_sidebar( 'headerwidget-1' ) ) : ?>
						<div class="header-widgets-three header-widgets-left">
							<?php dynamic_sidebar( 'headerwidget-1' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'headerwidget-2' ) ) : ?>
						<div class="header-widgets-three header-widgets-middle">
							<?php dynamic_sidebar( 'headerwidget-2' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'headerwidget-3' ) ) : ?>
						<div class="header-widgets-three header-widgets-right">
							<?php dynamic_sidebar( 'headerwidget-3' ); ?>				
						</div>
					<?php endif; ?>
				</div>
			</div>


			<div id="content" class="site-content clearfix">
				<div class="content-wrap">