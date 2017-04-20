<?php

class House {
    private $entrance;

    public function __construct(IAccessControl $entrance) {
        $this->entrance = $entrance;
    }

    public function unlock() {
        $this->entrance->open();
    }
}

interface IAccessControl {
    function open();
}

class SimpleDoor implements IAccessControl {
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

class AlarmDoor extends SimpleDoor {
    public function open() {
        echo 'Alarm unlocked'."\n";
        parent::open();
    }
}

// Moi aussi je sais comment m'ouvrir !
class SlidingDoor implements IAccessControl {
    public function open() {
        echo 'Door slided'."\n";
    }
}

// Le maÃ§on !
// Il est responsable de la construction !
// En objet, on parle de la "construction du graphe d'objet"
// qui doit Ãªtre sÃ©parÃ©e de la logique mÃ©tier.
class HouseFactory {
    public function createHouse($type = 'modern') { // Parametre par defaut
        return new House(
            $this->createAccessControl($type)
        );
    }

    private function createAccessControl($type) {
        switch ($type) {
            case 'modern':
                return new AlarmDoor($this->createKnob());
            case 'old':
                return new SimpleDoor($this->createKnob());
            case 'japanese':
                return new SlidingDoor();
        }
    }

    private function createKnob() {
        return new Knob();
    }

    /*
     * Les methodes PUBLIQUES sont le CV de notre maÃ§on.
     * Les methodes PRIVEES sont ce qu'il fait au quotidien
     * pour faire son boulot.
     *
     * Ici, mÃªme si l'on utilise des Knob en interne, notre
     * boulot, c'est bien de commercialiser des maisons.
     * Si demain on souhaite aussi commercialiser des poignÃ©es
     * Ã  l'unitÃ©, alors on mettrait createKnob() en public !
     */
}

// Notre client fait appel Ã  son maÃ§on
// Il a accÃ¨s Ã  son CV via l'autocompletion
// de son Ã©diteur :)
$factory = new HouseFactory();
$houseA = $factory->createHouse('modern');
$houseA->unlock();
echo "\n\n";
$houseB = $factory->createHouse('japanese');
$houseB->unlock();
