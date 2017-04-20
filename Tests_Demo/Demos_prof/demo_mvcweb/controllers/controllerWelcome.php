<?php

// On peut dire que la date fait partie du modele aussi,
// mais pas le notre, celui de PHP...
// C'est juste un exemple pour rendre ce controleur moins
// trivial
$viewParams['date'] = date('d/m/Y');

require_once($templateFolder.'/templateWelcome.html.php');
