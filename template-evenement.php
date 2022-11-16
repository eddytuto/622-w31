<?php
/**
 * Template name: Evenement
 *
 * @package igc31w - template
 */

get_header();

?>
<h1>single.php</h1>
	<main class="site__main">

		<?php
		if ( have_posts() ) :
			/* Start the Loop */
				the_post(); ?>
			<h1><?= get_the_title(); ?></h1>
			<?php the_content();?>
            <p>L'adresse de l'evénement<?php the_field('adresse'); ?></p>
            <p>La date et l'heure de l'événement<?php the_field('date_et_heure_de_levenement'); ?></p>
            
			<?php endif;	?>
		
	</main><!-- #main -->
<?php
get_footer();
