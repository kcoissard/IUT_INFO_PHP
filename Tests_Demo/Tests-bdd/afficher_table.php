<?php  function afficher_table() {

include 'connectDb.php';


 $bdd = connectDb(); //connexion à la BDD
 $query = $bdd->prepare('SELECT * FROM `FILMS` LIMIT 0 , 30'); // requête SQL
 $query->execute(); // paramètres et exécution
 while($data = $query->fetch()) { // lecture par ligne
    echo $data['intitule'].' ', $data['annee_film'].' ', $data['score'].' '.'<br />'; // traitement de l'enregistrement
	
	} // fin des données

 $query->closeCursor();
}
?>