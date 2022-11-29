<?php
session_start();
$roles_user = $_SESSION['roles_user'];
if ($roles_user != null) {

    if ($roles_user == 1) {
        header('Location: ../Controller/homePageCom.php');
    } elseif ($roles_user == 2) {
        header('Location: ../Controller/homePageCom.php');
    } elseif ($roles_user == 3) {
        header('Location: ../Controller/homepage_n2.php');
    }
} else {
    header('Location: ../../template/connexion.php');
}
