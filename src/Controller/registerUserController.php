<?php
session_start();
require('../ConnectionBdd.php');

if ($_SESSION == null) {
    header("location: index.php");
} else {
    require('../../template/register.php');

    if (isset($_POST['REGISTER_USER'])) {


        $id_job = $_POST['id_job'];
        $id_user = $_POST['id_user'];
        $email_user = $_POST['email_user'];
        $name_user = $_POST['name_user'];
        $fname_user = $_POST['fname_user'];
        $pwd_user = $_POST['pwd_user'];
        $id_dep = $_POST['id_dep'];
        require('../Entity/User_entity.php');
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
}
