<!DOCTYPE html>
<html>
   
    <head>
        <title>QuestionsIHM.php</title>
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
            <h1 id="Q">Questions</h1>
            <p>
            <form action="../controls/QuestionsCTRL.php" method="POST"

                  
                
                <label>Sujet : </label>
                
                    <select name="sujets" id="sujets">
                        <?php
                        
                        echo $lscontenu;
                        
                        
                        ?>
                    </select>
                </p>
                <label>Ajouter une question :</label> 
                <input type="text" name="ques" id="ques">
                <input type="submit" value="Envoyer" id="btEnvoyer" />
            </form>
        </p>


        <p>
            <label id="lblMessage">Message</label>
        </p>
    </div>

    <footer id="footer">
        <?php
        include 'partials/footer.php';
        ?>
    </footer>

<!--        <script src="../js/authentification.js"></script>-->
</body>

</html>>