<?php

/*
  UtilisateursDAO.php
 */
/*
  LE DAO procédural de la table [utilisateurs] de la BD [blogentraide]
 */

declare(strict_types = 1);

/**
 * 
 * @param PDO $pdo
 * @return array
 */
function selectAll(PDO $pdo): array {
    // Déclaration du tableau pour le return
    $liste = array();
    try {
        $sql = 'SELECT * FROM blogentraide.utilisateurs';
        // Query parce qu'il n'y a pas de WHERE dans le SELECT
        $lrs = $pdo->query($sql);
        $lrs->setFetchMode(PDO::FETCH_ASSOC);
        // Boucle dans le curseur
        while ($enr = $lrs->fetch()) {
            // Ajout de l'enregistrement courant dans le tableau
            $liste[] = $enr;
        }
        // Fermeture du curseur (facultatif)
        $lrs->closeCursor();
    } catch (PDOException $e) {
        $objet = null;
        $liste[] = $objet;
    }
    return $liste;
}

/**
 * 
 * @param PDO $pdo
 * @param int $id
 * @return array
 */
function selectOne(PDO $pdo, int $id): array {
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
 * @param string $pseudo
 * @param string $mdp
 * @return array
 */
function selectOneByPseudoAndMdp(PDO $pdo, string $pseudo, string $mdp): array {
    /*
     * POUR L'AUTHENTIFICATION
     */
    $enr = array();
    try {
        $sql = 'SELECT * FROM blogentraide.utilisateurs WHERE pseudo = ? AND mdp = ?';
        $lrs = $pdo->prepare($sql);
        // Valorisation des 2 paramètres du SELECT 
        $lrs->bindValue(1, $pseudo);
        $lrs->bindValue(2, $mdp);
        $lrs->execute();
        $enr = $lrs->fetch(PDO::FETCH_ASSOC);
        if ($enr === FALSE) {
            $enr = array();
        }
        // Fermeture du curseur (facultatif)
        $lrs->closeCursor();
    } catch (PDOException $e) {
        
    }
    return $enr;
}

/**
 * 
 * @param PDO $pdo
 * @param array $objet
 * @return int
 */
function insert(PDO $pdo, array $objet): int {
    /*
     * POUR L'INSCRIPTION
     */
    $liAffected = 0;
    try {
        $sql = "INSERT INTO blogentraide.utilisateurs(pseudo,mdp) VALUES(?,?)";
        $lcmd = $pdo->prepare($sql);
        $lcmd->bindValue(1, $objet["pseudo"]);
        $lcmd->bindValue(2, $objet["mdp"]);
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
 * @param array $objet
 * @return int
 */
function deleteByID(PDO $pdo, int $id): int {
    $liAffected = 0;
    try {
        $sql = "DELETE FROM blogentraide.utilisateurs WHERE id_utilisateur = ?";
        $lcmd = $pdo->prepare($sql);
        $lcmd->bindValue(1, $id);
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
 * @param array $objet
 * @return int
 */
function delete(PDO $pdo, array $objet): int {
    $liAffected = 0;
    try {
        $sql = "DELETE FROM blogentraide.utilisateurs WHERE id_utilisateur = ?";
        $lcmd = $pdo->prepare($sql);
        $lcmd->bindValue(1, $objet["id_utilisateur"]);
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
 * @param string $pseudo
 * @return int
 */
 // Une fonction qui renvoie un int et qui a en entrée 2 arguments : la connexion et le pseudo de l'ut à supprimer
function deleteByPseudo(PDO $pdo, string $pseudo): int {
    $liAffected = 0;
    try {
        $sql = "DELETE FROM utilisateurs WHERE pseudo = ?";
        $lcmd = $pdo->prepare($sql);
        $lcmd->bindValue(1, $pseudo);
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
 * @param array $objet
 * @return int
 */
function update(PDO $pdo, array $objet): int {
    $liAffected = 0;
    try {
        $sql = "UPDATE blogentraide.utilisateurs SET pseudo=?,mdp=? WHERE id_utilisateur=?";
        $lcmd = $pdo->prepare($sql);
        $lcmd->bindValue(1, $objet["pseudo"]);
        $lcmd->bindValue(2, $objet["mdp"]);
        $lcmd->bindValue(3, $objet["id_utilisateur"]);

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
 * @param array $objet
 * @return int
 */
function updateByPseudo(PDO $pdo, array $objet): int {
    $liAffected = 0;
    try {
        $sql = "UPDATE utilisateurs SET mdp=? WHERE pseudo=?";
        $lcmd = $pdo->prepare($sql);
        $lcmd->bindValue(1, $objet["mdp"]);
        $lcmd->bindValue(2, $objet["pseudo"]);

        $lcmd->execute();
        $liAffected = $lcmd->rowcount();
    } catch (PDOException $e) {
        $liAffected = -1;
    }
    return $liAffected;
}

?>
