<?php
session_start();
if ($_SESSION == null) {
    header("location: login.php");
}
else{
    $id_job = $_SESSION["roles_user"];
    $id_user=$_SESSION["id_user"];
    require('../ConnectionBdd.php');
    $pdo = ConnexionBdd();
    require('../Entity/sample.php');
    require('../../template/reportClient.php');
}

