<?php

// Front Controller

$controllerFolder = __DIR__.'/controllers';
$templateFolder = __DIR__.'/views'; // Template = Vue. C'est la meme chose.
require_once(__DIR__.'/autoload.php'); // Le modele est full objet donc l'autoloader suffira

if (isset($_GET['action']) && !empty($_GET['action']))
{
    // Une implementation tres basique de ce qu'on appelle un
    // un Router ou un RoutingDispatcher
    // En effet TOUTES les requetes viennent sur cet index.php
    // L'action (la page) est determinee par le parametre GET
    // Le role du RoutingDispatcher est d'analyser ce parametre
    // pour rediriger vers le bon subcontroller
    switch ($_GET['action'])
    {
        case 'page1':
            require_once($controllerFolder.'/controller1.php');
            break;

        default:
            // Action inconnue = 404
            require_once($controllerFolder.'/controller404.php');
    }

    // Les 'vrais' RoutingDispatchers font aussi l'autre sens :
    // ils sont capables de generer une URL vers le "controller1" par
    // exemple (pour generer des <a> automatiquement depuis les vues).

    // Du coup si on veut changer les URLs on ne le fait qu'une fois dans
    // le RoutingDispatcher et non pas a la fois dans le Front Controller et les vues.
}
else
{
    // Controleur par defaut faute de parametre (page d'accueil)
    require_once($controllerFolder.'/controllerWelcome.php');
}
