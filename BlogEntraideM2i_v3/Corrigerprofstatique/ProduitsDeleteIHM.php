<!DOCTYPE html>
<html>
    <head>
        <title>ProduitsDeleteIHM.php</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>

    <body>
        <?php
        try {
            // Connexion
            $lcnx = new PDO("mysql:host=localhost;port=3306;dbname=blogentraide;", "root", "");
            $lcnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $lcnx->exec("SET NAMES 'UTF8'");

            $idproduit = filter_input(INPUT_POST, "id_produit");
            if ($idproduit != null) {
                $sql = "DELETE FROM produits WHERE id_produit=?";
                $lcmd = $lcnx->prepare($sql);
                $lcmd->bindParam(1, $idproduit);
                $lcmd->execute();
                $liAffecte = $lcmd->rowCount();
            }


            // Préparation et exécution du SELECT SQL
            $lsSelect = "SELECT * FROM produits ORDER BY produit";
            $lrs = $lcnx->query($lsSelect);
            $lrs->setFetchMode(PDO::FETCH_NUM);

            $lsContenu = "";

            // On boucle sur les lignes en récupérant le contenu des colonnes 1 et 2
            foreach ($lrs as $lrec) {
                // Récupération des valeurs par concaténation et interpolation
                $lsContenu .= "<option value='$lrec[0]'>$lrec[1]</option>";
            }
            // Fermeture du curseur (facultatif)
            $lrs->closeCursor();
        }
        // Gestion des erreurs
        catch (PDOException $e) {
            $lsMessage = "Echec de l'exécution : " . $e->getMessage();
        }

        // Déconnexion (facultative)
        $lcnx = null;
        ?>


        <header id="header">
            <?php
            include 'partials/header.php';
            ?>
        </header>

        <nav id="nav">
            <?php
            include 'partials/nav.php';
            ?>
        </nav>

        <div id="centre">
            <h1 id="titre">Suppression d'un produit</h1>

             <ul id="sous_menu">
                <li>
                    <a href="../boundaries/ProduitsIHM.php">Toutes</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/ProduitsInsertIHM.php">Ajout</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/ProduitsDeleteIHM.php">Suppression</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/ProduitsUpdateIHM.php">Modification</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>
            </ul>

            <form method="post" action="">
                <label for="id_produit">Produit ?</label>
                <select name='id_produit'>
                    <?php
                    echo $lsContenu;
                    ?>
                </select>
                <input type="submit" />
            </form>

            <p>
                <label id="lblMessage">
                    <?php
                    if (isSet($liAffecte)) {
                        echo $liAffecte;
                    }
                    ?>
                    <?php
                    if (isSet($lsMessage)) {
                        echo $lsMessage;
                    }
                    ?>
                </label>
            </p>
        </div>

        <footer id="footer">
            <?php
            include 'partials/footer.php';
            ?>
        </footer>
    </body>

</html>