<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <Title> Ajout rôle (casting) </title>
</head>

<body>

    <h3>Rôle à ajouter</h3>
    <form name="ajout_casting" action="fonctions/ajouter_casting.php" method="POST">
        <table>
            <tr>
                <td>Acteurs : </td>
                <td>
                    <select name="id_acteur" style="width:130px">
                        <?php
                // connexion à la bdd
                include 'fonctions/connectDb.php';
                $bdd = connectDb(); 

                //requete pour afficher les acteurs
                $query=$bdd->prepare("SELECT * FROM `ACTEURS` ORDER BY nom");
                $query->execute();

                //tant qu'il y en a on affiche
                while ($donnees = $query->fetch())
                {
              ?>
                            <option value="<?php echo $donnees['id_acteur']?>">
                                <?php echo $donnees['prenom'] . ' ' . $donnees['nom']; ?>
                            </option>
                            <?php
                }
               ?>
                    </select>
                </td>
            </tr>

            <table>
                <tr>
                    <td>Films : </td>
                    <td>
                        <select name="id_film" style="width:130px">
                            <?php
                $query->closeCursor();

                //requete pour afficher les acteurs
                $query=$bdd->prepare("SELECT * FROM `FILMS` ORDER BY nom_film");
                $query->execute();

                //tant qu'il y en a on affiche
                while ($donnees = $query->fetch())
                {
              ?>
                                <option value="<?php echo $donnees['id_film']?>">
                                    <?php echo $donnees['nom_film'] . ' - ' . $donnees['annee_film']; ?>
                                </option>
                                <?php

                }
                $query->closeCursor();
               ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" value="Ajouter">
                    </td>
                </tr>
            </table>
    </form>


    <p><a href="index.php">Retour liste</a></p>

</body>

</html>
