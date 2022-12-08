<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package igc31w
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<style>
	  .site__header { background-color:<?= get_theme_mod("site__title__background"); ?>;}
	  </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'igc31w' ); ?></a>
 
	<header id="masthead" class="site__header">
	<?php 
		wp_nav_menu(array(
			"menu" => "primaire",
			"container"=> "nav",
			"container_class"=> "menu__primaire",
		))
	?>
		<div class="site__branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$igc31w_description = get_bloginfo( 'description', 'display' );
			if ( $igc31w_description || is_customize_preview() ) :
				?>
				<p class="site__description"><?php echo $igc31w_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->
	<aside class="site__menu">
	<input type="checkbox" id="chkBurger" class="chkBurger">
	<label for="chkBurger" class="burger">
		<code>&#10148;</code>
	</label>
	<?php 
		wp_nav_menu(array(
			"menu" => "aside",
			"container"=> "nav",
			"container_class"=> "menu__aside",
		))
	?>
	</aside>
	<aside class="site__sidebar">
			<h6>Calendrier</h6>
			<?php get_sidebar( 'aside-1' ); ?>
			<?php get_sidebar( 'aside-2' ); ?>
	</aside>