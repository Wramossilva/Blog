<?php

/* 
 * ChaineTests.php
 */

include "Chaine.php";

echo "<br>***** snake2Camel *****";
echo "<br>" . Chaine::snake2Camel("produits", "classe");
echo "<br>" . Chaine::snake2Camel("categories_produits", "classe");
echo "<br>" . Chaine::snake2Camel("categories_produits", "");
echo "<br>" . Chaine::snake2Camel("id_du_produit", "classe");
echo "<br>" . Chaine::snake2Camel("id_du_produit", "");
echo "<br>" . Chaine::snake2Camel("produit", "");

echo "<br>***** camel2Snake *****";
echo "<br>" . Chaine::camel2Snake("Produits");
echo "<br>" . Chaine::camel2Snake("CategoriesProduits");
echo "<br>" . Chaine::camel2Snake("idProduit");
echo "<br>" . Chaine::camel2Snake("produit");


?>
