<?php
session_start();
$roles_user = $_SESSION['roles_user'];
if ($roles_user != null) {

    if ($roles_user == 1) {
        header('refresh:0; url=../Controller/homePageCom.php');
    } elseif ($roles_user == 2) {
        header('refresh:0; url=../Controller/homePageCom.php');
    } elseif ($roles_user == 3) {
        header('refresh:0; url=../Controller/homepage_n2.php');
    }
} else {
    header('refresh:0; url=../../template/connexion.php');
}
if ($_SESSION == null) {
    header("location: ../../template/connexion.php");
}
