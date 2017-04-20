<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <Title> Modification film </title>
</head>

<body>

    <form name="ajout_film" action="fonctions/modifier_film.php" method="POST">
        <table border="0">
            <tr>
                <h3>Modification de film :</h3>
                <td>Nom du film à modifier : </td>
                <td>
                    <input type="text" name="nom_film" maxlength="50" required>
                </td>
            </tr>
            <tr>
                <td>Annee de sortie du film à modifier :</td>
                <td>
                    <input type="number" name="annee_film" min="1888" max="2016" required>
                </td>
            </tr>
            <tr>


            <tr><td> <br> </td><td> <br> </td></tr>

            <tr>
                <td>Nouveau Nom :</td>
                <td>
                    <input type="text" name="nouveau_nom_film" required>
                </td>
            </tr>
            <tr>
                <td>Nouvelle date de sortie :</td>
                <td>
                    <input type="number" name="nouveau_annee_film" min="1888" max="2016" required>
                </td>
            </tr>
            <tr>
                <td>Nouveau score du publique sur 10 :</td>
                <td>
                    <input type="text" name="nouveau_score" maxlength="3" required>
                </td>
            </tr>


            <tr>
                <td>
                    <input type="submit" value="Ajouter">
                </td>
            </tr>
        </table>
    </form>

    <p><a href="index.php">Retour liste</a></p>

</body>

</html>
