<?php
    // --- VillesSelect.php
    header("Content-Type: text/html; charset=UTF-8");

    try {
        // Connexion
//        $lcnx = new PDO("mysql:host=localhost;port=3306;dbname=blogentraide;", "root", "root");
//        $lcnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $lcnx->exec("SET NAMES 'UTF8'");
        
    require_once '../daos/Connexion.php';
    
    $lcnx = seConnecter("../daos/bd.ini");

        // Préparation et exécution du SELECT SQL
        $lsSelect = "SELECT * FROM sujets";
        $lrs = $lcnx->query($lsSelect);
        $lrs->setFetchMode(PDO::FETCH_NUM);

        $lsContenu = "";

        // On boucle sur les lignes en récupérant le contenu des colonnes 1 et 2
        foreach($lrs as $lrec) {
            // Récupération des valeurs par concaténation et interpolation
            $lsContenu .= "$lrec[0]-$lrec[1]<br>";
        }
        // Fermeture du curseur (facultatif)
        $lrs->closeCursor();
    }
    // Gestion des erreurs
    catch(PDOException $e) {
        $lsContenu = "Echec de l'exécution : " . $e->getMessage();
    }

    // Déconnexion (facultative)
    $lcnx = null;

    // Affichage du contenu
    echo $lsContenu;

?>

