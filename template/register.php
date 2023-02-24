<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB</title>
</head>

<body>
    <form action="registerUserController.php" method="post">
        <?php
        // session_start();
        // echo $_SESSION['id_user'];
        // if ($_SESSION == null) {
        //     header("location: index.php");
        // }
        ?>
        <h1>Register</h1>

        <label for="id_job">Choose a job:</label>

        <select name="id_job" id="id_job">
            <option value="">--Please choose an option--</option>
            <option value="1">visiteur medical</option>
            <option value="2">responsable departement</option>
            <option value="3">responsable regional</option>

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

        <input type="submit" id='submit' value='REGISTER_USER' name='REGISTER_USER'>
    </form>

</body>

</html>