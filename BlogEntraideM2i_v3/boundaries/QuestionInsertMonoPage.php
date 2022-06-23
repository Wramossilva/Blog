<!DOCTYPE html>
<html>
    <head>
        <title>UtilisateursInsertMonoPage.php</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>

    <body>
        <?php
        $lsMessage = "";
        //Recuperation des donnees statique saisie () Generalement dans le fichier html
        $pseudo = filter_input(INPUT_GET, "pseudo");
        $mdp = filter_input(INPUT_GET, "mdp");
        // Si pseudo et mdp son null
        if ($pseudo != null && $mdp != null) {
            $lsMessage = "Jusque là ...";
            try {
                //connexion a la BD 
                $pdo = new PDO("mysql:host=localhost;port=3306;dbname=blogentraide;", "root", "root");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->exec("SET NAMES 'UTF8'");
                // L'ordre SQL
                $sql = "INSERT INTO questions(question,id_sujet, id_utilisateur ,date_question) VALUES(?,?,?,?)";
                // compilation 
                $lcmd = $pdo->prepare($sql);
                //valorisation des parametrè
                $lcmd->bindParam(1, $question);
                $lcmd->bindParam(2, $id_sujet);
                $lcmd->bindParam(3, $id_utilisateur);
                $lcmd->bindParam(4, $date_question);
                //excution de la commande
                $lcmd->execute();
                // Creation d'une variable liAffecte avec les valeur de de la commande prepare donc($lcmd)qu'on ajoute 
                //(->rowCount()) qui permts de recuperer le nombres de ligne affecte pas la modification
                $liAffecte = $lcmd->rowCount();
                //On concaté la valeur liAffecte avec une chaine caracterè
                $lsMessage = $liAffecte . " ut ajouté";
                // fermeture de la connexion BD avec $pdo= null (a la fin d'un try et au desus de catch)
                $pdo = null;
                //gestion d'erreur " capture de message d'erreur 
                //la syntase de catch et toujours constituer de la meme structure---
                //catch ("PDO"Exception $ex)
                //$ls Message = $ex->getMessage()
            } catch (PDOException $ex) {
                $lsMessage = $ex->getMessage();
            }
        } else { //sinon 
            $lsMessage = "Jusque là ... KO ";
        }
        ?>


        <header id="header">
            Site d'entraide
        </header>

        <nav id="nav">
            <ul id="menu_principal">
                <li>
                    <a href="../boundaries/authentification.php">S'authentifier</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>
                <li>
                    <!--<a href="../boundaries/inscription.php">S'inscrire</a>-->
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>
                <li>
                    <!--<a href="../boundaries/gerer_son_compte.php">Gérer son compte</a>-->
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>
                <li>
                    <!--<a href="../boundaries/accueil_general.php">Accueil général</a>-->
                </li>
            </ul>
        </nav>

        <div id="centre">
            <h1>Inscription</h1>
            <form action="" method="GET">
                <label>Pseudo : </label>
                <p>
                    <input type="text" name="pseudo" id="pseudo" value="z" />
                </p>
                <label>Mot de passe : </label>
                <p>
                    <input type="password" name="mdp" id="mdp" value="x" />
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
