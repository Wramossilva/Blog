<?php
require_once("IFormatage.php");

class PersonneIF implements IFormatage {
    private $nom;
    private $dateNaissance;
    private $salaire;

    public function __construct($nom, $dateNaissance, $salaire) {
        $this->nom           = $this->formatageChaine($nom);
        $this->dateNaissance = $this->formatageDate($dateNaissance);
        $this->salaire       = $this->formatageNombre($salaire);
    }

    public function __get($var) { return $this->$var; }

    public function formatageChaine($chaine) {
        return strToUpper($chaine);
    }

    public function formatageNombre($nombre) {
        return number_format($nombre, 2, ",", " ");
    }

    public function formatageDate($date) {
        return preg_replace("#(.*)/(.*)/(.*)#", "\\3-\\2-\\1", $date);
    }
}
?>



<?php
    $p = new PersonneIF("tintin", "03/10/1920", 3000.34);
    echo "$p->nom est ne le $p->dateNaissance et gagne $p->salaire euros";
?>
