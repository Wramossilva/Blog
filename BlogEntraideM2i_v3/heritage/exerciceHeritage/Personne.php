<?php

// --- Personne.php

class Personne {

    // --- Propriétés
    private $nom; // Si private c'est pareil puisque ça passe par les setters « magiques »
    private $prenom;
    protected $age;

    // --- Méthodes
    public function __construct($nom, $prenom) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        //$this->age = $age;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

//    public function getAge() {
//        return $this->age;
//    }

}

?>