<?php
session_start();
if ($_SESSION == null) {
    header("location: ../../template/connexion.php");
} else {
    $id_job = $_SESSION["roles_user"];
    $id_user = $_SESSION["id_user"];
    require('../ConnectionBdd.php');
    if (isset($_POST['cr'])) {
        require("../../template/header.php");
        // var_dump($_POST['id_client']);
        $id_client = $_POST['id_client'];
        require('../Entity/sample.php');
        require('../../template/reportClient.php');
    } elseif (isset($_POST['REPORT_CLIENT'])) {
        require('../Entity/registerReport.php');
    } else {
        header("location: homePageCom.php");
    }
}
