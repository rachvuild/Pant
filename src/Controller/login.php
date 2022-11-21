<?php
require('../ConnectionBdd.php');
require('../Entity/User_entity.php');
$pdo = ConnexionBdd();
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
    echo " <a href='../../template/connexion.php'> vous devait revire sur le page principale</a>";
}
