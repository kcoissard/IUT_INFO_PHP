<?php

require_once(__DIR__.'/../autoload.php');

class FilmRepository
{
    public function getAll()
    {
        // simple, pas de vraie BDD, en vrai c'est ici
        // qu'on aurait les requetes SQL
        return array(
            new Film('Star Wars'),
            new Film('2001, A Space Odyssey'),
            new Film('Captain America')
            // new est OK car Film est un "ValueObject".
            // ce n'est pas un objet qui fait du boulot
            // (pas de logique mÃ©tier, et encore moins de
            // dÃ©pendances)
            // Rien n'empÃªche toutefois  d'utiliser une Factor,
            // mais c'est un peu overkill.
        );
    }

    // un vrai Repository aurait un PDO en attribut.
    // D'ailleurs, seuls les Repository ont des PDO en
    // attribut normalement !
}
