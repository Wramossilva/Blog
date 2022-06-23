<?php

/*
  routeur.php
 */

session_start();

$route = filter_input(INPUT_POST, "route");
if ($route == null) {
    $route = filter_input(INPUT_GET, "route");
}

switch ($route) {
    case "authentification":
        $route = "../boundaries/AuthentificationIHM";
        break;

    case "inscription":
        $route = "../boundaries/InscriptionIHM";
        break;
    
     case"question":
        $route = "../boundaries/QuestionsIHM;";
        break;


    case "gerer_mon_compte":
        if (isSet($_SESSION["pseudo"])) {
            $route = "../boundaries/GererMonCompteIHM";
        } else {
            $route = "../boundaries/AuthentificationIHM";
        }
        break;

   

    case "deconnexion":
        $route = "../controls/Deconnexion";
        break;

    default:
        $route = "../boundaries/AccueilGeneralIHM";
        break;
}
include "$route.php";
?>
