<?php

session_start();

if ($_SESSION != null) {
    $id_user = $_SESSION['id_user'];
    $id_job = $_SESSION['roles_user'];
    require('../ConnectionBdd.php');
    require('../Entity/viewrepport.php');
    require "../../template/header.php";
    $allrepport = repportDepartement($pdo, $id_user);
    require('../../template/repportDerpartement.php');
} else {
}
