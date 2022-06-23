<!DOCTYPE html>
<html>
    <head>
        <title>SujetsInsertMonoPage.php</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>

    <body>
        <?php
        $lsMessage = "";
        $question = filter_input(INPUT_GET, "questiion");
        $sujet = filter_input(INPUT_GET, "sujet");
        try {
            /*
             * CONNEXION
             */
            $pdo = new PDO("mysql:host=localhost;port=3306;dbname=blogentraide;", "root", "root");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("SET NAMES 'UTF8'");

            if ($sujet != null && $id_produit != null) {
                $lsMessage = "Jusque là ...";
                 /*
                 * INSERT
                 */
                $sql = "INSERT INTO questions(question, id_sujet , id_utilisateur ,date_questiob) VALUES(?,?,?,?)";
                $lcmd = $pdo->prepare($sql);
                $lcmd->bindParam(1, $question);
                $lcmd->bindParam(2, $id_sujet);
                $lcmd->bindParam(1, $id_utilisateur);
                $lcmd->bindParam(2, $date_question);
                $lcmd->execute();
                $liAffecte = $lcmd->rowCount();
                $lsMessage = $liAffecte . "question ajouté";
            }
            /*
             * FIN DE L'INSERTION 
             */
            
            
            /*
             * REMPLISSAGE DE LA LISTE
             */
            $sql = "SELECT * FROM sujets ORDER BY sujet";
            $lrs = $pdo->query($sql);
            $lrs->setFetchMode(PDO::FETCH_NUM);

            $lsContenu = "";

            // On boucle sur les lignes en récupérant le contenu des colonnes 1 et 2
            foreach ($lrs as $lrec) {
                // Récupération des valeurs par concaténation et interpolation
                $lsContenu .= "<option value='$lrec[0]'>$lrec[1]</option>";
            }
            // Fermeture du curseur (facultatif)
            $lrs->closeCursor();
            /*
             * DECONNEXION
             */
            $pdo = null;
        } catch (PDOException $ex) {
            $lsMessage = $ex->getMessage();
        }
        ?>


        <header id="header">
            Site d'entraide
        </header>

        <nav id="nav">
            <ul id="menu_principal">
                <li>
                    <a href="../boundaries/UtilisateursInsertMonoPage.php">Sélectionner un sujet</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>
                <li>
                    <a href="../boundaries/UtilisateursUpdateMonoPage.php">Mettre à jour mon sujet</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>
                <li>
                    <a href="../boundaries/UtilisateursDeleteMonoPage.php">Supprimer mon sujet</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>
                <li>
                    <a href="../boundaries/accueil_general.php">Accueil général</a>
                </li>
            </ul>
        </nav>

        <div id="centre">
            <h1>question</h1>
            <form action="" method="GET">
                <label>Question : </label>
                <p>
                    <input type="text" name="question" id="pseudo" value=""/>
                </p>
                <label>sujet : </label>
                <p>
                    <select name="sujet">
<?php
echo $lsContenu;
?>
                    </select>
                </p>
                <p>
                    <input type="submit" value="Valider" id="btValider" />
                </p>
            </form>

            <label id="lblMessage">

            </label>
        </div>

        <footer id="footer">
            &copy; pb & co
        </footer>
    </body>
</html>
