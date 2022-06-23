<?php

// --- Salarie.php

require_once 'Personne.php';

class Salarie extends Personne {

    private $salaire;

    public function __construct($nom, $prenom, $age, $salaire) {

        Personne::__construct($nom, $prenom);


        //$this->nom = $nom;
        $this->age = $age;
        $this->salaire = $salaire;
       // $this->prenom = $prenom;
    }

    public function getSalaire() {
        return $this->salaire;
    }

    public function getAge() {
        return $this->age;
    }

}

?>
