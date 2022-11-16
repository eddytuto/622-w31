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
		<code>front-page.php</code>
		<?php  wp_nav_menu(array(
			"menu" => "evenement",
			"container" => "nav",
			"container_class" => "evenement"
		));




		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) :
				the_post(); ?>
			<h1><?= get_the_title(); ?></h1>

			<?php the_content();
			$le_permalien = "<a href='" . get_the_permalink() . "'>Suite</a>";
			?>
			
			<blockquote><?php the_excerpt(); ?></blockquote>
			<blockquote><?= wp_trim_words(get_the_excerpt(),5, $le_permalien); ?></blockquote>
			


<?php
			endwhile;
			endif;	
		?>
	</main><!-- #main -->
<?php
get_footer();

