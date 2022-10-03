<?php
require('../ConnectionBdd.php');
require('../Controller/UserController.php');
if (isset($_POST['REGISTER'])) {

    $pdo = ConnexionBdd();
    $id_job = $_POST['id_job'];
    $id_user = $_POST['id_user'];
    $email_user = $_POST['email_user'];
    $name_user = $_POST['name_user'];
    $fname_user = $_POST['fname_user'];
    $pwd_user = $_POST['pwd_user'];
    $id_dep = $_POST['id_dep'];
    RegisterUser(
        $pdo,
        $id_job,
        $id_user,
        $email_user,
        $name_user,
        $fname_user,
        $pwd_user,
        $id_dep
    );
}
