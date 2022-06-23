<?php

header("Content-Type: text/html;charset=UTF-8");

require_once("Salarie.php");

// --- Instanciation d'un objet et utilisation
$tintin = new Personne("Tintin", "Reporter");
$tintin->setAge(30);
echo "La personne " . $tintin->getNom() . " " . $tintin->getPrenom() . " a " . $tintin->getAge() . " ans";

$haddock = new Salarie("Haddock", "Capitaine", 50, 3000);
echo "<br>Le salarié " . $haddock->getPrenom() . " " . $haddock->getNom() . " est âgé de " . $haddock->getAge() . " ans et gagne " . $haddock->getSalaire() . " euros";
?>