<?php
session_start();
$id_user=$_SESSION['id_user'];
$id_job=$_SESSION['roles_user'];
if ($_SESSION == null) {
    header("location: ../../template/connexion.php");
} else {
    require('../ConnectionBdd.php');
    require('../../template/header.php');
    require('../../template/updatepwd.php');
    if (isset($_POST['updatepwd'])) {
        $id_user = $_SESSION['id_user'];
        $newpwd = htmlspecialchars($_POST['newpassorwd']);
        require('../Entity/newPassword.php');
        updatepwd($pdo, $id_user, $newpwd);
    }
}
