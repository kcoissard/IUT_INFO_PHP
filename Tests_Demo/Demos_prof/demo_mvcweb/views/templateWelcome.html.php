<?php

// Voir template1.php pour explication fonctionnement templates

$layoutParams['title'] = 'Welcome!';

ob_start();
?>
<h1>Welcome</h1>
<p>Coucou</p>
<p>Nous sommes le <?php echo $viewParams['date']; ?></p>
<?php
$layoutParams['content'] = ob_get_clean();

require_once('layout.html.php');
