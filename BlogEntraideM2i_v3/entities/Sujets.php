<?php

class Sujets {
 
    private $sujet;
   
    public function __construct($sujet) {

        $this->question = $sujet;
    }

    public function getSujets() {
        return $this->sujet;
    }

}
