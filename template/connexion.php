<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assert/style.css">
    <title>GSB</title>
</head>

<body class="body-connexion">
    <?php
    session_start();

        echo '<div class="connexion">


                    <form class="form-connexion" action="../src/Controller/login.php" method="post">
                        <h1>Connexion</h1>
            
                        <fieldset class="input-connexion">
                            <legend>Nom d\'utilisateur </legend>
            
                            <input class="input-none" type="text" placeholder="Entrez votre ID" name="id_user" required>
            
                        </fieldset>
                        <fieldset class="input-connexion">
                            <legend>Mot de passe</legend>
            
                            <input class="input-none" type="password" placeholder="Entrez le mot de passe" name="pwd_user" required>
                        </fieldset>
                        <input class="submit-connexion" type="submit" id="submit" value="LOGIN" name="LOGIN">
                    </form>
                </div>
                <div class="connexion">
                    <img src="../img/logo-trans.png" alt="">
                </div>';

    ?>
</body>

</html>