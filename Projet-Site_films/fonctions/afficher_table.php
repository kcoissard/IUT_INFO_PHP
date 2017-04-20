<?php  function afficher_table() {

include 'connectDb.php';
include 'afficher_liste_acteurs.php';


$bdd = connectDb(); //connexion à la BDD

 $query = $bdd->prepare('SELECT * FROM `FILMS`ORDER BY nom_film LIMIT 0 , 15'); // requête SQL
 $query->execute(); // paramètres et exécution

?>
    <table border>
        <tr>
            <td><strong>Titre</strong></td>
            <td><strong>Année</strong></td>
            <td><strong>Score</strong></td>
            <td><strong>Acteurs</strong></td>
        </tr>
        <?php
	while($donnees = $query->fetch())
{ ?>

            <tr>
                <td>
                    <?php echo $donnees['nom_film']; ?>
                </td>
                <td>
                    <?php echo $donnees['annee_film']; ?>
                </td>
                <td>
                    <?php echo $donnees['score']; ?>
                </td>
                <td> <a href="liste_acteurs.php?id_film=<?php echo $donnees['id_film']; ?>">Voir</a></td>
            </tr>
            <?php
} ?>
    </table>
    <?php
$query->closeCursor();
}
?>
