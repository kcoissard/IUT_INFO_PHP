<?php 
  if(isset($_POST['nom_film']) AND isset($_POST['annee_film'])
                                AND isset($_POST['nouveau_nom_film']) AND isset($_POST['nouveau_annee_film']) AND isset($_POST['nouveau_score']))
  {

         
    // Connexion à la BDD
    include 'connectDb.php';
    $bdd = connectDb(); 

    // Sécurité injections HTML
    //nom_film:
    $nom_film = htmlspecialchars($_POST['nom_film']);
    //annee_film:
    $annee_film = htmlspecialchars($_POST['annee_film']);

    //nouveau_nom_film:
    $nouveau_nom_film = htmlspecialchars($_POST['nouveau_nom_film']);
    //nouveau_annee_film:
    $nouveau_annee_film = htmlspecialchars($_POST['nouveau_annee_film']);
    //nouveau score:
    $nouveau_score = htmlspecialchars($_POST['nouveau_score']);

      //Je n'arrive pas à utiliser WHERE EXISTS en mySQL donc je le fais en deux requêtes :

    //Si le film est bien présent dans la base de données on le change sinon on le dit à l'utilisateur
    $query=$bdd->prepare("SELECT * FROM `FILMS` WHERE nom_film=? AND annee_film=?"); 
    $query->execute(array($_POST['nom_film'], $_POST['annee_film']));                           
    $nb_tuples=0;
    $nb_tuples=$query->rowCount(); //on cherche s'il y a déjà un film ayant le même nom et la même année


    if($nb_tuples>=1) 
    {
      $query->closeCursor(); //ferme la requete conservée dans la variable afin de pouvoir la réutiliser

      //exécution de la requête SQL:
      $query=$bdd->prepare('UPDATE `FILMS` SET nom_film=?, annee_film=?, score=? WHERE nom_film=? AND annee_film=?');
      $query->execute(array($nouveau_nom_film, $nouveau_annee_film, $nouveau_score, $nom_film, $annee_film));

      echo 'Le film ' . $nom_film . ' sorti en ' . $annee_film . ' a bien été modifié dans la base de données.'; ?> <br> <?php
      echo ' Il s\'appel désormais ' . $nouveau_nom_film . ' sa date de sortie est en ' . $nouveau_annee_film . ' et son score est de ' . $nouveau_score . '.';
      ?> <p><a href="../index.php">Retour liste</a></p> <?php
    }
    else
    {
        echo 'Le film ' . $nom_film . ' sorti en ' . $annee_film . ' n\'éxiste pas dans la base de données.';
      ?> <p><a href="../modification_film.php">Retourner sur la page de modification</a> - <a href="../index.php">Retour liste</a></p> <?php
    }
  }   

?>
