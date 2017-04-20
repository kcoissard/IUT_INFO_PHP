<!-- Le dernier appele : lui il fait vraiment l'affichage -->
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $layoutParams['title']; ?></title>
        <meta charset="utf=8" />
    </head>
    <body>
        <div id="specificcontent">
            <?php echo $layoutParams['content']; ?>
        </div>
        <nav>
            <a href="?">Accueil</a> -
            <a href="?action=page1">Films</a> -
            <a href="?action=pageX">Page inexistante</a>
        </nav>
    </body>
</html>
