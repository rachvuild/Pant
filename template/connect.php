<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>GSB</title>
</head>

<body>
    <h1>Vous êtes connecté
        <?php
        session_start();
        echo $_SESSION['id_user'];
        if ($_SESSION == null) {
            header("location: connexion.php");
        }
        ?></h1>
    <form action="destroy.php" method="post">
        <input type="submit" name="envoi" id="" value="Deconnexion">
    </form>
</body>

</html>