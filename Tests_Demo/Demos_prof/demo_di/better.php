<?php

class House {
    private $door;

    // La House a besoin d'une Door.
    // Elle ne la construit pas elle mÃªme ! Elle la demande.
    public function __construct(Door $door) {
        $this->door = $door;
    }

    // Le boulot qu'on demande Ã  une maison, c'est de s'ouvrir.
    // Pas de fabriquer des portes !
    public function unlock() {
        $this->door->open();
    }
}

class Door {
    private $knob;

    public function __construct(Knob $knob) {
        $this->knob = $knob;
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

class AlarmDoor  extends Door{
    public function open() {
        echo 'Alarm de-activated'."\n";
        parent::open();
    }
}

// Le client dÃ©cide quelle Door il met dans sa House ; et quelle Knob il
// met dans sa Door.
$house = new House(new AlarmDoor(new Knob()));
$house->unlock();
