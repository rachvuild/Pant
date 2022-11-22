<?php

session_start();
if ($_SESSION == null) {
    header("location: login.php");
} else {
    $id_user = $_SESSION['id_user'];
    $id_job = $_SESSION["roles_user"];
    require('../ConnectionBdd.php');

    require('../Entity/report_entity.php');
    require('../../template/header.php');
    require('../../template/report_template.php');
}
