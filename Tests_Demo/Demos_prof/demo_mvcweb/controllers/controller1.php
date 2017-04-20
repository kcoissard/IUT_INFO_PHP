<?php

// Le controleur interroge le modele
$factory = new ModelFactory();

$repository = $factory->createFilmRepository();
$viewParams['films'] = $repository->getAll();


// Il peut y avoir plusieurs templates par action (succes, erreur, etc.).
// C'est le controleur qui decide duquel afficher en fonction des donnees que
// le modele renvoie
if (count($viewParams['films']) === 0)
    require_once($templateFolder.'/template1_nofilms.html.php');
else
    require_once($templateFolder.'/template1.html.php');
