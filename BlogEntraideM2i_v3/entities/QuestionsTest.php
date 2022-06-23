<?php

require_once 'Questions.php';

$q = new Questions(1, "TOTO + TOTO", 1, 1, "30/12/2018");



echo $q->getIdQuestion() . " " . $q->getQuestion() . " " . $q->getIdSujet() . " " . $q->getDateQuestion();
?>