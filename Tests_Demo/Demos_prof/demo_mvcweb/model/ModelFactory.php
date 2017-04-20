<?php

class ModelFactory
{
    public function createFilmRepository()
    {
        // Si FilmRepository avait eu un PDO comme dependance,
        // il le demanderait dans son constructeur.
        // Ce serait donc le role de cette Factory d'instancier ce PDO
        // et de l'injecter au FilmRepository
        // La Factory aurait egalement pu gerer le lifecycle des PDOs
        // (un par repository ? un unique pour toute l'appli ?)
        return new FilmRepository();
    }
}
