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
		<code>inde.php</code>
		<?php
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
			
			<pre><?php the_category(); ?></pre>
			<pre><?php the_date(); ?></pre>
			<pre><?php the_permalink();  ?></pre>
			<pre><?php the_author(); ?></pre>

<?php
			endwhile;
			endif;	
		?>
	</main><!-- #main -->
<?php
get_footer();

