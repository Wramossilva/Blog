<!DOCTYPE html>
<html>
    <head>
        <title>CategoriesInsertIHM.php</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>

    <body>
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
            <h1 id="titre">Nouvelle Catégorie</h1>

            <ul id="sous_menu">
                <li>
                    <a href="../boundaries/CategoriesIHM.php">Toutes</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/CategoriesInsertIHM.php">Ajout</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/CategoriesDeleteIHM.php">Suppression</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/CategoriesUpdateIHM.php">Modification</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>
            </ul>

            <form method="post" action="">
                <label for="categorie">Nouvelle Catégorie : </label>
                <input type="text" id="categorie" name="categorie" />
                <input type="submit" name="btValider"/>
            </form>

            <p>
                <label id="lblMessage">
                    <?php
                    $btValider = filter_input(INPUT_POST, "btValider");
                    if ($btValider != null) {
                        try {
                            // Connexion
                            $lcnx = new PDO("mysql:host=localhost;port=3306;dbname=blogentraide;", "root", "");
                            $lcnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $lcnx->exec("SET NAMES 'UTF8'");

                            // Préparation et exécution du SELECT SQL
                            $sql = "INSERT INTO categories(categorie) VALUES(?)";
                            $lcmd = $lcnx->prepare($sql);
                            $categorie = filter_input(INPUT_POST, "categorie");
                            $lcmd->bindParam(1, $categorie);
                            $lcmd->execute();
                            $liAffecte = $lcmd->rowCount();
                        } catch (Exception $exc) {
                            $lsMessage = $exc->getTraceAsString();
                        }
                    }


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