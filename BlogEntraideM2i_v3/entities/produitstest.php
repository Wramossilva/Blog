<?php

require_once 'produits.php';

$pr = new Produits(9, "C", 2);


echo $pr->getIdProduit() . " " . $pr->getProduit() . " " . $pr->getIdCategorie();

?>