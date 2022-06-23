<!DOCTYPE html>
<html>
    <head>
        <title>ProduitsInsertIHM.php</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>

    <body>

        <?php
        // Connexion
        $lcnx = new PDO("mysql:host=localhost;port=3306;dbname=blogentraide;", "root", "");
        $lcnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $lcnx->exec("SET NAMES 'UTF8'");

        $btValider = filter_input(INPUT_POST, "btValider");

        // Préparation et exécution du SELECT SQL
        $lsSelect = "SELECT * FROM categories";
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

        if ($btValider != null) {
            try {
                // Connexion
                $lcnx = new PDO("mysql:host=localhost;port=3306;dbname=blogentraide;", "root", "");
                $lcnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $lcnx->exec("SET NAMES 'UTF8'");

                // Préparation et exécution du SELECT SQL
                $sql = "INSERT INTO produits(produit, id_categorie) VALUES(?,?)";
                $lcmd = $lcnx->prepare($sql);
                $produit = filter_input(INPUT_POST, "produit");
                $idCategorie = filter_input(INPUT_POST, "id_categorie");
                $lcmd->bindParam(1, $produit);
                $lcmd->bindParam(2, $idCategorie);
                $lcmd->execute();
                $liAffecte = $lcmd->rowCount();
            } catch (Exception $exc) {
                $lsMessage = $exc->getTraceAsString();
            }
        }
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
            <h1 id="titre">Nouveau produit</h1>

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
                <label for="categorie">Nouveau produit : </label>
                <input type="text" id="produit" name="produit" />
                <select name='id_categorie'>
                    <?php
                    echo $lsContenu;
                    ?>
                </select>
                <input type="submit" name="btValider"/>
            </form>

            <p>
                <label id="lblMessage">
                    <?php
                    if (isSet($liAffecte)) {
                        echo $liAffecte;
                    }
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

<!--        <script src="../js/authentification.js"></script>-->
    </body>

</html>