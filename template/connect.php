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
        if($_SESSION['roles_user']==1 || $_SESSION['roles_user']==2){
            header("location: ../../src/Controller/homePageCom.php");
        }
        if($_SESSION['roles_user']==3){
            header("location: ../../src/Controller/homepage_n2.php");
        }
        
        ?></h1>
    <form action="destroy.php" method="post">
        <input type="submit" name="envoi" id="" value="Deconnexion">
    </form>
</body>

</html>