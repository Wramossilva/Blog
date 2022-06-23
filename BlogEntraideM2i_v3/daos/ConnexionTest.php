<?php

/*
 * ConnexionTest.php
 */
require_once 'Connexion.php';

$pdo = seConnecter("bd.ini");

echo "<br><pre>";
var_dump($pdo);
echo "</pre><br>";

seDeconnecter($pdo);
?>