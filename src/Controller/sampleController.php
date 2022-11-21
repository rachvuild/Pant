<?php
session_start();
if ($_SESSION == null) {
    header("location: login.php");
} else {
    $id_job = $_SESSION["roles_user"];
    $id_user = $_SESSION["id_user"];
    if (isset($_POST['cr'])) {
        require('../ConnectionBdd.php');

        require('../Entity/sample.php');
        require('../../template/reportClient.php');
    } else {
        header("location: homePageCom.php");
    }
}
