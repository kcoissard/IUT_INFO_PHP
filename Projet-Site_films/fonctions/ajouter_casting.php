<?php 
  if(isset($_POST['id_acteur']) AND isset($_POST['id_film']))
  {
    if($_POST['id_acteur'] != NULL AND $_POST['id_film'] != NULL)
    {
           
      // Connexion à la BDD
      include 'connectDb.php';
      $bdd = connectDb(); 

      // Sécurité injections HTML
      //id_acteur:
      $id_acteur= htmlspecialchars($_POST['id_acteur']);
      //id_film:
      $id_film = htmlspecialchars($_POST['id_film']);


      $query=$bdd->prepare("SELECT * FROM `CASTING` WHERE id_acteur=? AND id_film=?");
      $query->execute(array($_POST['id_acteur'], $_POST['id_film']));

      $nb_tuples=0;
      $nb_tuples=$query->rowCount(); //on cherche s'il y a déjà une personne avec le même id_film et id_film


      if($nb_tuples==0) // si c'est le cas on l'ajoute pas à la bdd
      {
        //exécution de la requête SQL:

        $query=$bdd->prepare('INSERT  INTO `CASTING` (id_acteur, id_film) VALUES (?, ?)');
        $query->execute(array($id_acteur, $id_film));
        echo 'L\'ajout a bien été effectué.';
        ?> <p><a href="../index.php">Retour liste</a></p> <?php

        $query->closeCursor(); //ferme la requete conservée dans la variable afin de pouvoir la réutiliser
      }   

      else
      {
        echo 'Ce rôle éxiste déjà avec cet acteur.';
      }
    }
  }
  

?>
