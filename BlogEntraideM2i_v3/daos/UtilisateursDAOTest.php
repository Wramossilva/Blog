<?php

/*
  UtilisateursDAOTest.php
 */

require_once 'Connexion.php';
require_once 'UtilisateursDAO.php';

/*
 * Connexion
 */
$pdo = seConnecter("bd.ini");
$pdo->beginTransaction();

/*
 * SELECT ONE
 */
//echo "<hr>SELECT ONE BY ID<hr>";
//$enr = selectOne($pdo, 2);

//echo "<pre>";
//var_dump($enr);
//echo "</pre>";

/*
 * SELECT ONE BY PSEUDO AND MDP
 */
//echo "<hr>SELECT ONE BY PSEUDO AND MDP<hr>";
//$enr = selectOneByPseudoAndMdp($pdo, "a", "f");
//
//echo "<pre>";
//var_dump($enr);
//echo "</pre>";


/*
 * DELETE BY PSEUDO
 */

//$sup = deleteByPseudo($pdo, "t");
//$pdo->commit();
//echo $sup;

/*
 * UPDATE BY PSEUDO
 */

$ut = array();
$ut["pseudo"] = "t";
$ut["mdp"] = "xxx";
$modif = updateByPseudo($pdo, $ut);
$pdo->commit();
echo $modif;

/*
 * SELECT ALL
 */
//echo "<hr>SELECT ALLDP<hr>";
//$tEnrs = selectAll($pdo);
//for ($i = 0; $i < count($tEnrs); $i++) {
//    $enr = $tEnrs[$i];
//    echo $enr["pseudo"] . ":" . $enr["mdp"] . "<br>";
//}

/*
 * INSERT
 */

//$objet = array();
//$objet["pseudo"] = "Tintin";
//$objet["mdp"] = "Tintin123#";
//$liAffecte = insert($pdo, $objet);
//if ($liAffecte == 1) {
//    $pdo->commit();
//} else {
//    $pdo->rollBack();
//}
//echo "Ajout : $liAffecte" . "<br>";

/*
 * DELETE
 */
//$objet = array();
//$objet["id_utilisateur"] = 7;
//$objet["pseudo"] = "Tintin";
//$objet["mdp"] = "Tintin123#";
//$liAffecte = delete($pdo, $objet);
//if ($liAffecte == 1) {
//    $pdo->commit();
//} else {
//    $pdo->rollBack();
//}
//echo "Suppression : $liAffecte" . "<br>";
/*
 * Déconnexion
 */
seDeconnecter($pdo);
?>
