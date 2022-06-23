<?php
    header("Content-Type: text/html;charset=UTF-8");

    require_once 'Salarie.php';
    require_once 'Personne.php';

    // --- Instanciation d'un objet et utilisation
    $tintin = new Personne("Tintin", "will");
    echo $tintin->getNom() . " " . $tintin->getPrenom();
    
    $haddock = new Salarie("haddock" ,"will" ,30 , 3000);
    echo "<br>" ."". $haddock->getNom() . " " . $haddock->getPrenom() ." " . $haddock->getAge() ." " .$haddock->getSalaire();

//    $haddock = new Salarie("Haddock", 50, 3000);
//    echo "<br>Le salarié $haddock->nom est âgé de $haddock->age ans et gagne $haddock->salaire euros";
?>
