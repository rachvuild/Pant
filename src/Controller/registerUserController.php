<?php
session_start();
require('../ConnectionBdd.php');
require('../Entity/User_entity.php');
// echo "pol";
if ($_SESSION == null) {
    header("location: index.php");
} else {

    if (isset($_POST['REGISTER_USER'])) {


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
    require('../../template/register.php');
}
