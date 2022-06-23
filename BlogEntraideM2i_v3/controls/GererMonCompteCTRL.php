<?php

/*
  GererMonCompteCTRL.php
 */
// On inclut le code de Connexion.php
require_once '../daos/Connexion.php';
// On inclut le code de UtilisateursDAO.php
require_once '../daos/UtilisateursDAO.php';

// On démarre la session ou on utilise la session et ses variables
session_start();
// On récupère le contenu de la variable de session nommée pseudo
$pseudo = $_SESSION["pseudo"];
// On récupère le mdp du formulaire
$mdp = filter_input(INPUT_POST, "mdp");

// On affiche ...
echo "$pseudo<br>";
echo "$mdp<br>";
   

$cible ="../boundaries/GererMonCompteIHM.php";

// On récupère les boutons ...
$btValiderModification = filter_input(INPUT_POST, "btValiderModification");
$btValiderSuppression = filter_input(INPUT_POST, "btValiderSuppression");

// Si le bouton modif a été cliqué
if($btValiderModification != null){
    $pdo = seConnecter("../daos/bd.ini");
    $pdo->beginTransaction();
    $t = array();
    $t["pseudo"] = $pseudo;
    $t["mdp"]= $mdp;
    $modif = updateByPseudo($pdo, $t);
    $pdo->commit();
    $btValiderModification .=$modif; 
    echo "Modif<br>";
}

// Si le bouton modif a été cliqué 
if($btValiderSuppression != null){
    echo "sup<br>";
}


$message = "";


//if (empty($pseudo) || empty($mdp)) {
//    echo "Toutes les saisies sont obligatoires !<br>";
//    // Inscription BAD au niveau du contrôle de surface
//    $cible = "InscriptionIHM.php";
//    $message = "Toutes les saisies sont obligatoires !";
//} else {
//    // Inscription GOOD
//    $pdo = seConnecter("../daos/bd.ini");
//    $pdo->beginTransaction();
//
//    /*
//     * INSERT
//     */
//    $t = array();
//    $t["pseudo"] = $pseudo;
//    $t["mdp"] = $mdp;
//    $liAffecte = insert($pdo, $t);
//    if ($liAffecte == 1) {
//        $pdo->commit();
//        $cible = "InscriptionIHM.php";
//        $message = "Inscription réussie !";
//    } else {
//        // Inscription BAD au niveau de la BD
//        $pdo->rollBack();
//        $cible = "InscriptionIHM.php";
//        $message = "Problème d'inscription !";
//    }
//    seDeconnecter($pdo);
//}

include "../boundaries/$cible";
?>

//<?php

/*
  GererMonCompteCTRLprof.php
 */

//session_start();
//
//require_once '../daos/Connexion.php';
//require_once '../daos/UtilisateursDAO.php';

//$pseudo = $_SESSION["pseudo"];
//$mdp = filter_input(INPUT_POST, "mdp");
//
//$btModifier = filter_input(INPUT_POST, "btValiderModification");
//$btSupprimer = filter_input(INPUT_POST, "btValiderSuppression");

//echo "$pseudo<br>";
//echo "$mdp<br>";

//$cible = "";
//
//if (empty($pseudo) || empty($mdp)) {
//    echo "Toutes les saisies sont obligatoires !<br>";
//    // Inscription BAD au niveau du contrôle de surface
//    $cible = "GererMonCompteIHM.php";
//    $message = "Toutes les saisies sont obligatoires !";
//} else {
//    // MAJ GOOD au niveau contrôle de surface
//    $pdo = seConnecter("../daos/bd.ini");
//    $pdo->beginTransaction();
//
//    $t = array();
//    $t["pseudo"] = $pseudo;
//    $t["mdp"] = $mdp;

    /*
     * UPDATE
     */
//    if ($btModifier != null) {
//        $liAffecte = updateByPseudo($pdo, $t);
//        if ($liAffecte == 1) {
//            // Modification GOOD au niveau de la BD
//            $pdo->commit();
//            $cible = "GererMonCompteIHM.php";
//            $message = "Modification réussie !";
//        } else {
//            // Modification BAD au niveau de la BD
//            $pdo->rollBack();
//            $cible = "GererMonCompteIHM.php";
//            $message = "Problème de modification !";
//        }
//    }
//
//    /*
//     * DELETE
//     */
//    if ($btSupprimer != null) {
//        $liAffecte = deleteByPseudo($pdo, $t);
//        if ($liAffecte == 1) {
//            // Suppression GOOD au niveau de la BD
//            $pdo->commit();
//            unset($_SESSION["pseudo"]);
//            //setcookie("pseudo", "");
//            //setcookie("mdp", "");
//            $cible = "InscriptionIHM.php";
//            $message = "Suppression réussie !";
//        } else {
//            // Suppression BAD au niveau de la BD
//            $pdo->rollBack();
//            $cible = "GererMonCompteIHM.php";
//            $message = "Problème de suppression !";
//        }
//    }
//
//    /*
//     * DECONNEXION
//     */
//    seDeconnecter($pdo);
//}
//
//include "../boundaries/$cible";
//