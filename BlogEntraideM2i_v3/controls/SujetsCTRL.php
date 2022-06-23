<?php

// --- SujetsCTRL.php

require_once '../daos/Connexion.class.php';
require_once '../entities/Sujets.php';
require_once '../daos/SujetsDAO.php';


try {
    $pdo = Connexion::seConnecter("../daos/bd.ini");
    $pdo->beginTransaction();

    echo '<pre>';
    var_dump($pdo);
    echo '</pre>';

    $tEnrs = SujetsDAO::selectAll($pdo);
//$sujets = filter_input(INPUT_POST, "sujets");

    echo "Les éléments<br>";
    echo '<pre>';
    var_dump($tEnrs);
    echo '</pre>';
    $lscontenu = "";

//REMPLISSAGE DE LA LISTE
    for ($i = 0; $i < count($tEnrs); $i++) {

        $enr = $tEnrs[$i];
        $lscontenu .= "<option>" . $enr->getSujet() . "</option>";
    }
    echo "Les éléments 2<br>";
    echo $lscontenu;
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
?>
