<?php

session_start();
if ($_SESSION == null) {
    header("location: login.php");
} else {
    $id_job = $_SESSION["roles_user"];
    $id_user = $_SESSION["id_user"];
    if ($id_job == 2 or $id_job == 3) {
        require('../ConnectionBdd.php');
        require "../../template/header.php";
        require('../Entity/create_com_entity.php');
        require('../../template/create_com_template.php');
    } else {
        header("location: homePageCom.php");
    }
}
