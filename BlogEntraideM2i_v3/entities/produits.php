<?php

class Produits {

    private $idProduit;
    private $Produit;
    private $idCategorie;

    public function __construct($idProduit, $Produit, $idCategorie) {

        $this->idProduit = $idProduit;
        $this->Produit = $Produit;
        $this->idCategorie = $idCategorie;
    }

    public function getIdProduit() {
        return $this->idProduit;
    }

    public function getProduit() {
        return $this->Produit;
    }

    public function getIdCategorie() {
        return $this->idCategorie;
    }

}
?>