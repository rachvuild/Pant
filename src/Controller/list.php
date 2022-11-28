<?php
session_start();
if ($_SESSION == null) {
    header("location: index.php");
} else {
    $id_job = $_SESSION["roles_user"];
    $id_user = $_SESSION["id_user"];
    if ($id_job == 2) {
        require('../ConnectionBdd.php');
        require('../../template/header.php');
        require('../Entity/list_n_1.php');
        require('../../template/display_n_1.php');
    } elseif ($id_job == 3) {
        header("location: homepage_n2.php");
    } else {
        header("location: homePageCom.php");
    }
}
