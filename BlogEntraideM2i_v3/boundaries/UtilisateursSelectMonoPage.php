<!DOCTYPE html>
<html>
    <head>
        <title>UtilisateursSelectMonoPage.php</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>

    <body>
        <?php
        $lsMessage = "";
        $pseudo = filter_input(INPUT_GET, "pseudo");
        $mdp = filter_input(INPUT_GET, "mdp");
        if ($pseudo != null && $mdp != null) {

            echo "***Pseudo : $pseudo***<br>";
            echo "***MDP : $mdp***<br>";

            $lsMessage = "Jusque là ...";
            try {
                $pdo = new PDO("mysql:host=localhost;port=3306;dbname=blogentraide;", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->exec("SET NAMES 'UTF8'");

                $sql = "SELECT * FROM utilisateurs WHERE pseudo=? AND mdp=?";
                echo "***SQL : $sql***<br>";
                $lrs = $pdo->prepare($sql);
                $lrs->bindParam(1, $pseudo);
                $lrs->bindParam(2, $mdp);
                $lrs->execute();
                $enr = $lrs->fetch();
                if ($enr === FALSE) {
                    $lsMessage = "INTROUVABLE";
                } else {
                    $lsMessage = "Vous êtes authentifié(e)";
                }

                $pdo = null;
            } catch (PDOException $ex) {
                $lsMessage = $ex->getMessage();
            }
        } else {
            $lsMessage = "Jusque là ... KO ";
        }
        ?>


        <header id="header">
            Site d'entraide
        </header>

        <nav id="nav">
            <ul id="menu_principal">
                <li>
                    <a href="../boundaries/UtilisateursSelectMonoPage.php">S'authentifier</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>
                <li>
                    <a href="../boundaries/UtilisateursInsertMonoPage.php">S'inscrire</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>
                <li>
                    <a href="../boundaries/UtilisateursUpdateMonoPage.php">Modifier son compte</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>
                <li>
                    <a href="../boundaries/UtilisateursDeleteMonoPage.php">Supprimer son compte</a>
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
            <h1>Authentification</h1>
            <form action="" method="GET">
                <label>Pseudo : </label>
                <p>
                    <input type="text" name="pseudo" id="pseudo" value="z" readonly="readonly"/>
                </p>
                <label>Mot de passe : </label>
                <p>
                    <input type="text" name="mdp" id="mdp" value="x" />
                </p>

                <p>
                    <input type="submit" value="Valider" id="btValider" />
                </p>
            </form>

            <label id="lblMessage">
                <?php
                echo $lsMessage;
                ?>
            </label>
        </div>

        <footer id="footer">
            &copy; pb & co
        </footer>
    </body>
</html>
