<?php

// Voir template1.php pour explication fonctionnement templates

$layoutParams['title'] = 'Aucun film !';

ob_start();
?>
<h1>Films</h1>
<p><strong>Aucun film !</strong></h1>
<?php
$layoutParams['content'] = ob_get_clean();

require_once('layout.html.php');
