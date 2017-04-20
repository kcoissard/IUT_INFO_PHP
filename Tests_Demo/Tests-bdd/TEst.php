<html>

<head>
    <meta charset="utf-8" />

       <link rel="stylesheet" href="style.css" />
    <Title> Liste des films </title>
</head>

<?php 
include 'afficher_table.php';
	$sql=afficher_table();
	while($donnees = $sql->fetch())
{
echo $donnees['nom_film'];
echo $donnees['annee_film'];
echo $donnees['score'];
}
?>

<table>
<tr>
<td><?php echo $donnees['nom_film'];?></td>
<td><?php echo $donnees['annee_film'];?></td>
<td><?php echo $donnees['score'];?></td>
</tr>
</table>

<body>
<h1> Liste des films </h1>




</body>



</html>