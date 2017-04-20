<?php


  if(isset($_POST['prenom']) AND isset($_POST['nom']))
  {
    
           
    // Connexion à la BDD
    include 'connectDb.php';
    $bdd = connectDb(); 

    // Sécurité injections HTML
    //prenom:
    $prenom= htmlspecialchars($_POST['prenom']);
    //nom:
    $nom = htmlspecialchars($_POST['nom']);


    $query=$bdd->prepare("SELECT * FROM `ACTEURS` WHERE prenom=? AND nom=?");
    $query->execute(array($_POST['prenom'], $_POST['nom']));

    $nb_tuples=0;
    $nb_tuples=$query->rowCount(); //on cherche s'il y a déjà une personne avec le même nom et prénom


    if($nb_tuples==0) // si c'est le cas on l'ajoute pas à la bdd
    {
      //exécution de la requête SQL:

      $query=$bdd->prepare('INSERT  INTO `ACTEURS` (prenom, nom) VALUES (?, ?)');
      $query->execute(array($prenom, $nom));
      echo 'L\'acteur/actrice '  . $prenom . ' ' . $nom . ' a bien été ajouté à la base de données.';
      ?> <p><a href="../index.php">Retour liste</a></p> <?php

      $query->closeCursor(); //ferme la requete conservée dans la variable afin de pouvoir la réutiliser

    }   

    else
    {
      echo 'Impossible, cet acteur éxiste déjà dans la base de données';
       ?> <p><a href="../index.php">Retour liste</a></p> <?php
    }
  }


?>
