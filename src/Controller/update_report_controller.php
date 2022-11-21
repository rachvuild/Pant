<?php

session_start();
if ($_SESSION == null) {
    header("location: login.php");
} else {
    $id_job = $_SESSION["roles_user"];
    $id_user = $_SESSION["id_user"];
    require('../ConnectionBdd.php');

    $id_report = $_POST['id_report'];
    require('../../template/update_report_template.php');
}
