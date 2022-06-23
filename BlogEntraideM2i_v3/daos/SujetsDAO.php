<?php

//sujetsDAO.php

declare(strict_types = 1);

require_once '../entities/Sujets';

class SujetsDAO {

    public static function selectAll(PDO $pdo): array {

        $liste = array();
        try {
            $sql = 'SELECT * FROM sujets';

            $lrs = $pdo->query($sql);
            $lrs->setFetchMode(PDO::FETCH_NUM);

            while ($enr = $lrs->fetch()) {
                $liste[] = new Sujets(intval($enr[0]));
            }

            $lrs->closeCursor();
        } catch (PDOException $e) {
            $liste[] = new Sujets(-1, "Erreur", $e->getMessage());
        }
        return $liste;
    }

}

?>
