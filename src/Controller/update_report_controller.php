<?php
session_start();
if ($_SESSION == null) {
    header("location: ../../template/connexion.php");
} else {
    $id_job = $_SESSION["roles_user"];
    $id_user = $_SESSION["id_user"];
    if(isset($_POST['modif'])){
        require('../ConnectionBdd.php');
        require('../Entity/update_report_entity.php');
        require "../../template/header.php";
        require('../../template/update_report_template.php');
    }
    if(isset($_POST['UPDATE_REPORT'])){
        require('../ConnectionBdd.php');
        require('../Entity/update_report_entity.php');
    }
}
