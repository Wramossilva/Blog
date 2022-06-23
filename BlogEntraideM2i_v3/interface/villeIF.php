<?php
require_once("IFormatage.php");

class VilleIF implements IFormatage {
    private $cp;
    private $ville;
    private $dateElections;

    public function __construct($cp, $ville, $dateElections) {
        $this->cp    = $this->formatageNombre($cp);
        $this->ville = $this->formatageChaine($ville);
        $this->dateElections = $this->formatageDate($dateElections);
    }
    public function __get($var) { return $this->$var; }

    public function formatageChaine($chaine) {
        return UCWords($chaine);
    }

    public function formatageNombre($nombre) {
        return number_format($nombre, 0, "", " ");
    }

    public function formatageDate($date) {
        $tMois = array("janvier","fevrier","mars","avril","mai","juin","juillet","aout","septembre","octobre","novembre","decembre");

        $tDate = explode("/", $dateElections);
        $mois  = $tMois[$tDate[1]-1];

        return $tDate[0] . " " . $mois . " " . $tDate[2];
    }
}
?>



<?php
    $v = new VilleIF("94130", "nogent sur marne", "15/03/2008");
    echo "$v->ville dont le code poste est $v->cp elira son nouveau maire le $v->dateElections";
?>

