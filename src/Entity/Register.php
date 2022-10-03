<?php
require('../Controller/UserController.php');
if (isset($_POST['REGISTER'])) {

    $id_job = $_POST['id_job'];
    $id_user = $_POST['id_user'];
    $email_user = $_POST['email_user'];
    $name_user = $_POST['name_user'];
    $fname_user = $_POST['fname_user'];
    $pwd_user = $_POST['pwd_user'];
    RegisterUser(
        $pdo,
        $id_job,
        $id_user,
        $email_user,
        $name_user,
        $fname_user,
        $arddress_user,
        $pc_user,
        $city_user,
        $pwd_user
    );
}
