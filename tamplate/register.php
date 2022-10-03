<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form action="../src/Entity/Register.php" method="post">
        <h1>Register</h1>

        <label for="id_job">Choose a job:</label>

        <select name="id_job" id="id_job">
            <option value="">--Please choose an option--</option>
            <option value="1">Dog</option>
            <option value="2">Cat</option>
            <option value="3">Hamster</option>

        </select>

        <label><b>ID d'utilisateur</b></label>
        <input type="text" placeholder="Entrer votre ID" name="id_user" required>

        <label><b>email d'utilisateur</b></label>
        <input type="text" placeholder="Entrer votre email" name="email_user" required>

        <label><b>Name d'utilisateur</b></label>
        <input type="text" placeholder="Entrer votre name" name="name_user" required>


        <label><b>First name d'utilisateur</b></label>
        <input type="text" placeholder="Entrer votre first name" name="fname_user" required>

        <label><b>departement d'utilisateur</b></label>
        <input type="text" placeholder="Entrer votre departement" name="id_dep" required>
        <!-- <select name="id_job" id="id_job">
            <option value="">--Please choose an option--</option>

        </select> -->
        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="pwd_user" required>

        <input type="submit" id='submit' value='REGISTER' name='REGISTER'>
    </form>
    <?php

    // require('../src/Controller/departementController.php');


    // $pol = GetDepartementController($pdo);
    // var_dump($pol);
    $pwd_user = 13;
    $pwd_user2 = md5($pwd_user);
    $pwd_user3 = md5($pwd_user);
    $pwd_user = password_hash($pwd_user, PASSWORD_DEFAULT);
    $pwd_user1 = password_hash($pwd_user, PASSWORD_DEFAULT);
    echo " $pwd_user<br>";
    echo " $pwd_user1<br>";
    echo " $pwd_user2<br>";
    echo " $pwd_user3<br>";

    ?>

</body>

</html>