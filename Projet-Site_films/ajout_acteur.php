<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <Title> Ajout acteur </title>
</head>

<body>

    <form name="ajout_acteur" action="fonctions/ajouter_acteur.php" method="POST">
        <table border="0">
            <tr>
                <h3>Acteur à ajouter</h3>
                <td>Prénom : </td>
                <td>
                    <input type="text" name="prenom" maxlength="20" required>
                </td>
            </tr>

            <tr>
                <td>Nom : </td>
                <td>
                    <input type="text" name="nom" maxlength="20" required>
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
