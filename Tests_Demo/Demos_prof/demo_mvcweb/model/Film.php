<?php

// Volontairement simple, mais au moins
// vous voyez la syntaxe de l'acces aux attributs
class Film
{
    private $titre;

    public function __construct($titre)
    {
        $this->titre = $titre;
    }

    public function getTitre()
    {
        return $this->titre;
    }
}
