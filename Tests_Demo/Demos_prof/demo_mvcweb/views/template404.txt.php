404 Not Found

He oui, c'est du texte brut et non du HTML.
Du .txt genere par PHP, c'est fou !
(Au fait, nous sommes le <?php echo $viewParams['date']; ?>).

Il peut y avoir des templates CSS dynamiques, des templates XML/JSON (webservices)...

Le controlleur envoie le header 'Content-type: text/plain'
L'extension .txt.php de ce template est purement conventionnelle,
pour voir d'un simple "ls" le format de sortie de chaque template

Forcement, ce template ne souhaite pas etre decore par le Layout HTML
Il ne l'appellera donc pas

Du coup, il n'a pas a respecter le contrat du Layout (variables titre/content).
Il fait ses affichages directement.
