<?php

class Questions {

    //private $idQuestion; $idQuestion, 
    private $question;
    private $idSujet;
    private $idUtilisateur;
    private $dateQuestion;

    public function __construct($question, $idSujet, $idUtilisateur, $dateQuestion) {

        //$this->idQuestion = $idQuestion;
        $this->question = $question;
        $this->idSujet = $idSujet;
        $this->idUtilisateur = $idUtilisateur;
        $this->dateQuestion = $dateQuestion;
    }

    //public function getIdQuestion() {
        //return $this->idQuestion;
  //  }

    public function getQuestion() {
        return $this->question;
    }

    public function getIdSujet() {
        return $this->idSujet;
    }

    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    public function getDateQuestion() {
        return $this->dateQuestion;
    }

}

?>