<?php
require('../ConnectionBdd.php');
require('../Controller/UserController.php');
$pdo = ConnexionBdd();
if (isset($_POST['LOGIN'])) {
    $id_user = $_POST['id_user'];
    $pwd_user = $_POST['pwd_user'];
    ConnectionUser(
        $pdo,
        $id_user,
        $pwd_user
    );
}
