<?php
    // --- Salarie.php

    require_once("Personne.php");

    class Salarie extends Personne {
        private $salaire;

        public function __construct($nom, $age, $salaire) {
            $this->nom = $nom;
            $this->age = $age;
            $this->salaire = $salaire;
        }
        public function __set($var, $valeur) { $this->$var = $valeur; }
        public function __get($var) { return $this->$var; }
    }
?>
