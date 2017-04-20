<?php

// Le seul "vrai" template est le Layout.
// Comme on peut le voir, le Layout contient
// tout ce qui est generique. Pour ce qui est specifique,
// il demande a son appelant de definir les variables
// "title" et "content". C'est ce qu'on va faire.

// Le titre est court et ne contient pas de HTML
$layoutParams['title'] = 'Liste de films';

// Le contenu est plus long et avec du HTML.
// Pour faire plaisir au designer, on veut fermer la balise PHP (coloration HTML,
// completion...)
// mais on ne veut pas afficher ce contenu, puisque notre role
// c'est de le mettre dans "content" !

// On utilise donc ob_start() et ob_get_clean()
ob_start(); // met toutes les sorties dans un tampon au lieu de les afficher
?>
<h1>Films</h1>
<!-- Syntaxe PHP "mode template" : bien plus lisible que les accolades
lorsqu'on ferme souvent les balises PHP et que l'on indente son HTML -->
<?php foreach ($viewParams['films'] as $film): ?>
    <!-- Grace a l'autocompletion, le designer sait que les films ont un titre
    sans avoir a regarder la base, ni a faire de var_dump ! -->
    <p><?php echo $film->getTitre(); ?></p>
<?php endforeach; ?>
<?php
$layoutParams['content'] = ob_get_clean(); // recupere le contenu du tampon

// On a rempli le variables on peut donc appeler le Layout maintenant !
require_once('layout.html.php');
