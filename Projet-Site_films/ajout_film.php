<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <Title> Ajout film </title>
</head>

<body>
    <h3>Film à ajouter</h3>
    <form name="ajout_film" action="fonctions/ajouter_film.php" method="POST">
        <table border="0" >
            <tr>
                <td>Nom du film</td>
                <td>
                    <input type="text" name="nom_film" maxlength="50" required>
                </td>
            </tr>
            <tr>
                <td>Annee de sortie du film</td>
                <td>
                    <input type="number" name="annee_film" min="1888" max="2016" required>
                </td>
            </tr>
            <tr>
                <td>Score du publique sur 10</td>
                <td>
                    <input type="text" name="score" maxlength="3" required>
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
