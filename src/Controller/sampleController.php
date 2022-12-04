<?php
session_start();
if ($_SESSION == null) {
    header("location: index.php");
} else {
    $id_job = $_SESSION["roles_user"];
    $id_user = $_SESSION["id_user"];
    require('../ConnectionBdd.php');
    if (isset($_POST['cr'])) {
        require "../../template/header.php";
        require('../Entity/sample.php');
        require('../../template/reportClient.php');
    }
    elseif(isset($_POST['REPORT_CLIENT'])){
        require('../Entity/registerReport.php');
    }
    else {
        header("location: homePageCom.php");
    }
}
