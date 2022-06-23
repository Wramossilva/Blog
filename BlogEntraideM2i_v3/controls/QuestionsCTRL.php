<?php

/*
  QuestionsCTRL.php
 */
/*
 */

require_once '../daos/Connexion.php';
require_once '../entities/Questions.php';
require_once '../daos/questionsDAO.php';

$pdo = seConnecter("../daos/bd.ini");

$ques = filter_input(INPUT_POST, "ques");
//var_dump($ques);

//$pdo = seConnecter("../daos/bd.ini");

//var_dump($pdo);

if ($ques === null) {
    echo 'pas de question';
} else {

    $t = array();
    $t["ques"] = $ques;
    $liAffecte = insert($pdo, $t);
    if ($liAffecte == 1) {
        $pdo->commit();
        //$cible = "InscriptionIHM.php";
        //$message = "Inscription réussie !";
    } else {
        // Inscription BAD au niveau de la BD
        $pdo->rollBack();
        //$cible = "InscriptionIHM.php";
        //$message = "Problème d'inscription !";
    }
    seDeconnecter($pdo);
}
?>