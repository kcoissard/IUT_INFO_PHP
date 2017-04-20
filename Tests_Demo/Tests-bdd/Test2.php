<?php

include 'connectDb.php';

// --------------------
// CONNEXION à la BdD
$pdo=connectDb();



// --------------------
// envoi de la requete :
//$select = 'SELECT * FROM `p1207997`.`FILMS` ';


$sth = $pdo->prepare("SELECT * FROM `p1207997`.`FILMS`");
$sth->execute();

/* Récupération de toutes les lignes d'un jeu de résultats */
$result = $sth->fetchAll();
// lecture et affichage des résultats : 1 résultat par ligne.
    while($row = mysql_fetch_array($result)) 
	{
?>
		<tr>
			<td><?php echo $donnees['intitule'];?></td>
			<td><?php echo $donnees['annee_film'];?></td>
			<td><?php echo $donnees['score'];?></td>
			<td><?php echo "Voir";?></td>
		</tr>
<?php
    } // fin while

?>

<!--


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Page principale</title>
	<link rel="stylesheet" href="style.css">
</head>


<body>
 

	<table id="table_resultat">
        <thead>
		<tr>
			<th>Intitule</th>
			<th>Annee</th>
			<th>Score</th>
			<th>Acteurs</th>
		</tr>
		</thead>
		
		<tbody> 

		


		</tbody>
	</table>--> 
<?php 

?>
	

 <!--
</body>
</html>
-->