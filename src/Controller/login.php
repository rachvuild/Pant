<?php
session_start();
require('../ConnectionBdd.php');
require('../Entity/User_entity.php');

if (isset($_POST['LOGIN'])) {
    // addslashes();
    $id_user = htmlspecialchars($_POST['id_user']);
    $pwd_user = htmlspecialchars($_POST['pwd_user']);
    ConnectionUser(
        $pdo,
        $id_user,
        $pwd_user
    );
} else {
    echo " <a href='../../template/connexion.php'> vous devez vous connecter</a>";
}
