<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assert/style.css">
    <title>GSB</title>
</head>

<body>
    <form action="updateUserPassword.php" method="post" class="pwd">
        <input type="password" name="newpassorwd" placeholder="Entrez votre nouveau password" class="pwd1 pwd2">
        <input type="submit" name="updatepwd" class="pwd1 pwd3">
    </form>
</body>

</html><?php if ($_SESSION == null) {
            header("location: connexion.php");
        } ?>