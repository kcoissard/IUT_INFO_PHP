<?php
 
include 'connectDb.php';



 
 $host="localhost"; // ou sql.hebergeur.com
      $user="p1207997";      // ou login
      $password="245447";      // ou xxxxxx
      $dbname="p1207997";
 $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.
	';charset=utf8',$user,$password);

 
  //récupération des valeurs des champs:
  //intitule:
  $intitule     = $_POST["intitule"] ;
  //annee_film:
  $annee_film = $_POST["annee_film"] ;
  //score:
  $score = $_POST["score"] ;
 
 
 if (($_POST['intitule'] == $intitule) AND ($_POST['annee_film'] == $annee_film))
		{
			echo 'Ce film existe deja.';
		}
		else{
  //exécution de la requête SQL:
  $query=$pdo->prepare('INSERT  INTO `p1207997`.`FILMS` (intitule, annee_film, score)
            VALUES (?, ?, ?)');
 
 $query->execute(array($intitule, $annee_film, $score));
		}
?>