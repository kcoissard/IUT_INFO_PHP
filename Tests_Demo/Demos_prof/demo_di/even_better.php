<?php

class House {
    private $entrance;

    // En rÃ©alitÃ©, se coupler Ã  Door Ã©tait toujours trop
    // restrictif. Ce qu'on veut rÃ©ellement c'est quelque chose
    // qui verrouille la maison. Comment open() marche ? Rien Ã  faire.
    // Y a-t-il une poignÃ©e ? On s'en fiche. On veut juste la garantie
    // que notre entrÃ©e puisse s'ouvrir : qu'elle possÃ¨de donc la mÃ©thode
    // open() sans se soucier de son implÃ©mentation.
    public function __construct(IAccessControl $entrance) {
        $this->entrance = $entrance;
    }

    public function unlock() {
        $this->entrance->open();
    }
}

// C'est exactement le principe d'une interface.
// Une interface dÃ©finit des comportements.
interface IAccessControl {
    function open();
}

// En implÃ©mentant "IAccessControl", SimpleDoor dit simplement
// "Hey, je sais comment m'ouvrir ! Fais-moi confiance".
// C'est tout ce qui intÃ©resse House :)
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

$houseA = new House(new AlarmDoor(new Knob()));
$houseA->unlock();
$houseB = new House(new SlidingDoor());
$houseB->unlock();
