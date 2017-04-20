<?php 
  if(isset($_POST['nom_film']) AND isset($_POST['annee_film'])
                                AND isset($_POST['score']))
  {

         
    // Connexion à la BDD
    include 'connectDb.php';
    $bdd = connectDb(); 

    // Sécurité injections HTML
    //nom_film:
    $nom_film = htmlspecialchars($_POST['nom_film']);
    //annee_film:
    $annee_film = htmlspecialchars($_POST['annee_film']);
    //score:
    $score = htmlspecialchars($_POST['score']);

    $query=$bdd->prepare("SELECT * FROM `FILMS` WHERE nom_film=? AND annee_film=?"); // deux films ne peuvent pas avoir le même nom et la même année
    $query->execute(array($_POST['nom_film'], $_POST['annee_film']));                           

    $nb_tuples=0;
    $nb_tuples=$query->rowCount(); //on cherche s'il y a déjà un film ayant le même nom et la même année


    if($nb_tuples==0) // si c'est le cas on l'ajoute pas à la bdd
    {
      //exécution de la requête SQL:

      $query=$bdd->prepare('INSERT  INTO `FILMS` (nom_film, annee_film, score) VALUES (?, ?, ?)');
      $query->execute(array($nom_film, $annee_film, $score));
      echo 'Le film ' . $nom_film . ' ' . 'a bien été ajouté à la base de données.';
      ?> <p><a href="../index.php">Retour liste</a></p> <?php
    }   

    else
    {
      ?> 

        <p style="margin-top: 100px; text-align: center;"><?php echo 'Le film <strong>' . $nom_film . '</strong>' . ' sorti en  <strong>' . $annee_film . '</strong>' . ' est déjà dans la base de données.' ?> <br>
          <br> <br>Voulez-vous le modifier ? <br>

          <!-- Ici on redirige vers index.php si "non" est coché, sinon on va sur la page de modification -->
         <form name="validation_modif_film" action="confirmation_modification_film.php" method="POST" style="text-align: center;">

            <input type="radio" name="modif" value="non"> Non
            <input type="radio" name="modif" value="oui"> Oui<br>
            <input type="submit" value="Envoyer">
          </form> 

        </p>

      <?php
      
      $query->closeCursor(); //ferme la requete conservée dans la variable afin de pouvoir la réutiliser
    }
  }


 
?>
