<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package igc31w
 */

get_header();

?>
	<main class="site__main">
		<code>---front-page.---</code>
		<?php  wp_nav_menu(array(
			"menu" => "evenement",
			"container" => "nav",
			"container_class" => "evenement"
		));
?>


<section class="grille">
	<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

			<?php if (in_category('galerie')): ?>
				<?php get_template_part( 'template-parts/accueil-galerie', '' ); ?>
				<?php else: ?>
				<?php get_template_part( 'template-parts/accueil-cours', '' ); ?>

			<?php endif; ?>
			<?php
			endwhile;
			endif;	
			?>
		</section>
	</main><!-- #main -->
<?php
get_footer();

