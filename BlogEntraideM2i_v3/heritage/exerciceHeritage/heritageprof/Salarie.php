<?php

// --- Salarie.php

require_once("Personne.php");

class Salarie extends Personne {

    private $salaire;

    public function __construct($nom, $prenom, $age, $salaire) {
        parent::__construct($nom, $prenom);
        $this->age = $age;
        $this->salaire = $salaire;
    }

    public function getSalaire() {
        return $this->salaire;
    }

    public function setSalaire($salaire) {
        $this->salaire = $salaire;
    }

}

?>