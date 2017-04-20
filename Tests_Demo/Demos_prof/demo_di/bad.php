<?php

class House {
    private $door;

    // House instancie sa propre Door.
    // Elle est liÃ©eÃ  ce type concret.
    // Son utilisateur (votre client par ex.)
    // ne pourra jamais passer un autre objet, mÃªme
    // si en vrai cet objet se comporte comme
    // et fait exactement le mÃªme boulot qu' une porte.
    public function __construct() {
        $this->door = new Door();
    }

    public function unlock() {
        $this->door->open();
    }
}

class Door {
    private $knob;

    // Idem : Door est intimement liÃ© au type concret
    // Knob. On dit que le "couplage est fort".
    public function __construct() {
        $this->knob = new Knob();
    }

    public function open() {
        $this->knob->turn();
    }
}

class Knob {
    public function turn() {
        echo 'Knob turned'."\n";
    }
}

// Demain, mon client a reÃ§u un nouveau type de Door hyper mieux, et souhaiterait
// upgrader ses futures Houses (mais aussi tous les autres trucs qui
// ont des Door, comme ses Cars par exemple).
// Il doit d'abord se rappeler lui-mÃªme qui sont tous les objets qui ont une Door
// dans son appli.
// Il doit ensuite modifier leur code source... en supposant qu'il y ait accÃ¨s !

$house = new House;

// Le fond du problÃ¨me se situe dans le fait que le constructeur de House "ment".
// En ne demandant aucun paramÃ¨tre, il dit "une House n'a besoin de rien pour fonctionner",
// ce qui est faux
// Les dÃ©pendances sont cachÃ©es.
// House a trop de responsabilitÃ©s : elle fait du boulot (logique mÃ©tier) ET elle fait de
// l'instanciation (crÃ©ation de graphe d'objet).

$house->unlock();
