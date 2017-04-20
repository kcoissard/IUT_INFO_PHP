<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <Title> Liste des films </title>
</head>


<body>

    <h1> Liste des films </h1>

    <?php 
			include 'fonctions/afficher_table.php';
			afficher_table();
		?>

        <p>
            <a href="ajout_film.php">Ajout film</a> -
            <a href="ajout_acteur.php">Ajout acteur</a> -
            <a href="ajout_casting.php">Ajout rôle</a>
        </p>

</body>

</html>
