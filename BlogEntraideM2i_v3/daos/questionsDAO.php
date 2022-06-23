<?php

require_once '../entities/Questions.php';

class QuestionsDAO {

    public static function insert(PDO $pdo, Produits $objet): int {
        $liAffectes = 0;
        try {
            $sql = "INSERT INTO blogentraide.questions(question , id_sujet , id_utilisateur , date_question) VALUES(?,?,?,?)";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getquestion());
            $lcmd->bindValue(2, $objet->getidSujet());
            $lcmd->bindValue(3, $objet->getIdUtilisateur());
            $lcmd->bindValue(4, $objet->getdateQuestion());
            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        return $liAffectes;
    }

}
?>
