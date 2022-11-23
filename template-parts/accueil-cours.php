<article class="grille__article">
    <h6><?=  $titre;  ?></h6>
    <p><?= wp_trim_words(get_the_excerpt(), 10,$le_permalien) ; ?></p>
    <p>Type de cours:<?php the_field("type_de_cours") ?></p>
    <p>TIM - Collège de Maisonneuve</p>
</article>