<!DOCTYPE html>
<html>
    <head>
        <title>CategoriesIHM.php</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>

    <body>
        <?php
        try {
            // Connexion
            $lcnx = new PDO("mysql:host=localhost;port=3306;dbname=blogentraide;", "root", "root");
            $lcnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $lcnx->exec("SET NAMES 'UTF8'");

            // Préparation et exécution du SELECT SQL
            $lsSelect = "SELECT * FROM categories ORDER BY categorie";
            $lrs = $lcnx->query($lsSelect);
            $lrs->setFetchMode(PDO::FETCH_NUM);

            $lsContenu = "";

            // On boucle sur les lignes en récupérant le contenu des colonnes 1 et 2
            foreach ($lrs as $lrec) {
                // Récupération des valeurs par concaténation et interpolation
                $lsContenu .= "<tr><td>$lrec[0]</td><td>$lrec[1]</td></tr>";
            }
            // Fermeture du curseur (facultatif)
            $lrs->closeCursor();
        }
        // Gestion des erreurs
        catch (PDOException $e) {
            $lsContenu = "Echec de l'exécution : " . $e->getMessage();
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
            <h1 id="titre">Catégories</h1>

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

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Catégorie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo $lsContenu;
                    ?>
                </tbody>
            </table>

            <p>
                <label id="lblMessage">
                    <?php
                    if (isSet($liAffecte)) {
                        echo $liAffecte;
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