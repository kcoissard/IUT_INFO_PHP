<?php function afficher_liste_acteurs() {

//connexion à la BDD
include 'connectDb.php';
$bdd = connectDb(); 

// on veut le nom du film
$query = $bdd->prepare('SELECT nom_film, id_film FROM `FILMS` WHERE id_film=?'); // requête SQL
$query->execute(array($_GET['id_film'])); // paramètres et exécution
while ($donnees = $query->fetch())
{
	?>
    <h3> Liste des acteurs du film : <?php echo $donnees['nom_film']; ?> </h3>
    <?php
}
  
$query->closeCursor(); //ferme la requete conservée dans la variable afin de pouvoir la réutiliser

?>



        <?php

	$query = $bdd->prepare('SELECT casting.id_film, ACTEURS.nom, ACTEURS.prenom FROM `CASTING`, `ACTEURS`  
                                                    WHERE id_film=? AND ACTEURS.id_acteur=CASTING.id_acteur LIMIT 0 , 30'); // requête SQL
	$query->execute(array($_GET['id_film'])); // paramètres et exécution
?>

            <table border>
                <tr>
                    <td><strong>PRENOM</strong></td>
                    <td><strong>NOM</strong></td>
                </tr>

                <?php
		while($donnees = $query->fetch())
	{ ?>

                    <tr>
                        <td>
                            <?php echo $donnees['prenom']; ?>
                        </td>
                        <td>
                            <?php echo $donnees['nom']; ?>
                        </td>
                    </tr>

                    <?php
	} 
	?>
            </table>

            <?php
$query->closeCursor();

}
?>
