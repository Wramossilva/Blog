<!DOCTYPE html>
<html>
    <head>
        <title>accueil_general.php</title>
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
            <h1 id="titre">Accueil Général</h1>
            <ul id="menu_accueil">
                <li><a href="#">Langages</a></li>
                <li><a href="#">SGBD</a></li>
                <li><a href="https://www.php.net/manual/fr/intro-whatis.php">Frameworks</a></li>
                <li><a href="#">Test</a></li>
            </ul>
            <p>
                <label id="lblMessage">hello</label>
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