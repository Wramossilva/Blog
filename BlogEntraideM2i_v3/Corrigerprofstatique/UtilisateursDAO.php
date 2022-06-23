<?php

/*
  UtilisateursDAO.php
 */
/*
  LE DAO objet de la table [utilisateurs] de la BD [blogentraide]
 */

declare(strict_types = 1);

require_once '../entities/Utilisateurs.php';

class UtilisateursDAO {

    /**
     * 
     * @param PDO $pdo
     * @return array
     */
    public static function selectAll(PDO $pdo): array {
        // Déclaration du tableau pour le return
        $liste = array();
        try {
            $sql = 'SELECT * FROM utilisateurs';
            // Query parce qu'il n'y a pas de WHERE dans le SELECT
            $lrs = $pdo->query($sql);
            $lrs->setFetchMode(PDO::FETCH_NUM);
            // CF AUSSI FETCH_ALl
            // Boucle dans le curseur
            while ($enr = $lrs->fetch()) {
                // Ajout de l'enregistrement courant dans le tableau
                $liste[] = new Utilisateurs(intval($enr[0]), $enr[1], $enr[2]);
            }
            // Fermeture du curseur (facultatif)
            $lrs->closeCursor();
        } catch (PDOException $e) {
            $liste[] = new Utilisateurs(-1, "Erreur", $e->getMessage());
        }
        return $liste;
    }

    /**
     * 
     * @param PDO $pdo
     * @param int $id
     * @return array
     */
    public static function selectOne(PDO $pdo, int $id): array {
        $enr = array();
        try {
            $sql = 'SELECT * FROM blogentraide.utilisateurs WHERE id_utilisateur = ?';
            // Compilation
            $lrs = $pdo->prepare($sql);
            // Valorisation du 1er paramètre du SELECT avec la valeur du 2eme paramètre de la fonction
            $lrs->bindValue(1, $id);
            // Exécution du SELECT (plus généralemnt de l'ordre SQL)
            $lrs->execute();
            // Récupération de l'unique enregistrement ou pas 
            // Fetch renvoie FALSE si erreur ou aucun résultat
            $enr = $lrs->fetch(PDO::FETCH_ASSOC);
            // Si l'utilisateur n'existe pas
            if ($enr === FALSE) {
                $enr = array();
            }
            // Fermeture du curseur (facultatif)
            $lrs->closeCursor();
        } catch (PDOException $e) {
            // Rien puisqu'on a array() par défaut (cf initialisation de la variable $enr)
        }
        return $enr;
    }

    /**
     * 
     * @param PDO $pdo
     * @param Utilisateurs $ut
     * @return array
     */
    public static function selectOneByPseudoAndMdp(PDO $pdo, Utilisateurs $ut): Utilisateurs {
        /*
         * POUR L'AUTHENTIFICATION
         */

        try {
            $sql = 'SELECT * FROM blogentraide.utilisateurs WHERE pseudo = ? AND mdp = ?';
            $lrs = $pdo->prepare($sql);
            // Valorisation des 2 paramètres du SELECT 
            $lrs->bindValue(1, $ut->getPseudo());
            $lrs->bindValue(2, $ut->getMdp());
            $lrs->execute();
            $enr = $lrs->fetch(PDO::FETCH_ASSOC);
            if ($enr === FALSE) {
                $ut = new Utilisateurs(0, "Introuvable", "");
            } else {
                $ut = new Utilisateurs($enr[0], $enr[1], $enr[2]);
            }
            // Fermeture du curseur (facultatif)
            $lrs->closeCursor();
        } catch (PDOException $e) {
            $ut = new Utilisateurs(-1, "Erreur", $e->getMessage());
        }
        return $ut;
    }

    /**
     * 
     * @param PDO $pdo
     * @param Utilisateurs $ut
     * @return int
     */
    public static function insert(PDO $pdo, Utilisateurs $ut): int {
        /*
         * POUR L'INSCRIPTION
         */
        $liAffected = 0;
        try {
            $sql = "INSERT INTO blogentraide.utilisateurs(pseudo,mdp) VALUES(?,?)";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $ut->getPseudo());
            $lcmd->bindValue(2, $ut->getMdp());
            $lcmd->execute();
            // Récupération du nombre d'enregistrements insérés (1 ou 0 dans le cas présent)
            $liAffected = $lcmd->rowcount();
        } catch (PDOException $e) {
            // Code d'erreur -1 (arbitraire)
            $liAffected = -1;
            echo "<hr>Erreur : " . $e->getMessage() . "<hr>";
            echo "<hr>Code Erreur : " . $e->getCode() . "<hr>";
        }
        return $liAffected;
    }

    /**
     * 
     * @param PDO $pdo
     * @param Utilisateurs $ut
     * @return int
     */
    public static function deleteByID(PDO $pdo, Utilisateurs $ut): int {
        $liAffected = 0;
        try {
            $sql = "DELETE FROM blogentraide.utilisateurs WHERE id_utilisateur = ?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $ut->getIdUtilisateur());
            $lcmd->execute();
            $liAffected = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffected = -1;
        }
        return $liAffected;
    }

    /**
     * 
     * @param PDO $pdo
     * @param Utilisateurs $ut
     * @return int
     */
    public static function delete(PDO $pdo, Utilisateurs $ut): int {
        $liAffected = 0;
        try {
            $sql = "DELETE FROM blogentraide.utilisateurs WHERE id_utilisateur = ?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $ut->getIdUtilisateur());
            $lcmd->execute();
            $liAffected = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffected = -1;
        }
        return $liAffected;
    }

    /**
     * 
     * @param PDO $pdo
     * @param Utilisateurs $ut
     * @return int
     */
    public static function deleteByPseudo(PDO $pdo, Utilisateurs $ut): int {
        $liAffected = 0;
        try {
            $sql = "DELETE FROM blogentraide.utilisateurs WHERE pseudo = ?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $ut->getPseudo());
            $lcmd->execute();
            $liAffected = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffected = -1;
        }
        return $liAffected;
    }

    /**
     * 
     * @param PDO $pdo
     * @param Utilisateurs $ut
     * @return int
     */
    public static function update(PDO $pdo, Utilisateurs $ut): int {
        $liAffected = 0;
        try {
            $sql = "UPDATE blogentraide.utilisateurs SET pseudo=?,mdp=? WHERE id_utilisateur=?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $ut->getPseudo());
            $lcmd->bindValue(2, $ut->getMdp());
            $lcmd->bindValue(3, $ut->getIdUtilisateur());

            $lcmd->execute();
            $liAffected = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffected = -1;
        }
        return $liAffected;
    }

    /**
     * 
     * @param PDO $pdo
     * @param Utilisateurs $ut
     * @return int
     */
    public static function updateByPseudo(PDO $pdo, Utilisateurs $ut): int {
        $liAffected = 0;
        try {
            $sql = "UPDATE blogentraide.utilisateurs SET mdp=? WHERE pseudo=?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $ut->getMdp());
            $lcmd->bindValue(2, $ut->getPseudo());

            $lcmd->execute();
            $liAffected = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffected = -1;
        }
        return $liAffected;
    }

}

?>
