<?php
$titre = get_the_title();
$code_cours = substr($titre,0,7);
$heure_cours = substr($titre,strrpos($titre,'('));
$titre = substr($titre,8);
$titre = substr($titre, 0, strrpos($titre,'('));
$le_permalien = "<a href='" . get_the_permalink() . "'>Suite</a>";
?>
<article class="grille__article">
    <h6><?=  $titre;  ?></h6>
    <p><?= wp_trim_words(get_the_excerpt(), 10,$le_permalien) ; ?></p>
    <p>Type de cours:<?php the_field("type_de_cours") ?></p>
    <p>TIM - Collège de Maisonneuve</p>
</article>